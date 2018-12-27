<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificaciones';
    protected $primaryKey = 'Id_Notificacion';

    public function usuario()
	{
		return $this->belongsTo('App\User', 'Id_Usuario');
	}
}
