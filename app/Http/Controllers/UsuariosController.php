<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Facades\PushNotify;
use Carbon\Carbon;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Auth::user()->authorizeRoles(['Super Admin', 'Admin']);
        if(Input::get('q') != ''){
            $usuarios = User::where('usuario', 'LIKE', '%'.Input::get('q').'%')
                ->orWhere('name', 'LIKE', '%'.Input::get('q').'%')
                ->orWhere('email', 'LIKE', '%'.Input::get('q').'%')
                ->paginate(15);

            //dd($usuarios);
        }else{
            $usuarios = User::paginate(15);
        }

        return view('usuarios.show', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Auth::user()->authorizeRoles(['Super Admin']);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        \Auth::user()->authorizeRoles(['Super Admin', 'Admin']);
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
    }

    public function verificarEmail($token, $id)
    {
        $verifyUser = User::where('codigo_verificacion', $token)->
            where('id', $id)->first();

        $error_1 = "Cuenta ya verificada.";
        $error_2 = "Correo electrónico no identificado.";
        $success = "Correo verificado. Ya puede ingresar a la plataforma.";
    
        if(isset($verifyUser) ){
            if($verifyUser->codigo_verificacion != null){
                $verifyUser->email_verified_at = Carbon::now();
                $verifyUser->codigo_verificacion = null;
                $verifyUser->Id_Estatus = 1;
                $verifyUser->save();
            }else{
                return redirect('login')->with('error', $error_1);
            }
        }else{
            return redirect('login')->with('error', $error_2);
        }
 
        return redirect('login')->with('success', $success);
    }
}
