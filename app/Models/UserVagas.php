<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVagas extends Model
{
    use HasFactory;
    
    protected $table = 'user_vagas'; 
    // Ensure the table name matches your actual pivot table name
    protected $fillable = [
        'user_id',
        'vagas_id',
    ];

    public function vagas()
    {
        return $this->belongsToMany(Vagas::class, 'user_vagas', 'user_id', 'vagas_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_vagas', 'vagas_id', 'user_id');
    }
}
