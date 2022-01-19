<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use MathParser\StdMathParser;
use MathParser\Interpreting\Evaluator;

use App\Models\Forms\Form;
use App\Models\Forms\FormField;

class FormFieldController extends Controller
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
        return Inertia::render('Forms/FormField/Create', [
            'form' => Form::findOrfail(request()->input('form'))
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
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'scoring_policy' => ['required', 'string'],
            'score' => ['numeric', 'nullable'],
            'validation_rules' => ['array', 'nullable']
        ])->validateWithBag('createFormField');

        /*if (isset($input['formula'])) {

            $parser = new StdMathParser();

            try {
                $formula = $parser->parse($input['formula']);
            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    'formula' => $e->getMessage(),
                ]);
            }
        }*/

        $form = Form::findOrFail($input['form']);
        $formField = FormField::create([
            'form_id' => $input['form'],
            'type' => $input['type'],
            'scoring_policy' => $input['scoring_policy'],
            'score' => $input['score'] ?? 0,
            'validation_rules' => json_encode($input['validation_rules'])
        ]);
        $formField->setLabel($input['label']);
        $formField->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('form.show', ['form' => $form->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('form.show', ['form' => $form->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formField = FormField::findOrFail($id);

        return Inertia::render('Forms/Fields/Show', [
            'field' => array_merge(
                $formField->toArray(), [
                    'options' => $formField->getOptions(),
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

        Validator::make($input, [
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'scoring_policy' => ['required', 'string'],
            'score' => ['numeric', 'nullable'],
            'validation_rules' => ['array', 'nullable']
        ])->validateWithBag('updateFormField');

        /*if (isset($input['formula'])) {

            $parser = new StdMathParser();
            
            try {
                $formula = $parser->parse($input['formula']);
            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    'formula' => $e->getMessage(),
                ]);
            }
        }*/

        $formField = FormField::findOrfail($id);
        $formField->setLabel($input['label']);
        $formField->setType($input['type']);
        $formField->setScoringPolicy($input['scoring_policy']);
        $formField->setScore($input['score']);
        $formField->setValidationRules($input['validation_rules']);
        $formField->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'form-field-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formField = FormField::findOrfail($id);
        $form = $formField->field;
        $formField->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('parameter.show', ['parameter' => $form->parameter->getId()]));
    }
}
