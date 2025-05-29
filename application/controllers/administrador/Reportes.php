<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Desactivar la salida de errores de PHPExcel para evitar problemas con los headers
// error_reporting(E_ALL & ~E_DEPRECATED);
// ini_set('display_errors', 0);

// Cargar PHPExcel
// require_once FCPATH . 'PHPExcel/Classes/PHPExcel.php';

// Configurar el manejo de errores de PHPExcel
// PHPExcel_Shared_File::setUseUploadTempDirectory(true);

class Reportes extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Doctores_model");
		$this->load->model("Reportes_model");
	}
	
	public function index()
	{
		$doctores = $this->Doctores_model->getDoctores();
		$data = ["doctor" => $doctores];	
		$this->load->view('administrador/reportes', $data);
	}

	public function reporteComisionDiario($doctor, $fecha) {
		
		$this->load->library("pdf");
        $pdfAct = new Pdf();
		$reportes1 = $this->Reportes_model->reporteComisionDiario($doctor, $fecha);
		$reportes2 = $this->Reportes_model->getTotalComisionDiario($doctor, $fecha);
		$data = [
			"reporte1" => $reportes1,
			"reporte2" => $reportes2
		];
		$this->load->view('administrador/pdfreportediario', $data);
	}

	public function  reporteGastos($fecha1,$fecha2) {
		// $fecha1 = $this->input->post("fecha1");
		// $fecha2 = $this->input->post("fecha2");
		$this->load->library("pdf");
        $pdfAct = new Pdf();
		$gastos = $this->Reportes_model->reporteGastos($fecha1, $fecha2);//var_dump($gastos);
		$totales = $this->Reportes_model->getTotalGastos($fecha1, $fecha2);
		$data = ["gasto" => $gastos, "total" => $totales];
		$this->load->view('administrador/pdfreportegastos', $data);
	}

	public function reporteLaboratorio($fecha) {
		$usuario = $this->session->userdata("nombre");
	    // $fecha = $this->input->post("fecha");
		$this->load->library("pdf");
        $pdfAct = new Pdf();
		$laboratorios = $this->Reportes_model->reporteLaboratorio($usuario, $fecha);
		$totales = $this->Reportes_model->totalLaboratorio($usuario, $fecha);
		$data = ["laboratorio" => $laboratorios, "total" => $totales];
		$this->load->view('administrador/pdfreportelaboratorio', $data);
	}

	public function reporteGlobal() {

		$fecha1 = $this->input->post("fecha_global_1");
		$fecha2 = $this->input->post("fecha_global_2");

		$gastos = $this->Reportes_model->reporteGastosGLOBAL($fecha1, $fecha2);//var_dump($gastos->result());
		$ingresos_comision = $this->Reportes_model->reporteComisionDiarioGLOBAL($fecha1, $fecha2);//var_dump($ingresos_comision->result());
		$cajas = $this->Reportes_model->reporteComisionDiarioGLOBAL_CAJAS($fecha1, $fecha2);//var_dump($gastos->result());
		$laboratorios = $this->Reportes_model->reporteLaboratorioGLOBAL($fecha1, $fecha2);//var_dump($laboratorios->result());
		//$reportes1 = $this->Reportes_model->reporteComisionDiario($doctor, $fecha);
		//$reportes2 = $this->Reportes_model->getTotalComisionDiario($doctor, $fecha);
		$nombre_file = "REPORTE DE GLOBAL - ".date("d-m-Y", strtotime($fecha1))." - ".date("d-m-Y", strtotime($fecha2))." --- ".date("h-i-s A");
		$__data_ = [
			"nombre_file" => $nombre_file,
			"fecha1" => $fecha1,
			"fecha2" => $fecha2,
			"gastos" => $gastos->result(),
			"ingresos_comision" => $ingresos_comision->result(),
			"cajas" => $cajas->result(),
			"laboratorios" => $laboratorios->result()
		];
        $ruta = base_url()."PHPExcel/Examples/Format_CPE_COMPRAS.php";//var_dump(getcwd());
		$data_json = json_encode($__data_);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ruta);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_USERPWD, "admin:admin");
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$respuesta  = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($respuesta, true);

		$data = [
			"__data_" => $__data_,
			"sms" => $nombre_file,
			"acction" => 1
		];
		echo json_encode($data);
	}

    /**
     * Genera un reporte de comisiones en formato Excel
     * @param int $doctor ID del doctor
     * @param string $fecha Fecha del reporte (YYYY-MM-DD)
     */
    // public function reporteComisionDiarioExcel($doctor, $fecha) {
    //     // Limpiar cualquier salida previa
    //     if (ob_get_level()) {
    //         ob_end_clean();
    //     }
        
    //     // Cargar el modelo de reportes
    //     $reportes = $this->Reportes_model->reporteComisionDiario($doctor, $fecha);
    //     $totales = $this->Reportes_model->getTotalComisionDiario($doctor, $fecha);
        
    //     try {
    //         // Crear una instancia de PHPExcel
    //         $objPHPExcel = new PHPExcel();
            
    //         // Propiedades del documento
    //         $objPHPExcel->getProperties()
    //             ->setCreator("ClinicSoft")
    //             ->setLastModifiedBy("ClinicSoft")
    //             ->setTitle("Reporte de Comisiones")
    //             ->setSubject("Reporte de Comisiones")
    //             ->setDescription("Reporte de comisiones generado desde ClinicSoft");
            
    //         // Establecer hoja activa
    //         $objPHPExcel->setActiveSheetIndex(0);
    //         $sheet = $objPHPExcel->getActiveSheet();
    //         $sheet->setTitle('Reporte de Comisiones');
            
    //         // Configurar estilos
    //         $headerStyle = array(
    //             'font' => array('bold' => true, 'color' => array('rgb' => 'FFFFFF')),
    //             'fill' => array(
    //                 'type' => PHPExcel_Style_Fill::FILL_SOLID,
    //                 'color' => array('rgb' => '4472C4')
    //             ),
    //             'borders' => array(
    //                 'allborders' => array(
    //                     'style' => PHPExcel_Style_Border::BORDER_THIN
    //                 )
    //             )
    //         );
            
    //         $dataStyle = array(
    //             'borders' => array(
    //                 'allborders' => array(
    //                     'style' => PHPExcel_Style_Border::BORDER_THIN
    //                 )
    //             )
    //         );
            
    //         // Escribir encabezados
    //         $sheet->setCellValue('A1', 'Código')
    //               ->setCellValue('B1', 'Documento')
    //               ->setCellValue('C1', 'Paciente')
    //               ->setCellValue('D1', 'Médico')
    //               ->setCellValue('E1', 'Especialidad')
    //               ->setCellValue('F1', 'Tipo Pago')
    //               ->setCellValue('G1', 'Total (S/.)')
    //               ->setCellValue('H1', 'Comisión (S/.)')
    //               ->setCellValue('I1', 'Fecha');
            
    //         // Aplicar estilo a los encabezados
    //         $sheet->getStyle('A1:I1')->applyFromArray($headerStyle);
            
    //         // Llenar datos
    //         $row = 2;
    //         $total = 0;
    //         $comision = 0;
            
    //         foreach ($reportes->result() as $item) {
    //             $sheet->setCellValue('A' . $row, $item->codigo_pago)
    //                   ->setCellValue('B' . $row, $item->documento)
    //                   ->setCellValue('C' . $row, $item->nombre . ' ' . $item->apellido)
    //                   ->setCellValue('D' . $row, $item->medico)
    //                   ->setCellValue('E' . $row, $item->descripcion)
    //                   ->setCellValue('F' . $row, $item->tipo_deposito)
    //                   ->setCellValue('G' . $row, number_format($item->total, 2))
    //                   ->setCellValue('H' . $row, number_format($item->comision, 2))
    //                   ->setCellValue('I' . $row, $item->fecha);
                
    //             $total += $item->total;
    //             $comision += $item->comision;
    //             $row++;
    //         }
            
    //         // Agregar totales
    //         $sheet->setCellValue('F' . $row, 'TOTAL:')
    //               ->setCellValue('G' . $row, number_format($total, 2))
    //               ->setCellValue('H' . $row, number_format($comision, 2));
            
    //         // Aplicar estilo a los totales
    //         $sheet->getStyle('F' . $row . ':I' . $row)->getFont()->setBold(true);
            
    //         // Ajustar ancho de columnas
    //         foreach(range('A','I') as $columnID) {
    //             $sheet->getColumnDimension($columnID)->setAutoSize(true);
    //         }
            
    //         // Aplicar bordes a los datos
    //         $lastRow = $row;
    //         $sheet->getStyle('A1:I' . $lastRow)->applyFromArray($dataStyle);
            
    //         // Configurar cabeceras para descarga
    //         $filename = 'Reporte_Comisiones_' . date('Y-m-d') . '.xlsx';
            
    //         // Limpiar búfer de salida
    //         while (ob_get_level() > 0) {
    //             ob_end_clean();
    //         }
            
    //         // Configurar cabeceras
    //         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //         header('Content-Disposition: attachment;filename="' . $filename . '"');
    //         header('Cache-Control: max-age=0');
    //         header('Cache-Control: max-age=1');
    //         header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    //         header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    //         header('Cache-Control: cache, must-revalidate');
    //         header('Pragma: public');
            
    //         // Generar archivo Excel
    //         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    //         $objWriter->save('php://output');
    //         exit;
            
    //     } catch (Exception $e) {
    //         // En caso de error, mostrar mensaje
    //         die('Error al generar el archivo Excel: ' . $e->getMessage());
    //     }
    //     exit;
    // }
}

