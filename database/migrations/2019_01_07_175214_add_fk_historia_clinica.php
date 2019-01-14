<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkHistoriaClinica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historia_clinica', function (Blueprint $table)
        {
            $table->unsignedInteger('Id_Paciente');
            $table->unsignedInteger('Id_Antecedentes_Familiares')->nullable();
            $table->unsignedInteger('Id_Antecedentes_Personales')->nullable();
            $table->unsignedInteger('Id_Antecedentes_Medicos')->nullable();
            $table->unsignedInteger('Id_Antecedentes_Psicologicos')->nullable();
            $table->unsignedInteger('Id_Valoracion_Funcional')->nullable();
            $table->unsignedInteger('Id_Antecedentes_Nutricionales')->nullable();
            $table->unsignedInteger('Id_Antecedentes_Gineco_Obstetricos')->nullable();

            $table->foreign('Id_Paciente')
                  ->references('Id_Paciente')
                  ->on('pacientes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('Id_Antecedentes_Familiares')
                  ->references('Id_Antecedentes_Familiares')
                  ->on('antecedentes_familiares')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Antecedentes_Personales')
                  ->references('Id_Antecedentes_Personales')
                  ->on('antecedentes_personales')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Antecedentes_Medicos')
                  ->references('Id_Antecedentes_Medicos')
                  ->on('antecedentes_medicos')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Antecedentes_Psicologicos')
                  ->references('Id_Antecedentes_Psicologicos')
                  ->on('antecedentes_psicologicos')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Valoracion_Funcional')
                  ->references('Id_Valoracion_Funcional')
                  ->on('valoracion_funcional')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Antecedentes_Nutricionales')
                  ->references('Id_Antecedentes_Nutricionales')
                  ->on('antecedentes_nutricionales')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('Id_Antecedentes_Gineco_Obstetricos')
                  ->references('Id_Antecedentes_Gineco_Obstetricos')
                  ->on('antecedentes_gineco-obstetricos')
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
