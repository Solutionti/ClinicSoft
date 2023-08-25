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
        $this->load->view("administrador/ecografias/ecografia_mama");
    }

    // ECOGRAFIA TRANSVAGINAL

    public function createEcografiaTransvaginal() {

      $documento_paciente = $this->input->post("documento_paciente"); 
      $codigo_doctor = $this->input->post("codigo_doctor"); 
      $utero_tipo = $this->input->post("utero_tipo"); 
      $superficie_tipo = $this->input->post("superficie_tipo"); 
      $endometrio = $this->input->post("endometrio"); 
      $tumor_anexial = $this->input->post("tumor_anexial"); 
      $utero_dimensiones = $this->input->post("utero_dimensiones"); 
      $utero_longitud = $this->input->post("utero_longitud"); 
      $utero_tranverso = $this->input->post("utero_tranverso"); 
      $utero_antpost = $this->input->post("utero_antpost"); 
      $comentario_utero = $this->input->post("comentario_utero"); 
      $ovarizq_dimensiones = $this->input->post("ovarizq_dimensiones"); 
      $ovarizq_longitud = $this->input->post("ovarizq_longitud"); 
      $ovarizq_tranverso = $this->input->post("ovarizq_tranverso"); 
      $comentario_ovarizq = $this->input->post("comentario_ovarizq"); 
      $ovarder_dimensiones = $this->input->post("ovarder_dimensiones"); 
      $ovarder_longitud = $this->input->post("ovarder_longitud"); 
      $ovarder_tranverso = $this->input->post("ovarder_tranverso"); 
      $comentario_ovarder = $this->input->post("comentario_ovarder"); 
      $fondo_saco = $this->input->post("fondo_saco"); 
      $conclusion = $this->input->post("conclusion"); 
      $sugerencias = $this->input->post("sugerencias");
      
      $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "utero_tipo" => $utero_tipo,
        "superficie_tipo" => $superficie_tipo,
        "endometrio" => $endometrio,
        "tumor_anexial" => $tumor_anexial,
        "utero_dimensiones" => $utero_dimensiones,
        "utero_longitud" => $utero_longitud,
        "utero_tranverso" => $utero_tranverso,
        "utero_antpost" => $utero_antpost,
        "comentario_utero" => $comentario_utero,
        "ovarizq_dimensiones" => $ovarizq_dimensiones,
        "ovarizq_longitud" => $ovarizq_longitud,
        "ovarizq_tranverso" => $ovarizq_tranverso,
        "comentario_ovarizq" => $comentario_ovarizq,
        "ovarder_dimensiones" => $ovarder_dimensiones,
        "ovarder_longitud" => $ovarder_longitud,
        "ovarder_tranverso" => $ovarder_tranverso,
        "comentario_ovarder" => $comentario_ovarder,
        "fondo_saco" => $fondo_saco,
        "conclusion" => $conclusion,
        "sugerencias" => $sugerencias
      ];
      $this->Ecografias_model->createEcografiaTransvaginal($datos);
      
    }

    public function ecografiaTransvaginal() {
      $this->load->library("pdf");
      $pdfAct = new Pdf();
      $this->load->view("administrador/ecografias/ecografia_transvaginal");
    }  

    // ECOGRAFIA PELVICA

    public function createEcografiaPelvica() {
      $documento_paciente = $this->input->post("documento_paciente"); 
      $codigo_doctor = $this->input->post("codigo_doctor"); 
      $utero_tipo = $this->input->post("utero_tipo"); 
      $superficie_tipo = $this->input->post("superficie_tipo"); 
      $endometrio = $this->input->post("endometrio"); 
      $tumor_anexial = $this->input->post("tumor_anexial"); 
      $utero_dimensiones = $this->input->post("utero_dimensiones"); 
      $utero_longitud = $this->input->post("utero_longitud"); 
      $utero_tranverso = $this->input->post("utero_tranverso"); 
      $utero_antpost = $this->input->post("utero_antpost"); 
      $comentario_utero = $this->input->post("comentario_utero"); 
      $ovarizq_dimensiones = $this->input->post("ovarizq_dimensiones"); 
      $ovarizq_longitud = $this->input->post("ovarizq_longitud"); 
      $ovarizq_tranverso = $this->input->post("ovarizq_tranverso"); 
      $comentario_ovarizq = $this->input->post("comentario_ovarizq"); 
      $ovarder_dimensiones = $this->input->post("ovarder_dimensiones"); 
      $ovarder_longitud = $this->input->post("ovarder_longitud"); 
      $ovarder_tranverso = $this->input->post("ovarder_tranverso"); 
      $comentario_ovarder = $this->input->post("comentario_ovarder"); 
      $fondo_saco = $this->input->post("fondo_saco"); 
      $miometrio = $this->input->post("miometrio"); 
      $conclusion = $this->input->post("conclusion"); 
      $sugerencias = $this->input->post("sugerencias");
      
      $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "utero_tipo" => $utero_tipo,
        "superficie_tipo" => $superficie_tipo,
        "endometrio" => $endometrio,
        "tumor_anexial" => $tumor_anexial,
        "utero_dimensiones" => $utero_dimensiones,
        "utero_longitud" => $utero_longitud,
        "utero_tranverso" => $utero_tranverso,
        "utero_antpost" => $utero_antpost,
        "comentario_utero" => $comentario_utero,
        "ovarizq_dimensiones" => $ovarizq_dimensiones,
        "ovarizq_longitud" => $ovarizq_longitud,
        "ovarizq_tranverso" => $ovarizq_tranverso,
        "comentario_ovarizq" => $comentario_ovarizq,
        "ovarder_dimensiones" => $ovarder_dimensiones,
        "ovarder_longitud" => $ovarder_longitud,
        "ovarder_tranverso" => $ovarder_tranverso,
        "comentario_ovarder" => $comentario_ovarder,
        "fondo_saco" => $fondo_saco,
        "miometrio" => $miometrio,
        "conclusion" => $conclusion,
        "sugerencias" => $sugerencias
      ];

      $this->Ecografias_model->createEcografiaPelvica($datos);
    }

    public function ecografiaPelvica() {
      $this->load->library("pdf");
      $pdfAct = new Pdf();
      $this->load->view("administrador/ecografias/ecografia_pelvica");
    } 

    // ECOGRAFIA MORFOLOGICA

    public function crearEcografiaMorfologica() {
      $documento_paciente = $this->input->post("documento_paciente"); 
      $codigo_doctor = $this->input->post("codigo_doctor"); 
      $sexo_m = $this->input->post("sexo_m"); 
      $sexo_f = $this->input->post("sexo_f");
      $sexo_novisible = $this->input->post("sexo_novisible");
      $cefalico = $this->input->post("cefalico");
      $podatico = $this->input->post("podatico");
      $indiferente = $this->input->post("indiferente");
      $formacabeza= $this->input->post("formacabeza");
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
      $comentario_morfo = $this->input->post("comentario_morfo");
      $ip_der = $this->input->post("ip_der");
      $ip_izq = $this->input->post("ip_izq");
      $ponderadoFetal = $this->input->post("ponderadoFetal");
      $lcf_fetal = $this->input->post("lcf_fetal");
      $conclusiones_morfo = $this->input->post("conclusiones_morfo");
      
      $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "sexo_m" => $sexo_m,
        "sexo_f" => $sexo_f,
        "sexo_novisible" => $sexo_novisible,
        "cefalico" => $cefalico,
        "podatico" => $podatico,
        "indiferente" => $indiferente,
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
        "comentario_morfo" => $comentario_morfo,
        "ip_der" => $ip_der,
        "ip_izq" => $ip_izq,
        "ponderadoFetal" => $ponderadoFetal,
        "lcf_fetal" => $lcf_fetal,
        "conclusiones_morfo" => $conclusiones_morfo
      ];

      $this->Ecografias_model->crearEcografiaMorfologica($datos);

    }

    public function ecografiaMorfologica() {
      $this->load->library("pdf");
      $pdfAct = new Pdf();
      $this->load->view("administrador/ecografias/ecografia_morfologica");
    } 

    //ECOGRAFIA GENETICA 

    public function crearEcografiaGenetica() {
      $documento_paciente = $this->input->post("documento_paciente"); 
      $codigo_doctor = $this->input->post("codigo_doctor");
      $feto_unico = $this->input->post("feto_unico");
      $feto_multiple = $this->input->post("feto_multiple");
      $situacion_cefalico = $this->input->post("situacion_cefalico");
      $situacion_podatico = $this->input->post("situacion_podatico");
      $situacion_indiferente = $this->input->post("situacion_indiferente");
      $liquidoAmniotico = $this->input->post("liquidoAmniotico");
      $placenta = $this->input->post("placenta");
      $lcr = $this->input->post("lcr");
      $lcf = $this->input->post("lcf");
      $xd = $this->input->post("xd");
      $art_Uteder = $this->input->post("art_Uteder");
      $art_Uteizq = $this->input->post("art_Uteizq");
      $ippromedio = $this->input->post("ippromedio");
      $huesoNasal = $this->input->post("huesoNasal");
      $translucenciaNucal = $this->input->post("translucenciaNucal");
      $ductudVenosa = $this->input->post("ductudVenosa");
      $conclusion_genetica = $this->input->post("conclusion_genetica");
      $sugerencia_genetica = $this->input->post("sugerencia_genetica");

      $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "feto_unico" => $feto_unico,
        "feto_multiple" => $feto_multiple,
        "situacion_cefalico" => $situacion_cefalico,
        "situacion_podatico" => $situacion_podatico,
        "situacion_indiferente" => $situacion_indiferente,
        "liquidoAmniotico" => $liquidoAmniotico,
        "placenta" => $placenta,
        "lcr" => $lcr,
        "lcf" => $lcf,
        "xd" => $xd,
        "art_Uteder" => $art_Uteder,
        "art_Uteizq" => $art_Uteizq,
        "ippromedio" => $ippromedio,
        "huesoNasal" => $huesoNasal,
        "translucenciaNucal" => $translucenciaNucal,
        "ductudVenosa" => $ductudVenosa,
        "conclusion_genetica" => $conclusion_genetica,
        "sugerencia_genetica" => $sugerencia_genetica,
      ];

      $this->Ecografias_model->crearEcografiaGenetica($datos);

    }

    public function ecografiaGenetica() {
      $this->load->library("pdf");
      $pdfAct = new Pdf();
      $this->load->view("administrador/ecografias/ecografia_genetica");
    }

    // ECOGRAFIA OBSTETRICA

    public function crearEcografiaObstetrica() {
      $documento_paciente = $this->input->post("documento_paciente");  
      $codigo_doctor = $this->input->post("codigo_doctor");  
      $feto_unico_obs = $this->input->post("feto_unico_obs");
      $feto_multiple_obs = $this->input->post("feto_multiple_obs");
      $situacion_cefalico_obs = $this->input->post("situacion_cefalico_obs");
      $situacion_podatico_obs = $this->input->post("situacion_podatico_obs");
      $situacion_indiferente_obs = $this->input->post("situacion_indiferente_obs");
      $estadoFeto = $this->input->post("estadoFeto");
      $placenta_obs = $this->input->post("placenta_obs");
      $dpb = $this->input->post("dpb");
      $lcf_obs = $this->input->post("lcf_obs");
      $min = $this->input->post("min");
      $cc = $this->input->post("cc");
      $ca = $this->input->post("ca");
      $lf = $this->input->post("lf");
      $ila = $this->input->post("ila");
      $percentil = $this->input->post("percentil");
      $tipoParto = $this->input->post("tipoParto");
      $conclusion_obs = $this->input->post("conclusion_obs");
      $sugerencia_obs = $this->input->post("sugerencia_obs");
        
        $datos = [
          "documento_paciente" => $documento_paciente,
          "codigo_doctor" => $codigo_doctor,
          "feto_unico_obs" => $feto_unico_obs,
          "feto_multiple_obs" => $feto_multiple_obs,
          "situacion_cefalico_obs" => $situacion_cefalico_obs,
          "situacion_podatico_obs" => $situacion_podatico_obs,
          "situacion_indiferente_obs" => $situacion_indiferente_obs,
          "estadoFeto" => $estadoFeto,
          "placenta_obs" => $placenta_obs,
          "dpb" => $dpb,
          "lcf_obs" => $lcf_obs,
          "min" => $min,
          "cc" => $cc,
          "ca" => $ca,
          "lf" => $lf,
          "ila" => $ila,
          "percentil" => $percentil,
          "tipoParto" => $tipoParto,
          "conclusion_obs" => $conclusion_obs,
          "sugerencia_obs" => $sugerencia_obs
        ];

        $this->Ecografias_model->crearEcografiaObstetrica($datos);
    }

    public function ecografiaObstetrica() {
      $this->load->library("pdf");
      $pdfAct = new Pdf();
      $this->load->view("administrador/ecografias/ecografia_obstetrica");
    }


    // 
    // 
    // 
    // 
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