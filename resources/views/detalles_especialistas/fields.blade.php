<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Asignar Especialidad &nbsp; • &nbsp; Formulario</div>
                <div class="card-body">
                	<div class="row mb-4 justify-content-center">
                		<div class="col-md-12">
                			<fieldset>
                				<legend>Instrucciones</legend>
                				<span>Ingresa la información correcta para asignarle una epecialidad a un especialista.</span>
                			</fieldset>
                		</div>
                	</div>
                    <div class="row">
                        <div class="col-md-6">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @elseif(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                	<form @if(isset($detalles_especialista)) method="post" @else method="Post" @endif action="@if(isset($detalles_especialista)) {{ route('detalles_especialistas.update', $detalles_especialista->Id_Detalles_Especialistas) }} @else {{ route('detalles_especialistas.store') }} @endif ">
                		@csrf

                		@isset($detalles_especialista)
                			<input name="_method" type="hidden" value="PATCH">
                		@endisset
                		<div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Especialista</span>
                                            </div>
                                            <select name="especialista" class="custom-select custom-select-sm" required>
                                                <option disabled selected>Especialista</option>
                                                @foreach ($especialistas as $especialista)
                                                    <option value="{{$especialista->Id_Especialista}}" @isset ($detalles_especialista)
                                                        @if($detalles_especialista->Id_Especialista == $especialista->Id_Especialista)
                                                                {{ 'selected' }}
                                                        @endif
                                                    @endisset>
                                                    {{$especialista->Nombre.' '.$especialista->Ap_Paterno}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Especialidad</span>
                                            </div>
                                            <select name="especialidad" class="custom-select custom-select-sm" required>
                                                <option disabled selected>Especialidad</option>
                                                @foreach ($especialidades as $especialidad)
                                                    <option value="{{$especialidad->Id_Especialidad}}" @isset ($detalles_especialista)
                                                        @if($detalles_especialista->Id_Especialidad == $especialidad->Id_Especialidad)
                                                                {{ 'selected' }}
                                                        @endif
                                                    @endisset>
                                                    {{$especialidad->Nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="btn-block btn-sm btn btn-success" type="submit" value="Guardar">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                            