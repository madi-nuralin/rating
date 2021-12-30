<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Rating;
use App\Models\User;
use App\Models\Verifier;
use App\Models\ParameterTarget;

class VerifierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Management/Verifier/Index', [
            'verifiers' => Verifier::paginate(10)->through(function($verifier) {
                return array_merge(
                    $verifier->toArray(), [
                        'user' => $verifier->user->toArray(),
                        'target' => $verifier->parameterTarget->toArray(),
                        'rating' => $verifier->rating->toArray()
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
        return Inertia::render('Management/Verifier/Create', [
            'ratings' => Rating::all()->map(function($rating) {
                return $rating->toArray();
            }),
            'targets' => ParameterTarget::all()->map(function($parameterTarget) {
                return $parameterTarget->toArray();
            }),
            'users' => collect(User::whereHas(
                'roles', function($q) {
                    $q->where('context', 'verifier');
                })->get())->map(function($user) {
                    return $user->toArray();
                }
            )
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
            'rating' => ['required', 'numeric'],
            'target' => ['required', 'numeric'],
            'user' => ['required', 'numeric']
        ])->validateWithBag('createVerifier');

        $rating = Rating::findOrFail($input['rating']);
        $parameterTarget = ParameterTarget::findOrFail($input['target']);
        $user = User::findOrFail($input['user']);

        $verifier = Verifier::create([
            'user_id' => $user->getId(),
            'parameter_target_id' => $parameterTarget->getId(),
            'rating_id' => $rating->getId()
        ]);

        $verifier->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('verifier.show', ['verifier' => $verifier->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('verifier.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $verifier = Verifier::findOrFail($id);

        return Inertia::render('Management/Verifier/Show', [
            'verifier' => array_merge(
                $verifier->toArray(), [
                    'user' => $verifier->user->toArray(),
                    'target' => $verifier->parameterTarget->toArray(),
                    'rating' => $verifier->rating->toArray()
                ]
            ),
            'ratings' => Rating::all()->map(function($rating) {
                return $rating->toArray();
            }),
            'targets' => ParameterTarget::all()->map(function($parameterTarget) {
                return $parameterTarget->toArray();
            }),
            'users' => collect(User::whereHas(
                'roles', function($q) {
                    $q->where('context', 'verifier');
                })->get())->map(function($user) {
                    return $user->toArray();
                }
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
            'target' => ['required', 'numeric'],
            'user' => ['required', 'numeric'],
            'rating' => ['required', 'numeric'],
        ])->validateWithBag('updateVerifier');

        $verifier = Verifier::findOrFail($id);
        $rating = Rating::findOrFail($input['rating']);
        $parameterTarget = ParameterTarget::findOrFail($input['target']);
        $user = User::findOrFail($input['user']);

        $verifier->setParameterTarget($parameterTarget);
        $verifier->setUser($user);
        $verifier->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'rating-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Verifier::findOrFail($id)->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('verifier.index'));
    }
}
