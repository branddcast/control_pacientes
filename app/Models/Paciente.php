<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'Pacientes';
    protected $primaryKey = 'Id_Paciente';

    public function estatus()
    {
        return $this->belongsTo('App\Models\Estatus', 'Id_Estatus');
    }
}
