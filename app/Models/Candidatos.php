<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatos extends Model
{
    use HasFactory;

    
    public function candidatos()
    {
        return $this->belongsToMany(Candidato::class, 'vagas_candidatos', 'vaga_id', 'candidato_id');
    }

    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'tipo_contrato_id');
    }
}
