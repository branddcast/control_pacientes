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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
                    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="far fa-bell fa-lg"></i></a>
                      <ul class="app-notification dropdown-menu dropdown-menu-right">
                        <li class="app-notification__title">You have 4 new notifications.</li>
                        <div class="app-notification__content">
                          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                <p class="app-notification__message">Lisa sent you a mail</p>
                                <p class="app-notification__meta">2 min ago</p>
                              </div></a></li>
                          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                <p class="app-notification__message">Mail server not working</p>
                                <p class="app-notification__meta">5 min ago</p>
                              </div></a></li>
                          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                <p class="app-notification__message">Transaction complete</p>
                                <p class="app-notification__meta">2 days ago</p>
                              </div></a></li>
                          <div class="app-notification__content">
                            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                  <p class="app-notification__message">Lisa sent you a mail</p>
                                  <p class="app-notification__meta">2 min ago</p>
                                </div></a></li>
                            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                  <p class="app-notification__message">Mail server not working</p>
                                  <p class="app-notification__meta">5 min ago</p>
                                </div></a></li>
                            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                  <p class="app-notification__message">Transaction complete</p>
                                  <p class="app-notification__meta">2 days ago</p>
                                </div></a></li>
                          </div>
                        </div>
                        <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
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
                                {{ __('Logout') }}<i class="fa fa-sign-out fa-lg"></i> Logout</a>

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
                  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" style="max-width: 50px" src="{{ url('img/user.png') }}" alt="{{ Auth::user()->usuario}}">
                    <div>
                      <p class="app-sidebar__user-name">{{ Auth::user()->usuario}}</p>
                      <p class="app-sidebar__user-designation"><i style="color: green; font-size: 14pt;">•</i> <small>En línea</small></p>
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
                      </ul>
                    </li>
                    <li class="treeview"><a class="app-menu__item {{ request()->is('especialidades') ? 'active' : '' }} {{ request()->is('especialidades/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-briefcase-medical"></i><span class="app-menu__label">Especialidades</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('especialidades') ? 'active' : '' }}" href="{{ url('/especialidades') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('especialidades/create') ? 'active' : '' }}" href="{{ url('/especialidades/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    <li class="treeview"><a class="app-menu__item {{ request()->is('usuarios') ? 'active' : '' }} {{ request()->is('usuarios/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('usuarios') ? 'active' : '' }}" href="{{ url('/usuarios') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('usuarios/create') ? 'active' : '' }}" href="{{ url('/usuarios/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    <li class="treeview"><a class="app-menu__item {{ request()->is('roles') ? 'active' : '' }} {{ request()->is('roles/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon far fa-circle"></i><span class="app-menu__label">Roles</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('roles') ? 'active' : '' }}" href="{{ url('/roles') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('roles/create') ? 'active' : '' }}" href="{{ url('/roles/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                    <li><a class="app-menu__item {{ request()->is('citas') ? 'active' : '' }}" href="{{url('/citas')}}"><i class="app-menu__icon far fa-address-book"></i><span class="app-menu__label">Citas</span></a></li>
                    <li class="treeview"><a class="app-menu__item {{ request()->is('colores') ? 'active' : '' }} {{ request()->is('colores/create') ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-palette"></i><span class="app-menu__label">Colores</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a class="treeview-item {{ request()->is('colores') ? 'active' : '' }}" href="{{ url('/colores') }}"><i class="icon fas fa-list"></i> Mostrar</a></li>
                        <li><a class="treeview-item {{ request()->is('colores/create') ? 'active' : '' }}" href="{{ url('/colores/create') }}" rel="noopener"><i class="icon fas fa-plus"></i> Agregar</a></li>
                      </ul>
                    </li>
                  </ul>
                </aside>
            @endguest
    <main class="app-content">
          @yield('content')  
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ asset('js/plugins/chart.js') }}"></script>
    <script type="text/javascript">
        $('sidebar').collapse('hide');
        var data = {
          labels: ["January", "February", "March", "April", "May"],
          datasets: [
              {
                  label: "My First dataset",
                  fillColor: "rgba(220,220,220,0.2)",
                  strokeColor: "rgba(220,220,220,1)",
                  pointColor: "rgba(220,220,220,1)",
                  pointStrokeColor: "#fff",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(220,220,220,1)",
                  data: [65, 59, 80, 81, 56]
              },
              {
                  label: "My Second dataset",
                  fillColor: "rgba(151,187,205,0.2)",
                  strokeColor: "rgba(151,187,205,1)",
                  pointColor: "rgba(151,187,205,1)",
                  pointStrokeColor: "#fff",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(151,187,205,1)",
                  data: [28, 48, 40, 19, 86]
              }
          ]
        };
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
        
        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);
        
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