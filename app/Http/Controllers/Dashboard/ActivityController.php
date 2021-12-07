<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use MathParser\StdMathParser;
use MathParser\Interpreting\Evaluator;

use App\Models\Assignment;
use App\Models\Activity;
use App\Models\Parameter;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldOption;
use App\Models\Forms\FormFieldValue;

class ActivityController extends Controller
{
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
        $assignment = Assignment::findOrFail(request()->input('assignment'));

        return Inertia::render('Dashboard/Activities/Create', [
            'assignment' => array_merge(
                $assignment->toArray(), [
                    'assessment' => array_merge(
                        $assignment->assessment
                                   ->toArray(), [
                            'parameters' => $assignment->assessment
                                                       ->parameters
                                                       ->map(function($parameter) {
                                return array_merge(
                                    $parameter->toArray(), [
                                        'form' => array_merge(
                                            $parameter->form
                                                      ->toArray(), [
                                                'fields' => $parameter->form
                                                                      ->fields ?
                                                            $parameter->form
                                                                      ->fields
                                                                      ->map(function($formField) {
                                                    return array_merge(
                                                        $formField->toArray(), [
                                                            'options' => $formField->getOptions()
                                                        ]
                                                    );
                                                }) : []
                                            ]
                                        )
                                    ]
                                );
                            })
                        ]
                    )
                ]
            ),
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
        $input = $request->all();

        Validator::make($input, [
            'parameter' => ['required'],
        ])->validateWithBag('createActivity');

        $parameter = Parameter::findOrFail($input['parameter']);
        $assignment = Assignment::findOrFail($input['assignment']);

        $activity = new Activity();
        $activity->setParameter($parameter->getId());
        $activity->setAssignment($assignment->getId());
        $activity->setScore($parameter->getScore());

        if (array_key_exists('fields', $input))
            $this->_validate($input['fields'], 'createActivity');

        $activity->save();

        if (array_key_exists('fields', $input)) {
            foreach ($input['fields'] as $key => $field) {

                $formField = FormField::findOrFail($field['id']);

                if ($formField->getType() == FormField::MULTISELECT) {
                    foreach ($field['value'] as $value) {
                        $this->addFormFieldValuesToActivity($formField, $key, $value, $activity, 'createActivity');
                    }
                } else {
                    $this->addFormFieldValuesToActivity($formField, $key,  $field['value'], $activity, 'createActivity');
                }
            }
        }

        $activity->save();

        $activity->assignment->addScore($activity->getScore());
        $activity->assignment->save();

        return Inertia::location(route('assignment.show', ['assignment' => $assignment->getId()]));
    }

    private function _validate($input, $errorBag) {
        $rules = [];
        $array = [];

        foreach ($input as $key => $field) {

            $formField = FormField::findOrFail($field['id']);
            $array[$key] = $field['value'];

            switch ($formField->getType()) {
                case FormField::TEXT:
                    $rules[$key] = ['required','max:255'];
                    break;
                case FormField::SELECT:
                    $rules[$key] = ['required'];
                    break;
                case FormField::MULTISELECT:
                    $rules[$key] = ['required'];
                    break;
                case FormField::FILE:
                    $rules[$key] = ['required', 'max:2048'];
                    break;
                default:
                    break;
            }
                
        }

        Validator::make($array, $rules)->validateWithBag($errorBag);
    }

    private function addFormFieldValuesToActivity($formField, $key, $value, $activity, $errorBag) {
        $formFieldValue = FormFieldValue::create([
            'form_field_id' => $formField->getId(),
        ]);
        
        if ($formField->getFormula() !== null) {
            try {
                $parser = new StdMathParser();
                // Generate an abstract syntax tree
                $formula = $parser->parse($formField->getFormula());

                $evaluator = new Evaluator();
                $evaluator->setVariables([ 'x' => $value ]);
                $activity->addScore($formula->accept($evaluator));

            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    $key => $e->getMessage(),
                ]);
            }
        }

        $formFieldValue->setContext($value);
        $formFieldValue->save();

        $activity->addFormFieldValues([$formFieldValue->getId()]);

        if ( in_array( $formField->getType(), array( FormField::SELECT, FormField::MULTISELECT ) ) ) {
            $activity->addScore($formField->options->find($value)->getScore());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);

        return Inertia::render('Dashboard/Activities/Show', [
            'activity' => array_merge(
                $activity->toArray(), [
                    'parameter' => array_merge(
                        $activity->parameter
                                 ->toArray(), [
                            'form' => array_merge(
                                $activity->parameter
                                         ->form
                                         ->toArray(), [
                                    'fields' => $activity->parameter
                                                         ->form
                                                         ->fields ?
                                                $activity->parameter
                                                         ->form
                                                         ->fields
                                                         ->map(function($formField) use ($activity) {
                                        return array_merge(
                                            $formField->toArray(), [
                                                'options' => $formField->getOptions(),
                                                'values' => collect(
                                                    $activity->formFieldValues()
                                                             ->where('form_field_id', $formField->getId())
                                                             ->get()
                                                )->map(function($formFieldValue) {
                                                    return $formFieldValue->getContext();
                                                })
                                            ]
                                        );
                                    }) : []
                                ]
                            )
                        ]
                    ),
                    'assignment' => $activity->getAssignment()
                ]
            ),
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
        $activity = Activity::findOrFail($id);

        return Inertia::render('Dashboard/Activities/Edit', [
            'activity' => array_merge(
                $activity->toArray(), [
                    'parameter' => array_merge(
                        $activity->parameter
                                 ->toArray(), [
                            'form' => array_merge(
                                $activity->parameter
                                         ->form
                                         ->toArray(), [
                                    'fields' => $activity->parameter
                                                         ->form
                                                         ->fields ?
                                                $activity->parameter
                                                         ->form
                                                         ->fields
                                                         ->map(function($formField) use ($activity) {
                                        return array_merge(
                                            $formField->toArray(), [
                                                'options' => $formField->getOptions(),
                                                'values' => collect(
                                                    $activity->formFieldValues()
                                                             ->where('form_field_id', $formField->getId())
                                                             ->get()
                                                )->map(function($formFieldValue) {
                                                    return $formFieldValue->getContext();
                                                })
                                            ]
                                        );
                                    }) : []
                                ]
                            )
                        ]
                    ),
                    'assignment' => $activity->getAssignment()
                ]
            ),
        ]);
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
        $activity = Activity::findOrFail($id);

        $activity->assignment->subScore($activity->getScore());
        $activity->setScore($activity->parameter->getScore());

        if (array_key_exists('fields', $input)) {

            $this->_validate($input['fields'], 'updateActivity');

            foreach ($input['fields'] as $key => $field) {

                $formField = FormField::find($field['id']);

                switch ($formField->getType()) {
                    case FormField::TEXT:
                        $formFieldValue = $activity->formFieldValues()->firstWhere('form_field_id', $formField->id);
                        $formFieldValue->setContext($field['value']);
                        if ($formField->getFormula() !== null) {
                            try {
                                $parser = new StdMathParser();
                                // Generate an abstract syntax tree
                                $formula = $parser->parse($formField->getFormula());

                                $evaluator = new Evaluator();
                                $evaluator->setVariables([ 'x' => $field['value']]);
                                $activity->addScore($formula->accept($evaluator));

                            } catch (\Exception $e) {
                                throw ValidationException::withMessages([
                                    $key => $e->getMessage(),
                                ]);
                            }
                        }
                        break;

                    case FormField::SELECT:
                        $formFieldValue = $activity->formFieldValues()->firstWhere('form_field_id', $formField->id);
                        $formFieldValue->setContext($field['value']);
                        $activity->addScore($formField->options->find($field['value'])->getScore());
                        break;

                    case FormField::MULTISELECT:
                        $activity->formFieldValues()->where('form_field_id', $formField->id)->delete();

                        foreach ($field['value'] as $value) {
                            $this->addFormFieldValuesToActivity($formField,  $key, $value, $activity, 'updateActivity');
                        }
                        break;

                    case FormField::FILE:
                        break;
                    default:
                        break;
                }
            }
        }

        $activity->assignment->addScore($activity->getScore());
        $activity->assignment->save();
        $activity->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'activity-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $assignment = $activity->assignment;
        $assignment->subScore($activity->getScore());
        $assignment->save();
        $activity->delete();

        return Inertia::location(route('assignment.show', ['assignment' => $assignment->getId()]));
    }
}
