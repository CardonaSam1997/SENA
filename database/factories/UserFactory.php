<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected static ?string $password;
    
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),            
            'password' => bcrypt('password'),
            'role' => 'pending',
            'completed' => false,            
        ];
    }
    
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
