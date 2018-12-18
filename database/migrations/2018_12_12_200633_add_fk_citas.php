<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table)
        {
            $table->unsignedInteger('Id_Usuario')->nullable();
            $table->unsignedInteger('Id_Especialista')->nullable();
            $table->unsignedInteger('Id_Paciente')->nullable();
            $table->unsignedInteger('Id_Color')->nullable();

            $table->foreign('Id_Usuario')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Especialista')
                  ->references('Id_Especialista')
                  ->on('Especialistas')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Paciente')
                  ->references('Id_Paciente')
                  ->on('Pacientes')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Color')
                  ->references('Id_Color')
                  ->on('Colores')
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
