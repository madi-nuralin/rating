<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Setting;

class AuthenticationController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        return Inertia::render('Administration/Authentication/Show', [
            'authentication' => [
                'allowed_user_register' => Setting::get('auth.allowed_user_register'),
                'oauth2' => [
                    'providers' => [
                        'github' => [
                            'enabled' => Setting::get('auth.oauth2.providers.github.enabled'),
                            'client_id' => Setting::get('auth.oauth2.providers.github.client_id'),
                            'client_secret' => Setting::get('auth.oauth2.providers.github.client_secret')
                        ],
                        'google' => [
                            'enabled' => Setting::get('auth.oauth2.providers.google.enabled'),
                            'client_id' => Setting::get('auth.oauth2.providers.google.client_id'),
                            'client_secret' => Setting::get('auth.oauth2.providers.google.client_secret')
                        ],
                    ]
                ]
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();

        Setting::set('auth.allowed_user_register', (boolean)$input['allowed_user_register']);


        foreach (Array('github', 'google') as $provider) {
            if ($input["oauth2_{$provider}_enabled"]) {
                Validator::make($request->all(), [
                    "oauth2_{$provider}_client_id" => ['required', 'string'],
                    "oauth2_{$provider}_client_secret" => ['required', 'string'],
                ])->validateWithBag('updateAuthentication');
            }

            Setting::set("auth.oauth2.providers.{$provider}.enabled", (boolean)$input["oauth2_{$provider}_enabled"]);
            Setting::set("auth.oauth2.providers.{$provider}.client_id", $input["oauth2_{$provider}_client_id"]);
            Setting::set("auth.oauth2.providers.{$provider}.client_secret", $input["oauth2_{$provider}_client_secret"]);
        }

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'authentication-updated');
    }
}
