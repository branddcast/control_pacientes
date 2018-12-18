<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Colores &nbsp; • &nbsp; Formulario</div>
                <div class="card-body">
                	<div class="row mb-4 justify-content-center">
                		<div class="col-md-12">
                			<fieldset>
                				<legend>Instrucciones</legend>
                				<span>Ingresa la información correcta para añadir nuevo color al sistema.</span>
                			</fieldset>
                		</div>
                	</div>
                	<form id="colores_form" @if(isset($colores)) method="post" @else method="Post" @endif action="@if(isset($colores)) {{ route('colores.update', $colores->Id_Color) }} @else {{ route('colores.store') }} @endif ">
                		@csrf

                		@isset($colores)
                			<input name="_method" type="hidden" value="PATCH">
                		@endisset
                		<div class="row">
	                		<div class="col-md-5">
		                		<div class="row">
			                		<!-- Input textColor -->
			                		<div class="col-md-4 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Texto</span>
										</div>
			                			<input id="textColor" class="form-control form-control-sm" type="color" name="textColor" placeholder="Color del Texto" @isset($colores) value="{{ $colores->textColor }}" @endisset required>
			                		</div>

									<!-- Input bgColor -->
			                		<div class="col-md-4 input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Fondo</span>
										</div>
			                			<input id="bgColor" class="form-control form-control-sm" type="color" name="bgColor" placeholder="Color" @isset($colores) value="{{ $colores->bgColor }}" @endisset required>
			                		</div>

			                		<div class="col-md-4">
										<input id="guardar_btn" class="btn btn-sm btn-outline-info btn-block" type="submit" value="Guardar">
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
	$(document).ready(function(){
			
		$('#colores_form').submit(function( event ) {
			var textColor = $('#textColor').val();
			var bgColor = $('#bgColor').val();

			if(textColor == bgColor){
				$('#estatus_dialog').empty();
				$('#estatus_dialog').append('<div class="row">'+
											'<div class="col-md-12">'+
												'<span style="font-size: 60pt; color: #E02A2AFF"><i class="far fa-frown"></i></span>'+
											'</div>'+
											'<div class="col-md-12">'+
												'<span class="text-danger">Los colores no deben ser iguales</span>'+
											'</div>'+
										'</div>');
				event.preventDefault();
			}else{
				$('#estatus_dialog').empty();
				$('#estatus_dialog').append('<div class="row">'+
								'<div class="col-md-12">'+
									'<span style="font-size: 60pt; color: #0EBD08FF"><i class="far fa-grin"></i></span>'+
									'</div>'+
								'</div>');
				return;
			}
		});
	});
</script>