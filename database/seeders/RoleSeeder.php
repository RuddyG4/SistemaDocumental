<?php

namespace Database\Seeders;

use App\Models\Users\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'Administrador',
            'description' => 'Administrador de la compañía.',
            'tenan_id' => 1,
        ]);
        Role::create([
            'role_name' => 'Médico',
            'description' => 'Médicos de la compañía.',
            'tenan_id' => 1,
        ]);
        Role::create([
            'role_name' => 'Administrador',
            'description' => 'Administrador de la compañía.',
            'tenan_id' => 2,
        ]);
        Role::create([
            'role_name' => 'Secretaria/o',
            'description' => 'Secretarias o secretarios de la compañía.',
            'tenan_id' => 2,
        ]);
    }
}
