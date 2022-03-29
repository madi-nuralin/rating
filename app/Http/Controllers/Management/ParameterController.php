<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\ParameterTarget;
use App\Models\Parameter;
use App\Models\Forms\Form;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Management/Parameter/Index', [
            'parameters' => Parameter::paginate(10)->through(function($parameter) {
                return array_merge(
                    $parameter->toArray(), [
                        'parameter_target' => $parameter->parameterTarget->toArray()
                    ]
                );
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Management/Parameter/Create', [
            'parameter_targets' => ParameterTarget::all()->map(function($parameterTarget) {
                return $parameterTarget->toArray();
            }),
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
            'description' => ['required', 'string', 'max:2048'],
            'parameter_target' => ['required', 'numeric'],
        ])->validateWithBag('createParameter');

        $parameterTarget = ParameterTarget::findOrFail($input['parameter_target']);

        $parameter = Parameter::create([
            'parameter_target_id' => $parameterTarget->getId()
        ]);

        $parameter->setName($input['name']);
        $parameter->setDescription($input['description']);
        $parameter->save();

        return Inertia::location(route('parameter.show', ['parameter' => $parameter->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parameter = Parameter::findOrFail($id);

        return Inertia::render('Management/Parameter/Show', [
            'parameter' => array_merge(
                $parameter->toArray(), [
                    'forms' => $parameter->forms ? $parameter->forms()->paginate(10)->through(function($form) {
                        return $form->toArray();
                    }) : array(),
                    'parameter_target' => $parameter->parameterTarget->toArray()
                ]
            ),
            'parameter_targets' => ParameterTarget::all()->map(function($parameterTarget) {
                return $parameterTarget->toArray();
            })
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
            'description' => ['required', 'string', 'max:2048'],
            'parameter_target' => ['required', 'numeric']
        ])->validateWithBag('updateParameter');

        $parameter = Parameter::findOrFail($id);
        $parameterTarget = ParameterTarget::findOrFail($input['parameter_target']);
        
        $parameter->setName($input['name']);    
        $parameter->setDescription($input['description']);
        $parameter->setParameterTarget($parameterTarget);
        $parameter->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'parameter-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Parameter::findOrFail($id)->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('parameter.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formCreate()
    {
        return Inertia::render('Management/Parameter/Form/Create', [
            'parameter' => Parameter::findOrfail(request()->input('parameter'))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formStore(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2048'],
        ])->validateWithBag('createForm');

        $parameter = Parameter::findOrfail($input['parameter']);
        $form = Form::create();
        $form->setName($input['name']);
        $form->setDescription($input['description']);
        $form->save();

        $parameter->addForm($form);
        $parameter->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('form.show', ['form' => $form->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('parameter.show', ['parameter' => $parameter->getId()]));
    }
}
