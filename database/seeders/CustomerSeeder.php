<?php

namespace Database\Seeders;

use App\Models\Users\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'Gonzalo',
            'email' => 'ruddygonzqh@gmail.com', 
            'password' => '$2y$10$HdN5uqitH0qRbYppWR3eaeY8BBff3akK9e92U1FbYY.FV0vQHgVUa',
            'company_name' => 'Clínica Montalvo'
        ]);
        
        Customer::create([
            'name' => 'Thalía',
            'email' => 'thalia@gmail.com', 
            'password' => '$2y$10$HdN5uqitH0qRbYppWR3eaeY8BBff3akK9e92U1FbYY.FV0vQHgVUa',
            'company_name' => 'Empresa de transporte'
        ]);
    }
}
