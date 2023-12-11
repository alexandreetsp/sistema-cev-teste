<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\TipoContrato;

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
        $tipoContrato = TipoContrato::inRandomOrder()->first();
        return [
            'titulo' => $this->faker->jobTitle,
            'descricao' => $this->faker->paragraph,
            'tipo_contrato_id' => $tipoContrato->id,
            'pausada' => $this->faker->boolean(10),
        ];
    }
}
