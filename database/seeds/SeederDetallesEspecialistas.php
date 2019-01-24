<?php

use Illuminate\Database\Seeder;

class SeederDetallesEspecialistas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalles_especialistas')->insert([
        	'Id_Especialista' => 1,
        	'Id_Especialidad' => 1,
        ]);

        DB::table('detalles_especialistas')->insert([
        	'Id_Especialista' => 2,
        	'Id_Especialidad' => 2,
        ]);

        DB::table('detalles_especialistas')->insert([
        	'Id_Especialista' => 1,
        	'Id_Especialidad' => 2,
        ]);

        DB::table('detalles_especialistas')->insert([
        	'Id_Especialista' => 2,
        	'Id_Especialidad' => 1,
        ]);

        DB::table('detalles_especialistas')->insert([
        	'Id_Especialista' => 1,
        	'Id_Especialidad' => 3,
        ]);
    }
}
