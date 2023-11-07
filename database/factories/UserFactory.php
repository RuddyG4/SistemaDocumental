<?php

namespace Database\Factories;

use App\Models\Users\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = Role::all();
        $roles_ids = $roles->pluck('id')->toArray();
        foreach ($roles as $role) {
            $customers_ids[$role->id] = $role->tenan_id;
        }
        return [
            'username' => fake()->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'role_id' => $role_id = fake()->randomElement($roles_ids),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'tenan_id' => $customers_ids[$role_id],
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
