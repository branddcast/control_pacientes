<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeederUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'Usuario' => 'admin',
        	'name'  => 'Super Administrador de Sistema',
        	'email'   => 'jcastillo.brandon@gmail.com',
        	'password'=> bcrypt('admin'),
            'email_verified_at' => Carbon::now(),
        	'Id_Rol'  => 1,
        	'Id_Estatus' => 1,
        	'created_at' => Carbon::now(new DateTimeZone('America/Monterrey'))
        ]);
    }
}
