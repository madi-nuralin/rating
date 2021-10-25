<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Assessment;
use App\Models\User;

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
                        'assessment' => $assignment->getAssessment(),
                        'activities' => $assignment->getActivities(),
                        'confirmers' => $assignment->confirmers->map(function($confirmer) {
                            return array_merge(
                                $confirmer->toArray(), [
                                    'user' => $confirmer->getUser()
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
            'confirmations' => auth()->user()->confirmer->assignments->map(function($assignment) {
                return array_merge(
                    $assignment->toArray(), [
                        'user' => $assignment->getUser(),
                        'assessment' => $assignment->getAssessment(),
                        'activities' => $assignment->getActivities(),
                        'confirmers' => $assignment->confirmers->map(function($confirmer) {
                            return array_merge(
                                $confirmer->toArray(), [
                                    'user' => $confirmer->getUser()
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
            })
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
