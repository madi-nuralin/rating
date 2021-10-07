<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

use App\Models\User;
use App\Models\Employement;

class CurrentUserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Inertia::render('Profile/Show', [
            'user' => array_merge(
                auth()->user()->toArray(), [
                    'employements' => auth()->user()->getEmployements()
                ]
            ),
            'employements' => Employement::all()->map(function($employement) {
                return array_merge(
                    $employement->toArray(),[
                        'department' => $employement->getDepartment(),
                        'position' => $employement->getPosition(),
                    ]
                );
            }),
        ]);
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
        return UserController::update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = $request->user();

        $confirmed = (isset($request->password) && Hash::check($request->password, $user->password));

        if (! $confirmed) {
            throw ValidationException::withMessages([
                'password' => 'The password is incorrect.',
            ]);
        }

        DB::transaction(function () use ($user) {
            $user->deleteProfilePhoto();
            if ($user->tokens)
                $user->tokens->each->delete();
            $user->delete();
        });

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Inertia::location(url('/'));
    }
}
