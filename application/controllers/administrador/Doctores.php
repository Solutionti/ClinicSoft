<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctores extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Doctores_model");
	}
	
	public function index()
	{
		$doctores = $this->Doctores_model->getDoctores();
		$data = ["doctor" => $doctores];
		$this->load->view('administrador/doctores', $data);
	}

	public function crearDoctor() {
        $cpe = $this->input->post("cpe");
        $nombre = $this->input->post("nombre");
        $perfil = $this->input->post("perfil");
        $telefono = $this->input->post("telefono");
        $direccion = $this->input->post("direccion");
        $correo = $this->input->post("correo");
        $password = $this->input->post("password");

		$data = [
			"cpe" => $cpe,
			"nombre" => $nombre,
			"perfil" => $perfil,
			"telefono" => $telefono,
			"direccion" => $direccion,
			"correo" => $correo,
			"password" => $password
		];
		$this->Doctores_model->crearDoctor($data);
    }

	public function getDoctoresId()
	{
		$doctor = $this->input->post("id"); 
		$result = $this->Doctores_model->getDoctoresId($doctor);
		echo json_encode($result);
	}

	public function eliminarDoctores() {
		$id = $this->uri->segment(3);
		$this->Doctores_model->eliminarDoctores($id);
		redirect("administracion/doctores");
	}

	public function actualizarDoctor() {
		$id = $this->input->post("id");
        $documento = $this->input->post("documento");
        $nombre = $this->input->post("nombre");
        $perfil = $this->input->post("perfil");
        $telefono = $this->input->post("telefono");
        $direccion = $this->input->post("direccion");
        $correo = $this->input->post("correo");

        $lunes = $this->input->post("lunes");
        $martes = $this->input->post("martes");
        $miercoles = $this->input->post("miercoles");
        $jueves = $this->input->post("jueves");
        $viernes = $this->input->post("viernes");
        $sabado = $this->input->post("sabado");
        $domingo = $this->input->post("domingo");

		$Horas_lunes = $this->input->post("Horas_lunes");
		$Horas_martes = $this->input->post("Horas_martes");
		$Horas_miercoles = $this->input->post("Horas_miercoles");
		$Horas_jueves = $this->input->post("Horas_jueves");
		$Horas_viernes = $this->input->post("Horas_viernes");
		$Horas_sabado = $this->input->post("Horas_sabado");
		$Horas_domingo = $this->input->post("Horas_domingo");


		$Horas_lunes 		= str_replace(" ", "", $Horas_lunes);
		$Horas_martes 		= str_replace(" ", "", $Horas_martes);
		$Horas_miercoles	= str_replace(" ", "", $Horas_miercoles);
		$Horas_jueves 		= str_replace(" ", "", $Horas_jueves);
		$Horas_viernes 		= str_replace(" ", "", $Horas_viernes);
		$Horas_sabado 		= str_replace(" ", "", $Horas_sabado);
		$Horas_domingo 		= str_replace(" ", "", $Horas_domingo);

		
		$datos = [
			"lunes" => $lunes,
			"martes" => $martes,
			"miercoles" => $miercoles,
			"jueves" => $jueves,
			"viernes" => $viernes,
			"sabado" => $sabado,
			"domingo" => $domingo,

			"Horas_lunes" => $Horas_lunes,
			"Horas_martes" => $Horas_martes,
			"Horas_miercoles" => $Horas_miercoles,
			"Horas_jueves" => $Horas_jueves,
			"Horas_viernes" => $Horas_viernes,
			"Horas_sabado" => $Horas_sabado,
			"Horas_domingo" => $Horas_domingo,

			"documento" => $documento,
			"nombre" => $nombre,
			"perfil" => $perfil,
			"telefono" => $telefono,
			"direccion" => $direccion,
			"correo" => $correo,
			"id" => $id
		];
		$this->Doctores_model->actualizarDoctor($datos);
    }
}
