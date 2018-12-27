<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Facades\PushNotify;


class EspecialidadesController extends Controller
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
            $especialidades = Especialidad::where('Nombre', 'LIKE', '%'.$q.'%')
                ->paginate(15);

        }else{
            $especialidades = Especialidad::paginate(15);
        }

        return view('especialidades.show', ['especialidades' => $especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Auth::user()->authorizeRoles(['Super Admin', 'Admin']);
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Auth::user()->authorizeRoles(['Super Admin', 'Admin']);
        $especialidad = new Especialidad;
        $especialidad->nombre = $request->nombre;
        $especialidad->descripcion = $request->descripcion;
        $especialidad->created_at = Carbon::now();
        $especialidad->updated_at = null;
        $ok = $especialidad->save();

        if($ok){
            $notificar = PushNotify::push('agregó una nueva especialidad', \Auth::user()->usuario, 0);
            return redirect('especialidades')->with('success', '¡Especialidad agregada correctamente!');
        }else{
            return redirect('especialidades/create')->with('error', '¡Error al agregar la especialidad! Intente de nuevo.');
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
        \Auth::user()->authorizeRoles(['Super Admin', 'Admin']);
        $especialidades = Especialidad::find($id);
        return view('especialidades.edit', ['especialidad' => $especialidades]);
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
        \Auth::user()->authorizeRoles(['Super Admin', 'Admin']);
        $especialidad= Especialidad::find($id);
        $especialidad->nombre = $request->get('nombre');
        $especialidad->descripcion = $request->get('descripcion');
        $especialidad->updated_at = Carbon::now();

        $ok = $especialidad->save();

        if($ok){
            $notificar = PushNotify::push('modificó una especialidad', \Auth::user()->usuario, 0);
            return redirect('especialidades')->with('success','¡Especialidad actualizado correctamente!');
        }else{
            return redirect('especialidades')->with('error','¡Error al intentar modificar la especialidad!');
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
        \Auth::user()->authorizeRoles(['Super Admin','Admin']);
        $especialidades = Especialidad::find($id);
        $ok = $especialidades->delete();

        if($ok){
            $notificar = PushNotify::push('eliminó una especialidad', \Auth::user()->usuario, 0);
            return redirect('especialidades')->with('success','¡Especialidad eliminada correctamente!');
        }else{
            return redirect('especialidades')->with('error','¡Error al intentar eliminar la especialidad!');
        }
    }
}
