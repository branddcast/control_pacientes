@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light shadow-sm">Estatus</div>

                <div class="card-body">

                	<div class="row">
                		<div class="col-md-4">
                			<form method="get" action="{{ route('estatus.index') }}">
                				<div class="input-group mb-3">
  									<input class="form-control form-control-sm" type="text" name="q" placeholder="Buscar">
  									<div class="input-group-append">
                						<input class="btn btn-outline-secondary btn-sm" type="submit" value="Buscar">
                					</div>
                				</div>
                			</form>
                		</div>
                	</div> 

                	<div class="row justify-content-end mb-3 align-items-center">
                		<div class="col-md-7 text-center">
                			@if(session('success'))
		                		<div class="alert alert-success">
		                			{{ session('success') }}
		                		</div>
		                	@elseif(session('error'))
		                		<div class="alert alert-danger">
		                			{{ session('error') }}
		                		</div>
		                	@endif
		                		</div>
                		<div class="col-md-2 offset-md-1 text-right">
                			<a class="btn btn-warning btn-sm" href="{{ route('estatus.create') }}"><i class="fas fa-plus"></i> Nuevo</a>
                		</div>
                	</div>

					<?php $i = 1; ?>
					<div class="table-responsive">
						<table class="table table-bordered table-sm">
						  	<thead>
						    	<tr>
						      		<th scope="col">#</th>
						      		<th scope="col">Identificador</th>
						      		<th scope="col">Estatus</th>
						      		<th scope="col">Descripción</th>
						      		<th scope="col">Acciones</th>
						    	</tr>
						  	</thead>
						  	<tbody>
						  	@foreach ($estatus as $estatu)
						  		<tr>
						  			<th scope="row">{{$i++}}</th>
						  			@if ($estatu->Icono != '')
						  				<td class="text-center">
						  					<span class="badge badge-{{ $estatu->Icono }}" style="width:80px">
						  						{{ $estatu->Nombre }}
						  					</span>
						  				</td>
						  			@else
						  				<td class="text-center">
						  					<span class="badge badge-primary" style="width:80px">
						  						{{ $estatu->Nombre }}
						  					</span>
						  				</td>
						  			@endif
									<td>{{ $estatu->Nombre }}</td>
									<td>{{ $estatu->Descripcion }}</td>
									<td class="text-center">
										<form id="estatus_delete" action="{{route('estatus.destroy', $estatu->Id_Estatus)}}" method="post">
								            <a href="{{ route('estatus.edit', ['id' => $estatu->Id_Estatus]) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>

								            @csrf
								            <input name="_method" type="hidden" value="DELETE">
								            <button id="estatus_delete_btn" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminarlo?');"><i class="far fa-trash-alt"></i></button>
								        </form>
										
									</td>
						  	@endforeach
						  	</tbody>
						</table>

						{{ $estatus->appends($_GET)->links() }}

					</div>
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