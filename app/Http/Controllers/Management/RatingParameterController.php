<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Rating;
use App\Models\User;
use App\Models\Parameter;
use App\Models\ParameterTarget;
use App\Models\Forms\Form;

class RatingParameterController extends Controller
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
    public function create($rating)
    {
        return Inertia::render('Management/Rating/Partials/Parameter/Create', [
            'rating' => Rating::findOrFail($rating)->toArray(),
            'parameter_targets' => ParameterTarget::all()->map(function($parameterTarget) {
                return array_merge(
                    $parameterTarget->toArray(), [
                        'parameters' => $parameterTarget->parameters ? $parameterTarget->parameters->map(function($parameter) {
                            return array_merge(
                                $parameter->toArray(), [
                                    'parameter_target' => $parameter->parameterTarget->toArray(),
                                    'forms' => $parameter->forms ? $parameter->forms->map(function($form) {
                                        return $form->toArray();
                                    }) : []
                                ]
                            );
                        }) : []
                    ]
                );
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $rating)
    {
        $input = $request->all();

        Validator::make($input, [
            'parameter_target' => ['required', 'numeric'],
            'parameter' => ['required', 'numeric'],
            'form' => ['required', 'numeric']
        ])->validateWithBag('createRatingParameter');

        $rating = Rating::findOrFail($rating);
        $parameterTarget = ParameterTarget::findOrFail($input['parameter_target']);
        $parameter = Parameter::findOrFail($input['parameter']);
        $form = Form::findOrFail($input['form']);

        $rating->addParameterWithForm($parameter, $form);

        $rating->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('rating.parameter.show', ['rating' => $rating->id, 'parameter' => $parameter->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('rating.show', ['rating' => $rating->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($rating, $parameter)
    {
        $rating = Rating::findOrFail($rating);
        $parameter = Parameter::findOrFail($parameter);

        return Inertia::render('Management/Rating/Partials/Parameter/Show', [
            'rating' => $rating->toArray(),
            'parameter' => array_merge(
                $parameter->toArray(), [
                    'parameter_target' => $parameter->parameterTarget->toArray(),
                    'form' => Form::findOrFail($rating->parameters()->firstWhere('parameter_id', $parameter->id)->pivot->form_id)->toArray()
                ]
            ),
            'parameter_targets' => ParameterTarget::all()->map(function($parameterTarget) {
                return array_merge(
                    $parameterTarget->toArray(), [
                        'parameters' => $parameterTarget->parameters ? $parameterTarget->parameters->map(function($parameter) {
                            return array_merge(
                                $parameter->toArray(), [
                                    'parameter_target' => $parameter->parameterTarget->toArray(),
                                    'forms' => $parameter->forms ? $parameter->forms->map(function($form) {
                                        return $form->toArray();
                                    }) : []
                                ]
                            );
                        }) : []
                    ]
                );
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
    public function update(Request $request, $rating, $parameter)
    {
        $input = $request->all();

        Validator::make($input, [
            'form' => ['required', 'numeric']
        ])->validateWithBag('updateRatingParameter');

        $rating = Rating::findOrFail($rating);
        $parameter = Parameter::findOrFail($parameter);
        $form = Form::findOrFail($input['form']);

        $rating->addParameterWithForm($parameter, $form);
        $rating->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'rating-parameter-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rating, $parameter)
    {
        $rating = Rating::findOrFail($rating);
        $parameter = Parameter::findOrFail($parameter);

        $rating->deleteParameter($parameter);
        $rating->save();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('rating.show', ['rating' => $rating->id]));
    }
}
