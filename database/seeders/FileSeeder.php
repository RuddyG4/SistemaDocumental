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
        
        
        // ===================================================================
        $file = File::create([
            'file_name' => 'taller.jpg',
            'file_path' => 'documents/BOG50gIQ6n0UwnX2nJJgx5CBDBTxhX83XnXdH3ff.jpg',
            'file_ext' => 'jpg',
            'file_size' => 133234,
            'estado_file_id' => 1,
            'folder_id' => null,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(9),
            'updated_at' => now()->subMonths(9)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);

        $file = File::create([
            'file_name' => 'prueba.txt.txt',
            'file_path' => 'documents/Aom4lwiqagdYDWmGqzubtIz8y50e9ymdOGS6SkxR.txt',
            'file_ext' => 'txt',
            'file_size' => 11,
            'estado_file_id' => 1,
            'folder_id' => null,
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
            'file_name' => 'customer-login.jpg',
            'file_path' => 'documents/v4e8YGHiH6dJpuLk6uGZRLRTNz2UJ1HKKDZYcA6o.jpg',
            'file_ext' => 'jpg',
            'file_size' => 208035,
            'estado_file_id' => 1,
            'folder_id' => 1,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(8),
            'updated_at' => now()->subMonths(8)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);
        
        $file = File::create([
            'file_name' => 'c4-image1.jpg',
            'file_path' => 'documents/xSV408CEalk3VqxpzNwjuHJsKAn4DdFD01V1AW68.jpg',
            'file_ext' => 'jpg',
            'file_size' => 99364,
            'estado_file_id' => 1,
            'folder_id' => 1,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(2),
            'updated_at' => now()->subMonths(2)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);

        $file = File::create([
            'file_name' => 'diagrama de codigo.png',
            'file_path' => 'documents/5FWzK9VjZZA6eYkAnRadiDH9XAZLlqCYjhGYvp1O.png',
            'file_ext' => 'png',
            'file_size' => 80547,
            'estado_file_id' => 1,
            'folder_id' => 1,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(4),
            'updated_at' => now()->subMonths(4)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);

        $file = File::create([
            'file_name' => 'Git-cheat-sheet-dark.pdf',
            'file_path' => 'documents/BABIBuglgOAOOmjI5Oc8B1lpJ7nvT6GLUh9qjxyb.pdf',
            'file_ext' => 'pdf',
            'file_size' => 425136,
            'estado_file_id' => 1,
            'folder_id' => 2,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(7),
            'updated_at' => now()->subMonths(7)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);
        $file = File::create([
            'file_name' => 'postgres-cheatsheet.pdf',
            'file_path' => 'documents/BwKTuO7TPpgmWYUC81cjeDrxWNZaRFm642cy7zsB.pdf',
            'file_ext' => 'pdf',
            'file_size' => 762446,
            'estado_file_id' => 1,
            'folder_id' => 2,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(6),
            'updated_at' => now()->subMonths(6)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);
        $file = File::create([
            'file_name' => 'keyboard-shortcuts-linux.pdf',
            'file_path' => 'documents/zb058NvvX5MgZbbih31LpGbuvyYdgYJCH2oJP6Ph.pdf',
            'file_ext' => 'pdf',
            'file_size' => 262071,
            'estado_file_id' => 1,
            'folder_id' => 2,
            'tenan_id' => 1,
            'user_id' => 1,
            'created_at' => now()->subMonths(5),
            'updated_at' => now()->subMonths(5)
        ]);
        Activity::create([
            'activity_id' => $file->id,
            'activity' => 'upload_file',
            'created_at' => $file->created_at,
            'tenan_id' => $file->tenan_id
        ]);
    }
}
