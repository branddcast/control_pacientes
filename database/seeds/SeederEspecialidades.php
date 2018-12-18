<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeederEspecialidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Especialidades')->insert([
        	'Nombre' => 'Acupuntura',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
        DB::table('Especialidades')->insert([
        	'Nombre' => 'Nutrición',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
        DB::table('Especialidades')->insert([
        	'Nombre' => 'Psicoterapia',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
    }
}
