<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                return $assignment->toArray();
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
