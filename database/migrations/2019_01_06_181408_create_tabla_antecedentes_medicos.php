<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaAntecedentesMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_medicos', function (Blueprint $table) {
            $table->increments('Id_Antecedentes_Medicos');
            $table->string('Cirugias', 150);
            $table->string('Diabetes', 100);
            $table->string('Tiroides', 100);
            $table->string('Problemas_Gastrointestinales', 100);
            $table->string('Problemas_Higado', 100);
            $table->string('Problemas_Vesicula', 100);
            $table->string('Problemas_Pulmonares', 100);
            $table->string('Problemas_Corazon', 100);
            $table->string('Problemas_Circulacion', 100);
            $table->string('Problemas_Genitourinarios', 100);
            $table->string('Problemas_Piel', 100);
            $table->string('Hipertension', 100);
            $table->string('Migrania', 100);
            $table->string('Fractura', 100);
            $table->string('Problemas_Reumaticos', 100);
            $table->string('Nerviosismo_Ansiedad', 100);
            $table->string('Depresion', 100);
            $table->string('Epilepsia', 100);
            $table->string('Cancer', 100);
            $table->string('Transfusiones', 100);
            $table->string('Otras', 200)->nullable();
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
        Schema::dropIfExists('antecedentes_medicos');
    }
}
