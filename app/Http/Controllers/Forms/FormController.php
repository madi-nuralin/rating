<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use MathParser\StdMathParser;
use MathParser\Interpreting\Evaluator;

use App\Models\Forms\Form;

class FormController extends Controller
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
        return Inertia::render('Forms/Form/Create');
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
        ])->validateWithBag('createForm');

        $form = Form::create();
        $form->setName($input['name']);
        $form->setDescription($input['description']);
        $form->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('form.show', ['form' => $form->getId()])
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
        $form = Form::findOrFail($id);

        return Inertia::render('Forms/Form/Show', [
            'form' => array_merge(
                $form->toArray(), [
                    'fields' => $form->fields()->paginate(10)->through(function($field) {
                        return $field->toArray();
                    })
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
            'description' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateForm');

        $form = Form::findOrfail($id);
        $form->setName($input['name']);
        $form->setDescription($input['description']);
        $form->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'form-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Form::findOrfail($id)->delete();
        
        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('form.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateScoring(Request $request, $id)
    {
        $input = $request->all();

        Validator::make($input, [
            'scoring' => ['required', 'string'],
            'score' => ['nullable', 'numeric'],
            'math_expression' => ['nullable', 'string']
        ])->validateWithBag('updateScoringForm');

        $form = Form::findOrfail($id);

        switch ($input['scoring']) {
            case Form::SCORING_DISABLED:
                break;
            case Form::SCORING_BY_CONSTANT:
                $form->setScoring($input['scoring']);
                $form->setScore($input['score']);
                break;
            case Form::SCORING_BY_MATH_EXPRESSION:
                $form->setScoring($input['scoring']);
                $form->setMathExpression($input['math_expression']);
                break;
            default:
                # code...
                break;
        }

        $form->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'form-scoring-updated');
    }
}
