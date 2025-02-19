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
  

  // ECOGRAFIA GENETICA
  public function createEcografiaGenetica() {
    $documento_paciente = $this->input->post("documento_paciente");
    $codigo_doctor = $this->input->post("codigo_doctor");
    $fetoembrion = $this->input->post("fetoembrion");
    $situacion = $this->input->post("situacion");
    $liquidoAmniotico = $this->input->post("liquidoAmniotico");
    $placenta = $this->input->post("placenta");
    $lcr = $this->input->post("lcr");
    $lcf = $this->input->post("lcf");
    $artUteder = $this->input->post("artUteder");
    $artUteizq = $this->input->post("artUteizq");
    $ippromedio = $this->input->post("ippromedio");
    $huesoNasal = $this->input->post("huesoNasal");
    $translucenciaNucal = $this->input->post("translucenciaNucal");
    $ductudVenosa = $this->input->post("ductudVenosa");
    $conclusion_mama = $this->input->post("conclusion_mama");
    $sugerencias_mama = $this->input->post("sugerencias_mama");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "fetoembrion" => $fetoembrion,
        "situacion" => $situacion,
        "liquidoAmniotico" => $liquidoAmniotico,
        "placenta" => $placenta,
        "lcr" => $lcr,
        "lcf" => $lcf,
        "artUteder" => $artUteder,
        "artUteizq" => $artUteizq,
        "ippromedio" => $ippromedio,
        "huesoNasal" => $huesoNasal,
        "translucenciaNucal" => $translucenciaNucal,
        "ductudVenosa" => $ductudVenosa,
        "conclusion_mama" => $conclusion_mama,
        "sugerencias_mama" => $sugerencias_mama,
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
    ];

    $this->Ecografias_model->createEcografiaGenetica($datos);

   // Enviar respuesta JSON para que el frontend sepa que todo salió bien
   echo json_encode(["status" => "success", "message" => "Ecografía Genética registrada correctamente"]);
  }

  // ECOGRAFIA MORFOLOGICA
  public function createEcografiaMorfologica() {
    $documento_paciente = $this->input->post("documento_paciente");
    $codigo_doctor = $this->input->post("codigo_doctor");
    $sexo = $this->input->post("sexo");
    $formacabeza = $this->input->post("formacabeza");
    $cerebelo = $this->input->post("cerebelo");
    $cisternaMagna = $this->input->post("cisternaMagna");
    $atrioVentricular = $this->input->post("atrioVentricular");
    $perfilCara = $this->input->post("perfilCara");
    $cuello = $this->input->post("cuello");
    $perfiltorax = $this->input->post("perfiltorax");
    $corazon = $this->input->post("corazon");
    $columnaVertebral = $this->input->post("columnaVertebral");
    $abdomen = $this->input->post("abdomen");
    $dbp = $this->input->post("dbp");
    $cc = $this->input->post("cc");
    $ca = $this->input->post("ca");
    $lf = $this->input->post("lf");
    $comentario = $this->input->post("comentario");
    $ipder = $this->input->post("ipder");
    $ipizq = $this->input->post("ipizq");
    $ponderadoFetal = $this->input->post("ponderadoFetal");
    $lcf = $this->input->post("lcf");
    $conclusiones = $this->input->post("conclusiones");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "sexo" => $sexo,
        "formacabeza" => $formacabeza,
        "cerebelo" => $cerebelo,
        "cisternaMagna" => $cisternaMagna,
        "atrioVentricular" => $atrioVentricular,
        "perfilCara" => $perfilCara,
        "cuello" => $cuello,
        "perfiltorax" => $perfiltorax,
        "corazon" => $corazon,
        "columnaVertebral" => $columnaVertebral,
        "abdomen" => $abdomen,
        "dbp" => $dbp,
        "cc" => $cc,
        "ca" => $ca,
        "lf" => $lf,
        "comentario" => $comentario,
        "ipder" => $ipder,
        "ipizq" => $ipizq,
        "ponderadoFetal" => $ponderadoFetal,
        "lcf" => $lcf,
        "conclusiones" => $conclusiones,
        "fecha" => date("Y-m-d"),
        "hora" => date("H:i:s"),
        "usuario" => $this->session->userdata("nombre"),
    ];

    $this->Ecografias_model->createEcografiaMorfologica($datos);
    
   // Enviar respuesta JSON para que el frontend sepa que todo salió bien
   echo json_encode(["status" => "success", "message" => "Ecografía Morfológica registrada correctamente"]);

}


  // ECOGRAFIA TRASVAGINAL

  public function createEcografiaTrasvaginal() {
    $documento_paciente = $this->input->post("documento_paciente");
    $codigo_doctor = $this->input->post("codigo_doctor");
    $uteroTipo = $this->input->post("uteroTipo");
    $superficie = $this->input->post("superficie");
    $endometrio = $this->input->post("endometrio");
    $tumoranexial = $this->input->post("tumoranexial");
    $tumorAnexialCom = $this->input->post("tumorAnexialCom");
    $uteroMedidas = $this->input->post("uteroMedidas");
    $medidaUtero1 = $this->input->post("medidaUtero1");
    $medidaUtero2 = $this->input->post("medidaUtero2");
    $comentarioUtero = $this->input->post("comentarioUtero");
    $ovarioDer1 = $this->input->post("ovarioDer1");
    $ovarioDer2 = $this->input->post("ovarioDer2");
    $comentarioOvarioDer = $this->input->post("comentarioOvarioDer");
    $ovarioIz1 = $this->input->post("ovarioIz1");
    $ovarioIz2 = $this->input->post("ovarioIz2");
    $comentarioOvarioIzq = $this->input->post("comentarioOvarioIzq");
    $fondosaco = $this->input->post("fondosaco");
    $miometrio = $this->input->post("miometrio");
    $conclusion = $this->input->post("conclusion");
    $sugerencias = $this->input->post("sugerencias");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "uteroTipo" => $uteroTipo,
        "superficie" => $superficie,
        "endometrio" => $endometrio,
        "tumoranexial" => $tumoranexial,
        "tumorAnexialCom" => $tumorAnexialCom,
        "uteroMedidas" => $uteroMedidas,
        "medidaUtero1" => $medidaUtero1,
        "medidaUtero2" => $medidaUtero2,
        "comentarioUtero" => $comentarioUtero,
        "ovarioDer1" => $ovarioDer1,
        "ovarioDer2" => $ovarioDer2,
        "comentarioOvarioDer" => $comentarioOvarioDer,
        "ovarioIz1" => $ovarioIz1,
        "ovarioIz2" => $ovarioIz2,
        "comentarioOvarioIzq" => $comentarioOvarioIzq,
        "fondosaco" => $fondosaco,
        "miometrio" => $miometrio,
        "conclusion" => $conclusion,
        "sugerencias" => $sugerencias,
        "fecha" => date("Y-m-d"),
        "hora" => date("H:i:s"),
        "usuario" => $this->session->userdata("nombre"),
    ];

    $this->Ecografias_model->createEcografiaTrasvaginal($datos);
    
    // Enviar respuesta JSON al frontend
    echo json_encode(["status" => "success", "message" => "Ecografía Trasvaginal registrada correctamente"]);
    }

    // ECOGRAFIA PELVICA

    public function createEcografiaPelvica() {
      $documento_paciente = $this->input->post("documento_paciente");
      $codigo_doctor = $this->input->post("codigo_doctor");
      $uteroTipo = $this->input->post("uteroTipo");
      $superficie = $this->input->post("superficie");
      $endometrio = $this->input->post("endometrio");
      $tumoraxial = $this->input->post("tumoraxial");
      $tumor_anexial_com = $this->input->post("tumor_anexial_com");
      $uteroMedidas = $this->input->post("uteroMedidas");
      $medidaUtero1 = $this->input->post("medidaUtero1");
      $medidaUtero2 = $this->input->post("medidaUtero2");
      $comentarioUtero = $this->input->post("comentarioUtero");
      $ovarioDer1 = $this->input->post("ovarioDer1");
      $ovarioDer2 = $this->input->post("ovarioDer2");
      $comentarioOvarioDer = $this->input->post("comentarioOvarioDer");
      $ovarioIz1 = $this->input->post("ovarioIz1");
      $ovarioIz2 = $this->input->post("ovarioIz2");
      $comentarioOvarioIzq = $this->input->post("comentarioOvarioIzq");
      $fondosaco = $this->input->post("fondosaco");
      $miometrio = $this->input->post("miometrio");
      $conclusion = $this->input->post("conclusion");
      $sugerencias = $this->input->post("sugerencias");
  
      $datos = [
          "documento_paciente" => $documento_paciente,
          "codigo_doctor" => $codigo_doctor,
          "utero_tipo" => $uteroTipo,
          "superficie" => $superficie,
          "endometrio" => $endometrio,
          "tumoraxial" => $tumoraxial,
          "tumor_anexial_com" => $tumor_anexial_com,
          "utero_medidas" => $uteroMedidas,
          "medida_utero1" => $medidaUtero1,
          "medida_utero2" => $medidaUtero2,
          "comentario_utero" => $comentarioUtero,
          "ovario_der1" => $ovarioDer1,
          "ovario_der2" => $ovarioDer2,
          "comentario_ovario_der" => $comentarioOvarioDer,
          "ovario_iz1" => $ovarioIz1,
          "ovario_iz2" => $ovarioIz2,
          "comentario_ovario_izq" => $comentarioOvarioIzq,
          "fondosaco" => $fondosaco,
          "miometrio" => $miometrio,
          "conclusion" => $conclusion,
          "sugerencias" => $sugerencias,
          "fecha" => date("Y-m-d"),
          "hora" => date("H:i:s"),
          "usuario" => $this->session->userdata("nombre"),
      ];
  
      $this->Ecografias_model->createEcografiaPelvica($datos);
  
      // Enviar respuesta JSON para que el frontend sepa que todo salió bien
      echo json_encode(["status" => "success", "message" => "Ecografía Pélvica registrada correctamente"]);
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