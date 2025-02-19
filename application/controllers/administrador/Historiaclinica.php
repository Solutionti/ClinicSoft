<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historiaclinica extends Admin_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model("Pacientes_model");
		$this->load->model("Historias_model");
		$this->load->model("Generic_model");
		$this->load->model("Doctores_model");
	}

	public function historiasClinicas()
	{
		$documento = $this->uri->segment(3);
		$pacientes = $this->Pacientes_model->getPacienteId($documento);
		$historias = $this->Historias_model->getHistoriasId($documento);
		$especialidades = $this->Historias_model->getatencionid($documento);
		$recetas = $this->Historias_model->getRecetas($documento);
		$docFisico = $this->Historias_model->getDocumentos($documento, "hfisico");
		$docLaboratorios = $this->Historias_model->getDocumentos($documento, "laboratorio");
		$docPatologias = $this->Historias_model->getDocumentos($documento, "patologia");
		$docEcografias = $this->Historias_model->getDocumentos($documento, "ecografias");
		$diagnosticos = $this->Historias_model->getDiagnosticos();
		$procedimientos = $this->Historias_model->getProcedimientos();
		$alergiaMedicas = $this->Historias_model->getalergiasMedicamentos($documento);
		$alergiaotros = $this->Historias_model->getalergiasOtros($documento);
		$medicamentos = $this->Historias_model->getMedicamentos($documento);
		$diagpacientes = $this->Historias_model->getDiagnosticoHistoria($documento);
		$procepacientes = $this->Historias_model->getProcedimientosHistoria($documento);
		$generaliniciadas = $this->Historias_model->consultaIniciadaGeneral($documento);
		$ginecoiniciadas = $this->Historias_model->consultaIniciadaGineco($documento);
		$poscitas = $this->Historias_model->getPosCita($documento);
		$doctores = $this->Doctores_model->getDoctores();
		$data = [
			"paciente" => $pacientes,
			"historia" => $historias,		
			"especialidad" => $especialidades,
			"medicamento" => $medicamentos,
			"documento" => $docFisico,
			"docLaboratorio" => $docLaboratorios,
			"docPatologia" => $docPatologias,
			"docEcografia" => $docEcografias,
			"diagnostico" => $diagnosticos,
			"procedimiento" => $procedimientos,
			"alergiamedica" => $alergiaMedicas,
			"alergiaotro" => $alergiaotros,
			"diagpaciente" => $diagpacientes,
			"procepaciente" => $procepacientes,
			"generaliniciada" => $generaliniciadas,
			"ginecoiniciada" => $ginecoiniciadas,
			"poscita" => $poscitas,
			"doctor"=> $doctores,
		];
		$this->load->view('administrador/historiaclinica', $data);
	}

	public function crearHistorialPacientesGinecologicas() {

		$paciente = $this->input->post("dni");
		$doctor = $this->input->post("doctorid");
		$triaje = $this->input->post("triaje");
		$familiares = $this->input->post("familiares");
		$patologicos = $this->input->post("patologicos");
		$gine_obste = $this->input->post("gine_obste");
		$fum = $this->input->post("fum");
		$rm = $this->input->post("rm");
		$flujo_genital = $this->input->post("flujo_genital");
		$parejas = $this->input->post("parejas");
		$gestas = $this->input->post("gestas");
		$partos = $this->input->post("partos");
		$abortos = $this->input->post("abortos");
		$anticonceptivos = $this->input->post("anticonceptivos");
		$tipo = $this->input->post("tipo");
		$tiempo = $this->input->post("tiempo");
		$cirugia_ginecologica = $this->input->post("cirugia_ginecologica");
		$otros = $this->input->post("otros");
		$pap = $this->input->post("pap");
		$hijos = $this->input->post("hijos");
		$motivo_consulta = $this->input->post("motivo_consulta");
		$signos_sintomas = $this->input->post("signos_sintomas");
		$piel_tscs = $this->input->post("piel_tscs");
		$tiroides = $this->input->post("tiroides");
		$mamas = $this->input->post("mamas");
		$a_respiratorio = $this->input->post("a_respiratorio");
		$a_cardiovascular = $this->input->post("a_cardiovascular");
		$abdomen = $this->input->post("abdomen");
		$genito = $this->input->post("genito");
		$tacto = $this->input->post("tacto");
		$locomotor = $this->input->post("locomotor");
		$sistema_nervioso = $this->input->post("sistema_nervioso");
		$exa_auxiliares = $this->input->post("exa_auxiliares");
		$diagnosticosginecologia = $this->input->post("diagnosticosginecologia");
		$plan_trabajo = $this->input->post("plan_trabajo"); 
		$proxima_cita = $this->input->post("proxima_cita");
		$firma_medico = $this->input->post("firma_medico");
		$tratamiento = $this->input->post("tratamientos_gine");
		
		$data1 = [
			"paciente" => $paciente,
			"doctor" => $doctor,
			"triaje" => $triaje
		];

		$data2 = [
			"familiares" => $familiares,
			"patologicos" => $patologicos,
			"gine_obste" => $gine_obste,
			"fum" => $fum,
			"rm" => $rm,
			"flujo_genital" => $flujo_genital,
			"parejas" => $parejas,
			"gestas" => $gestas,
			"partos" => $partos,
			"abortos" => $abortos,
			"anticonceptivos" => $anticonceptivos,
			"tipo" => $tipo,
			"tiempo" => $tiempo,
			"cirugia_ginecologica" => $cirugia_ginecologica,
			"otros" => $otros,
			"pap" => $pap,
			"hijos" => $hijos,
			"motivo_consulta" => $motivo_consulta,
			"signos_sintomas" => $signos_sintomas,
			"piel_tscs" => $piel_tscs,
			"tiroides" => $tiroides,
			"mamas" => $mamas,
			"a_respiratorio" => $a_respiratorio,
			"a_cardiovascular" => $a_cardiovascular,
			"abdomen" => $abdomen,
			"genito" => $genito,
			"tacto" => $tacto,
			"locomotor" => $locomotor,
			"sistema_nervioso" => $sistema_nervioso,
			"exa_auxiliares" => $exa_auxiliares,
			"plan_trabajo" => $plan_trabajo,
			"proxima_cita" => $proxima_cita,
			"firma_medico" => $firma_medico,
			"tratamiento" => $tratamiento
		];
		
		$id = $this->Historias_model->crearHconsultasGinecologicas($data2);
		$historia = $this->Historias_model->crearHistorialPacientesGinecologicas($data1, $id,2);
		
		for($i=0; $i < sizeof($diagnosticosginecologia); $i++){
			$data3 = [
				"paciente" => $paciente,
				"diagnosticos" => $diagnosticosginecologia[$i],
				"historia" => $historia
			];
			$this->Historias_model->crearDiagnosticos($data3);
		}
		
	}

	public function crearHistorialPacientesGeneral() {
		
		$paciente = $this->input->post("dni");
		$doctor = $this->input->post("doctorid");
		$triaje = $this->input->post("triaje");

		$anamnesis = $this->input->post("anamnesis");
		$empresa = $this->input->post("empresa");
		$compania = $this->input->post("compania");
		$iafa = $this->input->post("iafa");
		$acompanante = $this->input->post("acompanante");
		$documento = $this->input->post("dni3");
		$celular = $this->input->post("celular");
		$motivo_consulta = $this->input->post("motivo_consulta");
		$tratamiento_anterior = $this->input->post("tratamiento_anterior");
		$enfermedad_actual = $this->input->post("enfermedad_actual");
		$tp_enfermedad = $this->input->post("tp_enfermedad");
		$inicio = $this->input->post("inicio");
		$curso = $this->input->post("curso");
		$sintomas = $this->input->post("sintomas");
		$cabeza = $this->input->post("cabeza");
		$cuello = $this->input->post("cuello");
		$ap_respiratorio = $this->input->post("ap_respiratorio");
		$ap_cardio = $this->input->post("ap_cardio");
		$ap_genito = $this->input->post("ap_genito");
		$abdomen = $this->input->post("abdomen");
		$locomotor = $this->input->post("locomotor");
		$sistema_nervioso = $this->input->post("sistema_nervioso");
		$apetito = $this->input->post("apetito");
		$sed = $this->input->post("sed");
		$orina = $this->input->post("orina");
		$diagnosticosgeneral = $this->input->post("diagnosticosgeneral");
		$examendx = $this->input->post("examendx");
		$procedimientos = $this->input->post("procedimientos");
		$interconsultas = $this->input->post("interconsultas");
		$tratamiento = $this->input->post("tratamiento");
		$referencia = $this->input->post("referencia");
		$cita = $this->input->post("cita");
		$firma = $this->input->post("firma");

		$data1 = [
			"paciente" => $paciente,
			"doctor" => $doctor,
			"triaje" => $triaje
		];

		$data2 = [
			"anamnesis" => $anamnesis,
			"empresa" => $empresa,
			"compania" => $compania,
			"iafa" => $iafa,
			"acompanante" => $acompanante,
			"documento" => $documento,
			"celular" => $celular,
			"motivo_consulta" => $motivo_consulta,
			"tratamiento_anterior" => $tratamiento_anterior,
			"enfermedad_actual" => $enfermedad_actual,
			"tp_enfermedad" => $tp_enfermedad,
			"inicio" => $inicio,
			"curso" => $curso,
			"sintomas" => $sintomas,
			"cabeza" => $cabeza,
			"cuello" => $cuello,
			"ap_respiratorio" => $ap_respiratorio,
			"ap_cardio" => $ap_cardio,
			"ap_genito" => $ap_genito,
			"abdomen" => $abdomen,
			"locomotor" => $locomotor,
			"sistema_nervioso" => $sistema_nervioso,
			"apetito" => $apetito,
			"sed" => $sed,
			"orina" => $orina,
			"examendx" => $examendx,
			"procedimientos" => $procedimientos,
			"tratamiento" => $tratamiento,
			"referencia" => $referencia,
			"interconsultas" => $interconsultas,
			"cita" => $cita,
			"firma" => $firma,
		];

		$id = $this->Historias_model->crearHconsultasGeneral($data2);
		$historia = $this->Historias_model->crearHistorialPacientesGinecologicas($data1, $id,1);
		for($i=0; $i < sizeof($diagnosticosgeneral); $i++){
			$data3 = [
				"paciente" => $paciente,
				"diagnosticos" => $diagnosticosgeneral[$i],
				"historia" => $historia
			];
			$this->Historias_model->crearDiagnosticosGeneral($data3);
		}
	}

	public function crearRecetaMedica() {
		$paciente = $this->input->post("paciente");
		$fecha = $this->input->post("fecha");
		$medicina = $this->input->post("medicina");
		$receta = $this->input->post("receta");

		$data = [
			"paciente" => $paciente,
			"fecha" => $fecha,
			"medicina" => $medicina,
			"receta" => $receta
		];
		$this->Historias_model->crearRecetaMedica($data);
	}

	public function subirDocumentos() {
		$paciente = $this->input->post("paciente");
		$titulo = $this->input->post("titulo");
		$fecha = date("dmY");
		$dir_subida = 'public/documentos/';
        $fichero_subido = $dir_subida.basename($paciente."-".$fecha."-".$_FILES['icono']['name']);

		move_uploaded_file($_FILES['icono']['tmp_name'], $fichero_subido);

			$datos = array(
				"paciente" => $paciente,
				"titulo" => $titulo,
				"icono" => $paciente."-".$fecha."-".$_FILES['icono']['name']
			);
		
		$this->Historias_model->subirDocumentos($datos);
		redirect(base_url("administracion/historia/".$paciente));
	 }

	public function GenerarPdfGinecologia() {
		$id = $this->uri->segment(3);
		$fecha = $this->uri->segment(4);
		$this->load->library("pdf");
        $pdfAct = new Pdf();
		$gineco = $this->Historias_model->GenerarPdfGinecologia($id);
		$diagnosticos = $this->Historias_model->getDiagnosticosGinecologia($id, $fecha);
		$data = [
			"ginecologia" => $gineco,
			"diagnostico" => $diagnosticos
		];
		$this->load->view("administrador/pdfginecologia", $data);
	}

	public function GenerarPdfMedicinaGeneral() {
		$id = $this->uri->segment(3);
		$fecha = $this->uri->segment(4);
		$this->load->library("pdf");
        $pdfAct = new Pdf();
		$gene = $this->Historias_model->GenerarPdfMedicinaGeneral($id);
		$diagnosticos = $this->Historias_model->getDiagnosticosGeneral($id, $fecha);
		$data = [
			"general" => $gene,
			"diagnostico" => $diagnosticos
		];
		$this->load->view("administrador/pdfmedicinageneral", $data);
	}

	public function getTriajeId() {
		$idpaciente = $this->input->post("documento");
		$result = $this->Historias_model->getTriajeId($idpaciente);

		echo json_encode($result);
	}

	public function getconsecutivoGeneral() {

	}

	public function getConsecutivoGinecologica() {

	}

	public function crearAlergias() {
	  $dni_paciente = $this->input->post("dni_paciente");	
	  $tipo_alergia = $this->input->post("tipo_alergia");	
	  $descripcion = $this->input->post("descripcion");

	  $datos = [
		"dni_paciente" => $dni_paciente,
		"tipo_alergia" => $tipo_alergia,
		"descripcion" => $descripcion,
	  ];

	  $this->Historias_model->crearAlergias($datos);
	}

	public function crearMedicamento() {
	  $doctor = $this->input->post("doctor");		
	  $paciente = $this->input->post("paciente");		
	  $medicamento = $this->input->post("medicamento");		
	  $cantidad = $this->input->post("cantidad");		
	  $dosis = $this->input->post("dosis");		
	  $via_aplicacion = $this->input->post("via_aplicacion");		
	  $frecuencia = $this->input->post("frecuencia");		
	  $duracion = $this->input->post("duracion");
	  
	  $datos = [
	    "doctor" => $doctor,		
	    "paciente" => $paciente,		
	    "medicamento" => $medicamento,		
	    "cantidad" => $cantidad,		
	    "dosis" => $dosis,		
	    "via_aplicacion" => $via_aplicacion,		
	    "frecuencia" => $frecuencia,		
	    "duracion" => $duracion,
	  ];

	  $this->Historias_model->crearMedicamento($datos);
	}
	
}
