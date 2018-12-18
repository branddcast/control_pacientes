<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkEspecialistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Especialistas', function(Blueprint $table){
            $table->unsignedInteger('Id_Estatus')->nullable();
            $table->unsignedInteger('Id_Color')->nullable()->unique();
            $table->unsignedInteger('Id_Especialidad')->nullable();

            $table->foreign('Id_Estatus')
                  ->references('Id_Estatus')
                  ->on('Estatus')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Color')
                  ->references('Id_Color')
                  ->on('Colores')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Especialidad')
                  ->references('Id_Especialidad')
                  ->on('Especialidades')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
