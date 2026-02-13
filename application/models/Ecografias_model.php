<?php

class Ecografias_model extends CI_model {

    //ECOGRAFIAS DE MAMA 
    public function createEcografiaMama($data) {
      $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "pezon_izq" => $data["pezon_izq"],
        "tcsc_izq" => $data["tcsc_izq"],
        "tejido_glandular_izq" => $data["tejido_glandular_izq"],
        "axila_izq" => $data["axila_izq"],
        "comentario_mama_izq" => $data["comentario_mama_izq"],
        "pezon_der" => $data["pezon_der"],
        "tcsc_der" => $data["tcsc_der"],
        "tejido_glandular_der" => $data["tejido_glandular_der"],
        "axila_der" => $data["axila_der"],
        "comentario_der" => $data["comentario_der"],
        "conclusion_mama" => $data["conclusion_mama"],
        "sugerencias_mama" => $data["sugerencias_mama"],
        "birads_final" => $data["birads_final"],
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
      ];
      $this->db->insert("ecografia_mama", $datos);
    }


    // ECOGRAFIA GENETICA

    public function createEcografiaGenetica($data) {
      $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
        "fetoembrion" => $data["fetoembrion"],
        "situacion" => $data["situacion"],
        "liquidoAmniotico" => $data["liquidoAmniotico"],
        "placenta" => $data["placenta"],
        "lcc" => $data["lcc"],
        "lcf" => $data["lcf"],
        "artUteder" => $data["artUteder"],
        "artUteizq" => $data["artUteizq"],
        "ippromedio" => $data["ippromedio"],
        "huesoNasal" => $data["huesoNasal"],
        "translucenciaNucal" => $data["translucenciaNucal"],
        "ductudVenosa" => $data["ductudVenosa"],
        "flujoTricuspideo" => $data["flujoTricuspideo"],
        "conclusion_mama" => $data["conclusion_mama"],
        "sugerencias_mama" => $data["sugerencias_mama"],
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
    ];

    $this->db->insert("ecografia_genetica", $datos);
  }

    
    // ECOGRAFIA OBSTETRICA
    public function createEcografiaObstetrica($data) {
    // Mapeamos los datos recibidos del Controlador a las columnas de la BD
    $datos = [
        // --- 1. Identificación ---
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor"      => $data["codigo_doctor"],

        // --- 2. Datos Precoz (< 13 Sem) ---
        "saco_gestacional"   => $data["saco_gestacional"],
        "saco_vitelino"      => $data["saco_vitelino"],
        "lcc"                => $data["lcc"],
        "embrion_visualizado"=> $data["embrion_visualizado"],

        // --- 3. Vitalidad y Estática ---
        "fetoembrion"        => $data["fetoembrion"], // Único/Múltiple
        "situacion"          => $data["situacion"],
        "presentacion"       => $data["presentacion"], // Cefálico/Podálico
        "dorso"              => $data["dorso"],        // Derecho/Izquierdo
        "lcf"                => $data["lcf"],
        "estadoFeto"         => $data["estadoFeto"],   // Movimientos
        "sexo"               => $data["sexo"],
        "fpp_eco"            => $data["fpp_eco"],

        // --- 4. Biometría y Peso ---
        "dpb"                => $data["dpb"],
        "cc"                 => $data["cc"],
        "ca"                 => $data["ca"],
        "lf"                 => $data["lf"],
        "ponderado"          => $data["ponderado"],      // Peso en gramos
        "edad_gestacional"   => $data["edad_gestacional"],
        "percentil"          => $data["percentil"],

        // --- 5. Placenta ---
        "placenta"           => $data["placenta"],       // Ubicación
        "placenta_grado"     => $data["placenta_grado"], // Grado 0-III
        "ila"                => $data["ila"],

        // --- 6. Conclusiones ---
        "conclusion"         => $data["conclusion"],
        "sugerencia"         => $data["sugerencia"],

        // --- 7. Auditoría (Automático) ---
        "fecha"              => date("Y-m-d"),
        "hora"               => date("h:i A"),
        "usuario"            => $this->session->userdata("nombre"),
    ];
    
    // Insertamos en la tabla
    // Asegúrate de que tu tabla 'ecografia_obstetrica' tenga todas estas columnas nuevas
    return $this->db->insert("ecografia_obstetrica", $datos);
}
    
  
  // ECOGRAFIA MORFOLOGICA
  public function createEcografiaMorfologica($data) {
    $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "sexo" => $data["sexo"],
        "situacion" => $data["situacion"],
        "formacabeza" => $data["formacabeza"],
        "cerebelo" => $data["cerebelo"],
        "cisternaMagna" => $data["cisternaMagna"],
        "atrioVentricular" => $data["atrioVentricular"],
        "pliegueNucal" => $data["pliegueNucal"],
        "perfilCara" => $data["perfilCara"],
        "cuello" => $data["cuello"],
        "perfiltorax" => $data["perfiltorax"],
        "corazon" => $data["corazon"],
        "columnaVertebral" => $data["columnaVertebral"],
        "extremidades" => $data["extremidades"],
        "abdomen" => $data["abdomen"],
        "dbp" => $data["dbp"],
        "cc" => $data["cc"],
        "ca" => $data["ca"],
        "lf" => $data["lf"],
        "placenta_liquido" => $data["placenta_liquido"],
        "ipder" => $data["ipder"],
        "ipizq" => $data["ipizq"],
        "ip_promedio" => $data["ip_promedio"],
        "cervicometria" => $data["cervicometria"],
        "ponderadoFetal" => $data["ponderadoFetal"],
        "lcf" => $data["lcf"],
        "conclusiones" => $data["conclusiones"],
        "fecha" => date("Y-m-d"),
        "hora" => date("H:i:s"),
        "usuario" => $this->session->userdata("nombre"),
    ];
    $this->db->insert("ecografia_morfologica", $datos);
}

// ECOGRAFIA TRASVAGINAL
public function createEcografiaTrasvaginal($data) {
  $datos = [
      "documento_paciente" => $data["documento_paciente"],
      "codigo_doctor" => $data["codigo_doctor"],
      "uteroTipo" => $data["uteroTipo"],
      "superficie" => $data["superficie"],
      "miometrio" => $data["miometrio"],
      "endometrio_grosor" => $data["endometrio_grosor"],
      "ut_l" => $data["ut_l"],
      "ut_ap" => $data["ut_ap"],
      "ut_t" => $data["ut_t"],
      "ut_vol" => $data["ut_vol"],
      "comentarioUtero" => $data["comentarioUtero"],
      "od_l" => $data["od_l"],
      "od_ap" => $data["od_ap"],
      "od_t" => $data["od_t"],
      "od_vol" => $data["od_vol"],
      "comentarioOvarioDer" => $data["comentarioOvarioDer"],
      "oi_l" => $data["oi_l"],
      "oi_ap" => $data["oi_ap"],
      "oi_t" => $data["oi_t"],
      "oi_vol" => $data["oi_vol"],
      "comentarioOvarioIzq" => $data["comentarioOvarioIzq"],
      "fondosaco" => $data["fondosaco"],
      "tiene_tumor" => $data["tiene_tumor"],
      "tumorAnexialCom" => $data["tumorAnexialCom"],
      "conclusion" => $data["conclusion"],
      "sugerencias" => $data["sugerencias"],
      "fecha" => date("Y-m-d"),
      "hora" => date("H:i:s"),
      "usuario" => $this->session->userdata("nombre"),
  ];
  $this->db->insert("ecografia_trasvaginal", $datos);
}

// ECOGRAFIA PELVICA
public function createEcografiaPelvica($data) {
  $datos = [
      "documento_paciente" => $data["documento_paciente"],
      "codigo_doctor" => $data["codigo_doctor"],
      "replecion" => $data["replecion"],
      "vejiga_desc" => $data["vejiga_desc"],
      "utero_tipo" => $data["utero_tipo"],
      "superficie" => $data["superficie"],
      "endometrio" => $data["endometrio"],
      "tumoraxial" => $data["tumoraxial"],
      "tumor_anexial_com" => $data["tumor_anexial_com"],
      "miometrio" => $data["miometrio"],
      "utero_medidas" => $data["utero_medidas"],
      "medida_utero1" => $data["medida_utero1"],
      "medida_utero2" => $data["medida_utero2"],
      "ut_vol" => $data["ut_vol"],
      "comentario_utero" => $data["comentario_utero"],
      "ovario_der1" => $data["ovario_der1"],
      "ovario_der2" => $data["ovario_der2"],
      "ov_der_t" => $data["ov_der_t"],          
      "od_vol" => $data["od_vol"],
      "comentario_ovario_der" => $data["comentario_ovario_der"],
      "ovario_iz1" => $data["ovario_iz1"],
      "ovario_iz2" => $data["ovario_iz2"],
      "ov_izq_t" => $data["ov_izq_t"],          
      "oi_vol" => $data["oi_vol"],
      "comentario_ovario_izq" => $data["comentario_ovario_izq"],
      "fondosaco" => $data["fondosaco"],
      "conclusion" => $data["conclusion"],
      "sugerencias" => $data["sugerencias"],
      "fecha" => date("Y-m-d"),
      "hora" => date("H:i:s"),
      "usuario" => $this->session->userdata("nombre"),
  ];
  $this->db->insert("ecografia_pelvica", $datos);
}

//ECOGRAFIA ABDOMINAL
public function createEcografiaAbdominal($data) {
    $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "motivo" => $data["motivo"],
        
        // Hígado y Vías
        "higado_tamano" => $data["higado_tamano"],
        "higado_eco" => $data["higado_eco"],
        "coledoco_diametro" => $data["coledoco_diametro"],
        "vesicula_paredes" => $data["vesicula_paredes"],
        "vesicula_detalles" => $data["vesicula_detalles"],
        
        // Órganos Medios
        "pancreas" => $data["pancreas"],
        "bazo_tamano" => $data["bazo_tamano"],
        "bazo_aspecto" => $data["bazo_aspecto"],
        
        // Riñones
        "rd_long" => $data["rd_long"],
        "rd_par" => $data["rd_par"],
        "rinon_derecho" => $data["rinon_derecho"],
        
        "ri_long" => $data["ri_long"],
        "ri_par" => $data["ri_par"],
        "rinon_izquierdo" => $data["rinon_izquierdo"],
        
        // Finales
        "estomago" => $data["estomago"],
        "otros_hallazgos" => $data["otros_hallazgos"],
        "conclusiones" => $data["conclusiones"], // En BD suele ser 'conclusion' singular, verifica tu columna
        "sugerencias" => $data["sugerencias"],
        
        // Auditoría
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
    ];
    
    return $this->db->insert("ecografia_abdominal", $datos);
}

// ECOGRAFIA PROSTATICA
public function createEcografiaProstatica($data) {
    // Organizar los datos para insertar en la BD
    $datos = [
        // --- 1. Datos Generales ---
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor"      => $data["codigo_doctor"],
        "motivo"             => $data["motivo"],
        
        // --- 2. Vejiga ---
        "paredes"            => $data["paredes"],
        "contenido"          => $data["contenido"],
        "imagenes_expansivas"=> $data["imagenes_expansivas"],
        "calculos"           => $data["calculos"],
        "descripcion_vejiga" => $data["descripcion_vejiga"],
        
        // --- 3. Volúmenes y Residuo ---
        "vol_pre"            => $data["vol_pre"],
        "vol_post"           => $data["vol_post"],
        "retencion"          => $data["retencion"], // % calculado
        
        // --- 4. Próstata (Medidas y Peso) ---
        "transverso"         => $data["transverso"],
        "antero_posterior"   => $data["antero_posterior"],
        "longitudinal"       => $data["longitudinal"],
        "volumen"            => $data["volumen"], // Peso + Grado
        
        // --- 5. Características Próstata ---
        "bordes"             => $data["bordes"],
        "observacion"        => $data["observacion"], // Ecoestructura
        
        // --- 6. Conclusiones ---
        "conclusiones"       => $data["conclusiones"],
        
        // --- 7. Auditoría Automática ---
        "fecha"              => date("Y-m-d"),
        "hora"               => date("h:i A"),
        "usuario"            => $this->session->userdata("nombre"), // Ajusta si tu sesión usa otro nombre
    ];

    // Insertar en la tabla
    return $this->db->insert("ecografia_prostatica", $datos);
}

public function createEcografiaRenal($datos) {
    // 1. Agregar Auditoría (Datos que no vienen del formulario)
    // Se agregan al array $datos que recibimos del Controlador
    $datos["fecha"]   = date("Y-m-d");      // Fecha actual
    $datos["hora"]    = date("H:i:s");      // Hora actual (Formato MySQL)
    $datos["usuario"] = $this->session->userdata("nombre"); // Usuario logueado
    
    // 2. Insertar en la Base de Datos
    // CodeIgniter se encarga de escapar los datos automáticamente para seguridad
    if ($this->db->insert("ecografia_renal", $datos)) {
        return true;
    } else {
        return false;
    }
}


// ECOGRAFIA TIROIDES
public function createEcografiaTiroides($data) {
    // Agregar Auditoría Automática
    $data["fecha"]   = date("Y-m-d");
    $data["hora"]    = date("H:i:s");
    $data["usuario"] = $this->session->userdata("nombre"); // Asegúrate que 'nombre' es tu variable de sesión

    // Insertar en la tabla
    return $this->db->insert("ecografia_tiroides", $data);
}


// ECOGRAFIA HISTEROSONOGRAFIA
public function createEcografiaHisterosonografia($data) {
    // Agregamos datos de auditoría automática
    $data["fecha"]   = date("Y-m-d");
    $data["hora"]    = date("H:i:s");
    $data["usuario"] = $this->session->userdata("nombre"); // Usuario logueado
    
    // Insertamos en la tabla que creamos (ecografia_histerosonografia)
    if ($this->db->insert("ecografia_histerosonografia", $data)) {
        return true;
    } else {
        return false;
    }
}

// ECOGRAFIA ARTERIAL
// 1. GUARDAR (INSERT)
public function createEcografiaArterial($data) {
    // Agregamos datos de auditoría automática
    $data["fecha"]   = date("Y-m-d");
    $data["hora"]    = date("H:i:s");
    $data["usuario"] = $this->session->userdata("nombre"); // Usuario que registra
    
    // Insertamos en la tabla
    if ($this->db->insert("ecografia_arterial", $data)) {
        return true;
    } else {
        return false;
    }
}

// ECOGRAFIA VENOSA
public function createEcografiaVenosa($data) {
    $data["fecha"] = date("Y-m-d");
    $data["hora"] = date("H:i:s");
    $data["usuario"] = $this->session->userdata("nombre");
    return $this->db->insert("ecografia_venosa", $data);
}

public function createEcografiaObstetricaDoppler($data) {
    // Agregamos datos de auditoría automática
    $data["fecha"]   = date("Y-m-d");
    $data["hora"]    = date("H:i:s");
    $data["usuario"] = $this->session->userdata("nombre"); // Usuario logueado
    
    // Insertamos en la tabla
    if ($this->db->insert("ecografia_obstetrica_doppler", $data)) {
        return true;
    } else {
        return false;
    }
}

// CONSULTAS PARA TRAER LA INFO DEL PACIENTE Y LA ECOGRAFIA
  public function getDatosPaciente($documento) {
    $this->db->select("*");
    $this->db->from("pacientes");
    $this->db->where("documento", $documento);
    $result = $this->db->get();

    return  $result;
  }
  public function getEcografiaMamaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_mama");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaGeneticaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_genetica");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaMorfologicaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_morfologica");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('id_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaTrasvaginalPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_trasvaginal");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }


  public function getEcografiaPelvicaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_pelvica");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaObstetricaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_obstetrica");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaAbdominalPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_abdominal");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  
  public function getEcografiaProstaticaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_prostatica");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaRenalPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_renal");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaTiroidesPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_tiroides");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaHisterosonografiaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_histerosonografia");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaArterialPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_arterial");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaVenosaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_venosa");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('codigo_ecografia', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  // 2. LEER DATOS PARA EL PDF (SELECT)
  public function getEcografiaDopplerPdf($dni) {
    $this->db->select("*");
    $this->db->from("ecografia_obstetrica_doppler");
    $this->db->where("documento_paciente", $dni);
    
    // IMPORTANTE: Ordenamos por 'codigo_ecografia' descendente para obtener la última
    $this->db->order_by("codigo_ecografia", "DESC");
    $this->db->limit(1);
    
    return $this->db->get();
}
    
}