@extends('layouts.app')

@section('content')
@php
function hex2rgba($color, $opacity = false) {
 
    $default = 'rgb(0,0,0)';
 
    //Return default if no color provided
    if(empty($color))
          return $default; 
 
    //Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}
@endphp
<div class="app-title">
    <div>
        <h1>Bienvenido(a)</h1>
        <p>{{$usuario->name}}</p>
    </div>
    <form method="get" action="#" class="mr-2 mt-2 app-breadcrumb breadcrumb" style="width: 20%">
        <div class="input-group mb-3">
            <input class="form-control form-control-sm" type="text" name="buscar" placeholder="Buscar" disabled>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-dark btn-sm" disabled><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-3">
            <div class="widget-small primary">
                <i class="icon far fa-smile fa-3x"></i>
                <div class="info">
                    <h5>Pacientes</h5>
                    <p><b>{{$total_pacientes}}</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="widget-small danger">
                <i class="icon fas fa-hand-holding-heart fa-3x"></i>
                <div class="info">
                    <h5>Especialistas</h5>
                    <p><b>{{$total_especialistas}}</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="widget-small info">
                <i class="icon fas fa-briefcase-medical fa-3x"></i>
                <div class="info">
                    <h5>Especialidades</h5>
                    <p><b>{{$total_especialidades}}</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="widget-small warning">
                <i class="icon far fa-address-book fa-3x"></i>
                <div class="info">
                    <h5>Citas</h5>
                    <p><b>{{$total_citas}}</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="tile" style="align-content: center !important;">
                <h3 class="tile-title">Estadísticas</h3>
                <div class="title-body">
                    <center><div id="estadisticas_1" style="width: 460px; height: 350px;"></div></center>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="tile" style="padding-bottom: 5px">
                        <h3 class="tile-title">Próximas Citas</h3>
                        <div class="tile-body">
                            <?php 
                                date_default_timezone_set('America/Monterrey'); 
                                setlocale(LC_TIME, 'spanish');
                            ?>
                            @foreach ($last_citas as $last_cita)
                                @php
                                    if($last_cita->Id_Paciente != null){
                                        $paciente = $last_cita->paciente->Nombre." ".$last_cita->paciente->Ap_Paterno." ".$last_cita->paciente->Ap_Materno;
                                    }else{
                                        $paciente = '';
                                    }
                                @endphp
                                <div class="row justify-content-center">
                                    <div class="col-md-12 rounded mb-1" style="background-color: {{hex2rgba($last_cita->color->bgColor, 0.4)}};cursor: pointer;" onclick="javascript:view_date('{{$last_cita->Titulo}}','{{$last_cita->Fecha_Cita}}','{{$last_cita->Fecha_Fin_Cita}}', '{{$last_cita->Comentarios}}', '{{$last_cita->Sintomas}}', '{{$paciente}}', '{{$last_cita->especialista->Nombre." ".$last_cita->especialista->Ap_Paterno}}');">
                                        <span>
                                            <span class="badge" style="color: #4f4f4f; ">{{$last_cita->Titulo}}</span>
                                        </span>
                                        <br/>
                                        <i class="far fa-clock fa-sm" style="color: #4f4f4f;"></i>
                                        <small style="margin-top: -10px; color: #4f4f4f;"><em>
                                            <?php 
                                                echo strftime("%d %b, %H:%M", strtotime($last_cita->Fecha_Cita));
                                            ?>
                                            </em></small>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row justify-content-center">
                                <div class="col-md-12 bg-light text-center rounded" style="padding: 11px 0 11px 0; cursor: pointer;">
                                    <a href="{{ url('citas') }}">
                                        <small style="width: 100px;">Ver más</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Paleta de Colores</h3>
                        <div class="tile-body" style="margin-bottom: 3px !important">
                            @foreach ($colores as $color)
                                <span class="badge badge-pill badge-light mr-1"><i class="fas fa-circle" style="color: {{$color->bgColor}}; margin-right: 4px"></i> {{$color->bgColor}}</span>
                            @endforeach
                            <span class="badge badge-pill badge-light">
                                <a href="{{ url('colores') }}">&nbsp;&nbsp;&nbsp;Ver más&nbsp;&nbsp;&nbsp;</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Estatus</h3>
                        <div class="tile-body">
                            @foreach ($estatus as $estatus_)
                                <span class="badge badge-<?php if($estatus_->Icono == null) echo 'info'; else echo $estatus_->Icono;?>" style="width: 78px">{{$estatus_->Nombre}}</span>
                            @endforeach
                            <span class="badge badge-pill badge-light" style="width: 78px">
                                <a href="{{ url('estatus') }}">&nbsp;&nbsp;&nbsp;Ver más&nbsp;&nbsp;&nbsp;</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Estadísticas</h3>
                        <div class="tile-body">
                            <center><div id="estadisticas_2" style="height: 170px; margin-top: -20px"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="tile">
                <h3 class="tile-title">Fan Page</h3>
                <div class="tile-body">
                    <center><div class="fb-page" data-href="https://www.facebook.com/TerapiasMonicaCastillo" data-tabs="timeline" data-height="350" data-width="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TerapiasMonicaCastillo" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TerapiasMonicaCastillo">Terapias  Alternativas - Mónica Castillo</a></blockquote></div></center>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <fieldset class="row">
                    <div class="col-md-12">
                        <legend class="col-md-6" style="font-size: 12pt">Datos de la Cita</legend>
                    
                        <div class="row">
                            <!-- Input Titulo_Cita -->
                            <div class="col-md-12 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input id="titulo_cita" class="form-control form-control-sm" type="text" name="titulo_cita" placeholder="Título" disabled>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Select paciente_Cita -->
                            <div class="col-md-6 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input id="paciente_cita" class="form-control form-control-sm" type="text" name="paciente_cita" placeholder="Paciente" disabled>
                            </div>

                            <!-- Select especialista_Cita -->
                            <div class="col-md-6 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input id="especialista_cita" class="form-control form-control-sm" type="text" name="especialista_cita" placeholder="Especialista" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-12">
                <fieldset class="row">
                    <div class="col-md-12">
                        <legend class="col-md-6" style="font-size: 12pt">Fecha de Cita</legend>
                        <div class="row">
                            <!-- Input Fecha_Cita -->
                            <div class="col-md-6 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">De</span>
                                </div>
                                <input id="fecha_cita" class="form-control form-control-sm" type="date" name="fecha_cita" placeholder="Fecha" disabled>
                            </div>
                            <!-- Input Fecha_Cita_Fin -->
                            <div class="col-md-6 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Hasta</span>
                                </div>
                                <input id="fecha_cita_fin" class="form-control form-control-sm" type="date" name="fecha_cita_fin" placeholder="Fecha" disabled>
                            </div>
                        </div>

                        <legend class="col-md-6" style="font-size: 12pt">Hora de Cita</legend>
                        <div class="row">
                            <!-- Input Hora_Cita -->
                            <div class="col-md-4 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Inicio</span>
                                </div>
                                <input id="hora_cita" class="form-control form-control-sm" type="time" name="hora_cita" placeholder="Fecha" disabled>
                            </div>
                            <!-- Input Hora_Cita_Fin -->
                            <div class="col-md-4 offset-md-2 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Fin</span>
                                </div>
                                <input id="hora_cita_fin" class="form-control form-control-sm" type="time" name="hora_cita_fin" placeholder="Fecha" disabled>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-12">
                <fieldset class="row">
                    <div class="col-md-12">
                        <legend class="col-md-6" style="font-size: 12pt">Extras </legend>
                    
                        <div class="row">
                            <!-- TextArea Comentarios_Cita -->
                            <div class="col-md-6 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <textarea id="comentarios_cita" class="form-control form-control-sm" name="comentarios_cita" placeholder="Comentarios" style="height: 80px; min-height: 80px; max-height: 80px;" disabled></textarea>
                            </div>

                            <!-- TextArea Sintomas_Cita -->
                            <div class="col-md-6 input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <textarea id="sintomas_cita" class="form-control form-control-sm" name="sintomas_cita" placeholder="Síntomas" style="height: 80px; min-height: 80px; max-height: 80px;" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script type="text/javascript">
    function view_date(titulo, fecha_cita, fecha_fin_cita, comentarios, sintomas, paciente, especialista){
        $('#titulo_cita').val(titulo);
        $("#paciente_cita").val(paciente);
        $("#especialista_cita").val(especialista);
        
        var fecha_cita = fecha_cita.split(" ");
        $('#fecha_cita').val(fecha_cita[0]);
        $('#hora_cita').val(fecha_cita[1]);

        var fecha_cita_fin = fecha_fin_cita.split(" ");
        $('#fecha_cita_fin').val(fecha_cita_fin[0]);
        $('#hora_cita_fin').val(fecha_cita_fin[1]);

        $('#comentarios_cita').val(comentarios);
        $('#sintomas_cita').val(sintomas);
        $('#modalEventos').modal();
    }
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- CHART JS -->
<script type="text/javascript">
    Highcharts.chart('estadisticas_1', {
      chart: {
        type: 'areaspline'
      },
      title: {
        text: 'Promedio de consultas en el último año'
      },
      legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
      },
      xAxis: {
        categories: [<?php
            for($i=0; $i<count($estadisticas_1); $i++) {
                echo "'".substr($estadisticas_1[$i]->Mes, 0, 3).".',";
            }
        ?>]
      },
      yAxis: {
        title: {
          text: 'Pacientes'
        }
      },
      tooltip: {
        shared: true,
        valueSuffix: ' pacientes'
      },
      credits: {
        enabled: false
      },
      plotOptions: {
        areaspline: {
          fillOpacity: 0.5
        }
      },
      series: [{
        name: 'Citas',
        data: [
            <?php
            for($i=0; $i<count($estadisticas_1); $i++) {?>
                <?=$estadisticas_1[$i]->Total.",";?>
            <?php
            }
        ?>],
        color: 'rgba(228, 184, 26, 0.7)',
      }]
    });

    Highcharts.chart('estadisticas_2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        exporting: { enabled: false },
        title: {
            text: '',
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: false,
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%'],
                size: '110%'
            }
        },
        series: [{
            name: 'Pacientes',
            type: 'pie',
            innerSize: '50%',
            data: [
                <?php
                for($i=0; $i<count($estadisticas_2); $i++) {
                    echo "['".$estadisticas_2[$i]->Nombre."',".$estadisticas_2[$i]->Total."],";
                } ?>
            ]
        }]
    });

</script>

@endsection