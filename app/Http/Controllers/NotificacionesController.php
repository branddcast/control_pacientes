<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacion;
use Illuminate\Support\Facades\DB;

class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $notificaciones = Notificacion::orderBy('created_at', 'DESC')->limit(15)->get();
        $array = array();

        for ($i=0; $i < count($notificaciones); $i++) { 
            $array[$i] = [
                'Notificacion' => $notificaciones[$i]->Notificacion,
                'Usuario' => $notificaciones[$i]->usuario->usuario,
                'Estado' => $notificaciones[$i]->Estado,
                'Fecha' => $notificaciones[$i]->created_at,
            ];
        }

        //Actualiza todas las notificaciones, y asigna valor 1, estado de 'visto'
        DB::table('notificaciones')
            ->update(['Estado' => 1]);

        return view('notificaciones.show', ['notificaciones' => $array]);
    }

    public function seen_notifications()
    {
        $ok = DB::table('notificaciones')
            ->update(['Estado' => 1]);

        return $ok;
    }

    public function getAll()
    {
        $notificaciones = DB::table('notificaciones')->orderBy('created_at', 'DESC')->limit(5)->get();
        $count = Notificacion::where('Estado', 0)->get();
        $total = $count->count();

        $notif_json[] = array();

        for($i=0; $i<count($notificaciones); $i++) {
            $name = DB::table('users')->where('id', $notificaciones[$i]->Id_Usuario)->get()->first();
            $usuario = $name->usuario;

            $notif_json[$i] = array(
                'Id_Notificacion' => $notificaciones[$i]->Id_Notificacion,
                'Notificacion' => $notificaciones[$i]->Notificacion,
                'Usuario'      => $usuario,
                'Fecha'        => strftime("%d %b, %H:%M", strtotime($notificaciones[$i]->created_at))
            );
        }

        return response()->json(array($notif_json, $total));
    }
}
