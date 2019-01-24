<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaDetallesEspecialistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_especialistas', function (Blueprint $table) {
            $table->increments('Id_Detalles_Especialistas');
            $table->unsignedInteger('Id_Especialista');
            $table->unsignedInteger('Id_Especialidad');
            $table->timestamps();

            $table->foreign('Id_Especialista')
                  ->references('Id_Especialista')
                  ->on('especialistas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('Id_Especialidad')
                  ->references('Id_Especialidad')
                  ->on('especialidades')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabla_detalles_especialistas');
    }
}
