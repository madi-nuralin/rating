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
                                                'verifications' => $submission->verifications->map(function($verification) {
                                                    return array_merge(
                                                        $verification->toArray(), [
                                                            'verifier' => array_merge(
                                                                $verification->verifier->toArray(), [
                                                                    'user' => $verification->verifier->user->toArray()
                                                                ]
                                                            ),
                                                            'status' => $verification->verificationStatus->toArray()
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
        /*$rating = Rating::findOrFail(request()->input('rating'));
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

        ]);*/
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
        $form = $parameter->activeForm;

        return Inertia::render('Rating/Submission/Show', [
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
                    )
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

        $submission = Submission::findOrFail($id);
        $parameter = $submission->parameter;
        $form = $parameter->activeForm;

        if ($form) {
            $rules = [];

            foreach ($form->fields as $formField) {
                $rules["field{$formField->id}"] = $formField->rules();
            }

            Validator::make($input, $rules)->validateWithBag('updateSubmission');

            foreach ($form->fields as $formField) {
                $formFieldResponce = $submission->formFieldResponces()
                                                ->where('form_field_id', $formField->id)
                                                ->first();
                                                
                $formFieldResponce->setValue($input["field{$formField->id}"]);
            }
        }

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
}
