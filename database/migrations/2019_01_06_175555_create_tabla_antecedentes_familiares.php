<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaAntecedentesFamiliares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_familiares', function (Blueprint $table) {
            $table->increments('Id_Antecedentes_Familiares');
            $table->string('Diabetes', 100);
            $table->string('Hipertension', 100);
            $table->string('Cancer', 100);
            $table->string('Problemas_Corazon', 100);
            $table->string('Problemas_Circulacion', 100);
            $table->string('Problemas_Pulmonares', 100);
            $table->string('Problemas_Digestivos', 100);
            $table->string('Epilepsia', 100);
            $table->string('Problemas_Psiquiatricos', 100);
            $table->string('Trom_Embo_Hemo_Cerebrales', 100);
            $table->string('Padre_Vivo', 20);
            $table->string('Madre_Viva', 20);
            $table->string('Obesidad', 100);
            $table->string('Otras', 200);
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
        Schema::dropIfExists('antecedentes_familiares');
    }
}
