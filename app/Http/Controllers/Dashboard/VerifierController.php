<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VerifierController extends Controller
{
    public function get() 
    {
        $verifier = request()->input('verifier');

        if (is_null($verifier)) {
            if (auth()->user()->verifiers) {
                $verifier = auth()->user()->verifiers->first();
            }
        } else {
            $verifier = \App\Models\Verifier::findOrFail($verifier);
        }

        return Inertia::render('Dashboard/Verifier', [
            'verifiers' => auth()->user()->verifiers ? auth()->user()->verifiers->map(function($verifier) {
                return array_merge(
                    $verifier->toArray(), [
                        'rating' => $verifier->rating->toArray()
                    ]
                );
            }) : [],
            'verifier' => $verifier ? array_merge(
                $verifier->toArray(), [
                    'rating' => $verifier->rating->toArray(),
                    'users' => $verifier->rating->users()->paginate(10)->through(function($user) {
                        return $user->toArray();
                    })
                ]
            ) : [],
            'statistics' => [
                'total' => $verifier ? count($verifier->rating->users) : 0,
                'last' => $verifier ? count($verifier->rating->users) : 0
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
    /*public function show($id)
    {
        //
    }*/

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
