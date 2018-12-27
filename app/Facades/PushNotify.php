<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class PushNotify extends Facade{

	protected static function getFacadeAccessor()
    {
        return 'Notificar';
    }

}