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
        "sexo_m" => $data["sexo_m"],
        "sexo_f" => $data["sexo_f"],
        "sexo_novisible" => $data["sexo_novisible"],
        "cefalico" => $data["cefalico"],
        "podatico" => $data["podatico"],
        "indiferente" => $data["indiferente"],
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
        "comentario_morfo" => $data["comentario_morfo"],
        "ip_der" => $data["ip_der"],
        "ip_izq" => $data["ip_izq"],
        "ponderadoFetal" => $data["ponderadoFetal"],
        "lcf_fetal" => $data["lcf_fetal"],
        "conclusiones_morfo" => $data["conclusiones_morfo"],
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
        "feto_unico" => $data["feto_unico"],
        "feto_multiple" => $data["feto_multiple"],
        "situacion_cefalico" => $data["situacion_cefalico"],
        "situacion_podatico" => $data["situacion_podatico"],
        "situacion_indiferente" => $data["situacion_indiferente"],
        "liquidoAmniotico" => $data["liquidoAmniotico"],
        "placenta" => $data["placenta"],
        "lcr" => $data["lcr"],
        "lcf" => $data["lcf"],
        "xd" => $data["xd"],
        "art_Uteder" => $data["art_Uteder"],
        "art_Uteizq" => $data["art_Uteizq"],
        "ippromedio" => $data["ippromedio"],
        "huesoNasal" => $data["huesoNasal"],
        "translucenciaNucal" => $data["translucenciaNucal"],
        "ductudVenosa" => $data["ductudVenosa"],
        "conclusion_genetica" => $data["conclusion_genetica"],
        "sugerencia_genetica" => $data["sugerencia_genetica"],
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
        "feto_unico_obs" => $data["feto_unico_obs"],
        "feto_multiple_obs" => $data["feto_multiple_obs"],
        "situacion_cefalico_obs" => $data["situacion_cefalico_obs"],
        "situacion_podatico_obs" => $data["situacion_podatico_obs"],
        "situacion_indiferente_obs" => $data["situacion_indiferente_obs"],
        "estadoFeto" => $data["estadoFeto"],
        "placenta_obs" => $data["placenta_obs"],
        "dpb" => $data["dpb"],
        "lcf_obs" => $data["lcf_obs"],
        "min" => $data["min"],
        "cc" => $data["cc"],
        "ca" => $data["ca"],
        "lf" => $data["lf"],
        "ila" => $data["ila"],
        "percentil" => $data["percentil"],
        "tipoParto" => $data["tipoParto"],
        "conclusion_obs" => $data["conclusion_obs"],
        "sugerencia_obs" => $data["sugerencia_obs"],
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