<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Facades\PushNotify;

class EstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Input::get('q') != ''){
            $estatus = Estatus::where('Nombre', 'LIKE', '%'.Input::get('q').'%')->paginate(15);
        }else{
            $estatus = Estatus::paginate(15);
        }
        

        return view('estatus.show', ['estatus' => $estatus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Auth::user()->authorizeRoles(['Super Admin']);
        return view('estatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Auth::user()->authorizeRoles(['Super Admin']);

        $estatus = new Estatus;
        $estatus->nombre = $request->nombre;
        $estatus->descripcion = $request->descripcion;
        $estatus->created_at = Carbon::now();
        $estatus->updated_at = null;
        $ok = $estatus->save();

        if($ok){
            $notificar = PushNotify::push('agregó un nuevo estatus', \Auth::user()->usuario, 0);
            return redirect('estatus')->with('success', '¡Estatus agregado correctamente!');
        }else{
            return redirect('estatus/create')->with('error', '¡Error al agregar el estatus! Intente de nuevo.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        \Auth::user()->authorizeRoles(['Super Admin']);

        $estatus = Estatus::find($id);
        return view('estatus.edit', ['estatus' => $estatus]);
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
        \Auth::user()->authorizeRoles(['Super Admin']);

        $estatus= Estatus::find($id);
        $estatus->nombre = $request->get('nombre');
        $estatus->descripcion = $request->get('descripcion');
        $estatus->updated_at = Carbon::now();

        $ok = $estatus->save();

        if($ok){
            $notificar = PushNotify::push('modificó un estatus', \Auth::user()->usuario, 0);
            return redirect('estatus')->with('success','¡Estatus actualizado correctamente!');
        }else{
            return redirect('estatus')->with('error','¡Error al intentar modificar el estatus!');
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
        \Auth::user()->authorizeRoles(['Super Admin']);

        $estatus = Estatus::find($id);

        if($estatus->Nombre == 'Alta'){
            return redirect('estatus')->with('error','¡Error al intentar eliminar el estatus! \'Alta\' no está permitido eliminarlo');
        }else if($estatus->Nombre == 'Baja'){
            return redirect('estatus')->with('error','¡Error al intentar eliminar el estatus! \'Baja\' no está permitido eliminarlo');
        }else if($estatus->Nombre == 'Suspensión'){
            return redirect('estatus')->with('error','¡Error al intentar eliminar el estatus! \'Suspensión\' no está permitido eliminarlo');
        }
        $ok = $estatus->delete();

        if($ok){
            $notificar = PushNotify::push('eliminó un estatus', \Auth::user()->usuario, 0);
            return redirect('estatus')->with('success','¡Estatus eliminado correctamente!');
        }else{
            return redirect('estatus')->with('error','¡Error al intentar eliminar el estatus!');
        }
    }

}
