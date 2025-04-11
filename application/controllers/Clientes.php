<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Patologia_model");
		$this->load->model("Laboratorio_model");
		$this->load->model("Lineatiempo_model");
	}

    public function index() {
        $this->load->view("login_clientes");
    }

	public function inicio(){
		$lineas = $this->Lineatiempo_model->getLineaClientes();
		$data = [
			"linea" => $lineas
		];
		$this->load->view("clientes/inicio", $data);
	}
	
	public function laboratorio() {
	  $laboratorios = $this->Laboratorio_model->getDocumentosLaboratorioclientes();
	  $data = [
		"laboratorio" => $laboratorios
	  ];
	  $this->load->view("clientes/laboratorio", $data);
	}

	public function patologia() {
		$patologias = $this->Patologia_model->getDocumentosPatologiaclientes();
		$data = [
			"patologia" => $patologias
		  ];
		$this->load->view("clientes/patologia", $data);
	}

	public function ecografias() {
	  $this->load->view("clientes/ecografias");
	}

	public function citasDoctores() {
	  $this->load->view("clientes/citas_doctores");
	}
}