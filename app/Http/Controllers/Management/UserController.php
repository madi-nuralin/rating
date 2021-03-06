<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Inertia\Inertia;
use DB;

use App\Models\User;
use App\Models\Role;
use App\Models\Employement;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = request()->input('email');

        return Inertia::render('Management/User/Index', [
            'users' => User::
            when(isset($email), function ($q) use ($email) {
                $q->where('email', 'like', '%' . $email . '%');
            })
                ->paginate(10)
                ->withQueryString()
                ->through(function ($user) {
                    return $user->toArray();
                }),
            'email' => $email
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Management/User/Create', [
            'roles' => Role::all()->map(function ($role) {
                return $role->toArray();
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users',
            'firstname' => ['nullable', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
            'roles' => ['nullable', 'array'],
        ])->validateWithBag('createUser');


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(Str::random(8)),
        ]);

        $user->setFirstname($input['firstname']);
        $user->setLastname($input['lastname']);
        $user->setRoles($input['roles']);

        $user->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('user.show', ['user' => $user->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');


        return Inertia::location(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return Inertia::render('Management/User/Show', [
            'user' => array_merge(
                $user->toArray(), [
                    'employements' => $user->employements ? $user->employements->map(function ($employement) {
                        return array_merge(
                            $employement->toArray(), [
                                'department' => $employement->department->toArray(),
                                'position' => $employement->position->toArray()
                            ]
                        );
                    }) : array(),
                    'roles' => $user->roles ? $user->roles->map(function ($role) {
                        return $role->toArray();
                    }) : array()
                ]
            ),
            'employements' => Employement::all()->map(function ($employement) {
                return array_merge(
                    $employement->toArray(), [
                        'department' => $employement->department->toArray(),
                        'position' => $employement->position->toArray(),
                    ]
                );
            }),
            'roles' => Role::all()->map(function ($role) {
                return $role->toArray();
            })
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::findOrFail($id);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'firstname' => ['nullable', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
            'roles' => ['nullable', 'array'],
        ])->validateWithBag('updateUser');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        $user->setFirstname($input['firstname']);
        $user->setLastname($input['lastname']);
        $user->setRoles($input['roles']);

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back()->with('status', 'user-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->user()->id) {
            throw ValidationException::withMessages([
                'user' => 'You are trying to delete your account, todo visit profile page.'
            ]);
        }

        DB::transaction(function () use ($user) {
            $user->deleteProfilePhoto();
            if ($user->tokens)
                $user->tokens->each->delete();
            $user->delete();
        });

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('user.index'));
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }

    public function loginAs($id)
    {
        $user = User::findOrFail($id);

        auth()->logout();
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
