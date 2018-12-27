<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Estatus;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Facades\PushNotify;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Input::get('q') != ''){
            $q = Input::get('q');
            $pacientes = Paciente::where('Nombre', 'LIKE', '%'.$q.'%')
                ->orWhere('Ap_Paterno', 'LIKE', '%'.$q.'%')
                ->orWhere('Ap_Materno', 'LIKE', '%'.$q.'%')
                ->orWhere('Edad'      , '='   ,     $q    )
                ->orWhere('Telefono'  , 'LIKE', '%'.$q.'%')
                ->paginate(15);

        }else{
            $pacientes = Paciente::paginate(15);
        }

        return view('pacientes.show', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estatus = Estatus::all();
        return view('pacientes.create', ['estatus' => $estatus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente;
        $paciente->nombre = $request->nombre;
        $paciente->ap_paterno = $request->ap_paterno;
        $paciente->ap_materno = $request->ap_materno;
        $paciente->edad = $request->edad;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->id_estatus = $request->estatus;
        $paciente->created_at = Carbon::now();
        $paciente->updated_at = null;
        $ok = $paciente->save();

        if($ok){
            $notificar = PushNotify::push('agregó un nuevo paciente', \Auth::user()->usuario, 0);
            return redirect('pacientes')->with('success', '¡Paciente agregado correctamente!');
        }else{
            return redirect('pacientes/create')->with('error', '¡Error al agregar el paciente! Intente de nuevo.');
        }

         return redirect('pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return redirect('pacientes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estatus = Estatus::all();
        $paciente = Paciente::find($id);
        return view('pacientes.edit', ['paciente' => $paciente, 'estatus' => $estatus]);
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
        $paciente = Paciente::find($id);
        $paciente->nombre = $request->get('nombre');
        $paciente->ap_paterno = $request->get('ap_paterno');
        $paciente->ap_materno = $request->get('ap_materno');
        $paciente->edad = $request->get('edad');
        $paciente->telefono = $request->get('telefono');
        $paciente->direccion = $request->get('direccion');
        $paciente->id_estatus = $request->get('estatus');
        $paciente->created_at = Carbon::now();
        $paciente->updated_at = null;
        $ok = $paciente->save();

        if($ok){
            $notificar = PushNotify::push('modificó un paciente', \Auth::user()->usuario, 0);
            return redirect('pacientes')->with('success', '¡Paciente modificado correctamente!');
        }else{
            return redirect('pacientes')->with('error', '¡Error al modificar el paciente! Intente de nuevo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacientes = Paciente::find($id);
        $ok = $pacientes->delete();

        if($ok){
            $notificar = PushNotify::push('eliminó un paciente', \Auth::user()->usuario, 0);
            return redirect('pacientes')->with('success','¡Paciente eliminado correctamente!');
        }else{
            return redirect('pacientes')->with('error','¡Error al intentar eliminar el paciente!');
        }
    }
}
