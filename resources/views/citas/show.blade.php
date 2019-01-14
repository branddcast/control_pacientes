@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">
        	<div class="card shadow-sm">
                <div class="card-header bg-light shadow-sm">Citas</div>

                <div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-2">
									<h4>Nomenclatura</h4>
									<div class="card mt-4">
										<div class="card-header text-muted" style="font-size: 11pt">
										    Especialidades
										</div>
										<div class="card-body">
											@foreach ($especialistas as $especialista)
												<span class="badge" style="color:{{$especialista->color->textColor}}; background-color: {{$especialista->color->bgColor}};">{{ $especialista->especialidad->Nombre }}</span >
											@endforeach
										</div>
									</div>
								</div>
								<div class="col-md-10">
									<div id='calendar'></div>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">

						function cita_form(date, jsEvent, view){
							//Deshabilitar boton agregar
							$('#agendar').prop('disabled', false);
							$('#modificar').prop('disabled', true);
							$('#borrar').prop('disabled', true);

						    //alert('Clicked on: ' + date.format());

						    //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

						    //alert('Current view: ' + view.name);

						    // change the day's background color just for fun
						    //$(this).css('background-color', 'red');

						    $('#titulo_cita').val('');
							$('#hora_cita').val(date.format('HH:mm'));
							$('#hora_cita_fin').val(date.add(1, 'h').format('HH:mm'));
							$('#comentarios_cita').val('');
							$('#sintomas_cita').val('');
							$('#paciente_cita').val('0');
							$('#especialista_cita').val('0');
							$('#id_cita').val('');
						    $('#fecha_cita').val(date.format('YYYY-MM-DD'));
						    $('#fecha_cita_fin').val(date.format('YYYY-MM-DD'));
						    //Modal
						    $('#modalEventos').modal();
						}

						$(function() {

						  	$('#calendar').fullCalendar({
						  		themeSystem: 'bootstrap4',
						  		navLinks: true,
						  		eventLimit: true,
						  		selectable: true,
						  		header:{
							  		left:   'today,prev,next',
							  		center: 'title',
							  		right:  'addEventButton, month,agendaWeek,agendaDay'
							  	},
							  	locale: 'es',
							  	events: '{{ route('citas_json') }}',
							  	dayClick: function(date, jsEvent, view) {
							  		
			        				$('#loader_img').hide();
			        				$('#middle').hide();

							  		cita_form(date, jsEvent, view);
								},
								eventClick: function(calEvent, jsEvent, view){

			        				$('#loader_img').hide();
			        				$('#middle').hide();

									//Deshabilitar boton agregar
									$('#agendar').prop('disabled', true);
									$('#modificar').prop('disabled', false);
									$('#borrar').prop('disabled', false);

									$('#titulo_cita').val(calEvent.title);
									$("#paciente_cita option[value="+ calEvent.paciente +"]").attr("selected",true);
									$("#especialista_cita option[value="+ calEvent.especialista +"]").attr("selected",true);
									
									var fecha_cita = calEvent.start._i.split(" ");
									$('#fecha_cita').val(fecha_cita[0]);
									$('#hora_cita').val(fecha_cita[1]);

									var fecha_cita_fin = calEvent.end._i.split(" ");
									$('#fecha_cita_fin').val(fecha_cita_fin[0]);
									$('#hora_cita_fin').val(fecha_cita_fin[1]);

									$('#comentarios_cita').val(calEvent.comentarios);
									$('#sintomas_cita').val(calEvent.sintomas);
									$('#id_cita').val(calEvent.id);
									//Modal
								    $('#modalEventos').modal();
								},
								customButtons: {
							        addEventButton: {
							          	text: 'Agendar',
							          	click: function() {

			        						$('#loader_img').hide();
			        						$('#middle').hide();

							          		$('#agendar').prop('disabled', false);
											$('#modificar').prop('disabled', true);
											$('#borrar').prop('disabled', true);

							            	$('#titulo_cita').val('');
											$('#hora_cita').val('');
											$('#hora_cita_fin').val('');
											$('#comentarios_cita').val('');
											$('#sintomas_cita').val('');
											$('#paciente_cita').val('0');
											$('#especialista_cita').val('0');
											$('#id_cita').val('');
										    $('#fecha_cita').val('');
										    $('#fecha_cita_fin').val('');
										    //Modal
										    $('#modalEventos').modal();
							            }
							        }
							    }
						  	})

						});			
					</script>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Add/edit/Delete -->
<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog container_overlay" role="document">
    <div class="modal-content ">
    	<div id="loader_img" class="image" style="width:100%"></div>
		<div id="middle" class="middle">
			<img src="{{asset('img/loader.gif')}}">
			<div class="text">Espere, por favor.</div>
		</div>
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
        <div class="row">
			
  			<!-- ID hidden -->
  			<input type="hidden" name="id_cita" id="id_cita">
        	<div class="col-md-12">
        		<fieldset class="row">
	        		<div class="col-md-12">
		                <legend class="col-md-6" style="font-size: 12pt">Datos de la Cita</legend>
		            
			            <div class="row">
			            	<!-- Input Titulo_Cita -->
				    		<div class="col-md-12 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"> *</i></span>
								</div>
				    			<input id="titulo_cita" class="form-control form-control-sm" type="text" name="titulo_cita" placeholder="Título">
				    		</div>
			            </div>
			        </div>
		        </fieldset>
		    </div>

		    <div class="col-md-12">
        		<div class="row">
	        		<div class="col-md-12">
			            <div class="row">
			            	<!-- Select paciente_Cita -->
				    		<div class="col-md-6 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
								</div>
				    			<select id="paciente_cita" class="custom-select custom-select-sm" name="paciente_cita" style="height: 31px">
				    				<option selected="true" disabled="true" value="0">Paciente</option>
				    				@foreach ($pacientes as $paciente)
				    					<option value="{{$paciente->Id_Paciente}}">{{$paciente->Nombre." ".$paciente->Ap_Paterno." ".$paciente->Ap_Materno}}</option>
				    				@endforeach
				    			</select>
				    		</div>

				    		<!-- Select especialista_Cita -->
				    		<div class="col-md-6 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"> *</i></span>
								</div>
				    			<select id="especialista_cita" class="custom-select custom-select-sm" name="especialista_cita" style="height: 31px">
				    				<option selected="true" disabled="true" value="0">Especialista</option>
				    				@foreach ($especialistas as $especialista)
				    					<option value="{{$especialista->Id_Especialista}}">{{$especialista->especialidad->Nombre." - ".$especialista->Nombre." ".$especialista->Ap_Paterno}}</option>
				    				@endforeach
				    			</select>
				    		</div>
			            </div>
			        </div>
		        </div>
		    </div>
        		
        	<div class="col-md-12">
	        	<fieldset class="row">
	        		<div class="col-md-12">
		                <legend class="col-md-6" style="font-size: 12pt">Fecha de Cita</legend>
			        	<div class="row">
			        		<!-- Input Fecha_Cita -->
				    		<div class="col-md-6 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">De *</span>
								</div>
				    			<input id="fecha_cita" class="form-control form-control-sm" type="date" name="fecha_cita" placeholder="Fecha">
				    		</div>
				    		<!-- Input Fecha_Cita_Fin -->
				    		<div class="col-md-6 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Hasta *</span>
								</div>
				    			<input id="fecha_cita_fin" class="form-control form-control-sm" type="date" name="fecha_cita_fin" placeholder="Fecha">
				    		</div>
			        	</div>

			        	<legend class="col-md-6" style="font-size: 12pt">Hora de Cita</legend>
			        	<div class="row">
			        		<!-- Input Hora_Cita -->
				    		<div class="col-md-4 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Inicio *</span>
								</div>
				    			<input id="hora_cita" class="form-control form-control-sm" type="time" name="hora_cita" placeholder="Fecha">
				    		</div>
				    		<!-- Input Hora_Cita_Fin -->
				    		<div class="col-md-4 offset-md-2 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Fin *</span>
								</div>
				    			<input id="hora_cita_fin" class="form-control form-control-sm" type="time" name="hora_cita_fin" placeholder="Fecha">
				    		</div>
			        	</div>
			        </div>
	    		</fieldset>
	    	</div>

	    	<div class="col-md-12">
        		<fieldset class="row">
	        		<div class="col-md-12">
		                <legend class="col-md-6" style="font-size: 12pt">Extras </legend>
		            
			            <div class="row">
			            	<!-- TextArea Comentarios_Cita -->
				    		<div class="col-md-6 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
								</div>
				    			<textarea id="comentarios_cita" class="form-control form-control-sm" name="comentarios_cita" placeholder="Comentarios" style="height: 80px; min-height: 80px; max-height: 80px;"></textarea>
				    		</div>

				    		<!-- TextArea Sintomas_Cita -->
				    		<div class="col-md-6 input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
								</div>
				    			<textarea id="sintomas_cita" class="form-control form-control-sm" name="sintomas_cita" placeholder="Síntomas" style="height: 80px; min-height: 80px; max-height: 80px;"></textarea>
				    		</div>
			            </div>
			        </div>
		        </fieldset>
		    </div>
        </div>
      </div>
      <div class="modal-footer">
      	<button id="agendar" type="button" class="btn btn-success btn-sm">Agendar</button>
      	<button id="modificar" type="button" class="btn btn-info btn-sm">Modificar</button>
      	<button id="borrar" type="button" class="btn btn-danger btn-sm">Borrar</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var agendar_cita;

	function validar_campos(){
		if($('#titulo_cita').val() == ""){
			return false;
		}

		if($("#especialista_cita option:selected" ).val() == 0 ){
			return false;
		}

		if($('#fecha_cita').val() == "" || $('#fecha_cita_fin').val() == ""){
			return false;
		}

		if($('#hora_cita').val() == ""  || $('#hora_cita_fin').val() == ""){
			return false;
		}

		return true;
	}

	$(document).ready(function(){

		//Seting div de overlay como oculto
		$('#loader_img').hide();
		$('#middle').hide();

		$('#hora_cita').bootstrapMaterialDatePicker({ date: false,  switchOnClick: true, shortTime: false, format: 'HH:mm'});
		$('#hora_cita_fin').bootstrapMaterialDatePicker({ date: false,  switchOnClick: true, shortTime: false, format: 'HH:mm'});

		//Evento para agregar citas
		$('#agendar').click(function(){
			var flag_validar = validar_campos();

			if(flag_validar){
				getDatos();
				$.ajax({
					type: 'POST',
					url: '{{ route('citas.store') }}',
					data: agendar_cita,
					dataType: "json",
					beforeSend: function() {
				        $('#loader_img').show();
				        $('#middle').show();
				    },
					success: function(data){
						if(data.msg){
							$('#calendar').fullCalendar('refetchEvents', agendar_cita);
							$('#modalEventos').modal('toggle');

				        	$('#loader_img').hide();
				        	$('#middle').hide();

						}else{
							console.log(data.msg);
							alert(data.text);

							$('#loader_img').hide();
				        	$('#middle').hide();
						}
					},
					error: function(data){
						alert('Error al guardar cita');
						console.log(data.responseText);

						$('#loader_img').hide();
				        $('#middle').hide();

					}
				});
			}else{
				alert('Los campos marcados con un * (asterisco) no deben estar vacíos');
			}
		});

		//Modificar cita
		$('#modificar').click(function(){
			$('#loader_img').hide();
			$('#middle').hide();

			var flag_validar = validar_campos();

			if(flag_validar){
				getDatos();
				$.ajax({
					type: 'POST',
					url: '{{ route('modificar') }}',
					data: agendar_cita,
					beforeSend: function() {
				        $('#loader_img').show();
				        $('#middle').show();
				    },
					success: function(msg){
						if(msg){
							$('#calendar').fullCalendar('refetchEvents', agendar_cita);
							$('#modalEventos').modal('toggle');

					        $('#loader_img').hide();
					        $('#middle').hide();

						}else{
							console.log(msg);
						}
					},
					error: function(msg){
						alert('Error al modificar la cita');
						console.log(msg.responseText);

						$('#loader_img').hide();
				        $('#middle').hide();
					}
				});
			}
		});

		//Borrar cita
		$('#borrar').click(function(){

			var borrar = confirm('¿Seguro que deseas eliminarla?');

			if(borrar == true){

				$('#loader_img').hide();
			    $('#middle').hide();

				getDatos();
				$.ajax({
					type: 'post',
					url: '{{ route('delete') }}',
					data: agendar_cita,
					success: function(msg){
						if(msg){
							$('#calendar').fullCalendar('refetchEvents', agendar_cita);
							$('#modalEventos').modal('toggle');

			        		$('#loader_img').hide();
			        		$('#middle').hide();

						}else{
							console.log(msg);
						}
					},
					error: function(msg){
						alert('Error al eliminar la cita');
						console.log(msg.responseText);

						$('#loader_img').hide();
			        	$('#middle').hide();
					}
				});
			}
		});

	});

	function getDatos(){
		agendar_cita = {
			id: $('#id_cita').val(),
			title: $('#titulo_cita').val(),
			start: $('#fecha_cita').val()+" "+$('#hora_cita').val(),
			end: $('#fecha_cita_fin').val()+" "+$('#hora_cita_fin').val(),
			comentarios: $('#comentarios_cita').val(),
			sintomas: $('#sintomas_cita').val(),
			paciente: $('#paciente_cita').val(),
			especialista: $('#especialista_cita').val(),
			color: '',
			textColor: '',
			usuario: '{{Auth::user()->id}}',
			_token: '<?php echo csrf_token() ?>'
		}; 
	}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

@endsection