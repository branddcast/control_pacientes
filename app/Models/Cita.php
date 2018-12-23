<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'Citas';
    protected $primaryKey = 'Id_Cita';

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'Id_Paciente', 'Id_Paciente');
    }

    public function especialista()
    {
        return $this->belongsTo('App\Models\Especialista', 'Id_Especialista', 'Id_Especialista');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'Id_Usuario', 'Id_Usuario');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color', 'Id_Color', 'Id_Color');
    }
}
