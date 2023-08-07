<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecografias extends Admin_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model("Ecografias_model");
	}

    //ECOGRAFIA DE MAMA
    
    public function createEcografiaMama() {

      $documento_paciente = $this->input->post("documento_paciente");
      $codigo_doctor = $this->input->post("codigo_doctor");
      $pezon_izq = $this->input->post("pezon_izq");
      $tcsc_izq = $this->input->post("tcsc_izq");
      $tejido_glandular_izq = $this->input->post("tejido_glandular_izq");
      $axila_izq = $this->input->post("axila_izq");
      $comentario_mama_izq = $this->input->post("comentario_mama_izq");
      $pezon_der = $this->input->post("pezon_der");
      $tcsc_der = $this->input->post("tcsc_der");
      $tejido_glandular_der = $this->input->post("tejido_glandular_der");
      $axila_der = $this->input->post("axila_der");
      $comentario_der = $this->input->post("comentario_der");
      $conclusion_mama = $this->input->post("conclusion_mama");
      $sugerencias_mama = $this->input->post("sugerencias_mama");

        $datos = [
          "documento_paciente" => $documento_paciente,
          "codigo_doctor" => $codigo_doctor,
          "pezon_izq" => $pezon_izq,
          "tcsc_izq" => $tcsc_izq,
          "tejido_glandular_izq" => $tejido_glandular_izq,
          "axila_izq" => $axila_izq,
          "comentario_mama_izq" => $comentario_mama_izq,
          "pezon_der" => $pezon_der,
          "tcsc_der" => $tcsc_der,
          "tejido_glandular_der" => $tejido_glandular_der,
          "axila_der" => $axila_der,
          "comentario_der" => $comentario_der,
          "conclusion_mama" => $conclusion_mama,
          "sugerencias_mama" => $sugerencias_mama,
        ];

        $this->Ecografias_model->createEcografiaMama($datos);
    }

    public function ecografiaMama() {
        $this->load->library("pdf");
        $pdfAct = new Pdf();
        $this->load->view("administrador/ecografias/ecografia_transvaginal");
    }

    // ECOGRAFIA TRANSVAGINAL

    public function createEcografiaTransvaginal() {
      
    }

    

    public function subirDocumentoEcografias() {

        $paciente = $this->input->post("paciente");
		$titulo = $this->input->post("titulo");
        $fecha = date("dmY");
		$dir_subida = 'public/ecografias/';
        $fichero_subido = $dir_subida.basename($paciente."-".$fecha."-".$_FILES['icono']['name']);

		move_uploaded_file($_FILES['icono']['tmp_name'], $fichero_subido);
			$datos = array(
				"paciente" => $paciente,
				"titulo" => $titulo,
				"icono" => $paciente."-".$fecha."-".$_FILES['icono']['name']
			);
		
		$this->Ecografias_model->subirDocumentoEcografias($datos);

		redirect(base_url("administracion/historia/".$paciente));
    }


}