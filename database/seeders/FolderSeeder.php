<?php

namespace Database\Seeders;

use App\Models\Activity;
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
        $folder = Folder::create([
            'folder_name' => 'Imagenes',
            'description' => 'Carpetas de imagenes',
            'parent_id' => null,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);

        $folder = Folder::create([
            'folder_name' => 'Historias clinicas',
            'description' => 'Historias clinicas de pacientes',
            'parent_id' => null,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);

        $folder = Folder::create([
            'folder_name' => 'RRHH',
            'description' => 'Documentos de recursos humanos',
            'parent_id' => null,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);

        $folder = Folder::create([
            'folder_name' => 'Subfolder 1',
            'description' => 'Documentos de recursos humanos',
            'parent_id' => 3,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);
        
        $folder = Folder::create([
            'folder_name' => 'Subfolder 2',
            'description' => 'Documentos de recursos humanos',
            'parent_id' => 3,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);
        
        $folder = Folder::create([
            'folder_name' => 'Subfolder 1',
            'description' => 'Documentos de recursos humanos',
            'parent_id' => 1,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);
        
        $folder = Folder::create([
            'folder_name' => 'Subfolder 2',
            'description' => 'Documentos de recursos humanos',
            'parent_id' => 1,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);
        
        $folder = Folder::create([
            'folder_name' => 'Subfolder 1',
            'description' => 'Documentos de recursos humanos',
            'parent_id' => 2,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(5),
            'updated_at' => now()->subMonths(5)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);
        
        $folder = Folder::create([
            'folder_name' => 'Subfolder 2',
            'description' => 'Documentos de recursos humanos',
            'parent_id' => 2,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(5),
            'updated_at' => now()->subMonths(5)
        ]);
        Activity::create([
            'activity_id' => $folder->id,
            'activity' => 'create_folder',
            'created_at' => $folder->created_at,
            'tenan_id' => $folder->tenan_id
        ]);
    }
}
