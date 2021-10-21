<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Assessment;
use App\Models\Assignment;
use App\Models\Employement;
use App\Models\Parameter;
use App\Models\User;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessment = Assessment::findOrFail(request()->input('assessment'));
        $employement = Employement::findOrFail(request()->input('employement'));
        $assignments = collect(
            Assignment::where('user_id', auth()->user()->id)
                      ->where('assessment_id', $assessment->id)
                      ->where('employement_id', $employement->id)
                      ->get());

        return Inertia::render('Dashboard/Assignments/Index', [
            'assignments' => $assignments->map(function($assignment) {
                return array_merge(
                    $assignment->toArray(), [
                        'parameter' => $assignment->getParameter()
                    ]
                );
            }),
            'assessment' => array_merge(
                $assessment->toArray(), [
                    'supervisors' => $assessment->getSupervisors()
                ]
            ),
            'employement' => array_merge(
                $employement->toArray(), [
                    'department' => $employement->getDepartment(),
                    'position' => $employement->getPosition()
                ]
            )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assessment = Assessment::findOrFail(request()->input('assessment'));
        $employement = Employement::findOrFail(request()->input('employement'));

        return Inertia::render('Dashboard/Assignments/Create', [
            'assessment' => array_merge(
                $assessment->toArray(), [
                    'supervisors' => $assessment->getSupervisors(),
                    'parameters' => $assessment->parameters->map(function($parameter) {
                        return array_merge(
                            $parameter->toArray(), [
                                'rules' => $parameter->rules->map(function($rule) {
                                    return array_merge(
                                        $rule->toArray(), [
                                            'options' => $rule->getOptions()
                                        ]
                                    );
                                })
                            ]
                        );
                    })
                ]
            ),
            'employement' => array_merge(
                $employement->toArray(), [
                    'department' => $employement->getDepartment(),
                    'position' => $employement->getPosition()
                ]
            )
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $assignment = null;

        if (isset($input['parameter'])) {
            $assignment = Assignment::create([
                'assessment_id' => $input['assessment'],
                'parameter_id' => $input['parameter'],
                'employement_id' => $input['employement'],
                'user_id' => auth()->user()->getId(),
                'score' => 0
            ]);
        } else {
            throw ValidationException::withMessages([
                'parameter' => 'Please select assessment parameter.',
            ]);
        }

        $assignment->save();

        return Inertia::location(route('assignment.show', [
            'assignment' => $assignment->id,
            'parameter' => $assignment->getParameter(),
            'employement' => array_merge(
                $assignment->getEmployement(), [
                    'department' => $assignment->employement->getDepartment(),
                    'position' => $assignment->employement->getPosition()
                ]
            )
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
