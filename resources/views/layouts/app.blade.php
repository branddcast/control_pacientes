<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Control Pacientes') }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Calendar CSS-->
    <link rel='stylesheet' href='{{ asset('css/fullcalendar.css') }}' />

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- To file uploader -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
</head>
    @guest
        <body class="app">
            <header class="app-header shadow-sm"><a class="app-header__logo" href="{{ url('/home') }}"><i class="fas fa-h-square"></i>&nbsp; Clínica</a>
            </header>
    @else
        <body class="app sidebar-mini rtl">
          
            <!-- Navbar-->
            <header class="app-header shadow-sm"><a class="app-header__logo" href="{{ url('/home') }}"><i class="fas fa-h-square"></i>&nbsp; Clínica</a>
                <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-bars"></i></a>
                <!-- Navbar Right Menu-->
                  <ul class="app-nav">
                    
                    <!--Notification Menu-->
                    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="far fa-bell fa-lg"></i><sup id="total_notif" class="badge badge-pill badge-danger" style="padding: 3px 4px 2px 4px !important; margin: 0px 0px 0px -8px; font-size: 7pt" onclick="javascript: seen_notifications(0);"></sup></a>
                      <ul class="app-notification dropdown-menu dropdown-menu-right">
                        <li class="app-notification__title" onclick="javascript: seen_notifications(0);" style="cursor: pointer;"></li>
                        <div class="app-notification__content">
                          
                          </div>
                        </div>
                        <li class="app-notification__footer"><a href="{{ url('/notificaciones') }}">Todas las notificaciones</a></li>
                      </ul>
                    </li>
                    <!-- User Menu-->
                    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                      <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                        <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-lg"></i> Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                                </form>
                        </li>
                      </ul>
                    </li>
                  </ul>
            </header>
                <!-- Sidebar menu-->
                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar">
                  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" style="max-width: 50px" src="{{ url('img/user.png') }}" alt="{{ Auth::user()->usuario}}"><sub style="margin: 25px 15px 0 -30px; font-size: 11pt"><i class="fas fa-circle" style="color: #21E000FF; border: 2px solid rgb(34, 45, 50); border-radius: 180px; background: #21E000FF; width: 100%; height: 80%"></i></sub>
                    <div>
                      <p class="app-sidebar__user-name">{{ Auth::user()->usuario}}</p>
                      <p class="app-sidebar__user-designation"><small>{{ Auth::user()->rol->Nombre}}</small></p>
                    </div>
                  </div>
                  <ul class="app-menu">
                    <li><a class="app-menu__item {{ request()->is('home') ? 'active' : '' }}" href="{{url('/home')}}"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Inicio</span></a></li>
                    <li class="treeview"><a class="app-menu__item {{ request()->is('estatus') ? 'active' : '' }} {{ request()->is('estatus/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon far fa-flag"></i><span class="app-menu__label">Estatus</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('estatus') ? 'active' : '' }}" href="{{ url('/estatus') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('estatus/create') ? 'active' : '' }}" href="{{ url('/estatus/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    <li class="treeview"><a class="app-menu__item {{ request()->is('pacientes') ? 'active' : '' }} {{ request()->is('pacientes/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon far fa-smile"></i><span class="app-menu__label">Pacientes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('pacientes') ? 'active' : '' }}" href="{{ url('/pacientes') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('pacientes/create') ? 'active' : '' }}" href="{{ url('/pacientes/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    <li class="treeview"><a class="app-menu__item {{ request()->is('especialistas') ? 'active' : '' }} {{ request()->is('especialistas/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-hand-holding-heart"></i><span class="app-menu__label">Especialistas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('especialistas') ? 'active' : '' }}" href="{{ url('/especialistas') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('especialistas/create') ? 'active' : '' }}" href="{{ url('/especialistas/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                        <li><a class="treeview-item {{ request()->is('detalles_especialistas') ? 'active' : '' }}" href="{{ url('/detalles_especialistas') }}" rel="noopener"><i class="icon fas fa-plus"></i>Asignar Especialidad</a></li>
                      </ul>
                    </li>
                    <li class="treeview"><a class="app-menu__item {{ request()->is('especialidades') ? 'active' : '' }} {{ request()->is('especialidades/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-briefcase-medical"></i><span class="app-menu__label">Especialidades</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('especialidades') ? 'active' : '' }}" href="{{ url('/especialidades') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('especialidades/create') ? 'active' : '' }}" href="{{ url('/especialidades/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    @if(Auth::user()->hasRole('Super Admin'))
                    <li class="treeview"><a class="app-menu__item {{ request()->is('usuarios') ? 'active' : '' }} {{ request()->is('usuarios/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('usuarios') ? 'active' : '' }}" href="{{ url('/usuarios') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('usuarios/create') ? 'active' : '' }}" href="{{ url('/usuarios/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    @endif
                    @if(Auth::user()->hasRole('Super Admin'))
                    <li class="treeview"><a class="app-menu__item {{ request()->is('roles') ? 'active' : '' }} {{ request()->is('roles/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon far fa-circle"></i><span class="app-menu__label">Roles</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('roles') ? 'active' : '' }}" href="{{ url('/roles') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('roles/create') ? 'active' : '' }}" href="{{ url('/roles/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    @endif
                    <li><a class="app-menu__item {{ request()->is('citas') ? 'active' : '' }}" href="{{url('/citas')}}"><i class="app-menu__icon far fa-address-book"></i><span class="app-menu__label">Citas</span></a></li>
                    @if(Auth::user()->hasRole('Super Admin'))
                    <li class="treeview"><a class="app-menu__item {{ request()->is('colores') ? 'active' : '' }} {{ request()->is('colores/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-palette"></i><span class="app-menu__label">Colores</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('colores') ? 'active' : '' }}" href="{{ url('/colores') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('colores/create') ? 'active' : '' }}" href="{{ url('/colores/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    @endif
                  </ul>
                </aside>
            @endguest
    <main class="app-content">
          @yield('content')  
    </main>
    
    <!-- Essential javascripts for application to work-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    <!-- The javascript plugin to display page loading on top-->
    <script data-pace-options='{ "ajax": false }' src="{{ asset('js/plugins/pace.min.js') }}"></script>

    <!-- Script Notificaciones -->

          <script type="text/javascript">

            function seen_notifications(){

              $.ajax({
                type: 'get',
                url: '{{ url('/seen_notifications') }}',
                success: function(msg){
                    console.log(msg);
                    get_notifications();
                },
                error: function(msg){
                  alert('Error al ver la notificación');
                  console.log(msg.responseText);
                }
              });
            }

            function get_notifications(){
              $.ajax({
                type: 'get',
                url: '{{ url('/get_notifications') }}',
                dataType: "json",
                success: function(data){
                  if(data){
                    $('.app-notification__content').empty();
                    $.each(data[0], function(i, item) {
                      $('.app-notification__content').append('<li>'+
                              '<a class="app-notification__item" href="#">'+
                                '<div>'+
                                  '<p class="app-notification__message">'+item.Usuario+' '+item.Notificacion+'</p>'+
                                  '<p class="app-notification__meta"><small>'+item.Fecha+'</small></p>'+
                                '</div>'+
                              '</a>'+
                            '</li>');
                    });
                    if(data[1]>0){
                      $('#total_notif').text(data[1]);
                      $('.app-notification__title').text('Tiene '+data[1]+' notificaciones nuevas');
                    }else{
                      $('#total_notif').hide();
                      $('.app-notification__title').text('Tiene '+data[1]+' notificaciones nuevas');
                    }
                    
                    console.log('Total de notificaciones '+data[1]);
                  }else{
                    console.log(data);
                  }
                },
                error: function(data){
                  console.log('Error al extraer las notificaciones');
                  console.log(data.responseText);
                }
              });
            }

            $(document).ready(function(){
              get_notifications();
              setInterval(get_notifications, 1000);
            });

          </script>
    <!-- Page specific javascripts-->
    
    <script type="text/javascript">
        $('sidebar').collapse('hide');
        var pdata = [
          {
              value: 300,
              color: "#46BFBD",
              highlight: "#5AD3D1",
              label: "Complete"
          },
          {
              value: 50,
              color:"#F7464A",
              highlight: "#FF5A5E",
              label: "In-Progress"
          }
        ]
        
        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>

    



    <script src='{{ asset('js/moment.min.js') }}'></script>
    <script src='{{ asset('js/fullcalendar.js') }}'></script>
    <script src='{{ asset('js/locale-all.js') }}'></script>
    <script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>