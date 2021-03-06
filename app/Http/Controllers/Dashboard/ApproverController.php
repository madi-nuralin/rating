<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

use App\Models\User;

class ApproverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approver = request()->input('approver');

        if (is_null($approver)) {
            if (auth()->user()->approvers) {
                $approver = auth()->user()->approvers->first();
            }
        } else {
            $approver = \App\Models\Approver::findOrFail($approver);
        }

        return Inertia::render('Dashboard/Approver', [
            'approvers' => auth()->user()->approvers ? auth()->user()->approvers->map(function($approver) {
                return array_merge(
                    $approver->toArray(), [
                        'rating' => $approver->rating->toArray(),
                        'department' => $approver->department->toArray()
                    ]
                );
            }) : array(),
            'approver' => $approver ? array_merge(
                $approver->toArray(), [
                    'rating' => $approver->rating->toArray(),
                    'users' => User::whereHas(
                        'employements', function($q) use ($approver) {
                            $q->whereIn(
                                'department_id',
                                $approver->department->employements
                                ? $approver->department->getEmployements(NULL, DB::raw('CURDATE()'))->map(function($employement) {return $employement->id;})
                                : array()
                            );
                        }
                    )->paginate(10)->withQueryString()->through(function($user) use ($approver) {
                        return array_merge(
                            $user->toArray(), [
                                'is_approved' => $approver->rating->userIsApproved($user),
                                'employements' => $user->employements ? $user->getEmployements(NULL, DB::raw('CURDATE()'))->map(function($employement) {
                                    return array_merge(
                                        $employement->toArray(), [
                                            'department' => $employement->department->toArray(),
                                            'position' => $employement->position->toArray(),
                                        ]
                                    );
                                }) : array(),
                            ]
                        );
                    })
                ]
            ) : [],
            'statistics' => [
                'total' => $approver ? count($approver->rating->users) : 0,
                'last' => $approver ? count($approver->rating->users) : 0
            ]
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
    /*public function show($id)
    {
        //
    }*/

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
