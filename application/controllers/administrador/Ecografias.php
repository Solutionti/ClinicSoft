<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecografias extends Admin_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model("Ecografias_model");
	}

    //ECOGRAFIA DE MAMA

    //vista de ejemplo
    public function ecografiaMamaView() {
      $this->load->view("administrador/ecografiamama");
    }

    public function ecografiaGeneticaView() {
        $this->load->view("administrador/ecografiagenetica");
      }

    public function ecografiaMorfologicaView() {
        $this->load->view("administrador/ecografiamorfologica");
      }
    public function ecografiaTrasvaginalView() {
        $this->load->view("administrador/ecografiatrasvaginal");
      }
    public function ecografiaPelvicaView() {
        $this->load->view("administrador/ecografiapelvica");
      }
    public function ecografiaObstetricaView() {
        $this->load->view("administrador/ecografiaobstetrica");
      }
    public function ecografiaAbdominalView() {
        $this->load->view("administrador/ecografiaabdominal");
      }
    public function ecografiaProstaticaView() {
      $this->load->view("administrador/ecografiaprostatica");
    }
    public function ecografiaRenalView() {
      $this->load->view("administrador/ecografiarenal");
    }
    public function ecografiaTiroidesView() {
      $this->load->view("administrador/ecografiatiroides");
    }
    public function ecografiaHisteronosografiaView() {
      $this->load->view("administrador/ecografiahisteronosografia");
    }
    public function ecografiaArterialView() {
      $this->load->view("administrador/ecografiaarterial");
    }
    public function ecografiaVenosaView() {
      $this->load->view("administrador/ecografiavenosa");
    }
  
    public function createEcografiaMama() {
      //print_r($this->input->post());
      //exit;
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

    // ECOGRAFIA OBSTETRICA

    public function createEcografiaObstetrica() {
      // Recibir datos del formulario enviado por AJAX
      $documento_paciente = $this->input->post("documento_paciente");
      $codigo_doctor = $this->input->post("codigo_doctor");
      $fetoembrion = $this->input->post("fetoembrion");
      $situacion = $this->input->post("situacion");
      $estadoFeto = $this->input->post("estadoFeto");
      $placenta = $this->input->post("placenta");
      $dpb = $this->input->post("dpb");
      $lcf = $this->input->post("lcf");
      $min = $this->input->post("min");
      $cc = $this->input->post("cc");
      $ca = $this->input->post("ca");
      $lf = $this->input->post("lf");
      $ila = $this->input->post("ila");
      $percentil = $this->input->post("percentil");
      $tipoParto = $this->input->post("tipoParto");
      $conclusion = $this->input->post("conclusion");
      $sugerencia = $this->input->post("sugerencia");
  
      // Agrupar los datos en un array
      $datos = [
          "documento_paciente" => $documento_paciente,
          "codigo_doctor" => $codigo_doctor,
          "fetoembrion" => $fetoembrion,
          "situacion" => $situacion,
          "estadoFeto" => $estadoFeto,
          "placenta" => $placenta,
          "dpb" => $dpb,
          "lcf" => $lcf,
          "min" => $min,
          "cc" => $cc,
          "ca" => $ca,
          "lf" => $lf,
          "ila" => $ila,
          "percentil" => $percentil,
          "tipoParto" => $tipoParto,
          "conclusion" => $conclusion,
          "sugerencia" => $sugerencia,
      ];
  
      // Insertar en la base de datos utilizando el modelo
      $this->Ecografias_model->createEcografiaObstetrica($datos);
  
      // Enviar respuesta JSON para que el frontend sepa que todo salió bien
      echo json_encode(["status" => "success", "message" => "Ecografía Obstétrica registrada correctamente"]);
  }
  

    // ECOGRAFIA TRANSVAGINAL

    public function createEcografiaTrasvaginal() {
      
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