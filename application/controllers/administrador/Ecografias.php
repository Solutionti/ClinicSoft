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
    // 1. Recibir datos del formulario (AJAX)
    
    // --- Datos Generales ---
    $documento_paciente = $this->input->post("documento_paciente");
    $codigo_doctor      = $this->input->post("codigo_doctor");
    
    // --- Datos Precoz (< 13 sem) ---
    $saco_gestacional   = $this->input->post("saco_gestacional");
    $saco_vitelino      = $this->input->post("saco_vitelino"); // Columna Nueva
    $lcc                = $this->input->post("lcc");             // Columna Nueva
    $embrion_visualizado = $this->input->post("embrion_visualizado"); // Columna Nueva

    // --- Vitalidad y Estática ---
    $situacion      = $this->input->post("situacion");
    $presentacion   = $this->input->post("presentacion"); // Columna Nueva
    $dorso          = $this->input->post("dorso");        // Columna Nueva
    $lcf            = $this->input->post("lcf");
    // Mapeamos 'movimientos' a tu antigua columna 'estadoFeto' para reciclarla
    $estadoFeto     = $this->input->post("movimientos"); 
    $sexo           = $this->input->post("sexo");         // Columna Nueva
    $fpp_eco        = $this->input->post("fpp_eco");      // Columna Nueva

    // --- Biometría ---
    $dpb              = $this->input->post("dpb");
    $cc               = $this->input->post("cc");
    $ca               = $this->input->post("ca");
    $lf               = $this->input->post("lf");
    $ponderado        = $this->input->post("ponderado");        // Columna Nueva (Peso)
    $edad_gestacional = $this->input->post("edad_gestacional"); // Columna Nueva
    $percentil        = $this->input->post("percentil");

    // --- Placenta ---
    // Mapeamos 'placenta_ub' a tu antigua columna 'placenta'
    $placenta         = $this->input->post("placenta_ub"); 
    $placenta_grado   = $this->input->post("placenta_grado");   // Columna Nueva
    $ila              = $this->input->post("ila");

    // --- Final ---
    $conclusion = $this->input->post("conclusion");
    $sugerencia = $this->input->post("sugerencia");
    // 'tipoParto' ya no se usa (se incluye en sugerencia), puedes dejarlo vacío o borrar la columna

    // 2. Agrupar en Array
    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor"      => $codigo_doctor,
        "fecha"              => date("Y-m-d"), // Agregamos la fecha actual automáticamente
        
        // Campos nuevos
        "saco_gestacional"   => $saco_gestacional,
        "saco_vitelino"      => $saco_vitelino,
        "lcc"                => $lcc,
        "embrion_visualizado"=> $embrion_visualizado,
        
        // Campos estándar
        "situacion"          => $situacion,
        "presentacion"       => $presentacion,
        "dorso"              => $dorso,
        "lcf"                => $lcf,
        "estadoFeto"         => $estadoFeto, // Guarda lo que venga de 'movimientos'
        "sexo"               => $sexo,
        "fpp_eco"            => $fpp_eco,

        "dpb"                => $dpb,
        "cc"                 => $cc,
        "ca"                 => $ca,
        "lf"                 => $lf,
        "ponderado"          => $ponderado,
        "edad_gestacional"   => $edad_gestacional,
        "percentil"          => $percentil,

        "placenta"           => $placenta, // Guarda la Ubicación
        "placenta_grado"     => $placenta_grado,
        "ila"                => $ila,

        "conclusion"         => $conclusion,
        "sugerencia"         => $sugerencia
    ];

    // 3. Insertar en BD
    $insert = $this->Ecografias_model->createEcografiaObstetrica($datos);

    // 4. Respuesta
    if($insert) {
        echo json_encode(["status" => "success", "message" => "Ecografía Obstétrica registrada correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al guardar en base de datos"]);
    }
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
    $endometrio_grosor = $this->input->post("endometrio_grosor");
    $ut_l = $this->input->post("ut_l");
    $ut_ap = $this->input->post("ut_ap");
    $ut_t = $this->input->post("ut_t");
    $ut_vol = $this->input->post("ut_vol");
    $comentarioUtero = $this->input->post("comentarioUtero");
    $od_l = $this->input->post("od_l");
    $od_ap = $this->input->post("od_ap");
    $od_t = $this->input->post("od_t");
    $od_vol = $this->input->post("od_vol");
    $comentarioOvarioDer = $this->input->post("comentarioOvarioDer");
    $oi_l = $this->input->post("oi_l");
    $oi_ap = $this->input->post("oi_ap");
    $oi_t = $this->input->post("oi_t");
    $oi_vol = $this->input->post("oi_vol");
    $comentarioOvarioIzq = $this->input->post("comentarioOvarioIzq");
    $fondosaco = $this->input->post("fondosaco");
    $tiene_tumor = $this->input->post("tiene_tumor");
    $tumorAnexialCom = $this->input->post("tumorAnexialCom");
    $conclusion = $this->input->post("conclusion");
    $sugerencias = $this->input->post("sugerencias");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "uteroTipo" => $uteroTipo,
        "superficie" => $superficie,
        "miometrio" => $miometrio,
        "endometrio_grosor" => $endometrio_grosor,
        "ut_l" => $ut_l,
        "ut_ap" => $ut_ap,
        "ut_t" => $ut_t,
        "ut_vol" => $ut_vol,
        "comentarioUtero" => $comentarioUtero,
        "od_l" => $od_l,
        "od_ap" => $od_ap,
        "od_t" => $od_t,
        "od_vol" => $od_vol,
        "comentarioOvarioDer" => $comentarioOvarioDer,
        "oi_l" => $oi_l,
        "oi_ap" => $oi_ap,
        "oi_t" => $oi_t,
        "oi_vol" => $oi_vol,
        "comentarioOvarioIzq" => $comentarioOvarioIzq,
        "fondosaco" => $fondosaco,
        "tiene_tumor" => $tiene_tumor,
        "tumorAnexialCom" => $tumorAnexialCom,
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
      $replecion = $this->input->post("replecion");
      $vejiga_desc = $this->input->post("vejiga_desc");
      $uteroTipo = $this->input->post("uteroTipo");
      $superficie = $this->input->post("superficie");
      $endometrio = $this->input->post("endometrio");
      $tumoraxial = $this->input->post("tumoraxial");
      $tumor_anexial_com = $this->input->post("tumor_anexial_com");
      $miometrio = $this->input->post("miometrio");
      $uteroMedidas = $this->input->post("uteroMedidas");
      $medidaUtero1 = $this->input->post("medidaUtero1");
      $medidaUtero2 = $this->input->post("medidaUtero2");
      $ut_vol = $this->input->post("ut_vol");
      $comentarioUtero = $this->input->post("comentarioUtero");
      $ovarioDer1 = $this->input->post("ovarioDer1");
      $ovarioDer2 = $this->input->post("ovarioDer2");
      $ov_der_t = $this->input->post("ov_der_t");          
      $od_vol = $this->input->post("od_vol");
      $comentarioOvarioDer = $this->input->post("comentarioOvarioDer");
      $ovarioIz1 = $this->input->post("ovarioIz1");
      $ovarioIz2 = $this->input->post("ovarioIz2");
      $ov_izq_t = $this->input->post("ov_izq_t");          
      $oi_vol = $this->input->post("oi_vol");
      $comentarioOvarioIzq = $this->input->post("comentarioOvarioIzq");
      $fondosaco = $this->input->post("fondosaco");
      $conclusion = $this->input->post("conclusion");
      $sugerencias = $this->input->post("sugerencias");
  
      $datos = [
          "documento_paciente" => $documento_paciente,
          "codigo_doctor" => $codigo_doctor,
          "replecion" => $replecion,
          "vejiga_desc" => $vejiga_desc,
          "utero_tipo" => $uteroTipo,
          "superficie" => $superficie,
          "endometrio" => $endometrio,
          "tumoraxial" => $tumoraxial,
          "tumor_anexial_com" => $tumor_anexial_com,
          "miometrio" => $miometrio,
          "utero_medidas" => $uteroMedidas,
          "medida_utero1" => $medidaUtero1,
          "medida_utero2" => $medidaUtero2,
          "ut_vol" => $ut_vol,
          "comentario_utero" => $comentarioUtero,
          "ovario_der1" => $ovarioDer1,
          "ovario_der2" => $ovarioDer2,
          "ov_der_t" => $ov_der_t,          
          "od_vol" => $od_vol,
          "comentario_ovario_der" => $comentarioOvarioDer,
          "ovario_iz1" => $ovarioIz1,
          "ovario_iz2" => $ovarioIz2,
          "ov_izq_t" => $ov_izq_t,          
          "oi_vol" => $oi_vol,
          "comentario_ovario_izq" => $comentarioOvarioIzq,
          "fondosaco" => $fondosaco,
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
    // Recibir datos
    $documento_paciente = $this->input->post("documento_paciente");
    $codigo_doctor = $this->input->post("codigo_doctor");
    $motivo = $this->input->post("motivo");

    // Hígado
    $higado_tamano = $this->input->post("higado_tamano");
    $higado_eco = $this->input->post("higado_eco");
    $coledoco_diametro = $this->input->post("coledoco_diametro");
    $vesicula_paredes = $this->input->post("vesicula_paredes");
    $vesicula_detalles = $this->input->post("vesicula_detalles");

    // Páncreas/Bazo
    $pancreas = $this->input->post("pancreas");
    $bazo_tamano = $this->input->post("bazo_tamano");
    $bazo_aspecto = $this->input->post("bazo_aspecto");

    // Riñones
    $rd_long = $this->input->post("rd_long");
    $rd_par = $this->input->post("rd_par");
    $rinon_derecho = $this->input->post("rinon_derecho"); // Aspecto
    
    $ri_long = $this->input->post("ri_long");
    $ri_par = $this->input->post("ri_par");
    $rinon_izquierdo = $this->input->post("rinon_izquierdo"); // Aspecto

    // Otros
    $estomago = $this->input->post("estomago");
    $otros_hallazgos = $this->input->post("otros_hallazgos");
    $conclusiones = $this->input->post("conclusiones");
    $sugerencias = $this->input->post("sugerencias");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "motivo" => $motivo,
        
        "higado_tamano" => $higado_tamano,
        "higado_eco" => $higado_eco,
        "coledoco_diametro" => $coledoco_diametro,
        "vesicula_paredes" => $vesicula_paredes,
        "vesicula_detalles" => $vesicula_detalles,
        
        "pancreas" => $pancreas,
        "bazo_tamano" => $bazo_tamano,
        "bazo_aspecto" => $bazo_aspecto,
        
        "rd_long" => $rd_long,
        "rd_par" => $rd_par,
        "rinon_derecho" => $rinon_derecho,
        
        "ri_long" => $ri_long,
        "ri_par" => $ri_par,
        "rinon_izquierdo" => $rinon_izquierdo,
        
        "estomago" => $estomago,
        "otros_hallazgos" => $otros_hallazgos,
        "conclusiones" => $conclusiones,
        "sugerencias" => $sugerencias
    ];

    $this->Ecografias_model->createEcografiaAbdominal($datos);
    echo json_encode(["status" => "success", "message" => "Registrado correctamente"]);
}

// ECOGRAFIA PROSTATICA
public function createEcografiaProstatica() {
    // 1. Recibir datos POST
    $data = array(
        "documento_paciente" => $this->input->post("documento_paciente"),
        "codigo_doctor"      => $this->input->post("codigo_doctor"),
        "motivo"             => $this->input->post("motivo"),
        "paredes"            => $this->input->post("paredes"),
        "contenido"          => $this->input->post("contenido"),
        "imagenes_expansivas"=> $this->input->post("imagenes_expansivas"),
        "calculos"           => $this->input->post("calculos"),
        "descripcion_vejiga" => $this->input->post("descripcion_vejiga"),
        "vol_pre"            => $this->input->post("vol_pre"),
        "vol_post"           => $this->input->post("vol_post"),
        "retencion"          => $this->input->post("retencion"),
        "transverso"         => $this->input->post("transverso"),
        "antero_posterior"   => $this->input->post("antero_posterior"),
        "longitudinal"       => $this->input->post("longitudinal"),
        "volumen"            => $this->input->post("volumen"),
        "bordes"             => $this->input->post("bordes"),
        "observacion"        => $this->input->post("observacion"),
        "conclusiones"       => $this->input->post("conclusiones")
    );
  
    if($this->Ecografias_model->createEcografiaProstatica($data)) {
        echo json_encode(["status" => "success", "message" => "Registrado"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error BD"]);
    }
}

// ECOGRAFIA RENAL

public function createEcografiaRenal() {
    // Recibir datos uno por uno
    $documento_paciente = $this->input->post("documento_paciente");
    $codigo_doctor = $this->input->post("codigo_doctor");
    $motivo = $this->input->post("motivo");

    // RD
    $rd_morfologia = $this->input->post("rd_morfologia");
    $rd_ecogenicidad = $this->input->post("rd_ecogenicidad");
    $rd_longitud = $this->input->post("rd_longitud");
    $rd_parenquima = $this->input->post("rd_parenquima");
    $rd_solidas = $this->input->post("rd_solidas");
    $rd_quisticas = $this->input->post("rd_quisticas");
    $rd_hidronefrosis = $this->input->post("rd_hidronefrosis");
    $rd_hidro_medida = $this->input->post("rd_hidro_medida");
    $rd_microlitiasis = $this->input->post("rd_microlitiasis");
    $rd_micro_medida = $this->input->post("rd_micro_medida");
    $rd_calculos = $this->input->post("rd_calculos");
    $rd_calculos_medida = $this->input->post("rd_calculos_medida");

    // RI
    $ri_morfologia = $this->input->post("ri_morfologia");
    $ri_ecogenicidad = $this->input->post("ri_ecogenicidad");
    $ri_longitud = $this->input->post("ri_longitud");
    $ri_parenquima = $this->input->post("ri_parenquima");
    $ri_solidas = $this->input->post("ri_solidas");
    $ri_quisticas = $this->input->post("ri_quisticas");
    $ri_hidronefrosis = $this->input->post("ri_hidronefrosis");
    $ri_hidro_medida = $this->input->post("ri_hidro_medida");
    $ri_microlitiasis = $this->input->post("ri_microlitiasis");
    $ri_micro_medida = $this->input->post("ri_micro_medida");
    $ri_calculos = $this->input->post("ri_calculos");
    $ri_calculos_medida = $this->input->post("ri_calculos_medida");

    // Vejiga
    $vejiga_replecion = $this->input->post("vejiga_replecion");
    $vejiga_paredes = $this->input->post("vejiga_paredes");
    $vejiga_contenido = $this->input->post("vejiga_contenido");
    $vejiga_imagenes = $this->input->post("vejiga_imagenes");
    $vejiga_calculos = $this->input->post("vejiga_calculos");
    $descripcion_vejiga = $this->input->post("descripcion_vejiga");

    // Volúmenes
    $vol_pre = $this->input->post("vol_pre");
    $vol_post = $this->input->post("vol_post");
    $retencion = $this->input->post("retencion");

    // Final
    $observaciones = $this->input->post("observaciones");
    $conclusiones = $this->input->post("conclusiones");

    $datos = [
        "documento_paciente" => $documento_paciente,
        "codigo_doctor" => $codigo_doctor,
        "motivo" => $motivo,
        
        // RD
        "rd_morfologia" => $rd_morfologia,
        "rd_ecogenicidad" => $rd_ecogenicidad,
        "rd_longitud" => $rd_longitud,
        "rd_parenquima" => $rd_parenquima,
        "rd_solidas" => $rd_solidas,
        "rd_quisticas" => $rd_quisticas,
        "rd_hidronefrosis" => $rd_hidronefrosis,
        "rd_hidro_medida" => $rd_hidro_medida,
        "rd_microlitiasis" => $rd_microlitiasis,
        "rd_micro_medida" => $rd_micro_medida,
        "rd_calculos" => $rd_calculos,
        "rd_calculos_medida" => $rd_calculos_medida,

        // RI
        "ri_morfologia" => $ri_morfologia,
        "ri_ecogenicidad" => $ri_ecogenicidad,
        "ri_longitud" => $ri_longitud,
        "ri_parenquima" => $ri_parenquima,
        "ri_solidas" => $ri_solidas,
        "ri_quisticas" => $ri_quisticas,
        "ri_hidronefrosis" => $ri_hidronefrosis,
        "ri_hidro_medida" => $ri_hidro_medida,
        "ri_microlitiasis" => $ri_microlitiasis,
        "ri_micro_medida" => $ri_micro_medida,
        "ri_calculos" => $ri_calculos,
        "ri_calculos_medida" => $ri_calculos_medida,

        // Vejiga
        "vejiga_replecion" => $vejiga_replecion,
        "vejiga_paredes" => $vejiga_paredes,
        "vejiga_contenido" => $vejiga_contenido,
        "vejiga_imagenes" => $vejiga_imagenes,
        "vejiga_calculos" => $vejiga_calculos,
        "descripcion_vejiga" => $descripcion_vejiga,

        // Vol
        "vol_pre" => $vol_pre,
        "vol_post" => $vol_post,
        "retencion" => $retencion,

        // Final
        "observaciones" => $observaciones,
        "conclusiones" => $conclusiones
    ];

    if($this->Ecografias_model->createEcografiaRenal($datos)) {
        echo json_encode(["status" => "success", "message" => "Registrado correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al guardar"]);
    }
}


// ECOGRAFIA DE TIROIDES
public function createEcografiaTiroides() {
    // --- 1. Recibir Datos Generales ---
    $documento_paciente = $this->input->post("documento_paciente");
    $codigo_doctor      = $this->input->post("codigo_doctor");
    $motivo             = $this->input->post("motivo");
    $descripcion_tiroides = $this->input->post("descripcion_tiroides");

    // --- 2. Lóbulo Derecho ---
    $ld_long    = $this->input->post("ld_long");
    $ld_ap      = $this->input->post("ld_ap");
    $ld_trans   = $this->input->post("ld_trans");
    $ld_volumen = $this->input->post("ld_volumen");

    // --- 3. Lóbulo Izquierdo ---
    $li_long    = $this->input->post("li_long");
    $li_ap      = $this->input->post("li_ap");
    $li_trans   = $this->input->post("li_trans");
    $li_volumen = $this->input->post("li_volumen");

    // --- 4. Volumen Total ---
    $volumen_total = $this->input->post("volumen_total");

    // --- 5. Estructuras y Hallazgos ---
    $istmo                  = $this->input->post("istmo");
    $estructuras_vasculares = $this->input->post("estructuras_vasculares");
    $glandulas_submaxilares = $this->input->post("glandulas_submaxilares");
    $adenopatia_cervicales  = $this->input->post("adenopatia_cervicales");
    $piel                   = $this->input->post("piel");
    $tcsc                   = $this->input->post("tcsc");

    // --- 6. Cierre ---
    $conclusiones = $this->input->post("conclusiones");
    $sugerencias  = $this->input->post("sugerencias");

    // Empaquetar datos para el Modelo
    $data = array(
        "documento_paciente" => $documento_paciente,
        "codigo_doctor"      => $codigo_doctor,
        "motivo"             => $motivo,
        "descripcion_tiroides" => $descripcion_tiroides,

        // Derecho
        "ld_long"    => $ld_long,
        "ld_ap"      => $ld_ap,
        "ld_trans"   => $ld_trans,
        "ld_volumen" => $ld_volumen,

        // Izquierdo
        "li_long"    => $li_long,
        "li_ap"      => $li_ap,
        "li_trans"   => $li_trans,
        "li_volumen" => $li_volumen,

        // Total
        "volumen_total" => $volumen_total,

        // Estructuras
        "istmo"                  => $istmo,
        "estructuras_vasculares" => $estructuras_vasculares,
        "glandulas_submaxilares" => $glandulas_submaxilares,
        "adenopatia_cervicales"  => $adenopatia_cervicales,
        "piel"                   => $piel,
        "tcsc"                   => $tcsc,

        // Final
        "conclusiones" => $conclusiones,
        "sugerencias"  => $sugerencias
    );

    // Enviar al Modelo
    if($this->Ecografias_model->createEcografiaTiroides($data)) {
        echo json_encode(["status" => "success", "message" => "Registrado correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al guardar en BD"]);
    }
}

// ECOGRAFIA HISTEROSONOGRAFIA

public function createEcografiaHisterosonografia() {
    // 1. Recibir los datos del formulario (vía AJAX)
    // El nombre dentro de input->post("...") debe coincidir con el data: {} del AJAX
    $data = array(
        "documento_paciente"        => $this->input->post("documento_paciente"),
        "codigo_doctor"             => $this->input->post("codigo_doctor"),
        "motivo"                    => $this->input->post("motivo"),
        
        // Este es el campo clave de este reporte (Texto largo)
        "descripcion_procedimiento" => $this->input->post("descripcion_procedimiento"),
        
        "conclusiones"              => $this->input->post("conclusiones"),
        "sugerencias"               => $this->input->post("sugerencias")
    );

    // 2. Enviar al Modelo para insertar en la BD
    if($this->Ecografias_model->createEcografiaHisterosonografia($data)) {
        // Respuesta Éxitosa para el AJAX
        echo json_encode([
            "status" => "success", 
            "message" => "Histerosonografía registrada correctamente"
        ]);
    } else {
        // Respuesta de Error
        echo json_encode([
            "status" => "error", 
            "message" => "Error al guardar en la base de datos"
        ]);
    }
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