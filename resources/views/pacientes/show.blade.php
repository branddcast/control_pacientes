@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light shadow-sm">Pacientes</div>

                <div class="card-body">

                	<div class="row">
                		<div class="col-md-4">
                			<form method="get" action="{{ route('pacientes.index') }}">
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
                			<a class="btn btn-warning btn-sm" href="{{ route('pacientes.create') }}"><i class="fas fa-plus"></i> Nuevo</a>
                		</div>
                	</div>

					<?php $i = 1; ?>
					<div class="table-responsive">
						<table class="table table-bordered table-sm">
						  	<thead>
						    	<tr>
						      		<th scope="col">#</th>
						      		<th scope="col">Estatus</th>
						      		<th scope="col">Nombre</th>
						      		<th scope="col">Edad</th>
						      		<th scope="col">Teléfono</th>
						      		<th scope="col">Dirección</th>
						      		<th scope="col">Acciones</th>
						    	</tr>
						  	</thead>
						  	<tbody>
							@foreach ($pacientes as $paciente)
								<tr>
									<th scope="row">{{$i++}}</th>
									@if ($paciente->Id_Estatus != null)
									@if ($paciente->estatus->Icono != '')
						  				<td class="text-center">
						  					<span class="badge badge-{{ $paciente->estatus->Icono }}" style="width:80px">
						  						{{ $paciente->estatus->Nombre }}
						  					</span>
						  				</td>
						  			@else
						  				<td class="text-center">
						  					<span class="badge badge-primary" style="width:80px">
						  						{{ $paciente->estatus->Nombre }}
						  					</span>
						  				</td>
						  			@endif
						  			@else
						  				<td class="text-center"></td>
						  			@endif
									<td>{{$paciente->Nombre." ".$paciente->Ap_Paterno." ".$paciente->Ap_Materno}}</td>
									<td>{{$paciente->Edad}}</td>
									<td>{{$paciente->Telefono}}</td>
									<td>{{$paciente->Direccion}}</td>
									<td class="text-center">
										<form id="paciente_delete" action="{{route('pacientes.destroy', $paciente->Id_Paciente)}}" method="post">
								            <a href="{{ route('pacientes.edit', ['id' => $paciente->Id_Paciente]) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>

								            <a href="{{ route('historia_clinica.show', ['id' => $paciente->Id_Paciente]) }}" class="btn btn-warning btn-sm"><i class="far fa-clipboard"></i></a>

								            @csrf
								            <input name="_method" type="hidden" value="DELETE">
								            <button id="paciente_delete_btn" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminarlo?');"><i class="far fa-trash-alt"></i></button>
								        </form>
										
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>

						{{ $pacientes->appends($_GET)->links() }}

					</div>
				</div>
            </div>
        </div>
	</div>
</div>
@endsection