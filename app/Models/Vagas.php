<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    use HasFactory;

    public function vagas()
    {
        return $this->belongsToMany(Vaga::class, 'vagas_candidatos', 'candidato_id', 'vaga_id');
    }

}
