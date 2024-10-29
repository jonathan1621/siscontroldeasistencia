<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evento');
            $table->string('correo', 200);
            $table->string('nombre', 200);
            $table->string('apellido', 200);
            $table->string('dni', 100);
            $table->string('telefono', 100);
            $table->string('institucion', 100);
            $table->string('cargo');
            $table->string('asistencia');

            //$table->foreign('id_evento')->references('id')->on('eventos');
            $table->foreign('id_evento')->references('id')->on('eventos')->onDelete('cascade');

            // Índice único compuesto para id_evento, dni, y correo
            $table->unique(['id_evento', 'dni', 'correo']);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitados');
    }
}
