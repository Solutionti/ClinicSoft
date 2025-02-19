<?php

class Triaje_model extends CI_model {

    public function getTriaje() {
        $this->db->select(" a.*,p.nombre as paciente,p.documento,p.apellido, m.nombre, e.descripcion, p.telefono");
        $this->db->from("admisiones a");
        $this->db->join("pacientes p", "a.paciente = p.documento");
        $this->db->join("doctores m", "a.medico = m.codigo_doctor");
        $this->db->join("especialidades e", "a.especialidad = e.codigo_especialidad");
        $this->db->where("a.estado", "Triaje");
        $this->db->order_by("codigo_atencion", "asc");
        $result = $this->db->get();

        return $result;
    }

    public function getTriajeId($id) {
        $this->db->select(" a.*,p.codigo_paciente,p.nombre as paciente,p.apellido, p.edad,p.documento,m.codigo_doctor ,m.nombre, e.descripcion, p.telefono");
        $this->db->from("admisiones a");
        $this->db->join("pacientes p", "a.paciente = p.documento");
        $this->db->join("doctores m", "a.medico = m.codigo_doctor");
        $this->db->join("especialidades e", "a.especialidad = e.codigo_especialidad");
        $this->db->where("codigo_atencion", $id);
        
        $result = $this->db->get();

        return $result->row();
    }

    public function crearTriaje($data) {
        
        $datos = [
            "presion_arterial" => $data["presion"],
            "temperatura" =>  $data["temperatura"],
            "frecuencia_respiratoria" => $data["respiratoria"],
            "frecuencia_cardiaca" => $data["cardiaca"],
            "saturacion" => $data["saturacion"],
            "peso" => $data["peso"],
            "talla" => $data["talla"],
            "imc" => $data["lmc"],
            "paciente" =>  $data["dni"],
            "doctor" => $data["doctor"],
            "especialidad" => $data["especialidad"],
            "usuario" => $this->session->userdata("nombre")
        ];
        $this->db->insert("triajes", $datos);
    }

}