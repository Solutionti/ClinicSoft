<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	
}
