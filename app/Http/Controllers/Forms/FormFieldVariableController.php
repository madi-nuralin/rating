<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldVariable;

class FormFieldVariableController extends Controller
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
        return Inertia::render('Forms/Fields/Variables/Create', [
            'field' => FormField::findOrfail(request()->input('field'))
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
        $formField = FormField::findOrfail($input['field']);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createFormFieldVariable');


        $formFieldVariable = FormFieldVariable::create([
            'form_field_id' => $input['field']
        ]);
        $formFieldVariable->setName($input['name']);
        $formFieldVariable->setDescription($input['description']);
        $formFieldVariable->save();

        return Inertia::location(route('form-field-variable.show', ['form_field_variable' => $formFieldVariable->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formFieldVariable = FormFieldVariable::findOrFail($id);

        return Inertia::render('Forms/Fields/Variables/Show', [
            'variable' => $formFieldVariable->toArray(),
            'field' => $formFieldVariable->getFormField()
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
        $formField = FormFieldVariable::findOrfail($id)->field;

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateFormFieldVariable');

        $formFieldVariable = FormFieldVariable::findOrfail($id);
        $formFieldVariable->setName($input['name']);
        $formFieldVariable->setDescription($input['description']);
        $formFieldVariable->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'form-field-variable-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formFieldVariable = FormFieldVariable::findOrfail($id);
        $formField = $formFieldVariable->field;
        $formFieldVariable->delete();

        return Inertia::location(route('form-field.show', ['form_field' => $formField->getId()]));
    }
}
