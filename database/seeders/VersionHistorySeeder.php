<?php

namespace Database\Seeders;

use App\Models\Documents\File;
use App\Models\Documents\VersionHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VersionHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = File::where('tenan_id', 1)->get();

        foreach ($files as $file) {
            VersionHistory::create([
                'version_date' => now(),
                'path' => $file->file_path,
                'user_id' => 1,
                'name_user' => 'Gonzalo',
                'file_id' => $file->id,
                'tenan_id' => $file->tenan_id,
                'version' => 1
            ]);
        }
    }
}
