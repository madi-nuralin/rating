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
use App\Models\Role;
use App\Models\Employement;

class UserProfileController extends Controller
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
                    'employements' => auth()->user()->employements->map(function($employement) {
                        return $employement->toArray();
                    }),
                    'roles' => auth()->user()->roles->map(function($role) {
                        return $role->toArray();
                    })
                ]
            ),
            'employements' => Employement::all()->map(function($employement) {
                return array_merge(
                    $employement->toArray(),[
                        'department' => $employement->department->toArray(),
                        'position' => $employement->position->toArray(),
                    ]
                );
            }),
            'roles' => Role::all()->map(function($role) {
                return $role->toArray();
            })
        ]);
    }
}