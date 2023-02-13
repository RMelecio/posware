<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Administrador',
            'description' => 'Todos los permisos del sistema'
        ]);

        Permission::insert([
            [
                'name' => 'configuracion.header',
                'route' => '',
                'guard_name' => 'web',
                'label' => 'Configuración',
                'type' => 'header',
                'parent_permission' => null,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'profile.menu',
                'route' => 'profile.index',
                'guard_name' => 'web',
                'label' => 'Perfiles',
                'type' => 'menu',
                'parent_permission' => 1,
                'icon' => 'fa fa-list',
                'created_at' => now(),
            ],
            [
                'name' => 'profile.index',
                'route' => 'profile.index',
                'guard_name' => 'web',
                'label' => 'Listar',
                'type' => 'action',
                'parent_permission' => 2,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'profile.create',
                'route' => 'profile.create',
                'guard_name' => 'web',
                'label' => 'Crear',
                'type' => 'action',
                'parent_permission' => 2,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'profile.show',
                'route' => 'profile.show',
                'guard_name' => 'web',
                'label' => 'Ver',
                'type' => 'action',
                'parent_permission' => 2,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'profile.update',
                'route' => 'profile.update',
                'guard_name' => 'web',
                'label' => 'Editar',
                'type' => 'action',
                'parent_permission' => 2,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'profile.delete',
                'route' => 'profile.delete',
                'guard_name' => 'web',
                'label' => 'Eliminar',
                'type' => 'action',
                'parent_permission' => 2,
                'icon' => null,
                'created_at' => now(),
            ],
        ]);

        $permissions = Permission::all();
        $user = User::find(1);
        $user->assignRole('Administrador');
        $role->givePermissionTo($permissions);
    }
}
