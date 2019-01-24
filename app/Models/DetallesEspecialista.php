<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallesEspecialista extends Model
{
    protected $table = 'detalles_especialistas';
    protected $primaryKey = 'Id_Detalles_Especialistas';

    public function especialista(){
    	return $this->belongsTo('App\Models\Especialista', 'Id_Especialista');
    }

    public function especialidad()
    {
        return $this->belongsTo('App\Models\Especialidad', 'Id_Especialidad');
    }
}
