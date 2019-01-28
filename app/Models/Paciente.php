<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Paciente extends Model
{
    protected $table = 'Pacientes';
    protected $primaryKey = 'Id_Paciente';

    use Searchable;

    public function estatus()
    {
        return $this->belongsTo('App\Models\Estatus', 'Id_Estatus');
    }
}
