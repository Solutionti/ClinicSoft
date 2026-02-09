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
  
   /* public function createEcografiaMama() {
     
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

    //public function ecografiaMama() {
        //$this->load->library("pdf");
        //$pdfAct = new Pdf();
        //$this->load->view("administrador/ecografias/ecografia_transvaginal");
    //} */

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
      $birads_final = $this->input->post("birads_final");
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
          "birads_final" => $birads_final,
          "sugerencias_mama" => $sugerencias_mama,
      ];
  
     
 // Insertar en la base de datos utilizando el modelo
 $this->Ecografias_model->createEcografiaMama($datos);
  
 // Enviar respuesta JSON para que el frontend sepa que todo salió bien
 echo json_encode(["status" => "success", "message" => "Ecografía Mama registrada correctamente"]);
    
   
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
    $lcc = $this->input->post("lcc");
    $lcf = $this->input->post("lcf");
    $artUteder = $this->input->post("artUteder");
    $artUteizq = $this->input->post("artUteizq");
    $ippromedio = $this->input->post("ippromedio");
    $huesoNasal = $this->input->post("huesoNasal");
    $translucenciaNucal = $this->input->post("translucenciaNucal");
    $ductudVenosa = $this->input->post("ductudVenosa");
    $flujoTricuspideo = $this->input->post("flujoTricuspideo");
    $conclusion_mama = $this->input->post("conclusion_mama");
    $sugerencias_mama = $this->input->post("sugerencias_mama");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "fetoembrion" => $fetoembrion,
        "situacion" => $situacion,
        "liquidoAmniotico" => $liquidoAmniotico,
        "placenta" => $placenta,
        "lcc" => $lcc,
        "lcf" => $lcf,
        "artUteder" => $artUteder,
        "artUteizq" => $artUteizq,
        "ippromedio" => $ippromedio,
        "huesoNasal" => $huesoNasal,
        "translucenciaNucal" => $translucenciaNucal,
        "ductudVenosa" => $ductudVenosa,
        "flujoTricuspideo" => $flujoTricuspideo,
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
    $situacion = $this->input->post("situacion");
    $formacabeza = $this->input->post("formacabeza");
    $cerebelo = $this->input->post("cerebelo");
    $cisternaMagna = $this->input->post("cisternaMagna");
    $atrioVentricular = $this->input->post("atrioVentricular");
    $pliegueNucal = $this->input->post("pliegueNucal");
    $perfilCara = $this->input->post("perfilCara");
    $cuello = $this->input->post("cuello");
    $perfiltorax = $this->input->post("perfiltorax");
    $corazon = $this->input->post("corazon");
    $columnaVertebral = $this->input->post("columnaVertebral");
    $extremidades = $this->input->post("extremidades");
    $abdomen = $this->input->post("abdomen");
    $dbp = $this->input->post("dbp");
    $cc = $this->input->post("cc");
    $ca = $this->input->post("ca");
    $lf = $this->input->post("lf");
    $placenta_liquido = $this->input->post("placenta_liquido");
    $ipder = $this->input->post("ipder");
    $ipizq = $this->input->post("ipizq");
    $ip_promedio = $this->input->post("ip_promedio");
    $cervicometria = $this->input->post("cervicometria");
    $ponderadoFetal = $this->input->post("ponderadoFetal");
    $lcf = $this->input->post("lcf");
    $conclusiones = $this->input->post("conclusiones");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "sexo" => $sexo,
        "situacion" => $situacion,
        "formacabeza" => $formacabeza,
        "cerebelo" => $cerebelo,
        "cisternaMagna" => $cisternaMagna,
        "atrioVentricular" => $atrioVentricular,
        "pliegueNucal" => $pliegueNucal,
        "perfilCara" => $perfilCara,
        "cuello" => $cuello,
        "perfiltorax" => $perfiltorax,
        "corazon" => $corazon,
        "columnaVertebral" => $columnaVertebral,
        "extremidades" => $extremidades,
        "abdomen" => $abdomen,
        "dbp" => $dbp,
        "cc" => $cc,
        "ca" => $ca,
        "lf" => $lf,
        "placenta_liquido" => $placenta_liquido,
        "ipder" => $ipder,
        "ipizq" => $ipizq,
        "ip_promedio" => $ip_promedio,
        "cervicometria" => $cervicometria,
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
    $miometrio = $this->input->post("miometrio");
    $endometrio = $this->input->post("endometrio_grosor");
    $ut_l = $this->input->post("ut_l");
    $ut_ap = $this->input->post("ut_ap");
    $ut_t = $this->input->post("ut_t");
    $ut_vol = $this->input->post("ut_vol");
    $comentarioUtero = $this->input->post("comentarioUtero");
    $od_l = $this->input->post("od_l");
    $ovarioDer1 = $this->input->post("ovarioDer1");
    $ovarioDer2 = $this->input->post("ovarioDer2");
    $comentarioOvarioDer = $this->input->post("comentarioOvarioDer");
    $ovarioIz1 = $this->input->post("ovarioIz1");
    $ovarioIz2 = $this->input->post("ovarioIz2");
    $comentarioOvarioIzq = $this->input->post("comentarioOvarioIzq");
    $fondosaco = $this->input->post("fondosaco");
    $conclusion = $this->input->post("conclusion");
    $sugerencias = $this->input->post("sugerencias");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "uteroTipo" => $uteroTipo,
        "superficie" => $superficie,
        "miometrio" => $miometrio,
        "endometrio" => $endometrio_grosor,
        "ut_l" => $ut_l,
        "ut_ap" => $ut_ap,
        "ut_t" => $ut_t,
        "ut_vol" => $ut_vol,
        "comentarioUtero" => $comentarioUtero,
        "od_l" => $od_l,
        "ovarioDer1" => $ovarioDer1,
        "ovarioDer2" => $ovarioDer2,
        "comentarioOvarioDer" => $comentarioOvarioDer,
        "ovarioIz1" => $ovarioIz1,
        "ovarioIz2" => $ovarioIz2,
        "comentarioOvarioIzq" => $comentarioOvarioIzq,
        "fondosaco" => $fondosaco,
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
  
// ECOGRAFIA ABDOMINAL
public function createEcografiaAbdominal() {
  $documento_paciente = $this->input->post("documento_paciente");
  $codigo_doctor = $this->input->post("codigo_doctor");
  $motivo = $this->input->post("motivo");
  $estomago = $this->input->post("estomago");
  $higado = $this->input->post("higado");
  $coledoco_diametro = $this->input->post("coledoco_diametro");
  $vesicula_volumen = $this->input->post("vesicula_volumen");
  $vesicula_paredes = $this->input->post("vesicula_paredes");
  $bazo = $this->input->post("bazo");
  $rinon_derecho = $this->input->post("rinon_derecho");
  $rinon_izquierdo = $this->input->post("rinon_izquierdo");
  $otros_hallazgos = $this->input->post("otros_hallazgos");
  $conclusiones = $this->input->post("conclusiones");
  $sugerencias = $this->input->post("sugerencias");

  $datos = [
      "documento_paciente" => $documento_paciente,
      "codigo_doctor" => $codigo_doctor,
      "motivo" => $motivo,
      "estomago" => $estomago,
      "higado" => $higado,
      "coledoco_diametro" => $coledoco_diametro,
      "vesicula_volumen" => $vesicula_volumen,
      "vesicula_paredes" => $vesicula_paredes,
      "bazo" => $bazo,
      "rinon_derecho" => $rinon_derecho,
      "rinon_izquierdo" => $rinon_izquierdo,
      "otros_hallazgos" => $otros_hallazgos,
      "conclusiones" => $conclusiones,
      "sugerencias" => $sugerencias,
      "fecha" => date("Y-m-d"),
      "hora" => date("H:i:s"),
      "usuario" => $this->session->userdata("nombre"),
  ];

  $this->Ecografias_model->createEcografiaAbdominal($datos);

  echo json_encode(["status" => "success", "message" => "Ecografía Abdominal registrada correctamente"]);
}

// ECOGRAFIA PROSTATICA

public function createEcografiaProstatica() {
  $documento_paciente = $this->input->post("documento_paciente");
  $codigo_doctor = $this->input->post("codigo_doctor");
  $motivo = $this->input->post("motivo");
  $replicacion = $this->input->post("replicacion");
  $paredes = $this->input->post("paredes");
  $contenido = $this->input->post("contenido");
  $detalle_contenido = $this->input->post("detalle_contenido");
  $imagenes_expansivas = $this->input->post("imagenes_expansivas");
  $detalle_imagenes = $this->input->post("detalle_imagenes");
  $calculos = $this->input->post("calculos");
  $detalle_calculos = $this->input->post("detalle_calculos");
  $vol_pre = $this->input->post("vol_pre");
  $vol_post = $this->input->post("vol_post");
  $retencion = $this->input->post("retencion");
  $descripcion = $this->input->post("descripcion");
  $bordes = $this->input->post("bordes");
  $transverso = $this->input->post("transverso");
  $antero_posterior = $this->input->post("antero_posterior");
  $longitudinal = $this->input->post("longitudinal");
  $volumen = $this->input->post("volumen");
  $otra = $this->input->post("otra");
  $observacion_textarea = $this->input->post("observacion_textarea");
  $conclusiones = $this->input->post("conclusiones");

  $datos = [
      "documento_paciente" => $documento_paciente,
      "codigo_doctor" => $codigo_doctor,
      "motivo" => $motivo,
      "replicacion" => $replicacion,
      "paredes" => $paredes,
      "contenido" => $contenido,
      "detalle_contenido" => $detalle_contenido,
      "imagenes_expansivas" => $imagenes_expansivas,
      "detalle_imagenes" => $detalle_imagenes,
      "calculos" => $calculos,
      "detalle_calculos" => $detalle_calculos,
      "vol_pre" => $vol_pre,
      "vol_post" => $vol_post,
      "retencion" => $retencion,
      "descripcion" => $descripcion,
      "bordes" => $bordes,
      "transverso" => $transverso,
      "antero_posterior" => $antero_posterior,
      "longitudinal" => $longitudinal,
      "volumen" => $volumen,
      "otra" => $otra,
      "observacion_textarea" => $observacion_textarea,
      "conclusiones" => $conclusiones,
      "fecha" => date("Y-m-d"),
      "hora" => date("H:i:s"),
      "usuario" => $this->session->userdata("nombre"),
  ];

  $this->Ecografias_model->createEcografiaProstatica($datos);

  echo json_encode(["status" => "success", "message" => "Ecografía Prostática registrada correctamente"]);
}

// ECOGRAFIA RENAL

public function createEcografiaRenal() {
  $documento_paciente = $this->input->post("documento_paciente");
  $codigo_doctor = $this->input->post("codigo_doctor");
  $motivo = $this->input->post("motivo");

  // Riñón derecho
  $morfologia_movilidad_derecho = $this->input->post("morfologia_movilidad_derecho");
  $ecogenicidad_derecho = $this->input->post("ecogenicidad_derecho");
  $medidas_longitud_derecho = $this->input->post("medidas_longitud_derecho");
  $medidas_parenquima_derecho = $this->input->post("medidas_parenquima_derecho");
  $imagenes_expansivas_solidas_derecho = $this->input->post("imagenes_expansivas_solidas_derecho");
  $imagenes_expansivas_quisticas_derecho = $this->input->post("imagenes_expansivas_quisticas_derecho");
  $hidronefrosis_derecho = $this->input->post("hidronefrosis_derecho");
  $medidas_hidronefrosis_derecho = $this->input->post("medidas_hidronefrosis_derecho");

  // Riñón izquierdo
  $morfologia_movilidad_izquierdo = $this->input->post("morfologia_movilidad_izquierdo");
  $ecogenicidad_izquierdo = $this->input->post("ecogenicidad_izquierdo");
  $medidas_longitud_izquierdo = $this->input->post("medidas_longitud_izquierdo");
  $medidas_parenquima_izquierdo = $this->input->post("medidas_parenquima_izquierdo");
  $imagenes_expansivas_solidas_izquierdo = $this->input->post("imagenes_expansivas_solidas_izquierdo");
  $imagenes_expansivas_quisticas_izquierdo = $this->input->post("imagenes_expansivas_quisticas_izquierdo");
  $hidronefrosis_izquierdo = $this->input->post("hidronefrosis_izquierdo");
  $medidas_hidronefrosis_izquierdo = $this->input->post("medidas_hidronefrosis_izquierdo");

  // Vejiga
  $repelcion_vejiga = $this->input->post("repelcion_vejiga");
  $paredes_vejiga = $this->input->post("paredes_vejiga");
  $contenido_aneocoico = $this->input->post("contenido_aneocoico");
  $imagenes_expansivas_vejiga = $this->input->post("imagenes_expansivas_vejiga");
  $calculos_vejiga = $this->input->post("calculos_vejiga");
  $vol_pre_miccional = $this->input->post("vol_pre_miccional");
  $vol_post_miccional = $this->input->post("vol_post_miccional");
  $retencion = $this->input->post("retencion");

  // Observaciones
  $observacion_textarea = $this->input->post("observacion_textarea");
  $conclusiones = $this->input->post("conclusiones");

  $datos = [
      "documento_paciente" => $documento_paciente,
      "codigo_doctor" => $codigo_doctor,
      "motivo" => $motivo,
      // Riñón derecho
      "morfologia_movilidad_derecho" => $morfologia_movilidad_derecho,
      "ecogenicidad_derecho" => $ecogenicidad_derecho,
      "medidas_longitud_derecho" => $medidas_longitud_derecho,
      "medidas_parenquima_derecho" => $medidas_parenquima_derecho,
      "imagenes_expansivas_solidas_derecho" => $imagenes_expansivas_solidas_derecho,
      "imagenes_expansivas_quisticas_derecho" => $imagenes_expansivas_quisticas_derecho,
      "hidronefrosis_derecho" => $hidronefrosis_derecho,
      "medidas_hidronefrosis_derecho" => $medidas_hidronefrosis_derecho,
      // Riñón izquierdo
      "morfologia_movilidad_izquierdo" => $morfologia_movilidad_izquierdo,
      "ecogenicidad_izquierdo" => $ecogenicidad_izquierdo,
      "medidas_longitud_izquierdo" => $medidas_longitud_izquierdo,
      "medidas_parenquima_izquierdo" => $medidas_parenquima_izquierdo,
      "imagenes_expansivas_solidas_izquierdo" => $imagenes_expansivas_solidas_izquierdo,
      "imagenes_expansivas_quisticas_izquierdo" => $imagenes_expansivas_quisticas_izquierdo,
      "hidronefrosis_izquierdo" => $hidronefrosis_izquierdo,
      "medidas_hidronefrosis_izquierdo" => $medidas_hidronefrosis_izquierdo,
      // Vejiga
      "repelcion_vejiga" => $repelcion_vejiga,
      "paredes_vejiga" => $paredes_vejiga,
      "contenido_aneocoico" => $contenido_aneocoico,
      "imagenes_expansivas_vejiga" => $imagenes_expansivas_vejiga,
      "calculos_vejiga" => $calculos_vejiga,
      "vol_pre_miccional" => $vol_pre_miccional,
      "vol_post_miccional" => $vol_post_miccional,
      "retencion" => $retencion,
      // Observaciones
      "observacion_textarea" => $observacion_textarea,
      "conclusiones" => $conclusiones,
      "fecha" => date("Y-m-d"),
      "hora" => date("H:i:s"),
      "usuario" => $this->session->userdata("nombre"),
  ];

  $this->Ecografias_model->createEcografiaRenal($datos);

  echo json_encode(["status" => "success", "message" => "Ecografía Renal registrada correctamente"]);
}


// ECOGRAFIA DE TIROIDES
public function createEcografiaTiroides() {
  // Recuperar los datos enviados por AJAX
  $documento_paciente = $this->input->post("documento_paciente");
  $codigo_doctor = $this->input->post("codigo_doctor");
  $motivo = $this->input->post("motivo");
  $descripcionTiroides = $this->input->post("descripcionTiroides");
  $lobuloDerecho = $this->input->post("lobuloDerecho");
  $lobuloIzquierdo = $this->input->post("lobuloIzquierdo");
  $istmo = $this->input->post("istmo");
  $estructurasVasculares = $this->input->post("estructurasVasculares");
  $glandulasSubmaxilares = $this->input->post("glandulasSubmaxilares");
  $adenopatiaCervicales = $this->input->post("adenopatiaCervicales");
  $piel = $this->input->post("piel");
  $tcsc = $this->input->post("tcsc");
  $conclusiones = $this->input->post("conclusiones");
  $sugerencias = $this->input->post("sugerencias");

  // Organizar los datos en un array
  $datos = [
      "documento_paciente" => $documento_paciente,
      "codigo_doctor" => $codigo_doctor,
      "motivo" => $motivo,
      "descripcionTiroides" => $descripcionTiroides,
      "lobuloDerecho" => $lobuloDerecho,
      "lobuloIzquierdo" => $lobuloIzquierdo,
      "istmo" => $istmo,
      "estructurasVasculares" => $estructurasVasculares,
      "glandulasSubmaxilares" => $glandulasSubmaxilares,
      "adenopatiaCervicales" => $adenopatiaCervicales,
      "piel" => $piel,
      "tcsc" => $tcsc,
      "conclusiones" => $conclusiones,
      "sugerencias" => $sugerencias,
      "fecha" => date("Y-m-d"), // Fecha actual
      "hora" => date("H:i:s"), // Hora actual
      "usuario" => $this->session->userdata("nombre") // Usuario de la sesión
  ];

  // Llamar al modelo para guardar los datos
  $this->Ecografias_model->createEcografiaTiroides($datos);

  // Devolver una respuesta JSON
  echo json_encode(["status" => "success", "message" => "Ecografía de Tiroides registrada correctamente"]);
}

// ECOGRAFIA HISTEROSONOGRAFIA

public function createEcografiaHisterosonografia() {
  // Recuperar los datos enviados por AJAX
  $documento_paciente = $this->input->post("documento_paciente");
  $codigo_doctor = $this->input->post("codigo_doctor");
  $motivo = $this->input->post("motivo");
  $descripcionProcedimiento = $this->input->post("descripcionProcedimiento");
  $conclusiones = $this->input->post("conclusiones");
  $sugerencias = $this->input->post("sugerencias");

  // Organizar los datos en un array
  $datos = [
      "documento_paciente" => $documento_paciente,
      "codigo_doctor" => $codigo_doctor,
      "motivo" => $motivo,
      "descripcionProcedimiento" => $descripcionProcedimiento,
      "conclusiones" => $conclusiones,
      "sugerencias" => $sugerencias,
      "fecha" => date("Y-m-d"), // Fecha actual
      "hora" => date("H:i:s"), // Hora actual
      "usuario" => $this->session->userdata("nombre") // Usuario de la sesión
  ];

  // Llamar al modelo para guardar los datos
  $this->Ecografias_model->createEcografiaHisterosonografia($datos);

  // Devolver una respuesta JSON
  echo json_encode(["status" => "success", "message" => "Ecografia Histerosonografía registrada correctamente"]);
}


// ECOGRAFIA ARTERIAL
public function createEcografiaArterial() {
  // Recuperar los datos enviados por AJAX
  $documento_paciente = $this->input->post("documento_paciente");
  $codigo_doctor = $this->input->post("codigo_doctor");
  $motivo = $this->input->post("motivo");
  $descripcionProcedimientoDerecho = $this->input->post("descripcionProcedimientoDerecho");
  $descripcionProcedimientoIzquierdo = $this->input->post("descripcionProcedimientoIzquierdo");
  // Miembro inferior derecho
  $vps_fc_derecho = $this->input->post("vps_fc_derecho");
  $onda_fc_derecho = $this->input->post("onda_fc_derecho");
  $vps_fs_derecho = $this->input->post("vps_fs_derecho");
  $onda_fs_derecho = $this->input->post("onda_fs_derecho");
  $vps_poplitea_derecho = $this->input->post("vps_poplitea_derecho");
  $onda_poplitea_derecho = $this->input->post("onda_poplitea_derecho");
  $vps_tp_derecho = $this->input->post("vps_tp_derecho");
  $onda_tp_derecho = $this->input->post("onda_tp_derecho");
  $vps_ta_derecho = $this->input->post("vps_ta_derecho");
  $onda_ta_derecho = $this->input->post("onda_ta_derecho");
  $vps_media_derecho = $this->input->post("vps_media_derecho");
  $onda_media_derecho = $this->input->post("onda_media_derecho");
  // Miembro inferior izquierdo
  $vps_fc_izquierdo = $this->input->post("vps_fc_izquierdo");
  $onda_fc_izquierdo = $this->input->post("onda_fc_izquierdo");
  $vps_fs_izquierdo = $this->input->post("vps_fs_izquierdo");
  $onda_fs_izquierdo = $this->input->post("onda_fs_izquierdo");
  $vps_poplitea_izquierdo = $this->input->post("vps_poplitea_izquierdo");
  $onda_poplitea_izquierdo = $this->input->post("onda_poplitea_izquierdo");
  $vps_tp_izquierdo = $this->input->post("vps_tp_izquierdo");
  $onda_tp_izquierdo = $this->input->post("onda_tp_izquierdo");
  $vps_ta_izquierdo = $this->input->post("vps_ta_izquierdo");
  $onda_ta_izquierdo = $this->input->post("onda_ta_izquierdo");
  $vps_media_izquierdo = $this->input->post("vps_media_izquierdo");
  $onda_media_izquierdo = $this->input->post("onda_media_izquierdo");
  // Conclusiones y sugerencias
  $conclusiones = $this->input->post("conclusiones");
  $sugerencias = $this->input->post("sugerencias");

  // Organizar los datos en un array
  $datos = [
      "documento_paciente" => $documento_paciente,
      "codigo_doctor" => $codigo_doctor,
      "motivo" => $motivo,
      "descripcionProcedimientoDerecho" => $descripcionProcedimientoDerecho,
      "descripcionProcedimientoIzquierdo" => $descripcionProcedimientoIzquierdo,
      // Miembro inferior derecho
      "vps_fc_derecho" => $vps_fc_derecho,
      "onda_fc_derecho" => $onda_fc_derecho,
      "vps_fs_derecho" => $vps_fs_derecho,
      "onda_fs_derecho" => $onda_fs_derecho,
      "vps_poplitea_derecho" => $vps_poplitea_derecho,
      "onda_poplitea_derecho" => $onda_poplitea_derecho,
      "vps_tp_derecho" => $vps_tp_derecho,
      "onda_tp_derecho" => $onda_tp_derecho,
      "vps_ta_derecho" => $vps_ta_derecho,
      "onda_ta_derecho" => $onda_ta_derecho,
      "vps_media_derecho" => $vps_media_derecho,
      "onda_media_derecho" => $onda_media_derecho,
      // Miembro inferior izquierdo
      "vps_fc_izquierdo" => $vps_fc_izquierdo,
      "onda_fc_izquierdo" => $onda_fc_izquierdo,
      "vps_fs_izquierdo" => $vps_fs_izquierdo,
      "onda_fs_izquierdo" => $onda_fs_izquierdo,
      "vps_poplitea_izquierdo" => $vps_poplitea_izquierdo,
      "onda_poplitea_izquierdo" => $onda_poplitea_izquierdo,
      "vps_tp_izquierdo" => $vps_tp_izquierdo,
      "onda_tp_izquierdo" => $onda_tp_izquierdo,
      "vps_ta_izquierdo" => $vps_ta_izquierdo,
      "onda_ta_izquierdo" => $onda_ta_izquierdo,
      "vps_media_izquierdo" => $vps_media_izquierdo,
      "onda_media_izquierdo" => $onda_media_izquierdo,
      // Conclusiones y sugerencias
      "conclusiones" => $conclusiones,
      "sugerencias" => $sugerencias,
      "fecha" => date("Y-m-d"), // Fecha actual
      "hora" => date("H:i:s"), // Hora actual
      "usuario" => $this->session->userdata("nombre") // Usuario de la sesión
  ];

  // Llamar al modelo para guardar los datos
  $this->Ecografias_model->createEcografiaArterial($datos);

  // Devolver una respuesta JSON
  echo json_encode(["status" => "success", "message" => "Ecografía Arterial registrada correctamente"]);
}

// ECOGRAFIA VENOSA
public function createEcografiaVenosa() {
  // Recuperar los datos enviados por AJAX
  $documento_paciente = $this->input->post("documento_paciente");
  $codigo_doctor = $this->input->post("codigo_doctor");
  $motivo = $this->input->post("motivo");
  $descripcionProcedimientoDerecho = $this->input->post("descripcionProcedimientoDerecho");
  $descripcionProcedimientoIzquierdo = $this->input->post("descripcionProcedimientoIzquierdo");
  // Miembro inferior derecho
  $medida_fc_derecho = $this->input->post("medida_fc_derecho");
  $reflujo_fc_derecho = $this->input->post("reflujo_fc_derecho");
  $medida_fs_derecho = $this->input->post("medida_fs_derecho");
  $reflujo_fs_derecho = $this->input->post("reflujo_fs_derecho");
  $medida_poplitea_derecho = $this->input->post("medida_poplitea_derecho");
  $reflujo_poplitea_derecho = $this->input->post("reflujo_poplitea_derecho");
  $medida_tp_derecho = $this->input->post("medida_tp_derecho");
  $reflujo_tp_derecho = $this->input->post("reflujo_tp_derecho");
  $medida_ta_derecho = $this->input->post("medida_ta_derecho");
  $reflujo_ta_derecho = $this->input->post("reflujo_ta_derecho");
  $medida_media_derecho = $this->input->post("medida_media_derecho");
  $reflujo_media_derecho = $this->input->post("reflujo_media_derecho");
  // Miembro inferior izquierdo
  $medida_fc_izquierdo = $this->input->post("medida_fc_izquierdo");
  $reflujo_fc_izquierdo = $this->input->post("reflujo_fc_izquierdo");
  $medida_fs_izquierdo = $this->input->post("medida_fs_izquierdo");
  $reflujo_fs_izquierdo = $this->input->post("reflujo_fs_izquierdo");
  $medida_poplitea_izquierdo = $this->input->post("medida_poplitea_izquierdo");
  $reflujo_poplitea_izquierdo = $this->input->post("reflujo_poplitea_izquierdo");
  $medida_tp_izquierdo = $this->input->post("medida_tp_izquierdo");
  $reflujo_tp_izquierdo = $this->input->post("reflujo_tp_izquierdo");
  $medida_ta_izquierdo = $this->input->post("medida_ta_izquierdo");
  $reflujo_ta_izquierdo = $this->input->post("reflujo_ta_izquierdo");
  $medida_media_izquierdo = $this->input->post("medida_media_izquierdo");
  $reflujo_media_izquierdo = $this->input->post("reflujo_media_izquierdo");
  // Conclusiones y sugerencias
  $conclusiones = $this->input->post("conclusiones");
  $sugerencias = $this->input->post("sugerencias");

  // Organizar los datos en un array
  $datos = [
      "documento_paciente" => $documento_paciente,
      "codigo_doctor" => $codigo_doctor,
      "motivo" => $motivo,
      "descripcionProcedimientoDerecho" => $descripcionProcedimientoDerecho,
      "descripcionProcedimientoIzquierdo" => $descripcionProcedimientoIzquierdo,
      // Miembro inferior derecho
      "medida_fc_derecho" => $medida_fc_derecho,
      "reflujo_fc_derecho" => $reflujo_fc_derecho,
      "medida_fs_derecho" => $medida_fs_derecho,
      "reflujo_fs_derecho" => $reflujo_fs_derecho,
      "medida_poplitea_derecho" => $medida_poplitea_derecho,
      "reflujo_poplitea_derecho" => $reflujo_poplitea_derecho,
      "medida_tp_derecho" => $medida_tp_derecho,
      "reflujo_tp_derecho" => $reflujo_tp_derecho,
      "medida_ta_derecho" => $medida_ta_derecho,
      "reflujo_ta_derecho" => $reflujo_ta_derecho,
      "medida_media_derecho" => $medida_media_derecho,
      "reflujo_media_derecho" => $reflujo_media_derecho,
      // Miembro inferior izquierdo
      "medida_fc_izquierdo" => $medida_fc_izquierdo,
      "reflujo_fc_izquierdo" => $reflujo_fc_izquierdo,
      "medida_fs_izquierdo" => $medida_fs_izquierdo,
      "reflujo_fs_izquierdo" => $reflujo_fs_izquierdo,
      "medida_poplitea_izquierdo" => $medida_poplitea_izquierdo,
      "reflujo_poplitea_izquierdo" => $reflujo_poplitea_izquierdo,
      "medida_tp_izquierdo" => $medida_tp_izquierdo,
      "reflujo_tp_izquierdo" => $reflujo_tp_izquierdo,
      "medida_ta_izquierdo" => $medida_ta_izquierdo,
      "reflujo_ta_izquierdo" => $reflujo_ta_izquierdo,
      "medida_media_izquierdo" => $medida_media_izquierdo,
      "reflujo_media_izquierdo" => $reflujo_media_izquierdo,
      // Conclusiones y sugerencias
      "conclusiones" => $conclusiones,
      "sugerencias" => $sugerencias,
      "fecha" => date("Y-m-d"), // Fecha actual
      "hora" => date("H:i:s"), // Hora actual
      "usuario" => $this->session->userdata("nombre") // Usuario de la sesión
  ];

  // Llamar al modelo para guardar los datos
  $this->Ecografias_model->createEcografiaVenosa($datos);

  // Devolver una respuesta JSON
  echo json_encode(["status" => "success", "message" => "Ecografía Venosa registrada correctamente"]);
}




}