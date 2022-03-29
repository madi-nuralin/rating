<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return Inertia::render('Dashboard/Feed/Index', [
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
                            ['time1', '<=', DB::raw('current_timestamp()')],
                            ['time2', '>', DB::raw('current_timestamp()')]
                        ])->get()
                    )
                ),
                'verifying' => count(
                    collect(
                        $user->ratings()->where([
                            ['time3', '<=', DB::raw('current_timestamp()')],
                            ['time4', '>', DB::raw('current_timestamp()')]
                        ])->get()
                    )
                )
            ]
        ]);
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
