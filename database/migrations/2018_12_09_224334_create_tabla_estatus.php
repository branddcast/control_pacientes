<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaEstatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Estatus', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('Id_Estatus');
            $table->string('Nombre', 45);
            $table->string('Descripcion', 100)->nullable();
            $table->string('Icono',50)->nullable();
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
        Schema::dropIfExists('Estatus');
    }
}
