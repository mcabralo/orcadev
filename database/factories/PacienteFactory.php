<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        'dataDeNascimento' => $faker->date('y-d-m'),
        'tipo' => $faker->randomElement($array = array('2')),
        // for ($i = 0; $i < 10; $i++) {
        //     echo $faker->name, "\n";
        //   }
        'pacienteId' => $faker->unique()->numberBetween(8,14)
    ];
});
