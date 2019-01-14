<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    protected $table = "historia_clinica";
    protected $primaryKey = 'Id_Historia_Clinica';

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'Id_Paciente');
    }

    public function ante_familiares()
    {
        return $this->belongsTo('App\Models\AntecedentesFamiliares', 'Id_Antecedentes_Familiares');
    }

    public function ante_ginecoObstetricos()
    {
        return $this->belongsTo('App\Models\AntecedentesGinecoObstetricos', 'Id_Antecedentes_Gineco-Obstetricos');
    }

    public function ante_medicos()
    {
        return $this->belongsTo('App\Models\AntecedentesMedicos', 'Id_Antecedentes_Medicos');
    }

    public function ante_nutricionales()
    {
        return $this->belongsTo('App\Models\AntecedentesNutricionales', 'Id_Antecedentes_Nutricionales');
    }

    public function ante_personales()
    {
        return $this->belongsTo('App\Models\AntecedentesPersonales', 'Id_Antecedentes_Personales');
    }

    public function ante_psicologicos()
    {
        return $this->belongsTo('App\Models\AntecedentesPsicologicos', 'Id_Antecedentes_Psicologicos');
    }

    public function valoracion_funcional()
    {
        return $this->belongsTo('App\Models\ValoracionFuncional', 'Id_Valoracion_Funcional');
    }
}
