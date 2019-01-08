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
            $table->increments('Id_Antecedentes_Gineco-Obstetricos');
            $table->string('Menarca', 100);
            $table->string('Ritmo', 100);
            $table->date('Ult_Menstruacion');
            $table->integer('Parejas_Sexuales');
            $table->string('Dismenorrea', 150);
            $table->string('Inicio_Vida_Sexual', 100);
            $table->integer('Embarazos');
            $table->integer('Partos');
            $table->integer('Cesareas');
            $table->integer('Abortos');
            $table->integer('Control_Natal');
            $table->integer('Dispareunia');
            $table->string('Mastografia', 150);
            $table->string('Ultrasonido_Mamario', 150);
            $table->integer('Autoexploracion_Mamaria');
            $table->string('Numero_Ultrasonidos', 200);
            $table->string('Colposcopia_Papanicolaou', 200);
            $table->string('Plainificacion_Familiar', 150);
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
