<?php
 
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
 
class CleanRowDB extends Facade {
 
    protected static function getFacadeAccessor()
    {
        return 'CleanRowDB';
    }
}