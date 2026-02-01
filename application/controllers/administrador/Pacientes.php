<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Generic_model');
		$this->load->model('Pacientes_model');
	}

	public function index()
	{
		$pacientes = $this->Pacientes_model->getPacientes();
		$departamentos = $this->Generic_model->getDepartamentos();
		$provincias = $this->Generic_model->getProvincias();
		$distritos = $this->Generic_model->getDistritos();
		$data = ['paciente' => $pacientes, 'departamento' => $departamentos, 'provincia' => $provincias, 'distrito' => $distritos];
		$this->load->view('administrador/pacientes', $data);
	}

	public function CrearPaciente()
	{
		$dni = $this->input->post('dni');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$hc = $this->input->post('hc');
		$celular = $this->input->post('celular');
		$sexo = $this->input->post('sexo');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$edad = $this->input->post('edad');
		$direccion = $this->input->post('direccion');
		$departamento = $this->input->post('departamento');
		$provincia = $this->input->post('provincia');
		$distrito = $this->input->post('distrito');
		$ocupacion = $this->input->post('ocupacion');
		$grado_academico = $this->input->post('grado_academico');
		$estado_civil = $this->input->post('estado_civil');
		$documento = $this->input->post('documento');
		$responsable = $this->input->post('fresponsable');
		$menor = $this->input->post('responsable');

		$data = [
			'dni' => $dni,
			'nombre' => $nombre,
			'apellido' => $apellido,
			'hc' => $hc,
			'celular' => $celular,
			'sexo' => $sexo,
			'fecha_nacimiento' => $fecha_nacimiento,
			'edad' => $edad,
			'direccion' => $direccion,
			'departamento' => $departamento,
			'provincia' => $provincia,
			'distrito' => $distrito,
			'ocupacion' => $ocupacion,
			'grado_academico' => $grado_academico,
			'estado_civil' => $estado_civil,
			'documento' => $documento,
			'responsable' => $responsable,
			'menor' => $menor,
		];
		$this->Pacientes_model->CrearPaciente($data);
	}

	public function countPacientes()
	{
		$result = $this->Pacientes_model->CountPacientes();
		$data = [
			'numero' => $result
		];
		echo json_encode($data);
	}

	public function getPacienteId()
	{
		$id = $this->input->post('dni');
		$result = $this->Pacientes_model->getPacienteId($id);
		$resultado = $result->result()[0];

		echo json_encode($resultado);
	}

	public function actualizarPaciente()
	{
		$dni = $this->input->post('dni');
		$id = $this->input->post('id');
		$celular = $this->input->post('celular');
		$direccion = $this->input->post('direccion');
		$departamento = $this->input->post('departamento');
		$provincia = $this->input->post('provincia');
		$edad = $this->input->post('edad');
		$sexo = $this->input->post('sexo');
		$distrito = $this->input->post('distrito');
		$ocupacion = $this->input->post('ocupacion');
		$grado_academico = $this->input->post('grado_academico');
		$estado_civil = $this->input->post('estado_civil');
		$documento = $this->input->post('documento');
		$responsable = $this->input->post('fresponsable');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');

		$data = [
			'dni' => $dni,
			'celular' => $celular,
			'direccion' => $direccion,
			'departamento' => $departamento,
			'edad' => $edad,
			'sexo' => $sexo,
			'provincia' => $provincia,
			'distrito' => $distrito,
			'ocupacion' => $ocupacion,
			'grado_academico' => $grado_academico,
			'estado_civil' => $estado_civil,
			'estado_civil' => $estado_civil,
			'documento' => $documento,
			'responsable' => $responsable,
			'fecha_nacimiento' => $fecha_nacimiento
		];
		$this->Pacientes_model->actualizarPaciente($data);
	}

	public function eliminarPaciente()
	{
		$id = $this->uri->segment(3);
		$this->Pacientes_model->eliminarPaciente($id);
		redirect(base_url('administracion/pacientes'));
	}

	public function editarPaciente()
	{
		$id = $this->uri->segment(3);
		$pacientes = $this->Pacientes_model->getPacienteId($id);
		$departamentos = $this->Generic_model->getDepartamentos();
		$provincias = $this->Generic_model->getProvincias();
		$distritos = $this->Generic_model->getDistritos();
		$data = ['paciente' => $pacientes, 'departamento' => $departamentos, 'provincia' => $provincias, 'distrito' => $distritos];
		$this->load->view('administrador/editarpaciente', $data);
	}

	// PARA LA TABLA DE PACIENTES

	public function cargarPacientes()
	{
		$data = $this->Pacientes_model->cargarPacientesPaginacion($_REQUEST);
		$datos = array('queryRecords' => $data['queryRecords'], 'totalRecords' => $data['totalRecords'], 'params' => $data['params']);
		$this->load->view('administrador/ajax/table_pacientes.php', $datos);
	}

	public function getPacienteTabla()
	{
		$id = $this->input->post('dni');
		$apellido = $this->input->post('apellido');

		$result = $this->Pacientes_model->getPacienteTabla($id, $apellido)->result();
		if ($result == 0) {
			echo 'error';
		} else {
			echo json_encode($result);
		}
	}
}
