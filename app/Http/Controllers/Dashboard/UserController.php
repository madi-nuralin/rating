<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function get()
    {
        $user = auth()->user();

        return Inertia::render('Dashboard/User', [
            'ratings' => $user->ratings->map(function($rating) use ($user) {
                return array_merge(
                    $rating->toArray(), [
                        'verifiers' => $rating->verifiers ? $rating->verifiers->map(function($verifier) {
                            return array_merge(
                                $verifier->toArray(), [
                                    'user' => $verifier->user->toArray()
                                ]
                            );
                        }) : [],
                        'statistics' => [
                            'submissions' => count(
                                collect(
                                    $rating->submissions()->where('user_id', $user->id)->get()
                                )
                            )
                        ]
                    ]
                );
            }),
            'statistics' => [
                'total' => count($user->ratings),
                'submitting' => count(
                    collect(
                        $user->ratings()->where([
                            ['submission_begin_time_at', '<=', DB::raw('current_timestamp()')],
                            ['submission_end_time_at', '>', DB::raw('current_timestamp()')]
                        ])->get()
                    )
                ),
                'verifying' => count(
                    collect(
                        $user->ratings()->where([
                            ['verification_begin_time_at', '<=', DB::raw('current_timestamp()')],
                            ['verification_end_time_at', '>', DB::raw('current_timestamp()')]
                        ])->get()
                    )
                )
            ]
        ]);
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
