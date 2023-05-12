<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financiero extends Admin_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model("Financiero_model");
		$this->load->model("Doctores_model");
		$this->load->model("Especialidades_model");
	}	
	public function index()
	{
		$pagos = $this->Financiero_model->getPagos();
		$doctores = $this->Doctores_model->getDoctores();
		$especialidades = $this->Especialidades_model->getEspecialidades();

		$data = ["pago" => $pagos, "doctor" => $doctores, "especialidad" => $especialidades];
		$this->load->view('administrador/financiero', $data);
	}

	public function crearGastos() {
        $nombre = $this->input->post("nombre");
        $cantidad = $this->input->post("cantidad");
        $descripcion = $this->input->post("descripcion");

        $data = [
            "nombre" => $nombre,
            "cantidad" => $cantidad,
            "descripcion" => $descripcion
        ];

        $this->Financiero_model->crearGastos($data);
    }
	//FACTURACION ELECTRONICA

	public function facturaElectronica() {
		$this->load->view("administrador/facturaelectronica");
	}

	public function getpagosAtencion($codigo) {
	  $pagos = $this->Financiero_model->getpagosAtencion($codigo);

	  echo json_encode($pagos);
	}

	public function actualizarPagos() {
		$atencion = $this->input->post("atencion");
		$codigo_pago = $this->input->post("codigo_pago");
		$costo = $this->input->post("costo");
		$descuento = $this->input->post("descuento");
		$comision = $this->input->post("comision");
		$cantidad_recibida = $this->input->post("cantidad_recibida");
		$especialidad = $this->input->post("especialidad");
		$doctor = $this->input->post("doctor");
		$estado = $this->input->post("estado");
	    
		$datos = [
		  "atencion" => $atencion,
		  "codigo_pago" => $codigo_pago,
		  "costo" => $costo,
		  "descuento" => $descuento,
		  "comision" => $comision,
		  "cantidad_recibida" => $cantidad_recibida,
		  "especialidad" => $especialidad,
		  "doctor" => $doctor,
		  "estado" => $estado,
		];
		
		$this->Financiero_model->actualizarPagos($datos, $codigo_pago);
		$this->Financiero_model->actualizarPagosAtencion($estado, $atencion, $costo, $comision, $doctor, $especialidad);
	}

	public function crearPagoAdicional(){
		$descripcion = $this->input->post("descripcion");
		$precio = $this->input->post("precio");

		$this->Financiero_model->crearPagoAdicional($descripcion, $precio);
	}
}