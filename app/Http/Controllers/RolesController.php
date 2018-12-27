<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Models\Rol;
use App\Facades\PushNotify;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Auth::user()->authorizeRoles(['Super Admin']);
        if(Input::get('q') != ''){
            $q = Input::get('q');
            $roles = Rol::where('Nombre', 'LIKE', '%'.$q.'%')
                ->paginate(15);

        }else{
            $roles = Rol::paginate(15);
        }

        return view('roles.show', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Auth::user()->authorizeRoles(['Super Admin']);
        return view('roles.create');
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
        $rol = new Rol;
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->created_at = Carbon::now();
        $rol->updated_at = null;
        $ok = $rol->save();

        if($ok){
            $notificar = PushNotify::push('agregó un nuevo rol', \Auth::user()->usuario, 0);
            return redirect('roles')->with('success', '¡Rol agregado correctamente!');
        }else{
            return redirect('roles/create')->with('error', '¡Error al agregar el rol! Intente de nuevo.');
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
        $roles = Rol::find($id);
        return view('roles.edit', ['rol' => $roles]);
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
        $roles= Rol::find($id);
        $roles->nombre = $request->get('nombre');
        $roles->descripcion = $request->get('descripcion');
        $roles->updated_at = Carbon::now();

        $ok = $roles->save();

        if($ok){
            $notificar = PushNotify::push('modificó un rol', \Auth::user()->usuario, 0);
            return redirect('roles')->with('success','¡Rol actualizado correctamente!');
        }else{
            return redirect('roles')->with('error','¡Error al intentar modificar el rol!');
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
        if(isset($id)){
            $notificar = PushNotify::push('eliminó un rol', \Auth::user()->usuario, 0);
            return redirect('roles')->with('error','¡Error al intentar borrar el rol!');
        }

        return redirect('roles');
    }
}
