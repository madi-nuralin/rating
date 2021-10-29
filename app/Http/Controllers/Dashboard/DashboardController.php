<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Assessment;
use App\Models\User;
use App\Models\Confirmer;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            'assignments' => auth()->user()->assignments->map(function($assignment) {
                return array_merge(
                    $assignment->toArray(), [
                        'user' => $assignment->getUser(),
                        'assessment' => $assignment->getAssessment(),
                        'activities' => $assignment->getActivities(),
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
                );
            }),
            'confirmations' => auth()->user()->confirmer ? auth()->user()->confirmer->confirmations->map(function($confirmation) {
                return array_merge(
                    $confirmation->toArray(), [
                        'assignment' => array_merge(
                            $confirmation->assignment->toArray(), [
                                'user' => $confirmation->assignment->getUser(),
                                'assessment' => $confirmation->assignment->getAssessment(),
                                'activities' => $confirmation->assignment->getActivities(),
                                'confirmations' => $confirmation->assignment->confirmations->map(function($confirmation) {
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
                                    $confirmation->assignment->employement->toArray(), [
                                        'department' => $confirmation->assignment->employement->getDepartment(),
                                        'position' => $confirmation->assignment->employement->getPosition()
                                    ]
                                )
                            ]
                        )
                    ]
                );
            }) : []
        ]);
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
