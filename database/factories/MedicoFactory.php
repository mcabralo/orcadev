<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medico;
use Faker\Generator as Faker;

$factory->define(Medico::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        'dataDeNascimento' => $faker->date('y-d-m'),
        'tipo' => $faker->randomElement($array = array('1')),
        // for ($i = 0; $i < 10; $i++) {
        //     echo $faker->name, "\n";
        //   }
        'medicoId' => $faker->unique()->numberBetween(1,7)
    ];
});
