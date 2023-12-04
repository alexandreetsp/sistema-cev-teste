<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\VagasCandidatos;
use App\Models\Vagas;
use App\Models\Candidatos;
use App\Models\TipoContrato;

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

        $tipoContrato = TipoContrato::inRandomOrder()->first();

        // Create a new Vaga and Candidato associated with the randomly selected TipoContrato
        $vaga = Vagas::factory()->create(['tipo_contrato_id' => $tipoContrato->id]);
        $candidato = Candidatos::factory()->create(['tipo_contrato_id' => $tipoContrato->id]);
    
        return [
            'vaga_id' => $vaga->id,
            'candidato_id' => $candidato->id,
            // Add any additional fields if needed
        ];
    }
}
