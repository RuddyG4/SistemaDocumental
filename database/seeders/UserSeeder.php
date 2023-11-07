<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Gonzalo',
            'email' => 'ruddygonzqh@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => 1,
            'tenan_id' => 1
        ]);
        
        User::create([
            'username' => 'Thalia',
            'email' => 'thalia@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => 1,
            'tenan_id' => 2
        ]);
        
        User::factory()
            ->count(30)
            ->create();
    }
}
