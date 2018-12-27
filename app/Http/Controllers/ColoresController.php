<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Facades\PushNotify;

class ColoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Input::get('q') != ''){
            $colores = Color::where('bgColor', 'LIKE', '%'.Input::get('q').'%')
                ->orWhere('textColor', 'LIKE', '%'.Input::get('q').'%')
                ->paginate(15);
        }else{
            $colores = Color::paginate(15);
        }

        return view('colores.show', ['colores' => $colores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('colores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = new Color;
        $color->textColor = $request->textColor;
        $color->bgColor = $request->bgColor;
        $color->created_at = Carbon::now();
        $color->updated_at = null;

        if($color->save()){
            $notificar = PushNotify::push('agregó un nuevo color', \Auth::user()->usuario, 0);
            return redirect('colores')->with('success', 'Color agregado correctamente!');
        }else{
            return redirect('colores/create')->with('error', '¡Error al agregar el color! Intente de nuevo.');
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
        $colores = Color::find($id);
        return view('colores.edit', ['colores' => $colores]);
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
        $color = Color::find($id);
        $color->textColor = $request->get('textColor');
        $color->bgColor = $request->get('bgColor');
        $color->updated_at = Carbon::now();

        $ok = $color->save();

        if($ok){
            $notificar = PushNotify::push('modificó un color', \Auth::user()->usuario, 0);
            return redirect('colores')->with('success','¡Color actualizado correctamente!');
        }else{
            return redirect('colores')->with('error','¡Error al intentar modificar el color!');
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
        $color = Color::find($id);
        $ok = $color->delete();

        if($ok){
            $notificar = PushNotify::push('eliminó un color', \Auth::user()->usuario, 0);
            return redirect('colores')->with('success','¡Color eliminado correctamente!');
        }else{
            return redirect('colores')->with('error','¡Error al intentar eliminar el color!');
        }
    }
}
