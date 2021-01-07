<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data');
            $table->timestamp('horaInicio');
            $table->timestamp('horaTermino');
            $table->integer('medicoId');
            $table->integer('pacienteId');

            $table->foreign('medicoId')
            ->references('id')
            ->on('medico');
            $table->foreign('pacienteId')
            ->references('id')
            ->on('paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
