<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios &nbsp; • &nbsp; Formulario</div>
                <div class="card-body">
                	<div class="row mb-4 justify-content-center">
                		<div class="col-md-12">
                			@if(session('error'))
							    <div class="col-md-5 alert alert-danger">
							        {{ session('error') }}
							    </div>
							@endif
                			<fieldset>
                				<legend>Instrucciones</legend>
                				<span>Ingresa la información correcta para añadir nuevo usuario al sistema.</span>
                			</fieldset>
                		</div>
                	</div>
                	<form @if(isset($usuario)) method="post" @else method="Post" @endif action="@if(isset($usuario)) {{ route('usuarios.update', $usuario->id) }} @else {{ route('usuarios.store') }} @endif ">
                		@csrf

                		@isset($usuario)
                			<input name="_method" type="hidden" value="PATCH">
                		@endisset
                		<div class="row">
	                		<div class="col-md-5">
		                		<div class="row">
			                		<!-- Input Nombre -->
			                		<div class="col-md-6 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
										</div>
			                			<input class="form-control form-control-sm" type="text" name="nombre" placeholder="Nombre" @isset($usuario) value="{{ $usuario->name }}" @endisset required>
			                		</div>
								
									<!-- Input Usuario -->
			                		<div class="col-md-6 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
										</div>
			                			<input id="nombre_estatus" class="form-control form-control-sm" type="text" name="usuario" placeholder="Usuario" @isset($usuario) value="{{ $usuario->usuario }}" @endisset>
			                		</div>
								</div>

								<div class="row">
			                		<!-- Input Email -->
			                		<div class="col-md-12 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
										</div>
			                			<input class="form-control form-control-sm" type="text" name="email" placeholder="Correo Electrónico" @isset($usuario) value="{{ $usuario->email }}" @endisset required>
			                		</div>
			                	</div>

			                	<div class="row">
			                		<div class="col-md-6">
			                		   	<a class="nav-item" href="#" onclick="javascript:generarPassword();"><i class="fas fa-random"></i> Generar contraseña aleatoria</a>
			                		</div>

			                		<!-- Input Actual password -->
			                		<div class="col-md-6 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
										</div>
			                			<input class="form-control form-control-sm" type="password" name="actual_password" placeholder="Contraseña Actual" @empty($usuario) {{'disabled'}} @endempty required>
			                		</div>
			                	</div>

			                	<div class="row">
			                		<!-- Input Password -->
			                		<div class="col-md-6 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
										</div>
			                			<input id="nueva_password" class="form-control form-control-sm" type="password" name="password" placeholder="Nueva Contraseña" @empty ($usuario)
			                			    {{ 'required' }}
			                			@endempty>
			                		</div>

			                		<!-- Input Repeat Password -->
			                		<div class="col-md-6 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
										</div>
			                			<input id="repetir_password" class="form-control form-control-sm" type="password" name="password_" placeholder="Repetir Contraseña" @empty ($usuario)
			                			    {{ 'required' }}
			                			@endempty>
			                		</div>
			                	</div>

			                	<div class="row">
			                		@empty ($usuario)
			                		    <div class="col-md-12 mb-1">
			                		    	<small>Rol y Estatus se asignan hasta activar la cuenta. Mientras, permanecerán desactivados.</small>
			                		    </div>
			                		@endempty

			                		@isset ($usuario)
			                		    @if ($usuario->codigo_verificacion != null)
			                			<div class="col-md-12 mb-1">
			                		    	<small class="text-danger">El usuario debe activar la cuenta para asignar Rol y Estatus.</small>
			                		    </div>
			                			@endif
			                		@endisset
			                		
			                		<!-- Input Rol -->
			                		<div class="col-md-6 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="far fa-circle"></i></span>
										</div>
										<select name="rol" class="custom-select custom-select-sm" @empty ($usuario)
											{{ 'disabled' }}
										@endempty
										@isset ($usuario)
											@if ($usuario->codigo_verificacion != null)
												{{'disabled'}}
											@endif>
										@endisset
											<option selected disabled>Rol</option>
											@foreach ($roles as $rol)
												<option value="{{$rol->Id_Rol}}" 
													@isset ($usuario)
													    @if ($usuario->Id_Rol == $rol->Id_Rol)
													    	{{ 'selected' }}
													    @endif
													@endisset
													>{{ $rol->Nombre }}</option>
											@endforeach
										</select>
			                		</div>


			                		<!-- Input Estatus -->
			                		<div class="col-md-6 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="far fa-flag"></i></span>
										</div>
										<select name="estatus" class="custom-select custom-select-sm" @empty ($usuario)
											{{ 'disabled' }}
										@endempty
										@isset ($usuario)
											@if ($usuario->codigo_verificacion != null)
												{{ 'disabled' }}
											@endif>
										@endisset
											<option selected disabled>Estatus</option>
											@foreach ($estatus as $estatus_)
												<option value="{{$estatus_->Id_Estatus}}"
													@isset ($usuario)
													    @if ($usuario->Id_Estatus == $estatus_->Id_Estatus)
													    	{{ 'selected' }}
													    @endif
													@endisset
													>{{ $estatus_->Nombre }}</option>
											@endforeach
										</select>
			                		</div>
			                	</div>
								<div class="row justify-content-center">
									<div class="col-md-6">
										<input id="estatus_btn" class="btn btn-outline-info btn-block" type="submit" value="Guardar">
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center" id="estatus_dialog">
								<div class="row">
									<div class="col-md-12">
										<span style="font-size: 60pt; color: #0EBD08FF"><i class="far fa-grin"></i></span>
									</div>
								</div>
							</div>
						</div>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

	function validar_estatus(){
		var estatus = $('#nombre_estatus').val();

		if(estatus.length>30){
			$('#estatus_dialog').empty();
			$('#estatus_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un usuario más corto</span>'+
											'</div>'+
										'</div>'
								);
		}else if(estatus.length<4){
			$('#estatus_dialog').empty();
			$('#estatus_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un usuario más largo</span>'+
											'</div>'+
										'</div>'
								);
		}else{
			$('#estatus_dialog').empty();
			$('#estatus_dialog').append('<div class="row">'+
							'<div class="col-md-12">'+
								'<span style="font-size: 60pt; color: #0EBD08FF"><i class="far fa-grin"></i></span>'+
								'</div>'+
							'</div>');
		}
	}

	function random(longitud){
		var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHIJKLMNPQRTUVWXYZ123467890&%$*/()_-";
  		var contraseña = "";
  		for (i=0; i<longitud; i++){
  			contraseña += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
  		}

  		return contraseña;
	}

	function generarPassword(){
		var password = random(10);
		alert('Contraseña:\n\n'+password+"\n\nGuarde la contraseña para poder ingresar al sistema.");

		$('#nueva_password').val('');
		$('#repetir_password').val('');

		$('#nueva_password').val(password);
		$('#repetir_password').val(password);
	}
	$(document).ready(function(){
		$('#descripcion_estatus').attr('disabled', false);
		$('#nombre_estatus').attr('disabled', false);

		$('#nombre_estatus').keyup(function() {
			validar_estatus();
		});

		$('#nombre_estatus').focusout(function() {
			validar_estatus();
		});
	});
</script>