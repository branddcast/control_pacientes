<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Roles &nbsp; • &nbsp; Formulario</div>
                <div class="card-body">
                	<div class="row mb-4 justify-content-center">
                		<div class="col-md-12">
                			<fieldset>
                				<legend>Instrucciones</legend>
                				<span>Ingresa la información correcta para añadir nuevo rol al sistema.</span>
                			</fieldset>
                		</div>
                	</div>
                	<form @if(isset($rol)) method="post" @else method="Post" @endif action="@if(isset($rol)) {{ route('roles.update', $rol->Id_Rol) }} @else {{ route('roles.store') }} @endif ">
                		@csrf

                		@isset($rol)
                			<input name="_method" type="hidden" value="PATCH">
                		@endisset
                		<div class="row">
	                		<div class="col-md-5">
		                		<div class="row">
			                		<!-- Input Nombre -->
			                		<div class="col-md-12 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="far fa-flag"></i></span>
										</div>
			                			<input id="nombre_estatus" class="form-control form-control-sm" type="text" name="nombre" placeholder="Nombre" @isset($rol) value="{{ $rol->Nombre }}" @endisset required>
			                		</div>
								</div>
								<div class="row">
									<!-- TextArea Descripción -->
			                		<div class="col-md-12 input-group input-group-sm mb-3">
									  	<div class="input-group-prepend">
									    	<span class="input-group-text" style="height: 80px"><i class="fas fa-pencil-alt"></i></span>
									  	</div>
									  	<textarea id="descripcion_estatus" class="form-control" name="descripcion" style="height: 80px; min-height: 80px; max-height: 80px;" placeholder="Descripción">@if(isset($rol)){{ $rol->Descripcion }}@endif</textarea>
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
												'<span class="text-danger">Escribe un nombre más corto</span>'+
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
												'<span class="text-danger">Escribe un nombre más largo</span>'+
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
	$(document).ready(function(){
		$('#descripcion_estatus').attr('disabled', false);
		$('#nombre_estatus').attr('disabled', false);
		$('#estatus_btn').attr('disabled', true);

		if($('#estatus_nombre').val() != ''){
			$('#estatus_btn').attr('disabled', false);
		}

		$('#nombre_estatus').keyup(function() {
			var estatus = $('#nombre_estatus').val();
			if(estatus.length >= 4 && estatus.length  < 31){
				$('#estatus_btn').attr('disabled', false);
			}else{
				$('#estatus_btn').attr('disabled', true);
			}
			validar_estatus();
		});

		$('#nombre_estatus').focusout(function() {
			var estatus = $('#nombre_estatus').val();
			if(estatus.length > 0 && estatus.length  < 31){
				$('#estatus_btn').attr('disabled', false);
			}else{
				$('#estatus_btn').attr('disabled', true);
			}
			validar_estatus();
		});
	});
</script>