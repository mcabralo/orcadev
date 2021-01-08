<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'data', 'horaInicio', 'horaTermino', 'pacId', 'medId'
    ];

    public function medico() {

        return $this->belongsTo(Medico::class);
    }

    public function paciente() {

        return $this->belongsTo(Paciente::class);
    }


}
