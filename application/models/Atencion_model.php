<?php



class Atencion_model extends CI_model {

    public function searchAtencion($dni) {

        $this->db->select("nombre,hc,apellido");
        $this->db->from("pacientes");
        $this->db->where("documento", $dni);
        $result = $this->db->get();
        if($result->num_rows() > 0) {
            return $result->row();
        }
        else {
            return 0;
        }
    }

    public function registrarAtencion($data) {

        $datos = [
            "paciente" => $data["dni"],
            "medico" => $data["doctor"],
            "especialidad" => $data["especialidad"],
            "costo" => $data["costo"],
            "orden__" => $data["orden__"],
            "cola_atencion" => $data["cola_atencion"],
            "comision" => $data["comision"],
            "estado" => "Registrado",
            "fecha" => date("Y-m-d"),
            "hora" => date("h:i A"),
            "usuario" => $this->session->userdata("nombre")

        ];

        $this->db->insert("atenciones", $datos);
        return $this->db->insert_id();

    }

    public function getAtenciones() {

        $this->db->select(" a.*,p.nombre as paciente,p.documento,p.apellido, m.nombre, e.descripcion");
        $this->db->from("atenciones a");
        $this->db->join("pacientes p", "a.paciente = p.documento");
        $this->db->join("doctores m", "a.medico = m.codigo_doctor");
        $this->db->join("especialidades e", "a.especialidad = e.codigo_especialidad");
        $this->db->where("a.estado", "Registrado");
        $this->db->order_by("codigo_atencion", "asc");
        $result = $this->db->get();

        return $result;

    }



    public function insertarTurno($paciente) {

        $datos =  [
          "paciente" => $paciente
        ];

        $this->db->insert("turnera", $datos);

    }

    public function CountTurnos($id_doc) {

        $this->db->select("count(*) as Orden");
        $this->db->from("atenciones");
        $this->db->where("medico", $id_doc);
        $this->db->where("cola_atencion", "Si");
        //$this->db->where("estado = 'Consulta' OR estado = 'Atendido'");
        $this->db->where("fecha = CURRENT_DATE()");
        $result = $this->db->get();
        return $result;
        //return $result->row();

    }

    public function mandarTriaje($id) {
        $data = [
          "estado" => "Triaje"
        ];
        $this->db->where("codigo_atencion", $id);
        $this->db->update("atenciones", $data);

    }

    public function mandaraConsulta($id) {
        $medico__ = 0;
        $this->db->select("a.medico");
        $this->db->from("atenciones a");
        $this->db->where("a.codigo_atencion", $id);
        $result = $this->db->get();

        if ($result->num_rows() > 0){
            foreach ($result->result() as $row){
                $medico__ = $row->medico;
            }
        }

        $data = [
            "estado" => "Consulta"
        ];
        $this->db->where("codigo_atencion", $id);
        $this->db->update("atenciones", $data);

    }

    public function cargarFacturaAtencion($id) {
        $this->db->select("a.*,p.nombre,p.documento,p.apellido,p.hc,d.nombre as doctor, e.descripcion");
        $this->db->from("atenciones a");
        $this->db->join("pacientes p", "a.paciente = p.documento");
        $this->db->join("doctores d", "a.medico = d.codigo_doctor");
        $this->db->join("especialidades e", "a.especialidad = e.codigo_especialidad");
        $this->db->where("a.codigo_atencion", $id);

        $result = $this->db->get();
        return $result;

    }

    public function getAtencionesDoctor() {

        //$this->db->select(" a.*, m.nombre, e.descripcion");
        $this->db->select(" a.*,p.nombre as paciente,p.documento,p.apellido,p.hc,p.direccion,p.telefono, m.nombre, e.descripcion");
        $this->db->from("atenciones a");
        $this->db->join("pacientes p", "a.paciente = p.documento");
        $this->db->join("doctores m", "a.medico = m.codigo_doctor");
        $this->db->join("especialidades e", "a.especialidad = e.codigo_especialidad");
        $this->db->where("a.estado", "Consulta");
        //$this->db->where("a.fecha", date("Y-m-d"));
        $this->db->where("a.medico", $this->session->userdata("codigo"));
        $this->db->order_by("codigo_atencion", "asc");
        //$this->db->group_by('a.paciente');
        $result = $this->db->get();
        return $result;

    }

    public function mandarAtendido($id) {

        $data = [
          "estado" => "Atendido"
        ];
        $this->db->where("codigo_atencion", $id);
        $this->db->update("atenciones", $data);

    }
    // LINEA DE TIEMPO 
    public function CrearLineaTiempoAtencion($documento, $especialidad,$doctor_ide) {

        $datos = [
            "dni_paciente" => $documento,
            "tp_atencion" => $especialidad,
            "fecha" => date("d-m-Y"),
            "hora" => date("h:i A"),
            "usuario" => $this->session->userdata("nombre"),
            "id__doctor" => $doctor_ide
        ];

        $this->db->insert("linea_tiempo", $datos);

    }

    public function CrearLineaTiempoLaboratorio($documento,$especialidad,$doctor_ide) {
        $datos = [
            "dni_paciente" => $documento,
            "tp_atencion" => $especialidad,
            "fecha" => date("d-m-Y"),
            "hora" => date("h:i A"),
            "usuario" => $this->session->userdata("nombre"),
            "id__doctor" => $doctor_ide
        ];

        $this->db->insert("linea_tiempo", $datos);

    }
}