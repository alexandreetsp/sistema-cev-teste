<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Vagas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'password123',
            'remember_token' => Str::random(10),
            'vaga_id' => function () {
                return Vagas::factory()->create()->id;
            },
        ];
    }

    
    public function admin(): static
    {
        return $this->state([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'user_type' => 'admin',
        ]);
    }

 
    public function user(): static
    {
        return $this->state([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
            'user_type' => 'user',
        ]);
    }


 
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
