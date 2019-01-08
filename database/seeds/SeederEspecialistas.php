<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeederEspecialistas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Especialistas')->insert([
        	'Nombre' => 'Mónica',
        	'Ap_Paterno' => 'Castillo',
        	'Ap_Materno' => 'Amezcua',
        	'Edad' => 46,
        	'Telefono' => '7771755275',
            'Email' => 'example1@example.com',
            'Direccion' => 'Av. Siempre Viva 742. Cuernavaca, Mor. México',
            'Id_Color' => 1,
            'Id_Estatus' => 1,
            'Id_Especialidad' => 1,
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
        
        DB::table('Especialistas')->insert([
        	'Nombre' => 'Xally Beatríz',
        	'Ap_Paterno' => 'Jaime',
        	'Ap_Materno' => 'Castillo',
        	'Edad' => 24,
        	'Telefono' => '7772291342',
            'Direccion' => 'Eje Central 123, Benito Juarez. Ciudad de México',
            'Email' => 'example2@example.com',
            'Id_Color' => 2,
            'Id_Estatus' => 1,
            'Id_Especialidad' => 2,
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
    }
}
