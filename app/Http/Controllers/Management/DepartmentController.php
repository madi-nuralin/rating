<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use App\Models\Department;
use App\Models\Position;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Management/Departments/Index', [
            'departments' => Department::paginate(10)->through(function($department) {
                return $department->toArray();
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
        return Inertia::render('Management/Departments/Create');
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
            'description' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createDepartment');

        $department = Department::create();
        $department->setName($input['name']);
        $department->setDescription($input['description']);
        $department->save();

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('department.show', ['department' => $department->getId()])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('department.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);

        return Inertia::render('Management/Departments/Show', [
            'department' => array_merge($department->toArray(), [
                'positions' => $department->positions->map(function($position) {
                    return $position->toArray();
                })
            ]),
            'positions' => Position::all()->map(function($position) {
                return $position->toArray();
            }),
            'departments' => Department::all()->map(function($department) {
                return $department->toArray();
            }),
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateDepartment');

        $department = Department::findOrFail($id);

        if ($department->getName() != $input['name']) {
            $department->setName($input['name']);
        }

        if ($department->getDescription() != $input['description']) {
            $department->setDescription($input['description']);
        }

        if (isset($input['parent'])) {
            if ($department->getParent() != $input['parent']) {
                if ($department->getId() == $input['parent']) {
                    throw ValidationException::withMessages([
                        'parent' => 'Cannot assign current department as its parent itself.',
                    ]);
                }
                $department->setParent($input['parent']);
            }
        }

        if (isset($input['positions'])) {
            $department->setPositions($input['positions']);
        }

        $department->save();

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'department-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::findOrFail($id)->delete();

        session()->flash('flash.banner', ['components.banner.resource.deleted']);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('department.index'));
    }
}
