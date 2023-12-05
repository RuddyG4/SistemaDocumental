<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'plan_name' => 'Free',
            'plan_description' => 'Plan gratis de por vida, pero siempre puedes actualizar',
            'plan_price' => 0,
            'plan_duration' => 30,
            'created_at' => now()->startOfYear()
        ]);
        
        Plan::create([
            'plan_name' => 'Basico',
            'plan_description' => 'Plan Básico para cubrir necesidades básicas de empresas',
            'plan_price' => 80,
            'plan_duration' => 30,
            'created_at' => now()->startOfYear()
        ]);
        
        Plan::create([
            'plan_name' => 'Enterprise',
            'plan_description' => 'Plan Enterprise para empresas grandes',
            'plan_price' => 150,
            'plan_duration' => 30,
            'created_at' => now()->startOfYear()
        ]);
    }
}
