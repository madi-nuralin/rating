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
            'required' => ['nullable', 'boolean'],
            'nullable' => ['nullable', 'boolean'],
            'min_size' => ['nullable', 'numeric'],
            'max_size' => ['nullable', 'numeric'],
            'file_size' => ['nullable', 'numeric'],
            'mimes' => ['nullable', 'array'],
            'variable' => ['nullable', 'string', 'alpha']
        ])->validateWithBag('createFormField');

        $form = Form::findOrFail($input['form']);
        $formField = FormField::create([
            'form_id' => $input['form'],
            'type' => $input['type'],
            'score' => $input['score'] ?? 0,
            'variable' => $input['variable']
        ]);
        $formField->setValidationRules($this->encodeValidationRules($input));
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
            'required' => ['nullable', 'boolean'],
            'nullable' => ['nullable', 'boolean'],
            'min_size' => ['nullable', 'numeric'],
            'max_size' => ['nullable', 'numeric'],
            'file_size' => ['nullable', 'numeric'],
            'mimes' => ['nullable','array'],
            'variable' => ['nullable', 'string', 'alpha']
        ])->validateWithBag('updateFormField');

        $formField = FormField::findOrfail($id);
        $formField->setLabel($input['label']);
        $formField->setType($input['type']);
        $formField->setValidationRules($this->encodeValidationRules($input));
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

        if (array_key_exists('required', $input)) {
            $validationRules['required'] = $input['required'];
        }

        if (array_key_exists('nullable', $input)) {
            $validationRules['nullable'] = $input['nullable'];
        }

        switch ($input['type']) {
            case FormField::NUMBER:
                if (isset($input['is_integer']))
                    $validationRules['is_integer'] = true;
                else 
                    $validationRules['is_numeric'] = true;

                if (isset($input['min_size']))
                    $validationRules['min_size'] = $input['min_size'];
                if (isset($input['max_size']))
                    $validationRules['max_size'] = $input['max_size'];
                break;

            case FormField::TEXT:
            case FormField::TEXTAREA:
                $validationRules['is_string'] = true;

                if (isset($input['min_size']))
                    $validationRules['min_size'] = $input['min_size'] ? $input['min_size'] : 0;
                if (isset($input['max_size']))
                    $validationRules['max_size'] = $input['max_size'] ? $input['max_size'] : 255;
                break;

            case FormField::EMAIL:
                $validationRules['email'] = implode(",", array('', ''));
                break;

            case FormField::URL:
                $validationRules['url'] = true;
                break;

            case FormField::FILE:
                $validationRules['file'] = true;
                $validationRules['file_size'] = $input['file_size'] ? $input['file_size'] : 100;
                if (isset($input['mimes'])) {
                    $validationRules['mimes'] = implode(",", $input['mimes']); 
                }
                break;

            case FormField::TIME:
                $validationRules['date_format'] = 'H:i';
                break;

            case FormField::DATE:
                $validationRules['date_format'] = 'Y-m-d';
                break;

            case FormField::DATETIME:
                $validationRules['date_format'] = 'Y-m-d\TH:i';
                break;

            default:
                # code...
                break;
        }

        return $validationRules;
    }
}
