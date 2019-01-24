<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialista;
use App\Models\Especialidad;
use App\Models\Estatus;
use App\Models\Color;
use App\Models\Cita;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Facades\PushNotify;

class EspecialistasController extends Controller
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
            $especialistas = Especialista::where('Nombre', 'LIKE', '%'.$q.'%')
                ->orWhere('Ap_Paterno', 'LIKE', '%'.$q.'%')
                ->orWhere('Ap_Materno', 'LIKE', '%'.$q.'%')
                ->orWhere('Edad'      , '='   ,     $q    )
                ->orWhere('Telefono'  , 'LIKE', '%'.$q.'%')
                ->paginate(15);

        }else{
            $especialistas = Especialista::paginate(15);
        }

        return view('especialistas.show', ['especialistas' => $especialistas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estatus = Estatus::all();
        //$especialidades = Especialidad::all();
        $especialistas = Especialista::all();

        $colores = Color::whereNotIn('Id_Color', function ($query) {
            $query->select(DB::raw('Id_Color'))
                      ->from('especialistas');
            })->get();

        //SELECT bgColor FROM colores WHERE Id_Color NOT IN (SELECT Id_Color FROM especialistas);

        return view('especialistas.create', ['estatus' => $estatus, 'colores' => $colores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $especialista = new Especialista;
        $especialista->nombre = $request->nombre;
        $especialista->ap_paterno = $request->ap_paterno;
        $especialista->ap_materno = $request->ap_materno;
        $especialista->edad = $request->edad;
        $especialista->telefono = $request->telefono;
        $especialista->email = $request->email;
        $especialista->id_color = $request->color;
        $especialista->direccion = $request->direccion;
        $especialista->id_estatus = $request->estatus;
        //$especialista->id_especialidad = $request->especialidad;
        $especialista->created_at = Carbon::now();
        $especialista->updated_at = null;
        $ok = $especialista->save();

        if($ok){
            $notificar = PushNotify::push('agregó un nuevo especialista', \Auth::user()->usuario, 0);
            return redirect('especialistas')->with('success', '¡Especialista agregado correctamente!');
        }else{
            return redirect('especialistas/create')->with('error', '¡Error al agregar el especialista! Intente de nuevo.');
        }

         return redirect('especialistas');
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
        $especialistas = Especialista::find($id);
        $especialidades = Especialidad::all();
        $colores = Color::whereNotIn('Id_Color', function ($query) {
            $query->select(DB::raw('Id_Color'))
                      ->from('especialistas');
            })->get();
        return view('especialistas.edit', ['especialista' => $especialistas, 'estatus' => $estatus, 'especialidades' => $especialidades, 'colores' => $colores]);
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
        $hexadecimal = null;

        $especialista = Especialista::find($id);
        $especialista->nombre = $request->nombre;
        $especialista->ap_paterno = $request->ap_paterno;
        $especialista->ap_materno = $request->ap_materno;
        $especialista->edad = $request->edad;
        $especialista->telefono = $request->telefono;
        $especialista->email = $request->email;

        if($request->color == 0){
            $hexadecimal = $request->color_oculto;
        }else{
            $hexadecimal = $request->color;
        }

        $especialista->id_color = $hexadecimal;
        
        $especialista->direccion = $request->direccion;
        $especialista->id_estatus = $request->estatus;
        //$especialista->id_especialidad = $request->especialidad;
        $especialista->created_at = Carbon::now();
        $especialista->updated_at = null;
        $ok = $especialista->save();

        if($ok){
            $citas = Cita::where('Id_Especialista', $id);

            if($citas->count() != 0){
            
                if($citas->update(['Id_Color' => $hexadecimal])){
                    $notificar = PushNotify::push('modificó un especialista', \Auth::user()->usuario, 0);
                    return redirect('especialistas')->with('success', '¡Especialista modificado correctamente!');
                }else{
                    return redirect('especialistas')->with('error', '¡Error al modificar el color de la cita! Intente de nuevo.');
                }
            }else{
                $notificar = PushNotify::push('modificó un especialista', \Auth::user()->usuario, 0);
                return redirect('especialistas')->with('success', '¡Especialista modificado correctamente!');
            }
        }else{
            return redirect('especialistas')->with('error', '¡Error al modificar el especialista! Intente de nuevo.');
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
        $especialista = Especialista::find($id);
        $ok = $especialista->delete();

        if($ok){
            $notificar = PushNotify::push('eliminó un especialista', \Auth::user()->usuario, 0);
            return redirect('especialistas')->with('success','¡Especialista eliminado correctamente!');
        }else{
            return redirect('especialistas')->with('error','¡Error al intentar eliminar al especialista!');
        }
    }
}
