<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Assignment;
use App\Models\Activity;
use App\Models\Parameter;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignment = Assignment::findOrFail(request()->input('assignment'));

        return Inertia::render('Dashboard/Activities/Create', [
            'assignment' => array_merge(
                $assignment->toArray(), [
                    'assessment' => array_merge(
                        $assignment->assessment->toArray(), [
                            'parameters' => $assignment->assessment->parameters->map(function($parameter) {
                                return array_merge(
                                    $parameter->toArray(), [
                                        'form' => array_merge(
                                            $parameter->form->toArray(), [
                                                'fields' => $parameter->form->fields ? $parameter->form->fields->map(function($field) {
                                                    return array_merge(
                                                        $field->toArray(), [
                                                            'options' => $field->getOptions()
                                                        ]
                                                    );
                                                }) : []
                                            ]
                                        )
                                    ]
                                );
                            })
                        ]
                    )
                ]
            ),
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

        Validator::make($input, [
            'parameter' => ['required'],
        ])->validateWithBag('createActivity');

        $parameter = Parameter::findOrFail($input['parameter']);
        $assignment = Assignment::findOrFail($input['assignment']);

        $activity = new Activity();
        $activity->setParameter($parameter->getId());
        $activity->setAssignment($assignment->getId());
        $activity->setScore(2);
        $activity->save();

        $activity->assignment->setScore($activity->getScore() + $activity->assignment->getScore());
        $activity->assignment->save();

        return Inertia::location(route('assignment.show', ['assignment' => $assignment->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);

        return Inertia::render('Dashboard/Activities/Show', [
            'activity' => array_merge(
                $activity->toArray(), [
                    'parameter' => $activity->getParameter(),
                    'assignment' => $activity->getAssignment()
                ]
            ),
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
        $activity = Activity::findOrFail($id);

        return Inertia::render('Dashboard/Activities/Edit', [
            'activity' => array_merge(
                $activity->toArray(), [
                    'parameter' => $activity->getParameter(),
                    'assignment' => $activity->getAssignment()
                ]
            ),
        ]);
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
        $activity = Activity::findOrFail($id);
        $assignment = $activity->assignment;
        $assignment->setScore($assignment->getScore() - $activity->getScore());
        $assignment->save();
        $activity->delete();

        return Inertia::location(route('assignment.show', ['assignment' => $assignment->getId()]));
    }
}
