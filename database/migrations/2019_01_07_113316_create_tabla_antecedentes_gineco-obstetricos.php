<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaAntecedentesGinecoObstetricos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_gineco-obstetricos', function (Blueprint $table){
            $table->increments('Id_Antecedentes_Gineco_Obstetricos');
            $table->string('Menarca', 100)->nullable();
            $table->string('Ritmo', 100)->nullable();
            $table->date('Ult_Menstruacion')->nullable();
            $table->integer('Parejas_Sexuales')->nullable();
            $table->string('Dismenorrea', 150)->nullable();
            $table->string('Inicio_Vida_Sexual', 100)->nullable();
            $table->integer('Embarazos')->nullable();
            $table->integer('Partos')->nullable();
            $table->integer('Cesareas')->nullable();
            $table->integer('Abortos')->nullable();
            $table->integer('Control_Natal')->nullable();
            $table->integer('Dispareunia')->nullable();
            $table->string('Mastografia', 150)->nullable();
            $table->string('Ultrasonido_Mamario', 150)->nullable();
            $table->integer('Autoexploracion_Mamaria')->nullable();
            $table->string('Numero_Ultrasonidos', 200)->nullable();
            $table->string('Colposcopia_Papanicolaou', 200)->nullable();
            $table->string('Planificacion_Familiar', 150)->nullable();
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
        Schema::dropIfExists('antecedentes_gineco-obstetricos');
    }
}
