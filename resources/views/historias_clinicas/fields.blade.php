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
					        				<a tabindex="0" id="Datos_Personales_Popover" role="button" data-toggle="popover" data-trigger="focus" title="Datos Personales" data-content="Los campos inhabilitados se llenan automaticamente.">
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
					        					<input class="form-check-input" id="si_corazon_padre_vivo" type="radio" name="corazon" value="1">
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