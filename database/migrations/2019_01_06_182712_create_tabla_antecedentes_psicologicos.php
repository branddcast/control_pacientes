<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaAntecedentesPsicologicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_psicologicos', function (Blueprint $table) {
            $table->increments('Id_Antecedentes_Psicologicos');
            $table->string('Nerviosismo', 100);
            $table->string('Depresion', 100);
            $table->string('Dific_Concentracion', 100);
            $table->string('Dolores_Cabeza', 100);
            $table->string('Mareos', 100);
            $table->string('Alter_Equilibrio', 100);
            $table->string('Dific_Habla', 100);
            $table->string('Dific_Dormir', 100);
            $table->string('Desmayos', 100);
            $table->string('Medicamentos', 100);
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
        Schema::dropIfExists('antecedentes_psicologicos');
    }
}
