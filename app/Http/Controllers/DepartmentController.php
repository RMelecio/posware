<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Models\Department;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $departments = Department::all();
        return view('department.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request): View
    {
        Department::create(['name' => $request->name]);
        $departments = Department::all();
        return view('department.index')
            ->with('departments', $departments)
            ->with('success', "Departamento {$request->name} creado con éxito.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department): View
    {
        return view('department.edit')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDepartmentRequest $request, Department $department): View
    {
        $department->name = $request->name;
        $department->save();

        $departments = Department::all();
        return view('department.index')
            ->with('departments', $departments)
            ->withSuccess('Departamento actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department): View|RedirectResponse
    {
        if ($department->users->count()) {
            return redirect()->back()->withErrors(['error' => 'Este departamento está asignado a un usuario.']);
        }

        $department->delete();
        $departments = Department::all();
        return view('department.index')
            ->with('departments', $departments)
            ->withSuccess('Departamento actualizado con éxito.');
    }
}
