<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Requests\profile\StoreProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Role::all();
        return view('profile.index')->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $optionMenus = Permission::where('type', 'menu')
            ->orWhere('type', 'option')
            ->orderBy('label')
            ->get();

        foreach ($optionMenus as $keyOptionMenu => $optionMenu) {
            $optionMenus[$keyOptionMenu]['actions'] = Permission::where('type', 'action')
            ->where('parent_permission', $optionMenu->id)
            ->orderBy('label')
            ->get();
        }

        return view('profile.create')->with('permissions', $optionMenus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $newRol = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $newRol->syncPermissions($request->permissions);
        $profiles = Role::all();
        return view('profile.index')
            ->with('success', "Rol {$request->name} creado con éxito")
            ->with('profiles', $profiles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Role::find($id);

        return view('profile.edit')->with('profile', $profile);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
