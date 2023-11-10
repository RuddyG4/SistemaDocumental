<?php

namespace Database\Seeders;

use App\Models\Users\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'simple_name' => 'Ver lista de documentos',
            'name' => 'documents.list',
            'description' => 'Permite ver una lista de los documentos y cierta información, pero no su contenido'
        ]);
        Permission::create([
            'simple_name' => 'Crear documentos',
            'name' => 'documents.create',
            'description' => 'Permite crear documentos'
        ]);
        Permission::create([
            'simple_name' => 'Ver documentos',
            'name' => 'documents.show',
            'description' => 'Permite ver documentos con toda su información y contenido'
        ]);
        Permission::create([
            'simple_name' => 'Modificar documentos',
            'name' => 'documents.modify',
            'description' => 'Permite modificar documentos'
        ]);
        Permission::create([
            'simple_name' => 'Eliminar documentos',
            'name' => 'documents.delete',
            'description' => 'Permite eliminar documentos'
        ]);
        
        Permission::create([
            'simple_name' => 'Ver lista de usuarios',
            'name' => 'users.list',
            'description' => 'Permite ver la lista de usuarios registrados'
        ]);
        Permission::create([
            'simple_name' => 'Ver usuarios',
            'name' => 'users.show',
            'description' => 'Permite ver la informacion de los usuarios'
        ]);
        Permission::create([
            'simple_name' => 'Crear usuarios',
            'name' => 'users.create',
            'description' => 'Permite registrar nuevos usuarios'
        ]);
        Permission::create([
            'simple_name' => 'Modificar usuarios',
            'name' => 'users.modify',
            'description' => 'Permite modificar la informacion de los usuarios'
        ]);
        Permission::create([
            'simple_name' => 'Eliminar usuarios',
            'name' => 'users.delete',
            'description' => 'Permite eliminar los usuarios registrados'
        ]);
        
        Permission::create([
            'simple_name' => 'Ver log del sistema',
            'name' => 'system.log',
            'description' => 'Permite ver el registro de actividad del sistema'
        ]);
    }
}
