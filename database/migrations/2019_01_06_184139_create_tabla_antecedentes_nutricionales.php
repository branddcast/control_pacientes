<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaAntecedentesNutricionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_nutricionales', function (Blueprint $table) {
            $table->increments('Id_Antecedentes_Nutricionales');
            $table->decimal('Peso', 5, 2);
            $table->decimal('Estatura', 3, 2);
            $table->decimal('Percentil', 5, 2);
            $table->string('Peso_Ult_6_Meses', 150);
            $table->decimal('IMC', 5, 2);
            $table->string('Dieta_Especial', 100);
            $table->decimal('Peso_Perdida_Global', 5, 2);
            $table->decimal('Porcentaje_Perdida', 5, 2);
            $table->decimal('Ultimo_Aumento', 5, 2);
            $table->decimal('Peso_Estable', 5, 2);
            $table->string('Reduccion', 15);
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
        Schema::dropIfExists('antecedentes_nutricionales');
    }
}
