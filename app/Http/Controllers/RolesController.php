<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Models\Rol;

class RolesController extends Controller
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
        $rol = new Rol;
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->created_at = Carbon::now();
        $rol->updated_at = null;
        $ok = $rol->save();

        if($ok){
            return redirect('roles')->with('success', '¡Rol agregado correctamente!');
        }else{
            return redirect('roles/create')->with('error', '¡Error al agregar el rol! Intente de nuevo.');
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
        $roles= Rol::find($id);
        $roles->nombre = $request->get('nombre');
        $roles->descripcion = $request->get('descripcion');
        $roles->updated_at = Carbon::now();

        $ok = $roles->save();

        if($ok){
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
        if(isset($id)){
            return redirect('roles')->with('error','¡Error al intentar borrar el rol!');
        }

        return redirect('roles');
    }
}
