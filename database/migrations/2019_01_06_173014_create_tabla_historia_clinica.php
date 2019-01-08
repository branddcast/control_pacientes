<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaHistoriaClinica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinica', function (Blueprint $table) {
            $table->increments('Id_Historia_Clinica');
            $table->string('Sexo', 2);
            $table->string('Ocupacion', 200)->nullable();
            $table->string('Religión', 100)->nullable();
            $table->string('Lugar_Nacimiento')->nullable();
            $table->string('Fecha_Nacimiento')->nullable();
            $table->string('Especialista', 100)->nullable();
            $table->string('Padecimiento_Actual', 255);
            $table->string('Documentacion', 500)->nullable();
            $table->string('Diagnosticos', 255)->nullable();
            $table->string('Comentarios')->nullable();
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
        Schema::dropIfExists('historia_clinica');
    }
}
