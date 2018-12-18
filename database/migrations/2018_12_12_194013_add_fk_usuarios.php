<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->unsignedInteger('Id_Estatus')->nullable();
            $table->unsignedInteger('Id_Rol')->nullable();

            $table->foreign('Id_Estatus')
                  ->references('Id_Estatus')
                  ->on('Estatus')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
                  
            $table->foreign('Id_Rol')
                  ->references('Id_Rol')
                  ->on('Roles')
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
        //Schema::dropIfExists('usuarios');
    }
}
