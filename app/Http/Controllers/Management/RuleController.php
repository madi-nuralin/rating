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
        $validationRules = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'input_id' => ['required', 'string', 'max:255'],
            'input_label' => ['required', 'string', 'max:255'],
        ];

        switch ( $input['type'] ) {
            case 'metadata':
                $validationRules = array_merge($validationRules, [
                    'input_type' => ['required', 'in:text,select'],
                    'input_validation' => ['required', 'string', 'max:255']
                ]);
                break;

            case 'submission':
                $validationRules = array_merge($validationRules, [
                    'input_type' => ['required', 'in:file,link'],
                    'input_validation' => ['required', 'string', 'max:255']
                ]);
                break;

            case 'formula':
                $validationRules = array_merge($validationRules, [
                    'input_expression_type' => ['required', 'in:php'],
                    'input_expression' => ['required', 'string'],
                ]);
                break;

            default:
                throw ValidationException::withMessages([
                    'type' => 'Please select rule type.',
                ]);
        }

        Validator::make($input, $validationRules)
                    ->validateWithBag('createRule');

        $rule = Rule::create(['type' => $input['type']]);
        $rule->setName($input['name']);
        $rule->setDescription($input['description']);
        $rule->setInputId($input['input_id']);
        $rule->setInputLabel($input['input_label']);

        switch ( $input['type'] ) {
            case 'metadata':
            case 'submission':
                $rule->setInputType($input['input_type']);
                $rule->setInputValidation($input['input_validation']);
                break;
            case 'formula':
                $rule->setInputExpression($input['input_expression']);
                $rule->setInputExpressionType($input['input_expression_type']);
                break;
            default:
                break;
        }

        $rule->save();
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
        $rule = Rule::findOrFail($id);

        return Inertia::render('Management/Parameters/Rules/Show', [
            'rule' => array_merge(
                $rule->toArray(), [
                    'options' => $rule->getOptions()
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

        $validationRules = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'input_id' => ['required', 'string', 'max:255'],
            'input_label' => ['required', 'string', 'max:255'],
        ];

        switch ( $rule->getType() ) {
            case 'metadata':
                $validationRules = array_merge($validationRules, [
                    'input_type' => ['required', 'in:text,select'],
                    'input_validation' => ['required', 'string', 'max:255']
                ]);
                break;

            case 'submission':
                $validationRules = array_merge($validationRules, [
                    'input_type' => ['required', 'in:file,link'],
                    'input_validation' => ['required', 'string', 'max:255']
                ]);
                break;

            case 'formula':
                $validationRules = array_merge($validationRules, [
                    'input_expression_type' => ['required', 'in:php'],
                    'input_expression' => ['required', 'string'],
                ]);
                break;

            default:
                throw ValidationException::withMessages([
                    'type' => 'Please select rule type.',
                ]);
        }

        Validator::make($input, $validationRules)
                    ->validateWithBag('updateRule');

        $rule->setName($input['name']);
        $rule->setDescription($input['description']);
        $rule->setInputId($input['input_id']);
        $rule->setInputLabel($input['input_label']);

        switch ( $rule->getType() ) {
            case 'metadata':
            case 'submission':
                $rule->setInputType($input['input_type']);
                $rule->setInputValidation($input['input_validation']);
                break;
            case 'formula':
                $rule->setInputExpression($input['input_expression']);
                $rule->setInputExpressionType($input['input_expression_type']);
                break;
            default:
                break;
        }

        $rule->save();

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
