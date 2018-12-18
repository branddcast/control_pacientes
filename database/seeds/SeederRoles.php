<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeederRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Roles')->insert([
        	'Nombre' => 'Super Admin',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
        DB::table('Roles')->insert([
        	'Nombre' => 'Admin',
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
    }
}
