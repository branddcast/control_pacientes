<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

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

        $estatus = new Estatus;
        $estatus->nombre = $request->nombre;
        $estatus->descripcion = $request->descripcion;
        $estatus->created_at = Carbon::now();
        $estatus->updated_at = null;
        $ok = $estatus->save();

        if($ok){
            return redirect('estatus')->with('success', '¡Estatus agregado correctamente!');
        }else{
            return redirect('estatus/create')->with('error', '¡Error al agregar el estatus! Intente de nuevo.');
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
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $estatus= Estatus::find($id);
        $estatus->nombre = $request->get('nombre');
        $estatus->descripcion = $request->get('descripcion');
        $estatus->updated_at = Carbon::now();

        $ok = $estatus->save();

        if($ok){
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
        $estatus = Estatus::find($id);
        $ok = $estatus->delete();

        if($ok){
            return redirect('estatus')->with('success','¡Estatus eliminado correctamente!');
        }else{
            return redirect('estatus')->with('error','¡Error al intentar eliminar el estatus!');
        }
    }

}
