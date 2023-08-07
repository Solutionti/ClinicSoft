<?php

class Lineatiempo_model extends CI_model {

    public function getLineaClientes() {
        $this->db->select("L.*,d.nombre as doctor, E.descripcion as  tp_atencion");
        $this->db->from("linea_tiempo L");
        $this->db->join("doctores d", "L.id__doctor = d.codigo_doctor");
        $this->db->join("especialidades E", "E.codigo_especialidad = L.tp_atencion",'left');
        $this->db->where("L.dni_paciente", $this->session->userdata("documento"));
        $this->db->order_by("codigo_linea", "DESC");
        $result = $this->db->get();
        return $result;
    }

    public function getLineaClientes_DNI($dni) {
        $this->db->select("L.*,d.nombre as doctor, E.descripcion as  tp_atencion");
        $this->db->from("linea_tiempo L");
        $this->db->join("doctores d", "L.id__doctor = d.codigo_doctor");
        $this->db->join("especialidades E", "E.codigo_especialidad = L.tp_atencion",'left');
        $this->db->where("L.dni_paciente", $dni);
        $this->db->order_by("codigo_linea", "DESC");
        $this->db->limit("3", "3");
        $result = $this->db->get();
        return $result;
    }

}
?>