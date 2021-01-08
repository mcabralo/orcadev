<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Matheus Cabral',
        //     'email' => 'matheus@gmail.com',
        //     // 'data' => '1995-09-22',
        //     // 'tipo' => '3',
        //     'password' => Hash::make('laravel123')
        // ]);

        factory(\App\User::class, 14)->create();
        factory(\App\Paciente::class, 7)->create();
        factory(\App\Medico::class, 7)->create();
        factory(\App\Agendamento::class, 30)->create();

    }
}
