<?php

namespace App\Http\Controllers\Management\Rule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use DB;

use App\Models\Rule;
use App\Models\RuleOption;

class OptionController extends Controller
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
        return Inertia::render('Management/Parameters/Rules/Options/Create', [
            'rule' => Rule::findOrFail(request()->input('rule'))
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
        ])->validateWithBag('createOption');

        $rule = Rule::findOrFail($input['rule']);
        $option = $rule->options()->create();
        $option->setName($input['name']);
        $option->setDescription($input['description']);
        $option->save();

        return Inertia::location(route('option.show', ['option' => $option->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $option = RuleOption::findOrFail($id);

        return Inertia::render('Management/Parameters/Rules/Options/Show', [
            'option' => $option->toArray(),
            'rule' => $option->getRule()
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

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updatePosition');

        $option = RuleOption::findOrFail($id);
        
        if ( $option->getName() != $input['name'] ) {
            $option->setName($input['name']);    
        }

        if ( $option->getDescription() != $input['description'] ) {
            $option->setDescription($input['description']);
        }

        $option->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'option-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = RuleOption::findOrFail($id);
        $rule = $option->rule;
        $option->delete();

        return Inertia::location(route('rule.show', ['rule' => $rule->getId()]));
    }
}
