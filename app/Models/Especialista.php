<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialista extends Model
{
    protected $table = 'Especialistas';
    protected $primaryKey = 'Id_Especialista';

    public function estatus()
    {
        return $this->belongsTo('App\Models\Estatus', 'Id_Estatus');
    }

    public function especialidad()
    {
        return $this->belongsTo('App\Models\Especialidad', 'Id_Especialidad');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color', 'Id_Color');
    }
}
