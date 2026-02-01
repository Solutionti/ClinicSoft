<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historiaclinica extends Admin_Controller
{
	public function guardar_orden_laboratorio_historia()
	{
		$this->load->model('Laboratorio_model');

		$id_paciente = $this->input->post('id_paciente');
		$id_medico = $this->input->post('id_medico');
		$analisis = $this->input->post('analisis');
		$fecha_actual = date('Y-m-d H:i:s');

		try {
			// Crear la orden de laboratorio
			$data_orden = [
				'dni_paciente' => $id_paciente,
				'id_medico' => $id_medico,
				'fecha' => $fecha_actual,
				'estado' => 'Pendiente',
				'tipo' => 'Historia Clínica',
				'total' => 0  // Se calcula con los análisis
			];

			$id_orden = $this->Laboratorio_model->crearServicioLaboratorio($data_orden);

			if (!$id_orden) {
				throw new Exception('Error al crear la orden de laboratorio');
			}

			$total = 0;

			// Agregar cada análisis a la orden
			foreach ($analisis as $analis) {
				$data_detalle = [
					'id_laboratorio' => $id_orden,
					'servicio' => $analis[0],  // ID del análisis
					'fecha' => $fecha_actual
				];

				// Obtener el precio del análisis
				$precio_analisis = $this
					->db
					->select('precio')
					->where('id', $analis[0])
					->get('precios_laboratorio')
					->row();

				if ($precio_analisis) {
					$total += $precio_analisis->precio;
				}

				$this->Laboratorio_model->crearDetalleLaboratorio($data_detalle);
			}

			// Actualizar el total de la orden
			$this
				->db
				->where('id', $id_orden)
				->update('laboratorio', ['total' => $total]);

			echo json_encode(['success' => true, 'message' => 'Orden de laboratorio guardada correctamente']);
		} catch (Exception $e) {
			log_message('error', 'Error al guardar orden de laboratorio: ' . $e->getMessage());
			echo json_encode(['success' => false, 'message' => 'Error al guardar la orden de laboratorio']);
		}
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pacientes_model');
		$this->load->model('Historias_model');
		$this->load->model('Generic_model');
		$this->load->model('Doctores_model');
		$this->load->model('Laboratorio_model');
	}

	public function historiasClinicas()
	{
		$documento = $this->uri->segment(3);
		$pacientes = $this->Pacientes_model->getPacienteId($documento);
		$historias = $this->Historias_model->getHistoriasId($documento);
		$especialidades = $this->Historias_model->getatencionid($documento);
		$recetas = $this->Historias_model->getRecetas($documento);
		$docFisico = $this->Historias_model->getDocumentos($documento, 'hfisico');
		$docLaboratorios = $this->Historias_model->getDocumentos($documento, 'laboratorio');
		$docPatologias = $this->Historias_model->getDocumentos($documento, 'patologia');
		$docEcografias = $this->Historias_model->getDocumentos($documento, 'ecografias');
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
		$laboratorios = $this->Laboratorio_model->getPreciosLaboratorio();
		$ordenPatologicas = $this->Historias_model->getOrdenesPatologicas($documento);
		$ordenLaboratorios = $this->Historias_model->getOrdeneslaboratorio($documento);
		$documentosPacientes = $this->Historias_model->getDocumentosPacientes($documento);

		// listar las ecografias en el frontend
		$ecoAbdominal = $this->Historias_model->getEcografiaAbdominal($documento);
		$ecoMama = $this->Historias_model->getEcografiaMama($documento);
		$ecoGenetica = $this->Historias_model->getEcografiaGenetica($documento);
		$ecoMorfologica = $this->Historias_model->getEcografiaMorfologica($documento);
		$ecoTrasvaginal = $this->Historias_model->getEcografiaTrasvaginal($documento);
		$ecoPelvica = $this->Historias_model->getEcografiaPelvica($documento);
		$ecoObstetrica = $this->Historias_model->getEcografiaObstetrica($documento);
		$ecoProstatica = $this->Historias_model->getEcografiaProstatica($documento);
		$ecoRenal = $this->Historias_model->getEcografiaRenal($documento);
		$ecoTiroides = $this->Historias_model->getEcografiaTiroides($documento);
		$ecoHisterosonografia = $this->Historias_model->getEcografiaHisterosonografia($documento);
		$ecoArterial = $this->Historias_model->getEcografiaArterial($documento);
		$ecoVenosa = $this->Historias_model->getEcografiaVenosa($documento);

		// medicamentos de la farmacia
		$farmaciaMedicamento = $this->Historias_model->getMedicamentosFarmacia();
		$data = [
			'paciente' => $pacientes,
			'historia' => $historias,
			'especialidad' => $especialidades,
			'medicamento' => $medicamentos,
			'documento' => $docFisico,
			'docLaboratorio' => $docLaboratorios,
			'docPatologia' => $docPatologias,
			'docEcografia' => $docEcografias,
			'diagnostico' => $diagnosticos,
			'procedimiento' => $procedimientos,
			'alergiamedica' => $alergiaMedicas,
			'alergiaotro' => $alergiaotros,
			'diagpaciente' => $diagpacientes,
			'procepaciente' => $procepacientes,
			'generaliniciada' => $generaliniciadas,
			'ginecoiniciada' => $ginecoiniciadas,
			'poscita' => $poscitas,
			'doctor' => $doctores,
			'laboratorio' => $laboratorios,
			'ordenpatologica' => $ordenPatologicas,
			'ordenLaboratorio' => $ordenLaboratorios,
			'documentosPacientes' => $documentosPacientes,
			'recetas' => $recetas,
			//
			'ecoAbdominales' => $ecoAbdominal,
			'ecoMamas' => $ecoMama,
			'ecoGeneticas' => $ecoGenetica,
			'ecoMorfologicas' => $ecoMorfologica,
			'ecoTrasvaginals' => $ecoTrasvaginal,
			'ecoPelvicas' => $ecoPelvica,
			'ecoObstetricas' => $ecoObstetrica,
			'ecoProstaticas' => $ecoProstatica,
			'ecoRenals' => $ecoRenal,
			'ecoTiroidess' => $ecoTiroides,
			'ecoHisterosonografias' => $ecoHisterosonografia,
			'ecoArterials' => $ecoArterial,
			'ecoVenosas' => $ecoVenosa,
			'medicamentofarmacias' => $farmaciaMedicamento
		];
		$this->load->view('administrador/historiaclinica', $data);
	}

	public function crearHistorialPacientesGinecologicas()
	{
		$paciente = $this->input->post('dni');
		$doctor = $this->input->post('doctorid');
		$triaje = $this->input->post('triaje');
		$familiares = $this->input->post('familiares');
		$patologicos = $this->input->post('patologicos');
		$gine_obste = $this->input->post('gine_obste');
		$fum = $this->input->post('fum');
		$rm = $this->input->post('rm');
		$flujo_genital = $this->input->post('flujo_genital');
		$parejas = $this->input->post('parejas');
		$gestas = $this->input->post('gestas');
		$partos = $this->input->post('partos');
		$abortos = $this->input->post('abortos');
		$anticonceptivos = $this->input->post('anticonceptivos');
		$tipo = $this->input->post('tipo');
		$tiempo = $this->input->post('tiempo');
		$cirugia_ginecologica = $this->input->post('cirugia_ginecologica');
		$otros = $this->input->post('otros');
		$pap = $this->input->post('pap');
		$hijos = $this->input->post('hijos');
		$motivo_consulta = $this->input->post('motivo_consulta');
		$signos_sintomas = $this->input->post('signos_sintomas');
		$piel_tscs = $this->input->post('piel_tscs');
		$tiroides = $this->input->post('tiroides');
		$mamas = $this->input->post('mamas');
		$a_respiratorio = $this->input->post('a_respiratorio');
		$a_cardiovascular = $this->input->post('a_cardiovascular');
		$abdomen = $this->input->post('abdomen');
		$genito = $this->input->post('genito');
		$tacto = $this->input->post('tacto');
		$locomotor = $this->input->post('locomotor');
		$sistema_nervioso = $this->input->post('sistema_nervioso');
		$exa_auxiliares = $this->input->post('exa_auxiliares');
		$diagnosticosginecologia = $this->input->post('diagnosticosginecologia');
		$plan_trabajo = $this->input->post('plan_trabajo');
		$proxima_cita = $this->input->post('proxima_cita');
		$firma_medico = $this->input->post('firma_medico');
		$tratamiento = $this->input->post('tratamientos_gine');

		$data1 = [
			'paciente' => $paciente,
			'doctor' => $this->session->userdata('codigo'),
			'triaje' => $triaje
		];

		$data2 = [
			'triaje' => $triaje,
			'familiares' => $familiares,
			'patologicos' => $patologicos,
			'gine_obste' => $gine_obste,
			'fum' => $fum,
			'rm' => $rm,
			'flujo_genital' => $flujo_genital,
			'parejas' => $parejas,
			'gestas' => $gestas,
			'partos' => $partos,
			'abortos' => $abortos,
			'anticonceptivos' => $anticonceptivos,
			'tipo' => $tipo,
			'tiempo' => $tiempo,
			'cirugia_ginecologica' => $cirugia_ginecologica,
			'otros' => $otros,
			'pap' => $pap,
			'hijos' => $hijos,
			'motivo_consulta' => $motivo_consulta,
			'signos_sintomas' => $signos_sintomas,
			'piel_tscs' => $piel_tscs,
			'tiroides' => $tiroides,
			'mamas' => $mamas,
			'a_respiratorio' => $a_respiratorio,
			'a_cardiovascular' => $a_cardiovascular,
			'abdomen' => $abdomen,
			'genito' => $genito,
			'tacto' => $tacto,
			'locomotor' => $locomotor,
			'sistema_nervioso' => $sistema_nervioso,
			'exa_auxiliares' => $exa_auxiliares,
			'plan_trabajo' => $plan_trabajo,
			'proxima_cita' => $proxima_cita,
			'firma_medico' => $firma_medico,
			'tratamiento' => $tratamiento
		];

		$id = $this->Historias_model->crearHconsultasGinecologicas($data2);
		$historia = $this->Historias_model->crearHistorialPacientesGinecologicas($data1, $id, 2);

		for ($i = 0; $i < sizeof($diagnosticosginecologia); $i++) {
			$data3 = [
				'paciente' => $paciente,
				'diagnosticos' => $diagnosticosginecologia[$i],
				'historia' => $historia,
				'triaje' => $triaje
			];
			$this->Historias_model->crearDiagnosticos($data3);
		}
	}

	public function crearHistorialPacientesGeneral()
	{
		$paciente = $this->input->post('dni');
		$doctor = $this->input->post('doctorid');
		$triaje = $this->input->post('triaje');

		$anamnesis = $this->input->post('anamnesis');
		$empresa = $this->input->post('empresa');
		$compania = $this->input->post('compania');
		$iafa = $this->input->post('iafa');
		$acompanante = $this->input->post('acompanante');
		$documento = $this->input->post('dni3');
		$celular = $this->input->post('celular');
		$motivo_consulta = $this->input->post('motivo_consulta');
		$tratamiento_anterior = $this->input->post('tratamiento_anterior');
		$enfermedad_actual = $this->input->post('enfermedad_actual');
		$tp_enfermedad = $this->input->post('tp_enfermedad');
		$inicio = $this->input->post('inicio');
		$curso = $this->input->post('curso');
		$sintomas = $this->input->post('sintomas');
		$cabeza = $this->input->post('cabeza');
		$cuello = $this->input->post('cuello');
		$ap_respiratorio = $this->input->post('ap_respiratorio');
		$ap_cardio = $this->input->post('ap_cardio');
		$ap_genito = $this->input->post('ap_genito');
		$abdomen = $this->input->post('abdomen');
		$locomotor = $this->input->post('locomotor');
		$sistema_nervioso = $this->input->post('sistema_nervioso');
		$apetito = $this->input->post('apetito');
		$sed = $this->input->post('sed');
		$orina = $this->input->post('orina');
		$diagnosticosgeneral = $this->input->post('diagnosticosgeneral');
		$examendx = $this->input->post('examendx');
		$procedimientos = $this->input->post('procedimientos');
		$interconsultas = $this->input->post('interconsultas');
		$tratamiento = $this->input->post('tratamiento');
		$referencia = $this->input->post('referencia');
		$cita = $this->input->post('cita');
		$firma = $this->input->post('firma');

		$data1 = [
			'paciente' => $paciente,
			'doctor' => $this->session->userdata('codigo'),
			'triaje' => $triaje
		];

		$data2 = [
			'triaje' => $triaje,
			'anamnesis' => $anamnesis,
			'empresa' => $empresa,
			'compania' => $compania,
			'iafa' => $iafa,
			'acompanante' => $acompanante,
			'documento' => $documento,
			'celular' => $celular,
			'motivo_consulta' => $motivo_consulta,
			'tratamiento_anterior' => $tratamiento_anterior,
			'enfermedad_actual' => $enfermedad_actual,
			'tp_enfermedad' => $tp_enfermedad,
			'inicio' => $inicio,
			'curso' => $curso,
			'sintomas' => $sintomas,
			'cabeza' => $cabeza,
			'cuello' => $cuello,
			'ap_respiratorio' => $ap_respiratorio,
			'ap_cardio' => $ap_cardio,
			'ap_genito' => $ap_genito,
			'abdomen' => $abdomen,
			'locomotor' => $locomotor,
			'sistema_nervioso' => $sistema_nervioso,
			'apetito' => $apetito,
			'sed' => $sed,
			'orina' => $orina,
			'examendx' => $examendx,
			'procedimientos' => $procedimientos,
			'tratamiento' => $tratamiento,
			'referencia' => $referencia,
			'interconsultas' => $interconsultas,
			'cita' => $cita,
			'firma' => $firma,
		];

		$id = $this->Historias_model->crearHconsultasGeneral($data2);
		$historia = $this->Historias_model->crearHistorialPacientesGinecologicas($data1, $id, 1);
		for ($i = 0; $i < sizeof($diagnosticosgeneral); $i++) {
			$data3 = [
				'paciente' => $paciente,
				'diagnosticos' => $diagnosticosgeneral[$i],
				'historia' => $historia,
				'triaje' => $triaje
			];
			$this->Historias_model->crearDiagnosticosGeneral($data3);
		}
	}

	public function crearRecetaMedica()
	{
		$paciente = $this->input->post('paciente');
		$fecha = $this->input->post('fecha');
		$medicina = $this->input->post('medicina');
		$receta = $this->input->post('receta');

		$data = [
			'paciente' => $paciente,
			'fecha' => $fecha,
			'medicina' => $medicina,
			'receta' => $receta
		];
		$this->Historias_model->crearRecetaMedica($data);
	}

	public function subirDocumentos()
	{
		$paciente = $this->input->post('paciente');
		$titulo = $this->input->post('titulo');
		$tipo_archivo = $this->input->post('tipo_archivo');
		$tipoarc = $this->input->post('tipo_archivo');
		$fecha = date('dmY');

		// Definir las carpetas según el tipo de archivo
		switch ($tipo_archivo) {
			case 'HF':
				$carpeta = 'historial_fisico';
				break;
			case 'LB':
				$carpeta = 'laboratorio';
				break;
			case 'PA':
				$carpeta = 'patologia';
				break;
			default:
				$carpeta = 'otros';
		}

		$dir_base = 'public/documentos/';
		$dir_subida = $dir_base . $carpeta . '/';

		// Verificar si se subió un archivo
		if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
			$error = $_FILES['archivo']['error'] ?? 'Error desconocido';
			$mensaje = 'Error al subir el archivo. Código: ' . $error;

			if ($this->input->is_ajax_request()) {
				echo json_encode(['success' => false, 'alerta' => $mensaje, 'tipo_alerta' => 'danger']);
				return;
			} else {
				$this->session->set_flashdata('alerta', $mensaje);
				$this->session->set_flashdata('tipo_alerta', 'danger');
				redirect(base_url('administracion/historia/' . $paciente));
				return;
			}
		}

		// Validar tipo de archivo
		$archivo_temporal = $_FILES['archivo']['tmp_name'];
		$nombre_archivo = basename($_FILES['archivo']['name']);
		$tipo_archivo = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

		// Permitir solo ciertos tipos de archivo
		$extensiones_permitidas = array('pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png');
		if (!in_array($tipo_archivo, $extensiones_permitidas)) {
			$mensaje = 'Tipo de archivo no permitido. Solo se permiten archivos PDF, DOC, DOCX, JPG, JPEG y PNG.';

			if ($this->input->is_ajax_request()) {
				echo json_encode(['success' => false, 'alerta' => $mensaje, 'tipo_alerta' => 'warning']);
				return;
			} else {
				$this->session->set_flashdata('alerta', $mensaje);
				$this->session->set_flashdata('tipo_alerta', 'warning');
				redirect(base_url('administracion/historia/' . $paciente));
				return;
			}
		}

		// Crear directorio base si no existe
		if (!is_dir($dir_base)) {
			mkdir($dir_base, 0777, true);
		}

		// Crear subdirectorio según el tipo de archivo si no existe
		if (!is_dir($dir_subida)) {
			mkdir($dir_subida, 0777, true);
		}

		// Generar nombre único para el archivo
		$nuevo_nombre = $paciente . '-' . $fecha . '-' . uniqid() . '.' . $tipo_archivo;
		$ruta_archivo = $dir_subida . $nuevo_nombre;

		// Mover el archivo subido al directorio de destino
		if (move_uploaded_file($archivo_temporal, $ruta_archivo)) {
			$datos = array(
				'paciente' => $paciente,
				'titulo' => $titulo,
				'icono' => $carpeta . '/' . $nuevo_nombre,
				'tipo_archivo' => $tipoarc
			);

			$this->Historias_model->subirDocumentos($datos);
			$mensaje = 'Archivo subido correctamente.';

			if ($this->input->is_ajax_request()) {
				echo json_encode(['success' => true, 'alerta' => $mensaje, 'tipo_alerta' => 'success']);
				return;
			} else {
				$this->session->set_flashdata('alerta', $mensaje);
				$this->session->set_flashdata('tipo_alerta', 'success');
				redirect(base_url('administracion/historia/' . $paciente));
				return;
			}
		} else {
			$mensaje = 'Error al mover el archivo subido.';

			if ($this->input->is_ajax_request()) {
				echo json_encode(['success' => false, 'alerta' => $mensaje, 'tipo_alerta' => 'danger']);
				return;
			} else {
				$this->session->set_flashdata('alerta', $mensaje);
				$this->session->set_flashdata('tipo_alerta', 'danger');
				redirect(base_url('administracion/historia/' . $paciente));
				return;
			}
		}
	}

	public function GenerarPdfGinecologia()
	{
		$id = $this->uri->segment(3);
		$fecha = $this->uri->segment(4);
		$this->load->library('pdf');
		$pdfAct = new Pdf();
		$gineco = $this->Historias_model->GenerarPdfGinecologia($id);
		$diagnosticos = $this->Historias_model->getDiagnosticosGinecologia($id, $fecha);
		$data = [
			'ginecologia' => $gineco,
			'diagnostico' => $diagnosticos
		];
		$this->load->view('administrador/pdfginecologia', $data);
	}

	public function GenerarPdfMedicinaGeneral()
	{
		$id = $this->uri->segment(3);
		$fecha = $this->uri->segment(4);
		$this->load->library('pdf');
		$pdfAct = new Pdf();
		$gene = $this->Historias_model->GenerarPdfMedicinaGeneral($id);
		$diagnosticos = $this->Historias_model->getDiagnosticosGeneral($id, $fecha);
		$data = [
			'general' => $gene,
			'diagnostico' => $diagnosticos
		];
		$this->load->view('administrador/pdfmedicinageneral', $data);
	}

	public function getTriajeId()
	{
		$idpaciente = $this->input->post('documento');
		$result = $this->Historias_model->getTriajeId($idpaciente);

		echo json_encode($result);
	}

	public function crearAlergias()
	{
		$dni_paciente = $this->input->post('dni_paciente');
		$tipo_alergia = $this->input->post('tipo_alergia');
		$descripcion = $this->input->post('descripcion');

		$datos = [
			'dni_paciente' => $dni_paciente,
			'tipo_alergia' => $tipo_alergia,
			'descripcion' => $descripcion,
		];

		$this->Historias_model->crearAlergias($datos);
	}

	public function crearMedicamento()
	{
		$doctor = $this->input->post('doctor');
		$paciente = $this->input->post('paciente');
		$medicamento = $this->input->post('medicamento');
		$cantidad = $this->input->post('cantidad');
		$dosis = $this->input->post('dosis');
		$via_aplicacion = $this->input->post('via_aplicacion');
		$frecuencia = $this->input->post('frecuencia');
		$duracion = $this->input->post('duracion');
		$triaje = $this->input->post('triaje');

		$receta = $this->Historias_model->validarExistenciaReceta($paciente, $triaje);

		if ($receta == 0) {
			$datosreceta = [
				'paciente' => $paciente,
				'triage' => $triaje,
			];
			$this->Historias_model->crearReceta($datosreceta);
		}

		$datos = [
			'triaje' => $triaje,
			'doctor' => $doctor,
			'paciente' => $paciente,
			'medicamento' => $medicamento,
			'cantidad' => $cantidad,
			'dosis' => $dosis,
			'via_aplicacion' => $via_aplicacion,
			'frecuencia' => $frecuencia,
			'duracion' => $duracion,
		];

		$this->Historias_model->crearMedicamento($datos);
	}

	public function crearPdfHistoriaClinica($triage, $documento)
	{
		$datospaciente = $this->Pacientes_model->getPacienteId($documento)->result()[0];
		$datostriage = $this->Historias_model->getUltimoDatoTriage($documento)->result()[0];
		$datosgeneral = $this->Historias_model->GenerarPdfMedicinaGeneral($documento, $triage)->result()[0];
		$datosalergias = $this->Historias_model->getAllAlergias($documento);
		$datosmedicamentos = $this->Historias_model->getMedicamentosHistoria($documento, $triage);
		$datosdiagnosticos = $this->Historias_model->getDiagnosticosHistoria($documento, $triage);

		$this->load->library('PDF_UTF8');
		$pdf = new PDF_UTF8();
		$pdf->AddPage();
		$pdf->SetAlpha(0.2);  // Transparencia (0.1 = 10% opacidad)
		$pdf->Image('public/img/theme/logo.png', 60, 110, 80);  // Ajusta las coordenadas y tamaño según necesites
		$pdf->SetAlpha(1);  // Restauramos la opacidad al 100%
		$pdf->SetDrawColor(0, 24, 0);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 40, 196, 6, 'F');
		$pdf->Image('public/img/theme/logo.png', 10, 12, 25, 0, 'PNG');
		$pdf->Ln(15);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->cell(124, 5, '', 0);
		// $pdf->cell(40,5, 'ORDEN DE INTERCONSULTA MEDICA', 0);
		$pdf->Ln(5);
		$pdf->cell(128, 5, '', 0);
		$pdf->cell(40, 5, 'HISTORIA CLINICA DEL PACIENTE', 0);

		$pdf->Ln(10);
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(65, 6, '1. DATOS DEL PACIENTE', 0, 0, 'L');

		// DATOS PERSONALES
		$pdf->Ln(6);
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'APELLIDOS Y NOMBRES', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(100, 5, $datospaciente->nombre . ' ' . $datospaciente->apellido, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'HC', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(46, 5, $datospaciente->hc, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'DNI', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(30, 5, $datospaciente->documento, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'EDAD', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(10, 5, $datospaciente->edad, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'SEXO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->sexo, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'TELEFONO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(46, 5, $datospaciente->telefono, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'DIRECCION', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(45, 5, $datospaciente->direccion, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'DEPARTAMENTO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->departamento, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'PROVINCIA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->provincia, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'DISTRITO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(21, 5, $datospaciente->distrito, 1);

		$pdf->Ln(5);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'OCUPACION', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(100, 5, $datospaciente->ocupacion, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'ESTADO CIVIL', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(36, 5, $datospaciente->estado_civil, 1);
		$pdf->Ln(9);

		// DATOS DEL TRIAGE
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 70, 196, 6, 'F');
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(196, 6, '2. SIGNOS VITALES', 0);

		$pdf->SetTextColor(0, 0, 0);
		$pdf->Ln(6);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'ESTATURA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->talla . ' CM', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'PESO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->peso . ' KG', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'IMC', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->imc . ' IMC', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'TEMPERATURA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->temperatura . ' C°', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, '% GRASA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(16, 5, '0%', 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'FRECUENCIA RESPIRATORIA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->frecuencia_respiratoria . ' R/M', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'FRECUENCIA CARDIACA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->frecuencia_cardiaca . ' MMHG', 1);

		// DATOS DE LA CONSULTA GENERAL
		$pdf->ln(9);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 90, 196, 6, 'F');
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(196, 6, '3. DATOS DE LA CONSULTA GENERAL', 0, 0, 'L');

		$pdf->Ln(6);
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'ANAMNESIS', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datosgeneral->anamnesis, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'EMPRESA', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(40, 5, $datosgeneral->empresa, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, utf8_decode('COMPAÑIA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(40, 5, $datosgeneral->compania, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'IAFA', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(16, 5, $datosgeneral->iafa, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('NOMBRE ACOMPAÑANTE'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(70, 5, $datosgeneral->nombre_acompanante, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, utf8_decode('DNI'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(25, 5, $datosgeneral->dni, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, utf8_decode('CELULAR'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(31, 5, $datosgeneral->celular, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('MOTIVO CONSULTA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->motivo_consulta, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('TRATAMIENTO ANTERIOR'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->tratamiento_anterior, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('TIEMPO ENFERMEDAD'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(47, 5, $datosgeneral->tiempo, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, utf8_decode('INICIO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(40, 5, $datosgeneral->inicio, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, utf8_decode('CURSO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(49, 5, $datosgeneral->curso, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('SINTOMAS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->sintomas, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('PIEL'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, '', 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('CUELLO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->cuello, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('AP RESPIRATORIO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->ap_respiratoria, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('AP CARDIO VASCULAR'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->ap_cardio, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('ABDOMEN'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->abdomen, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('CABEZA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->cabeza, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('LOCOMOTOR'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->loco_motor, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('SISTEMA NERVIOSO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->sistema_nervioso, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('APETITO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(30, 5, $datosgeneral->apetito, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('SED'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(40, 5, $datosgeneral->sed, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(25, 5, utf8_decode('ORINA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(41, 5, $datosgeneral->orina, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('AYUDA AL DX'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->examen_dx, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('INTERCONSULTAS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->interconsultas, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('TRATAMIENTO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->tratamiento, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('REFERENCIA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgeneral->referencia, 1);

		// DATOS DE LA CONSULTA GINECOLOGICA
		$pdf->ln(4);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 190, 196, 6, 'F');
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(196, 6, '4. PROCESOS CLINICOS', 0, 0, 'L');

		$pdf->ln(7);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('ALERGIAS'), 0);

		$pdf->ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('TIPO'), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(166, 5, 'ALERGIA', 1);

		if ($datosalergias == false) {
			$pdf->ln(5);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(30, 5, '', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(166, 5, '', 1);
		} else {
			foreach ($datosalergias->result() as $alergia) {
				$pdf->ln(5);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(30, 5, utf8_decode($alergia->tipo_alergia), 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(166, 5, utf8_decode($alergia->descripcion), 1);
			}
		}

		$pdf->ln(7);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('DIAGNOSTICOS'), 0);

		$pdf->ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('CODIGO'), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(166, 5, 'DIAGNOSTICO', 1);

		if ($datosdiagnosticos == false) {
			$pdf->ln(5);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(30, 5, utf8_decode('R112'), 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(166, 5, 'OTRAS COSAS NO DEFINIDAS', 1);
		} else {
			foreach ($datosdiagnosticos->result() as $diagnostico) {
				$pdf->ln(5);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(30, 5, $diagnostico->clave, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(166, 5, $diagnostico->descripcion, 1);
			}
		}

		$pdf->ln(7);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('PROCEDIMIENTOS'), 0);

		$pdf->ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('CODIGO'), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(166, 5, 'PROCEDIMIENTO', 1);

		$pdf->ln(5);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(30, 5, '', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, '', 1);

		$pdf->ln(7);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('MEDICAMENTOS'), 0);

		$pdf->ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(70, 5, utf8_decode('FARMACO'), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(11, 5, 'CANT', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'DOSIS', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, 'VIA', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, 'FRECUENCIA', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(35, 5, 'DURACION', 1);

		if ($datosmedicamentos == false) {
			$pdf->ln(5);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(70, 5, utf8_decode('FARMACO'), 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(11, 5, 'CANT', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(20, 5, 'DOSIS', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(30, 5, 'VIA', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(30, 5, 'FRECUENCIA', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(35, 5, 'DURACION', 1);
		} else {
			foreach ($datosmedicamentos->result() as $medicamento) {
				$pdf->ln(5);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(70, 5, $medicamento->medicamento, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(11, 5, $medicamento->cantidad, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(20, 5, $medicamento->dosis, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(30, 5, $medicamento->via_aplicacion, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(30, 5, $medicamento->frecuencia, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(35, 5, $medicamento->duracion, 1);
			}
		}

		$pdf->ln(10);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('          PROXIMA CITA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(30, 5, utf8_decode('          '), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('     FIRMA DEL DOCTOR'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(106, 5, utf8_decode('JERSON GALVEZ ENSUNCHO'), 1);

		$pdf->Output('I', 'Historia_Clinica_General_' . $documento . '.pdf');
	}

	public function crearPdfHistoriaClinicaGinecologica($triage, $documento)
	{
		$datospaciente = $this->Pacientes_model->getPacienteId($documento)->result()[0];
		$datostriage = $this->Historias_model->getUltimoDatoTriage($documento)->result()[0];
		$datosgineco = $this->Historias_model->GenerarPdfGinecologia($documento, $triage)->result()[0];
		$datosalergias = $this->Historias_model->getAllAlergias($documento);
		$datosmedicamentos = $this->Historias_model->getMedicamentosHistoria($documento, $triage);
		$datosdiagnosticos = $this->Historias_model->getDiagnosticosHistoria($documento, $triage);

		$this->load->library('PDF_UTF8');
		$pdf = new PDF_UTF8();
		$pdf->AddPage();
		$pdf->SetAlpha(0.2);  // Transparencia (0.1 = 10% opacidad)
		$pdf->Image('public/img/theme/logo.png', 60, 110, 80);  // Ajusta las coordenadas y tamaño según necesites
		$pdf->SetAlpha(1);  // Restauramos la opacidad al 100%
		$pdf->SetDrawColor(0, 24, 0);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 40, 196, 6, 'F');
		$pdf->Image('public/img/theme/logo.png', 10, 12, 25, 0, 'PNG');
		$pdf->Ln(15);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->cell(124, 5, '', 0);
		$pdf->cell(40, 5, 'ORDEN DE INTERCONSULTA MEDICA', 0);
		$pdf->Ln(5);
		$pdf->cell(128, 5, '', 0);
		$pdf->cell(40, 5, 'HISTORIA CLINICA DEL PACIENTE', 0);

		$pdf->Ln(10);
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(65, 6, '1. DATOS DEL PACIENTE', 0, 0, 'L');

		// DATOS PERSONALES
		$pdf->Ln(6);
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'APELLIDOS Y NOMBRES', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(100, 5, $datospaciente->nombre . ' ' . $datospaciente->apellido, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'HC', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(46, 5, $datospaciente->hc, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'DNI', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(30, 5, $datospaciente->documento, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'EDAD', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(10, 5, $datospaciente->edad, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'SEXO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->sexo, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'TELEFONO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(46, 5, $datospaciente->telefono, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'DIRECCION', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(45, 5, $datospaciente->direccion, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'DEPARTAMENTO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->departamento, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'PROVINCIA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->provincia, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'DISTRITO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(21, 5, $datospaciente->distrito, 1);

		$pdf->Ln(5);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'OCUPACION', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(100, 5, $datospaciente->ocupacion, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'ESTADO CIVIL', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(36, 5, $datospaciente->estado_civil, 1);
		$pdf->Ln(9);

		// DATOS DEL TRIAGE
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 70, 196, 6, 'F');
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(196, 6, '2. SIGNOS VITALES', 0);

		$pdf->SetTextColor(0, 0, 0);
		$pdf->Ln(6);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'ESTATURA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->talla . ' CM', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'PESO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->peso . ' KG', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'IMC', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->imc . ' IMC', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'TEMPERATURA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->temperatura . ' C°', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, '% GRASA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(16, 5, '0%', 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'FRECUENCIA RESPIRATORIA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->frecuencia_respiratoria . ' R/M', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'FRECUENCIA CARDIACA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datostriage->frecuencia_cardiaca . ' MMHG', 1);

		// DATOS DE LA CONSULTA GENERAL
		$pdf->ln(9);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 90, 196, 6, 'F');
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(196, 6, '3. DATOS DE LA CONSULTA GINECOLOGICA', 0, 0, 'L');

		$pdf->Ln(6);
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('FAMILIARES'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->familiares, 1);
		$pdf->Ln(5);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('PATOLOGICOS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->patologicos, 1);
		$pdf->Ln(5);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('MENARQUIA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->gineco_obstetrico, 1);
		$pdf->Ln(5);
		//
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'FUM', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(45, 5, $datosgineco->fum, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(25, 5, utf8_decode('RM (RET.MENSTR)'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(47, 5, $datosgineco->rm, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'IRS', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(44, 5, $datosgineco->flujo_genital, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'No PAREJAS', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datosgineco->no_de_parejas, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'GESTAS', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(40, 5, $datosgineco->gestas, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, utf8_decode('PARTOS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(40, 5, $datosgineco->partos, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'ABORTOS', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(16, 5, $datosgineco->abortos, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('ANTICONCEPTIVOS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(70, 5, $datosgineco->anticonceptivos, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, utf8_decode('TIPOS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(25, 5, $datosgineco->tipo, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, utf8_decode('TIEMPO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(31, 5, $datosgineco->tiempo, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('QUIRURGICOS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->cirugia_ginecologica, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('OTROS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(47, 5, $datosgineco->otros, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, utf8_decode('FECHA PAP'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(40, 5, $datosgineco->fecha_pap, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'Nº HIJOS', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(49, 5, $datosgineco->no_hijos, 1);
		//
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('PIEL Y TSCS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->piel_tscs, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('TIROIDES'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->tiroides, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('MAMAS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->mamas, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('A RESPIRATORIO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->arespiratorio, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('A CARDIOVASCULAR'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->acardiovascular, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('ABDOMEN'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->abdomen, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('A GENITO - URINARIO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->genito_urinario, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('TACTO RECTAL'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->tacto_rectal, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('LOCOMOTOR'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->locomotor, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('SISTEMA NERVIOSO'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->sistema_nervioso, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('MOTIVO CONSULTA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->motivo_consulta, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('SIGNOS Y SINTOMAS'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, $datosgineco->signossintomas, 1);

		// DATOS DE LA CONSULTA GINECOLOGICA
		$pdf->ln(4);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 195, 196, 6, 'F');
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(196, 6, '4. PROCESOS CLINICOS', 0, 0, 'L');

		$pdf->ln(7);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('ALERGIAS'), 0);

		$pdf->ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('TIPO'), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(166, 5, 'ALERGIA', 1);

		if ($datosalergias == false) {
			$pdf->ln(5);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(30, 5, '', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(166, 5, '', 1);
		} else {
			foreach ($datosalergias->result() as $alergia) {
				$pdf->ln(5);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(30, 5, utf8_decode($alergia->tipo_alergia), 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(166, 5, utf8_decode($alergia->descripcion), 1);
			}
		}

		$pdf->ln(7);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('DIAGNOSTICOS'), 0);

		$pdf->ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('CODIGO'), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(166, 5, 'DIAGNOSTICO', 1);

		if ($datosdiagnosticos == false) {
			$pdf->ln(5);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(30, 5, utf8_decode('R112'), 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(166, 5, 'OTRAS COSAS NO DEFINIDAS', 1);
		} else {
			foreach ($datosdiagnosticos->result() as $diagnostico) {
				$pdf->ln(5);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(30, 5, $diagnostico->clave, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(166, 5, $diagnostico->descripcion, 1);
			}
		}

		$pdf->ln(7);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('PROCEDIMIENTOS'), 0);

		$pdf->ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('CODIGO'), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(166, 5, 'PROCEDIMIENTO', 1);

		$pdf->ln(5);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(30, 5, '', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(166, 5, '', 1);

		$pdf->ln(7);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('MEDICAMENTOS'), 0);

		$pdf->ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(70, 5, utf8_decode('FARMACO'), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(11, 5, 'CANT', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'DOSIS', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, 'VIA', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, 'FRECUENCIA', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(35, 5, 'DURACION', 1);

		if ($datosmedicamentos == false) {
			$pdf->ln(5);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(70, 5, '', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(11, 5, '', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(20, 5, '', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(30, 5, '', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(30, 5, '', 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(35, 5, '', 1);
		} else {
			foreach ($datosmedicamentos->result() as $medicamento) {
				$pdf->ln(5);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(70, 5, $medicamento->medicamento, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(11, 5, $medicamento->cantidad, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(20, 5, $medicamento->dosis, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(30, 5, $medicamento->via_aplicacion, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(30, 5, $medicamento->frecuencia, 1);
				$pdf->SetFont('Arial', '', 6);
				$pdf->cell(35, 5, $medicamento->duracion, 1);
			}
		}

		$pdf->ln(10);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('          PROXIMA CITA'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(30, 5, utf8_decode('          '), 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, utf8_decode('     FIRMA DEL DOCTOR'), 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(106, 5, utf8_decode('JERSON GALVEZ ENSUNCHO'), 1);

		$pdf->Output('I', 'Historia_Clinica_Ginecologica_' . $documento . '.pdf');
	}

	public function formatoMedicamentosOrdenamiento($paciente, $triaje)
	{
		$datospaciente = $this->Pacientes_model->getPacienteId($paciente)->result()[0];
		$medicamentos = $this->Historias_model->formatoMedicamentosOrdenamiento($paciente, $triaje);
		$this->load->library('PDF_UTF8');
		$pdf = new PDF_UTF8();
		$pdf->AddPage('P');
		$pdf->SetAlpha(0.1);  // Transparencia (0.1 = 10% opacidad)
		$pdf->Image('public/img/theme/logo.png', 70, 80, 70);  // Ajusta las coordenadas y tamaño según necesites
		$pdf->SetAlpha(1);  // Restauramos la opacidad al 100%
		$pdf->SetDrawColor(0, 24, 0);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 35, 198, 2, 'F');
		$pdf->Image('public/img/theme/logo.png', 10, 18, 25, 0, 'PNG');
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->cell(135, 5, '', 0);
		$pdf->cell(40, 5, 'UNA NUEVA MANERA DE CUIDAR', 0);
		$pdf->Ln(5);
		$pdf->cell(130, 5, '', 0);
		$pdf->cell(40, 5, 'TU SALUD Y DE LOS QUE MAS QUIERES', 0);
		$pdf->Ln(10);
		$pdf->cell(80, 5, '', 0);
		$pdf->cell(20, 5, 'RECETA DE MEDICAMENTOS', 0);

		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(34, 5, 'NOMBRE Y APELLIDOS:', 0);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(70, 5, $datospaciente->nombre . '' . $datospaciente->apellido, 0);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(10, 5, 'SEXO:', 0);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(20, 5, $datospaciente->sexo, 0);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(15, 5, 'CELULAR:', 0);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(15, 5, $datospaciente->telefono, 0);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(18, 5, 'DIRECCIÓN:', 0);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(86, 5, $datospaciente->direccion, 0);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(10, 5, 'EDAD:', 0);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(20, 5, $datospaciente->edad . ' AÑOS', 0);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(27, 5, 'HISTORIA CLINICA:', 0);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(70, 5, $datospaciente->hc, 0);

		$pdf->Ln(7);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(40, 5, 'ATENCION EN', 0);
		$pdf->Ln(7);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(35, 5, 'MEDICINA GENERAL', 0);
		$pdf->cell(5, 5, ' ', 1);
		$pdf->cell(40, 5, '', 0);
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->cell(37, 5, 'ECOGRAFIAS', 0);
		$pdf->cell(5, 5, ' ', 1);
		$pdf->cell(50, 5, '', 0);
		$pdf->Ln(6);
		$pdf->cell(35, 5, 'GINECOLOGIA', 0);
		$pdf->cell(5, 5, '', 1);
		$pdf->cell(50, 5, '', 0);
		$pdf->cell(37, 5, 'FARMACIA', 0);
		$pdf->cell(5, 5, '', 1);
		$pdf->cell(50, 5, '', 0);
		$pdf->Ln(6);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(35, 5, 'OSTETRICA', 0);
		$pdf->cell(5, 5, '', 1);
		$pdf->cell(50, 5, '', 0);
		$pdf->cell(37, 5, 'LABORATORIO CLINICO', 0);
		$pdf->cell(5, 5, '', 1);
		$pdf->cell(50, 5, '', 0);

		$pdf->Ln(13);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(40, 5, 'OTROS ________________________________________________________________________________________________', 0);
		$pdf->Ln(7);
		$pdf->cell(90, 5, 'DIAGNOSTICO   ( CIE10 )', 0);
		$pdf->Ln(7);
		$pdf->cell(10, 5, 'CANT', 1);
		$pdf->cell(55, 5, 'MEDICAMENTO O INSUMO', 1);
		$pdf->cell(30, 5, 'DOSIS', 1);
		$pdf->cell(40, 5, 'VIA DE APLICACION', 1);
		$pdf->cell(30, 5, 'FRECUENCIA', 1);
		$pdf->cell(30, 5, 'DURACION', 1);

		$pdf->Ln(5);
		foreach ($medicamentos->result() as $medicamento) {
			$pdf->SetFont('Arial', '', 8);
			$pdf->cell(10, 5, $medicamento->cantidad, 1);
			$pdf->cell(55, 5, strtoupper($medicamento->medicamento), 1);
			$pdf->cell(30, 5, strtoupper($medicamento->dosis), 1);
			$pdf->cell(40, 5, strtoupper($medicamento->via_aplicacion), 1);
			$pdf->cell(30, 5, $medicamento->frecuencia, 1);
			$pdf->cell(30, 5, $medicamento->duracion, 1);
			$pdf->Ln(5);
		}

		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(10, 5, 'INDICACIONES', 0);
		$pdf->SetFont('Arial', '', 7);
		$pdf->Ln(10);
		$pdf->multicell(270, 4, '', 0);

		$pdf->Ln(7);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(100, 5, strtoupper($this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido')), 0);
		$pdf->cell(50, 5, 'Fecha de Atención', 0);
		$pdf->Ln(3);
		$pdf->cell(100, 5, '_________________________________________', 0);
		$pdf->cell(50, 5, date('Y-m-d'), 0);
		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(100, 5, 'Quien Ordena', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(80, 5, '', 0);
		$pdf->cell(30, 5, '*** Fin del receta ***', 0);
		$pdf->Output('I', 'recetamedica.pdf');
	}

	public function formatoLaboratorioOrdenes($triage, $documento, $idlaboratorio)
	{
		$datospaciente = $this->Pacientes_model->getPacienteId($documento)->result()[0];
		$getLaboratorioPdf = $this->Historias_model->getLaboratorioPdf($idlaboratorio);

		$this->load->library('PDF_UTF8');
		$pdf = new PDF_UTF8();
		$pdf->AddPage();
		$pdf->SetAlpha(0.2);  // Transparencia (0.1 = 10% opacidad)
		$pdf->Image('public/img/theme/logo.png', 60, 60, 80);  // Ajusta las coordenadas y tamaño según necesites
		$pdf->SetAlpha(1);  // Restauramos la opacidad al 100%
		$pdf->SetDrawColor(0, 24, 0);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 40, 196, 6, 'F');
		$pdf->Image('public/img/theme/logo.png', 10, 20, 25, 0, 'PNG');
		$pdf->Ln(15);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->cell(124, 5, '', 0);
		// $pdf->cell(40,5, 'ORDEN DE INTERCONSULTA MEDICA', 0);
		$pdf->Ln(5);
		$pdf->cell(110, 5, '', 0);
		$pdf->cell(40, 5, 'SOLICITUD DE ESTUDIOS DE LABORATORIO', 0);

		$pdf->Ln(10);
		$pdf->SetFont('Courier', 'B', 8);

		// DATOS PERSONALES
		$pdf->Ln(6);
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'APELLIDOS Y NOMBRES', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(100, 5, $datospaciente->nombre . ' ' . $datospaciente->apellido, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'HC', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(46, 5, $datospaciente->hc, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'DNI', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(30, 5, $datospaciente->documento, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'EDAD', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(10, 5, $datospaciente->edad, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'SEXO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->sexo, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'TELEFONO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(46, 5, $datospaciente->telefono, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'DIRECCION', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(45, 5, $datospaciente->direccion, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'DEPARTAMENTO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->departamento, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'PROVINCIA', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(20, 5, $datospaciente->provincia, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'DISTRITO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(21, 5, $datospaciente->distrito, 1);

		$pdf->Ln(5);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'OCUPACION', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(100, 5, $datospaciente->ocupacion, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'ESTADO CIVIL', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(36, 5, $datospaciente->estado_civil, 1);
		$pdf->Ln(9);

		$pdf->Ln(5);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'CODIGO', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(163, 5, 'ANALISIS', 1);

		foreach ($getLaboratorioPdf->result() as $labo) {
			$pdf->Ln(5);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(20, 5, $labo->codigo_procedimientos, 1);
			$pdf->SetFont('Arial', '', 6);
			$pdf->cell(163, 5, $labo->nombre_procedimiento, 1);
		}

		$pdf->Ln(20);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(100, 5, $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido'), 0);
		$pdf->cell(30, 5, '', 0);
		$pdf->Ln(3);
		$pdf->cell(100, 5, '_________________________________________', 0);
		$pdf->cell(30, 5, '_________________________________________', 0);
		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(100, 5, 'Quien Ordena', 0);
		$pdf->cell(30, 5, 'Quien Recibe', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(100, 5, '', 0);
		$pdf->cell(30, 5, '*** Fin del reporte ***', 0);
		$pdf->Output('I', 'ordenlaboratorio.pdf');
	}

	public function formatoPatologiaOrdenamiento($triage, $documento)
	{
		$datospaciente = $this->Pacientes_model->getPacienteId($documento)->result()[0];
		$patologia = $this->Historias_model->getPatologiaPdf($triage, $documento)->result()[0];

		$this->load->library('PDF_UTF8');
		$pdf = new PDF_UTF8();
		$pdf->AddPage();
		$pdf->SetAlpha(0.2);  // Transparencia (0.1 = 10% opacidad)
		$pdf->Image('public/img/theme/logo.png', 60, 110, 80);  // Ajusta las coordenadas y tamaño según necesites
		$pdf->SetAlpha(1);  // Restauramos la opacidad al 100%
		$pdf->SetDrawColor(0, 24, 0);
		$pdf->SetFillColor(115, 115, 115);
		$pdf->Rect(10, 40, 196, 6, 'F');
		$pdf->Rect(10, 70, 196, 6, 'F');

		$pdf->Image('public/img/theme/logo.png', 10, 20, 25, 0, 'PNG');
		$pdf->Ln(15);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->cell(124, 5, '', 0);

		$pdf->Ln(5);
		$pdf->cell(110, 5, '', 0);
		$pdf->cell(40, 5, 'SOLICITUD DE ESTUDIOS PATOLOGICOS', 0);
		$pdf->Ln(10);
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(65, 6, '1. INFORMACIÓN', 0, 0, 'L');

		$pdf->Ln(6);
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(40, 5, 'APELLIDOS Y NOMBRES', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(156, 5, $datospaciente->nombre . ' ' . $datospaciente->apellido, 1);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'EDAD', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(50, 5, $datospaciente->edad . '  ' . 'AÑOS', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'SEXO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(50, 5, 'MASCULINO', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'TELEFONO', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(46, 5, $datospaciente->telefono, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(30, 5, 'MEDICO SOLICITANTE', 1);

		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(110, 5, 'JERSON REINEL GALVEZ ENSUNCHO', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(20, 5, 'ESTADO CIVIL', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->cell(36, 5, $datospaciente->estado_civil, 1);

		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(31, 5, 'MUESTRA', 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(50, 5, 'PAP', 1);
		if ($patologia->muestra == 'PAP') {
			$pdf->cell(5, 5, 'X', 1);
		} else {
			$pdf->cell(5, 5, '', 1);
		}

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(50, 5, 'CITOLOGICO', 1);
		if ($patologia->muestra == 'Citológico') {
			$pdf->cell(5, 5, 'X', 1);
		} else {
			$pdf->cell(5, 5, '', 1);
		}

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(50, 5, 'HISTOPATOLIGICO', 1);
		if ($patologia->muestra == 'Histopatológico') {
			$pdf->cell(5, 5, 'X', 1);
		} else {
			$pdf->cell(5, 5, '', 1);
		}
		$pdf->Ln(9);
		$pdf->SetFont('Courier', 'B', 8);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->cell(65, 6, '2. DATOS CLINICOS', 0, 0, 'L');

		$pdf->SetTextColor(0, 0, 0);
		$pdf->Ln(6);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'PARIDAD', 1);
		$pdf->cell(42, 5, $patologia->paridad, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'F.U.R', 1);
		$pdf->cell(42, 5, $patologia->fur, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(15, 5, 'FUP', 1);
		$pdf->cell(42, 5, $patologia->fup, 1);

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'SI', 1);
		if ($patologia->lactancia == 'S') {
			$pdf->cell(5, 5, 'X', 1);
		} else {
			$pdf->cell(5, 5, '', 1);
		}
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'NO', 1);
		if ($patologia->lactancia == 'N') {
			$pdf->cell(5, 5, 'X', 1);
		} else {
			$pdf->cell(5, 5, '', 1);
		}

		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'OTROS ANTECEDENTES:', 0);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', '', 7);
		$pdf->MultiCell(195, 4, $patologia->antecedentes, 0);

		$pdf->Ln(7);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'RESULTADO DE INFORMES ANTERIORES:', 0);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', '', 7);
		$pdf->MultiCell(195, 4, $patologia->resultados, 0);

		$pdf->Ln(7);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'HALLAZGOS:', 0);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', '', 7);
		$pdf->MultiCell(195, 4, 'Otros  ' . $patologia->hallazgos, 0);
		$pdf->Ln(7);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'DATOS CLINICOS O TEJIDOS A EXAMINAR:', 0);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', '', 7);
		$pdf->MultiCell(195, 4, $patologia->datos, 0);
		$pdf->Ln(7);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->cell(10, 5, 'DIAGNOSTICO:', 0);
		$pdf->Ln(5);
		$pdf->SetFont('Arial', '', 7);
		$pdf->MultiCell(195, 4, $patologia->diagnostico, 0);

		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->cell(100, 5, $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido'), 0);
		$pdf->cell(30, 5, '', 0);
		$pdf->Ln(3);
		$pdf->cell(100, 5, '_________________________________________', 0);
		$pdf->cell(30, 5, '_________________________________________', 0);
		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(100, 5, 'Quien Ordena', 0);
		$pdf->cell(30, 5, 'Quien Recibe', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);
		$pdf->cell(100, 5, '', 0);
		$pdf->cell(30, 5, '*** Fin del reporte ***', 0);

		$pdf->Output('I', 'ordenpatologicos.pdf');
	}

	// ACA CREAR LAS DOS FUNCIONES QUE VAN HACER LOS INSERT

	public function crearOrdenPatologica()
	{
		$nombre = $this->input->post('nombre');
		$documento = $this->input->post('documento');
		$triage = $this->input->post('triage');
		$edad = $this->input->post('edad');
		$sexo = $this->input->post('sexo');
		$medico = $this->input->post('medico');
		$muestra = $this->input->post('muestra');
		$paridad = $this->input->post('paridad');
		$fur = $this->input->post('fur');
		$fup = $this->input->post('fup');
		$lactancia = $this->input->post('lactancia');
		$antecedentes = $this->input->post('antecedentes');
		$resultados = $this->input->post('resultados');
		$hallazgos = $this->input->post('hallazgos');
		$datos = $this->input->post('datos');
		$diagnostico = $this->input->post('diagnostico');
		$fecha = $this->input->post('fecha');

		$data = [
			'nombre' => $nombre,
			'documento' => $documento,
			'triage' => $triage,
			'edad' => $edad,
			'sexo' => $sexo,
			'medico' => $medico,
			'muestra' => $muestra,
			'paridad' => $paridad,
			'fur' => $fur,
			'fup' => $fup,
			'lactancia' => $lactancia,
			'antecedentes' => $antecedentes,
			'resultados' => $resultados,
			'hallazgos' => $hallazgos,
			'datos' => $datos,
			'diagnostico' => $diagnostico,
			'fecha' => $fecha
		];

		$this->Historias_model->crearOrdenPatologica($data);
	}

	public function crearOrdenLaboratorio()
	{
		$documento = $this->input->post('documento');
		$nombre = $this->input->post('nombre');
		$edad = $this->input->post('edad');
		$medico = $this->input->post('medico');
		$triage = $this->input->post('triage');
		$ordenlab = $this->input->post('ordenlab');
		$fecha = date('Y-m-d');

		$data = [
			'documento' => $documento,
			'nombre' => $nombre,
			'edad' => $edad,
			'medico' => $medico,
			'triage' => $triage,
			'servicio' => 'Laboratorio',
			'fecha' => $fecha
		];
		$id = $this->Historias_model->crearOrdenLaboratorio($data);

		for ($i = 0; $i < sizeof($ordenlab); $i++) {
			$data2 = [
				'codigo_lab' => $id,
				'servicio' => $ordenlab[$i],
				'fecha' => $fecha
			];
			$this->Historias_model->creardetallelaboratorioOrden($data2);
		}
	}

	public function borrarArchivoPdf()
	{
		$codigo = $this->input->post('codigo');
		$tipoarchivo = $this->input->post('tipoarchivo');
		$archivo = $this->input->post('archivo');

		if ($tipoarchivo == 'HF') {
			$link = 'public/documentos/' . $archivo;
		} else if ($tipoarchivo == 'LB') {
			$link = 'public/documentos/' . $archivo;
		} else if ($tipoarchivo == 'PA') {
			$link = 'public/documentos/' . $archivo;
		}

		$this->Historias_model->borrarArchivoPdf($codigo);
		unlink($link);
	}
}
