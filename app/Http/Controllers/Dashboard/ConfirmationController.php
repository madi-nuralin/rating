<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Confirmation;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard/Confirmations/Index', [
            'confirmations' => auth()->user()
                                     ->confirmer ?
                               auth()->user()
                                     ->confirmer
                                     ->confirmations
                                     ->map(function($confirmation) {
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
        $confirmation = Confirmation::findOrFail($id);

        return Inertia::render('Dashboard/Confirmations/Show', [
            'confirmation' => array_merge(
                $confirmation->toArray(), [
                    'assignment' => array_merge(
                        $confirmation->assignment->toArray(), [
                            'user' => $confirmation->assignment->getUser(),
                            'assessment' => $confirmation->assignment->getAssessment(),
                            'activities' => $confirmation->assignment && $confirmation->assignment->activities ? $confirmation->assignment->activities->map(function($activity) {
                                return array_merge(
                                    $activity->toArray(), [
                                        'parameter' => $activity->getParameter(),
                                        'assignment' => $activity->getAssignment(),
                                    ]
                                );
                            }) : [],
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
                    ),
                ]
            )
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
            'status' => ['required'],
        ])->validateWithBag('updatePosition');

        $confirmation = Confirmation::findOrFail($id);
        
        if ($confirmation->getStatus() != $input['status'] ) {
            $confirmation->setStatus($input['status']);    
        }

        $confirmation->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'confirmation-updated');
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
