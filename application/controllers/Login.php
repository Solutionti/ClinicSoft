<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model("Login_model");
		
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function iniciarSesion() {
		$correo = $this->input->post("correo");
		$password = $this->input->post("password");
		
		$result = $this->Login_model->iniciarSesion($correo, $password);

		if($result){
		   $session = [
			  "codigo" => $result->codigo_doctor,
			  "nombre" => $result->nombre,
			  "apellido" => $result->apellido,
			  "email" => $result->email,
		      "empresa" => $result->empresa,
			  "rol" => $result->rol_usuario,
			  "cmp" => $result->cpe,
			  "ip" => $result->ip,
			  "login" => true
		  ];
		  $this->session->set_userdata($session);
		  echo 1;
	  }
	  else {
		  echo "error";
	  }
	}

	public function iniciarSesionClientes() {
		$documento = $this->input->post("correo");
		$password = $this->input->post("password");

		$result = $this->Login_model->iniciarSesionClientes($documento, $password);
		 if ($result){
			 $sessionClientes = [
				"nombre" => $result->nombre,
				"apellido" => $result->apellido,
				"documento" => $result->documento,
				"direccion" => $result->direccion,
				"ocupacion" => $result->ocupacion,
				"login" => true
			 ];
			 $this->session->set_userdata($sessionClientes);
			 echo 1;
		 }
		 else {
			 echo "error";
		 }
	}

	public function cerrarSesion() {
		$this->session->sess_destroy();
        redirect(base_url());
	}

	public function cerrarSesionClientes() {
		$this->session->sess_destroy();
        redirect(base_url("zonac"));
	}

	
}
