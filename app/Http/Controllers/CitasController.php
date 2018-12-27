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

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialistas = Especialista::all();
        $pacientes = Paciente::all();

        return view('citas.show', ['pacientes' => $pacientes, 'especialistas' => $especialistas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        if($cita->save()){
            $notificar = PushNotify::push('agregó una nueva cita', \Auth::user()->usuario, 0);
            return response()->json(array('msg'=> true));
        }else{
            return response()->json(array('msg'=> false));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
    public function destroy()
    {
        $data = Input::all();
        $cita = Cita::find($data['id']);

        if($cita->delete()){
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

        if($cita->update()){
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
