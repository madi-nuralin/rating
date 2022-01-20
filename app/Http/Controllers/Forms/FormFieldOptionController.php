<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldOption;

class FormFieldOptionController extends Controller
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
        return Inertia::render('Forms/FormFieldOption/Create', [
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

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createFormFieldOption');

        $formField = FormField::findOrfail($input['field']);
        $formFieldOption = FormFieldOption::create([
            'form_field_id' => $formField->getId()
        ]);
        $formFieldOption->setName($input['name']);
        $formFieldOption->setDescription($input['description']);
        $formFieldOption->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('form-field-option.show', ['form_field_option' => $formFieldOption->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

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
        $formFieldOption = FormFieldOption::findOrFail($id);

        return Inertia::render('Forms/FormFieldOption/Show', [
            'option' => $formFieldOption->toArray(),
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
            'description' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateFormFieldOption');

        $formFieldOption = FormFieldOption::findOrfail($id);
        $formFieldOption->setName($input['name']);
        $formFieldOption->setDescription($input['description']);
        $formFieldOption->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'form-field-option-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formFieldOption = FormFieldOption::findOrfail($id);
        $formField = $formFieldOption->formField;
        $formFieldOption->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('form-field.show', ['form_field' => $formField->getId()]));
    }
}
