<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'medicoId', 'dataDeNascimento', 'tipo'
    ];

    public function medico()
    {
        return $this->belongsTo(User::class);
    }
}
