<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Citas', function (Blueprint $table) {
            $table->increments('Id_Cita');
            $table->string('Titulo', 100);
            $table->string('Comentarios', 255)->nullable();
            $table->dateTime('Fecha_Cita');
            $table->dateTime('Fecha_Fin_Cita')->nullable();
            $table->text('Sintomas')->nullable();
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Citas');
    }
}
