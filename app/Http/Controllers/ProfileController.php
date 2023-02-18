<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\profile\StoreProfileRequest;
use App\Http\Requests\profile\UpdateProfileRequest;

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
    public function edit($id): View
    {
        $profile = Role::find($id);

        $profilePermissions = Role::join('role_has_permissions', function(JoinClause $join) use ($id) {
                $join->on('roles.id', 'role_has_permissions.role_id');
                $join->where('roles.id', $id);
            })->join('permissions', function(JoinClause $join) {
                $join->on('role_has_permissions.permission_id', 'permissions.id');
                $join->where('permissions.type', 'action');
            })
            ->select('permissions.*')
            ->get();

        $assignedPermissions = [];
        foreach ($profilePermissions as $permission) {
            $assignedPermissions[] = $permission->id;
        }
        $assignedPermissions = Arr::flatten($assignedPermissions);

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

        return view('profile.edit')
            ->with('profile', $profile)
            ->with('permissions', $optionMenus)
            ->with('assignedPermissions', $assignedPermissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, $id): View
    {
        $profile = Role::find($id);
        $profile->name = $request->name;
        $profile->description = $request->description;

        DB::beginTransaction();
        try {
            $profile->save();
            $profile->syncPermissions($request->permissions);
            DB::commit();
            $profiles = Role::all();
            return view('profile.index')
                ->with('success', "Rol {$request->name} actualizado con éxito")
                ->with('profiles', $profiles);
        } catch (Throwable $e) {
            Log::info($e);
            DB::rollBack();
            return Redirect::back()->withErrors(['error' => 'Error al actualizar el Perfil']);
        }
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
