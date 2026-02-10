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


// ECOGRAFIA RENAL
public function createEcografiaRenal($data) {
  $datos = [
      "documento_paciente" => $data["documento_paciente"],
      "codigo_doctor" => $data["codigo_doctor"],
      "motivo" => $data["motivo"],
      // Riñón derecho
      "morfologia_movilidad_derecho" => $data["morfologia_movilidad_derecho"],
      "ecogenicidad_derecho" => $data["ecogenicidad_derecho"],
      "medidas_longitud_derecho" => $data["medidas_longitud_derecho"],
      "medidas_parenquima_derecho" => $data["medidas_parenquima_derecho"],
      "imagenes_expansivas_solidas_derecho" => $data["imagenes_expansivas_solidas_derecho"],
      "imagenes_expansivas_quisticas_derecho" => $data["imagenes_expansivas_quisticas_derecho"],
      "hidronefrosis_derecho" => $data["hidronefrosis_derecho"],
      "medidas_hidronefrosis_derecho" => $data["medidas_hidronefrosis_derecho"],
      "micro_litiasis_derecho" => $data["micro_litiasis_derecho"],
      "medidas_micro_litiasis_derecho" => $data["medidas_micro_litiasis_derecho"],
      "calculos_derecho" => $data["calculos_derecho"],
      "medidas_calculos_derecho" => $data["medidas_calculos_derecho"],
      "descripcion_otros_derecho" => $data["descripcion_otros_derecho"],
      // Riñón izquierdo
      "morfologia_movilidad_izquierdo" => $data["morfologia_movilidad_izquierdo"],
      "ecogenicidad_izquierdo" => $data["ecogenicidad_izquierdo"],
      "medidas_longitud_izquierdo" => $data["medidas_longitud_izquierdo"],
      "medidas_parenquima_izquierdo" => $data["medidas_parenquima_izquierdo"],
      "imagenes_expansivas_solidas_izquierdo" => $data["imagenes_expansivas_solidas_izquierdo"],
      "imagenes_expansivas_quisticas_izquierdo" => $data["imagenes_expansivas_quisticas_izquierdo"],
      "hidronefrosis_izquierdo" => $data["hidronefrosis_izquierdo"],
      "medidas_hidronefrosis_izquierdo" => $data["medidas_hidronefrosis_izquierdo"],
      "micro_litiasis_izquierdo" => $data["micro_litiasis_izquierdo"],
      "medidas_micro_litiasis_izquierdo" => $data["medidas_micro_litiasis_izquierdo"],
      "calculos_izquierdo" => $data["calculos_izquierdo"],
      "medidas_calculos_izquierdo" => $data["medidas_calculos_izquierdo"],
      "descripcion_otros_izquierdo" => $data["descripcion_otros_izquierdo"],
      // Vejiga
      "repelcion_vejiga" => $data["repelcion_vejiga"],
      "paredes_vejiga" => $data["paredes_vejiga"],
      "contenido_aneocoico" => $data["contenido_aneocoico"],
      "imagenes_expansivas_vejiga" => $data["imagenes_expansivas_vejiga"],
      "calculos_vejiga" => $data["calculos_vejiga"],
      "vol_pre_miccional" => $data["vol_pre_miccional"],
      "vol_post_miccional" => $data["vol_post_miccional"],
      "retencion" => $data["retencion"],
      // Observaciones y conclusiones
      "otra" => $data["otra"],
      "observacion_textarea" => $data["observacion_textarea"],
      "conclusiones" => $data["conclusiones"],
      "fecha" => date("Y-m-d"),
      "hora" => date("H:i:s"),
      "usuario" => $this->session->userdata("nombre"),
  ];
  return $this->db->insert("ecografia_renal", $datos);
}

// ECOGRAFIA TIROIDES
public function createEcografiaTiroides($data) {
  $datos = [
      "documento_paciente" => $data["documento_paciente"],
      "codigo_doctor" => $data["codigo_doctor"],
      "motivo" => $data["motivo"],
      "descripcionTiroides" => $data["descripcionTiroides"],
      "lobuloDerecho" => $data["lobuloDerecho"],
      "lobuloIzquierdo" => $data["lobuloIzquierdo"],
      "istmo" => $data["istmo"],
      "estructurasVasculares" => $data["estructurasVasculares"],
      "glandulasSubmaxilares" => $data["glandulasSubmaxilares"],
      "adenopatiaCervicales" => $data["adenopatiaCervicales"],
      "piel" => $data["piel"],
      "tcsc" => $data["tcsc"],
      "conclusiones" => $data["conclusiones"],
      "sugerencias" => $data["sugerencias"],
      "fecha" => date("Y-m-d"), // Fecha actual
      "hora" => date("H:i:s"), // Hora actual
      "usuario" => $this->session->userdata("nombre") // Usuario de la sesión
  ];
  $this->db->insert("ecografia_tiroides", $datos); // Ajusta el nombre de la tabla
}


// ECOGRAFIA HISTEROSONOGRAFIA
public function createEcografiaHisterosonografia($data) {
  $datos = [
      "documento_paciente" => $data["documento_paciente"],
      "codigo_doctor" => $data["codigo_doctor"],
      "motivo" => $data["motivo"],
      "descripcionProcedimiento" => $data["descripcionProcedimiento"],
      "conclusiones" => $data["conclusiones"],
      "sugerencias" => $data["sugerencias"],
      "fecha" => date("Y-m-d"), // Fecha actual
      "hora" => date("H:i:s"), // Hora actual
      "usuario" => $this->session->userdata("nombre") // Usuario de la sesión
  ];
  $this->db->insert("ecografia_histerosonografia", $datos); // Ajusta el nombre de la tabla
}

// ECOGRAFIA ARTERIAL
public function createEcografiaArterial($data) {
  $datos = [
      "documento_paciente" => $data["documento_paciente"],
      "codigo_doctor" => $data["codigo_doctor"],
      "motivo" => $data["motivo"],
      "descripcionProcedimientoDerecho" => $data["descripcionProcedimientoDerecho"],
      "descripcionProcedimientoIzquierdo" => $data["descripcionProcedimientoIzquierdo"],
      // Miembro inferior derecho
      "vps_fc_derecho" => $data["vps_fc_derecho"],
      "onda_fc_derecho" => $data["onda_fc_derecho"],
      "vps_fs_derecho" => $data["vps_fs_derecho"],
      "onda_fs_derecho" => $data["onda_fs_derecho"],
      "vps_poplitea_derecho" => $data["vps_poplitea_derecho"],
      "onda_poplitea_derecho" => $data["onda_poplitea_derecho"],
      "vps_tp_derecho" => $data["vps_tp_derecho"],
      "onda_tp_derecho" => $data["onda_tp_derecho"],
      "vps_ta_derecho" => $data["vps_ta_derecho"],
      "onda_ta_derecho" => $data["onda_ta_derecho"],
      "vps_media_derecho" => $data["vps_media_derecho"],
      "onda_media_derecho" => $data["onda_media_derecho"],
      // Miembro inferior izquierdo
      "vps_fc_izquierdo" => $data["vps_fc_izquierdo"],
      "onda_fc_izquierdo" => $data["onda_fc_izquierdo"],
      "vps_fs_izquierdo" => $data["vps_fs_izquierdo"],
      "onda_fs_izquierdo" => $data["onda_fs_izquierdo"],
      "vps_poplitea_izquierdo" => $data["vps_poplitea_izquierdo"],
      "onda_poplitea_izquierdo" => $data["onda_poplitea_izquierdo"],
      "vps_tp_izquierdo" => $data["vps_tp_izquierdo"],
      "onda_tp_izquierdo" => $data["onda_tp_izquierdo"],
      "vps_ta_izquierdo" => $data["vps_ta_izquierdo"],
      "onda_ta_izquierdo" => $data["onda_ta_izquierdo"],
      "vps_media_izquierdo" => $data["vps_media_izquierdo"],
      "onda_media_izquierdo" => $data["onda_media_izquierdo"],
      // Conclusiones y sugerencias
      "conclusiones" => $data["conclusiones"],
      "sugerencias" => $data["sugerencias"],
      "fecha" => $data["fecha"],
      "hora" => $data["hora"],
      "usuario" => $data["usuario"]
  ];
  $this->db->insert("ecografia_arterial", $datos); // Ajusta el nombre de la tabla
}

// ECOGRAFIA VENOSA
public function createEcografiaVenosa($data) {
  $datos = [
      "documento_paciente" => $data["documento_paciente"],
      "codigo_doctor" => $data["codigo_doctor"],
      "motivo" => $data["motivo"],
      "descripcionProcedimientoDerecho" => $data["descripcionProcedimientoDerecho"],
      "descripcionProcedimientoIzquierdo" => $data["descripcionProcedimientoIzquierdo"],
      // Miembro inferior derecho
      "medida_fc_derecho" => $data["medida_fc_derecho"],
      "reflujo_fc_derecho" => $data["reflujo_fc_derecho"],
      "medida_fs_derecho" => $data["medida_fs_derecho"],
      "reflujo_fs_derecho" => $data["reflujo_fs_derecho"],
      "medida_poplitea_derecho" => $data["medida_poplitea_derecho"],
      "reflujo_poplitea_derecho" => $data["reflujo_poplitea_derecho"],
      "medida_tp_derecho" => $data["medida_tp_derecho"],
      "reflujo_tp_derecho" => $data["reflujo_tp_derecho"],
      "medida_ta_derecho" => $data["medida_ta_derecho"],
      "reflujo_ta_derecho" => $data["reflujo_ta_derecho"],
      "medida_media_derecho" => $data["medida_media_derecho"],
      "reflujo_media_derecho" => $data["reflujo_media_derecho"],
      // Miembro inferior izquierdo
      "medida_fc_izquierdo" => $data["medida_fc_izquierdo"],
      "reflujo_fc_izquierdo" => $data["reflujo_fc_izquierdo"],
      "medida_fs_izquierdo" => $data["medida_fs_izquierdo"],
      "reflujo_fs_izquierdo" => $data["reflujo_fs_izquierdo"],
      "medida_poplitea_izquierdo" => $data["medida_poplitea_izquierdo"],
      "reflujo_poplitea_izquierdo" => $data["reflujo_poplitea_izquierdo"],
      "medida_tp_izquierdo" => $data["medida_tp_izquierdo"],
      "reflujo_tp_izquierdo" => $data["reflujo_tp_izquierdo"],
      "medida_ta_izquierdo" => $data["medida_ta_izquierdo"],
      "reflujo_ta_izquierdo" => $data["reflujo_ta_izquierdo"],
      "medida_media_izquierdo" => $data["medida_media_izquierdo"],
      "reflujo_media_izquierdo" => $data["reflujo_media_izquierdo"],
      // Conclusiones y sugerencias
      "conclusiones" => $data["conclusiones"],
      "sugerencias" => $data["sugerencias"],
      "fecha" => $data["fecha"],
      "hora" => $data["hora"],
      "usuario" => $data["usuario"]
  ];
  $this->db->insert("ecografia_venosa", $datos); // Ajusta el nombre de la tabla
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
    $this->db->order_by('id', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaHisterosonografiaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_histerosonografia");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('id', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaArterialPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_arterial");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('id', 'DESC');
    $result = $this->db->get();

    return  $result;
  }

  public function getEcografiaVenosaPdf($documento) {
    $this->db->select("*");
    $this->db->from("ecografia_venosa");
    $this->db->where("documento_paciente", $documento);
    $this->db->order_by('id', 'DESC');
    $result = $this->db->get();

    return  $result;
  }
    
}