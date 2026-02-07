<?php



class Citas_model extends CI_model {



    public function crearCita($data) {
        $this->db->where("documento", $data["dni"]);
        $this->db->where("triage", $data["triage"]);
        $this->db->delete("citas");
        if($data["triage"] != "") {
           $triage = $data["triage"];
        }
        else {
          $triage = 0;
        }
        $datos = [
          "documento" => $data["dni"],
          "triage" => $triage,
          "nombre" => $data["nombre"],
          "telefono" => $data["telefono"],
          "doctor" => $data["medico"],
          "fecha" => $data["fecha"],
          "fechafin" => $data["fecha"],
          "hora" => $data["hora"],
          "comentarios" => $data["observaciones"],
          "estado" => $data["estado"],
          "usuario" => $this->session->userdata("nombre")
        ];
        $this->db->insert("citas", $datos);

    }



    public function getDatosCitas($id) {

        $this->db->select("*");

        $this->db->from("doctores");

        $this->db->where("codigo_doctor", $id);

        $result = $this->db->get();

        return $result->row();

    }

    public function getCitasDoc($id) {

        $queryTot = $this->db->query("SET lc_time_names = 'es_ES'");

       $this->db->select("c.*,d.nombre as doctor,DATE_FORMAT(fecha,'%d de %M') as date_cita ");

       $this->db->from("citas c");

       $this->db->join("doctores d", "c.doctor = d.codigo_doctor");

       //$this->db->where("c.estado like 'Pendiente'");

       $this->db->where("(c.estado like 'Pendiente' || c.estado like 'Confirmado') AND fecha >= CURDATE() AND c.doctor = ".$id);

       $this->db->order_by("c.fecha ", "DESC");

       $result = $this->db->get();

       return $result;

   }

    public function getHorariosDoc($id) { 

        $this->db->select("*");

        $this->db->from("doctores");

        $this->db->where("codigo_doctor", $id);

        $HorariosDoc = $this->db->get();

        return $HorariosDoc;

    }



    public function getCitasIdxFecha($fecha,$doctor) {

        $this->db->select("*");

        $this->db->from("citas");

        $this->db->where("fecha", $fecha);

        $this->db->where("doctor", $doctor);

        $this->db->where("estado != 'Cancelado'");

        $result = $this->db->get();

        //return $result->row();

        return $result;

    }



    public function getCitas() {

	 	$queryTot = $this->db->query("SET lc_time_names = 'es_ES'");

        $this->db->select("c.*,d.nombre as doctor,DATE_FORMAT(fecha,'%d de %M') as date_cita ,DATE_FORMAT(hora,'%h') as hora_12h ");

        $this->db->from("citas c");

        //$this->db->join("pacientes p", "c.paciente = p.documento");

        $this->db->join("doctores d", "c.doctor = d.codigo_doctor");

        //$this->db->where("c.estado like 'Pendiente'");

        $this->db->where("(c.estado like 'Pendiente' || c.estado like 'Confirmado') AND fecha >= CURDATE()  ");// Importante: Tiene que ser asi para despues ponerlos como TRATADOS, y desaparescan de todos lados, menos de los horarios libres

        $this->db->order_by("c.fecha ", "ASC");

        $result = $this->db->get();

        return $result;

    }

    public function getdataCalendario() {

        $this->db->select("CONCAT(p.apellido,' ',p.nombre, ' ( ',c.paciente,' )  DESCRIPCION => ',c.comentarios) as title,CONCAT(c.fecha,' ',c.hora) as start, CONCAT(c.fecha,' ',c.hora) as end,c.*");

        $this->db->from("citas c");

        $this->db->join("pacientes p", "c.paciente = p.documento");

        $this->db->where("c.doctor", $this->session->userdata("codigo"));

        $this->db->where("c.estado", "Confirmado");

        $this->db->group_by('c.codigo_cita');

        return   $this->db->get()->result();  

    }



    public function getAllDataCalendario() {

        $this->db->select("CONCAT(p.apellido,' ',p.nombre, ' ( ',c.paciente,' )  DESCRIPCION => ',c.comentarios, ' <= DOCTOR => ',  d.nombre) as title,CONCAT(c.fecha,' ',c.hora) as start, CONCAT(c.fecha,' ',c.hora) as end,c.*,d.color");

        $this->db->from("citas c");

        $this->db->join("pacientes p", "c.paciente = p.documento");

        $this->db->join("doctores d", "c.doctor = d.codigo_doctor");

         $this->db->where("c.doctor", $medico);

        $this->db->group_by('c.codigo_cita');

        return   $this->db->get()->result();  

    }



    public function getCitasId($id) {

        $this->db->select("c.*");

        $this->db->from("citas c");

        //$this->db->join("pacientes p", "c.paciente = p.documento");

        $this->db->where("c.codigo_cita", $id);

        $result = $this->db->get();

        return $result->row();

    }

    public function editarCitas($data, $id) {

		$datos = [

            "documento" => $data["dni"],

            "nombre" => $data["nombre"],

            "telefono" => $data["telefono"],

            "doctor" => $data["medico"],

            "fecha" => $data["fecha"],

            "fechafin" => $data["fecha"],

            "hora" => $data["hora"],

            "estado" => $data["estado"],

            "comentarios" => $data["observaciones"]

        ];

        $this->db->where("codigo_cita", $id);

        $this->db->update("citas", $datos);

	}



}