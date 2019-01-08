<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoriaClinica;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;

class HistoriasClinicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
    public function index()
    {
        //
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $paciente = Paciente::find($id);

        $citas = DB::table('citas')
                     ->select(DB::raw('distinct(Id_Especialista)'))
                     ->where('Id_Paciente', $id)
                     ->get();

        return view('historias_clinicas.edit', ['paciente' => $paciente, 'citas' => $citas]);
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
     
    public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historia_clinica = HistoriaClinica::find($id);
        return view('historias_clinicas.edit', ['historia_clinica' => $historia_clinica]);
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
