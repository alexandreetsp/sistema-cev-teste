<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagasCandidatos extends Model
{
    use HasFactory;

    
    public function vaga()
    {
        return $this->belongsTo(Vagas::class);
    }

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
}
