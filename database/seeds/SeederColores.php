<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeederColores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Colores')->insert([
        	'textColor' => '#FFFFFF',
            'bgColor' => '#bf0026',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);

        DB::table('Colores')->insert([
        	'textColor' => '#FFFFFF',
            'bgColor' => '#0443fa',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);

        DB::table('Colores')->insert([
        	'textColor' => '#000000',
            'bgColor' => '#f56609',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);

        DB::table('Colores')->insert([
        	'textColor' => '#000000',
            'bgColor' => '#40a300',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);

        DB::table('Colores')->insert([
        	'textColor' => '#FFFFFF',
            'bgColor' => '#ff008b',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);

        DB::table('Colores')->insert([
        	'textColor' => '#000000',
            'bgColor' => '#ffc400',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
    }
}
