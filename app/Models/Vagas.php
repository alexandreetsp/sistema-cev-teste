<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'tipo_contrato_id', 'pausada'];

    public function vagas()
    {
        return $this->belongsToMany(Vagas::class, 'vagas_candidatos', 'candidato_id', 'vaga_id');
    }

     public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'tipo_contrato_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
