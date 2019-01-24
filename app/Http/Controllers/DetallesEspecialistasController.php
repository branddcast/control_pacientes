<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallesEspecialista;
use DB;
use Illuminate\Support\Facades\Input;
use App\Models\Especialista;

class DetallesEspecialistasController extends Controller
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

            //array para Id's
            //$id_especialistas = array();

            $nombre = Especialista::where('Nombre', 'LIKE', '%'.$q.'%')
            ->orWhere('Ap_Paterno', 'LIKE', '%'.$q.'%')
            ->orWhere('Ap_Materno', 'LIKE', '%'.$q.'%')
            ->first();

            if($nombre == null){
                return back()->with('error', 'No hay registro con <b>'.$q.'</b>');
            }

            /*for($i=0; $i < count($nombre); $i++){
                $id_especialistas[$i] = $nombre[$i]->Id_Especialista;
            }*/

            $detalles_especialistas = DetallesEspecialista::where('Id_Especialista', $nombre->Id_Especialista)->get();

            return view('detalles_especialistas.show', ['detalles_especialistas' => $detalles_especialistas, 'especialista' => $nombre]);

        }else{
            $detalles_especialistas = DetallesEspecialista::paginate(15);

            return view('detalles_especialistas.show', ['detalles_especialistas' => $detalles_especialistas]);
        }
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
        //
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
        //
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
