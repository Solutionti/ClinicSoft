<?php
class Financiero_model extends CI_model {

    public function getPagos() {
        $this->db->select("t.nombre as paciente,t.apellido,d.nombre as doctor, p.* ");
        $this->db->from("pagos p");
        $this->db->join("pacientes t", "p.dni_paciente = t.documento");
        $this->db->join("doctores d", "p.medico = d.codigo_doctor");
        $result = $this->db->get();

        return $result;
    }

    public function crearGastos($data) {
        $datos = [
            "categoria" => $data["nombre"],
            "fecha" => date("Y-m-d"),
            "descripcion" => $data["descripcion"],
            "precio" => $data["cantidad"],
            "usuario" => $this->session->userdata("nombre")

        ];
        $this->db->insert("gastos", $datos);
    }

    public function editarPagos($estado, $atencion, $documento) {
      $datos = [
        "estado" => $estado
      ];
      $this->db->where("codigo_atencion", $atencion);
      $this->db->where("paciente", $documento);
      $this->db->update("atenciones", $datos);    
    }

}

?>