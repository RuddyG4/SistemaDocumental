<?php

namespace Database\Seeders;

use App\Models\Users\Permission;
use App\Models\Users\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = Role::where('role_name', 'Administrador')->get();
        $permissions_ids = Permission::pluck('id')->toArray();
        foreach ($admins as $admin) {
            $admin->permissions()->attach($permissions_ids);
        }
    }
}
