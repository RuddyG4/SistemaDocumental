<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscription::create([
            'plan_id' => 3,
            'customer_id' => 1,
            'start_date' => now(),
            'end_date' => now()->addMonth(),
            'status' => 'A'
        ]);
    }
}
