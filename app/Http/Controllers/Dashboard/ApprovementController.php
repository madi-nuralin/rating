<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use DB;

use App\Models\Rating;
use App\Models\Submission;
use App\Models\ParameterTarget;
use App\Models\User;
use App\Models\Verifier;
use App\Models\Verification;
use App\Models\VerificationStatus;
use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldResponce;

class ApprovementController extends Controller
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
        $user = User::findOrFail($input['user']);

        return Inertia::render('Dashboard/Approvement/Index', [
            'rating' => array_merge(
                $rating->toArray(), [
                    'statistics' => [
                        'score' => $rating->getUserScore($user, array(3,5)),

                        'total' => count(
                            Submission::where([
                                'user_id' => $user->id,
                                'rating_id' => $rating->id
                            ])->get()
                        )
                    ],
                    'approver' => [
                        'user' => array_merge(
                            auth()->user()->toArray(), [
                                'employements' => auth()->user()->getEmployements(DB::raw('CURRENT_TIMESTAMP()'), NULL)->map(function($employement) {
                                    return array_merge(
                                        $employement->toArray(), [
                                            'department' => $employement->department->toArray(),
                                            'position' => $employement->position->toArray()
                                        ]
                                    );
                                })
                            ]
                        )
                    ],
                    'is_approved' => $rating->userIsApproved($user),
                    'targets' => collect(ParameterTarget::whereHas(
                        'parameters', function($q) use ($rating) {
                            $q->whereIn('id', $rating->parameters()->pluck('parameters.id'));
                        })->get())->map(function($parameterTarget) use ($rating, $user) {
                            return array_merge(
                                $parameterTarget->toArray(), [
                                    'parameters' => collect($parameterTarget->parameters()->whereHas(
                                        'submissions', function($q) use ($rating, $user) {
                                            $q->where('rating_id', $rating->id)->where('user_id', $user->id);
                                        }
                                    )->get())->map(function($parameter) use ($rating, $user) {
                                        return array_merge(
                                            $parameter->toArray(), [
                                                'submissions' => collect(
                                                    $user->submissions()->where([
                                                        'rating_id' => $rating->id,
                                                        'parameter_id' => $parameter->id   
                                                    ])->get()
                                                )->map(function($submission) {
                                                    return array_merge(
                                                        $submission->toArray(), [
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
                                }),
                                'employements' => $user->employements ? $user->getEmployements(NULL, DB::raw('CURDATE()'))->map(function($employement) {
                                    return array_merge(
                                        $employement->toArray(), [
                                            'department' => $employement->department->toArray(),
                                            'position' => $employement->position->toArray(),
                                        ]
                                    );
                                }) : array()
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
        $input = request()->all();

        $rating = Rating::findOrFail($input['rating']);
        $user = User::findOrFail($input['user']);

        if (strtotime($rating->getTime3()) > time()) {
            session()->flash('flash.banner', ['pages.dashboard.approvement.list.banner[0]']);
            session()->flash('flash.bannerStyle', 'danger');
            return back();
        } else if (strtotime($rating->getTime4()) < time()) {
            session()->flash('flash.banner', ['pages.dashboard.approvement.list.banner[1]']);
            session()->flash('flash.bannerStyle', 'danger');
            return back();
        } else {
            session()->flash('flash.banner', ['pages.dashboard.approvement.list.banner[2]']);
            session()->flash('flash.bannerStyle', 'success');
        }

        $user->approveRating($rating);
        $user->save();

        return request()->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'approvement-create');
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
        $submission = Submission::findOrFail($id);
        $parameter = $submission->parameter;
        $rating = $submission->rating;
        $form = $rating->parameterForm($parameter);
        $verifications = $submission->verifications;

        return Inertia::render('Dashboard/Approvement/Show', [
            'submission' => array_merge(
                $submission->toArray(), [
                    'readonly' => true,
                    'rating' => $submission->rating->toArray(),
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
