<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Rating;
use App\Models\Submission;
use App\Models\ParameterTarget;
use App\Models\Verifier;
use App\Models\Verification;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating = Rating::findOrFail(request()->input('rating'));
        $user = auth()->user();

        return Inertia::render('Rating/Submission/Index', [
            'rating' => array_merge(
                $rating->toArray(), [
                    'targets' => collect(ParameterTarget::whereHas(
                        'parameters', function($q) use ($rating) {
                            $q->whereIn('id', $rating->parameters()->pluck('parameters.id'));
                        })->get())->map(function($parameterTarget) use ($rating, $user) {
                            return array_merge(
                                $parameterTarget->toArray(), [
                                    'submissions' => Submission::where([
                                        'rating_id' => $rating->id,
                                        'user_id' => $user->id
                                    ])->whereIn('parameter_id', $parameterTarget->parameters()->pluck('parameters.id'))->paginate()->through(function($submission) {
                                        return array_merge(
                                            $submission->toArray(), [
                                                'parameter' => $submission->parameter->toArray(),
                                                'verifiers' => $submission->verifications->map(function($verification) {
                                                    return array_merge(
                                                        $verification->verifier->toArray(), [
                                                            'user' => $verification->verifier->user->toArray()
                                                        ]
                                                    );
                                                }),
                                            ]
                                        );
                                    }),
                                    'verifiers' => collect(Verifier::where([
                                        'parameter_target_id' => $parameterTarget->id,
                                        'rating_id' => $rating->id
                                    ])->get())->map(function($verifier) {
                                        return array_merge(
                                            $verifier->toArray(), [
                                                'user' => $verifier->user->toArray()
                                            ]
                                        );
                                    })
                                ]
                            );
                        }
                    ),
                    'verifiers' => collect(Verifier::where('rating_id', $rating->id)->get())->map(function($verifier) {
                        return array_merge(
                            $verifier->toArray(), [
                                'user' => $verifier->user->toArray()
                            ]
                        );
                    })
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
        $rating = Rating::findOrFail(request()->input('rating'));
        $user = auth()->user();

        return Inertia::render('Rating/Submission/Create', [
            'rating' => array_merge(
                $rating->toArray(), [
                    'targets' => collect(ParameterTarget::whereHas(
                        'parameters', function($q) use ($rating) {
                            $q->whereIn('id', $rating->parameters()->pluck('parameters.id'));
                        })->get())->map(function($parameterTarget) use ($rating, $user) {
                            return $parameterTarget->toArray();
                        }
                    )
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
