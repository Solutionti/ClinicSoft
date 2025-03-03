<?php

class Historias_model extends CI_model {

    public function getHistoriasId($paciente) {
        $this->db->select("h.*, p.nombre as pacientes,p.apellido, d.nombre as doctor");
        $this->db->from("historial_pacientes h");
        $this->db->join("pacientes p", "h.paciente = p.documento");
        $this->db->join("doctores d", "h.doctor = d.codigo_doctor");
        $this->db->where("h.paciente", $paciente);
        $result = $this->db->get();
        return $result;
    }

    public function getTriajeId($paciente) {
        $this->db->select("t.*, p.nombre as paciente,p.apellido,p.documento,d.nombre as medico,d.codigo_doctor,p.edad,p.sexo,e.descripcion, e.codigo_especialidad, p.telefono");
        $this->db->from("triajes t");
        $this->db->join("pacientes p", "t.paciente = p.documento");
        $this->db->join("doctores d", "t.doctor = d.codigo_doctor");
        $this->db->join("especialidades e", "t.especialidad = e.codigo_especialidad");
        $this->db->where("t.paciente", $paciente);
        $this->db->order_by("t.codigo_triaje", "desc");
        $result = $this->db->get();

        return $result->row();
    }

    public function getatencionid($paciente) {
        $this->db->select("especialidad");
        $this->db->from("admisiones");
        $this->db->where("paciente", $paciente);
        $result = $this->db->get();

        return $result;
    }
    // PARA MEDICINA GENERAL EL TIPO DE CONSULTA ES 1
    // PARA GINECOLOGIA  EL TIPO DE CONSULTA ES 2 
    public function crearHistorialPacientesGinecologicas($data, $id,$tipo) {
        $datos = [
            "tipo_consulta" => $tipo,
            "paciente" => $data["paciente"],
            "doctor" => $data["doctor"],
            "codigo_historia" => $data["paciente"],
            "triaje" => $data["triaje"],
            "estado" => "Activo",
            "fecha" => date("d-m-Y"),
            "hora" => date("h:i A"),
            "usuario" => $this->session->userdata("nombre")
        ];
        $this->db->insert("historial_pacientes", $datos);
        $id = $this->db->insert_id();
        return $id;
    }

    public function crearHconsultasGinecologicas($data) {
        $datos = [
            "familiares" => $data["familiares"],
            "patologicos" => $data["patologicos"],
            "gineco_obstetrico" => $data["gine_obste"],
            "fum" => $data["fum"],
            "rm" => $data["rm"],
            "flujo_genital" => $data["flujo_genital"],
            "no_de_parejas" => $data["parejas"],
            "gestas" => $data["gestas"],
            "partos" => $data["partos"],
            "abortos" => $data["abortos"],
            "anticonceptivos" => $data["anticonceptivos"],
            "tipo" =>  $data["tipo"],
            "tiempo" => $data["tiempo"],
            "cirugia_ginecologica" => $data["cirugia_ginecologica"],
            "otros" =>  $data["otros"],
            "fecha_pap" => $data["pap"],
            "no_hijos" =>  $data["hijos"],
            "motivo_consulta" => $data["motivo_consulta"],
            "signossintomas" => $data["signos_sintomas"],
            "piel_tscs" => $data["piel_tscs"],
            "tiroides" =>  $data["tiroides"],
            "mamas" => $data["mamas"],
            "arespiratorio" => $data["a_respiratorio"],
            "acardiovascular" => $data["a_cardiovascular"],
            "abdomen" =>  $data["abdomen"],
            "genito_urinario" =>  $data["genito"],
            "tacto_rectal" => $data["tacto"],
            "locomotor" => $data["locomotor"],
            "sistema_nervioso" => $data["sistema_nervioso"],
            "examenes_auxiiliares" => $data["exa_auxiliares"],
            "plan_trabajo" => $data["plan_trabajo"],
            "proxima_cita" => $data["proxima_cita"],
            "firma_medico" =>  $data["firma_medico"],
            "estado" => "Activo",
            "usuario" => $this->session->userdata("nombre"),
            "tratamiento" =>$data["tratamiento"]
        ];
        $this->db->insert("h_ginecologias", $datos);
        $id = $this->db->insert_id();
        return $id;
    }

    public function crearHconsultasGeneral($data) {

        $datos = [
            "codigo_triage" => $data["triaje"],
            "anamnesis" => $data["anamnesis"],
            "empresa" => $data["empresa"],
            "compania" => $data["compania"],
            "iafa" => $data["iafa"],
            "nombre_acompanante" => $data["acompanante"],
            "dni" => $data["documento"],
            "celular" =>  $data["celular"],
            "motivo_consulta" => $data["motivo_consulta"],
            "tratamiento_anterior" => $data["tratamiento_anterior"],
            "enfermedad_actual" => $data["enfermedad_actual"],
            "inicio" => $data["inicio"],
            "curso" => $data["curso"],
            "sintomas" => $data["sintomas"],
            "cabeza" => $data["cabeza"],
            "cuello" => $data["cuello"],
            "ap_respiratoria" => $data["ap_respiratorio"],
            "ap_cardio" => $data["ap_cardio"],
            "abdomen" => $data["abdomen"],
            "ap_genitourinario" => $data["ap_genito"],
            "loco_motor" => $data["locomotor"],
            "sistema_nervioso" => $data["sistema_nervioso"],
            "apetito" => $data["apetito"],
            "sed" => $data["sed"],
            "orina" => $data["orina"],
            "examen_dx" => $data["examendx"],
            "procedimientos" => $data["procedimientos"],
            "interconsultas" => $data["interconsultas"],
            "tratamiento" => $data["tratamiento"],
            "referencia" =>  $data["referencia"],
            "proxima_cita" =>  $data["cita"],
            "firma_medico" => $data["firma"],
            "usuario" => $this->session->userdata("nombre")
        ];
        $this->db->insert("h_consultas", $datos);
        $id = $this->db->insert_id();

        return $id;

    }

    public function crearRecetaMedica($data){
        $datos = [
            "paciente" => $data["paciente"],
            "fecha" => date("Y-m-d"),
            "medicina" => $data["medicina"],
            "receta" => $data["receta"],
            "autorizo" => $this->session->userdata("nombre")." ".$this->session->userdata("apellido")
        ];
        $this->db->insert("recetas_medicas", $datos);
    }

    public function getRecetas($paciente) {
        $this->db->select("*");
        $this->db->from("recetas_medicas");
        $this->db->where("paciente", $paciente);
        $result = $this->db->get();
        return $result;
    }

    public function subirDocumentos($data){
        $datos = [
            "paciente" => $data["paciente"],
            "titulo" => $data["titulo"],
            "url_documento" => $data["icono"],
            "tp_documento" => "hfisico",
            "fecha" => date("Y-m-d")
        ];
        $this->db->insert("documentos_pacientes", $datos);
    }

    public function getDocumentos($paciente, $tp_documento) {
        $this->db->select("*");
        $this->db->from("documentos_pacientes");
        $this->db->where("paciente", $paciente);
        $this->db->where("tp_documento", $tp_documento);
        $result = $this->db->get();

        return $result;
    }

    public function GenerarPdfGinecologia($documento, $triage){
        $this->db->select("h.*, g.*");
        $this->db->from("historial_pacientes h");
        $this->db->join("h_ginecologias g", "h.triaje = g.codigo_historia");
        $this->db->join("triajes t", "h.triaje = t.codigo_triaje");
        $this->db->where("h.codigo_historia", $documento);
        $this->db->where("h.triaje", $triage);
        // $this->db->where("h.tipo_consulta", 2);
        $result = $this->db->get();

        return $result;

    }

    public function GenerarPdfMedicinaGeneral($documento, $triage){
        $this->db->select("h.*, c.*,t.*");
        $this->db->from("historial_pacientes h");
        $this->db->join("h_consultas c", "h.triaje = c.codigo_triage");
        $this->db->join("triajes t", "h.triaje = t.codigo_triaje");
        $this->db->where("h.codigo_historia", $documento);
        $this->db->where("h.triaje", $triage);
        $this->db->where("h.tipo_consulta", 1);
        $result = $this->db->get();

        return $result;
    }

    public function getDiagnosticos() {
        $this->db->select("*");
        $this->db->from("diagnosticoscie10");
        $result = $this->db->get();

        return $result;
    }

    public function crearDiagnosticos($data) {
        $datos = [
            "paciente" => $data["paciente"],
            "codigo_diagnosti" => $data["diagnosticos"],
            "tipo_especialidad" => 2,
            "historia" => $data["historia"],
            "fecha" =>  date("Y-m-d"),
            "usuario" => $this->session->userdata("nombre")
        ];
        $this->db->insert("diagnosticos", $datos);
    }

    public function crearDiagnosticosGeneral($data) {
        $datos = [
            "codigo_historia" => $data["triaje"],
            "paciente" => $data["paciente"],
            "codigo_diagnosti" => $data["diagnosticos"],
            "tipo_especialidad" => 1,
            "historia" => $data["paciente"],
            "fecha" =>  date("Y-m-d"),
            "usuario" => $this->session->userdata("nombre")
        ];
        $this->db->insert("diagnosticos", $datos);
    }

    // SET collation_connection = 'utf8mb4_general_ci';
    // ALTER DATABASE your_bd CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
    // ALTER TABLE your_table CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

    public function getDiagnosticosGinecologia($historia, $fecha){
        $fechan = date("Y-m-d", strtotime($fecha));
		$this->db->select("d.*, c.descripcion, c.clave");
		$this->db->from("diagnosticos d");
		$this->db->join("diagnosticoscie10 c", "d.codigo_diagnosti = c.id");
		$this->db->where("d.historia", $historia);
		$this->db->where("d.tipo_especialidad", 2);
		$this->db->where("d.fecha", $fechan);
		$result = $this->db->get();

		return $result;
	}

    public function getDiagnosticosGeneral($historia, $fecha){
        $fechan = date("Y-m-d", strtotime($fecha));
		$this->db->select("d.*, c.descripcion, c.clave");
		$this->db->from("diagnosticos d");
		$this->db->join("diagnosticoscie10 c", "d.codigo_diagnosti = c.id");
		$this->db->where("d.historia", $historia);
		$this->db->where("d.tipo_especialidad", 1);
		$this->db->where("d.fecha", $fechan);
		$result = $this->db->get();

		return $result;
	}

    public function getProcedimientos(){
        $this->db->select("*");
        $this->db->from("procedimientos");
        $result = $this->db->get();

        return $result;

    }

    public function getconsecutivoGeneral($documento) {
      $this->db->select("count(*) as general");
      $this->db->from("historial_pacientes");
      $this->db->where("paciente", $documento);
      $this->db->where("tipo_consulta", 1);
      $result = $this->db->get();

      return $result;
	}

	public function getConsecutivoGinecologica($documento) {
        $this->db->select("count(*) as gineco");
        $this->db->from("historial_pacientes");
        $this->db->where("paciente", $documento);
        $this->db->where("tipo_consulta", 2);
        $result = $this->db->get();
  
        return $result;
	}

    public function crearAlergias($datos) {
	  $alergias = [
        "dni_paciente" => $datos["dni_paciente"],
        "tipo_alergia" => $datos["tipo_alergia"],
        "descripcion" => $datos["descripcion"],
      ];
      $this->db->insert('alergias', $alergias);
	}

    public function getalergiasMedicamentos($documento) {
        $this->db->select("*");
        $this->db->from("alergias");
        $this->db->where("dni_paciente", $documento);
        $this->db->where("tipo_alergia", 'Medicamentos');
        $result = $this->db->get();
  
        return $result;
    }

    public function getalergiasOtros($documento) {
        $this->db->select("*");
        $this->db->from("alergias");
        $this->db->where("dni_paciente", $documento);
        $this->db->where("tipo_alergia", 'Otras');
        $result = $this->db->get();
  
        return $result;
    }

    public function crearMedicamento($datos) {
      $medicamento = [
        "triaje" => $datos["triaje"],
        "doctor" => $this->session->userdata("nombre")." ".$this->session->userdata("apellido"),
        "paciente" => $datos["paciente"],
        "medicamento" => $datos["medicamento"],
        "cantidad" => $datos["cantidad"],
        "dosis" => $datos["dosis"],
        "via_aplicacion" => $datos["via_aplicacion"],
        "frecuencia" => $datos["frecuencia"],
        "duracion" => $datos["duracion"],
        "fecha" => date("Y-m-d"),
      ];
      $this->db->insert('medicamentos', $medicamento);
    }

    public function getMedicamentos($documento) {
        $this->db->select("*");
        $this->db->from("medicamentos");
        $this->db->where("paciente", $documento);
        $result = $this->db->get();
  
        return $result;
    }

    public function consultaIniciadaGeneral($documento) {
        $this->db->select("*");
        $this->db->from("historial_pacientes");
        $this->db->where("paciente", $documento);
        $this->db->where("tipo_consulta", 1);
        $this->db->order_by('codigo_historial_paciente', 'DESC');
        $result = $this->db->get();
        
        if($result->num_rows() > 0) {
          return $result->row();
        }
        else {
          return false;
        }
    }

    public function consultaIniciadaGineco($documento) {
        $this->db->select("*");
        $this->db->from("historial_pacientes");
        $this->db->where("paciente", $documento);
        $this->db->where("tipo_consulta", 2);
        $this->db->order_by('codigo_historial_paciente', 'DESC');
        $result = $this->db->get();
        
        if($result->num_rows() > 0) {
            return $result->row();
          }
          else {
            return false;
          }
    }

    public function getPosCita($documento) {
        $this->db->select("*");
        $this->db->from("citas");
        $this->db->where("documento", $documento);
        $this->db->where("estado", "Pendiente");
        $this->db->order_by('codigo_cita', 'DESC');
        $result = $this->db->get();

        if($result->num_rows() > 0) {
            return $result->row();
          }
          else {
            return false;
          }
  
    }

    public function getDiagnosticoHistoria($documento) {
        $this->db->select("d.*, ci.descripcion, ci.clave");
        $this->db->from("diagnosticos d");
        $this->db->join("diagnosticoscie10 ci", "d.codigo_diagnosti = ci.id");
        $this->db->where("d.paciente", $documento);
        $result = $this->db->get();

        return $result;
    }

    public function getProcedimientosHistoria($documento) {
        $this->db->select("d.*, ci.nombre, ci.codigo_cpt");
        $this->db->from("procedimiento_historias d");
        $this->db->join("procedimientos ci", "d.codigo_procedimiento = ci.codigo_cpt");
        $this->db->where("d.paciente", $documento);
        $result = $this->db->get();

        return $result;
    }

    public function getUltimoDatoTriage($documento) {
      $this->db->select("*");
      $this->db->from("triajes");
      $this->db->where("paciente", $documento);
      $this->db->order_by('codigo_triaje', 'DESC');

      $result = $this->db->get();

      return $result;
    }

    public function getAllAlergias($documento) {
        $this->db->select("*");
        $this->db->from("alergias");
        $this->db->where("dni_paciente", $documento);
  
        $result = $this->db->get();

        if($result->num_rows() > 0) {
          return $result;
        }
        else {
          return false;
        }
  
        return $result;  
    }

    public function getMedicamentosHistoria($documento, $triaje) {
        $this->db->select("*");
        $this->db->from("medicamentos");
        $this->db->where("paciente", $documento);
        $this->db->where("triaje", $triaje);
  
        $result = $this->db->get();

        if($result->num_rows() > 0) {
          return $result;
        }
        else {
          return false;
        }
  
        return $result;  
    }

    public function getDiagnosticosHistoria($documento, $triaje) {
        $this->db->select("d.*, dc.clave, dc.descripcion");
        $this->db->from("diagnosticos d");
        $this->db->join("diagnosticoscie10 dc", "d.codigo_diagnosti = dc.id");
        $this->db->where("d.paciente", $documento);
        $this->db->where("d.codigo_historia", $triaje);
  
        $result = $this->db->get();

        if($result->num_rows() > 0) {
          return $result;
        }
        else {
          return false;
        }
  
        return $result;  
    }


    
}

?>