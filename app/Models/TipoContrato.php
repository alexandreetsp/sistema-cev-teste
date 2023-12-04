<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    use HasFactory;

    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'tipo_contrato_id');
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class, 'tipo_contrato_id');
    }
}
