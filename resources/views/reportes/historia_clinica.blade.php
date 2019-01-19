@isset ($historia_clinica)
@php
	//FECHA LOCAL
    date_default_timezone_set('America/Monterrey'); 
    setlocale(LC_TIME, 'spanish');
@endphp
<!DOCTYPE html>
<html>
<head>
	<title>Historia Clínica • {{ $historia_clinica->paciente->Nombre.' '.$historia_clinica->paciente->Ap_Paterno.' '.$historia_clinica->paciente->Ap_Materno }}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<style type="text/css">
		*{
			font-family: verdana;
		}

		table{
			width: 99%;
		}

		.page-break {
		    page-break-after: always;
		}

		.centrar{
			text-align: center;
		}

		table, td, tr, th{
			border: 1px solid #8C8C8CFF;
		}

		td{
			padding: 10px;
		}

		th{
			background: #f2f2f2;
			padding: 5px;
			font-family: verdana, arial;
		}

		.sin_borde{
			border: none;
			padding: 5px 15px 5px 15px;
			font-weight: bold;
		}

		span{
			font-style: italic;
			font-weight: normal;
		}

		.texto, tr{
			font-size: 11pt;
		}

	</style>
</head>
@php
	//Antecedentes Familiares
	$diabetes = CleanRowDB::limpiar($historia_clinica->ante_familiares->Diabetes);
	$epilepsia = CleanRowDB::limpiar($historia_clinica->ante_familiares->Epilepsia);
	$hipertension = CleanRowDB::limpiar($historia_clinica->ante_familiares->Hipertension);
	$psiquiatricos = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Psiquiatricos);
	$cancer = CleanRowDB::limpiar($historia_clinica->ante_familiares->Cancer);
	$trombosis = CleanRowDB::limpiar($historia_clinica->ante_familiares->Trom_Embo_Hemo_Cerebrales);
	$corazon = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Corazon);
	$circulacion = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Circulacion);
	$pulmonares = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Pulmonares);
	$obesidad = CleanRowDB::limpiar($historia_clinica->ante_familiares->Obesidad);
	$digestivos = CleanRowDB::limpiar($historia_clinica->ante_familiares->Problemas_Digestivos);

	//Antecedentes Personales
	$ejercicio = CleanRowDB::limpiar($historia_clinica->ante_personales->Ejercicio);
	$fuma = CleanRowDB::limpiar($historia_clinica->ante_personales->Cigarro);
	$alcohol = CleanRowDB::limpiar($historia_clinica->ante_personales->Alcohol);
	$sustancias = CleanRowDB::limpiar($historia_clinica->ante_personales->Sustancias);
	$alergias = CleanRowDB::limpiar($historia_clinica->ante_personales->Alergias);
	$medicamentos = CleanRowDB::limpiar($historia_clinica->ante_personales->Medicamentos);
	$vacunas = CleanRowDB::limpiar($historia_clinica->ante_personales->Vacunas);

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
	$pulmonares_2 = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Pulmonares);
	$depresion = CleanRowDB::limpiar($historia_clinica->ante_medicos->Depresion);
	$corazon_2 = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Corazon);
	$convulsiones = CleanRowDB::limpiar($historia_clinica->ante_medicos->Epilepsia);
	$circulacion_2 = CleanRowDB:: limpiar($historia_clinica->ante_medicos->Problemas_Circulacion);
	$cancer_2 = CleanRowDB::limpiar($historia_clinica->ante_medicos->Cancer);
	$genitourinarios = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Genitourinarios);
	$transfusiones = CleanRowDB::limpiar($historia_clinica->ante_medicos->Transfusiones);
	$piel = CleanRowDB::limpiar($historia_clinica->ante_medicos->Problemas_Piel);

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
	$medicamentos_2 = CleanRowDB::limpiar($historia_clinica->ante_psicologicos->Medicamentos);

	//Valoración Funcional
	$tipo_apoyo = CleanRowDB::limpiar($historia_clinica->valoracion_funcional->Apoyo_Especial);

	//Antecedentes Nutricionales
	$peso_ult_6_meses = CleanRowDB::limpiar($historia_clinica->ante_nutricionales->Peso_Ult_6_Meses);
	$dieta = CleanRowDB::limpiar($historia_clinica->ante_nutricionales->Dieta_Especial);

	//Antecedentes GinecoObstetricos
	if($historia_clinica->Id_Antecedentes_Gineco_Obstericos != null){
		$dismenorrea = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Dismenorrea);
		$ultrasonido_mamario = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Ultrasonido_Mamario);
		$num_ultrasonidos = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Numero_Ultrasonidos);
		$colposcopia = CleanRowDB::limpiar($historia_clinica->ante_ginecoObstetricos->Colposcopia_Papanicolaou);
	}

	//Archivos Adjuntos
	$documentos = CleanRowDB::limpiar($historia_clinica->Documentacion);
@endphp
<body>
	<table cellspacing="0">
		<tr>
			<td colspan="2" class="centrar"><h3>HISTORIA CLÍNICA GENERAL</h3></td>
			<td rowspan="2" class="centrar">Reg. No.: {{ $historia_clinica->Id_Historia_Clinica }}</td>			
		</tr>
		<tr>
			<td colspan="1" class="centrar">Control de Pacientes</td>
			<td>Fecha: {{strftime("%e/%m/%Y", strtotime($historia_clinica->created_at))}}<br/>
				Hora: {{strftime("%H:%M hr", strtotime($historia_clinica->created_at))}}
			</td>
		</tr>
		<!-- Inicia Datos Personales -->
		<tr>
			<th colspan="3">DATOS PERSONALES</th>
		</tr>
		<tr>
			<td class="sin_borde">Apellido Paterno: <span>{{ $historia_clinica->paciente->Ap_Paterno }}</span></td>
			<td class="sin_borde">Apellido Materno: <span>{{ $historia_clinica->paciente->Ap_Materno }}</span></td>
			<td class="sin_borde">Nombre(s): <span>{{ $historia_clinica->paciente->Nombre }}</span></td>
		</tr>
		<tr>
			<td class="sin_borde">Edad: <span>{{ $historia_clinica->paciente->Edad }}</span></td>
			<td class="sin_borde">Sexo: 
				<span>
					@if ($historia_clinica->Sexo == 'H')
						{{ 'Hombre' }}
					@else
						{{ 'Mujer' }}
					@endif
				</span>
			</td>
			<td class="sin_borde">Fec. Nacimiento: <span>{{ $historia_clinica->Fecha_Nacimiento }}</span></td>
		</tr>
		<tr>
			<td class="sin_borde">Ocupación: <span>{{ $historia_clinica->Ocupacion }}</span></td>
			<td class="sin_borde">Religión: <span>{{ $historia_clinica->Religion }}</span></td>
			<td class="sin_borde">Lug. Nacimiento: <span>{{ $historia_clinica->Lugar_Nacimiento }}</span></td>
		</tr>
		<tr>
			<td colspan="4" class="sin_borde">Dirección: 
				<span>{{ $historia_clinica->paciente->Direccion }}</span></td>
		</tr>
		<tr>
			<td colspan="4" class="sin_borde">Especialistas: 
				@if (isset($citas))
				<span>
					@foreach ($citas as $cita)
						{{$cita->Nombre." ".$cita->Ap_Paterno.","}}  
					@endforeach
				</span>
				@else
					<span>Aún no hay especialistas asignados.</span>
				@endif
			</td>
		</tr>
		<!-- Termina Datos Personales -->

		<!-- Inicia Antecedentes Familiares -->
		<tr>
			<th colspan="3">ANTECEDENTES FAMILIARES</th>
		</tr>
		<tr>
			<td class="sin_borde">Diabetes/<br/>Azúcar Alta: 
				@if ($diabetes[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($diabetes[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($diabetes[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($diabetes[1] != "")
					<span>{{ $diabetes[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
			<td class="sin_borde">Epilepsia: 
				@if ($epilepsia[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($epilepsia[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($epilepsia[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($epilepsia[1] != "")
					<span>{{ $epilepsia[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
			<td class="sin_borde">Hipertensión arterial/<br/>Presión alta: 
				@if ($hipertension[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($hipertension[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($hipertension[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($hipertension[1] != "")
					<span>{{ $hipertension[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Problemas<br/>Psiquiátricos: 
				@if ($psiquiatricos[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($psiquiatricos[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($psiquiatricos[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($psiquiatricos[1] != "")
					<span>{{ $psiquiatricos[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
			<td class="sin_borde">Cáncer: 
				@if ($cancer[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($cancer[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($cancer[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($cancer[1] != "")
					<span>{{ $cancer[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
			<td class="sin_borde">Trombosis,<br/>Embolias, etc.: 
				@if ($trombosis[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($trombosis[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($trombosis[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($trombosis[1] != "")
					<span>{{ $trombosis[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Problemas de<br/>Corazón: 
				@if ($corazon[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($corazon[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($corazon[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($corazon[1] != "")
					<span>{{ $corazon[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
			<td class="sin_borde">Problemas de<br/>Circulación: 
				@if ($circulacion[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($circulacion[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($circulacion[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($circulacion[1] != "")
					<span>{{ $circulacion[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
			<td class="sin_borde">Problemas<br/>Pulmonares: 
				@if ($pulmonares[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($pulmonares[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($pulmonares[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($pulmonares[1] != "")
					<span>{{ $pulmonares[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Padre Vivo: 
				@if ($historia_clinica->ante_familiares->Padre_Vivo == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($historia_clinica->ante_familiares->Padre_Vivo == 2)
					<span>{{ 'No' }}</span>
				@elseif($historia_clinica->ante_familiares->Padre_Vivo == 0)
					<span>{{ 'No sé' }}</span>
				@endif
			</td>
			<td class="sin_borde">Madre Viva: 
				@if ($historia_clinica->ante_familiares->Madre_Viva == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($historia_clinica->ante_familiares->Madre_Viva == 2)
					<span>{{ 'No' }}</span>
				@elseif($historia_clinica->ante_familiares->Madre_Viva == 0)
					<span>{{ 'No sé' }}</span>
				@endif
			</td>
			<td class="sin_borde">Obesidad: 
				@if ($obesidad[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($obesidad[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($obesidad[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($obesidad[1] != "")
					<span>{{ $obesidad[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Problemas<br/>Digestivos: 
				@if ($digestivos[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($digestivos[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($digestivos[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				-
				@if($digestivos[1] != "")
					<span>{{ $digestivos[1] }}</span>
				@else
					<span>Sin parentesco</span>
				@endif
			</td>
			<td colspan="2" class="sin_borde">Otras: 
				{{$historia_clinica->ante_familiares->Otras}}
			</td>
		</tr>
		<!-- Termina Antecedentes Familiares -->

		<!-- Inicia Antecedentes Personales -->
		<tr>
			<th colspan="3">ANTECEDENTES PERSONALES</th>
		</tr>
		<tr>
			<td class="sin_borde">¿Realiza ejercicio? 
				@if ($ejercicio[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($ejercicio[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($ejercicio[1] != "")
					- <span>{{ $ejercicio[1] }}</span>
				@endif
				@if ($ejercicio[2] != "")
					- <span>{{ $ejercicio[2] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">¿Fuma o ha fumado? 
				@if ($fuma[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($fuma[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($fuma[1] != "")
					- <span>{{ $fuma[1] }} por día</span>
				@endif
				@if ($fuma[2] != "")
					- desde <span>{{ $fuma[2] }}</span>
				@endif
				@if ($fuma[3] != "")
					- hasta <span>{{ $fuma[3] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">¿Ingiere bebidas alcohólicas? 
				@if ($alcohol[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($alcohol[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($alcohol[1] != "")
					- <span>{{ $alcohol[1] }}</span>
				@endif
				@if ($alcohol[2] != "")
					- desde <span>{{ $alcohol[2] }}</span>
				@endif
				@if ($alcohol[3] != "")
					- hasta <span>{{ $alcohol[3] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">¿Utiliza otras sustancias? 
				@if ($sustancias[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($sustancias[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($sustancias[1] != "")
					- <span>{{ $sustancias[1] }}</span>
				@endif
				@if ($sustancias[2] != "")
					- desde <span>{{ $sustancias[2] }}</span>
				@endif
				@if ($sustancias[3] != "")
					- hasta <span>{{ $sustancias[3] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">¿Alergias? 
				@if ($alergias[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($alergias[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($alergias[1] != "")
					- <span>{{ $alergias[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">¿Toma Medicamentos? 
				@if ($medicamentos[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($medicamentos[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($medicamentos[1] != "")
					- <span>{{ $medicamentos[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">¿Vacunas? 
				@if ($vacunas[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($vacunas[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($vacunas[1] != "")
					- <span>{{ $vacunas[1] }}</span>
				@endif
			</td>
		</tr>
		<!-- Termina Antecedentes Personales -->

		<!-- Inicia Antecdentes Médicos -->
		<tr>
			<th colspan="3">ANTECEDENTES MÉDICOS</th>
		</tr>
		<tr>
			<td class="sin_borde">Diabetes/<br/>Azúcar Alta: 
				@if ($diabetes_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($diabetes_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($diabetes_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($diabetes_2[1] != "")
					- <span>{{ $diabetes_2[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Hipertensión<br/>Arterial: 
				@if ($hipertension_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($hipertension_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($hipertension_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($hipertension_2[1] != "")
					- <span>{{ $hipertension_2[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Tiroides: 
				@if ($tiroides[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($tiroides[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($tiroides[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($tiroides[1] != "")
					- <span>{{ $tiroides[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Migraña: 
				@if ($migrania[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($migrania[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($migrania[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($migrania[1] != "")
					- <span>{{ $migrania[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Problemas<br/>Gastrointestinales: 
				@if ($gastrointestinales[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($gastrointestinales[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($gastrointestinales[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($gastrointestinales[1] != "")
					- <span>{{ $gastrointestinales[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Fractura: 
				@if ($fractura[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($fractura[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($fractura[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($fractura[1] != "")
					- <span>{{ $fractura[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Problemas de<br/>Hígado: 
				@if ($higado[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($higado[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($higado[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($higado[1] != "")
					- <span>{{ $higado[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Enfermedades<br/>reumáticas: 
				@if ($reumas[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($reumas[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($reumas[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($reumas[1] != "")
					- <span>{{ $reumas[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Problemas de<br/>vesícula: 
				@if ($vesicula[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($vesicula[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($vesicula[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($vesicula[1] != "")
					- <span>{{ $vesicula[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Nerviosismo/<br/>Ansiedad: 
				@if ($nerviosismo[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($nerviosismo[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($nerviosismo[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($nerviosismo[1] != "")
					- <span>{{ $nerviosismo[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Problemas<br/>Pulmonares: 
				@if ($pulmonares_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($pulmonares_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($pulmonares_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($pulmonares_2[1] != "")
					- <span>{{ $pulmonares_2[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Depresión: 
				@if ($depresion[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($depresion[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($depresion[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($depresion[1] != "")
					- <span>{{ $depresion[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Enfermedades del<br/>Corazón: 
				@if ($corazon_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($corazon_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($corazon_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($corazon_2[1] != "")
					- <span>{{ $corazon_2[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Convulsiones/<br/>Epilepsia: 
				@if ($convulsiones[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($convulsiones[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($convulsiones[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($convulsiones[1] != "")
					- <span>{{ $convulsiones[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Problemas de<br/>Circulación: 
				@if ($circulacion_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($circulacion_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($circulacion_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($circulacion_2[1] != "")
					- <span>{{ $circulacion_2[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Cáncer/<br/>Tumores: 
				@if ($cancer_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($cancer_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($cancer_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($cancer_2[1] != "")
					- <span>{{ $cancer_2[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Problemas/<br/>Genitourinarios: 
				@if ($genitourinarios[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($genitourinarios[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($genitourinarios[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($genitourinarios[1] != "")
					- <span>{{ $genitourinarios[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Transfusiones: 
				@if ($transfusiones[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($transfusiones[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($transfusiones[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($transfusiones[1] != "")
					- <span>{{ $transfusiones[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Enfermedades de<br/>la piel: 
				@if ($piel[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($piel[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($piel[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($piel[1] != "")
					- <span>{{ $piel[1] }}</span>
				@endif
			</td>
			<td colspan="2" class="sin_borde">Otras: 
				@if($historia_clinica->ante_medicos->Otras != "")
					- <span>{{ $diabetes_2[1] }}</span>
				@endif
			</td>
		</tr>
		<!-- Termina Antecedentes Médicos -->

		<!-- Inicia Antecedentes Psicológicos -->
		<tr>
			<th colspan="3">ANTECEDENTES PSICOLÓGICOS</th>
		</tr>
		<tr>
			<td class="sin_borde">Nerviosismo<br/>Acentuado: 
				@if ($nerviosismo_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($nerviosismo_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($nerviosismo_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($nerviosismo_2[1] != "")
					- <span>{{ $nerviosismo_2[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Alteraciones en<br/>el equilibrio: 
				@if ($equilibrio[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($equilibrio[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($equilibrio[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($equilibrio[1] != "")
					- <span>{{ $equilibrio[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Depresión: 
				@if ($depresion_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($depresion_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($depresion_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($depresion_2[1] != "")
					- <span>{{ $depresion_2[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Dificultad para<br/>hablar: 
				@if ($habla[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($habla[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($habla[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($habla[1] != "")
					- <span>{{ $habla[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Dificultad para<br/>concentrarse: 
				@if ($concentracion[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($concentracion[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($concentracion[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($concentracion[1] != "")
					- <span>{{ $concentracion[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Dificultad para<br/>dormir: 
				@if ($dormir[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($dormir[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($dormir[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($dormir[1] != "")
					- <span>{{ $dormir[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td class="sin_borde">Dolores de<br/>cabeza: 
				@if ($cabeza[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($cabeza[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($cabeza[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($cabeza[1] != "")
					- <span>{{ $cabeza[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Mareos: 
				@if ($mareos[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($mareos[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($mareos[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($mareos[1] != "")
					- <span>{{ $mareos[1] }}</span>
				@endif
			</td>
			<td class="sin_borde">Desmayos: 
				@if ($desmayos[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($desmayos[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($desmayos[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($desmayos[1] != "")
					- <span>{{ $desmayos[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td colspan="3" class="sin_borde">Medicamentos para dormir: 
				@if ($medicamentos_2[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($medicamentos_2[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($medicamentos_2[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($medicamentos_2[1] != "")
					- <span>{{ $medicamentos_2[1] }}</span>
				@endif
			</td>
		</tr>
		<!-- Termina Antecedentes Psicológicos -->

		<!-- Inicia Valoración Funcional -->
		<tr>
			<th colspan="3">VALORACIÓN FUNCIONAL</th>
		</tr>
		<tr>
			<td colspan="3" class="sin_borde">¿Tiene alguna capacidad diferente que requiere apoyo especial?
				@if ($historia_clinica->valoracion_funcional->Capacidad_Diferente == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($historia_clinica->valoracion_funcional->Capacidad_Diferente == 2)
					<span>{{ 'No' }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td colspan="3" class="sin_borde">¿Qué tipo de apoyo requiere? 
				@if ($tipo_apoyo[0] == 1)
					<span>{{ 'Auditivo' }},</span>
				@endif
				@if($tipo_apoyo[1] == 2)
					<span>{{ 'Motor' }},</span>
				@endif
				@if($tipo_apoyo[2] == 3)
					<span>{{ 'Visual' }},</span>
				@endif
				@if($tipo_apoyo[3] == 4)
					<span>{{ 'Idioma' }},</span>
				@endif
				@if($tipo_apoyo[4] != "")
					<span>{{ $tipo_apoyo[4] }}</span>
				@endif
			</td>
		</tr>
		<!-- Termina Valoración Funcional -->

		<!-- Inicia Antecedentes Nutricionales -->
		<tr>
			<th colspan="3">ANTECEDENTES NUTRICIONALES</th>
		</tr>
		<tr>
			<td class="sin_borde">Peso: 
				<span>{{ $historia_clinica->ante_nutricionales->Peso }} Kg</span>
			</td>
			<td class="sin_borde">Estatura:
				<span>{{ $historia_clinica->ante_nutricionales->Estatura }} m</span>
			</td>
			<td class="sin_borde">Percentil:
				<span>{{ $historia_clinica->ante_nutricionales->Percentil }}</span>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="sin_borde">¿Ha subido o bajado de peso en los últ. 6 meses? 
				@if ($peso_ult_6_meses[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($peso_ult_6_meses[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($peso_ult_6_meses[1] != "")
					- <span>{{ $peso_ult_6_meses[1] }} Kg</span>
				@endif
			</td>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="sin_borde">¿Por qué? 
				@if($peso_ult_6_meses[2] != "")
					<span>{{ $peso_ult_6_meses[2] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td colspan="2" class="sin_borde">Índice de Masa Corporal:
				<span>{{ $historia_clinica->ante_nutricionales->IMC }} %</span>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="sin_borde">Dieta especial: 
				@if ($dieta[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($dieta[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($dieta[1] != "")
					- <span>{{ $dieta[1] }}</span>
				@endif
			</td>
		</tr>
		<tr>
			<td colspan="3" class="sin_borde"><span>- Modificación de Peso Corporal: </span></td>
		</tr>
		<tr>
			<td colspan="2" class="sin_borde">Pérdida Global últ. 6 meses: 
				<span>{{ $historia_clinica->ante_nutricionales->Peso_Perdida_Global }} Kg</span>
			</td>
			<td colspan="2" class="sin_borde">Porcentaje de pérdida: 
				<span>{{ $historia_clinica->ante_nutricionales->Porcentaje_Perdida }} %</span>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="sin_borde"><span>- Cambio en las últimas 2 semanas: </span></td>
		</tr>
		<tr>
			<td class="sin_borde">Aumento: 
				<span>{{ $historia_clinica->ante_nutricionales->Ultimo_Aumento }} Kg</span>
			</td>
			<td class="sin_borde">Peso estable: 
				<span>{{ $historia_clinica->ante_nutricionales->Peso_Estable }} Kg</span>
			</td>
			<td class="sin_borde">Reducción: 
				<span>{{ $historia_clinica->ante_nutricionales->Reduccion }} Kg</span>
			</td>
		</tr>
		<!-- Termina Antecedentes Nutricionales -->

		@if ($historia_clinica->Id_Antecedentes_Gineco_Obstericos != null)
		<!-- Inicia Antecedentes GinecoObstetricos -->
			<tr>
				<th colspan="3">ANTECEDENTES GINECO-OBSTETRICOS</th>
			</tr>
			<tr>
				<td class="sin_borde">Menarca: 
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Menarca }} Kg</span>
				</td>
				<td class="sin_borde">Ritmo: 
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Ritmo }} Kg</span>
				</td>
				<td class="sin_borde">Fecha última<br/>menstruación: 
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Ult_Menstruacion }} Kg</span>
				</td>
			</tr>
			<tr>
				<td class="sin_borde">Parejas sexuales: 
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Parejas_Sexuales }} Kg</span>
				</td>
				<td colspan="2" class="sin_borde">Dismenorrea: 
				@if ($dismenorrea[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($dismenorrea[0] == 2)
					<span>{{ 'No' }}</span>
				@elseif($dismenorrea[0] == 0)
					<span>{{ 'No sé' }}</span>
				@endif
				@if($dismenorrea[1] != "")
					Tratamiento: <span>{{ $dismenorrea[1] }}</span>
				@endif
				</td>
			</tr>
			<tr>
				<td class="sin_borde">Inicio de vida<br/>sexual activa: 
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Inicio_Vida_Sexual }}</span>
				</td>
				<td class="sin_borde">Embarazos: 
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Embarazos }}</span>
				</td>
				<td class="sin_borde">Partos:
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Partos }}</span>
				</td>
			</tr>
			<tr>
				<td class="sin_borde">Cesáreas: 
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Cesareas }}</span>
				</td>
				<td class="sin_borde">
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Abortos }}</span>
				</td>
				<td class="sin_borde">Control natal: 
				@if ($historia_clinica->ante_ginecoObstetricos->Control_Natal == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($historia_clinica->ante_ginecoObstetricos->Control_Natal == 2)
					<span>{{ 'No' }}</span>
				@endif
				</td>
			</tr>
			<tr>
				<td colspan="3" class="sin_borde">Ultrasonido mamario: 
				@if ($ultrasonido_mamario[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($ultrasonido_mamario[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($ultrasonido_mamario[1] != "")
					Fecha: <span>{{ $ultrasonido_mamario[1] }}</span>
				@endif
				</td>
			</tr>
			<tr>
				<td colspan="3" class="sin_borde">Autoexploración Mamaria: 
				@if ($historia_clinica->ante_ginecoObstetricos->Autoexploracion_Mamaria == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($historia_clinica->ante_ginecoObstetricos->Autoexploracion_Mamaria == 2)
					<span>{{ 'No' }}</span>
				@endif
				</td>
			</tr>
			<tr>
				<td colspan="3" class="sin_borde">No. Ultrasonidos: 
				@if ($num_ultrasonidos[0] !="")
					<span>{{ $num_ultrasonidos[0] }}</span>
				@endif
				@if($num_ultrasonidos[1] != "")
					Fecha: <span>{{ $num_ultrasonidos[1] }}</span>
				@endif
				@if ($num_ultrasonidos[2] != "")
					Resultado: <span>{{ $num_ultrasonidos[1] }}</span>
				@endif
				</td>
			<tr>
				<td colspan="3" class="sin_borde">Colposcopia y Papanicolaou: 
				@if ($colposcopia[0] == 1)
					<span>{{ 'Sí' }}</span>
				@elseif($colposcopia[0] == 2)
					<span>{{ 'No' }}</span>
				@endif
				@if($colposcopia[1] != "")
					Fecha: <span>{{ $colposcopia[1] }}</span>
				@endif
				@if ($colposcopia[2] != "")
					Resultado: <span>{{ $colposcopia[1] }}</span>
				@endif
				</td>
			</tr>
				<td colspan="3" class="sin_borde">Tipo de planificación familiar:
					<span>{{ $historia_clinica->ante_ginecoObstetricos->Planificacion_Familiar }}</span>
				</td>
			</tr>
		<!-- Termina Antecedentes GinecoObstetricos -->
		@endif

		<!-- Inicia Labs. Docs. Diagnosticos. Etc. -->
			<tr>
				<th colspan="3">PADECIMIENTO ACTUAL</th>
			</tr>
			<tr>
				<td colspan="3" class="sin_borde">
					<span>{{ $historia_clinica->Padecimiento_Actual }}</span>
				</td>
			</tr>
			<tr>
				<th colspan="3">DIAGNÓSTICOS</th>
			</tr>
			<tr>
				<td colspan="3" class="sin_borde">
					<span>{{ $historia_clinica->Diagnosticos }}</span>
				</td>
			</tr>
			<tr>
				<th colspan="3">COMENTARIOS</th>
			</tr>
			<tr>
				<td colspan="3" class="sin_borde">
					<span>{{ $historia_clinica->Comentarios }}</span>
				</td>
			</tr>
			<tr>
				<th colspan="3">DOCUMENTOS, LABORATORIOS, ETC.</th>
			</tr>
			<tr>
				<td colspan="3" class="sin_borde">
					<span>- Documentos almacenados: </span><br/><br/>
					@foreach ($documentos as $doc)
						<span>{{ $doc }}</span><br/>
					@endforeach
				</td>
			</tr>
		<!-- Termina Labs. Docs. Diagnosticos. Etc. -->

		<!-- Firmas -->

		<tr>
			<th colspan="3">AUTORIZACIÓN</th>
		</tr>
		<tr>
			<td class="sin_borde centrar" style="padding-top: 100px;">
				<span style="border-top: 1px solid #000;"> Nombre y Firma quien elaboró </span>
			</td>
			<td class="sin_borde centrar" style="padding-top: 100px;">
				<span style="border-top: 1px solid #000;"> Nombre y Firma del informante </span>
			</td>
			<td class="sin_borde centrar" style="padding-top: 100px;">
				<span style="border-top: 1px solid #000;"> Nombre y Firma tratante </span>
			</td>
		</tr>
	</table>
</body>
</html>
@endisset