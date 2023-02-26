<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CompanyPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            'name' => 'company.menu',
            'route' => 'company.index',
            'guard_name' => 'web',
            'label' => 'Empresa',
            'type' => 'menu',
            'parent_permission' => 1,
            'icon' => 'fa fa-building-o',
            'created_at' => now(),
        ]);

        $currentMenu = Permission::where('name', 'company.menu')
        ->select('id')
        ->first();

        Permission::insert([
            [
                'name' => 'company.index',
                'route' => 'company.index',
                'guard_name' => 'web',
                'label' => 'Listar',
                'type' => 'action',
                'parent_permission' => $currentMenu->id,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'company.show',
                'route' => 'company.show',
                'guard_name' => 'web',
                'label' => 'Ver',
                'type' => 'action',
                'parent_permission' => $currentMenu->id,
                'icon' => null,
                'created_at' => now(),
            ],
            [
                'name' => 'company.update',
                'route' => 'company.update',
                'guard_name' => 'web',
                'label' => 'Editar',
                'type' => 'action',
                'parent_permission' => $currentMenu->id,
                'icon' => null,
                'created_at' => now(),
            ],
        ]);
    }
}
