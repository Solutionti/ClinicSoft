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

      $this->db->insert("acografia_mama", $datos);
    }

    // ECOGRAFIA TRANSVAGINAL

    public function createEcografiaTransvaginal($data) {
      $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "utero_tipo" => $data["utero_tipo"],
        "superficie_tipo" => $data["superficie_tipo"],
        "endometrio" => $data["endometrio"],
        "tumor_anexial" => $data["tumor_anexial"],
        "utero_dimensiones" => $data["utero_dimensiones"],
        "utero_longitud" => $data["utero_longitud"],
        "utero_tranverso" => $data["utero_tranverso"],
        "utero_antpost" => $data["utero_antpost"],
        "comentario_utero" => $data["comentario_utero"],
        "ovarizq_dimensiones" => $data["ovarizq_dimensiones"],
        "ovarizq_longitud" => $data["ovarizq_longitud"],
        "ovarizq_tranverso" => $data["ovarizq_tranverso"],
        "comentario_ovarizq" => $data["comentario_ovarizq"],
        "ovarder_dimensiones" => $data["ovarder_dimensiones"],
        "ovarder_longitud" => $data["ovarder_longitud"],
        "ovarder_tranverso" => $data["ovarder_tranverso"],
        "comentario_ovarder" => $data["comentario_ovarder"],
        "fondo_saco" => $data["fondo_saco"],
        "conclusion" => $data["conclusion"],
        "sugerencias" => $data["sugerencias"],
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
      ];

      $this->db->insert("ecografia_transvaginal", $datos);
    }

    // ECOGRAFIA PELVICA

    public function createEcografiaPelvica($data) {
      $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "utero_tipo" => $data["utero_tipo"],
        "superficie_tipo" => $data["superficie_tipo"],
        "endometrio" => $data["endometrio"],
        "tumor_anexial" => $data["tumor_anexial"],
        "utero_dimensiones" => $data["utero_dimensiones"],
        "utero_longitud" => $data["utero_longitud"],
        "utero_tranverso" => $data["utero_tranverso"],
        "utero_antpost" => $data["utero_antpost"],
        "comentario_utero" => $data["comentario_utero"],
        "ovarizq_dimensiones" => $data["ovarizq_dimensiones"],
        "ovarizq_longitud" => $data["ovarizq_longitud"],
        "ovarizq_tranverso" => $data["ovarizq_tranverso"],
        "comentario_ovarizq" => $data["comentario_ovarizq"],
        "ovarder_dimensiones" => $data["ovarder_dimensiones"],
        "ovarder_longitud" => $data["ovarder_longitud"],
        "ovarder_tranverso" => $data["ovarder_tranverso"],
        "comentario_ovarder" => $data["comentario_ovarder"],
        "fondo_saco" => $data["fondo_saco"],
        "miometrio" => $data["miometrio"],
        "conclusion" => $data["conclusion"],
        "sugerencias" => $data["sugerencias"],
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
      ];

      $this->db->insert("ecografia_pelvica", $datos);
    }

    // ECOGRAFIA MORFOLOGICA

    public function createEcografiaMorfologica($data) {
      $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "sexo_feto" => $data[""],
        "situacion" => $data[""],
        "forma_cabeza" => $data[""],
        "cerebelo" => $data[""],
        "cisterna_magna" => $data[""],
        "atrio_ventricular" => $data[""],
        "perfil_cara" => $data[""],
        "cuello" => $data[""],
        "torax" => $data[""],
        "corazon" => $data[""],
        "columna" => $data[""],
        "abdomen" => $data[""],
        "dbp" => $data[""],
        "cc" => $data[""],
        "ca" => $data[""],
        "lf" => $data[""],
        "comentario_fetal" => $data[""],
        "ip_der" => $data[""],
        "ip_izq" => $data[""],
        "ponderado_fetal" => $data[""],
        "lcf_fetal" => $data[""],
        "conclusiones" =>  $data[""],
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
      ];

      $this->db->insert("ecografia_morfologica", $datos);
    }

    // ECOGRAFIA GENETICA

    public function createEcografiaGenetica($data) {
      $datos = [
        "documento_paciente" => $data["documento_paciente"],
        "codigo_doctor" => $data["codigo_doctor"],
        "posicion_feto" => $data[""],
        "situacion_feto" => $data[""],
        "liquido_amniotico" => $data[""],
        "placenta" => $data[""],
        "lcr" => $data[""],
        "lcf" => $data[""],
        "art_uteder" => $data[""],
        "art_uteizq" => $data[""],
        "ip_promedio" => $data[""],
        "translucencia_nucal" => $data[""],
        "ductud_venosa" => $data[""],
        "conclusion" => $data[""],
        "sugerencia" => $data[""],
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
        "codigo_doctor" => $data[""],
        "feto_embrion" => $data[""],
        "situacion_feto" => $data[""],
        "estado_feto" => $data[""],
        "placenta" => $data[""],
        "dpb" => $data[""],
        "lcf" => $data[""],
        "min" => $data[""],
        "cc" => $data[""],
        "ca" => $data[""],
        "lf" => $data[""],
        "ila" => $data[""],
        "percentil" => $data[""],
        "tipo_parto" => $data[""],
        "conclusion" => $data[""],
        "sugerencia" => $data[""],
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "usuario" => $this->session->userdata("nombre"),
      ];

      $this->db->insert("ecografia_obstetrica", $datos);
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