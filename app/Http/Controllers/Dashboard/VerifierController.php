<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class VerifierController extends Controller
{
    public function get()
    {
        $verifier = request()->input('verifier');
        $parameter = request()->input('parameter');
        $isHaveSubmissions = request()->input('isHaveSubmissions');

        if (is_null($verifier)) {
            if (auth()->user()->verifiers) {
                $verifier = auth()->user()->verifiers->first();
            }
        } else {
            $verifier = \App\Models\Verifier::findOrFail($verifier);
        }

        if (isset($parameter)) {
            $parameter = \App\Models\Parameter::findOrFail($parameter);
        }

        return Inertia::render('Dashboard/Verifier', [
            'verifiers' => auth()->user()->verifiers ? auth()->user()->verifiers->map(function ($verifier) {
                return array_merge(
                    $verifier->toArray(), [
                        'rating' => $verifier->rating->toArray(),
                        'parameter_target' => $verifier->parameterTarget->toArray()
                    ]
                );
            }) : [],
            'verifier' => $verifier ? array_merge(
                $verifier->toArray(), [
                    'rating' => $verifier->rating->toArray(),
                    'users' => $verifier->rating->users()
                        ->when(isset($parameter), function ($q) use ($verifier, $parameter) {
                            $q->whereHas('submissions', function ($q) use ($verifier, $parameter) {
                                $q->where('rating_id', $verifier->rating_id)
                                    ->where('parameter_id', $parameter->id);
                            });
                        })
                        ->when($isHaveSubmissions, function ($q) use ($verifier) {
                            $q->whereHas('submissions', function ($q) use ($verifier) {
                                $q->where('rating_id', $verifier->rating_id);
                            });
                        })
                        ->paginate(10)->withQueryString()->through(function ($user) use ($verifier) {
                            return array_merge(
                                $user->toArray(), [
                                    'is_approved' => $verifier->rating->userIsApproved($user),
                                    'employements' => $user->employements ? $user->getEmployements(NULL, DB::raw('CURDATE()'))->map(function ($employement) {
                                        return array_merge(
                                            $employement->toArray(), [
                                                'department' => $employement->department->toArray(),
                                                'position' => $employement->position->toArray(),
                                            ]
                                        );
                                    }) : array(),
                                    'statistics' => [
                                        'total' => count(
                                            collect(
                                                $verifier->verifications()
                                                    ->whereHas('submission', function ($q) use ($user) {
                                                        $q->where('user_id', $user->id);
                                                    })
                                                    ->get()
                                            )
                                        ),
                                        'completed' => count(
                                            collect(
                                                $verifier->verifications()
                                                    ->whereHas('submission', function ($q) use ($user) {
                                                        $q->where('user_id', $user->id);
                                                    })
                                                    ->whereHas('verificationStatus', function ($q) {
                                                        $q->where('context', 'accepted')
                                                            ->orWhere('context', 'fixed')
                                                            ->orWhere('context', 'not_accepted');
                                                    })
                                                    ->get()
                                            )
                                        )
                                    ]
                                ]
                            );
                        })
                ]
            ) : [],
            'parameter' => $parameter,
            'parameters' => $verifier->parameterTarget->parameters,
            'isHaveSubmissions' => $isHaveSubmissions,

            'statistics' => [
                'total' => $verifier ? count($verifier->rating->users) : 0,
                'last' => $verifier ? count($verifier->rating->users) : 0
            ]
        ]);
    }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
