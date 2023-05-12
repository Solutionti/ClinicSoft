<?php

class Pagos_model extends CI_model {

    public function CrearPagos($data) {
        $datos = [
            "dni_paciente" => $data["dni"],
            "medico" => $data["doctor"],
            "fecha" => date("Y-m-d"),
            "hora" => date("h:i A"),
            "descuento" => $data["descuento"],
            "especialidad" => $data["especialidad"],
            "atencion" => $data["atencion"],
            "comision" => $data["comision"],
            "total" => $data["total"],
            "cantidad_recibida" => $data["total_recibida"],
            "tipo_deposito" => $data["tipo_deposito"],
            "estado" => "Pago",
            "usuario" => $this->session->userdata("nombre")
        ];
        $this->db->insert("pagos", $datos);
    }

    

   

}
