<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agendamento;
use Faker\Generator as Faker;

$factory->define(Agendamento::class, function (Faker $faker) {
    return [
        'data' => $faker ->dateTimeBetween('-1 year','+1 year')->format('Y-m-d'),
        'horaInicio' => $faker->time(),
        'horaTermino' => $faker->time(),
        'medId' => $faker->numberBetween(1,7),
        'pacId' => $faker->numberBetween(8,14)
    ];
});
