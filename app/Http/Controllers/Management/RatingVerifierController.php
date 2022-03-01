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
use App\Models\Verification;
use App\Models\VerificationStatus;
use App\Models\ParameterTarget;

class RatingVerifierController extends Controller
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
        return Inertia::render('Management/Rating/Partials/Verifier/Create', [
            'rating' => Rating::findOrFail(request()->input('rating'))->toArray(),
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

        foreach ($rating->submissions as $submission) {
            Verification::create([
                'verifier_id' => $verifier->id,
                'submission_id' => $submission->id,
                'verification_status_id' => VerificationStatus::firstWhere('context', 'unreviewed')->id
            ])->save();
        }

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('verifier.show', ['verifier' => $verifier->getId()])
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
    public function show($id)
    {
        $verifier = Verifier::findOrFail($id);

        return Inertia::render('Management/Rating/Partials/Verifier/Show', [
            'verifier' => array_merge(
                $verifier->toArray(), [
                    'user' => $verifier->user->toArray(),
                    'target' => $verifier->parameterTarget->toArray()
                ]
            ),
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
        ])->validateWithBag('updateVerifier');

        $verifier = Verifier::findOrFail($id);
        $parameterTarget = ParameterTarget::findOrFail($input['target']);
        $user = User::findOrFail($input['user']);

        $verifier->setParameterTarget($parameterTarget);
        $verifier->setUser($user);
        $verifier->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'verifier-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $verifier = Verifier::findOrFail($id);
        $rating = $verifier->rating;
        $verifier->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('rating.show', ['rating' => $rating->id]));
    }
}
