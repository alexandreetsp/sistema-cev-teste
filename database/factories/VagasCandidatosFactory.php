<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\VagasCandidatos;
use App\Models\Vagas;
use App\Models\Candidatos;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VagasCandidatos>
 */
class VagasCandidatosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     * 
     */
    protected $model = VagasCandidatos::class;

    public function definition(): array
    {
    
           // Create a new Vaga and Candidato
        $vaga = Vagas::factory()->create();
        $candidato = Candidatos::factory()->create();

        // Associate Vaga and Candidato with the VagaCandidato
        return [
            'vaga_id' => $vaga->id,
            'candidato_id' => $candidato->id,
            // Add any additional fields if needed
        ];
    }
}
