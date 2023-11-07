<?php

namespace Database\Seeders;

use App\Models\EstadoFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoFile::create([
            'name' => 'Redacción',
        ]);
        EstadoFile::create([
            'name' => 'Revisión',
        ]);
        EstadoFile::create([
            'name' => 'Aprobado',
        ]);
    }
}
