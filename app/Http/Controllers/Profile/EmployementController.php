<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use DB;

class EmployementController extends Controller
{
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
        return Inertia::render('Profile/Employement/Create', [
            'departments' => \App\Models\Department::all()->map(
                function ($department) {
                    return $department->get();
                }
            ),
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
        $user = auth()->user();

        if ($request->input('department') && $request->input('position')) {
            if (!isset($request->input('department')['value'])) {
                throw ValidationException::withMessages([
                    'department' => 'Please select department.',
                ]);
            }
            if (!isset($request->input('position')['value'])) {
                throw ValidationException::withMessages([
                    'position' => 'Please select appropriate position within department.',
                ]);
            }

            try {
                \App\Models\Employement::create([
                    'department_id' => $request->input('department')['value'],
                    'position_id' => $request->input('position')['value'],
                    'user_id' => $user->id
                ])->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == '1062') {
                    throw ValidationException::withMessages([
                        'position' => 'The employement record already exists!',
                    ]);
                }
            }
        }

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'department-created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employement = \App\Models\Employement::find($id);

        return Inertia::render('Profile/Employement/Show', [
            'employement' => $employement->get(),
            'departments' => \App\Models\Department::all()->map(
                function ($department) {
                    return $department->get();
                }
            ),
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
        $employement = \App\Models\Employement::find($id);

        if ($request->input('department') && $request->input('position')) {
            if (!isset($request->input('department')['value'])) {
                throw ValidationException::withMessages([
                    'department' => 'Please select department.',
                ]);
            }
            if (!isset($request->input('position')['value'])) {
                throw ValidationException::withMessages([
                    'position' => 'Please select appropriate position within department.',
                ]);
            }

            if ($employement->department_id != $request->input('department')['value'] &&
                $employement->position_id != $request->input('position')['value'])
            {
                try {
                    $employement->department_id = $request->input('department')['value'];
                    $employement->position_id = $request->input('position')['value'];
                    $employement->save();
                } catch (\Illuminate\Database\QueryException $e) {
                    $errorCode = $e->errorInfo[1];
                    if ($errorCode == '1062') {
                        throw ValidationException::withMessages([
                            'position' => 'The employement record already exists!',
                        ]);
                    }
                }
            }
        }

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'department-created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Models\Employement::find($id)->delete();

        return Inertia::location(url('/profile'));
    }
}
