<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vagas>
 */
class VagasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->jobTitle,
            'descricao' => $this->faker->paragraph,
            'tipo_contrato' => $this->faker->randomElement(['CLT', 'Pessoa Jurídica', 'Freelancer']),
            'pausada' => $this->faker->boolean(10),
        ];
    }
}
