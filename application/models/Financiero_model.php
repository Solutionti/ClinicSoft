<?php
class Financiero_model extends CI_model {

    public function getPagos() {
        $this->db->select("t.nombre as paciente,t.apellido,d.nombre as doctor, p.*, e.descripcion as especialidad ");
        $this->db->from("pagos p");
        $this->db->join("pacientes t", "p.dni_paciente = t.documento");
        $this->db->join("doctores d", "p.medico = d.codigo_doctor");
        $this->db->join("especialidades e", "p.especialidad = e.codigo_especialidad");
        $this->db->order_by("codigo_pago", "DESC");
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

    public function editarPagos($estado, $atencion, $documento, $costo, $comision, $medico, $especialidad) {
         
    }

    public function getpagosAtencion($codigo){
      $this->db->select("p.*, c.nombre, c.apellido, c.hc, a.estado, a.codigo_atencion");
      $this->db->from("pagos p");
      $this->db->join("pacientes c", "p.dni_paciente = c.documento");
      $this->db->join("atenciones a", "p.atencion = a.codigo_atencion");
      $this->db->where("codigo_pago", $codigo);
      $result = $this->db->get();

      return $result->row();
    }

    public function actualizarPagos($data, $pago) {
      $datos = [
          "medico" => $data["doctor"],
          "especialidad" => $data["especialidad"],
          "descuento" => $data["descuento"],
          "comision" => $data["comision"],
          "total" => $data["costo"],
          "cantidad_recibida" => $data["cantidad_recibida"],
      ];
      $this->db->where("codigo_pago", $pago);
      $this->db->update("pagos", $datos);
    }

    public function actualizarPagosAtencion($estado, $atencion, $costo, $comision, $medico, $especialidad) {
      $datos = [
        "estado" => $estado,
        "costo" => $costo,
        "comision" => $comision,
        "medico" => $medico,
        "especialidad" => $especialidad
      ];
      $this->db->where("codigo_atencion", $atencion);
      $this->db->update("atenciones", $datos); 
    }

    public function crearPagoAdicional($descripcion, $precio){
      $datos = [
        "dni_paciente" => 0,
        "medico" => 100,
        "especialidad" => 999,
        "atencion" => 0,
        "fecha" => date("Y-m-d"),
        "hora" => date("h:i A"),
        "descuento" => 0,
        "comision" => 0,
        "descripcion" => $descripcion,
        "total" => $precio,
        "cantidad_recibida" => 0,
        "tipo_deposito" => "Efectivo",
        "estado" => "Pago",
        "usuario" => $this->session->userdata("nombre")
      ];
      $this->db->insert("pagos", $datos); 
    }

}

?>