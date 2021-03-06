<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
            'services' => [
                'github' => (
                    config("services.github.client_id") and 
                    config("services.github.client_secret") and 
                    config("services.github.redirect")
                ),
                'google' => (
                    config("services.google.client_id") and 
                    config("services.google.client_secret") and 
                    config("services.google.redirect")
                ),
                'microsoft' => (
                    config("services.microsoft.client_id") and 
                    config("services.microsoft.client_secret") and 
                    config("services.microsoft.redirect")
                ),
                'azure' => (
                    config("services.azure.client_id") and 
                    config("services.azure.client_secret") and 
                    config("services.azure.redirect") and
                    config("services.azure.tenant")
                )
            ]
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
