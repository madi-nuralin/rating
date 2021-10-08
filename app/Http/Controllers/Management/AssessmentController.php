<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Assessment;
use App\Models\Employement;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use App\Models\Parameter;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Management/Assessments/Index', [
            'assessments' => Assessment::all()->map(function($assessment) {
                return $assessment->toArray();
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Management/Assessments/Create');
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

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'valid_from' => ['required'],
            'valid_to' => ['required'],
        ])->validateWithBag('createAssessment');

        $assessment = Assessment::create();
        $assessment->setName($input['name']);
        $assessment->setDescription($input['description']);
        $assessment->setValidFrom($input['valid_from']);
        $assessment->setValidTo($input['valid_to']);
        $assessment->save();

        return Inertia::location(route('assessment.show', ['assessment' => $assessment->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assessment = Assessment::findOrFail($id);

        return Inertia::render('Management/Assessments/Show', [
            'assessment' => array_merge(
                $assessment->toArray(), [
                    'employements' => $assessment->getEmployements(),
                    'supervisors' => $assessment->getSupervisors(),
                    'parameters' => $assessment->parameters->map(function($parameter) {
                        return array_merge(
                            $parameter->toArray(), [
                                'rules' => $parameter->getRules()
                            ]
                        );
                    })
                ]
            ),
            'employements' => Employement::all()->map(function($employement) {
                return array_merge(
                    $employement->toArray(), [
                        'department' => $employement->getDepartment(),
                        'position' => $employement->getPosition(),
                    ]
                );
            }),
            'supervisors' => User::all()->map(function($user) {
                return $user->toArray();
            }),
            'parameters' => Parameter::all()->map(function($parameter) {
                return $parameter->toArray();
            }),
        ]);
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
        $input = $request->all();

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'valid_from' => ['required'],
            'valid_to' => ['required'],
        ])->validateWithBag('updateAssessment');

        $assessment = Assessment::findOrFail($id);
        
        if ( $assessment->getName() != $input['name'] ) {
            $assessment->setName($input['name']);    
        }

        if ( $assessment->getDescription() != $input['description'] ) {
            $assessment->setDescription($input['description']);
        }

        if ( $assessment->getValidFrom() != $input['valid_from'] ) {
            $assessment->setValidFrom($input['valid_from']);
        }

        if ( $assessment->getValidTo() != $input['valid_to'] ) {
            $assessment->setValidTo($input['valid_to']);
        }

        if (isset($input['employements'])) {
            if ($assessment->employements()) {
                $assessment->employements()->detach();
            }
            if (count($input['employements']) > 0) {
                $assessment->employements()->attach($input['employements']);
            }
        }

        if (isset($input['supervisors'])) {
            if ($assessment->supervisors()) {
                $assessment->supervisors()->detach();
            }
            if (count($input['supervisors']) > 0) {
                $assessment->supervisors()->attach($input['supervisors']);
            }
        }

        if (isset($input['parameters'])) {
            if ($assessment->parameters()) {
                $assessment->parameters()->detach();
            }
            if (count($input['parameters']) > 0) {
                $assessment->parameters()->attach($input['parameters']);
            }
        }

        $assessment->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'assessment-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assessment::findOrFail($id)->delete();

        return Inertia::location(route('assessment.index'));
    }
}
