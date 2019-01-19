@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Historia Clínica &nbsp; • &nbsp; 
                	@if (isset($historia_clinica))
                    	{{$historia_clinica->paciente->Nombre." ".$historia_clinica->paciente->Ap_Paterno." ".$historia_clinica->paciente->Ap_Materno}}
                	@else
                		Formulario
                	@endif
            	</div>
            	<?php 
            		//FECHA LOCAL
                    date_default_timezone_set('America/Monterrey'); 
                    setlocale(LC_TIME, 'spanish');
                ?>
                	
                <div class="card-body">
                	<div class="row justify-content-end mb-2 align-items-center">
                		<div class="col-md-1 text-right">
                			<a class="btn btn-outline-dark btn-sm" href="{{ route('historia_clinica.print', [$historia_clinica->Id_Historia_Clinica]) }}"><i class="fas fa-print"></i> Imprimir</a>
	                	</div>
	                	@isset ($historia_clinica)
	                	<div class="col-md-1 text-right">
							<form method="post" action="{!! action('HistoriasClinicasController@destroy', $historia_clinica->Id_Historia_Clinica) !!}">
		    					{!! csrf_field() !!}
								<button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-times"></i> Eliminar</button>
							</form>
						</div>
						@endisset
                		<div class="col-md-2 text-right">
                			<span><em>{{strtoupper(strftime("%B %e de %Y", strtotime(date('d-m-Y'))))}}</em></span>
                		</div>
                	</div>                	
                	<div class="accordion" id="accordionExample">

                		<form id="historia_clinica_form" method="post" enctype="multipart/form-data" 
                			@if (isset($historia_clinica))
                				action="{{ route('historia_clinica.update', $historia_clinica->Id_Historia_Clinica) }}"
                			@else
                				action="{{ route('historia_clinica.store') }}"
                			@endif>

                			@csrf
                		<input type="hidden" name="paciente" value="@isset ($paciente)
                		    {{$paciente->Id_Paciente}}
                		@endisset">
                		<!-- Datos Personales -->

					  	<div class="card">
					    	<div class="card-header" id="headingOne">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#Datos_Personales" aria-expanded="true" aria-controls="Datos_Personales">
					          			Datos Personales
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Datos_Personales" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					      		<div class="card-body">
					        		<div class="row">
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Nombre:</span>
												</div>
					        					<input class="form-control form-control-sm" type="text" name="nombre" value="{{$paciente->Nombre}}" disabled>
					        				</div>
					        			</div>
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Ap. Paterno:</span>
												</div>
					        					<input class=" form-control form-control-sm" type="text" name="ap_paterno" value="{{$paciente->Ap_Paterno}}" disabled>
					        				</div>
					        			</div>
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Ap. Materno:</span>
												</div>
					        					<input class=" form-control form-control-sm" type="text" name="ap_materno" value="{{$paciente->Ap_Materno}}" disabled>
					        				</div>
					        			</div>
					        			<div class="col-md-2">
					        				<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
												   <span class="input-group-text">Edad:</span>
												</div>
					        					<input class=" form-control form-control-sm" type="text" name="edad" value="{{$paciente->Edad}}" disabled>
						        				<div class="input-group-append">
													<span class="input-group-text">años</span>
												</div>
											</div>
					        			</div>
					        			<div class="col-md-1 text-center pt-1">
					        				<a tabindex="0" id="Datos_Personales_Popover" role="button" data-toggle="popover" data-trigger="focus" title="Datos Personales" data-content="Los campos inhabilitados se llenan automaticamente. En caso de necesitar modificar dicha información, deberás hacerlo desde la sección 'Pacientes' y seleccionando el paciente requerido.">
					        					<i class="far fa-question-circle fa-lg"></i>
					        				</a>
					        			</div>
					        		</div>
					        		<div class="row">
					        			<div class="col-md-3">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="hombre" type="radio" name="sexo" value="H" @isset ($historia_clinica)
					        					    @if ($historia_clinica->Sexo == 'H')
					        					    	{{ 'checked' }}
					        					    @endif
					        					@endisset>
					        					<label class="form-check-label" for="hombre">Masculino</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="mujer" type="radio" name="sexo" value="M" @isset ($historia_clinica)
					        					    @if ($historia_clinica->Sexo == 'M')
					        					    	{{ 'checked' }}
					        					    @endif
					        					@endisset>
						        				<label class="form-check-label" for="mujer">Femenino</label>
						        			</div>
					        			</div>
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Ocupación:</span>
											  	</div>
											  	<input type="text" class="form-control form-control-sm" name="ocupacion" value="@isset($historia_clinica){{$historia_clinica->Ocupacion}}@endisset">
											</div>
					        			</div>
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Religión:</span>
											  	</div>
											  	<input type="text" class="form-control form-control-sm" name="religion" value="@isset($historia_clinica){{$historia_clinica->Religion}}@endisset">
											</div>
					        			</div> 
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Lug. de Nac.:</span>
											  	</div>
											  	<input type="text" class="form-control form-control-sm" name="lugar_nac" value="@isset($historia_clinica){{$historia_clinica->Lugar_Nacimiento}}@endisset">
											</div>
					        			</div>
					        		</div>
					        		<div class="row">
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Fec. de Nac.:</span>
											  	</div>
											  	<input type="date" class="form-control form-control-sm" name="fec_nac"value="@isset($historia_clinica){{$historia_clinica->Fecha_Nacimiento}}@endisset">
											</div>
					        			</div>
					        			<div class="col-md-4">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Dirección:</span>
											  	</div>
											  	<textarea style="max-width: 410px; min-height: 31px; max-height: 100px; height: 100px" class="form-control form-control-sm" name="direccion" disabled>{{$paciente->Direccion}}</textarea>
											</div>
					        			</div>
					        			<div class="col-md-4">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Especialistas:</span>
											  	</div>
											  	<textarea style="max-width: 410px; min-height: 31px; max-height: 100px;" class="form-control form-control-sm" name="especialistas" disabled>@foreach ($citas as $cita){{$cita->Nombre." ".$cita->Ap_Paterno.","}}  @endforeach</textarea>

											  	<input type="hidden" name="Especialistas_Id" value="@isset($citas)@foreach ($citas as $cita){{$cita->Id_Especialista."|"}}@endforeach @endisset">
											</div>
					        			</div>
					        			<div class="col-md-1 pt-1 text-center">
					        				<a tabindex="0" id="Datos_Personales_Popover" role="button" data-toggle="popover" data-trigger="focus" title="Datos Personales" data-content="Si el campo 'Especialistas' está vacío, es porque aún no ha asignado citas al paciente.">
					        					<i class="far fa-question-circle fa-lg"></i>
					        				</a>
					        			</div>
					        		</div>
					      		</div>
					    	</div>
					  	</div>

					  	<!-- Antecedentes Familiares -->

					  	<div class="card">

					  		@php
					  			if(isset($historia_clinica)){
			                		//Antecedentes Familiares

								    $diabetes = CleanRowDB::limpiar($historia_clinica->ante_familiares->Diabetes);
								    $hipertension = CleanRowDB::limpiar($historia_clinica->ante_familiares->Hipertension);
								    $cancer = CleanRowDB::limpiar($historia_clinica->ante_familiares->Cancer);
								    $corazon = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Corazon);
								    $circulacion = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Circulacion);
								    $pulmonares = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Pulmonares);
								    $digestivos = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Digestivos);
								    $epilepsia = CleanRowDB::limpiar($historia_clinica->ante_familiares->Epilepsia);
								    $psiquiatricos = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Psiquiatricos);
								    $trombosis = CleanRowDB::limpiar($historia_clinica->ante_familiares->Trom_Embo_Hemo_Cerebrales);
								    $obesidad = CleanRowDB::limpiar($historia_clinica->ante_familiares->Obesidad);
								}
							@endphp

					    	<div class="card-header" id="headingTwo">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Antecedentes_Familiares" aria-expanded="false" aria-controls="Antecedentes_Familiares">
					          			Antecedentes Familiares
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Antecedentes_Familiares" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      		<div class="card-body">
					        		<div class="row mb-3">
					        			<div class="col-md-12">
					        				<footer class="blockquote-footer">Seleccione los campos si alguno de sus familiares: Abuelos, padres, tíos o hermanos padecen o han padecido alguna de las siguientes enfermedades.</footer>
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Diabetes -->

					        			<div class="col-md-2 text-right">
					        				<span>Diabetes / Azucar Alta</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_diabetes" type="radio" name="diabetes" value="1" @isset ($historia_clinica)@if ($diabetes[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_diabetes">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_diabetes" type="radio" name="diabetes" value="2" @isset ($historia_clinica)@if ($diabetes[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_diabetes">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_diabetes" type="radio" name="diabetes" value="0"  @isset ($historia_clinica)@if ($diabetes[0] == 3){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_diabetes">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="diabetes_parentesco" placeholder="Parentesco"  
					        				@isset($historia_clinica)
					        					@if(isset($diabetes[1]))
					        						{!! 'value="'.$diabetes[1].'"' !!}
					        					@endif 
					        				@endisset>
					        			</div>

					        			<!-- Hipertensión -->

					        			<div class="col-md-2 text-right">
					        				<span>Hipertensión / Presión Alta</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_hipertension" type="radio" name="hipertension" value="1"  @isset ($historia_clinica)@if ($hipertension[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_hipertension">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_hipertension" type="radio" name="hipertension" value="2"  @isset ($historia_clinica)@if ($hipertension[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_hipertension">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_hipertension" type="radio" name="hipertension" value="0"  @isset ($historia_clinica)@if ($hipertension[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_hipertension">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="hipertension_parentesco" placeholder="Parentesco" 
					        				@isset ($historia_clinica)
					        					@if(isset($hipertension[1]))
					        						{!! 'value="'.$hipertension[1].'"' !!}
					        					@endif
					        				@endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Epilepsia -->

					        			<div class="col-md-2 text-right">
					        				<span>Epilepsia</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_epilepsia" type="radio" name="epilepsia" value="1"  @isset ($historia_clinica)@if ($epilepsia[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_epilepsia">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_epilepsia" type="radio" name="epilepsia" value="2"  @isset ($historia_clinica)@if ($epilepsia[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_epilepsia">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_epilepsia" type="radio" name="epilepsia" value="0"  @isset ($historia_clinica)@if ($epilepsia[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_epilepsia">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="epilepsia_parentesco" placeholder="Parentesco"  
					        				@isset ($historia_clinica)
					        					@if (isset($epilepsia[1]))
					        						{!! 'value="'.$epilepsia[1].'"' !!}
					        					@endif
					        				@endisset>
					        			</div>

					        			<!-- Problemas Psiquiatricos -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Psiquiátricos</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_psiquiatrico" type="radio" name="psiquiatrico" value="1"  @isset ($historia_clinica)@if ($psiquiatricos[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_psiquiatrico">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_psiquiatrico" type="radio" name="psiquiatrico" value="2"  @isset ($historia_clinica)@if ($psiquiatricos[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_psiquiatrico">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_psiquiatrico" type="radio" name="psiquiatrico" value="0"  @isset ($historia_clinica)@if ($psiquiatricos[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_psiquiatrico">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="psiquiatrico_parentesco" placeholder="Parentesco"
					        				 @isset ($historia_clinica)
					        				 	@if (isset($psiquiatricos[1]))
					        				 		{!! 'value="'.$psiquiatricos[1].'"' !!}
					        				 	@endif
					        				@endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Cáncer -->

					        			<div class="col-md-2 text-right">
					        				<span>Cáncer</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_cancer" type="radio" name="cancer" value="1"  @isset ($historia_clinica)@if ($cancer[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_cancer">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_cancer" type="radio" name="cancer" value="2"  @isset ($historia_clinica)@if ($cancer[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_cancer">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_cancer" type="radio" name="cancer" value="0"  @isset ($historia_clinica)@if ($cancer[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_cancer">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="cancer_parentesco" placeholder="Parentesco"
					        				 @isset ($historia_clinica)
					        				 	@if (isset($cancer[1]))
					        				 		{!! 'value="'.$cancer[1].'"' !!}
					        				 	@endif
					        				@endisset>
					        			</div>

					        			<!-- Trombosis, Embolias, etc. -->

					        			<div class="col-md-2 text-right">
					        				<span>Trombosis, Embolias, etc.</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_trombosis" type="radio" name="trombosis" value="1"  @isset ($historia_clinica)@if ($trombosis[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_trombosis">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_trombosis" type="radio" name="trombosis" value="2"  @isset ($historia_clinica)@if ($trombosis[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_trombosis">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_trombosis" type="radio" name="trombosis" value="0"  @isset ($historia_clinica)@if ($trombosis[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_trombosis">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="trombosis_parentesco" placeholder="Parentesco"
					        				@isset ($historia_clinica)
					        				 	@if (isset($trombosis[1]))
					        				 		{!! 'value="'.$trombosis[1].'"' !!}
					        				 	@endif 
					        				@endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Problemas de Corazón -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Corazón</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_corazon" type="radio" name="corazon" value="1"  @isset ($historia_clinica)@if ($corazon[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_corazon">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_corazon" type="radio" name="corazon" value="2"  @isset ($historia_clinica)@if ($corazon[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_corazon">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_corazon" type="radio" name="corazon" value="0"  @isset ($historia_clinica)@if ($corazon[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_corazon">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="corazon_parentesco" placeholder="Parentesco"
					        				@isset ($historia_clinica)
					        				 	@if (isset($corazon[1]))
					        				 		{!! 'value="'.$corazon[1].'"' !!}
					        				 	@endif
					        				@endisset>
					        			</div>

					        			<!-- Padre vivo -->

					        			<div class="col-md-2 text-right">
					        				<span>Padre Vivo</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_padre_vivo" type="radio" name="padre_vivo" value="1"  @isset ($historia_clinica)@if ($historia_clinica->ante_familiares->Padre_Vivo == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_padre_vivo">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_padre_vivo" type="radio" name="padre_vivo" value="2"  @isset ($historia_clinica)@if ($historia_clinica->ante_familiares->Padre_Vivo == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_padre_vivo">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_padre_vivo" type="radio" name="padre_vivo" value="0"  @isset ($historia_clinica)@if ($historia_clinica->ante_familiares->Padre_Vivo == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_padre_vivo">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="padre_vivo_parentesco" placeholder="Parentesco" disabled>
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Problemas de Circulación -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Circulación</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_circulacion" type="radio" name="circulacion" value="1"  @isset ($historia_clinica)@if ($circulacion[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_circulacion">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_circulacion" type="radio" name="circulacion" value="2"  @isset ($historia_clinica)@if ($circulacion[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_circulacion">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_circulacion" type="radio" name="circulacion" value="0"  @isset ($historia_clinica)@if ($circulacion[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_circulacion">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="circulacion_parentesco" placeholder="Parentesco"
					        				@isset ($historia_clinica)
					        				 	@if (isset($circulacion[1]))
					        				 		{!! 'value="'.$circulacion[1].'"' !!}
					        				 	@endif
					        				@endisset>
					        			</div>

					        			<!-- Madre viva -->

					        			<div class="col-md-2 text-right">
					        				<span>Madre Viva</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_madre_viva" type="radio" name="madre_viva" value="1"  @isset ($historia_clinica)@if ($historia_clinica->ante_familiares->Madre_Viva == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_madre_viva">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_madre_viva" type="radio" name="madre_viva" value="2"  @isset ($historia_clinica)@if ($historia_clinica->ante_familiares->Madre_Viva == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_madre_viva">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_madre_viva" type="radio" name="madre_viva" value="0"  @isset ($historia_clinica)@if ($historia_clinica->ante_familiares->Madre_Viva == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_madre_viva">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="madre_viva_parentesco" placeholder="Parentesco" disabled>
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Problemas Pulmonares -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Pulmonares</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_pulmonares" type="radio" name="pulmonares" value="1"  @isset ($historia_clinica)@if ($pulmonares[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_pulmonares">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_pulmonares" type="radio" name="pulmonares" value="2"  @isset ($historia_clinica)@if ($pulmonares[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_pulmonares">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_pulmonares" type="radio" name="pulmonares" value="0"  @isset ($historia_clinica)@if ($pulmonares[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_pulmonares">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="pulmonares_parentesco" placeholder="Parentesco"
					        				@isset ($historia_clinica)
					        					@if (isset($pulmonares[1]))
					        						{!! 'value="'.$pulmonares[1].'"' !!}
					        					@endif
					        				@endisset>
					        			</div>

					        			<!-- Obesidad -->

					        			<div class="col-md-2 text-right">
					        				<span>Obesidad</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_obesidad" type="radio" name="obesidad" value="1"  @isset ($historia_clinica)@if ($obesidad[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_obesidad">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_obesidad" type="radio" name="obesidad" value="2"  @isset ($historia_clinica)@if ($obesidad[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_obesidad">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_obesidad" type="radio" name="obesidad" value="0"  @isset ($historia_clinica)@if ($obesidad[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_obesidad">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="obesidad_parentesco" placeholder="Parentesco"
					        				@isset ($historia_clinica)
					        					@if (isset($obesidad[1]))
					        						{!! 'value="'.$obesidad[1].'"' !!}
					        					@endif
					        				@endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">

					        			<!-- Problemas Digestivo -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Digestivo</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_digestivo" type="radio" name="digestivo" value="1"  @isset ($historia_clinica)@if ($digestivos[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_digestivo">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_digestivo" type="radio" name="digestivo" value="2"  @isset ($historia_clinica)@if ($digestivos[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_digestivo">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_digestivo" type="radio" name="digestivo" value="0"  @isset ($historia_clinica)@if ($digestivos[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_digestivo">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="digestivo_parentesco" placeholder="Parentesco"  
					        				@isset ($historia_clinica)
					        					@if (isset($digestivos[1]))
					        						{!! 'value="'.$digestivos[1].'"' !!}
					        					@endif
					        				@endisset>
					        			</div>

					        			<!-- Otras -->

					        			<div class="col-md-2 text-right">
					        				<span>Otras</span>
					        			</div>
					        			<div class="col-md-4 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="otras" 
					        					@isset ($historia_clinica)
					        						@if (isset($historia_clinica->ante_familiares->Otras))
					        							{!! 'value="'.$historia_clinica->ante_familiares->Otras.'"' !!}
					        						@endif
					        					@endisset>
					        			</div>
					        		</div>
					      		</div>
					    	</div>
						</div>

						<!-- Antecedentes Personales -->

						<div class="card">

							@php
								if(isset($historia_clinica)){
									//Antecedentes Personales

									$ejercicio = CleanRowDB::limpiar($historia_clinica->ante_personales->Ejercicio);
									$fuma = CleanRowDB::limpiar($historia_clinica->ante_personales->Cigarro);
									$alcohol = CleanRowDB::limpiar($historia_clinica->ante_personales->Alcohol);
									$sustancias = CleanRowDB::limpiar($historia_clinica->ante_personales->Sustancias);
									$alergias = CleanRowDB::limpiar($historia_clinica->ante_personales->Alergias);
									$medicamentos = CleanRowDB::limpiar($historia_clinica->ante_personales->Medicamentos);
									$vacunas = CleanRowDB::limpiar($historia_clinica->ante_personales->Vacunas);
								}
							@endphp

					    	<div class="card-header" id="headingThree">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Antecedentes_Personales" aria-expanded="false" aria-controls="Antecedentes_Personales">
					          			Antecedentes Personales
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Antecedentes_Personales" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					      		<div class="card-body">
					      			<div class="row mb-3">
					        			<div class="col-md-12">
					        				<footer class="blockquote-footer">Seleccione los campos que apliquen al paciente.</footer>
					        			</div>
					        		</div>
					        		
					        		<div class="row align-items-center">
					        			
					        			<!-- ¿Realiza Ejercicio? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Realiza Ejercicio?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_ejercicio" type="radio" name="ejercicio" value="1" @isset ($historia_clinica)@if ($ejercicio[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_ejercicio">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_ejercicio" type="radio" name="ejercicio" value="2" @isset ($historia_clinica)@if ($ejercicio[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_ejercicio">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>Tipo</span>
					        			</div>
					        			<div class="col-md-3 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="ejercicio_tipo" @isset ($historia_clinica)@if (isset($ejercicio[1])){!! 'value="'.$ejercicio[1].'"' !!}@endif @endisset>
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>Frecuencia</span>
					        			</div>
					        			<div class="col-md-3 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="ejercicio_frecuencia" @isset ($historia_clinica)@if (isset($ejercicio[2])){!! 'value="'.$ejercicio[2].'"' !!}@endif @endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Fuma o ha fumado? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Fuma o ha fumado?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_fuma" type="radio" name="fuma" value="1" @isset ($historia_clinica)@if ($fuma[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_fuma">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_fuma" type="radio" name="fuma" value="2" @isset ($historia_clinica)@if ($fuma[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_fuma">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿Por Día?</span>
					        			</div>
					        			<div class="col-md-1 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="fuma_por_dia" placeholder="Cantidad" @isset ($historia_clinica)@if (isset($fuma[1])){!! 'value="'.$fuma[1].'"' !!}@endif @endisset>
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>¿Desde?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="fuma_desde" @isset ($historia_clinica)@if (isset($fuma[2])){!! 'value="'.$fuma[2].'"' !!}@endif @endisset>
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>Hasta?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="fuma_hasta" placeholder="Suspendido hace..." @isset ($historia_clinica)@if (isset($fuma[3])){!! 'value="'.$fuma[3].'"' !!}@endif @endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Bebe Alcohol? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Bebe Alcohol?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_alcohol" type="radio" name="alcohol" value="1" @isset ($historia_clinica)@if ($alcohol[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_alcohol">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_alcohol" type="radio" name="alcohol" value="2" @isset ($historia_clinica)@if ($alcohol[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_alcohol">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>Tipo</span>
					        			</div>
					        			<div class="col-md-1 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="alcohol_tipo" @isset ($historia_clinica)@if (isset($alcohol[1])){!! 'value="'.$alcohol[1].'"' !!}@endif @endisset>
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>¿Desde?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="alcohol_desde" @isset ($historia_clinica)@if (isset($alcohol[2])){!! 'value="'.$alcohol[2].'"' !!}@endif @endisset>
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>Hasta?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="alcohol_hasta" placeholder="Suspendido hace..." @isset ($historia_clinica)@if (isset($alcohol[3])){!! 'value="'.$alcohol[3].'"' !!}@endif @endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Otras Sustancias? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Otras Sustancias?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_sustancias" type="radio" name="sustancias" value="1" @isset ($historia_clinica)@if ($sustancias[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_sustancias">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_sustancias" type="radio" name="sustancias" value="2" @isset ($historia_clinica)@if ($sustancias[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_sustancias">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>Tipo</span>
					        			</div>
					        			<div class="col-md-1 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="sustancias_tipo" @isset ($historia_clinica)@if (isset($sustancias[1])){!! 'value="'.$sustancias[1].'"' !!}@endif @endisset>
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>¿Desde?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="sustancias_desde" @isset ($historia_clinica)@if (isset($sustancias[2])){!! 'value="'.$sustancias[2].'"' !!}@endif @endisset>
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>Hasta?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="sustancias_hasta" placeholder="Suspendido hace..." @isset ($historia_clinica)@if (isset($sustancias[3])){!! 'value="'.$sustancias[3].'"' !!}@endif @endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Alergias? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Alergias?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_alergias" type="radio" name="alergias" value="1" @isset ($historia_clinica)@if ($alergias[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_alergias">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_alergias" type="radio" name="alergias" value="2" @isset ($historia_clinica)@if ($alergias[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_alergias">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿A qué?</span>
					        			</div>
					        			<div class="col-md-7 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="alergias_descripcion" placeholder="Medicamentos, Alimento, Sustancia..." @isset ($historia_clinica)@if (isset($alergias[1])){!! 'value="'.$alergias[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Toma Medicamentos? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Toma Medicamentos?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_medicamentos" type="radio" name="medicamentos" value="1" @isset ($historia_clinica)@if ($medicamentos[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_medicamentos">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_medicamentos" type="radio" name="medicamentos" value="2" @isset ($historia_clinica)@if ($medicamentos[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_medicamentos">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿Cuáles?</span>
					        			</div>
					        			<div class="col-md-7 pl-0">
					        				<textarea class="form-control form-control-sm" style="max-width: 610px; min-height: 31px; max-height: 100px; height: 31px" placeholder="¿Cuáles y Cómo los toma?" name="medicamentos_descripcion">@isset ($historia_clinica)@if(isset($medicamentos[1])){!! $medicamentos[1] !!}@endif @endisset</textarea>
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Vacunas? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Vacunas?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_vacunas" type="radio" name="vacunas" value="1" @isset ($historia_clinica)@if ($vacunas[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_vacunas">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_vacunas" type="radio" name="vacunas" value="2" @isset ($historia_clinica)@if ($vacunas[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_vacunas">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿Cuáles?</span>
					        			</div>
					        			<div class="col-md-7 pl-0">
					        				<textarea class="form-control form-control-sm" style="max-width: 610px; min-height: 31px; max-height: 100px; height: 31px" name="vacunas_descripcion">@isset ($historia_clinica)@if (isset($vacunas[1])){!! $vacunas[1] !!}@endif @endisset</textarea>
					        			</div>
					        		</div>
					      		</div>
					    	</div>
					  	</div>

					  	<!-- Antecedentes Médicos -->

					  	<div class="card">
					  		@php
					  			if(isset($historia_clinica)){
						  			//Antecedentes Médicos

						  			$cirugias = CleanRowDB::limpiar($historia_clinica->ante_medicos->Cirugias);
						  			$diabetes_2 = CleanRowDB::limpiar($historia_clinica->ante_medicos->Diabetes);
						  			$hipertension_2 = CleanRowDB::limpiar($historia_clinica->ante_medicos->Hipertension);
						  			$tiroides = CleanRowDB::limpiar($historia_clinica->ante_medicos->Tiroides);
						  			$migrania = CleanRowDB::limpiar($historia_clinica->ante_medicos->Migrania);
						  			$gastrointestinales = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Gastrointestinales);
						  			$fractura = CleanRowDB::limpiar($historia_clinica->ante_medicos->Fractura);
						  			$higado = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Higado);
						  			$reumas = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Reumaticos);
						  			$vesicula = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Vesicula);
						  			$nerviosismo = CleanRowDB::limpiar($historia_clinica->ante_medicos->Nerviosismo_Ansiedad);
						  			$pulmonares = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Pulmonares);
						  			$depresion = CleanRowDB::limpiar($historia_clinica->ante_medicos->Depresion);
						  			$corazon_2 = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Corazon);
						  			$convulsiones = CleanRowDB::limpiar($historia_clinica->ante_medicos->Epilepsia);
						  			$trombosis = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Circulacion);
						  			$cancer_2 = CleanRowDB::limpiar($historia_clinica->ante_medicos->Cancer);
						  			$genitourinarios = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Genitourinarios);
						  			$transfusiones = CleanRowDB::limpiar($historia_clinica->ante_medicos->Transfusiones);
						  			$piel = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Piel); 
						  		}
					  		@endphp
					    	<div class="card-header" id="headingTwo">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Antecedentes_Medicos" aria-expanded="false" aria-controls="Antecedentes_Medicos">
					          			Antecedentes Médicos
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Antecedentes_Medicos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      		<div class="card-body">

					      			<div class="row align-items-center">
					      				<div class="col-md-2 text-right">
					        				<span>Cirugías Previas</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_cirugias" type="radio" name="cirugias" value="1" @isset ($historia_clinica)@if ($cirugias[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_cirugias">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_cirugias" type="radio" name="cirugias" value="2" @isset ($historia_clinica)@if ($cirugias[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_cirugias">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿Cuáles?</span>
					        			</div>
					        			<div class="col-md-7 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="cirugias_descripcion" placeholder="Describa las cirugías previas..." @isset ($historia_clinica)@if (isset($cirugias[1])){!! 'value="'.$cirugias[1].'"' !!}@endif @endisset>
					        			</div>
					      			</div>

					        		<div class="row align-items-center">

					        			<!-- Diabetes -->

					        			<div class="col-md-2 text-right">
					        				<span>Diabetes / Azucar Alta</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_diabetes_2" type="radio" name="diabetes_2" value="1" @isset ($historia_clinica)@if ($diabetes_2[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_diabetes_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_diabetes_2" type="radio" name="diabetes_2" value="2" @isset ($historia_clinica)@if ($diabetes_2[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_diabetes_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_diabetes_2" type="radio" name="diabetes_2" value="0" @isset ($historia_clinica)@if ($diabetes_2[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_diabetes_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="diabetes_2_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($diabetes_2[1])){!! 'value="'.$diabetes_2[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Hipertensión -->

					        			<div class="col-md-2 text-right">
					        				<span>Hipertensión / Presión Alta</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_hipertension_2" type="radio" name="hipertension_2" value="1" @isset ($historia_clinica)@if ($hipertension_2[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_hipertension_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_hipertension_2" type="radio" name="hipertension_2" value="2" @isset ($historia_clinica)@if ($hipertension_2[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_hipertension_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_hipertension_2" type="radio" name="hipertension_2" value="0" @isset ($historia_clinica)@if ($hipertension_2[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_hipertension_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="hipertension_2_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($hipertension_2[1])){!! 'value="'.$hipertension_2[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas de Tiroides -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Tiroides</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_tiroides" type="radio" name="tiroides" value="1" @isset ($historia_clinica)@if ($tiroides[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_tiroides">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_tiroides" type="radio" name="tiroides" value="2" @isset ($historia_clinica)@if ($tiroides[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_tiroides">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_tiroides" type="radio" name="tiroides" value="0" @isset ($historia_clinica)@if ($tiroides[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_tiroides">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="tiroides_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($tiroides[1])){!! 'value="'.$tiroides[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Migraña -->

					        			<div class="col-md-2 text-right">
					        				<span>Migraña</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_migrania" type="radio" name="migrania" value="1" @isset ($historia_clinica)@if ($migrania[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_migrania">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_migrania" type="radio" name="migrania" value="2" @isset ($historia_clinica)@if ($migrania[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_migrania">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_migrania" type="radio" name="migrania" value="0" @isset ($historia_clinica)@if ($migrania[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_migrania">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="migrania_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($migrania[1])){!! 'value="'.$migrania[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas Gastrointestinales -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Gastrointestinales</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_gastrointestinales" type="radio" name="gastrointestinales" value="1" @isset ($historia_clinica)@if ($gastrointestinales[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_gastrointestinales">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_gastrointestinales" type="radio" name="gastrointestinales" value="2" @isset ($historia_clinica)@if ($gastrointestinales[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_gastrointestinales">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_gastrointestinales" type="radio" name="gastrointestinales" value="0" @isset ($historia_clinica)@if ($gastrointestinales[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_gastrointestinales">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="gastrointestinales_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($gastrointestinales[1])){!! 'value="'.$gastrointestinales[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Fractura -->

					        			<div class="col-md-2 text-right">
					        				<span>Fractura</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_fractura" type="radio" name="fractura" value="1" @isset ($historia_clinica)@if ($fractura[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_fractura">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_fractura" type="radio" name="fractura" value="2" @isset ($historia_clinica)@if ($fractura[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_fractura">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_fractura" type="radio" name="fractura" value="0" @isset ($historia_clinica)@if ($fractura[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_fractura">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="fractura_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($fractura[1])){!! 'value="'.$fractura[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas Hígado -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Hígado</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_higado" type="radio" name="higado" value="1" @isset ($historia_clinica)@if ($higado[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_higado">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_higado" type="radio" name="higado" value="2" @isset ($historia_clinica)@if ($higado[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_higado">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_higado" type="radio" name="higado" value="0" @isset ($historia_clinica)@if ($higado[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_higado">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="higado_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($higado[1])){!! 'value="'.$higado[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Enfermedades Reumáticas -->

					        			<div class="col-md-2 text-right">
					        				<span>Enfermedades Reumáticas</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_reumas" type="radio" name="reumas" value="1" @isset ($historia_clinica)@if ($reumas[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_reumas">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_reumas" type="radio" name="reumas" value="2" @isset ($historia_clinica)@if ($reumas[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_reumas">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_reumas" type="radio" name="reumas" value="0" @isset ($historia_clinica)@if ($reumas[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_reumas">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="reumas_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($reumas[1])){!! 'value="'.$reumas[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas de Vesícula -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Vesícula</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_vesicula" type="radio" name="vesicula" value="1" @isset ($historia_clinica)@if ($vesicula[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_vesicula">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_vesicula" type="radio" name="vesicula" value="2" @isset ($historia_clinica)@if ($vesicula[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_vesicula">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_vesicula" type="radio" name="vesicula" value="0" @isset ($historia_clinica)@if ($vesicula[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_vesicula">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="vesicula_desde" placeholder="¿Desde Cuándo?"@isset ($historia_clinica)@if (isset($vesicula[1])){!! 'value="'.$vesicula[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Nerviosismo o Ansiedad -->

					        			<div class="col-md-2 text-right">
					        				<span>Nerviosismo o Ansiedad</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_nerviosismo" type="radio" name="nerviosismo" value="1" @isset ($historia_clinica)@if ($nerviosismo[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_nerviosismo">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_nerviosismo" type="radio" name="nerviosismo" value="2" @isset ($historia_clinica)@if ($nerviosismo[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_nerviosismo">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_nerviosismo" type="radio" name="nerviosismo" value="0" @isset ($historia_clinica)@if ($nerviosismo[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_nerviosismo">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="nerviosismo_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($nerviosismo[1])){!! 'value="'.$nerviosismo[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas Pulmonares -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Pulmonares</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_pulmonares_2" type="radio" name="pulmonares_2" value="1" @isset ($historia_clinica)@if ($pulmonares[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_pulmonares_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_pulmonares_2" type="radio" name="pulmonares_2" value="2" @isset ($historia_clinica)@if ($pulmonares[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_pulmonares_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_pulmonares_2" type="radio" name="pulmonares_2" value="0" @isset ($historia_clinica)@if ($pulmonares[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_pulmonares_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="pulmonares_2_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($pulmonares[1])){!! 'value="'.$pulmonares[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Depresión -->

					        			<div class="col-md-2 text-right">
					        				<span>Depresión</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_depresion" type="radio" name="depresion" value="1" @isset ($historia_clinica)@if ($depresion[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_depresion">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_depresion" type="radio" name="depresion" value="2" @isset ($historia_clinica)@if ($depresion[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_depresion">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_depresion" type="radio" name="depresion" value="0" @isset ($historia_clinica)@if ($depresion[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_depresion">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="depresion_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($depresion[1])){!! 'value="'.$depresion[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Enfermedades del Corazón -->

					        			<div class="col-md-2 text-right">
					        				<span>Enfermedades del Corazón</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_corazon_2" type="radio" name="corazon_2" value="1" @isset ($historia_clinica)@if ($corazon_2[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_corazon_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_corazon_2" type="radio" name="corazon_2" value="2" @isset ($historia_clinica)@if ($corazon_2[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_corazon_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_corazon_2" type="radio" name="corazon_2" value="0" @isset ($historia_clinica)@if ($corazon_2[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_corazon_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="corazon_2_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($corazon_2[1])){!! 'value="'.$corazon_2[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Convulsiones o Epilepsia -->

					        			<div class="col-md-2 text-right">
					        				<span>Convulsiones / Epilepsia</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_convulsiones" type="radio" name="convulsiones" value="1" @isset ($historia_clinica)@if ($convulsiones[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_convulsiones">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_convulsiones" type="radio" name="convulsiones" value="2" @isset ($historia_clinica)@if ($convulsiones[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_convulsiones">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_convulsiones" type="radio" name="convulsiones" value="0" @isset ($historia_clinica)@if ($convulsiones[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_convulsiones">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="convulsiones_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($convulsiones[1])){!! 'value="'.$convulsiones[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas de Circulación, Trombosis, Embolias, etc. -->

					        			<div class="col-md-2 text-right">
					        				<span>Trombosis, Embolias / Circulación</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_circulacion_2" type="radio" name="circulacion_2" value="1" @isset ($historia_clinica)@if ($trombosis[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_circulacion_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_circulacion_2" type="radio" name="circulacion_2" value="2" @isset ($historia_clinica)@if ($trombosis[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_circulacion_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_circulacion_2" type="radio" name="circulacion_2" value="0" @isset ($historia_clinica)@if ($trombosis[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_circulacion_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="circulacion_2_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($trombosis[1])){!! 'value="'.$trombosis[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Cancer o Tumores -->

					        			<div class="col-md-2 text-right">
					        				<span>Cáncer / Tumores</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_cancer_2" type="radio" name="cancer_2" value="1" @isset ($historia_clinica)@if ($cancer_2[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_cancer_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_cancer_2" type="radio" name="cancer_2" value="2" @isset ($historia_clinica)@if ($cancer_2[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_cancer_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_cancer_2" type="radio" name="cancer_2" value="0" @isset ($historia_clinica)@if ($cancer_2[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_cancer_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="cancer_2_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($cancer_2[1])){!! 'value="'.$cancer_2[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas Genitourinarios -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Genitourinarios</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_genitourinarios" type="radio" name="genitourinarios" value="1" @isset ($historia_clinica)@if ($genitourinarios[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_genitourinarios">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_genitourinarios" type="radio" name="genitourinarios" value="2" @isset ($historia_clinica)@if ($genitourinarios[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_genitourinarios">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_genitourinarios" type="radio" name="genitourinarios" value="0" @isset ($historia_clinica)@if ($genitourinarios[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_genitourinarios">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="genitourinarios_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($genitourinarios[1])){!! 'value="'.$genitourinarios[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Transfusiones -->

					        			<div class="col-md-2 text-right">
					        				<span>Transfusiones</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_transfusiones" type="radio" name="transfusiones" value="1" @isset ($historia_clinica)@if ($transfusiones[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_transfusiones">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_transfusiones" type="radio" name="transfusiones" value="2" @isset ($historia_clinica)@if ($transfusiones[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_transfusiones">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_transfusiones" type="radio" name="transfusiones" value="0" @isset ($historia_clinica)@if ($transfusiones[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_transfusiones">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="transfusiones_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($transfusiones[1])){!! 'value="'.$transfusiones[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Enfermedades de la Piel -->

					        			<div class="col-md-2 text-right">
					        				<span>Enfermedades de la Piel</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_piel" type="radio" name="piel" value="1" @isset ($historia_clinica)@if ($piel[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_piel">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_piel" type="radio" name="piel" value="2" @isset ($historia_clinica)@if ($piel[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_piel">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_piel" type="radio" name="piel" value="0" @isset ($historia_clinica)@if ($piel[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_piel">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="piel_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($piel[1])){!! 'value="'.$piel[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Otras -->

					        			<div class="col-md-2 text-right">
					        				<span>Otras</span>
					        			</div>
					        			<div class="col-md-4 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="otras_2" @isset ($historia_clinica)@if ($historia_clinica->ante_medicos->Otras){!! 'value="'.$historia_clinica->ante_medicos->Otras !!}@endif @endisset>
					        			</div>
					        		</div>
					      		</div>
					    	</div>
						</div>

						<!-- Antecedentes Psicológicos -->

					  	<div class="card">

					  		@php
					  			if(isset($historia_clinica)){
						  			//Antecedentes Psicológicos

						  			$nerviosismo_2 = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Nerviosismo);
						  			$equilibrio = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Alter_Equilibrio);
						  			$depresion_2 = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Depresion);
						  			$habla = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Dific_Habla);
						  			$concentracion = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Dific_Concentracion);
						  			$dormir = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Dific_Dormir);
						  			$cabeza = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Dolores_Cabeza);
						  			$mareos = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Mareos);
						  			$desmayos = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Desmayos);
						  			$medicamentos = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Medicamentos);
						  		}
					  		@endphp
					    	<div class="card-header" id="headingTwo">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Antecedentes_Psicologicos" aria-expanded="false" aria-controls="Antecedentes_Psicologicos">
					          			Antecedentes Psicológicos
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Antecedentes_Psicologicos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      		<div class="card-body">

					        		<div class="row align-items-center">

					        			<!-- Nerviosismo Acentuado -->

					        			<div class="col-md-2 text-right">
					        				<span>Nerviosismo Acentuado</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_nerviosismo_2" type="radio" name="nerviosismo_2" value="1" @isset ($historia_clinica)@if ($nerviosismo_2[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_nerviosismo_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_nerviosismo_2" type="radio" name="nerviosismo_2" value="2" @isset ($historia_clinica)@if ($nerviosismo_2[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_nerviosismo_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_nerviosismo_2" type="radio" name="nerviosismo_2" value="0" @isset ($historia_clinica)@if ($nerviosismo_2[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_nerviosismo_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="nerviosismo_2_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($nerviosismo_2[1])){!! 'value="'.$nerviosismo_2[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- ALteraciones del Equilibrio -->

					        			<div class="col-md-2 text-right">
					        				<span>Alteraciones del Equilibrio</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_equilibrio" type="radio" name="equilibrio" value="1" @isset ($historia_clinica)@if ($equilibrio[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_equilibrio">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_equilibrio" type="radio" name="equilibrio" value="2" @isset ($historia_clinica)@if ($equilibrio[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_equilibrio">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_equilibrio" type="radio" name="equilibrio" value="0" @isset ($historia_clinica)@if ($equilibrio[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_equilibrio">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="equilibrio_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($equilibrio[1])){!! 'value="'.$equilibrio[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Tendencia a la Depresión -->

					        			<div class="col-md-2 text-right">
					        				<span>Tendencia a la Depresión</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_depresion_2" type="radio" name="depresion_2" value="1" @isset ($historia_clinica)@if ($depresion_2[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_depresion_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_depresion_2" type="radio" name="depresion_2" value="2" @isset ($historia_clinica)@if ($depresion_2[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_depresion_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_depresion_2" type="radio" name="depresion_2" value="0" @isset ($historia_clinica)@if ($depresion_2[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_depresion_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="depresion_2_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($depresion_2[1])){!! 'value="'.$depresion_2[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Dificultad para Hablar -->

					        			<div class="col-md-2 text-right">
					        				<span>Dificultad para hablar</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_habla" type="radio" name="habla" value="1" @isset ($historia_clinica)@if ($habla[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_habla">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_habla" type="radio" name="habla" value="2" @isset ($historia_clinica)@if ($habla[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_habla">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_habla" type="radio" name="habla" value="0" @isset ($historia_clinica)@if ($habla[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_habla">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="habla_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($habla[1])){!! 'value="'.$habla[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Dificultad para Concentrarse -->

					        			<div class="col-md-2 text-right">
					        				<span>Dificultad para Concentrarse</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_concentracion" type="radio" name="concentracion" value="1" @isset ($historia_clinica)@if ($concentracion[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_concentracion">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_concentracion" type="radio" name="concentracion" value="2" @isset ($historia_clinica)@if ($concentracion[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_concentracion">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_concentracion" type="radio" name="concentracion" value="0" @isset ($historia_clinica)@if ($concentracion[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_concentracion">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="concentracion_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($concentracion[1])){!! 'value="'.$concentracion[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Dificultad para dormir -->

					        			<div class="col-md-2 text-right">
					        				<span>Dificultad para dormir</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_dormir" type="radio" name="dormir" value="1" @isset ($historia_clinica)@if ($dormir[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_dormir">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_dormir" type="radio" name="dormir" value="2" @isset ($historia_clinica)@if ($dormir[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_dormir">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_dormir" type="radio" name="dormir" value="0" @isset ($historia_clinica)@if ($dormir[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_dormir">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="dormir_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($dormir[1])){!! 'value="'.$dormir[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Dolores de Cabeza -->

					        			<div class="col-md-2 text-right">
					        				<span>Dolores de Cabeza</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_cabeza" type="radio" name="cabeza" value="1" @isset ($historia_clinica)@if ($cabeza[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_cabeza">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_cabeza" type="radio" name="cabeza" value="2" @isset ($historia_clinica)@if ($cabeza[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_cabeza">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_cabeza" type="radio" name="cabeza" value="0" @isset ($historia_clinica)@if ($cabeza[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_cabeza">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="cabeza_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($cabeza[1])){!! 'value="'.$cabeza[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Mareos -->

					        			<div class="col-md-2 text-right">
					        				<span>Mareos</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_mareos" type="radio" name="mareos" value="1" @isset ($historia_clinica)@if ($mareos[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_mareos">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_mareos" type="radio" name="mareos" value="2" @isset ($historia_clinica)@if ($mareos[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_mareos">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_mareos" type="radio" name="mareos" value="0" @isset ($historia_clinica)@if ($mareos[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_mareos">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="mareos_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($mareos[1])){!! 'value="'.$mareos[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Desmayos -->

					        			<div class="col-md-2 text-right">
					        				<span>Desmayos</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_desmayos" type="radio" name="desmayos" value="1" @isset ($historia_clinica)@if ($desmayos[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_desmayos">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_desmayos" type="radio" name="desmayos" value="2" @isset ($historia_clinica)@if ($desmayos[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_desmayos">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_desmayos" type="radio" name="desmayos" value="0" @isset ($historia_clinica)@if ($desmayos[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_desmayos">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="desmayos_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($desmayos[1])){!! 'value="'.$desmayos[1].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Medicamentos o Antidepresivos -->

					        			<div class="col-md-2 text-right">
					        				<span>Medicina p/dormir o Antidepresivos</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_antidepresivos" type="radio" name="antidepresivos" value="1" @isset ($historia_clinica)@if ($medicamentos[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_antidepresivos">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_antidepresivos" type="radio" name="antidepresivos" value="2" @isset ($historia_clinica)@if ($medicamentos[0] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_antidepresivos">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_antidepresivos" type="radio" name="antidepresivos" value="0" @isset ($historia_clinica)@if ($medicamentos[0] == 0){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_se_antidepresivos">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="antidepresivos_desde" placeholder="¿Desde Cuándo?" @isset ($historia_clinica)@if (isset($medicamentos[1])){!! 'value="'.$medicamentos[1].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					      		</div>
					    	</div>
						</div>

						<!-- Valoración Funcional -->

					  	<div class="card">
					  		@php
					  			if(isset($historia_clinica)){
						  			//Valoración Funcional

						  			$apoyo = CleanRowDB::limpiar($historia_clinica->valoracion_funcional->Apoyo_Especial);
						  		}
					  		@endphp
					    	<div class="card-header" id="headingTwo">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Valoracion_Funcional" aria-expanded="false" aria-controls="Valoracion_Funcional">
					          			Valoración Funcional
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Valoracion_Funcional" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      		<div class="card-body">
					      			<div class="row align-items-center mb-2">

					        			<!-- ¿Capacidad Diferente? -->

					        			<div class="col-md-5 text-left">
					        				<span>¿Tiene alguna capacidad diferente que requiera apoyo especial?</span>
					        			</div>
					        			<div class="col-md-2 p-0">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_discapacidad" type="radio" name="discapacidad" value="1" @isset ($historia_clinica)@if ($historia_clinica->valoracion_funcional->Capacidad_Diferente == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="si_discapacidad">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_discapacidad" type="radio" name="discapacidad" value="2" @isset ($historia_clinica)@if ($historia_clinica->valoracion_funcional->Capacidad_Diferente == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="no_discapacidad">No</label>
						        			</div>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Tipo de apoyo especial -->

					        			<div class="col-md-3 text-left">
					        				<span>¿Qué tipo de apoyo requiere?</span>
					        			</div>
					        			<div class="col-md-4 p-0">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="auditivo" type="checkbox" name="auditivo" value="1" @isset ($historia_clinica)@if ($apoyo[0] == 1){{'checked'}}@endif @endisset>
					        					<label class="form-check-label" for="auditivo">Auditivo</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="motor" type="checkbox" name="motor" value="2" @isset ($historia_clinica)@if ($apoyo[1] == 2){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="motor">Motor</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="visual" type="checkbox" name="visual" value="3" @isset ($historia_clinica)@if ($apoyo[2] == 3){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="visual">Visual</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="idioma" type="checkbox" name="idioma" value="4" @isset ($historia_clinica)@if ($apoyo[3] == 4){{'checked'}}@endif @endisset>
						        				<label class="form-check-label" for="idioma">Idioma</label>
						        			</div>
					        			</div>

					        			<div class="col-md-5">
						        			<div class="row align-items-center">
						        				<!-- Otros -->

							        			<div class="col-md-2 text-right">
							        				<span>Otros</span>
							        			</div>
							        			<div class="col-md-10 pl-0">
							        				<input class="form-control form-control-sm" type="text" name="otros_3" @isset ($historia_clinica)@if (isset($apoyo[4])){!! 'value="'.$apoyo[4].'"' !!}@endif @endisset>
							        			</div>
						        			</div>
						        		</div>
					        		</div>
					      		</div>
					      	</div>
					    </div>

						<!-- Antecedentes Nutricionales -->

					  	<div class="card">
					  		@php
					  			if(isset($historia_clinica)){
						  			//Antecedentes Nutricionales

						  			$peso_ult_6_meses = CleanRowDB::limpiar($historia_clinica->ante_nutricionales->Peso_Ult_6_Meses);
						  			$dieta_especial = CleanRowDB::limpiar($historia_clinica->ante_nutricionales->Dieta_Especial);
						  		}
					  		@endphp
					    	<div class="card-header" id="headingTwo">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Antecedentes_Nutricionales" aria-expanded="false" aria-controls="Antecedentes_Nutricionales">
					          			Antecedentes Nutricionales
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Antecedentes_Nutricionales" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      		<div class="card-body">
					      			<div class="row align-items-center">

					        			<!-- Peso -->

							        	<div class="col-md-2">
					        				<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
												   <span class="input-group-text">Peso</span>
												</div>
					        					<input class=" form-control form-control-sm" type="number" name="peso" id="peso" step=".01" min="0" max="999.99" placeholder="00,00" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->Peso)){!! 'value="'.$historia_clinica->ante_nutricionales->Peso.'"' !!}@endif @endisset>
						        				<div class="input-group-append">
													<span class="input-group-text">kg</span>
												</div>
											</div>
					        			</div>

							        	<!-- Estatura -->

					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
												   <span class="input-group-text">Estatura</span>
												</div>
					        					<input class=" form-control form-control-sm" type="number" name="estatura" id="estatura" step=".01" min="0" max="2.50" placeholder="0,00" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->Estatura)){!! 'value="'.$historia_clinica->ante_nutricionales->Estatura.'"' !!}@endif @endisset>
						        				<div class="input-group-append">
													<span class="input-group-text">m</span>
												</div>
											</div>
					        			</div>

							        	<!-- Percentil -->

							        	<div class="col-md-2">
					        				<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
												   <span class="input-group-text">Percentil</span>
												</div>
					        					<input class=" form-control form-control-sm" type="number" name="percentil" step=".01" min="0" max="100.99" placeholder="0,00" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->Percentil)){!! 'value="'.$historia_clinica->ante_nutricionales->Percentil.'"' !!}@endif @endisset>
											</div>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- ¿Ha subido de peso? -->

					        			<div class="col-md-4 text-left">
					        				<span>¿Ha subido o bajado de peso en los últimos 6 meses?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_aumento" type="radio" name="aumento" value="1" @isset ($historia_clinica)@if ($peso_ult_6_meses[0] == 1){{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_aumento">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_aumento" type="radio" name="aumento" value="2" @isset ($historia_clinica)@if ($peso_ult_6_meses[0] == 2){{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_aumento">No</label>
						        			</div>
					        			</div>

					        			<div class="col-md-5 text-left">
						        			<div class="row align-items-center">
						        				<!-- ¿Cuánto? -->

							        			<div class="col-md-3 text-right">
							        				<span>¿Cuánto?</span>
							        			</div>
							        			<div class="col-md-4 pl-0">
							        				<input class="form-control form-control-sm" type="text" name="cuanto_aumento" @isset ($historia_clinica)@if (isset($peso_ult_6_meses[1])){!! 'value="'.$peso_ult_6_meses[1].'"' !!}@endif @endisset>
							        			</div>
						        			</div>
						        		</div>
					        		</div>

					        		<div class="row align-items-center mt-2">
					        			<div class="col-md-2">
					        				<span>¿Por qué?</span>
					        			</div>
					        			<div class="col-md-10 text-left">
					        				<input class="form-control form-control-sm" type="text" name="porque_aumento" @isset ($historia_clinica)@if (isset($peso_ult_6_meses[2])){!! 'value="'.$peso_ult_6_meses[2].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center mt-2">
					        			<div class="col-md-4">
					        				<span>Índice de Masa Corporal (Peso/Estatura<sup><small>2</small></sup>)</span>
					        			</div>
					        			<div class="col-md-2 text-left">
					        				<input class="form-control form-control-sm" onclick="javascript:Indice_Masa_Corporal();" type="number" id="imc" name="imc" step=".01" min="0" max="100.00" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->IMC)){!! 'value="'.$historia_clinica->ante_nutricionales->IMC.'"' !!}@endif @endisset>
					        			</div>

					        			<div class="col-md-1 text-left pt-1">
					        				<a tabindex="0" id="Antecedentes_Nutricionales_Popover" role="button" data-toggle="popover" data-trigger="focus" title="Antecedentes Nutricionales" data-content="El IMC se calcula automáticamente, obteniendo los valores de entrada de los campos de Peso y Estatura.">
					        					<i class="far fa-question-circle fa-lg"></i>
					        				</a>
					        			</div>
					        		</div>

					        		<div class="row align-items-center mt-2">

					        			<!-- Dieta especial -->

					        			<div class="col-md-2 text-left">
					        				<span>Dieta Especial</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_dieta" type="radio" name="dieta" value="1" @isset ($historia_clinica)@if ($dieta_especial[0] == 1){{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_dieta">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_dieta" type="radio" name="dieta" value="2" @isset ($historia_clinica)@if ($dieta_especial[0] == 2){{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_dieta">No</label>
						        			</div>
					        			</div>

					        			<div class="col-md-8 text-left">
						        			<div class="row align-items-center">
						        				<!-- ¿Cuál? -->

							        			<div class="col-md-2 text-right">
							        				<span>¿Cuál?</span>
							        			</div>
							        			<div class="col-md-10 pl-0">
							        				<input class="form-control form-control-sm" type="text" name="cual_dieta" @isset ($historia_clinica)@if (isset($dieta_especial[1])){!! 'value="'.$dieta_especial[1].'"' !!}@endif @endisset>
							        			</div>
						        			</div>
						        		</div>
					        		</div>

					        		<div class="row align-items-center mt-2">
					        			<div class="col-md-4">
					        				<div class="row align-items-center">
						        				<div class="col-md-12 text-left">
						        					<footer class="blockquote-footer"><span>Modificación del peso corporal</span></footer>
						        				</div>
					        				</div>
					        				<div class="row align-items-center">
					        					<div class="col-md-8 text-right">
					        						<span>Pérdida global (Últ. 6 meses)</span>
					        					</div>
					        					<div class="col-md-4">
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="99.99" name="perdida_global" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->Peso_Perdida_Global)){!! 'value="'.$historia_clinica->ante_nutricionales->Peso_Perdida_Global.'"' !!}@endif @endisset>
					        					</div>
					        				</div>
					        				<div class="row align-items-center mt-2">
					        					<div class="col-md-8 text-right">
					        						<span>Porcentaje de la pérdida</span>
					        					</div>
					        					<div class="col-md-4">
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="999.99" name="perdida_porcentaje" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->Porcentaje_Perdida)){!! 'value="'.$historia_clinica->ante_nutricionales->Porcentaje_Perdida.'"' !!}@endif @endisset>
					        					</div>
					        				</div>
					        				<div class="row align-items-center mt-2">
					        					<div class="col-md-12 text-left">
					        						<footer class="blockquote-footer"><span>Cambio en las últimas 2 semanas</span></footer>
					        					</div>
					        				</div>
					        				<div class="row align-items-center mt-2">
					        					<div class="col-md-8 text-right">
					        						<span>Aumento</span>
					        					</div>
					        					<div class="col-md-4">
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="999.99" name="aumento_ultimo" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->Ultimo_Aumento)){!! 'value="'.$historia_clinica->ante_nutricionales->Ultimo_Aumento.'"' !!}@endif @endisset>
					        					</div>
					        				</div>
					        				<div class="row align-items-center mt-2">
					        					<div class="col-md-8 text-right">
					        						<span>Peso estable</span>
					        					</div>
					        					<div class="col-md-4">
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="999.99" name="peso_estable" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->Peso_Estable)){!! 'value="'.$historia_clinica->ante_nutricionales->Peso_Estable.'"' !!}@endif @endisset>
					        					</div>
					        				</div>
					        				<div class="row align-items-center mt-2">
					        					<div class="col-md-8 text-right">
					        						<span>Reducción</span>
					        					</div>
					        					<div class="col-md-4">
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="999.99" name="reduccion" @isset ($historia_clinica)@if (isset($historia_clinica->ante_nutricionales->Reduccion)){!! 'value="'.$historia_clinica->ante_nutricionales->Reduccion.'"' !!}@endif @endisset>
					        					</div>
					        				</div>
					        			</div>
					        		</div>
					      		</div>
					      	</div>
					    </div>

					    <!-- Antecedentes Gineco-Obstetricos  -->

					  	<div class="card">
					  		@php
					  			if(isset($historia_clinica) && $historia_clinica->Sexo == 'M'){
						  			//Antecedentes Gineco-Obstetricos
						  			$dismenorrea = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Dismenorrea);
						  			$mastografia = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Mastografia);
						  			$ultrasonido_mamario = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Ultrasonido_Mamario);
						  			$ultrasonidos = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Numero_Ultrasonidos);
						  			$colposcopia = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Colposcopia_Papanicolaou);
						  		}
					  		@endphp
					    	<div class="card-header" id="headingTwo">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Antecedentes_Gineco-Obstetricos" aria-expanded="false" aria-controls="Antecedentes_Gineco-Obstetricos" id="Antecedentes_Gineco-Obstetricos">
					          			Antecedentes Gineco-Obstétricos
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Antecedentes_Gineco-Obstetricos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      		<div class="card-body">

					        		<div class="row align-items-center mb-2">

					        			<!-- Menarca -->

					        			<div class="col-md-2 text-right">
					        				<span>Menarca</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="menarca" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Menarca)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Menarca.'"' !!}@endif @endisset>
						        		</div>

						        		<!-- Ritmo -->

					        			<div class="col-md-2 text-right">
					        				<span>Ritmo</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="ritmo" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Ritmo)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Ritmo.'"' !!}@endif @endisset>
						        		</div>

						        		<!-- Ult. Menstruación -->

					        			<div class="col-md-2 text-right">
					        				<span>Últ. Menstruación</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="date" name="ult_menstruacion" placeholder="Fecha" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Ult_Menstruacion)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Ult_Menstruacion.'"' !!}@endif @endisset>
						        		</div>
					        		</div>

					        		<div class="row align-items-center mb-2">

					        			<!-- Parejas Sexuales -->

					        			<div class="col-md-2 text-right">
					        				<span>Parejas Sexuales</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="parejas_sexuales" placeholder="Cantidad" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Parejas_Sexuales)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Parejas_Sexuales.'"' !!}@endif @endisset>
						        		</div>

						        		<!-- Dismenorrea -->

					        			<div class="col-md-2 text-right">
					        				<span>Dismenorrea</span>
					        			</div>

					        			<div class="col-md-2 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_dismenorrea" type="radio" name="dismenorrea" value="1" @isset ($dismenorrea)@if ($dismenorrea[0] == 1){{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_dismenorrea">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_dismenorrea" type="radio" name="dismenorrea" value="2" @isset ($dismenorrea)@if ($dismenorrea[0] == 2){{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_dismenorrea">No</label>
						        			</div>
					        			</div>

						        		<!-- Tratamiento -->

					        			<div class="col-md-2 text-right">
					        				<span>Tratamiento</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="tratamiento_dismenorrea" @isset ($historia_clinica)@if (isset($dismenorrea[1])){!! 'value="'.$dismenorrea[1].'"' !!}@endif @endisset>
						        		</div>
					        		</div>

					        		<div class="row align-items-center mb-2">
					        			<!-- Vida sexual activa -->

					        			<div class="col-md-2 text-right">
					        				<span>Vida sexual activa</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="vida_sexual" placeholder="Inicio" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Inicio_Vida_Sexual)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Inicio_Vida_Sexual.'"' !!}@endif @endisset>
						        		</div>

						        		<!-- Embarazos -->

					        			<div class="col-md-2 text-right">
					        				<span>Embarazos</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="embarazos" placeholder="Cantidad" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Embarazos)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Embarazos.'"' !!}@endif @endisset>
						        		</div>

						        		<!-- Partos -->

					        			<div class="col-md-2 text-right">
					        				<span>Partos</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="partos" placeholder="Cantidad" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Partos)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Partos.'"' !!}@endif @endisset>
						        		</div>
					        		</div>

					        		<div class="row align-items-center mb-2">

						        		<!-- Cesáreas -->

					        			<div class="col-md-2 text-right">
					        				<span>Cesáreas</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="cesareas" placeholder="Cantidad" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Cesareas)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Cesareas.'"' !!}@endif @endisset>
						        		</div>

						        		<!-- Abortos -->

					        			<div class="col-md-2 text-right">
					        				<span>Abortos</span>
					        			</div>

					        			<div class="col-md-2">
							        		<input class="form-control form-control-sm" type="text" name="abortos" placeholder="Cantidad" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Abortos)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Abortos.'"' !!}@endif @endisset>
						        		</div>

						        		<!-- Control Natal -->

					        			<div class="col-md-2 text-right">
					        				<span>Control Natal</span>
					        			</div>

					        			<div class="col-md-2 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_control_natal" type="radio" name="control_natal" value="1" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Control_Natal) && $historia_clinica->ante_ginecoObstetricos->Control_Natal == 1){{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_control_natal">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_control_natal" type="radio" name="control_natal" value="2" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Control_Natal) && $historia_clinica->ante_ginecoObstetricos->Control_Natal == 2){{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_control_natal">No</label>
						        			</div>
					        			</div>
					        		</div>

					        		<div class="row align-items-center mb-2">

						        		<!-- Dispareunia -->

					        			<div class="col-md-2 text-right">
					        				<span>Dispareunia</span>
					        			</div>

					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_dispareunia" type="radio" name="dispareunia" value="1" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Dispareunia) && $historia_clinica->ante_ginecoObstetricos->Dispareunia == 1){{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_dispareunia">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_dispareunia" type="radio" name="dispareunia" value="2" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Dispareunia) && $historia_clinica->ante_ginecoObstetricos->Dispareunia == 2){{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_dispareunia">No</label>
						        			</div>
					        			</div>

					        			<!-- Mastografía -->

					        			<div class="col-md-2 text-right">
					        				<span>Mastografía</span>
					        			</div>

					        			<div class="col-md-2 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_mastografia" type="radio" name="mastografia" value="1" @isset ($historia_clinica)@if (isset($mastografia) && $mastografia[0] == 1){{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_mastografia">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_mastografia" type="radio" name="mastografia" value="2" @isset ($historia_clinica)@if (isset($mastografia) && $mastografia[0] == 2){{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_mastografia">No</label>
						        			</div>
					        			</div>

						        		<!-- Fecha -->

					        			<div class="col-md-1 text-right">
					        				<span>Fecha</span>
					        			</div>

					        			<div class="col-md-3">
							        		<input class="form-control form-control-sm" type="text" name="fecha_mastografia" @isset ($historia_clinica)@if (isset($mastografia[1])){!! 'value="'.$mastografia[1].'"' !!}@endif @endisset>
						        		</div>
					        		</div>

					        		<div class="row align-items-center mb-2">

						        		<!-- Ultrasonido Mamario -->

					        			<div class="col-md-2 text-right">
					        				<span>Ultrasonido Mamario</span>
					        			</div>

					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_ultrasonido_mamario" type="radio" name="ultrasonido_mamario" value="1" @isset ($historia_clinica)@if (isset($ultrasonido_mamario) && $ultrasonido_mamario[0] == 1){{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_ultrasonido_mamario">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_ultrasonido_mamario" type="radio" name="ultrasonido_mamario" value="2" @isset ($historia_clinica)@if (isset($ultrasonido_mamario) && $ultrasonido_mamario[0] == 2){{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_ultrasonido_mamario">No</label>
						        			</div>
					        			</div>

					        			<!-- Fecha -->

					        			<div class="col-md-1 text-right">
					        				<span>Fecha</span>
					        			</div>

					        			<div class="col-md-3">
							        		<input class="form-control form-control-sm" type="text" name="fecha_ultrasonido_mamario" @isset ($historia_clinica)@if (isset($ultrasonido_mamario[1])){!! 'value="'.$ultrasonido_mamario[1].'"' !!}@endif @endisset>
						        		</div>

					        			<!-- Auto Exploracion Mamaria -->

					        			<div class="col-md-2 text-right">
					        				<span>Autoexploración Mamaria</span>
					        			</div>

					        			<div class="col-md-2 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_autoexploracion" type="radio" name="autoexploracion" value="1" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Autoexploracion_Mamaria) && $historia_clinica->ante_ginecoObstetricos->Autoexploracion_Mamaria == 1){{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_autoexploracion">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_autoexploracion" type="radio" name="autoexploracion" value="2" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Autoexploracion_Mamaria) && $historia_clinica->ante_ginecoObstetricos->Autoexploracion_Mamaria == 2){{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_autoexploracion">No</label>
						        			</div>
					        			</div>
					        		</div>

					        		<div class="row align-items-center mb-2">

						        		<!-- Numero de Ultrasonidos -->

					        			<div class="col-md-2 text-right">
					        				<span>No. Ultrasonidos</span>
					        			</div>

					        			<div class="col-md-2 text-center">
					        				<input class="form-control form-control-sm" type="text" name="cantidad_ultrasonidos" placeholder="Cantidad" @isset ($historia_clinica)@if (isset($ultrasonidos[0])){!! 'value="'.$ultrasonidos[0].'"' !!}@endif @endisset>
					        			</div>

					        			<!-- Fecha -->

					        			<div class="col-md-1 text-right">
					        				<span>Fecha</span>
					        			</div>

					        			<div class="col-md-3">
							        		<input class="form-control form-control-sm" type="text" name="fecha_ultrasonido" placeholder="Último" @isset ($historia_clinica)@if (isset($ultrasonidos[1])){!! 'value="'.$ultrasonidos[1].'"' !!}@endif @endisset>
						        		</div>

					        			<!-- Resultado -->

					        			<div class="col-md-1 p-0 text-right">
					        				<span>Resultado</span>
					        			</div>

					        			<div class="col-md-3 text-center">
					        				<input class="form-control form-control-sm" type="text" name="resultado_ultrasonido" @isset ($historia_clinica)@if (isset($ultrasonidos[2])){!! 'value="'.$ultrasonidos[2].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center mb-2">

						        		<!-- Colposcopia Papanicolaou -->

					        			<div class="col-md-2 text-right">
					        				<span>Colposcopía y Papanicolaou</span>
					        			</div>

					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_colposcopia" type="radio" name="colposcopia" value="1" @isset ($historia_clinica)@if (isset($colposcopia) && $colposcopia[0] == 1) {{ 'checked' }}@endif @endisset>
					        					<label class="form-check-label" for="si_colposcopia">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_colposcopia" type="radio" name="colposcopia" value="2" @isset ($historia_clinica)@if (isset($colposcopia) && $colposcopia[0] == 2) {{ 'checked' }}@endif @endisset>
						        				<label class="form-check-label" for="no_colposcopia">No</label>
						        			</div>
					        			</div>

					        			<!-- Fecha -->

					        			<div class="col-md-1 text-right">
					        				<span>Fecha</span>
					        			</div>

					        			<div class="col-md-3">
							        		<input class="form-control form-control-sm" type="text" name="fecha_colposcopia" @isset ($historia_clinica)@if (isset($colposcopia[1])){!! 'value="'.$colposcopia[1].'"' !!}@endif @endisset>
						        		</div>

					        			<!-- Resultado -->

					        			<div class="col-md-1 p-0 text-right">
					        				<span>Resultado</span>
					        			</div>

					        			<div class="col-md-3 text-center">
					        				<input class="form-control form-control-sm" type="text" name="resultado_colposcopia" @isset ($historia_clinica)@if (isset($colposcopia[2])){!! 'value="'.$colposcopia[2].'"' !!}@endif @endisset>
					        			</div>
					        		</div>

					        		<div class="row align-items-center">
					        			<div class="col-md-3 text-right">
					        				<span>Tipo de Planificación Familiar</span>
					        			</div>
					        			<div class="col-md-9">
					        				<input class="form-control form-control-sm" type="text" name="tipo_planificacion" @isset ($historia_clinica)@if (isset($historia_clinica->ante_ginecoObstetricos->Planificacion_Familiar)){!! 'value="'.$historia_clinica->ante_ginecoObstetricos->Planificacion_Familiar.'"' !!}@endif @endisset>
					        			</div>
					        		</div>
					      		</div>
					      	</div>
					    </div>

					    <!-- Diagnóstico y Comentarios -->

					  	<div class="card">
					    	<div class="card-header" id="headingTwo">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Informacion_Adicional" aria-expanded="false" aria-controls="Informacion_Adicional">
					          			Información Adicional
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Informacion_Adicional" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      		<div class="card-body">
					      			<div class="row align-items-center">
					      				<div class="col-md-12">
					      					<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Padecimiento Actual</span>
											  	</div>
											  	<textarea style="max-width: 100%; min-height: 31px; max-height: 100px; height: 100px" name="padecimiento_actual" class="form-control">@isset ($historia_clinica)@if (isset($historia_clinica->Padecimiento_Actual)){!! $historia_clinica->Padecimiento_Actual !!}@endif @endisset</textarea>
											</div>
					      				</div>

					      				<div class="col-md-12">
					      					<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Diagnósticos</span>
											  	</div>
											  	<textarea style="max-width: 100%; min-height: 31px; max-height: 150px; height: 150px" name="diagnostico" class="form-control">@isset($historia_clinica)@if(isset($historia_clinica->Diagnosticos)){!! $historia_clinica->Diagnosticos !!}@endif @endisset</textarea>
											</div>
					      				</div>

					      				<div class="col-md-12">
					      					<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Comentarios</span>
											  	</div>
											  	<textarea style="max-width: 100%; min-height: 31px; max-height: 150px; height: 150px" name="comentarios" class="form-control">@isset ($historia_clinica)@if (isset($historia_clinica->Comentarios)){!! $historia_clinica->Comentarios !!}@endif @endisset</textarea>
											</div>
					      				</div>
					      			</div>
					      		</div>
					      	</div>
					    </div>

					    <!-- Archivos (Labs., Exam., etc.) -->

					    <div class="card">

					    	@php
					    		if(isset($historia_clinica)){
					    			$documentos = CleanRowDB::limpiar($historia_clinica->Documentacion);
					    		}
					    	@endphp	
					    	<div class="card-header" id="headingTwo">
					      		<h2 class="mb-0">
					        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Archivos" aria-expanded="false" aria-controls="Archivos">
					          			Archivos (Laboratorios, Exámenes, etc.)
					        		</button>
					      		</h2>
					    	</div>
					    	<div id="Archivos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      		<div class="card-body">
					      			<div class="row">
					      				<div class="col-md-4 text-center">
					      					<h5>Documentación Almacenada</h5><br>
					      					@if(session('file_deleted'))
											    <div class="alert alert-success">
											        {!! session('file_deleted') !!}
											    </div>
											@elseif(session('file_no_deleted'))
												<div class="alert alert-danger">
											        {!! session('file_no_deleted') !!}
											    </div>
											@endif
					      					<ul class="list-unstyled text-left">
					      						@if (isset($historia_clinica) && isset($documentos))
					      							@foreach ($documentos as $doc)
					      								<li><a href="{{ url('download/'.$doc) }}"><i class="far fa-file-alt"></i> {{ $doc }}</a> - <a href="{{ route('historia_clinica.delete_file', ['file' => $doc, 'id' => $historia_clinica->Id_Historia_Clinica]) }}" ><i class="far fa-times-circle" style="color: red"></i></a></li>
					      							@endforeach
					      						@endif
											</ul>
											@if ($historia_clinica->Documentacion != null)
												<a href="{{ route('historia_clinica.delete_file', ['file' => 'all', 'id' => $historia_clinica->Id_Historia_Clinica]) }}"><i class="far fa-times-circle" style="color: red"></i> Borrar todos los archivos</a>
											@endif
					      				</div>
					      				<div class="col-md-6 offset-sm-2">
					      					@if(count(CleanRowDB::limpiar($historia_clinica->Documentacion)) < 10)
					      						<input id="input-id" type="file" name="archivos[]" class="file" data-preview-file-type="text" multiple>
					      					@else
					      						<input id="input-id" type="file" name="archivos[]" class="file" data-preview-file-type="text" multiple disabled>
					      					@endif
					      				</div>
					      			</div>
					      		</div>
					      	</div>
					    </div>

					    <div class="row justify-content-center mt-4">
					    	<div class="col-md-3">
					    		@if (isset($historia_clinica))
					    			<input type="submit" class="btn btn-block btn-success" value="Modificar Historia Clínica">
					    		@else
					    			<input type="submit" class="btn btn-block btn-success" value="Generar Historia Clínica">
					    		@endif
					    	</div>
					    	</form>
					    	@isset ($historia_clinica)
					    	<form method="post" action="{!! action('HistoriasClinicasController@destroy', $historia_clinica->Id_Historia_Clinica) !!}">
    							{!! csrf_field() !!}
						    	<div class="col-md-12">
						    		<button type="submit" class="btn btn-block btn-danger"> Eliminar Historia Clínica</button>
						    	</div>
						    </form>
					    	@endisset
					    </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- To file uploader -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/piexif.min.js" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
        This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/sortable.min.js" type="text/javascript"></script>
    <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
        HTML files. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/fileinput.min.js"></script>
    <!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/themes/fa/theme.js"></script>
    <!-- optionally if you need translation for your language then include  locale file as mentioned below -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/locales/(lang).js"></script>

<script>
	$(function () {
  		$('[data-toggle="popover"]').popover()
	});	

	if($('#hombre').is(':checked')){
		$('#Antecedentes_Gineco-Obstetricos').attr('disabled', 'true');
	}
	if($('#mujer').is(':checked')){
		$('#Antecedentes_Gineco-Obstetricos').removeAttr("disabled");
	}

	function Indice_Masa_Corporal(){
		var peso 	 = $('#peso').val();
		var estatura = $('#estatura').val();
		var imc 	 = peso / (estatura*estatura);

		$('#imc').val(imc.toFixed(2));
	}

	$('#hombre').click(function (){
		$('#Antecedentes_Gineco-Obstetricos').attr('disabled', 'true');
	});

	$('#mujer').click(function (){
		$('#Antecedentes_Gineco-Obstetricos').removeAttr("disabled");
	});

	// with plugin options
	$("#input-id").fileinput({
		showUpload: true,
		allowedPreviewTypes: true,
		maxFileCount: 10,
		maxFileSize: 10240,
        allowedFileExtensions: ['pdf', 'docx', 'doc', 'jpg', 'png'],
        hideThumbnailContent: true,
        showPreview: true,
        showUpload: false,
        msgProgress: '{files} archivos seleccionados',
        showRemove: true,
        dropZoneTitle: 'Arrastra hasta aquí, tus archivos',
        previewZoomButtonIcons: {
        	    prev: '<i class="fas fa-chevron-left"></i>',
			    next: '<i class="fas fa-chevron-right"></i>',
			    toggleheader: '<i class="fas fa-arrows-alt-v"></i>',
			    fullscreen: '<i class="fas fa-expand-arrows-alt"></i>',
			    borderless: '<i class="fas fa-expand"></i>',
			    close: '<i class="fas fa-times"></i>'
        }
	});

</script>