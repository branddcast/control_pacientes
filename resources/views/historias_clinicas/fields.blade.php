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
                	<div class="row justify-content-end mb-2">
                		<div class="col-md-3 text-right">
                			<span><em>{{strtoupper(strftime("%B %e de %Y", strtotime(date('d-m-Y'))))}}</em></span>
                		</div>
                	</div>
                	
                	<div class="accordion" id="accordionExample">

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
					        					<input class="form-check-input" id="hombre" type="radio" name="sexo" value="hombre">
					        					<label class="form-check-label" for="hombre">Masculino</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="mujer" type="radio" name="sexo" value="mujer">
						        				<label class="form-check-label" for="mujer">Femenino</label>
						        			</div>
					        			</div>
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Ocupación:</span>
											  	</div>
											  	<input type="text" class="form-control form-control-sm" name="ocupacion">
											</div>
					        			</div>
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Religión:</span>
											  	</div>
											  	<input type="text" class="form-control form-control-sm" name="religion">
											</div>
					        			</div>
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Lug. de Nac.:</span>
											  	</div>
											  	<input type="text" class="form-control form-control-sm" name="lugar_nac">
											</div>
					        			</div>
					        		</div>
					        		<div class="row">
					        			<div class="col-md-3">
					        				<div class="input-group mb-3 input-group-sm">
											  	<div class="input-group-prepend">
											    	<span class="input-group-text" id="basic-addon1">Fec. de Nac.:</span>
											  	</div>
											  	<input type="date" class="form-control form-control-sm" name="fec_nac">
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
											  	<textarea style="max-width: 410px; min-height: 31px; max-height: 100px;" class="form-control form-control-sm" name="especialistas" disabled>@foreach ($citas as $especialista)
											  		{{$especialista->Nombre." ".$especialista->Ap_Paterno.", "}}
											  	@endforeach</textarea>
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
					        					<input class="form-check-input" id="si_diabetes" type="radio" name="diabetes" value="1">
					        					<label class="form-check-label" for="si_diabetes">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_diabetes" type="radio" name="diabetes" value="2">
						        				<label class="form-check-label" for="no_diabetes">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_diabetes" type="radio" name="diabetes" value="0">
						        				<label class="form-check-label" for="no_se_diabetes">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="diabetes_parentesco" placeholder="Parentesco">
					        			</div>

					        			<!-- Hipertensión -->

					        			<div class="col-md-2 text-right">
					        				<span>Hipertensión / Presión Alta</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_hipertension" type="radio" name="hipertension" value="1">
					        					<label class="form-check-label" for="si_hipertension">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_hipertension" type="radio" name="hipertension" value="2">
						        				<label class="form-check-label" for="no_hipertension">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_hipertension" type="radio" name="hipertension" value="0">
						        				<label class="form-check-label" for="no_se_hipertension">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="hipertension_parentesco" placeholder="Parentesco">
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Epilepsia -->

					        			<div class="col-md-2 text-right">
					        				<span>Epilepsia</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_epilepsia" type="radio" name="epilepsia" value="1">
					        					<label class="form-check-label" for="si_epilepsia">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_epilepsia" type="radio" name="epilepsia" value="2">
						        				<label class="form-check-label" for="no_epilepsia">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_epilepsia" type="radio" name="epilepsia" value="0">
						        				<label class="form-check-label" for="no_se_epilepsia">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="epilepsia_parentesco" placeholder="Parentesco">
					        			</div>

					        			<!-- Problemas Psiquiatricos -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Psiquiátricos</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_psiquiatrico" type="radio" name="psiquiatrico" value="1">
					        					<label class="form-check-label" for="si_psiquiatrico">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_psiquiatrico" type="radio" name="psiquiatrico" value="2">
						        				<label class="form-check-label" for="no_psiquiatrico">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_psiquiatrico" type="radio" name="psiquiatrico" value="0">
						        				<label class="form-check-label" for="no_se_psiquiatrico">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="psiquiatrico_parentesco" placeholder="Parentesco">
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Cáncer -->

					        			<div class="col-md-2 text-right">
					        				<span>Cáncer</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_cancer" type="radio" name="cancer" value="1">
					        					<label class="form-check-label" for="si_cancer">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_cancer" type="radio" name="cancer" value="2">
						        				<label class="form-check-label" for="no_cancer">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_cancer" type="radio" name="cancer" value="0">
						        				<label class="form-check-label" for="no_se_cancer">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="cancer_parentesco" placeholder="Parentesco">
					        			</div>

					        			<!-- Trombosis, Embolias, etc. -->

					        			<div class="col-md-2 text-right">
					        				<span>Trombosis, Embolias, etc.</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_trombosis" type="radio" name="trombosis" value="1">
					        					<label class="form-check-label" for="si_trombosis">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_trombosis" type="radio" name="trombosis" value="2">
						        				<label class="form-check-label" for="no_trombosis">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_trombosis" type="radio" name="trombosis" value="0">
						        				<label class="form-check-label" for="no_se_trombosis">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="trombosis_parentesco" placeholder="Parentesco">
					        			</div>
					        		</div>
					        		<div class="row align-items-center">

					        			<!-- Problemas de Corazón -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Corazón</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_corazon" type="radio" name="corazon" value="1">
					        					<label class="form-check-label" for="si_corazon">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_corazon" type="radio" name="corazon" value="2">
						        				<label class="form-check-label" for="no_corazon">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_corazon" type="radio" name="corazon" value="0">
						        				<label class="form-check-label" for="no_se_corazon">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="corazon_parentesco" placeholder="Parentesco">
					        			</div>

					        			<!-- Padre vivo -->

					        			<div class="col-md-2 text-right">
					        				<span>Padre Vivo</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_padre_vivo" type="radio" name="padre_vivo" value="1">
					        					<label class="form-check-label" for="si_padre_vivo">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_padre_vivo" type="radio" name="padre_vivo" value="2">
						        				<label class="form-check-label" for="no_padre_vivo">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_padre_vivo" type="radio" name="padre_vivo" value="0">
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
					        					<input class="form-check-input" id="si_circulacion" type="radio" name="circulacion" value="1">
					        					<label class="form-check-label" for="si_circulacion">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_circulacion" type="radio" name="circulacion" value="2">
						        				<label class="form-check-label" for="no_circulacion">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_circulacion" type="radio" name="circulacion" value="0">
						        				<label class="form-check-label" for="no_se_circulacion">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="circulacion_parentesco" placeholder="Parentesco">
					        			</div>

					        			<!-- Madre viva -->

					        			<div class="col-md-2 text-right">
					        				<span>Madre Viva</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_madre_viva" type="radio" name="madre_viva" value="1">
					        					<label class="form-check-label" for="si_madre_viva">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_madre_viva" type="radio" name="madre_viva" value="2">
						        				<label class="form-check-label" for="no_madre_viva">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_madre_viva" type="radio" name="madre_viva" value="0">
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
					        					<input class="form-check-input" id="si_pulmonares" type="radio" name="pulmonares" value="1">
					        					<label class="form-check-label" for="si_pulmonares">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_pulmonares" type="radio" name="pulmonares" value="2">
						        				<label class="form-check-label" for="no_pulmonares">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_pulmonares" type="radio" name="pulmonares" value="0">
						        				<label class="form-check-label" for="no_se_pulmonares">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="pulmonares_parentesco" placeholder="Parentesco">
					        			</div>

					        			<!-- Obesidad -->

					        			<div class="col-md-2 text-right">
					        				<span>Obesidad</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_obesidad" type="radio" name="obesidad" value="1">
					        					<label class="form-check-label" for="si_obesidad">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_obesidad" type="radio" name="obesidad" value="2">
						        				<label class="form-check-label" for="no_obesidad">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_obesidad" type="radio" name="obesidad" value="0">
						        				<label class="form-check-label" for="no_se_obesidad">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="obesidad_parentesco" placeholder="Parentesco">
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">

					        			<!-- Problemas Digestivo -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Digestivo</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_digestivo" type="radio" name="digestivo" value="1">
					        					<label class="form-check-label" for="si_digestivo">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_digestivo" type="radio" name="digestivo" value="2">
						        				<label class="form-check-label" for="no_digestivo">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_digestivo" type="radio" name="digestivo" value="0">
						        				<label class="form-check-label" for="no_se_digestivo">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="digestivo_parentesco" placeholder="Parentesco">
					        			</div>

					        			<!-- Otras -->

					        			<div class="col-md-2 text-right">
					        				<span>Otras</span>
					        			</div>
					        			<div class="col-md-4 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="otras">
					        			</div>
					        		</div>
					      		</div>
					    	</div>
						</div>

						<!-- Antecedentes Personales -->

						<div class="card">
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
					        					<input class="form-check-input" id="si_ejercicio" type="radio" name="ejercicio" value="1">
					        					<label class="form-check-label" for="si_ejercicio">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_ejercicio" type="radio" name="ejercicio" value="2">
						        				<label class="form-check-label" for="no_ejercicio">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>Tipo</span>
					        			</div>
					        			<div class="col-md-3 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="ejercicio_tipo">
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>Frecuencia</span>
					        			</div>
					        			<div class="col-md-3 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="ejercicio_frecuencia">
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Fuma o ha fumado? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Fuma o ha fumado?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_fuma" type="radio" name="fuma" value="1">
					        					<label class="form-check-label" for="si_fuma">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_fuma" type="radio" name="fuma" value="2">
						        				<label class="form-check-label" for="no_fuma">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿Por Día?</span>
					        			</div>
					        			<div class="col-md-1 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="fuma_por_dia" placeholder="Cantidad">
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>¿Desde?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="fuma_desde">
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>Hasta?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="fuma_hasta" placeholder="Suspendido hace...">
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Bebe Alcohol? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Bebe Alcohol?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_alcohol" type="radio" name="alcohol" value="1">
					        					<label class="form-check-label" for="si_alcohol">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_alcohol" type="radio" name="alcohol" value="2">
						        				<label class="form-check-label" for="no_alcohol">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>Tipo</span>
					        			</div>
					        			<div class="col-md-1 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="alcohol_tipo">
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>¿Desde?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="alcohol_desde">
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>Hasta?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="alcohol_hasta" placeholder="Suspendido hace...">
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Otras Sustancias? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Otras Sustancias?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_sustancias" type="radio" name="sustancias" value="1">
					        					<label class="form-check-label" for="si_sustancias">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_sustancias" type="radio" name="sustancias" value="2">
						        				<label class="form-check-label" for="no_sustancias">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>Tipo</span>
					        			</div>
					        			<div class="col-md-1 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="sustancias_tipo">
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>¿Desde?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="sustancias_desde">
					        			</div>
					        			<div class="col-md-1 pl-0 text-right">
					        				<span>Hasta?</span>
					        			</div>
					        			<div class="col-md-2 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="sustancias_hasta" placeholder="Suspendido hace...">
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Alergias? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Alergias?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_alergias" type="radio" name="alergias" value="1">
					        					<label class="form-check-label" for="si_alergias">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_alergias" type="radio" name="alergias" value="2">
						        				<label class="form-check-label" for="no_alergias">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿A qué?</span>
					        			</div>
					        			<div class="col-md-7 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="alergias_descripcion" placeholder="Medicamentos, Alimento, Sustancia...">
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Toma Medicamentos? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Toma Medicamentos?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_medicamentos" type="radio" name="medicamentos" value="1">
					        					<label class="form-check-label" for="si_medicamentos">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_medicamentos" type="radio" name="medicamentos" value="2">
						        				<label class="form-check-label" for="no_medicamentos">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿Cuáles?</span>
					        			</div>
					        			<div class="col-md-7 pl-0">
					        				<textarea class="form-control form-control-sm" style="max-width: 610px; min-height: 31px; max-height: 100px; height: 31px" placeholder="¿Cuáles y Cómo los toma?" name="medicamentos_descripcion"></textarea>
					        			</div>
					        		</div>
					        		<div class="row align-items-center mt-1">
					        			
					        			<!-- ¿Vacunas? -->

					        			<div class="col-md-2 text-right">
					        				<span>¿Vacunas?</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_vacunas" type="radio" name="vacunas" value="1">
					        					<label class="form-check-label" for="si_vacunas">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_vacunas" type="radio" name="vacunas" value="2">
						        				<label class="form-check-label" for="no_vacunas">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿Cuáles?</span>
					        			</div>
					        			<div class="col-md-7 pl-0">
					        				<textarea class="form-control form-control-sm" style="max-width: 610px; min-height: 31px; max-height: 100px; height: 31px" name="vacunas_descripcion"></textarea>
					        			</div>
					        		</div>
					      		</div>
					    	</div>
					  	</div>

					  	<!-- Antecedentes Médicos -->

					  	<div class="card">
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
					        					<input class="form-check-input" id="si_cirugias" type="radio" name="cirugias" value="1">
					        					<label class="form-check-label" for="si_cirugias">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_cirugias" type="radio" name="cirugias" value="2">
						        				<label class="form-check-label" for="no_cirugias">No</label>
						        			</div>
					        			</div>
					        			<div class="col-md-1 text-right">
					        				<span>¿Cuáles?</span>
					        			</div>
					        			<div class="col-md-7 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="cirugias_descripcion" placeholder="Describa las cirugías previas...">
					        			</div>
					      			</div>

					        		<div class="row align-items-center">

					        			<!-- Diabetes -->

					        			<div class="col-md-2 text-right">
					        				<span>Diabetes / Azucar Alta</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_diabetes_2" type="radio" name="diabetes_2" value="1">
					        					<label class="form-check-label" for="si_diabetes_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_diabetes_2" type="radio" name="diabetes_2" value="2">
						        				<label class="form-check-label" for="no_diabetes_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_diabetes_2" type="radio" name="diabetes_2" value="0">
						        				<label class="form-check-label" for="no_se_diabetes_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="diabetes_2_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Hipertensión -->

					        			<div class="col-md-2 text-right">
					        				<span>Hipertensión / Presión Alta</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_hipertension_2" type="radio" name="hipertension_2" value="1">
					        					<label class="form-check-label" for="si_hipertension_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_hipertension_2" type="radio" name="hipertension_2" value="2">
						        				<label class="form-check-label" for="no_hipertension_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_hipertension_2" type="radio" name="hipertension_2" value="0">
						        				<label class="form-check-label" for="no_se_hipertension_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="hipertension_2_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas de Tiroides -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Tiroides</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_tiroides" type="radio" name="tiroides" value="1">
					        					<label class="form-check-label" for="si_tiroides">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_tiroides" type="radio" name="tiroides" value="2">
						        				<label class="form-check-label" for="no_tiroides">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_tiroides" type="radio" name="tiroides" value="0">
						        				<label class="form-check-label" for="no_se_tiroides">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="tiroides_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Migraña -->

					        			<div class="col-md-2 text-right">
					        				<span>Migraña</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_migrania" type="radio" name="migrania" value="1">
					        					<label class="form-check-label" for="si_migrania">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_migrania" type="radio" name="migrania" value="2">
						        				<label class="form-check-label" for="no_migrania">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_migrania" type="radio" name="migrania" value="0">
						        				<label class="form-check-label" for="no_se_migrania">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="migrania_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas Gastrointestinales -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Gastrointestinales</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_gastrointestinales" type="radio" name="gastrointestinales" value="1">
					        					<label class="form-check-label" for="si_gastrointestinales">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_gastrointestinales" type="radio" name="gastrointestinales" value="2">
						        				<label class="form-check-label" for="no_gastrointestinales">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_gastrointestinales" type="radio" name="gastrointestinales" value="0">
						        				<label class="form-check-label" for="no_se_gastrointestinales">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="gastrointestinales_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Fractura -->

					        			<div class="col-md-2 text-right">
					        				<span>Fractura</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_fractura" type="radio" name="fractura" value="1">
					        					<label class="form-check-label" for="si_fractura">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_fractura" type="radio" name="fractura" value="2">
						        				<label class="form-check-label" for="no_fractura">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_fractura" type="radio" name="fractura" value="0">
						        				<label class="form-check-label" for="no_se_fractura">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="fractura_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Dolores de Cabeza -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Hígado</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_higado" type="radio" name="higado" value="1">
					        					<label class="form-check-label" for="si_higado">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_higado" type="radio" name="higado" value="2">
						        				<label class="form-check-label" for="no_higado">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_higado" type="radio" name="higado" value="0">
						        				<label class="form-check-label" for="no_se_higado">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="higado_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Enfermedades Reumáticas -->

					        			<div class="col-md-2 text-right">
					        				<span>Enfermedades Reumáticas</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_reumas" type="radio" name="reumas" value="1">
					        					<label class="form-check-label" for="si_reumas">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_reumas" type="radio" name="reumas" value="2">
						        				<label class="form-check-label" for="no_reumas">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_reumas" type="radio" name="reumas" value="0">
						        				<label class="form-check-label" for="no_se_reumas">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="reumas_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas de Vesícula -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas de Vesícula</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_vesicula" type="radio" name="vesicula" value="1">
					        					<label class="form-check-label" for="si_vesicula">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_vesicula" type="radio" name="vesicula" value="2">
						        				<label class="form-check-label" for="no_vesicula">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_vesicula" type="radio" name="vesicula" value="0">
						        				<label class="form-check-label" for="no_se_vesicula">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="vesicula_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Nerviosismo o Ansiedad -->

					        			<div class="col-md-2 text-right">
					        				<span>Nerviosismo o Ansiedad</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_nerviosismo" type="radio" name="nerviosismo" value="1">
					        					<label class="form-check-label" for="si_nerviosismo">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_nerviosismo" type="radio" name="nerviosismo" value="2">
						        				<label class="form-check-label" for="no_nerviosismo">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_nerviosismo" type="radio" name="nerviosismo" value="0">
						        				<label class="form-check-label" for="no_se_nerviosismo">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="nerviosismo_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas Pulmonares -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Pulmonares</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_pulmonares_2" type="radio" name="pulmonares_2" value="1">
					        					<label class="form-check-label" for="si_pulmonares_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_pulmonares_2" type="radio" name="pulmonares_2" value="2">
						        				<label class="form-check-label" for="no_pulmonares_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_pulmonares_2" type="radio" name="pulmonares_2" value="0">
						        				<label class="form-check-label" for="no_se_pulmonares_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="pulmonares_2_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Depresión -->

					        			<div class="col-md-2 text-right">
					        				<span>Depresión</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_depresion" type="radio" name="depresion" value="1">
					        					<label class="form-check-label" for="si_depresion">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_depresion" type="radio" name="depresion" value="2">
						        				<label class="form-check-label" for="no_depresion">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_depresion" type="radio" name="depresion" value="0">
						        				<label class="form-check-label" for="no_se_depresion">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="depresion_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Enfermedades del Corazón -->

					        			<div class="col-md-2 text-right">
					        				<span>Enfermedades del Corazón</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_corazon_2" type="radio" name="corazon_2" value="1">
					        					<label class="form-check-label" for="si_corazon_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_corazon_2" type="radio" name="corazon_2" value="2">
						        				<label class="form-check-label" for="no_corazon_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_corazon_2" type="radio" name="corazon_2" value="0">
						        				<label class="form-check-label" for="no_se_corazon_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="corazon_2_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Convulsiones o Epilepsia -->

					        			<div class="col-md-2 text-right">
					        				<span>Convulsiones / Epilepsia</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_convulsiones" type="radio" name="convulsiones" value="1">
					        					<label class="form-check-label" for="si_convulsiones">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_convulsiones" type="radio" name="convulsiones" value="2">
						        				<label class="form-check-label" for="no_convulsiones">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_convulsiones" type="radio" name="convulsiones" value="0">
						        				<label class="form-check-label" for="no_se_convulsiones">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="convulsiones_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas de Circulación, Trombosis, Embolias, etc. -->

					        			<div class="col-md-2 text-right">
					        				<span>Trombosis, Embolias / Circulación</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_circulacion_2" type="radio" name="circulacion_2" value="1">
					        					<label class="form-check-label" for="si_circulacion_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_circulacion_2" type="radio" name="circulacion_2" value="2">
						        				<label class="form-check-label" for="no_circulacion_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_circulacion_2" type="radio" name="circulacion_2" value="0">
						        				<label class="form-check-label" for="no_se_circulacion_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="circulacion_2_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Cancer o Tumores -->

					        			<div class="col-md-2 text-right">
					        				<span>Cáncer / Tumores</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_cancer_2" type="radio" name="cancer_2" value="1">
					        					<label class="form-check-label" for="si_cancer_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_cancer_2" type="radio" name="cancer_2" value="2">
						        				<label class="form-check-label" for="no_cancer_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_cancer_2" type="radio" name="cancer_2" value="0">
						        				<label class="form-check-label" for="no_se_cancer_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="cancer_2_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Problemas Genitourinarios -->

					        			<div class="col-md-2 text-right">
					        				<span>Problemas Genitourinarios</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_genitourinarios" type="radio" name="genitourinarios" value="1">
					        					<label class="form-check-label" for="si_genitourinarios">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_genitourinarios" type="radio" name="genitourinarios" value="2">
						        				<label class="form-check-label" for="no_genitourinarios">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_genitourinarios" type="radio" name="genitourinarios" value="0">
						        				<label class="form-check-label" for="no_se_genitourinarios">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="genitourinarios_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Transfusiones -->

					        			<div class="col-md-2 text-right">
					        				<span>Transfusiones</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_transfusiones" type="radio" name="transfusiones" value="1">
					        					<label class="form-check-label" for="si_transfusiones">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_transfusiones" type="radio" name="transfusiones" value="2">
						        				<label class="form-check-label" for="no_transfusiones">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_transfusiones" type="radio" name="transfusiones" value="0">
						        				<label class="form-check-label" for="no_se_transfusiones">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="transfusiones_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Enfermedades de la Piel -->

					        			<div class="col-md-2 text-right">
					        				<span>Enfermedades de la Piel</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_piel" type="radio" name="piel" value="1">
					        					<label class="form-check-label" for="si_piel">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_piel" type="radio" name="piel" value="2">
						        				<label class="form-check-label" for="no_piel">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_piel" type="radio" name="piel" value="0">
						        				<label class="form-check-label" for="no_se_piel">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="piel_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Otras -->

					        			<div class="col-md-2 text-right">
					        				<span>Otras</span>
					        			</div>
					        			<div class="col-md-4 pl-0">
					        				<input class="form-control form-control-sm" type="text" name="otras_2">
					        			</div>
					        		</div>
					      		</div>
					    	</div>
						</div>

						<!-- Antecedentes Psicológicos -->

					  	<div class="card">
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
					        					<input class="form-check-input" id="si_nerviosismo_2" type="radio" name="nerviosismo_2" value="1">
					        					<label class="form-check-label" for="si_nerviosismo_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_nerviosismo_2" type="radio" name="nerviosismo_2" value="2">
						        				<label class="form-check-label" for="no_nerviosismo_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_nerviosismo_2" type="radio" name="nerviosismo_2" value="0">
						        				<label class="form-check-label" for="no_se_nerviosismo_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="nerviosismo_2_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- ALteraciones del Equilibrio -->

					        			<div class="col-md-2 text-right">
					        				<span>Alteraciones del Equilibrio</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_equilibrio" type="radio" name="equilibrio" value="1">
					        					<label class="form-check-label" for="si_equilibrio">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_equilibrio" type="radio" name="equilibrio" value="2">
						        				<label class="form-check-label" for="no_equilibrio">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_equilibrio" type="radio" name="equilibrio" value="0">
						        				<label class="form-check-label" for="no_se_equilibrio">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="equilibrio_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Tendencia a la Depresión -->

					        			<div class="col-md-2 text-right">
					        				<span>Tendencia a la Depresión</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_depresion_2" type="radio" name="depresion_2" value="1">
					        					<label class="form-check-label" for="si_depresion_2">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_depresion_2" type="radio" name="depresion_2" value="2">
						        				<label class="form-check-label" for="no_depresion_2">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_depresion_2" type="radio" name="depresion_2" value="0">
						        				<label class="form-check-label" for="no_se_depresion_2">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="depresion_2_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Dificultad para Hablar -->

					        			<div class="col-md-2 text-right">
					        				<span>Dificultad para hablar</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_habla" type="radio" name="habla" value="1">
					        					<label class="form-check-label" for="si_habla">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_habla" type="radio" name="habla" value="2">
						        				<label class="form-check-label" for="no_habla">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_habla" type="radio" name="habla" value="0">
						        				<label class="form-check-label" for="no_se_habla">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="habla_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Dificultad para Concentrarse -->

					        			<div class="col-md-2 text-right">
					        				<span>Dificultad para Concentrarse</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_concentracion" type="radio" name="concentracion" value="1">
					        					<label class="form-check-label" for="si_concentracion">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_concentracion" type="radio" name="concentracion" value="2">
						        				<label class="form-check-label" for="no_concentracion">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_concentracion" type="radio" name="concentracion" value="0">
						        				<label class="form-check-label" for="no_se_concentracion">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="concentracion_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Dificultad para dormir -->

					        			<div class="col-md-2 text-right">
					        				<span>Dificultad para dormir</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_dormir" type="radio" name="dormir" value="1">
					        					<label class="form-check-label" for="si_dormir">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_dormir" type="radio" name="dormir" value="2">
						        				<label class="form-check-label" for="no_dormir">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_dormir" type="radio" name="dormir" value="0">
						        				<label class="form-check-label" for="no_se_dormir">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="dormir_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Dolores de Cabeza -->

					        			<div class="col-md-2 text-right">
					        				<span>Dolores de Cabeza</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_cabeza" type="radio" name="cabeza" value="1">
					        					<label class="form-check-label" for="si_cabeza">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_cabeza" type="radio" name="cabeza" value="2">
						        				<label class="form-check-label" for="no_cabeza">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_cabeza" type="radio" name="cabeza" value="0">
						        				<label class="form-check-label" for="no_se_cabeza">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="cabeza_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Mareos -->

					        			<div class="col-md-2 text-right">
					        				<span>Mareos</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_mareos" type="radio" name="mareos" value="1">
					        					<label class="form-check-label" for="si_mareos">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_mareos" type="radio" name="mareos" value="2">
						        				<label class="form-check-label" for="no_mareos">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_mareos" type="radio" name="mareos" value="0">
						        				<label class="form-check-label" for="no_se_mareos">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="mareos_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					        		<div class="row align-items-center">

					        			<!-- Desmayos -->

					        			<div class="col-md-2 text-right">
					        				<span>Desmayos</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_desmayos" type="radio" name="desmayos" value="1">
					        					<label class="form-check-label" for="si_desmayos">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_desmayos" type="radio" name="desmayos" value="2">
						        				<label class="form-check-label" for="no_desmayos">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_desmayos" type="radio" name="desmayos" value="0">
						        				<label class="form-check-label" for="no_se_desmayos">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="desmayos_desde" placeholder="¿Desde Cuándo?">
					        			</div>

					        			<!-- Medicamentos o Antidepresivos -->

					        			<div class="col-md-2 text-right">
					        				<span>Medicina p/dormir o Antidepresivos</span>
					        			</div>
					        			<div class="col-md-2 p-0  text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_antidepresivos" type="radio" name="antidepresivos" value="1">
					        					<label class="form-check-label" for="si_antidepresivos">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_antidepresivos" type="radio" name="antidepresivos" value="2">
						        				<label class="form-check-label" for="no_antidepresivos">No</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_se_antidepresivos" type="radio" name="antidepresivos" value="0">
						        				<label class="form-check-label" for="no_se_antidepresivos">No sé</label>
						        			</div>
					        			</div>
					        			<div class="col-md-2">
					        				<input class="form-control form-control-sm" type="text" name="antidepresivos_desde" placeholder="¿Desde Cuándo?">
					        			</div>
					        		</div>

					      		</div>
					    	</div>
						</div>

						<!-- Valoración Funcional -->

					  	<div class="card">
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
					        					<input class="form-check-input" id="si_discapacidad" type="radio" name="discapacidad" value="1">
					        					<label class="form-check-label" for="si_discapacidad">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_discapacidad" type="radio" name="discapacidad" value="2">
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
					        					<input class="form-check-input" id="auditivo" type="checkbox" name="auditivo" value="1">
					        					<label class="form-check-label" for="auditivo">Auditivo</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="motor" type="checkbox" name="motor" value="2">
						        				<label class="form-check-label" for="motor">Motor</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="visual" type="checkbox" name="visual" value="3">
						        				<label class="form-check-label" for="visual">Visual</label>
						        			</div>
						        			<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="idioma" type="checkbox" name="idioma" value="4">
						        				<label class="form-check-label" for="idioma">Idioma</label>
						        			</div>
					        			</div>

					        			<div class="col-md-5">
						        			<div class="row align-items-center">
						        				<!-- Otros -->

							        			<div class="col-md-2 text-right">
							        				<span>otros</span>
							        			</div>
							        			<div class="col-md-10 pl-0">
							        				<input class="form-control form-control-sm" type="text" name="otros_3">
							        			</div>
						        			</div>
						        		</div>
					        		</div>
					      		</div>
					      	</div>
					    </div>

						<!-- Antecedentes Nutricionales -->

					  	<div class="card">
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
					        					<input class=" form-control form-control-sm" type="number" name="peso" id="peso" step=".01" min="0" max="999.99" placeholder="00,00">
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
					        					<input class=" form-control form-control-sm" type="number" name="estatura" id="estatura" step=".01" min="0" max="2.50" placeholder="0,00">
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
					        					<input class=" form-control form-control-sm" type="number" name="percentil" step=".01" min="0" max="100.99" placeholder="0,00">
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
					        					<input class="form-check-input" id="si_aumento" type="radio" name="aumento" value="1">
					        					<label class="form-check-label" for="si_aumento">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_aumento" type="radio" name="aumento" value="2">
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
							        				<input class="form-control form-control-sm" type="text" name="cuanto_aumento">
							        			</div>
						        			</div>
						        		</div>
					        		</div>

					        		<div class="row align-items-center mt-2">
					        			<div class="col-md-2">
					        				<span>¿Por qué?</span>
					        			</div>
					        			<div class="col-md-10 text-left">
					        				<input class="form-control form-control-sm" type="text" name="porque_aumento">
					        			</div>
					        		</div>

					        		<div class="row align-items-center mt-2">
					        			<div class="col-md-4">
					        				<span>Índice de Masa Corporal (Peso/Estatura<sup><small>2</small></sup>)</span>
					        			</div>
					        			<div class="col-md-2 text-left">
					        				<input class="form-control form-control-sm" onfocus="javascript:imc()" onclick="javascript:imc()" type="number" id="imc" name="imc" step=".01" min="0" max="100.00">
					        			</div>

					        			<div class="col-md-1 text-left pt-1">
					        				<a tabindex="0" id="Antecedentes_Nutricionales_Popover" role="button" data-toggle="popover" data-trigger="focus" title="Antecedentes Nutricionales" data-content="El IMC se calcula automáticamente, obteniendo los valores de entrada de los campos de Peso y Estatura.">
					        					<i class="far fa-question-circle fa-lg"></i>
					        				</a>
					        			</div>

					        			<script>
					        				function imc(){
					        					var imc = $('#peso').val()/($('#estatura').val()*$('#estatura').val());

					        					$('#imc').val(imc.toFixed(2));
					        				}
					        			</script>
					        		</div>

					        		<div class="row align-items-center mt-2">

					        			<!-- Dieta especial -->

					        			<div class="col-md-2 text-left">
					        				<span>Dieta Especial</span>
					        			</div>
					        			<div class="col-md-2 p-0 text-center">
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="si_dieta" type="radio" name="dieta" value="1">
					        					<label class="form-check-label" for="si_dieta">Sí</label>
					        				</div>
					        				<div class="form-check form-check-inline">
					        					<input class="form-check-input" id="no_dieta" type="radio" name="dieta" value="2">
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
							        				<input class="form-control form-control-sm" type="text" name="cuanto_aumento">
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
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="99.99" name="perdida_global">
					        					</div>
					        				</div>
					        				<div class="row align-items-center mt-2">
					        					<div class="col-md-8 text-right">
					        						<span>Porcentaje de la pérdida</span>
					        					</div>
					        					<div class="col-md-4">
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="999.99" name="perdida_porcentaje">
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
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="999.99" name="aumento_ultimo">
					        					</div>
					        				</div>
					        				<div class="row align-items-center mt-2">
					        					<div class="col-md-8 text-right">
					        						<span>Peso estable</span>
					        					</div>
					        					<div class="col-md-4">
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="999.99" name="peso_estable">
					        					</div>
					        				</div>
					        				<div class="row align-items-center mt-2">
					        					<div class="col-md-8 text-right">
					        						<span>Reducción</span>
					        					</div>
					        					<div class="col-md-4">
					        						<input class="form-control-sm form-control" type="number" step=".01" min="0" max="999.99" name="reduccion">
					        					</div>
					        				</div>
					        			</div>
					        		</div>
					      		</div>
					      	</div>
					    </div>

					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(function () {
  		$('[data-toggle="popover"]').popover()
	})
</script>