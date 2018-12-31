<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Facades\PushNotify;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\verificarEmail;
use App\Models\Rol;
use App\Models\Estatus;

class UsuariosController extends Controller
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
        $roles = Rol::all();
        $estatus = Estatus::all();

        return view('usuarios.create', ['roles' => $roles, 'estatus' => $estatus]);
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

        $nombre_usuario = "";

        if($request->usuario != null){

            $exists_user = User::where('usuario', $request->usuario);

            if($exists_user->count() > 0){
                return back()->with('error', '¡Ya existe un registro con ese nombre de usuario! Intente con otro.');
            }

            $nombre_usuario = $request->usuario;
        }else{
            $nombre_usuario = str_replace('.', '_', substr($request->email,0, strpos($request->email,'@')));
        }

        $exists_email = User::where('email', $request->email);

        if($exists_email->count() > 0){
            return back()->with('error', '¡Ya existe un registro con ese email! Intente con otro.');
        }

        if($request->password != $request->password_){
            return back()->with('error', '¡Las contraseñas no coinciden! Escribalas de nuevo.');
        }

        $user = new User;
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->usuario = $nombre_usuario;
        $user->Id_Rol = 2;
        $user->Id_Estatus = 3;
        $user->codigo_verificacion = str_random(10);

            if($user->save()){
                Mail::to($user->email)->send(new verificarEmail($user));
                $notificar = PushNotify::push('registró un nuevo usuario', \Auth::user()->usuario, 0);
                return redirect('usuarios')->with('success', '¡Usuario registrado exitosamente! Debe ingresar a su correo electrónico para activar la cuenta.');
            }else{
                return redirect('usuarios')->with('error', '¡Error al registrar el usuario! Intente de nuevo más tarde.');
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
        $usuario = User::find($id);
        $roles = Rol::all();
        $estatus = Estatus::all();
        return view('usuarios.edit', ['usuario' => $usuario, 'roles' => $roles, 'estatus' => $estatus]);
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
        $user = User::find($id);

        $nombre_usuario = "";

        if($request->actual_password == ''){
            return back()->with('error', '¡Contraseña actual no aceptada! Ingresala correctamente.');
        }else if(!Hash::check($request->actual_password, $user->password)){
            return back()->with('error', '¡Error con la contraseña actual! No coincide con la del usuario que intenta modificar.');
        }

        if($request->usuario != null){

            $exists_user = User::where('usuario', $request->usuario)->
                where('id', '<>', $id)->get();

            if($exists_user->count() > 0){
                return back()->with('error', '¡Ya existe un registro con ese nombre de usuario! Intente con otro.');
            }

            $nombre_usuario = $request->usuario;
        }else{
            $nombre_usuario = str_replace('.', '_', substr($request->email,0, strpos($request->email,'@')));
        }

        $exists_email = User::where('email', $request->email)->
            where('id', '<>', $id)->get();

        if($exists_email->count() > 0){
            return back()->with('error', '¡Ya existe un registro con ese email! Intente con otro.');
        }

        if($request->password != $request->password_){
            return back()->with('error', '¡Las contraseñas no coinciden! Escribalas de nuevo.');
        }

        if(isset($request->estatus)){
            $user->Id_Estatus = $request->estatus;
        }

        if(isset($request->rol)){
            $user->Id_Rol = $request->rol;
        }

        $user->name = $request->nombre;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->usuario = $nombre_usuario;

            if($user->save()){
                Mail::to($user->email)->send(new verificarEmail($user));
                $notificar = PushNotify::push('modificó un nuevo usuario', \Auth::user()->usuario, 0);
                return redirect('usuarios')->with('success', '¡Usuario modificado exitosamente!');
            }else{
                return redirect('usuarios')->with('error', '¡Error al modificar el usuario! Intente de nuevo más tarde.');
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

        $user = User::find($id);

        if($user->usuario == 'admin'){
            return redirect('usuarios')->with('error', 'No se puede eliminar al Super Admin \'Admin\'');
        }

        $ok = $user->delete();

        if($ok){
            $notificar = PushNotify::push('eliminó un usuario', \Auth::user()->usuario, 0);
            return redirect('usuarios')->with('success','¡Usuario eliminado correctamente!');
        }else{
            return redirect('usuarios')->with('error','¡Error al intentar eliminar al usuario!');
        }
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
