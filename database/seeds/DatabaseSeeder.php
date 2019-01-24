<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
         	SeederEstatus::class,
         	SeederRoles::class,
         	SeederUsuarios::class,
            SeederColores::class,
            SeederEspecialidades::class,
            SeederEspecialistas::class,
            SeederDetallesEspecialistas::class,
         	]);
    }
}
