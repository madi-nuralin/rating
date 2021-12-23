<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
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
        return Inertia::render('Management/Users/Index', [
            'users' => User::paginate(10)->through(function($user) {
                return $user->toArray();
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
        return Inertia::render('Management/Users/Create');
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
            'email' => 'required|string|email|max:255|unique:users',
            'firstname' => ['nullable', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ])->validateWithBag('createUser');


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (isset($input['firstname'])) {
            $user->setFirstname($input['firstname']);
        }
        if (isset($input['lastname'])) {
            $user->setLastname($input['lastname']);
        }
        /*$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);*/

        $user->save();

        return Inertia::location(route('user.show', ['user' => $user->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return Inertia::render('Management/Users/Show', [
            'user' => array_merge(
                $user->toArray(), [
                    'employements' => $user->getEmployements(),
                    'roles' => $user->getRoles()
                ]
            ),
            'employements' => Employement::all()->map(function($employement) {
                return array_merge(
                    $employement->toArray(), [
                        'department' => $employement->getDepartment(),
                        'position' => $employement->getPosition(),
                    ]
                );
            }),
            'roles' => Role::all()->map(function($role) {
                return $role->toArray();
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
        $user = User::findOrFail($id);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'firstname' => ['nullable', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
        ])->validateWithBag('updateUser');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        if (isset($input['firstname'])) {
            $user->setFirstname($input['firstname']);
        }
        if (isset($input['lastname'])) {
            $user->setLastname($input['lastname']);
        }
        if (isset($input['employements'])) {
            $user->setEmployements($input['employements']);
            /*foreach (Assessment::all() as $assessment) {
                foreach ($assessment->employements as $employement) {
                    foreach ($employement->users as $user) {
                        $assignment = Assignment::create([
                            'assessment_id' => $assessment->getId(),
                            'employement_id' => $employement->getId(),
                            'user_id' => $user->getId(),
                            'score' => 0
                        ]);
                        $assignment->save();
                    }
                }
            }*/
        }
        if (isset($input['roles'])) {
            $user->setRoles($input['roles']);
        }

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
     * @param  int  $id
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

        return Inertia::location(route('user.index'));
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
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
}
