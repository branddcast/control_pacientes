<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Paciente;
use App\Models\Especialista;
use App\Models\Especialidad;
use App\Models\Cita;
use App\Models\Color;
use App\Models\Estatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pacientes
        $pacientes = Paciente::all();
        $total_pacientes = $pacientes->count();

        //Especialistas
        $especialistas = Especialista::all();
        $total_especialistas = $especialistas->count();

        //Especialidades
        $especialidades = Especialidad::all();
        $total_especialidades = $especialidades->count();

        //Citas
        $citas = Cita::all();
        $total_citas = $citas->count();

        //Colores
        $colores = Color::orderBy('Id_Color')
            ->limit(8)
            ->get();

        //Estatus
        $estatus = Estatus::orderBy('Id_Estatus')
            ->limit(10)
            ->get();

        //Últimas 10 citas
        $last_citas = Cita::where('Fecha_Cita', '>=', Carbon::now())
            ->orderBy('Fecha_Cita', 'ASC')
            ->limit(3)
            ->get();

        //Estadisticas_1
        /*$estadisticas_1 = DB::select(DB::raw('select MonthName(Fecha_Cita) as Mes, e.Nombre as Especialista, Count(*) as Total FROM Citas c LEFT JOIN Especialistas e ON e.Id_Especialista = c.Id_Especialista WHERE c.Fecha_Cita >= makedate(year(curdate()), 1) and c.Fecha_Cita < makedate(year(curdate()) + 1, 1) group by MonthName(Fecha_Cita), e.Nombre order By c.Fecha_Cita ASC'));*7
        /*$estadisticas_1 = DB::select(DB::raw('select MonthName(Fecha_Cita) as Mes, Id_Especialista as Especialista, Count(*) as Total FROM Citas WHERE Fecha_Cita >= makedate(year(curdate()), 1) and Fecha_Cita < makedate(year(curdate()) + 1, 1) group by MonthName(Fecha_Cita), Id_Especialista order By Fecha_Cita ASC'));*/

        $last_year = DB::select(DB::raw('SELECT Count(*) as Total, monthname(Fecha_Cita) as Mes FROM Citas WHERE Fecha_Cita >= makedate(year(curdate()), 1) and Fecha_Cita < makedate(year(curdate()) + 1, 1) GROUP BY monthname(Fecha_Cita) ORDER BY Fecha_Cita'));

        //dd($last_month);

        //$array = array();



        //dd($array);

        //Pacientes por especialista
        $estadisticas_2 = DB::select(DB::raw('select e.Nombre, count(DISTINCT(c.Id_Paciente)) as Total FROM Citas c LEFT JOIN Especialistas e ON e.Id_Especialista = c.Id_Especialista WHERE c.Id_Paciente IS NOT NULL group by e.Nombre'));

        //dd($pacientes_x_especialista);

        $usuario = User::find(\Auth::user()->id);
        return view('home', [
            'usuario' => $usuario, 
            'total_pacientes' => $total_pacientes,
            'total_especialidades' => $total_especialidades,
            'total_especialistas' => $total_especialistas,
            'total_citas' => $total_citas,
            'last_citas' => $last_citas,
            'estadisticas_1' => $last_year,
            'colores' => $colores,
            'estatus' => $estatus,
            'estadisticas_2' => $estadisticas_2
        ]);
    }
}
