@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light shadow-sm">Especialidades Asignadas</div>

                <div class="card-body">

                	<div class="row">
                		<div class="col-md-4">
                			<form method="get" action="{{ route('detalles_especialistas.index') }}">
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
		                			{!! session('success') !!}
		                		</div>
		                	@elseif(session('error'))
		                		<div class="alert alert-danger">
		                			{!! session('error') !!}
		                		</div>
		                	@endif
		                		</div>
                		<div class="col-md-2 offset-md-1 text-right">
                			<a class="btn btn-warning btn-sm" href="{{ route('detalles_especialistas.create') }}"><i class="fas fa-plus"></i> Nuevo</a>
                		</div>
                	</div>

                	<?php $i = 1; ?>
					<div class="table-responsive">
						<table class="table table-bordered table-sm">
						  	<thead>
						    	<tr>
						      		<th scope="col">#</th>
						      		<th scope="col">Especialista</th>
						      		<th scope="col">Especialidad</th>
						      		<th scope="col">Acciones</th>
						    	</tr>
						  	</thead>
						  	<tbody>
			                @foreach ($detalles_especialistas as $item)
			                	<tr>
			                		<th scope="row">{{$i++}}</th>
			                		<td>
			                			<i class="fas fa-circle mr-1" style="color: {{ $item->especialista->color->bgColor }};"></i>
			                			{{ $item->especialista->Nombre.' '.$item->especialista->Ap_Paterno.' '.$item->especialista->Ap_Materno }}</td>
			                		<td>
			                			{{ $item->especialidad->Nombre }}
			                		</td>
			                		<td class="text-center">
										<form id="estatus_delete" action="{{route('detalles_especialistas.destroy', $item->Id_Detalles_Especialistas)}}" method="post">
								            <a href="{{ route('detalles_especialistas.edit', ['id' => $item->Id_Detalles_Especialistas]) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>

								            @csrf
								            <input name="_method" type="hidden" value="DELETE">
								            <button id="estatus_delete_btn" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminarlo?');"><i class="far fa-trash-alt"></i></button>
								        </form>
										
									</td>
			                	</tr>
			                @endforeach
                </div>
            </div>
        </div>
</div>
@endsection