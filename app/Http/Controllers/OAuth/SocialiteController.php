<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Socialite redirect
     *
     * @return \Socialite
     */
    public function redirect(String $provider)
    {
        $enabled = (
            config("services.{$provider}.client_id") and 
            config("services.{$provider}.client_secret") and 
            config("services.{$provider}.redirect")
        );
        
        if (! $enabled )
            return redirect(404);

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Socialite callback
     *
     * @return \Socialite
     */
    public function callback(String $provider)
    {
        try {
            $user = Socialite::driver($provider)->user();

            $newUser = User::firstWhere(
                ['email' => $user->getEmail()],
            );

            if (is_null($newUser)) {
            
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make(Str::random(8)),
                ]);

                event(new Registered($newUser));
            }

            auth()->login($newUser);

            return redirect(RouteServiceProvider::HOME);

        } catch (Exception $e) {
            return redirect('/login');
        }
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
