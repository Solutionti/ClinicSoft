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
        "lcr" => $data["lcr"],
        "lcf" => $data["lcf"],
        "artUteder" => $data["artUteder"],
        "artUteizq" => $data["artUteizq"],
        "ippromedio" => $data["ippromedio"],
        "huesoNasal" => $data["huesoNasal"],
        "translucenciaNucal" => $data["translucenciaNucal"],
        "ductudVenosa" => $data["ductudVenosa"],
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
      $datos = [
          "documento_paciente" => $data["documento_paciente"],
          "codigo_doctor" => $data["codigo_doctor"],
          "fetoembrion" => $data["fetoembrion"],
          "situacion" => $data["situacion"],
          "estadoFeto" => $data["estadoFeto"],
          "placenta" => $data["placenta"],
          "dpb" => $data["dpb"],
          "lcf" => $data["lcf"],
          "min" => $data["min"],
          "cc" => $data["cc"],
          "ca" => $data["ca"],
          "lf" => $data["lf"],
          "ila" => $data["ila"],
          "percentil" => $data["percentil"],
          "tipoParto" => $data["tipoParto"],
          "conclusion" => $data["conclusion"],
          "sugerencia" => $data["sugerencia"],
          "fecha" => date("Y-m-d"),
          "hora" => date("h:i A"),
          "usuario" => $this->session->userdata("nombre"),
      ];
      
      $this->db->insert("ecografia_obstetrica", $datos);
  }
  
  // ECOGRAFIA MORFOLOGICA
  public function createEcografiaMorfologica($data) {
    $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "sexo" => $data["sexo"],
        "formacabeza" => $data["formacabeza"],
        "cerebelo" => $data["cerebelo"],
        "cisternaMagna" => $data["cisternaMagna"],
        "atrioVentricular" => $data["atrioVentricular"],
        "perfilCara" => $data["perfilCara"],
        "cuello" => $data["cuello"],
        "perfiltorax" => $data["perfiltorax"],
        "corazon" => $data["corazon"],
        "columnaVertebral" => $data["columnaVertebral"],
        "abdomen" => $data["abdomen"],
        "dbp" => $data["dbp"],
        "cc" => $data["cc"],
        "ca" => $data["ca"],
        "lf" => $data["lf"],
        "comentario" => $data["comentario"],
        "ipder" => $data["ipder"],
        "ipizq" => $data["ipizq"],
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
      "endometrio" => $data["endometrio"],
      "tumoranexial" => $data["tumoranexial"],
      "tumorAnexialCom" => $data["tumorAnexialCom"],
      "uteroMedidas" => $data["uteroMedidas"],
      "medidaUtero1" => $data["medidaUtero1"],
      "medidaUtero2" => $data["medidaUtero2"],
      "comentarioUtero" => $data["comentarioUtero"],
      "ovarioDer1" => $data["ovarioDer1"],
      "ovarioDer2" => $data["ovarioDer2"],
      "comentarioOvarioDer" => $data["comentarioOvarioDer"],
      "ovarioIz1" => $data["ovarioIz1"],
      "ovarioIz2" => $data["ovarioIz2"],
      "comentarioOvarioIzq" => $data["comentarioOvarioIzq"],
      "fondosaco" => $data["fondosaco"],
      "miometrio" => $data["miometrio"],
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
      "utero_tipo" => $data["utero_tipo"],
      "superficie" => $data["superficie"],
      "endometrio" => $data["endometrio"],
      "tumoraxial" => $data["tumoraxial"],
      "tumor_anexial_com" => $data["tumor_anexial_com"],
      "utero_medidas" => $data["utero_medidas"],
      "medida_utero1" => $data["medida_utero1"],
      "medida_utero2" => $data["medida_utero2"],
      "comentario_utero" => $data["comentario_utero"],
      "ovario_der1" => $data["ovario_der1"],
      "ovario_der2" => $data["ovario_der2"],
      "comentario_ovario_der" => $data["comentario_ovario_der"],
      "ovario_iz1" => $data["ovario_iz1"],
      "ovario_iz2" => $data["ovario_iz2"],
      "comentario_ovario_izq" => $data["comentario_ovario_izq"],
      "fondosaco" => $data["fondosaco"],
      "miometrio" => $data["miometrio"],
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
      "estomago" => $data["estomago"],
      "higado" => $data["higado"],
      "coledoco_diametro" => $data["coledoco_diametro"],
      "vesicula_volumen" => $data["vesicula_volumen"],
      "vesicula_paredes" => $data["vesicula_paredes"],
      "bazo" => $data["bazo"],
      "rinon_derecho" => $data["rinon_derecho"],
      "rinon_izquierdo" => $data["rinon_izquierdo"],
      "otros_hallazgos" => $data["otros_hallazgos"],
      "conclusiones" => $data["conclusiones"],
      "sugerencias" => $data["sugerencias"],
      "fecha" => date("Y-m-d"),
      "hora" => date("H:i:s"),
      "usuario" => $this->session->userdata("nombre"),
  ];
  $this->db->insert("ecografia_abdominal", $datos);
}

// ECOGRAFIA PROSTATICA

public function createEcografiaProstatica($data) {
  $datos = [
      "documento_paciente" => $data["documento_paciente"],
      "codigo_doctor" => $data["codigo_doctor"],
      "motivo" => $data["motivo"],
      "replicacion" => $data["replicacion"],
      "paredes" => $data["paredes"],
      "contenido" => $data["contenido"],
      "detalle_contenido" => $data["detalle_contenido"],
      "imagenes_expansivas" => $data["imagenes_expansivas"],
      "detalle_imagenes" => $data["detalle_imagenes"],
      "calculos" => $data["calculos"],
      "detalle_calculos" => $data["detalle_calculos"],
      "vol_pre" => $data["vol_pre"],
      "vol_post" => $data["vol_post"],
      "retencion" => $data["retencion"],
      "descripcion" => $data["descripcion"],
      "bordes" => $data["bordes"],
      "transverso" => $data["transverso"],
      "antero_posterior" => $data["antero_posterior"],
      "longitudinal" => $data["longitudinal"],
      "volumen" => $data["volumen"],
      "otra" => $data["otra"],
      "observacion_textarea" => $data["observacion_textarea"],
      "conclusiones" => $data["conclusiones"],
      "fecha" => date("Y-m-d"),
      "hora" => date("H:i:s"),
      "usuario" => $this->session->userdata("nombre"),
  ];
  $this->db->insert("ecografia_prostatica", $datos);
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



    
}