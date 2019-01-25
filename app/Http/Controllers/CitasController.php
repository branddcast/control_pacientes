<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Especialista;
use App\Models\Especialidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Routing\ResponseFactory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Models\Color;
use App\Facades\PushNotify;
use App\Facades\CleanRowDB;
use Illuminate\Support\Facades\Mail;
use App\Mail\verificarCita;
use App\Models\DetallesEspecialista;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialistas = Especialista::where('Id_Estatus', 1)->get();
        $detalles_especialistas = DetallesEspecialista::selectRaw('DISTINCT(Id_Especialista) as Id_Especialista,Id_Especialidad')->get();
        $pacientes = Paciente::where('Id_Estatus', 1)->get();

        return view('citas.show', ['pacientes' => $pacientes, 'especialistas' => $especialistas, 'detalles_especialistas' => $detalles_especialistas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Auth::user()->authorizeRoles(['Super Admin','Admin']);
        $cita = new Cita;

        $exists = DB::table('citas')
            ->where('Id_Especialista', $request->especialista)
            ->where('Fecha_Cita', '>=', $request->start)
            ->where('Fecha_Fin_Cita', '<=', $request->end)
            ->first();
        if($exists){
            return response()->json(
                array(
                    'msg'=> false, 
                    'text' => '¡Se empalma la cita con otra ya asignada!'
                )
            );
        }

        $especialista = Especialista::where('Id_Especialista', $request->especialista)->get()->first();
        $color = DB::table('colores')->where('Id_Color', $especialista->Id_Color)->get()->first();

        $cita->Titulo = $request->title;
        $cita->Comentarios = $request->comentarios;
        $cita->Fecha_Cita = $request->start;
        $cita->Fecha_Fin_Cita = $request->end;
        $cita->Sintomas = $request->sintomas;
        $cita->Id_Color = $especialista->Id_Color;
        $cita->Id_Usuario = $request->usuario;
        $cita->Id_Especialista = $request->especialista;
        $cita->Id_Paciente = $request->paciente;
        $cita->created_at = Carbon::now();
        $cita->updated_at = null;

        /*$historia_clinica = HistoriaClinica::where('Id_Paciente', $request->paciente)->get();
        $update_historia_clinica = HistoriaClinica::find($request->paciente);
        $update_historia_clinica->Especialista = $historia_clinica->Especialista."".$request->especialista."|";*/

        if($cita->save()){
            /*if($update_historia_clinica->save()){
                Mail::to($especialista->Email)->send(new verificarCita($especialista, $cita));
                $notificar = PushNotify::push('agregó una nueva cita', \Auth::user()->usuario, 0);
                return response()->json(array('msg'=> true));
            }*/
            if(date_create($cita->Fecha_Cita) > date_create(date("Y-m-d H:i:00",time()))){
                Mail::to($especialista->Email)->send(new verificarCita($especialista, $cita));
            }
                $notificar = PushNotify::push('agregó una nueva cita', \Auth::user()->usuario, 0);
                return response()->json(array('msg'=> true));
            
        }else{
            return response()->json(array('msg'=> false));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        \Auth::user()->authorizeRoles(['Super Admin', 'Admin']);
        $data = Input::all();
        $cita = Cita::find($data['id']);

        if($cita->delete()){
            $notificar = PushNotify::push('eliminó una cita', \Auth::user()->usuario, 0);
            return response()->json(array('msg'=> true));
        }else{
            return response()->json(array('msg'=> false));
        }        
    }

    public function citas_json()
    {
        $cita =  Cita::all();

        $citas_json[] = array();

        for($i=0; $i<count($cita); $i++) {

            $color = Color::where('Id_Color', $cita[$i]->Id_Color)->get()->first();

            $citas_json[$i] = array(
                'id' => $cita[$i]->Id_Cita,
                'title' => $cita[$i]->Titulo,
                'paciente' => $cita[$i]->Id_Paciente,
                'comentarios' => $cita[$i]->Comentarios,
                'sintomas' => $cita[$i]->Sintomas,
                'especialista' => $cita[$i]->Id_Especialista,
                'usuario' => $cita[$i]->Id_Usuario,
                'start' => $cita[$i]->Fecha_Cita,
                'end' => $cita[$i]->Fecha_Fin_Cita,
                'color' => $color->bgColor,
                'textColor' => $color->textColor
            
            );
        }
        //return $citas_json->toJson(JSON_PRETTY_PRINT);
        
        return json_encode($citas_json);
    }

    public function modificar()
    {
        \Auth::user()->authorizeRoles(['Super Admin', 'Admin']);
        
        $data = Input::all();

        $cita = Cita::find($data['id']);

        $especialista = Especialista::where('Id_Especialista', $data['especialista'])->get()->first();
        $color = DB::table('colores')->where('Id_Color', $data['especialista'])->get()->first();

        $cita->Titulo =$data['title'];
        $cita->Comentarios =$data['comentarios'];
        $cita->Fecha_Cita =$data['start'];
        $cita->Fecha_Fin_Cita =$data['end'];
        $cita->Sintomas =$data['sintomas'];
        $cita->Id_Color = $especialista->Id_Color;
        $cita->Id_Usuario =$data['usuario'];
        $cita->Id_Especialista =$data['especialista'];
        $cita->Id_Paciente =$data['paciente'];
        $cita->updated_at = Carbon::now();

        /*$historia_clinica = HistoriaClinica::where('Id_Paciente', $request->paciente)->get();
        $update_historia_clinica = HistoriaClinica::find($request->paciente);

        $especialista_his_clin = CleanRowDB::clean($historia_clinica->Especialista);

        $update_historia_clinica->Especialista = $historia_clinica->Especialista."".$request->especialista."|";*/

        if($cita->update()){
            if(date_create($cita->Fecha_Cita) > date_create(date("Y-m-d H:i:00",time()))){
                Mail::to($especialista->Email)->send(new verificarCita($especialista, $cita));
            }
            $notificar = PushNotify::push('modificó una cita', \Auth::user()->usuario, 0);
            return response()->json(array('msg'=> true));
        }else{
            return response()->json(array(
                'msg'=> false,
                'titulo' => $request->get('title'),
                'comentarios' => $request->get('comentarios'),
                'start' => $request->get('start'),
                'end' => $request->get('end'),
                'sintomas' => $request->get('sintomas'),
                'color' => $request->get('bgColor'),
                'textColor' => $request->get('textColor'),
                'usuario' => $request->get('usuario'),
                'especialista' => $request->get('especialista'),
                'paciente' => $request->get('paciente')
            ));
        }
    }
}
