<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Documents\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = File::create([
            'file_name' => 'logo.png',
            'file_path' => 'documents/Tmw32W0jiAtNzXDt35YFr2svcr2jvbY3wpxzT7yW.jpg',
            'file_ext' => 'jpg',
            'file_size' => 33874,
            'estado_file_id' => 1,
            'folder_id' => 1,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);

        $file = File::create([
            'file_name' => 'Guia-Normas-APA-7ma-edicion.pdf',
            'file_path' => 'documents/wtmVwJednLW02fqab4yHR9htUEYt9GXesyoN5fuo.pdf',
            'file_ext' => 'pdf',
            'file_size' => 1358171,
            'estado_file_id' => 1,
            'folder_id' => 2,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);

        $file = File::create([
            'file_name' => 'Proyecto will sw1.pdf',
            'file_path' => 'documents/JBiPBeK3JS1LGahve85tdWtMGkAx1A3Ynkead3Iq.pdf',
            'file_ext' => 'pdf',
            'file_size' => 3361733,
            'estado_file_id' => 1,
            'folder_id' => 3,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(10),
            'updated_at' => now()->subMonths(10)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);
    }
}
