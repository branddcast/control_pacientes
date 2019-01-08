<!DOCTYPE html>
<html>
<head>
    <title>Verificar Cuenta</title>
</head>

	<style type="text/css">
		.container{
			width:100%;
			padding-right:15px;
			padding-left:15px;
			margin-right:auto;
			margin-left:auto;
		}
		@media (min-width:576px){
			.container{
				max-width:540px;
			}
		}
		@media (min-width:768px){
			.container{
				max-width:720px;
			}
		}
		@media (min-width:992px){
			.container{
				max-width:960px;
			}
		}
		@media (min-width:1200px){
			.container{
				max-width:1140px;
			}
		}
    	.mt-3,
		.my-3 {
		  margin-top: 1rem !important;
		}
		.mb-4,
		.my-4 {
		  margin-bottom: 1.5rem !important;
		}
    	a{
    		text-decoration: none;
    	}
    	html {
		  font-family: sans-serif;
		  line-height: 1.15;
		  -webkit-text-size-adjust: 100%;
		  -ms-text-size-adjust: 100%;
		  -ms-overflow-style: scrollbar;
		  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
		}

		@-ms-viewport {
		  width: device-width;
		}


		body {
		  margin: 0;
		  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
		  font-size: 1rem;
		  font-weight: 400;
		  line-height: 1.5;
		  color: #212529;
		  text-align: left;
		  background-color: #fff;
		}
    	h1, h2, h3, h4, h5, h6 {
		  margin-top: 0;
		  margin-bottom: 0.5rem;
		}
		h1, h2, h3, h4, h5, h6,
		.h1, .h2, .h3, .h4, .h5, .h6 {
		  margin-bottom: 0.5rem;
		  font-family: inherit;
		  font-weight: 500;
		  line-height: 1.2;
		  color: inherit;
		}
		h3, .h3 {
		  font-size: 1.75rem;
		}

		h4, .h4 {
		  font-size: 1.5rem;
		}
		p {
		  margin-top: 0;
		  margin-bottom: 1rem;
		}
    	.text-center {
		  text-align: center !important;
		}
		.text-justify {
		  text-align: justify !important;
		}
		.container {
		  min-width: 500px !important;
		}
		.row {
		  display: -ms-flexbox;
		  display: flex;
		  -ms-flex-wrap: wrap;
		  flex-wrap: wrap;
		  margin-right: -15px;
		  margin-left: -15px;
		}
		.justify-content-center {
		  -ms-flex-pack: center !important;
		  justify-content: center !important;
		}
		.col-md-6 {
		  position: relative;
		  width: 100%;
		  min-height: 1px;
		  padding-right: 15px;
		  padding-left: 15px;
		}
		.alert {
		  position: relative;
		  padding: 0.75rem 1.25rem;
		  margin-bottom: 1rem;
		  border: 1px solid transparent;
		  border-radius: 0.25rem;
		}
		.alert-info {
		  color: #0c5460;
		  background-color: #d1ecf1;
		  border-color: #bee5eb;
		}
		.alert-warning {
		  color: #856404;
		  background-color: #fff3cd;
		  border-color: #ffeeba;
		}
		.alert-success {
		  color: #155724;
		  background-color: #d4edda;
		  border-color: #c3e6cb;
		}
		.blockquote-footer {
		  display: block;
		  font-size: 80%;
		  color: #6c757d;
		}

		.blockquote-footer::before {
		  content: "\2014 \00A0";
		}

		.btn {
		  display: inline-block;
		  font-weight: 400;
		  text-align: center;
		  white-space: nowrap;
		  vertical-align: middle;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		  border: 1px solid transparent;
		  padding: 0.375rem 0.75rem;
		  font-size: 1rem;
		  line-height: 1.5;
		  border-radius: 0.25rem;
		  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}

		.btn-success {
		  color: #fff;
		  background-color: #28a745;
		  border-color: #28a745;
		}

		.btn-success:hover {
		  color: #fff;
		  background-color: #218838;
		  border-color: #1e7e34;
		}

		.btn-success:focus, .btn-success.focus {
		  box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
		}

		.btn-success.disabled, .btn-success:disabled {
		  color: #fff;
		  background-color: #28a745;
		  border-color: #28a745;
		}
		a.btn.disabled,
		  fieldset:disabled a.btn {
		  pointer-events: none;
		}
		.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active,
		.show > .btn-success.dropdown-toggle {
		  color: #fff;
		  background-color: #1e7e34;
		  border-color: #1c7430;
		}

		.btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus,
		.show > .btn-success.dropdown-toggle:focus {
		  box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
		}
		.btn {
		    transition: none;
		  }
		

		.btn:hover, .btn:focus {
		  text-decoration: none;
		}

		.btn:focus, .btn.focus {
		  outline: 0;
		  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
		}

		.btn.disabled, .btn:disabled {
		  opacity: 0.65;
		}

		.btn:not(:disabled):not(.disabled) {
		  cursor: pointer;
		}

		.btn:not(:disabled):not(.disabled):active, .btn:not(:disabled):not(.disabled).active {
		  background-image: none;
		}
		@media (min-width: 768px) {

		.col-md-6 {
		    -ms-flex: 0 0 50%;
		    flex: 0 0 50%;
		    max-width: 50%;
		  }
		}
    </style>

    @php
    	setlocale(LC_TIME, 'spanish');
    @endphp
 
<body class="text-center">
	<div class="container">
        @isset($especialista)	
        <div class="row justify-content-center mt-3">
        	<div class="col-md-6">
				<div class="alert alert-warning" role="alert">
					<h3>Acción Requerida</h3>
				</div>
				<h4>Confirmar cita agendada</h4>
			</div>			
		</div>
		<div class="row justify-content-center mb-4">
			<div class="col-md-6">
				<p><u>Hola, {{$especialista->Nombre}}.</u></p>
				<p>Hay cita agendada para <strong><?=strftime("%d %b, %H:%M", strtotime($cita->Fecha_Cita))?></strong></p>
				@if($cita->Id_Paciente != NULL)
				<p>Paciente: <strong>{{$cita->paciente->Nombre." ".$cita->paciente->Ap_Paterno." ".$cita->paciente->Ap_Materno}}</strong></p>
				@else
				<p>Paciente: <em>Sin Asignar</em></p>
				@endif
				<p>Asunto: <strong>{{$cita->Titulo}}</strong></p>
				<p class="blockquote-footer text-justify">Por favor, ingresa a la sección de citas del sistema para obtener más información sobre la cita.</p>

				<a class="btn btn-success" href="{{url('citas')}}">Revise en la sección de Citas</a>
				
			</div>			
		</div>
		@endisset
	</div>
</body>
</html>