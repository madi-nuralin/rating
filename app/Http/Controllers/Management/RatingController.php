<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Rating;
use App\Models\Employement;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use App\Models\Verifier;
use App\Models\ParameterTarget;
use App\Models\Parameter;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Management/Rating/Index', [
            'ratings' => Rating::paginate(10)->through(function($rating) {
                return $rating->toArray();
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
        return Inertia::render('Management/Rating/Create', [
            'parameters' => Parameter::all()->map(function($parameter) {
                return $parameter->toArray();
            }),
            'users' => User::all()->map(function($user) {
                return $user->toArray();
            })
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
            'filling_started_at' => ['required', 'date'],
            'filling_expired_at' => ['required', 'date'],
            'verification_started_at' => ['required', 'date'],
            'verification_expired_at' => ['required', 'date'],
            'approvement_started_at' => ['required', 'date'],
            'approvement_expired_at' => ['required', 'date'],
            'parameters' => ['array'],
            'users' => ['array']
        ])->validateWithBag('createRating');

        $rating = Rating::create();
        $rating->setName($input['name']);
        $rating->setDescription($input['description']);
        $rating->setFillingStartedAt($input['filling_started_at']);
        $rating->setFillingExpiredAt($input['filling_expired_at']);
        $rating->setVerificationStartedAt($input['verification_started_at']);
        $rating->setVerificationExpiredAt($input['verification_expired_at']);
        $rating->setApprovementStartedAt($input['approvement_started_at']);
        $rating->setApprovementExpiredAt($input['approvement_expired_at']);
        $rating->setParameters($input['parameters']);
        $rating->setUsers($input['users']);

        $rating->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('rating.show', ['rating' => $rating->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('rating.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rating = Rating::findOrFail($id);

        return Inertia::render('Management/Rating/Show', [
            'rating' => array_merge(
                $rating->toArray(), [
                    'parameters' => $rating->parameters->map(function($parameter) {
                        return $parameter->toArray();
                    }),
                    'users' => $rating->users->map(function($user) {
                        return $user->toArray();
                    })
                ]
            ),
            'parameters' => Parameter::all()->map(function($parameter) {
                return $parameter->toArray();
            }),
            'users' => User::all()->map(function($user) {
                return $user->toArray();
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
            'description' => ['required', 'string', 'max:255'],
            'filling_started_at' => ['required', 'date'],
            'filling_expired_at' => ['required', 'date'],
            'verification_started_at' => ['required', 'date'],
            'verification_expired_at' => ['required', 'date'],
            'approvement_started_at' => ['required', 'date'],
            'approvement_expired_at' => ['required', 'date'],
            'parameters' => ['array'],
            'users' => ['array']
        ])->validateWithBag('updateRating');

        $rating = Rating::findOrFail($id);
        
        $rating->setName($input['name']);
        $rating->setDescription($input['description']);
        $rating->setFillingStartedAt($input['filling_started_at']);
        $rating->setFillingExpiredAt($input['filling_expired_at']);
        $rating->setVerificationStartedAt($input['verification_started_at']);
        $rating->setVerificationExpiredAt($input['verification_expired_at']);
        $rating->setApprovementStartedAt($input['approvement_started_at']);
        $rating->setApprovementExpiredAt($input['approvement_expired_at']);
        $rating->setParameters($input['parameters']);
        $rating->setUsers($input['users']);

        $rating->save();

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
        Rating::findOrFail($id)->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('rating.index'));
    }
}
