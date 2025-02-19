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






public function subirDocumentoEcografias($data) {

      $datos = [
          "paciente" => $data["paciente"],
          "titulo" => $data["titulo"],
          "url_documento" => $data["icono"],
          "tp_documento" => "ecografias",
          "fecha" => date("Y-m-d")
      ];
      $this->db->insert("documentos_pacientes", $datos);
  }

    
}