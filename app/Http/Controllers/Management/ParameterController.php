<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Category;
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
        return Inertia::render('Management/Parameters/Index', [
            'parameters' => Parameter::all()->map(function($parameter) {
                return $parameter->toArray();
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
        return Inertia::render('Management/Parameters/Create', [
            'categories' => Category::all()->map(function($category) {
                return $category->toArray();
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
            'category' => ['required', 'numeric'],
            'score' => ['required', 'numeric'],
        ])->validateWithBag('createParameter');

        $category = Category::findOrFail($input['category']);

        $form = new Form();
        $form->save();

        $parameter = Parameter::create([
            'form_id' => $form->getId(),
            'category_id' => $category->getId()
        ]);

        $parameter->setName($input['name']);
        $parameter->setDescription($input['description']);
        $parameter->setScore($input['score']);
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

        return Inertia::render('Management/Parameters/Show', [
            'parameter' => array_merge(
                $parameter->toArray(), [
                    'form' => array_merge(
                        $parameter->getForm(), [
                            'fields' => $parameter->form && 
                                        $parameter->form
                                                  ->fields ?
                                        $parameter->form
                                                  ->fields
                                                  ->map(function($formField) {
                                return $formField->toArray();
                            }) : []
                        ]
                    ),
                    'category' => $parameter->getCategory()
                ]
            ),
            'categories' => Category::all()->map(function($category) {
                return $category->toArray();
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
            'category' => ['required', 'numeric'],
            'score' => ['required', 'numeric'],
        ])->validateWithBag('updateParameter');

        $parameter = Parameter::findOrFail($id);
        $category = Category::findOrFail($input['category']);
        
        if ($parameter->getName() != $input['name'] ) {
            $parameter->setName($input['name']);    
        }
        if ($parameter->getDescription() != $input['description'] ) {
            $parameter->setDescription($input['description']);
        }
        if ($parameter->getCategory() != $input['category'] ) {
            $parameter->setCategory($input['category']);
        }
        if ($parameter->getScore() != $input['score'] ) {
            $parameter->setScore($input['score']);
        }

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
}
