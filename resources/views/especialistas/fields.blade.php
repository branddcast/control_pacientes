<div class="container-fluid">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Especialistas &nbsp; • &nbsp; Formulario</div>
                <div class="card-body">
                	<div class="row mb-4 justify-content-center">
                		<div class="col-md-12">
                			<fieldset>
                				<legend>Instrucciones</legend>
                				<span>Ingresa la información correcta para añadir nuevo especialista al sistema.</span>
                			</fieldset>
                		</div>
                	</div>
                	<form @if(isset($especialista)) method="post" @else method="Post" @endif action="@if(isset($especialista)) {{ route('especialistas.update', $especialista->Id_Especialista) }} @else {{ route('especialistas.store') }} @endif ">
                		@csrf

                		@isset($especialista)
                			<input name="_method" type="hidden" value="PATCH">
                		@endisset
                		<div class="row">
	                		<div class="col-md-9">
		                		<div class="row">
			                		<!-- Input Nombre -->
			                		<div class="col-md-4 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
										</div>
			                			<input id="nombre_paciente" class="form-control form-control-sm" type="text" name="nombre" placeholder="Nombre" @isset($especialista) value="{{ $especialista->Nombre }}" @endisset required>
			                		</div>
			                		<!-- Input Ap_Paterno -->
			                		<div class="col-md-4 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
										</div>
			                			<input id="ap_paterno_paciente" class="form-control form-control-sm" type="text" name="ap_paterno" placeholder="Apellido Paterno" @isset($especialista) value="{{ $especialista->Ap_Paterno }}" @endisset required>
			                		</div>
			                		<!-- Input Ap_Materno -->
			                		<div class="col-md-4 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
										</div>
			                			<input id="ap_materno_paciente" class="form-control form-control-sm" type="text" name="ap_materno" placeholder="Apellido Materno" @isset($especialista) value="{{ $especialista->Ap_Materno }}" @endisset>
			                		</div>
								</div>
								<div class="row">
									<!-- Input Edad -->
									<div class="col-md-2 input-group input-group-sm mb-3">
									  	<div class="input-group-prepend">
									    	<span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
									  	</div>
									  	<input id="edad_paciente" class="form-control form-control-sm" type="text" name="edad" placeholder="Edad" @isset($especialista) value="{{ $especialista->Edad }}" @endisset required>
									  	<div class="input-group-append input-group-sm">
									    	<span class="input-group-text">años</span>
									  	</div>
									</div>
									<!-- Input Teléfono -->
			                		<div class="col-md-2 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
										</div>
			                			<input id="telefono_paciente" class="form-control form-control-sm" type="text" name="telefono" placeholder="Teléfono" @isset($especialista) value="{{ $especialista->Telefono }}" @endisset required>
			                		</div>

			                		<!-- Input Email -->
			                		<div class="col-md-4 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
										</div>
			                			<input id="email_paciente" class="form-control form-control-sm" type="email" name="email" placeholder="Correo Electrónico" @isset($especialista) value="{{ $especialista->Email }}" @endisset required>
			                		</div>


			                		<!-- Input Estatus -->
			                		<div class="col-md-4 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="far fa-flag"></i></span>
										</div>
										<select class="custom-select custom-select-sm" name="estatus" style="height: 31px" required>
											<option selected disabled>Estatus</option>
											@foreach ($estatus as $estatus)
												<option value="{{$estatus->Id_Estatus}}" @isset($especialista)@if ($especialista->Id_Estatus == $estatus->Id_Estatus)
													{{ 'selected'}}
												@endif
												@endisset>{{$estatus->Nombre}}</option>
											@endforeach
										</select>
			                		</div>
								</div>
								<div class="row">
									<!-- TextArea Direccion -->
			                		<div class="col-md-8 input-group input-group-sm mb-3">
									  	<div class="input-group-prepend">
									    	<span class="input-group-text" style="height: 80px"><i class="fas fa-pencil-alt"></i></span>
									  	</div>
									  	<textarea id="direccion_paciente" class="form-control" name="direccion" style="height: 80px; min-height: 80px; max-height: 80px;" placeholder="Dirección">@if(isset($especialista)){{ $especialista->Direccion }}@endif</textarea>
									</div>
									<div class="col-md-4">
										<div class="row">
											<!-- Input Especialidad -->
					                		<div class="col-md-12 input-group input-group-sm mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="far fa-flag"></i></span>
												</div>
												<select class="custom-select custom-select-sm" name="especialidad" style="height: 31px" required>
													<option selected disabled>Especialidad</option>
													@foreach ($especialidades as $especialidad)
														<option value="{{$especialidad->Id_Especialidad}}" @isset($especialista)@if ($especialista->Id_Especialidad == $especialidad->Id_Especialidad)
															{{ 'selected'}}
														@endif
														@endisset>{{$especialidad->Nombre}}</option>
													@endforeach
												</select>
					                		</div>

					                		<!-- Input Color -->
					                		<div class="col-md-12 input-group input-group-sm mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="far fa-flag"></i></span>
												</div>
												<input type="hidden" name="color_oculto" 
														@if(isset($especialista))
															{{"value=".$especialista->Id_Color.""}}
														@endif
													/>
												<select class="custom-select custom-select-sm" name="color" style="height: 31px">

													<option selected disabled value="0">Color</option>
													@foreach ($colores as $color)
														<option style="color: {{$color->textColor}}; background: {{$color->bgColor}};" value="{{$color->Id_Color}}"><span>{{$color->bgColor}}</span></option>
													@endforeach
												</select>
					                		</div>
										</div>		
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-4 offset-md-3">
										<input id="paciente_btn" class="btn btn-outline-info btn-block" type="submit" value="Guardar">
									</div>
								</div>
							</div>
							<div class="col-md-3 text-center" id="paciente_dialog">
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

	function validar_nombre(){
		var paciente = $('#nombre_paciente').val();

		if(paciente.length>30){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un nombre más corto</span>'+
											'</div>'+
										'</div>'
								);
		}else if(paciente.length<5){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un nombre más largo</span>'+
											'</div>'+
										'</div>'
								);
		}else{
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
							'<div class="col-md-12">'+
								'<span style="font-size: 60pt; color: #0EBD08FF"><i class="far fa-grin"></i></span>'+
								'</div>'+
							'</div>');
		}
	}

	function validar_ap_paterno(){
		var ap_paterno = $('#ap_paterno_paciente').val();

		if(ap_paterno.length>30){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un apellido paterno más corto</span>'+
											'</div>'+
										'</div>'
								);
		}else if(ap_paterno.length<3){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un apellido paterno más largo</span>'+
											'</div>'+
										'</div>'
								);
		}else{
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
							'<div class="col-md-12">'+
								'<span style="font-size: 60pt; color: #0EBD08FF"><i class="far fa-grin"></i></span>'+
								'</div>'+
							'</div>');
		}
	}

	function validar_ap_materno(){
		var ap_materno = $('#ap_materno_paciente').val();

		if(ap_materno.length>30){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un apellido materno más corto</span>'+
											'</div>'+
										'</div>'
								);
		}else if(ap_materno.length<3){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un apellido materno más largo</span>'+
											'</div>'+
										'</div>'
								);
		}else{
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
							'<div class="col-md-12">'+
								'<span style="font-size: 60pt; color: #0EBD08FF"><i class="far fa-grin"></i></span>'+
								'</div>'+
							'</div>');
		}
	}

	function validar_edad(){
		var edad = $('#edad_paciente').val();

		if(edad.length == 0){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe una edad correcta</span>'+
											'</div>'+
										'</div>'
								);
		}else if(edad.length>2){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe una edad más corta</span>'+
											'</div>'+
										'</div>'
								);
		}else{
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
							'<div class="col-md-12">'+
								'<span style="font-size: 60pt; color: #0EBD08FF"><i class="far fa-grin"></i></span>'+
								'</div>'+
							'</div>');
		}
	}

	function validar_telefono(){
		var telefono = $('#telefono_paciente').val();

		if(telefono.length>13){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un teléfono correcta</span>'+
											'</div>'+
										'</div>'
								);
		}else if(telefono.length<7){
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Escribe un teléfono más largo</span>'+
											'</div>'+
										'</div>'
								);
		}else{
			$('#paciente_dialog').empty();
			$('#paciente_dialog').append('<div class="row">'+
							'<div class="col-md-12">'+
								'<span style="font-size: 60pt; color: #0EBD08FF"><i class="far fa-grin"></i></span>'+
								'</div>'+
							'</div>');
		}
	}

	function validar_paciente(){
		var nombre = $('#nombre_paciente').val();
		var ap_paterno = $('#ap_paterno_paciente').val();
		var ap_materno = $('#ap_materno_paciente').val();
		var edad = $('#edad_paciente').val();
		var telefono = $('#telefono_paciente').val();

		if(nombre.length >= 5 && nombre.length  < 31){
			if(ap_paterno.length >2 && ap_paterno.length < 31){
				if(ap_paterno.length >2 && ap_paterno.length < 31){
					if(edad.length >0 && edad.length < 3){
						if(telefono.length >7 && telefono.length < 21){
							$('#paciente_btn').attr('disabled', false);
						}else{
							$('#paciente_btn').attr('disabled', true);
						}
					}else{
						$('#paciente_btn').attr('disabled', true);
					}
				}else{
					$('#paciente_btn').attr('disabled', true);
				}
			}else{
				$('#paciente_btn').attr('disabled', true);
			}
		}else{
			$('#paciente_btn').attr('disabled', true);
		}
	}

	$(document).ready(function(){;

		$('#descripcion_paciente').attr('disabled', false);
		$('#nombre_paciente').attr('disabled', false);
		$('#paciente_btn').attr('disabled', true);

		if($('#nombre_paciente').val() != ''){
			validar_nombre();
			$('#paciente_btn').attr('disabled', false);
		}else if($('#ap_paterno_paciente').val() != ''){
			validar_ap_paterno();
			$('#paciente_btn').attr('disabled', false);
		}else if($('#edad_paciente').val() != ''){
			validar_edad();
			$('#paciente_btn').attr('disabled', false);
		}else if($('#telefono_paciente').val() != ''){
			validar_telefono();
			$('#paciente_btn').attr('disabled', false);
		}

		$('#nombre_paciente').keyup(function() {
			validar_nombre();
			validar_paciente();
		});

		$('#ap_paterno_paciente').keyup(function() {
			validar_ap_paterno();
			validar_paciente();
		});

		$('#ap_materno_paciente').keyup(function() {
			validar_ap_materno();
			validar_paciente();
		});

		$('#edad_paciente').keyup(function() {
			validar_edad();
			validar_paciente();
		});

		$('#telefono_paciente').keyup(function() {
			validar_telefono();
			validar_paciente();
		});

		$('#nombre_paciente').focusout(function() {
			var paciente = $('#nombre_paciente').val();
			if(paciente.length > 0 && paciente.length  < 11){
				$('#paciente_btn').attr('disabled', false);
			}else{
				$('#paciente_btn').attr('disabled', true);
			}
			validar_paciente();
		});
	});
</script>