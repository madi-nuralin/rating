<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Management/Role/Index', [
            'roles' => Role::paginate(10)->through(function($role) {
                return $role->toArray();
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
        return Inertia::render('Management/Role/Create', [
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
            'description' => ['required', 'string', 'max:2048'],
            'context' => ['required', 'unique:roles', 'max:255'],
            'users' => ['nullable', 'array']
        ])->validateWithBag('createRole');

        $role = Role::create(['context' => $input['context']]);
        $role->setName($input['name']);
        $role->setDescription($input['description']);
        $role->setUsers($input['users']);
        $role->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('role.show', ['role' => $role->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return Inertia::render('Management/Role/Show', [
            'role' => array_merge(
                $role->toArray(), [
                    'users' => $role->users ? $role->users->map(function($user) {
                        return $user->toArray();
                    }) : array()
                ]
            ),
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
            'description' => ['required', 'string', 'max:2048'],
            'context' => ['required', 'max:255'],
            'users' => ['nullable', 'array']
        ])->validateWithBag('updateRole');

        $role = Role::findOrFail($id);
        
        $role->setName($input['name']);
        $role->setDescription($input['description']);
        $role->setUsers($input['users']);
        $role->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'role-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('role.index'));
    }
}
