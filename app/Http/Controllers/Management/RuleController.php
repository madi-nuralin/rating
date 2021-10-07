<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;


use App\Models\Parameter;
use App\Models\Rule;

class RuleController extends Controller
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
        return Inertia::render('Management/Parameters/Rules/Create', [
            'parameter' => Parameter::findOrFail(request()->input('parameter'))
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
        $parameter = Parameter::findOrFail($input['parameter']);
        $rule = null;

        switch ( $input['type'] ) {
            case 'metadata':
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                    'validation_rules' => ['required', 'string', 'max:255'],
                ])->validateWithBag('createRule');

                if (! in_array($input['input_type'], array('text', 'select')) ) {
                    throw ValidationException::withMessages([
                        'input_type' => 'Please select input type.',
                    ]);
                }

                $rule = Rule::create(['type' => $input['type']]);
                $rule->setName($input['name']);
                $rule->setDescription($input['description']);
                $rule->setInputType($input['input_type']);
                $rule->setValidationRules($input['validation_rules']);
                $rule->save();

                break;

            case 'formula':
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                    'math_expression' => ['required', 'string', 'max:255'],
                ])->validateWithBag('createRule');

                $rule = Rule::create(['type' => $input['type']]);
                $rule->setName($input['name']);
                $rule->setDescription($input['description']);
                $rule->setMathExpression($input['math_expression']);
                $rule->save();

                break;

            case 'submission':
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                    'validation_rules' => ['required', 'string', 'max:255']
                ])->validateWithBag('createRule');

                if (! in_array($input['input_type'], array('file', 'link')) ) {
                    throw ValidationException::withMessages([
                        'input_type' => 'Please select input type.',
                    ]);
                }

                $rule = Rule::create(['type' => $input['type']]);
                $rule->setName($input['name']);
                $rule->setDescription($input['description']);
                $rule->setInputType($input['input_type']);
                $rule->setValidationRules($input['validation_rules']);
                $rule->save();

                break;

            default:
                throw ValidationException::withMessages([
                    'type' => 'Please select rule type.',
                ]);
        }

        $parameter->rules()->attach($rule->getId());

        return Inertia::location(route('rule.show', ['rule' => $rule->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Management/Parameters/Rules/Show', [
            'rule' => Rule::findOrFail($id)->toArray()
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
        $rule = Rule::findOrFail($id);

        switch ( $rule->getType() ) {
            case 'metadata':
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                    'validation_rules' => ['required', 'string', 'max:255'],
                ])->validateWithBag('updateRule');

                if (! in_array($input['input_type'], array('text', 'select')) ) {
                    throw ValidationException::withMessages([
                        'input_type' => 'Please select input type.',
                    ]);
                }

                $rule->setName($input['name']);
                $rule->setDescription($input['description']);
                $rule->setInputType($input['input_type']);
                $rule->setValidationRules($input['validation_rules']);
                $rule->save();

                break;

            case 'formula':
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                    'math_expression' => ['required', 'string', 'max:255'],
                ])->validateWithBag('updateRule');

                $rule->setName($input['name']);
                $rule->setDescription($input['description']);
                $rule->setMathExpression($input['math_expression']);
                $rule->save();

                break;

            case 'submission':
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                    'validation_rules' => ['required', 'string', 'max:255']
                ])->validateWithBag('updateRule');

                if (! in_array($input['input_type'], array('file', 'link')) ) {
                    throw ValidationException::withMessages([
                        'input_type' => 'Please select input type.',
                    ]);
                }

                $rule->setName($input['name']);
                $rule->setDescription($input['description']);
                $rule->setInputType($input['input_type']);
                $rule->setValidationRules($input['validation_rules']);
                $rule->save();

                break;

            default:
                throw ValidationException::withMessages([
                    'type' => 'Please select rule type.',
                ]);
        }

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'rule-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rule = Rule::findOrFail($id);
        $parameter = $rule->parameters()->first();
        $rule->delete();


        return Inertia::location(route('parameter.show', ['parameter' => $parameter->getId()]));
    }
}
