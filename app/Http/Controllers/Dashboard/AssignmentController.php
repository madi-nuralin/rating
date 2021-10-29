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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::findOrFail($id);


        return Inertia::render('Dashboard/Assignments/Show', [
            'assignment' => array_merge(
                $assignment->toArray(), [
                    'user' => $assignment->getUser(),
                    'assessment' => $assignment->getAssessment(),
                    'activities' => $assignment->activities ? $assignment->activities->map(function($activity) {
                        return array_merge(
                            $activity->toArray(), [
                                'parameter' => $activity->getParameter(),
                                'assignment' => $activity->getAssignment(),
                            ]
                        );
                    }) : [],
                    'confirmations' => $assignment->confirmations->map(function($confirmation) {
                        return array_merge(
                            $confirmation->toArray(), [
                                'confirmer' => array_merge(
                                    $confirmation->confirmer->toArray(), [
                                        'user' => $confirmation->confirmer->getUser()
                                    ]
                                )
                            ]
                        );
                    }),
                    'employement' => array_merge(
                        $assignment->employement->toArray(), [
                            'department' => $assignment->employement->getDepartment(),
                            'position' => $assignment->employement->getPosition()
                        ]
                    )
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
