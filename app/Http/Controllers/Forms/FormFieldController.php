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
        return Inertia::render('Forms/Fields/Create', [
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
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required'],
        ])->validateWithBag('createFormField');

        if ($input['type'] == 'formula') {
            Validator::make($input, [
                'formula' => ['required'],
            ])->validateWithBag('createFormField');

            // TODO: Validate math expression ...
        }

        $formField = FormField::create([
            'form_id' => $input['form'],
            'type' => $input['type']
        ]);
        $formField->setName($input['name']);

        if ($input['type'] == 'formula') {
            $formField->setFormula($input['formula']);
        }

        $formField->save();

        return Inertia::location(route('form-field.show', ['form_field' => $formField->getId()]));
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
                    'variables' => $formField->getVariables()
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
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required'],
        ])->validateWithBag('updateFormField');

        if ($input['type'] == 'formula') {
            Validator::make($input, [
                'formula' => ['required'],
            ])->validateWithBag('updateFormField');

            // TODO: Validate math expression ...
        }

        $formField = FormField::findOrfail($id);
        $formField->setName($input['name']);
        $formField->setType($input['type']);

        if ($input['type'] == 'formula') {
            $formField->setFormula($input['formula']);
        }

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
        //
    }
}
