@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-light shadow-sm">Notificaciones</div>

                <div class="card-body"> 
                	@php
                		setlocale(LC_TIME, 'spanish');
                	@endphp

					@for ($i = 0; $i < count($notificaciones); $i++)
						<div class="col-md-auto">
							<div class="alert @if ($notificaciones[$i]['Estado'] == 0)
								{{'alert-info'}}
							@else
								{{'alert-light border'}}
							@endif p-0" style="padding-left: 10px !important; padding-right: 10px !important">
								<div class="row mt-1">
									<div class="col-md-12">
										<strong>{{ $notificaciones[$i]['Usuario'] }}:</strong>
									</div>
								</div>

								<div class="row m-0">
									<div class="col-md-12">
										{{ $notificaciones[$i]['Notificacion'] }}
									</div>
								</div>

								<div class="row m-0">
									<div class="col-md-12 text-right">
										<small><?=strftime("%d %b, %H:%M", strtotime($notificaciones[$i]['Fecha']))?></small>
									</div>
								</div>
						  	</div>
						</div>
					@endfor
				</div>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
	function borrar_estatus(){
			swal({
			  	title: "¿Seguro(a) que quiere eleminar el estatus?",
			  	text: "¡Una vez borrado, no hay vuelta atrás!",
			  	icon: "warning",
			  	buttons: true,
			  	dangerMode: true,
			}).then((willDelete) => {
			  	if (willDelete) {
			  		swal("¡Okay! ¡Estatus borrado exitosamente!", 
			  		{
			      		icon: "success",
			    	});
			    	return true;
			  	} else {
			    	swal("¡Cuidado la próxima vez!");
			    	return false;
			  }
			});
		}
</script>
@endsection