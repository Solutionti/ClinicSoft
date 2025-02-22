<?php

class Login_model extends CI_model {

    public function iniciarSesion($correo, $password) {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("email", $correo);
        $this->db->or_where("usuario", $correo);
        $this->db->where("estado", "Activo");
        $resultado = $this->db->get();

        if($resultado->num_rows() > 0){
            $contador = 0;
            $data = [];

            foreach($resultado->result() as $value){
                $passAct = $value->password;
                if(password_verify($password, $passAct)){
                    $contador ++;
                    $data = $value;
                }
            }
            if($contador == 1) {
                return $data;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function iniciarSesionClientes($documento, $password) {
        $this->db->select("*");
        $this->db->from("pacientes");
        $this->db->where("documento", $documento);
        $this->db->where("password", $password);
        $resultado = $this->db->get(); 

        if($resultado->num_rows() > 0){
            return $resultado->row();
        }
        else {
            return false;
        }
    }

}

?>