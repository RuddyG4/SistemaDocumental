<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $folders = \App\Models\Documents\Folder::pluck('id')->toArray();
        $files = \App\Models\Documents\File::pluck('id')->toArray();
        $folder_random_activities = ['view_folder', 'download_folder'];
        $file_random_activities = ['view_file', 'download_file'];
        $valorRandom = rand(1, 100); // Genera un número aleatorio entre 1 y 100
        if ($valorRandom > 50) {
            return [
                'activity_id' => fake()->randomElement($folders),
                'activity' => fake()->randomElement($folder_random_activities),
                'created_at' => fake()->dateTimeBetween('-8 months'),
                'tenan_id' => 1
            ];
        } else {
            return [
                'activity_id' => fake()->randomElement($files),
                'activity' => fake()->randomElement($file_random_activities),
                'created_at' => fake()->dateTimeBetween('-8 months'),
                'tenan_id' => 1
            ];
        }
    }
}
