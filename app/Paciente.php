<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'pacienteId','dataDeNascimento', 'tipo'
    ];

    public function paciente()
    {
        return $this->belongsTo(User::class);
    }
}
