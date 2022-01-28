<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Rating;
use App\Models\User;
use App\Models\Submission;
use App\Models\ParameterTarget;
use App\Models\Verifier;
use App\Models\Verification;
use App\Models\VerificationStatus;
use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldResponce;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = request()->all();

        $rating = Rating::findOrFail($input['rating']);
        $verifier = Verifier::findOrFail($input['verifier']);
        $user = User::findOrFail($input['user']);

        return Inertia::render('Dashboard/Verification/Index', [
            'rating' => array_merge(
                $rating->toArray(), [
                    'targets' => collect(ParameterTarget::whereHas(
                        'parameters', function($q) use ($rating, $verifier) {
                            $q->whereIn('id', $rating->parameters()->pluck('parameters.id'));
                        })->get())->map(function($parameterTarget) use ($rating, $user, $verifier) {
                        return array_merge(
                            $parameterTarget->toArray(), [
                                'verifications' => collect(Verification::where([
                                    ['verifier_id', '=', $verifier->id]
                                ])->get())->map(function($verifier) use ($rating, $user, $parameterTarget) {

                                    $submission = $verifier->submission;

                                    return array_merge(
                                        $verifier->toArray(), [//
                                            'submission' => array_merge(
                                                $submission->toArray(), [
                                                    'parameter' => $submission->parameter->toArray(),
                                                    'verification_statuses' => VerificationStatus::all()->map(function($verificationStatus) use ($submission) {
                                                        return array_merge(
                                                            $verificationStatus->toArray(), [
                                                                'verifications' => collect(
                                                                    $submission->verifications()
                                                                               ->where('verification_status_id', $verificationStatus->id)
                                                                               ->get())->map(function($verification) {
                                                                    return array_merge(
                                                                        $verification->toArray(), [
                                                                            'verifier' => array_merge(
                                                                                $verification->verifier->toArray(), [
                                                                                    'user' => $verification->verifier->user->toArray()
                                                                                ]
                                                                            ),
                                                                        ]
                                                                    );
                                                                })
                                                            ]
                                                        );
                                                    })
                                                ]
                                            )
                                        ]//
                                    );
                                })
                            ]
                        );
                    }),
                    'verifiers' => collect(Verifier::where('rating_id', $rating->id)->get())->map(function($verifier) {
                        return array_merge(
                            $verifier->toArray(), [
                                'user' => $verifier->user->toArray()
                            ]
                        );
                    }),
                    'user' => $user->toArray()
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
