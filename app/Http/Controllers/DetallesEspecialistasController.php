<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallesEspecialista;
use DB;
use Illuminate\Support\Facades\Input;
use App\Models\Especialista;
use App\Models\Especialidad;

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
        $especialistas = Especialista::all();
        $especialidades = Especialidad::all();

        return view('detalles_especialistas.create', ['especialistas' => $especialistas, 'especialidades' => $especialidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verificar que no exista la especialidad asignada al especialista
        $verifica_especialidad = DB::table('detalles_especialistas')->selectRaw('count(*) as especialista')->where('Id_Especialista', $request->especialista)->where('Id_Especialidad', $request->especialidad)->get();

        if($verifica_especialidad[0]->especialista > 0){
            return back()->with('error', 'La especialidad ya está asignada al especialista. Intente con otros valores.');
        }

        $detalles_especialistas = new DetallesEspecialista;
        $detalles_especialistas->Id_Especialista = $request->especialista;
        $detalles_especialistas->Id_Especialidad = $request->especialidad;

        if($detalles_especialistas->save()){
            return back()->with('success', 'Registro guardado correctamente'); 
        }else{
            return redirect('detalles_especialistas')->with('error', 'Ocurrió un problema al intentar guardar el registro. Intente de nuevo');
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
        $detalles_especialista = DetallesEspecialista::find($id);
        if(isset($detalles_especialista->Id_Detalles_Especialistas) == false){
            return redirect('detalles_especialistas');
        }
        $especialistas = Especialista::all();
        $especialidades = Especialidad::all();

        return view('detalles_especialistas.edit', [
            'detalles_especialista' => $detalles_especialista, 
            'especialistas' => $especialistas, 
            'especialidades' => $especialidades
        ]);
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
        //verificar que no exista la especialidad asignada al especialista
        $verifica_especialidad = DB::table('detalles_especialistas')->selectRaw('count(*) as especialista')->where('Id_Especialista', $request->especialista)->where('Id_Especialidad', $request->especialidad)->get();

        if($verifica_especialidad[0]->especialista > 0){
            return back()->with('error', 'La especialidad ya está asignada al especialista. Intente con otros valores.');
        }

        $detalles_especialistas = DetallesEspecialista::find($id);
        $detalles_especialistas->Id_Especialista = $request->especialista;
        $detalles_especialistas->Id_Especialidad = $request->especialidad;

        if($detalles_especialistas->save()){
            return redirect('detalles_especialistas')->with('success', 'Registro modificado correctamente'); 
        }else{
            return redirect('detalles_especialistas')->with('error', 'Ocurrió un problema al intentar modificar el registro. Intente de nuevo');
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
        $detalles_especialista = DetallesEspecialista::find($id);

        if(isset($detalles_especialista->Id_Detalles_Especialistas) == false){
            return redirect('detalles_especialistas')->with('error', 'No existe ese registro');;
        }

        if($detalles_especialista->delete()){
            return redirect('detalles_especialistas')->with('success', 'Registro eliminado correctamente');
        }else{
            return redirect('detalles_especialistas')->with('error', 'No se pudo eliminar el registro');
        }
    }
}
