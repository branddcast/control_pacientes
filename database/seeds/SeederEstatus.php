<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeederEstatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Estatus')->insert([
        	'Nombre' => 'Alta',
            'Descripcion' => 'Personal o Actividad activa en el sistema',
            'Icono' => 'success',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
        DB::table('Estatus')->insert([
        	'Nombre' => 'Baja',
            'Descripcion' => 'Personal o Actividad inactiva en el sistema',
            'Icono' => 'danger',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
        DB::table('Estatus')->insert([
            'Nombre' => 'Suspensión',
            'Descripcion' => 'Personal o Actividad suspendida en el sistema',
            'Icono' => 'warning',
            'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
    }
}
