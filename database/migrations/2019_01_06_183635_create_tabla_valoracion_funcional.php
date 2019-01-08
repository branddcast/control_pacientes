<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaValoracionFuncional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoracion_funcional', function (Blueprint $table) {
            $table->increments('Id_Valoracion_Funcional');
            $table->string('Capacidad_Diferente', 100);
            $table->string('Apoyo_Especial', 50)->nullable();
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
        Schema::dropIfExists('valoracion_funcional');
    }
}
