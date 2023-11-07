<?php

namespace Database\Seeders;

use App\Models\Documents\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Folder::create([
            'folder_name' => 'Imagenes',
            'description' => 'Carpetas de imagenes',
            'parent_id' => null,
            'tenan_id' => 1,
            'user_id' => 1
        ]);
        Folder::create([
            'folder_name' => 'Historias clinicas',
            'description' => 'Historias clinicas de pacientes',
            'parent_id' => null,
            'tenan_id' => 1,
            'user_id' => 1
        ]);
        Folder::create([
            'folder_name' => 'RRHH',
            'description' => 'Documentos de recursos humanos',
            'parent_id' => null,
            'tenan_id' => 1,
            'user_id' => 1
        ]);
    }
}
