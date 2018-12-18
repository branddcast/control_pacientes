<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pacientes', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('Id_Paciente');
            $table->string('Nombre', 30);
            $table->string('Ap_Paterno', 30);
            $table->string('Ap_Materno', 30)->nullable();;
            $table->integer('Edad');
            $table->string('Telefono', 20);
            $table->string('Direccion', 200)->nullable();
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
        Schema::dropIfExists('Pacientes');
    }
}
