<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\EmployementType;
use App\Models\Department;
use App\Models\Employement;
use App\Models\Position;
use App\Models\User;

class EmployementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Management/Employement/Index', [
            'employements' => Employement::all()->map(function($employement) {
                return array_merge(
                    $employement->toArray(), [
                        'employement_type' => $employement->employementType->toArray(),
                        'department' => $employement->department->toArray(),
                        'position' => $employement->position->toArray(),
                        'user' => $employement->user->toArray()
                    ]
                );
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
        return Inertia::render('Management/Employement/Create', [
            'employement_types' => EmployementType::all()->map(function($employementType) {
                return $employementType->toArray();
            }),
            'departments' => Department::all()->map(function($department) {
                return array_merge(
                    $department->toArray(), [
                        'positions' => $department->positions->map(function($position) {
                            return $position->toArray();
                        })
                    ]
                );
            }),
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
            'employement_type' => ['required', 'numeric'],
            'department' => ['required', 'numeric'],
            'position' => ['required', 'numeric'],
            'user' => ['required', 'numeric'],
            'appointed_at' => ['required', 'date'],
            'terminated_at' => ['date', 'nullable']
        ])->validateWithBag('createEmployement');

        $employementType = EmployementType::findOrFail($input['employement_type']);
        $department = Department::findOrFail($input['department']);
        $position = Position::findOrFail($input['position']);
        $user = User::findOrFail($input['user']);

        $employement = Employement::create([
            'employement_type_id' => $employementType->getId(),
            'department_id' => $department->getId(),
            'position_id' => $position->getId(),
            'user_id' => $user->getId(),
            'appointed_at' => $input['appointed_at'],
            'terminated_at' => $input['terminated_at'],
        ]);

        $employement->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('employement.show', ['employement' => $employement->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('employement.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employement = Employement::findOrFail($id);

        return Inertia::render('Management/Employement/Show', [
            'employement' => array_merge(
                $employement->toArray(), [
                    'employement_type' => $employement->employementType->toArray(),
                    'department' => $employement->department->toArray(),
                    'position' => $employement->position->toArray(),
                    'user' => $employement->user->toArray()
                ]
            ),
            'employement_types' => EmployementType::all()->map(function($employementType) {
                return $employementType->toArray();
            }),
            'departments' => Department::all()->map(function($department) {
                return array_merge(
                    $department->toArray(), [
                        'positions' => $department->positions->map(function($position) {
                            return $position->toArray();
                        })
                    ]
                );
            }),
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

        Validator::make($input, [
            'employement_type' => ['required', 'numeric'],
            'department' => ['required', 'numeric'],
            'position' => ['required', 'numeric'],
            'user' => ['required', 'numeric'],
            'appointed_at' => ['required', 'date'],
            'terminated_at' => ['date', 'nullable']
        ])->validateWithBag('createEmployement');

        $employement = Employement::findOrFail($id);
        $employementType = EmployementType::findOrFail($input['employement_type']);
        $department = Department::findOrFail($input['department']);
        $position = Position::findOrFail($input['position']);
        $user = User::findOrFail($input['user']);

        $employement->setEmployementType($employementType);
        $employement->setDepartment($department);
        $employement->setPosition($position);
        $employement->setUser($user);
        $employement->setAppointedAt($input['appointed_at']);
        $employement->setTerminatedAt($input['terminated_at']);

        $employement->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'employement-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employement::findOrFail($id)->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('employement.index'));
    }
}
