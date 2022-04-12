<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use DB;

use App\Models\User;
use App\Models\Rating;
use App\Models\Submission;
use App\Models\ParameterTarget;
use App\Models\Verifier;
use App\Models\Verification;
use App\Models\VerificationStatus;
use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldResponce;

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

        return Inertia::render('Dashboard/Submission/Index', [
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
                                })
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

        if (strtotime($rating->getTime1()) > time()) {
            session()->flash('flash.banner', ['pages.dashboard.submission.list.banner[0]']);
            session()->flash('flash.bannerStyle', 'danger');
            return back();
        }

        if (strtotime($rating->getTime2()) < time()) {
            session()->flash('flash.banner', ['pages.dashboard.submission.list.banner[1]']);
            session()->flash('flash.bannerStyle', 'danger');
            return back();
        }

        return Inertia::location(route('wizard.submission.create', ['rating' => request()->input('rating')]));    }

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
        $submission = Submission::findOrFail($id);
        $parameter = $submission->parameter;
        $rating = $submission->rating;
        $form = $rating->parameterForm($parameter);
        $verifications = $submission->verifications;

        return Inertia::render('Dashboard/Submission/Show', [
            'submission' => array_merge(
                $submission->toArray(), [
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
        $input = $request->all();

        Submission::updateHelper($request, $id, 'updateSubmission');

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'submission-updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);
        $rating = $submission->rating;

        $submission->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('submission.index', ['rating' => $rating->id]));
    }

    public function destroyFile() {
        $input = request()->all();

        if (isset($input['submission']) && isset($input['form_field'])) {
            $submission = Submission::findOrFail($input['submission']);
            $formField = FormField::findOrFail($input['form_field']);

            $formFieldResponce = $submission->formFieldResponces()
                                            ->where('form_field_id', $formField->id)
                                            ->first();

            if (is_null($formFieldResponce)) {
                $submission->createFormFieldResponce($formField, null);
            } else {                          
                $formFieldResponce->setValue(null);
            }

            //$formFieldResponce->delete();
        }

        return /*redirect()->route('submission.show', ['submission' => $submission->id]);*/back(303)->with('status', 'file-deleted');
    }
}
