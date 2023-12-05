<?php

namespace Database\Seeders;

use App\Models\PlanDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanDetail::create([
            'pd_name' => 'Límite de tamaño de archivos',
            'pd_value' => '50 MB',
            'plan_id' => 1
        ]);
        PlanDetail::create([
            'pd_name' => 'Límite de tamaño de archivos',
            'pd_value' => '200 MB',
            'plan_id' => 2
        ]);
        PlanDetail::create([
            'pd_name' => 'Límite de tamaño de archivos',
            'pd_value' => '500 MB',
            'plan_id' => 3
        ]);

        PlanDetail::create([
            'pd_name' => 'Límite de almacenamiento',
            'pd_value' => '5 GB',
            'plan_id' => 1
        ]);
        PlanDetail::create([
            'pd_name' => 'Límite de almacenamiento',
            'pd_value' => '20 GB',
            'plan_id' => 2
        ]);
        PlanDetail::create([
            'pd_name' => 'Límite de almacenamiento',
            'pd_value' => '80 GB',
            'plan_id' => 3
        ]);
        
        PlanDetail::create([
            'pd_name' => 'Número de usuarios (simultaneos)',
            'pd_value' => '10',
            'plan_id' => 1
        ]);
        PlanDetail::create([
            'pd_name' => 'Número de usuarios (simultaneos)',
            'pd_value' => '50',
            'plan_id' => 2
        ]);
        PlanDetail::create([
            'pd_name' => 'Número de usuarios (simultaneos)',
            'pd_value' => 'Ilimitado',
            'plan_id' => 3
        ]);
        
        PlanDetail::create([
            'pd_name' => 'Flujos de trabajo (workflow)',
            'pd_value' => '1',
            'plan_id' => 1
        ]);
        PlanDetail::create([
            'pd_name' => 'Flujos de trabajo (workflow)',
            'pd_value' => '5',
            'plan_id' => 2
        ]);
        PlanDetail::create([
            'pd_name' => 'Flujos de trabajo (workflow)',
            'pd_value' => 'Ilimitado',
            'plan_id' => 3
        ]);
    }
}
