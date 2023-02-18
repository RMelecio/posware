<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DepartmenPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            'name' => 'department.menu',
            'route' => 'department.index',
            'guard_name' => 'web',
            'label' => 'Departamentos',
            'type' => 'menu',
            'parent_permission' => 1,
            'icon' => 'fa fa-users',
            'created_at' => now(),
        ]);

        $currentMenu = Permission::where('name', 'department.menu')
            ->select('id')
            ->first();

        Permission::insert([
            [
                'name' => 'department.index',
                'route' => 'department.index',
                'guard_name' => 'web',
                'label' => 'Listar',
                'type' => 'action',
                'parent_permission' => $currentMenu->id,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'department.create',
                'route' => 'department.create',
                'guard_name' => 'web',
                'label' => 'Crear',
                'type' => 'action',
                'parent_permission' => $currentMenu->id,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'department.show',
                'route' => 'department.show',
                'guard_name' => 'web',
                'label' => 'Ver',
                'type' => 'action',
                'parent_permission' => $currentMenu->id,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'department.update',
                'route' => 'department.update',
                'guard_name' => 'web',
                'label' => 'Editar',
                'type' => 'action',
                'parent_permission' => $currentMenu->id,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'department.delete',
                'route' => 'department.delete',
                'guard_name' => 'web',
                'label' => 'Eliminar',
                'type' => 'action',
                'parent_permission' => $currentMenu->id,
                'icon' => null,
                'created_at' => now(),
            ],
        ]);
    }
}
