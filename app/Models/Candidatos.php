<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatos extends Model
{
    use HasFactory;

    
    // User.php
public function vagas()
{
    return $this->belongsToMany(Vagas::class);
}

// Vaga.php
public function users()
{
    return $this->belongsToMany(User::class);
}
}
