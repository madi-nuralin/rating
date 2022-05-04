<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Approver;
use App\Models\Rating;
use App\Models\User;
use App\Models\Department;

class RatingApproverController extends Controller
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
        $rating = Rating::findOrFail($rating);

        return Inertia::render('Management/Rating/Partials/Approver/Create', [
            'rating' => $rating->toArray(),
            'departments' => Department::all()->map(function($department) {
                return $department->toArray();
            }),
            'users' => User::all()->map(function($user) {
                return $user->toArray();
            }),
            /*collect(User::whereHas(
                'roles', function($q) {
                    $q->where('context', 'verifier');
                })->get())->map(function($user) {
                    return $user->toArray();
                }
            )*/
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
            'user' => ['required', 'numeric'],
            'department' => ['required', 'numeric']
        ])->validateWithBag('createRatingApprover');

        $rating = Rating::findOrFail($rating);
        $user = User::findOrFail($input['user']);
        $department = Department::findOrFail($input['department']);

        $approver = Approver::where([
            'rating_id' => $rating->id,
            'user_id' => $user->id,
            'department_id' => $department->id
        ])->get()->first();

        if (is_null($approver)) {
            $approver = Approver::create([
                'rating_id' => $rating->id,
                'user_id' => $user->id,
                'department_id' => $department->id
            ]);
        }

        $approver->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('rating.approver.show', ['rating' => $rating->id, 'approver' => $approver->getId()])
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
    public function show($rating, $approver)
    {
        $approver = Approver::findOrFail($approver);

        return Inertia::render('Management/Rating/Partials/Approver/Show', [
            'approver' => array_merge(
                $approver->toArray(), [
                    'user' => $approver->user->toArray(),
                    'department' => $approver->department->toArray(),
                    'rating' => $approver->rating->toArray()
                ]
            ),
            'departments' => Department::all()->map(function($department) {
                return $department->toArray();
            }),
            'users' => User::all()->map(function($user) {
                return $user->toArray();
            }),
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
    public function update(Request $request, $rating, $approver)
    {
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
    public function destroy($rating, $approver)
    {
        $approver = Approver::findOrFail($approver);
        $rating = $approver->rating;
        $approver->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('rating.show', ['rating' => $rating->id]));
    }
}
