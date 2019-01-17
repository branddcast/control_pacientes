<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoriaClinica;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use App\Models\AntecedentesFamiliares;
use App\Models\AntecedentesPersonales;
use App\Models\AntecedentesMedicos;
use App\Models\AntecedentesPsicologicos;
use App\Models\ValoracionFuncional;
use App\Models\AntecedentesNutricionales;
use App\Models\AntecedentesGinecoObstetricos;
use App\Facades\PushNotify;
use App\Facades\CleanRowDB;

class HistoriasClinicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
    public function index()
    {
        //
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $paciente = Paciente::find($id);

        if($paciente->count() == 0){
            abort(404);
        }

        $historia_clinica = HistoriaClinica::where('Id_Paciente', $id)->get();

        if($historia_clinica->count() > 0){
            return redirect()->action('HistoriasClinicasController@show', ['id' => $id]);
        }

        $citas = DB::table('citas')
                     ->join('especialistas', 'citas.Id_Especialista', '=', 'especialistas.Id_Especialista')
                     ->where('Id_Paciente', $id)
                     ->select(DB::raw('DISTINCT(citas.Id_Especialista), especialistas.Nombre, especialistas.Ap_Paterno'))
                     ->get();

        return view('historias_clinicas.edit', ['paciente' => $paciente, 'citas' => $citas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_ant_fam = 0;
        $id_ant_per = 0;
        $id_ant_med = 0;
        $id_ant_psi = 0;
        $id_val_fun = 0;
        $id_ant_nut = 0;
        $id_ant_gin = 0;

        // ANTECEDENTES FAMILIARES

        $ant_fam = new AntecedentesFamiliares;

        $ant_fam->Diabetes = $request->diabetes."|".$request->diabetes_parentesco."|";
        $ant_fam->Hipertension = $request->hipertension."|".$request->hipertension_parentesco."|";
        $ant_fam->Cancer = $request->cancer."|".$request->cancer_parentesco."|";
        $ant_fam->Problemas_Corazon = $request->corazon."|".$request->corazon_parentesco."|";
        $ant_fam->Problemas_Circulacion = $request->circulacion."|".$request->circulacion_parentesco."|";
        $ant_fam->Problemas_Pulmonares = $request->pulmonares."|".$request->pulmonares_parentesco."|";
        $ant_fam->Problemas_Digestivos = $request->digestivo."|".$request->digestivo_parentesco."|";
        $ant_fam->Epilepsia = $request->epilepsia."|".$request->epilepsia_parentesco."|";
        $ant_fam->Problemas_Psiquiatricos = $request->psiquiatrico."|".$request->psiquiatrico_parentesco."|";
        $ant_fam->Trom_Embo_Hemo_Cerebrales = $request->trombosis."|".$request->trombosis_parentesco."|";
        $ant_fam->Padre_Vivo = $request->padre_vivo;
        $ant_fam->Madre_Viva = $request->madre_viva;
        $ant_fam->Obesidad = $request->obesidad."|".$request->obesidad_parentesco."|";
        $ant_fam->Otras = $request->otras;

        if($ant_fam->save()){
            $id_ant_fam = DB::table('antecedentes_familiares')->select(DB::raw('LAST_INSERT_ID() as id'))->get();
        }else{
            return back()->with('error', 'Error al registrar la información. Intente de nuevo más tarde.');
        }

        // ANTECEDENTES PERSONALES

        $ant_per = new AntecedentesPersonales;

        $ant_per->Ejercicio = $request->ejercicio."|".$request->ejercicio_tipo."|".$request->ejercicio_frecuencia|";
        $ant_per->Cigarro = $request->fuma."|".$request->fuma_por_dia."|".$request->fuma_desde."|".$request->fuma_hasta."|";
        $ant_per->Alcohol = $request->alcohol."|".$request->alcohol_tipo."|".$request->alcohol_desde."|".$request->alcohol_hasta.|";
        $ant_per->Sustancias = $request->sustancias."|".$request->sustancias_tipo."|".$request->sustancias_desde."|".$request->sustancias_hasta."|";
        $ant_per->Alergias = $request->alergias."|".$request->alergias_descripcion." |";
        $ant_per->Medicamentos = $request->medicamentos."|".$request->medicamentos_descripcion." |";
        $ant_per->Vacunas = $request->vacunas."|".$request->vacunas_descripcion."|";

        if($ant_per->save()){
            $id_ant_per = DB::table('antecedentes_personales')->select(DB::raw('LAST_INSERT_ID() as id'))->get();
        }else{
            return back()->with('error', 'Error al registrar la información. Intente de nuevo más tarde.');
        }

        // ANTECEDENTES MÉDICOS

        $ant_med = new AntecedentesMedicos;

        $ant_med->Cirugias = $request->cirugias."|".$request->cirugias_desripcion."|";
        $ant_med->Diabetes = $request->diabetes_2."|".$request->diabetes_2_desde."|";
        $ant_med->Tiroides = $request->tiroides."|".$request->tiroides_desde."|";
        $ant_med->Hipertension = $request->hipertension_2."|".$request->hipertension_2_desde."|";
        $ant_med->Migrania = $request->migrania."|".$request->migrania_desde."|";
        $ant_med->Problemas_Gastrointestinales = $request->gastrointestinales."|".$request->gastrointestinales_desde."|";
        $ant_med->Fractura = $request->fractura."|".$request->fractura_desde."|";
        $ant_med->Problemas_Higado = $request->higado."|".$request->higado_desde."|";
        $ant_med->Problemas_Reumaticos = $request->reumas."|".$request->reumas_desde."|";
        $ant_med->Problemas_Vesicula = $request->vesicula."|".$request->vesicula_desde."|";
        $ant_med->Nerviosismo_Ansiedad = $request->nerviosismo."|".$request->nerviosismo_desde."|";
        $ant_med->Problemas_Pulmonares = $request->pulmonares_2."|".$request->pulmonares_2_desde."|";
        $ant_med->Depresion = $request->depresion."|".$request->depresion_desde."|";
        $ant_med->Problemas_Corazon = $request->corazon_2."|".$request->corazon_2_desde."|";
        $ant_med->Epilepsia = $request->convulsiones."|".$request->convulsiones_desde."|";
        $ant_med->Problemas_Circulacion = $request->circulacion_2."|".$request->circulacion_2_desde."|";
        $ant_med->Cancer = $request->cancer_2."|".$request->cancer_2_desde."|";
        $ant_med->Problemas_Genitourinarios = $request->genitourinarios."|".$request->genitourinarios_desde."|";
        $ant_med->Transfusiones = $request->transfusiones."|".$request->transfusiones_desde."|";
        $ant_med->Problemas_Piel = $request->piel."|".$request->piel_desde."|";
        $ant_med->Otras = $request->otras_2;

        if($ant_med->save()){
            $id_ant_med = DB::table('antecedentes_medicos')->select(DB::raw('LAST_INSERT_ID() as id'))->get();
        }else{
            return back()->with('error', 'Error al registrar la información. Intente de nuevo más tarde.');
        }

        // ANTECEDENTES PSICOLOGICOS 

        $ant_psi = new AntecedentesPsicologicos;

        $ant_psi->Nerviosismo = $request->nerviosismo_2."|".$request->nerviosismo_2_desde."|";
        $ant_psi->Alter_Equilibrio = $request->equilibrio."|".$request->equilibrio_desde."|";
        $ant_psi->Depresion = $request->depresion_2."|".$request->depresion_2_desde."|";
        $ant_psi->Dific_Habla = $request->habla."|".$request->habla_desde."|";
        $ant_psi->Dific_Concentracion = $request->concentracion."|".$request->concentracion_desde."|";
        $ant_psi->Dific_Dormir = $request->dormir."|".$request->dormir_desde."|";
        $ant_psi->Dolores_Cabeza = $request->cabeza."|".$request->cabeza_desde."|";
        $ant_psi->Mareos = $request->mareos."|".$request->mareos_desde."|";
        $ant_psi->Desmayos = $request->desmayos."|".$request->desmayos_desde."|";
        $ant_psi->Medicamentos = $request->antidepresivos."|".$request->antidepresivos_desde."|";

        if($ant_psi->save()){
            $id_ant_psi = DB::table('antecedentes_psicologicos')->select(DB::raw('LAST_INSERT_ID() as id'))->get();
        }else{
            return back()->with('error', 'Error al registrar la información. Intente de nuevo más tarde.');
        }

        // VALORACION FUNCIONAL

        $val_fun = new ValoracionFuncional;

        $val_fun->Capacidad_Diferente = $request->discapacidad;
        $val_fun->Apoyo_Especial = $request->auditivo."|".$request->motor."|".$request->visual."|".$request->idioma."|".$request->otros_3."|";

        if($val_fun->save()){
            $id_val_fun = DB::table('valoracion_funcional')->select(DB::raw('LAST_INSERT_ID() as id'))->get();
        }else{
            return back()->with('error', 'Error al registrar la información. Intente de nuevo más tarde.');
        }

        // ANTECEDENTE NUTRICIONALES

        $ant_nut = new AntecedentesNutricionales;

        $ant_nut->Peso = $request->peso;
        $ant_nut->Estatura = $request->estatura;
        $ant_nut->Percentil = $request->percentil;
        $ant_nut->Peso_Ult_6_Meses = $request->aumento."|".$request->cuanto_aumento."|".$request->porque_aumento."|";
        $ant_nut->IMC = $request->imc;
        $ant_nut->Dieta_Especial = $request->dieta."|".$request->cual_dieta."|";
        $ant_nut->Peso_Perdida_Global = $request->perdida_global;
        $ant_nut->Porcentaje_Perdida = $request->perdida_porcentaje;
        $ant_nut->Ultimo_Aumento = $request->aumento_ultimo;
        $ant_nut->Peso_Estable = $request->peso_estable;
        $ant_nut->Reduccion = $request->reduccion;


        if($ant_nut->save()){
            $id_ant_nut = DB::table('antecedentes_nutricionales')->select(DB::raw('LAST_INSERT_ID() as id'))->get();
        }else{
            return back()->with('error', 'Error al registrar la información. Intente de nuevo más tarde.');
        }


        //Se habilita el llenado si el paciente es Mujer

        if($request->sexo == 'M'){
            // ANTECEDENTES GINECO-OBSTETRICOS

            $ant_gin = new AntecedentesGinecoObstetricos;

            $ant_gin->Menarca = $request->menarca;
            $ant_gin->Ritmo = $request->ritmo;
            $ant_gin->Ult_Menstruacion = $request->ult_menstruacion;
            $ant_gin->Parejas_Sexuales = $request->parejas_sexuales;
            $ant_gin->Dismenorrea = $request->dismenorrea."|".$request->tratamiento_dismenorrea."|";
            $ant_gin->Inicio_Vida_Sexual = $request->vida_sexual;
            $ant_gin->Embarazos = $request->embarazos;
            $ant_gin->Partos = $request->partos;
            $ant_gin->Cesareas = $request->cesareas;
            $ant_gin->Abortos = $request->abortos;
            $ant_gin->Control_Natal = $request->control_natal;
            $ant_gin->Dispareunia = $request->dispareunia;
            $ant_gin->Mastografia = $request->mastografia."|".$request->fecha_mastografia."|";
            $ant_gin->Ultrasonido_Mamario = $request->ultrasonido_mamario."|".$request->fecha_ultrasonido_mamario."|";
            $ant_gin->Autoexploracion_Mamaria = $request->autoexploracion;
            $ant_gin->Numero_Ultrasonidos = $request->cantidad_ultrasonidos."|".$request->fecha_ultrasonido."|".$request->resultado_ultrasonido."|";
            $ant_gin->Colposcopia_Papanicolaou = $request->colposcopia."|".$request->fecha_colposcopia."|".$request->resultado_colposcopia."|";
            $ant_gin->Planificacion_Familiar = $request->tipo_planificacion;

            if($ant_gin->save()){
                $id_ant_gin = DB::table('antecedentes_gineco-obstetricos')->select(DB::raw('LAST_INSERT_ID() as id'))->get();
            }else{
                return back()->with('error', 'Error al registrar la información. Intente de nuevo más tarde.');
            }
        }

        // HISTORIA CLINICA

        $historia_clinica = new HistoriaClinica;

        $historia_clinica->Sexo = $request->sexo;
        $historia_clinica->Ocupacion = $request->ocupacion;
        $historia_clinica->Religion = $request->religion;
        $historia_clinica->Lugar_Nacimiento = $request->lugar_nac;
        $historia_clinica->Fecha_Nacimiento = $request->fec_nac;
        $historia_clinica->Especialista = $request->Especialistas_Id;
        $historia_clinica->Padecimiento_Actual = $request->padecimiento_actual;
        $historia_clinica->Diagnosticos = $request->diagnostico;
        $historia_clinica->Comentarios = $request->comentarios;
        $historia_clinica->Id_Paciente = $request->paciente;

        $historia_clinica->Id_Antecedentes_Familiares = $id_ant_fam[0]->id;
        $historia_clinica->Id_Antecedentes_Personales = $id_ant_per[0]->id;
        $historia_clinica->Id_Antecedentes_Medicos = $id_ant_med[0]->id;
        $historia_clinica->Id_Antecedentes_Psicologicos = $id_ant_psi[0]->id;
        $historia_clinica->Id_Valoracion_Funcional = $id_val_fun[0]->id;
        $historia_clinica->Id_Antecedentes_Nutricionales = $id_ant_nut[0]->id;
        $historia_clinica->Id_Antecedentes_Gineco_Obstetricos = $id_ant_gin[0]->id;

        if($historia_clinica->save()){
            $notificar = PushNotify::push('generó una historia clínica', \Auth::user()->usuario, 0);
            return redirect('pacientes')->with('success', '¡Historia Clínica generada correctamente!');
        }else{
            return back()->with('error', '¡No se pudo generar la historia clínica!');
        }
    }

    public function show($id){

        $historia_clinica = HistoriaClinica::where('Id_Paciente', $id)->first();

        if($historia_clinica->count() > 0){

            $especialistas = CleanRowDB::limpiar($historia_clinica->Especialista);
            $paciente = Paciente::find($id);

            $citas = DB::table('citas')
                     ->join('especialistas', 'citas.Id_Especialista', '=', 'especialistas.Id_Especialista')
                     ->where('Id_Paciente', $id)
                     ->select(DB::raw('DISTINCT(citas.Id_Especialista), especialistas.Nombre, especialistas.Ap_Paterno'))
                     ->get();

            return view('historias_clinicas.edit', ['paciente' => $paciente, 'historia_clinica' => $historia_clinica, 'especialistas' => $especialistas, 'citas' => $citas]);
        }else{
            return redirect('historia_clinica/create/'.$id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historia_clinica = HistoriaClinica::find($id);
        return view('historias_clinicas.edit', ['historia_clinica' => $historia_clinica]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
