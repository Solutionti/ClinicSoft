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
		$eco = $this->Historias_model->getEcografias($documento);
		$tomografias = $this->Historias_model->getTomografias($documento);
		$resonancias = $this->Historias_model->getResonancias($documento);

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
		// $farmaciaMedicamento = $this->Historias_model->getMedicamentosFarmacia();
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
			'eco' => $eco,
			'tomografias' => $tomografias,
			'resonancias' => $resonancias,
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
			// 'medicamentofarmacias' => $farmaciaMedicamento
		];
		$this->load->view('administrador/historiaclinica', $data);
	}

	public function crearConsecutivoHC() {
		$paciente = $this->input->post('paciente');
		$triage = $this->input->post('triaje');
		$tipo = $this->input->post('tipo');
		if($tipo == 1 ) {
		  $validar = $this->Historias_model->validarexistentegeneral($triage, $paciente);
		  if($validar == 1) {
	        echo "error";
		  }
		  else {
			  $data1 = [
				  'paciente' => $this->input->post('paciente'),
				  'doctor' => $this->session->userdata('codigo'),
				  'triaje' => $this->input->post('triaje'),
				  'tipo' => $this->input->post('tipo'),
			  ];
			  $this->Historias_model->crearHistorialPacientesGinecologicas($data1);
		  }

		}
		else if($tipo == 2) {
		  $validar = $this->Historias_model->validarexistenteginecologia($triage, $paciente);
		  if($validar == 1) {
	        echo "error";
		  }
		  else {
			  $data1 = [
				  'paciente' => $this->input->post('paciente'),
				  'doctor' => $this->session->userdata('codigo'),
				  'triaje' => $this->input->post('triaje'),
				  'tipo' => $this->input->post('tipo'),
			  ];
			  $this->Historias_model->crearHistorialPacientesGinecologicas($data1);
		  }
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
		$procedimientos = $this->input->post('procedimientoss');
		$interconsultas = $this->input->post('interconsultas');
		$tratamiento = $this->input->post('tratamiento');
		$referencia = $this->input->post('referencia');
		$cita = $this->input->post('cita');
		$firma = $this->input->post('firma');
		$piel = $this->input->post('piel');
		$procedimientos_seleccionados = $this->input->post('procedimientos_seleccionados');

		$data2 = [
			'paciente' => $paciente,
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
			'piel' => $piel
		];

		$id = $this->Historias_model->crearHconsultasGeneral($data2);
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
		$plan_trabajo = $this->input->post('plan_trabajo');
		$proxima_cita = $this->input->post('proxima_cita');
		$firma_medico = $this->input->post('firma_medico');
		$tratamiento = $this->input->post('tratamientos_gine');

		$data2 = [
			'paciente' => $paciente,
			'doctor' => $doctor,
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
		
		$historia = $this->Historias_model->crearHconsultasGinecologicas($data2);
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
		$especialidad = $this->input->post('especialidad');
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
			'especialidad' => $especialidad,
		];

		$this->Historias_model->crearMedicamento($datos);
	}

	public function crearPdfHistoriaClinica($triage, $documento)
    {
        // 1. CARGA DE DATOS DE LA BASE DE DATOS
        $datospaciente = $this->Pacientes_model->getPacienteId($documento)->result()[0];
        $datostriage = $this->Historias_model->getUltimoDatoTriage($documento)->result()[0];
        $datosgeneral = $this->Historias_model->GenerarPdfMedicinaGeneral($documento, $triage)->result()[0];
        $datosalergias = $this->Historias_model->getAllAlergias($documento);
        $datosmedicamentos = $this->Historias_model->getMedicamentosHistoria($documento, $triage);
        $datosdiagnosticos = $this->Historias_model->getDiagnosticosHistoria($documento, $triage);

        // 2. INICIALIZAR PDF
        $this->load->library('PDF_UTF8');
        $pdf = new PDF_UTF8();
        $pdf->SetAutoPageBreak(false); // Desactiva salto automático para control manual
        $pdf->AddPage();

        // --- FUNCIÓN AUXILIAR PARA DIBUJAR LÍNEAS DE FORMULARIO ---
        // Esta función dibuja: "Etiqueta: _______________"
        if (!function_exists('lineaFormulario')) {
            function lineaFormulario($pdf, $label, $valor, $anchoTotal, $saltoLinea = 0) {
                $pdf->SetFont('Arial', 'B', 8);
                $label_final = utf8_decode($label);
                
                // Calculamos ancho de la etiqueta
                $anchoLabel = $pdf->GetStringWidth($label_final) + 1;
                
                // 1. Imprimimos Etiqueta
                $pdf->Cell($anchoLabel, 5, $label_final, 0, 0, 'L');
                
                // 2. Imprimimos Valor con Subrayado ('B')
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell($anchoTotal - $anchoLabel, 5, utf8_decode($valor), 'B', $saltoLinea, 'L');
            }
        }

        // --- MARCA DE AGUA (LOGO DE FONDO) ---
        $pdf->SetAlpha(0.1); // Transparencia suave
        $pdf->Image('public/img/theme/logo.png', 50, 100, 110);
        $pdf->SetAlpha(1);   // Restaurar opacidad

        // --- LOGO PEQUEÑO ESQUINA ---
        $pdf->Image('public/img/theme/logo.png', 10, 8, 25);

        // --- TÍTULO PRINCIPAL ---
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->Cell(0, 10, ('HISTORIA CLÍNICA GENERAL'), 0, 1, 'C');

        // --- VALIDACIÓN DE FECHA Y HORA (EVITA ERRORES) ---
        $fecha_doc = (isset($datosgeneral->fecha)) ? date('d/m/Y', strtotime($datosgeneral->fecha)) : date('d/m/Y');
        $hora_doc  = (isset($datosgeneral->hora))  ? date('H:i', strtotime($datosgeneral->hora))  : date('H:i');

        // ==========================================================
        // PARTE 1: DATOS DE FILIACIÓN (ESTILO CUADROS CERRADOS)
        // ==========================================================
        $pdf->SetFillColor(240, 240, 240); // Fondo gris claro opcional para títulos
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Ln(5);

        // FILA 1: Fecha | Hora | Edad | Sexo
        $pdf->Cell(15, 6, 'FECHA:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(25, 6, $fecha_doc, 1, 0, 'C');
        
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(15, 6, 'HORA:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(20, 6, $hora_doc, 1, 0, 'C');

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(15, 6, 'EDAD:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(50, 6, ($datospaciente->edad . ' años'), 1, 0, 'L');

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(15, 6, 'SEXO:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(35, 6, $datospaciente->sexo, 1, 1, 'L');

        // FILA 2: Nombres y Apellidos
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(40, 6, 'NOMBRES Y APELLIDOS:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(150, 6, utf8_decode($datospaciente->apellido . ' ' . $datospaciente->nombre), 1, 1, 'L');

        // FILA 3: Domicilio | Teléfono
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(20, 6, 'DOMICILIO:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(110, 6, utf8_decode(substr($datospaciente->direccion, 0, 60)), 1, 0, 'L');
        
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(20, 6, ('TELÉFONO:'), 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(40, 6, $datospaciente->telefono, 1, 1, 'L');

        // FILA 4: Empresa / Acompañante
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(20, 6, 'EMPRESA:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(70, 6, ($datosgeneral->empresa), 1, 0, 'L');
        
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(25, 6, ('ACOMPAÑANTE:'), 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(75, 6, ($datosgeneral->nombre_acompanante), 1, 1, 'L');

        $pdf->Ln(4);

        // ==========================================================
        // PARTE 2: A. ANAMNESIS (ESTILO LÍNEAS SUBRAYADAS)
        // ==========================================================
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220); // Barra gris de título
        $pdf->Cell(0, 6, 'A. ANAMNESIS', 1, 1, 'L', true);
        
        $pdf->Ln(2);
        
        // --- Bloque Motivo (Izq) y Tratamiento (Der) ---
        $y_inicio = $pdf->GetY();
        
        // Columna Izquierda: Motivo
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(35, 5, 'MOTIVO DE CONSULTA:', 0, 0);
        $pdf->Ln(5); 
        $pdf->SetFont('Arial', '', 8);
        // MultiCell para que si el texto es largo baje de línea
        $pdf->MultiCell(90, 5, utf8_decode($datosgeneral->motivo_consulta), 'B', 'L');
        $altura_motivo = $pdf->GetY();

        // Columna Derecha: Tratamiento Anterior
        $pdf->SetXY(110, $y_inicio); // Movemos cursor a la derecha
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(40, 5, 'TRATAMIENTO ANTERIOR:', 0, 1);
        $pdf->SetXY(110, $y_inicio + 5);
        $pdf->SetFont('Arial', '', 8);
        $pdf->MultiCell(90, 5, utf8_decode($datosgeneral->tratamiento_anterior), 'B', 'L');
        
        // Igualamos altura (nos quedamos con la más baja para seguir escribiendo)
        $pdf->SetY(max($altura_motivo, $pdf->GetY()) + 2);

        // --- Enfermedad Actual ---
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(40, 5, 'ENFERMEDAD ACTUAL:', 0, 0);
        
        lineaFormulario($pdf, 'TIEMPO ENF:', utf8_encode($datosgeneral->tiempo), 50, 0);
        $pdf->Cell(2, 5, '', 0, 0); // Espacio
        lineaFormulario($pdf, 'INICIO:', $datosgeneral->inicio, 45, 0);
        $pdf->Cell(2, 5, '', 0, 0); // Espacio
        lineaFormulario($pdf, 'CURSO:', $datosgeneral->curso, 50, 1);

        $pdf->Ln(2);
        
        // --- Síntomas ---
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(190, 5, 'SINTOMAS Y SIGNOS PRINCIPALES:', 0, 1);
        $pdf->SetFont('Arial', '', 8);
        $pdf->MultiCell(190, 5, utf8_decode($datosgeneral->sintomas), 'B', 'L');

        // --- Signos Vitales (Tira horizontal con líneas separadoras) ---
        $pdf->Ln(3);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Línea Arriba
        $pdf->Ln(1);
        
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(27, 5, 'SIGNOS VITALES:', 0, 0);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(28, 5, 'PA: '.$datostriage->presion_arterial.' mmHg', 0, 0);
        $pdf->Cell(20, 5, 'FR: '.$datostriage->frecuencia_respiratoria.' rpm', 0, 0);
        $pdf->Cell(23, 5, 'FC: '.$datostriage->frecuencia_cardiaca.' lpm', 0, 0);
        $pdf->Cell(20, 5, 'T: '.$datostriage->temperatura.('°'), 0, 0);
        $pdf->Cell(25, 5, 'SpO2: '.$datostriage->saturacion.'%', 0, 0);
        $pdf->Cell(25, 5, 'Peso: '.$datostriage->peso.'kg', 0, 0);
        $pdf->Cell(25, 5, 'Talla: '.$datostriage->talla.'cm', 0, 1);
        
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Línea Abajo

        // --- Funciones Biológicas ---
        $pdf->Ln(2);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(38, 5, 'FUNCIONES BIOLOGICAS:', 0, 0);
        lineaFormulario($pdf, ' Apetito:', $datosgeneral->apetito, 50, 0);
        lineaFormulario($pdf, ' Sed:', $datosgeneral->sed, 40, 0);
        lineaFormulario($pdf, ' Orina:', $datosgeneral->orina, 40, 1);

        // ==========================================================
        // PARTE 3: B. EXAMEN FÍSICO (LISTA VERTICAL)
        // ==========================================================
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, ('B. EXAMEN FÍSICO'), 1, 1, 'L', true);
        $pdf->Ln(1);

        $campos_fisicos = [
            '1. CABEZA' => $datosgeneral->cabeza,
            '2. CUELLO' => $datosgeneral->cuello,
            '3. AP. RESPIRATORIO' => $datosgeneral->ap_respiratoria,
            '4. AP. CARDIOVASCULAR' => $datosgeneral->ap_cardio,
            '5. ABDOMEN' => $datosgeneral->abdomen,
            '6. AP. GENITOURINARIO' => '', 
            '7. LOCOMOTOR' => $datosgeneral->loco_motor,
            '8. SISTEMA NERVIOSO' => $datosgeneral->sistema_nervioso,
        ];

        foreach ($campos_fisicos as $label => $valor) {
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(35, 5, $label . ':', 0, 0);
            $pdf->SetFont('Arial', '', 8);
            // La línea ('B') ocupa todo el ancho restante
            $pdf->Cell(155, 5, utf8_decode($valor), 'B', 1); 
        }

        // ==========================================================
        // PARTE 4: C. DIAGNÓSTICO (CIE 10)
        // ==========================================================
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(0, 6, ('C. DIAGNÓSTICO (CIE 10)'), 1, 1, 'L', true);
        $pdf->Ln(2);

        $diagnosticos = ($datosdiagnosticos) ? $datosdiagnosticos->result() : [];
        $pdf->Ln(2);
        // Imprimimos 3 líneas fijas
        for ($i = 0; $i < 3; $i++) {
            $txt = isset($diagnosticos[$i]) ? $diagnosticos[$i]->descripcion . ' (' . $diagnosticos[$i]->clave . ')' : '';
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(10, 5, ($i+1).'.', 0, 0, 'R');
            $pdf->SetFont('Arial', '', 8);
            // Acortamos la línea de texto y ampliamos la celda de paréntesis
            $pdf->Cell(140, 5, utf8_decode($txt), 'B', 0); 
            $pdf->Cell(40, 5, '(      )', 0, 1, 'L'); // Paréntesis para Tipo de DX, más pegados a la izquierda
        }

        // ==========================================================
        // PARTE 5: D. PLAN DE TRABAJO Y TRATAMIENTO
        // ==========================================================
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(0, 6, ('D. PLAN DE TRABAJO / TRATAMIENTO'), 1, 1, 'L', true);
		$pdf->Ln(2);
        lineaFormulario($pdf, 'EXAMEN DE AYUDA AL DX:', $datosgeneral->examen_dx, 190, 1);
        lineaFormulario($pdf, 'PROCEDIMIENTOS:', '', 190, 1);
		lineaFormulario($pdf, 'INTERCONSULTAS:', '', 190, 1);
		lineaFormulario($pdf, 'REFERENCIAS:', '', 190, 1);
        
        $pdf->Ln(2);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(0, 5, 'E. TRATAMIENTO:', 0, 1);
        
        $meds = ($datosmedicamentos) ? $datosmedicamentos->result() : [];
        // Imprimimos 4 líneas de tratamiento
        for ($i = 0; $i < 4; $i++) { 
            $txt = isset($meds[$i]) ? $meds[$i]->medicamento . ' ' . $meds[$i]->dosis . ' ' . $meds[$i]->frecuencia : '';
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(10, 5, ($i+1).'.', 0, 0, 'R');
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell(180, 5, utf8_decode($txt), 'B', 1);
        }

        // ==========================================================
        // PIE DE PÁGINA: PRÓXIMA CITA Y FIRMA
        // ==========================================================
        $pdf->SetY(-35); // Posicionamos al final de la hoja
        $y_pie = $pdf->GetY();

        // Próxima Cita (Izq)
        $pdf->SetFont('Arial', 'B', 8);
        // Acercamos el inicio de la línea al título
        $pdf->Cell(25, 5, 'F. PROXIMA CITA:', 0, 0);
        $pdf->Cell(50, 5, '', 'B', 0); 

        // Firma del Médico (Der)
        // Dibujamos línea superior para la firma
        $pdf->SetXY(120, $y_pie + 12);
        $pdf->Cell(70, 4, 'FIRMA Y SELLO DEL MEDICO RESPONSABLE', 'T', 0, 'C'); 

        // Salida del PDF
        $pdf->Output('I', 'Historia_Medicina_General_' . $documento . '.pdf');
    }

	public function crearPdfHistoriaClinicaGinecologica($triage, $documento)
{
    // 1. CARGA DE DATOS (Misma lógica tuya)
    $datospaciente = $this->Pacientes_model->getPacienteId($documento)->result()[0];
    $datostriage = $this->Historias_model->getUltimoDatoTriage($documento)->result()[0]; // Ojo: asegúrate que este método traiga el triage específico si es necesario
    $datosgineco = $this->Historias_model->GenerarPdfGinecologia($documento, $triage)->result()[0];
    
    $datosalergias = $this->Historias_model->getAllAlergias($documento);
    $datosmedicamentos = $this->Historias_model->getMedicamentosHistoria($documento, $triage);
    $datosdiagnosticos = $this->Historias_model->getDiagnosticosHistoria($documento, $triage);

    // 2. INICIALIZACIÓN DEL PDF
    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->AddPage();

	$pdf->SetAlpha(0.1);
    $pdf->Image('public/img/theme/logo.png', 50, 100, 110);
    $pdf->SetAlpha(1);
	$pdf->Image('public/img/theme/logo.png', 10, 5, 23);
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(true, 10);

    // --- CABECERA ---
    // Título Rojo
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetTextColor(255, 0, 0); // Rojo
    $pdf->Cell(0, 10, ('HISTORIA CLÍNICA GINECOLÓGICA'), 0, 1, 'C');
    $pdf->SetTextColor(0, 0, 0); // Volver a Negro

    // --- BLOQUE CORREGIDO DE FECHA Y HORA ---
    // 1. Validamos qué fecha usar (Si no viene del triaje, usamos HOY)
    $fecha_impresion = (isset($datosgineco->fecha)) ? $datosgineco->fecha : date('Y-m-d');
    $hora_impresion  = (isset($datosgineco->hora))  ? $datosgineco->hora  : date('H:i:s');

    // Caja de Fecha
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(15, 6, 'FECHA:', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(30, 6, date('d-m-Y', strtotime($fecha_impresion)), 1, 0, 'C');
    
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(115, 6, '', 1, 0, 'L'); // Espacio vacío
    
    // Caja de Hora
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(12, 6, 'HORA:', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(18, 6, date('H:i', strtotime($hora_impresion)), 1, 1, 'C');
    //

    // Fila: Apellidos y Nombres
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(40, 6, 'APELLIDOS Y NOMBRES:', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(150, 6, utf8_decode($datospaciente->apellido . ' ' . $datospaciente->nombre), 1, 1, 'L');

    // Fila: Edad y Sexo
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(15, 6, 'EDAD:', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(80, 6, ($datospaciente->edad. ' años'), 1, 0, 'L');
    
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(15, 6, 'SEXO:', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(80, 6, utf8_decode($datospaciente->sexo), 1, 1, 'L');

    $pdf->Ln(2); // Pequeño espacio

    // --- ANTECEDENTES ---
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 5, 'ANTECEDENTES:', 0, 1, 'L');

    // Función auxiliar para dibujar líneas de formulario: Etiqueta + Valor subrayado
   // Función auxiliar corregida para que la línea pegue exacto al texto
    function lineaFormulario($pdf, $label, $valor, $anchoTotal, $saltoLinea = 0) {
        $pdf->SetFont('Arial', 'B', 8);
        
        // 1. Decodificamos PRIMERO para que FPDF mida el tamaño real de la letra
        $label_final = ($label); 
        
        // 2. Calculamos el ancho exacto (+1 de espacio pequeño)
        $anchoLabel = $pdf->GetStringWidth($label_final) + 1; 
        
        // 3. Imprimimos la etiqueta
        $pdf->Cell($anchoLabel, 5, $label_final, 0, 0, 'L');
        
        // 4. Imprimimos el valor subrayado
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell($anchoTotal - $anchoLabel, 5, utf8_decode($valor), 'B', $saltoLinea, 'L'); 
    }

    // Familiares
    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf, 'FAMILIARES:', $datosgineco->familiares, 185, 1);
    
    // Patológicos
    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf, 'PATOLÓGICOS:', $datosgineco->patologicos, 185, 1);

    // Gineco - Obstétricos (Menarquia en tu DB)
    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf, 'GINECO - OBSTÉTRICOS:', $datosgineco->gineco_obstetrico, 185, 1);

    // FUM y RM
    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf, 'FUM:', $datosgineco->fum, 80, 0);
    $pdf->Cell(5, 5, '', 0, 0); // Espacio
    lineaFormulario($pdf, 'RM (Ret. Menstr.):', $datosgineco->rm, 100, 1);

    // Flujo y Parejas
    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf, 'FLUJO GENITAL:', $datosgineco->flujo_genital, 100, 0);
    $pdf->Cell(5, 5, '', 0, 0);
    lineaFormulario($pdf, 'N° DE PAREJAS:', $datosgineco->no_de_parejas, 80, 1);

    // Gestas, Partos, Abortos
    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf, 'GESTAS:', $datosgineco->gestas, 50, 0);
    $pdf->Cell(5, 5, '', 0, 0);
    lineaFormulario($pdf, 'PARTOS:', $datosgineco->partos, 50, 0);
    $pdf->Cell(5, 5, '', 0, 0);
    lineaFormulario($pdf, 'ABORTOS:', $datosgineco->abortos, 70, 1);

    // --- ANTICONCEPTIVOS (Campo normal) ---
    $pdf->Cell(5, 5, '-', 0, 0);
    
    // 1. Anticonceptivos (Ancho 75)
    lineaFormulario($pdf, 'ANTICONCEPTIVOS:', $datosgineco->anticonceptivos, 75, 0);
    
    // Espacio separador
    $pdf->Cell(5, 5, '', 0, 0);
    
    // 2. Tipo (Ancho 50)
    lineaFormulario($pdf, 'TIPO:', $datosgineco->tipo, 50, 0);

    // Espacio separador
    $pdf->Cell(5, 5, '', 0, 0);

    // 3. Tiempo (Ancho 50 y Salto de línea = 1)
    lineaFormulario($pdf, 'TIEMPO:', $datosgineco->tiempo, 50, 1);

    // Cirugía
    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf,('CIRUGÍA GINECOLÓGICA:'), $datosgineco->cirugia_ginecologica, 185, 1);

    // Otros
    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf, 'OTROS:', $datosgineco->otros, 185, 1);

    // PAP y Hijos
    // Validamos si hay fecha para no imprimir "01/01/1970" si está vacío
    $fecha_pap_formato = ($datosgineco->fecha_pap && $datosgineco->fecha_pap != '0000-00-00') 
                         ? date('d/m/Y', strtotime($datosgineco->fecha_pap)) 
                         : '';

    $pdf->Cell(5, 5, '-', 0, 0);
    lineaFormulario($pdf, 'FECHA DE PAP:', $fecha_pap_formato, 90, 0);
    $pdf->Cell(5, 5, '', 0, 0);
    $pdf->Cell(5, 5, '', 0, 0);
    lineaFormulario($pdf, 'N° HIJOS:', $datosgineco->no_hijos, 85, 1);


    // --- MOTIVO DE CONSULTA ---
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(40, 5, 'MOTIVO DE CONSULTA:', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(150, 5, utf8_decode($datosgineco->motivo_consulta), 'B', 1, 'L');
    $pdf->Cell(190, 5, '', 'B', 1, 'L'); // Línea extra para escribir a mano si es necesario

    // --- SIGNOS Y SINTOMAS ---
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(40, 5, 'SIGNOS Y SINTOMAS:', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(150, 5, utf8_decode($datosgineco->signossintomas), 'B', 1, 'L');

    // --- EXAMEN FISICO ---
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 5, 'EXAMEN FISICO:', 0, 1, 'L');

    // Signos Vitales (Tira gris o simple línea)
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(5, 5, '-', 0, 0);
    $pdf->Cell(25, 5, 'SIGNOS VITALES:', 0, 0);
    
    $pdf->SetFont('Arial', '', 8);
   // Signos Vitales con Unidades
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(28, 5, 'P/A: '.$datostriage->presion_arterial.' mmHg', 'B', 0);
    $pdf->Cell(22, 5, 'FR: '.$datostriage->frecuencia_respiratoria.' rpm', 'B', 0);
    $pdf->Cell(22, 5, 'FC: '.$datostriage->frecuencia_cardiaca.' lpm', 'B', 0);
    $pdf->Cell(20, 5, 'T: '.$datostriage->temperatura. (' °C'), 'B', 0);
    $pdf->Cell(22, 5, 'Peso: '.$datostriage->peso.' kg', 'B', 0);
    $pdf->Cell(22, 5, 'Talla: '.$datostriage->talla.' cm', 'B', 0);
    $pdf->Cell(25, 5, 'IMC: '.$datostriage->imc, 'B', 1);

    // Lista de Examen Físico (Vertical, como en la imagen)
    $campos_examen = [
        'PIEL Y TCSC:' => $datosgineco->piel_tscs,
        'TIROIDES:' => $datosgineco->tiroides,
        'MAMAS:' => $datosgineco->mamas,
        'A. RESPIRATORIO:' => $datosgineco->arespiratorio,
        'A. CARDIOVASCULAR:' => $datosgineco->acardiovascular,
        'ABDOMEN:' => $datosgineco->abdomen,
        'A. GENITO - URINARIO:' => $datosgineco->genito_urinario,
        'TACTO RECTAL:' => $datosgineco->tacto_rectal,
        'LOCOMOTOR:' => $datosgineco->locomotor,
        'SISTEMA NERVIOSO:' => $datosgineco->sistema_nervioso,
    ];

    foreach($campos_examen as $label => $valor) {
        $pdf->Cell(5, 5, '-', 0, 0);
        lineaFormulario($pdf, $label, $valor, 185, 1);
    }

    // --- EXAMENES AUXILIARES ---
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(40, 5, 'EXAMENES AUXILIARES:', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(150, 5, utf8_decode($datosgineco->examenes_auxiiliares), 'B', 1, 'L');

    // --- DIAGNOSTICO (CIE10) ---
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 5, 'DIAGNOSTICO: (CIE10)', 0, 1, 'L');
    
    // Convertir diagnósticos a array para iterar
    $diagnosticos_lista = [];
    if ($datosdiagnosticos) {
        foreach ($datosdiagnosticos->result() as $d) {
            $diagnosticos_lista[] = $d->descripcion . ' (' . $d->clave . ')';
        }
    }

    // Imprimir 2 líneas fijas mínimo (como la imagen 1. y 2.)
    for ($i = 0; $i < 3; $i++) {
        $texto = isset($diagnosticos_lista[$i]) ? $diagnosticos_lista[$i] : '';
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(10, 5, ($i + 1) . '.', 0, 0, 'C');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(150, 5, utf8_decode($texto), 'B', 0, 'L');
        $pdf->Cell(30, 5, '(       )', 'B', 1, 'C'); // Paréntesis tipo/estado
    }

    // --- PLAN DE TRABAJO ---
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 5, 'PROCEDIMIENTOS:', 0, 1, 'L');
    
    // Si tienes un campo de texto largo para plan, lo usamos, si no, lineas vacias
    $plan_texto = $datosgineco->plan_trabajo; 
    // Dividimos por saltos de línea si es necesario o simplemente imprimimos
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10, 5, '1.', 0, 0, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(180, 5, utf8_decode($plan_texto), 'B', 1, 'L');
    // Líneas adicionales vacías para rellenar
    $pdf->Cell(10, 5, '2.', 0, 0, 'C');
    $pdf->Cell(180, 5, '', 'B', 1, 'L');
    $pdf->Cell(10, 5, '3.', 0, 0, 'C');
    $pdf->Cell(180, 5, '', 'B', 1, 'L');

    // --- TRATAMIENTO ---
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 5, 'TRATAMIENTO:', 0, 1, 'L');

    $medicamentos_lista = [];
    if ($datosmedicamentos) {
        foreach ($datosmedicamentos->result() as $m) {
            $medicamentos_lista[] = $m->medicamento . ' ' . $m->dosis . ' (' . $m->frecuencia . ' x ' . $m->duracion . ')';
        }
    }

    for ($i = 0; $i < 3; $i++) {
        $texto = isset($medicamentos_lista[$i]) ? $medicamentos_lista[$i] : '';
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(10, 5, ($i + 1) . '.', 0, 0, 'C');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(180, 5, utf8_decode($texto), 'B', 1, 'L');
    }

    // --- PIE DE PAGINA (Cuadros) ---
    $pdf->Ln(10);
    $y_footer = $pdf->GetY();

    // Cuadro Próxima Cita
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(100, 15, '', 1, 0); // Caja vacía borde
    $pdf->SetXY(12, $y_footer + 2);
    $pdf->Cell(30, 5, 'PROXIMA CITA:', 0, 0);
    $pdf->SetXY(40, $y_footer + 5);
    $pdf->Cell(60, 0, utf8_decode($datosgineco->proxima_cita), 'B', 0); // Línea subrayada

    // Cuadro Firma Médico (Lado Derecho, estilo sello)
    $pdf->SetXY(120, $y_footer - 5); // Subimos un poco para dar espacio al sello
    $pdf->SetFont('Arial', 'B', 7);
    
    // Caja para la firma/sello azul
    $pdf->SetDrawColor(0, 150, 200); // Color cian/azul similar a la imagen
    $pdf->Rect(120, $y_footer - 5, 70, 25);
    $pdf->SetDrawColor(0, 0, 0); // Reset color negro
    
    // Texto Firma
    $pdf->SetXY(120, $y_footer + 15);
    $pdf->Cell(70, 5, 'FIRMA DEL MEDICO', 0, 0, 'C');
    
    // Nombre Doctor (Debajo)
    $pdf->SetXY(120, $y_footer + 12);
    // Si tienes el dato del doctor en una variable, ponlo aquí, ej:
    $pdf->SetFont('Arial', '', 6);
    // $pdf->Cell(70, 3, 'DR. JERSON GALVEZ', 0, 0, 'C'); 


    $pdf->Output('I', 'Historia_Clinica_Ginecologica_' . $documento . '.pdf');
}

	public function formatoMedicamentosOrdenamiento($paciente, $triaje)
    {
        $datospaciente = $this->Pacientes_model->getPacienteId($paciente)->result()[0];
        $medicamentos = $this->Historias_model->formatoMedicamentosOrdenamiento($paciente, $triaje);
        
        $this->load->library('PDF_UTF8');
        $pdf = new PDF_UTF8();
        
        // Orientación Vertical ('P')
        $pdf->SetAutoPageBreak(false);
        $pdf->AddPage('P');
        
        // --- LÍNEA DIVISORIA HORIZONTAL (Corte de media hoja A4) ---
        // Se dibuja en Y = 148.5 mm (Mitad exacta de la altura A4 que es 297mm)
        $pdf->SetDrawColor(180, 180, 180);
        $x_line = 5;
        while ($x_line < 205) {
            $pdf->Line($x_line, 148.5, $x_line + 3, 148.5); 
            $x_line += 6; 
        }
        $pdf->SetDrawColor(0, 0, 0);

        // Variables de posición (2 Columnas en la mitad superior)
        $x_izq = 8;
        $x_der = 108; // Mitad de la hoja (105) + margen
        $w_col = 94;  // Ancho de cada recuadro
        
        // --- CABECERAS (Izquierda y Derecha son idénticas en la foto) ---
        $columnas = [$x_izq, $x_der];
        
        foreach ($columnas as $x) {
            // Logo
            $pdf->Image('public/img/theme/logo.png', $x, 8, 26);
            
            // Textos Azules
            $pdf->SetTextColor(0, 102, 204);
            $pdf->SetFont('Arial', 'B', 6);
            $pdf->SetXY($x + 30, 12);
            $pdf->Cell(50, 3, utf8_decode("UNA NUEVA MANERA DE CUIDAR"), 0, 1, 'C');
            $pdf->SetX($x + 30);
            $pdf->Cell(50, 3, utf8_decode("TU SALUD Y DE LOS QUE MAS QUIERES."), 0, 1, 'C');
            
            // Textos Rojos (Direcciones y Teléfonos)
            $pdf->SetTextColor(180, 20, 40); 
            $pdf->SetFont('Arial', '', 6);
            $pdf->SetXY($x, 22);
            $pdf->Cell($w_col, 3, utf8_decode('Av. Salaverry 1402 - Urb. Bancarios - Chiclayo (Costado de Condominios Colibrí)'), 0, 1, 'C');
            $pdf->SetX($x);
            $pdf->Cell($w_col, 3, utf8_decode('074600891 - 902 720 312'), 0, 1, 'C');
            $pdf->SetX($x);
            $pdf->Cell($w_col, 3, utf8_decode('Jr. Juan Ugaz 622 - Santa Cruz - 948 608 819 - CLINICA "MI SALUD"'), 0, 1, 'C');
            
            // Línea Azul Separadora
            $pdf->SetDrawColor(0, 102, 204);
            $pdf->Line($x, 31, $x + $w_col, 31);
            $pdf->SetDrawColor(0, 0, 0); 
        }

        // Restaurar color a negro para el contenido
        $pdf->SetTextColor(0, 0, 0);

        // ==========================================================
        // LADO IZQUIERDO: RECETA (FARMACIA)
        // ==========================================================
        
        // Nombres
        $pdf->SetXY($x_izq, 33);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(30, 4, 'Apellidos y Nombres : ', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(64, 4, utf8_decode($datospaciente->apellido . ' ' . $datospaciente->nombre), 'B', 1);

        // ATENCIÓN EN (Grilla tipo checkbox)
        $pdf->SetXY($x_izq, 39);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetTextColor(0, 102, 204); // Azul
        $pdf->Cell($w_col, 4, ('ATENCIÓN EN:'), 0, 1);
        
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $y_grid = $pdf->GetY();
        
        // Fila 1
        $pdf->SetXY($x_izq, $y_grid);
        $pdf->Cell(22, 4, 'Medicina General', 0, 0); $pdf->Cell(4, 3, '', 1, 0); $pdf->Cell(2, 4, '', 0, 0);
        $pdf->Cell(20, 4, 'Ecografias', 0, 0); $pdf->Cell(4, 3, '', 1, 0); $pdf->Cell(12, 4, '', 0, 0);
        $pdf->Cell(8, 4, 'Edad', 0, 0); $pdf->Cell(22, 4, $datospaciente->edad, 1, 1, 'C');
        
        // Fila 2
        $y_grid += 4;
        $pdf->SetXY($x_izq, $y_grid);
        $pdf->Cell(22, 4, 'Ginecologia', 0, 0); $pdf->Cell(4, 3, '', 1, 0); $pdf->Cell(2, 4, '', 0, 0);
        $pdf->Cell(20, 4, 'Farmacia', 0, 0); $pdf->Cell(4, 3, '', 1, 0); $pdf->Cell(12, 4, '', 0, 0);
        $pdf->Cell(8, 4, 'H.C.', 0, 0); $pdf->Cell(22, 4, $datospaciente->hc, 1, 1, 'C');
        
        // Fila 3
        $y_grid += 4;
        $pdf->SetXY($x_izq, $y_grid);
        $pdf->Cell(22, 4, 'Obstetricia', 0, 0); $pdf->Cell(4, 3, '', 1, 0); $pdf->Cell(2, 4, '', 0, 0);
        $pdf->Cell(20, 4, 'Lab. Clinico', 0, 0); $pdf->Cell(4, 3, '', 1, 0); $pdf->Cell(12, 4, '', 0, 0);
        
        // Otros y Diagnóstico
        $pdf->Ln(5);
        $pdf->SetX($x_izq);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(8, 4, 'Otros', 0, 0); 
        $pdf->Cell(86, 4, '', 'B', 1);
        
        $pdf->Ln(2);
        $pdf->SetX($x_izq);
        $pdf->Cell(16, 4, ('Diagnóstico'), 0, 0); 
        $pdf->Cell(53, 4, '', 'B', 0);
        $pdf->SetFont('Arial', '', 6);
        $pdf->Cell(10, 4, '(CIE-10)', 0, 0); 
        $pdf->Cell(15, 4, '', 1, 1);

        // Tabla Medicamentos
        $pdf->Ln(2);
        $pdf->SetX($x_izq);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetTextColor(0, 102, 204); // Azul
        $pdf->Cell(6, 4, 'Rp.', 0, 0);
        $pdf->Cell(48, 4, 'Medicamento o insumo', 0, 0, 'C');
        $pdf->Cell(16, 4, utf8_decode('Concen-'), 0, 0, 'C');
        $pdf->Cell(16, 4, 'Forma', 0, 0, 'C');
        $pdf->Cell(8, 4, 'Cant.', 0, 1, 'C');
        
        $pdf->SetFont('Arial', '', 6);
        $pdf->SetX($x_izq + 6);
        $pdf->Cell(48, 2, '(Obligatorio DCI)', 0, 0, 'C');
        $pdf->Cell(16, 2, ('tración'), 0, 0, 'C');
        $pdf->Cell(16, 2, ('Farmacéutica'), 0, 1, 'C');
        
        $pdf->SetDrawColor(180, 180, 180);
        $pdf->Line($x_izq, $pdf->GetY(), $x_izq + $w_col, $pdf->GetY());
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetTextColor(0, 0, 0);

        // Listado de Medicamentos (Solo Nombre, Forma y Cantidad)
        $pdf->Ln(2);
        $pdf->SetFont('Arial', '', 7);
        if ($medicamentos) {
            foreach ($medicamentos->result() as $m) {
                $nombre_med = (strpos($m->medicamento, '-') !== false) ? explode('-', $m->medicamento)[1] : $m->medicamento;
                $med_name = substr(utf8_decode(strtoupper(trim($nombre_med))), 0, 32);
                
                $pdf->SetX($x_izq);
                $pdf->Cell(6, 5, '', 0, 0); 
                $pdf->Cell(48, 5, $med_name, 0, 0);
                $pdf->Cell(16, 5, '-', 0, 0, 'C'); 
                $pdf->Cell(16, 5, utf8_decode(strtoupper($m->dosis)), 0, 0, 'C'); 
                $pdf->Cell(8, 5, $m->cantidad, 0, 1, 'C');
            }
        }

        // ==========================================================
        // LADO DERECHO: INDICACIONES (PACIENTE)
        // ==========================================================
        $pdf->SetXY($x_der, 33);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 102, 204); // Azul
        $pdf->Cell($w_col, 5, 'INDICACIONES', 0, 1, 'C');
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->Ln(2);
        
        // Tabla de Instrucciones
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetX($x_der);
        $pdf->Cell(49, 4, 'Medicamento', 'B', 0);
        $pdf->Cell(20, 4, 'Via', 'B', 0, 'C');
        $pdf->Cell(25, 4, 'Frecuencia', 'B', 1, 'C');
        
        $pdf->SetFont('Arial', '', 7);
        if ($medicamentos) {
            foreach ($medicamentos->result() as $m) {
                $nombre_med = (strpos($m->medicamento, '-') !== false) ? explode('-', $m->medicamento)[1] : $m->medicamento;
                $med_name = substr(utf8_decode(strtoupper(trim($nombre_med))), 0, 26);
                
                $pdf->SetX($x_der);
                $pdf->Cell(49, 5, $med_name, 0, 0);
                $pdf->Cell(20, 5, utf8_decode(strtoupper($m->via_aplicacion)), 0, 0, 'C');
                $pdf->Cell(25, 5, utf8_decode($m->frecuencia), 0, 1, 'C');
            }
        }
        
        // Líneas en blanco para rellenar a mano (Ayuda Diagnostico, etc.)
        $pdf->Ln(4);
        for($i=0; $i<6; $i++){
            $pdf->SetX($x_der);
            $pdf->Cell($w_col, 6, '', 'B', 1);
        }

        // ==========================================================
        // PIE DE PÁGINA (Firma y Fechas en ambas columnas)
        // ==========================================================
        // Se dibuja fijo en Y = 135 para que no cruce la línea de corte
        $y_footer = 135;
        
        foreach ([$x_izq, $x_der] as $x) {
            // Líneas para firmar
            $pdf->SetXY($x, $y_footer);
            $pdf->Cell(45, 4, '', 'B', 0); $pdf->Cell(2, 4, '', 0, 0);
            $pdf->Cell(22, 4, '', 'B', 0); $pdf->Cell(2, 4, '', 0, 0);
            $pdf->Cell(23, 4, '', 'B', 1);
            
            // Textos debajo de la línea
            $pdf->SetXY($x, $y_footer + 4);
            $pdf->SetFont('Arial', '', 6);
            $pdf->SetTextColor(150, 150, 150);
            $pdf->Cell(45, 3, 'Sello / Firma / Coleg. Profesional', 0, 0, 'C'); $pdf->Cell(2, 3, '', 0, 0);
            $pdf->Cell(22, 3, utf8_decode('Fecha de atención'), 0, 0, 'C'); $pdf->Cell(2, 3, '', 0, 0);
            $pdf->Cell(23, 3, utf8_decode('Válido hasta'), 0, 1, 'C');
            $pdf->SetTextColor(0, 0, 0);
            
            // Llenado automático de Fecha (Opcional)
            $pdf->SetXY($x + 47, $y_footer);
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(22, 4, date('d/m/Y'), 0, 0, 'C');
        }

        $pdf->Output('I', 'Receta_Medica_A4_' . $datospaciente->documento . '.pdf');
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

	public function eliminarMedicamento()
	{
		$documento = $this->input->post('paciente');
		$triaje = $this->input->post('triaje');
		$codigo = $this->input->post('medicamento');
		$this->Historias_model->eliminarMedicamento($codigo, $triaje, $documento);
	}

	public function crearDiagnosticos() {
	  $paciente = $this->input->post('paciente');
      $triage = $this->input->post('triage');
	  $diagnosticos = $this->input->post('diagnosticos');
	  $tipo = $this->input->post('tipo');

	  $this->Historias_model->eliminarDiagnosticos($triage, $paciente);
	  for ($i = 0; $i < sizeof($diagnosticos); $i++) {
	    $data3 = [
		  'paciente' => $paciente,
		  'diagnosticos' => $diagnosticos[$i],
		  'historia' => $paciente,
		  'tipo' => $tipo,
		  'triaje' => $triage
		];
	   $this->Historias_model->crearDiagnosticosGeneral($data3);
	  }
	}

	public function crearProcedimientos() {
	  $paciente = $this->input->post('paciente');
	  $triage = $this->input->post('triage');
      $procedimientos = $this->input->post('procedimientos');
	  $tipo = $this->input->post('tipo');

	  $this->Historias_model->eliminarProcedimientos($triage, $paciente);
	  for ($i = 0; $i < sizeof($procedimientos); $i++) {
		$data4 = [
		  'paciente' => $paciente,
		  'procedimientos' => $procedimientos[$i],
		  'historia' => $paciente,
		  'tipo' => $tipo,
		  'triaje' => $triage
		];			
		$this->Historias_model->crearProcedimientosHistoria($data4);
	  }
    }
	
	public function crearEncabezadoExamenesAuxiliares() {
		$paciente = $this->input->post('paciente');
		$triage = $this->input->post('triage');
		$examen = $this->input->post('examen');
		$tipo = $this->input->post('tipo');

		$data6 = [
		  'paciente' => $paciente,
	      'examen' => $examen,
		  'historia' => $paciente,
		  'tipo' => $tipo,
		  'triaje' => $triage
		];			
		$this->Historias_model->crearEncabezadoExamenesAuxiliares($data6);
	}

	public function DetalleExamenAuxiliaresEcografias() {
		$paciente = $this->input->post('paciente');
		$triage = $this->input->post('triage');
		$ecografia = $this->input->post('ecografia');
		$examen = $this->input->post('examen');
		$tipo = $this->input->post('tipo');
		$especialidad = $this->input->post('especialidad');
		
      $this->Historias_model->eliminarexamenesAuxiliares('Ecografias', $triage, $paciente);
	  for ($i = 0; $i < sizeof($ecografia); $i++) {
		$data5 = [
		  'paciente' => $paciente,
		  'ecografia' => $ecografia[$i],
		  'examen' => $examen,
		  'historia' => $paciente,
		  'especialidad' => $especialidad,
		  'tipo' => $tipo,
		  'triaje' => $triage
		];			
		$this->Historias_model->crearExamenAuxiliaresEcografia($data5);
	  }
	}
   
	public function DetalleExamenAuxiliaresTomografias() {
		$paciente = $this->input->post('paciente');
		$triage = $this->input->post('triage');
		$tomografia = $this->input->post('tomografia');
		$examen = $this->input->post('examen');
		$tipo = $this->input->post('tipo');
		$especialidad = $this->input->post('especialidad');
	  $this->Historias_model->eliminarexamenesAuxiliares('Tomografias', $triage, $paciente);
	  for ($i = 0; $i < sizeof($tomografia); $i++) {
		$data5 = [
		  'paciente' => $paciente,
		  'tomografia' => $tomografia[$i],
		  'examen' => $examen,
		  'historia' => $paciente,
		  'tipo' => $tipo,
		  'especialidad' => $especialidad,
		  'triaje' => $triage
		];			
		$this->Historias_model->crearExamenAuxiliaresTomografia($data5);
	  }
	}

	public function DetalleExamenAuxiliaresResonancia() {
		$paciente = $this->input->post('paciente');
		$triage = $this->input->post('triage');
		$resonancia = $this->input->post('resonancia');
		$examen = $this->input->post('examen');
		$tipo = $this->input->post('tipo');
		$especialidad = $this->input->post('especialidad');
	  

	  $this->Historias_model->eliminarexamenesAuxiliares('Resonancias', $triage, $paciente);

	  for ($i = 0; $i < sizeof($resonancia); $i++) {
		$data5 = [
		  'paciente' => $paciente,
		  'resonancia' => $resonancia[$i],
		  'examen' => $examen,
		  'historia' => $paciente,
		  'tipo' => $tipo,
		  'especialidad' => $especialidad,
		  'triaje' => $triage
		];			
		$this->Historias_model->crearExamenAuxiliaresResonancia($data5);
	  }
	}

	public function getConsultasGeneralCodigo($codigo, $paciente) {
		$data = $this->Historias_model->getConsultasGeneralCodigo($codigo, $paciente)->result()[0];
		echo json_encode($data);
	}

	public function getGinecologiaCodigo($codigo, $paciente) {
		$data = $this->Historias_model->getGinecologiaCodigo($codigo, $paciente)->result()[0];
		echo json_encode($data);
	}

	public function getdiagnosticosEditar($triage, $paciente, $especialidad) {
		$data = $this->Historias_model->getdiagnosticosEditar($triage, $paciente, $especialidad)->result();
		echo json_encode($data);
	}

	public function getMedicamentosEditar($triage, $paciente, $especialidad) {
      $data = $this->Historias_model->getMedicamentosEditar($triage, $paciente, $especialidad)->result();
      echo json_encode($data);
	} 

	public function getCitasPaciente($triage, $paciente) {
	  $data = $this->Historias_model->getCitasPaciente($triage, $paciente)->result()[0];
      echo json_encode($data);	
	}

	public function getProcedimientosCodigo($triage, $paciente, $especialidad) {
	  $data = $this->Historias_model->getProcedimientosCodigo($triage, $paciente, $especialidad)->result();
      echo json_encode($data);	
	}

	public function examenesAuxiliaresEcografiasEditar($triage, $paciente) {
	  $data = $this->Historias_model->examenesAuxiliaresEcografiasEditar($triage, $paciente)->result();
      echo json_encode($data);		
	}

	public function examenesAuxiliaresTomografiasEditar($triage, $paciente) {
	  $data = $this->Historias_model->examenesAuxiliaresTomografiasEditar($triage, $paciente)->result();
      echo json_encode($data);		
	}

	public function examenesAuxiliaresResonanciasEditar($triage, $paciente) {
	  $data = $this->Historias_model->examenesAuxiliaresResonanciasEditar($triage, $paciente)->result();
	  echo json_encode($data);

	}
}
