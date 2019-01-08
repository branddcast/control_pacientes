<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaAntecedentesPersonales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_personales', function (Blueprint $table) {
            $table->increments('Id_Antecedentes_Personales');
            $table->string('Ejercicio', 200);
            $table->string('Cigarro', 100);
            $table->string('Alcohol', 100);
            $table->string('Sustancias', 100);
            $table->string('Alergias', 150);
            $table->string('Medicamentos', 250);
            $table->string('Vacunas', 250);
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
        Schema::dropIfExists('antecedentes_personales');
    }
}
