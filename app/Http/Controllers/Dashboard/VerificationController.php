<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use DB;

use Illuminate\Support\Facades\Storage;

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
                    'statistics' => [
                        'score' => Submission::whereHas(
                            'verifications', function($q) {
                                $q->where([
                                    ['verification_status_id', '!=', 2] // rejected
                                ]);
                            }
                        )
                        ->where([
                            'user_id' => $user->id,
                            'rating_id' => $rating->id
                        ])
                        ->sum('score'),
                        'total' => count(
                            Submission::where([
                                'user_id' => $user->id,
                                'rating_id' => $rating->id
                            ])->get()
                        )
                    ],
                    'targets' => collect(
                        $rating->parameterTargets()
                               ->where('id', $verifier->parameterTarget->id)
                    )->map(function($parameterTarget) use ($rating, $user, $verifier) {
                        return array_merge(
                            $parameterTarget->toArray(), [
                                'parameters' => collect(
                                    $parameterTarget->parameters()
                                                    ->whereHas(
                                        'submissions', function($q) use ($rating, $user, $verifier) {
                                            $q->where('rating_id', $rating->id)
                                              ->where('user_id', $user->id);
                                        }
                                    )->get()
                                )->map(function($parameter) use ($rating, $user, $verifier) {
                                    return array_merge(
                                        $parameter->toArray(), [
                                            'submissions' => collect(
                                                $user->submissions()->where([
                                                    'rating_id' => $rating->id,
                                                    'parameter_id' => $parameter->id   
                                                ])->get()
                                            )->map(function($submission) use ($verifier) {

                                                $verification = Verification::firstWhere([
                                                    'verifier_id' => $verifier->id,
                                                    'submission_id' => $submission->id
                                                ]);

                                                return array_merge(
                                                    $submission->toArray(), [
                                                        'verification' => $verification ? 
                                                            array_merge(
                                                                $verification->toArray(), [
                                                                    'status' => $verification->verificationStatus->toArray()
                                                                ]
                                                            ) : [],
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
                                                );
                                            })
                                        ]
                                    );
                                }),
                                'verifications' => collect(
                                    Verification::where([
                                        ['verifier_id', '=', $verifier->id]
                                    ])->whereHas('submission', function($q) use ($user) {
                                        $q->where('user_id', $user->id);
                                    })->get())->map(function($verification) use ($rating, $parameterTarget) {

                                    $submission = $verification->submission;

                                    return array_merge(
                                        $verification->toArray(), [//
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
                                            ),
                                            'verification_status' => $verification->verificationStatus->toArray()
                                        ]//
                                    );
                                })
                            ]
                        );
                    }),
                    'verifiers' => collect(
                        DB::table('verifiers')
                            ->selectRaw('user_id')
                            ->where('rating_id', $rating->id)
                            ->groupBy('user_id')
                            ->get()
                            ->pluck('user_id')
                    )->map(function($id) use ($rating) {
                        $user = User::findOrFail($id);

                        return array_merge(
                            $user->toArray(), [
                                'parameter_targets' => collect(
                                    DB::table('verifiers')
                                        ->selectRaw('parameter_target_id')
                                        ->where('rating_id', $rating->id)
                                        ->where('user_id', $user->id)
                                        ->groupBy('parameter_target_id')
                                        ->get()
                                        ->pluck('parameter_target_id')
                                )->map(function($id) {
                                    $parameterTarget = ParameterTarget::findOrFail($id);

                                    return $parameterTarget->toArray();
                                })
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
        $verification = Verification::findOrFail($id);
        $submission = $verification->submission;
        $parameter = $submission->parameter;
        $rating = $submission->rating;
        $form = $rating->parameterForm($parameter);
        $verifications = $submission->verifications;

        return Inertia::render('Dashboard/Verification/Show', [
            'verification' => array_merge(
                $verification->toArray(), [
                    'submission' => array_merge(
                        $submission->toArray(), [
                            'rating' => $submission->toArray(),
                            'parameter' => array_merge(
                                $parameter->toArray(), [
                                    'target' => $parameter->parameterTarget->toArray(),
                                    'form' => $form ?
                                        array_merge(
                                            $form->toArray(), [
                                                'fields' => $form->fields ?
                                                            $form->fields->map(function($field) use ($submission) {
                                                    return array_merge(
                                                        $field->toArray(), [
                                                            'options' => $field->options ?
                                                                         $field->options->map(function($option) use ($submission) {
                                                                return $option->toArray();
                                                            }) : [],
                                                            'responce' => $submission->formFieldResponces()
                                                                                     ->where('form_field_id', $field->id)
                                                                                     ->first() ?
                                                                          $submission->formFieldResponces()
                                                                                     ->where('form_field_id', $field->id)
                                                                                     ->first()->toArray() : []
                                                        ]
                                                    );
                                                }) : []
                                            ]
                                        ) : []
                                ]
                            ),
                            'verifications' => $verifications ? $verifications->map(function($verification) {
                                return array_merge(
                                    $verification->toArray(), [
                                        'verifier' => array_merge(
                                            $verification->verifier->toArray(), [
                                                'user' => $verification->verifier->user->toArray()
                                            ]
                                        ),
                                        'verification_status' => $verification->verificationStatus->toArray()
                                    ]
                                );
                            }) : []
                        ]
                    ),
                    'verification_status' => $verification->verificationStatus->toArray()
                ]
            ),
            'verification_statuses' => VerificationStatus::all()->map(function($verificationStatus) {
                return $verificationStatus->toArray();
            })
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

        Validator::make($input, [
            'verification_status' => ['required', 'numeric']
        ])->validateWithBag('updateVerification');

        $verificationStatus = VerificationStatus::findOrFail($input['verification_status']);
        $verification = Verification::findOrFail($id);
        $verification->setVerificationStatus($verificationStatus);
        $verification->setMessage($input['message']);
        
        if ($verificationStatus->getContext() == 'fixed-and-accepted') {
            Submission::updateHelper($request, $id, 'updateVerification');
        }

        $verification->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'verification-updated');
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
