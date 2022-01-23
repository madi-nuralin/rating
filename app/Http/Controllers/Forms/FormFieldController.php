<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

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
            'required' => ['required', 'boolean'],
            'nullable' => ['nullable'],
            'min_size' => ['nullable', 'numeric', 'min:0', 'max:2048'],
            'max_size' => ['nullable', 'numeric', 'min:0', 'max:2048'],
            'file_size' => ['nullable', 'numeric'],
            'mimes' => ['array'],
            'variable' => ['nullable', 'string', 'alpha']
        ])->validateWithBag('createFormField');

        $form = Form::findOrFail($input['form']);
        $formField = FormField::create([
            'form_id' => $input['form'],
            'type' => $input['type'],
            'score' => $input['score'] ?? 0,
            'validation_rules' => json_encode($this->encodeValidationRules($input)),
            'variable' => $input['variable']
        ]);
        $formField->setLabel($input['label']);
        $formField->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('form-field.show', ['form_field' => $formField->getId()])
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

        return Inertia::render('Forms/FormField/Show', [
            'field' => array_merge(
                $formField->toArray(), [
                    'options' => $formField->options()->paginate(10)->through(function($option) {
                        return $option->toArray();
                    }),
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
            'required' => ['required', 'boolean'],
            'nullable' => ['nullable'],
            'min_size' => ['nullable', 'numeric', 'min:0', 'max:2048'],
            'max_size' => ['nullable', 'numeric', 'min:0', 'max:2048'],
            'file_size' => ['nullable', 'numeric'],
            'mimes' => ['nullable','array'],
            'variable' => ['nullable', 'string', 'alpha']
        ])->validateWithBag('updateFormField');

        $formField = FormField::findOrfail($id);
        $formField->setLabel($input['label']);
        $formField->setType($input['type']);
        $formField->setValidationRules(json_encode($this->encodeValidationRules($input)));
        $formField->setVariable($input['variable']);
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
        $form = $formField->form;
        $formField->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('form.show', ['form' => $form->getId()]));
    }

    /**
     * Encode validation rules
     *
     * @param $input
     * @return array
     */
    protected function encodeValidationRules($input) {
        $validationRules = array();

        if ($input['required']) {
            $validationRules['required'] = $input['required'];
        }
        if ($input['nullable']) {
            $validationRules['nullable'] = $input['nullable'];
        }

        if (in_array($input['type'], array(FormField::TEXT, FormField::TEXTAREA))) {
            $validationRules['min_size'] = $input['min_size'] ? $input['min_size'] : 0;
            $validationRules['max_size'] = $input['max_size'] ? $input['max_size'] : 255;
        }

        if (in_array($input['type'], array(FormField::FILE))) {
            $validationRules['file_size'] = $input['file_size'] ? $input['file_size'] : 100;

            if ($input['mimes']) {
                $validationRules['mimes'] = implode(",", $input['mimes']); 
            }
        }

        return $validationRules;
    }
}
