<?php

class Usuarios_model extends CI_model {

    public function __construct(){
		parent::__construct();
		$this->load->model("Generic_model");
	}

    public function getAllUsers() {
        $this->db->select("nombre,apellido,codigo_doctor");
        $this->db->from("doctores");
        $this->db->where("estado", "Activo");
        $result = $this->db->get();
        return $result;
    }

    public function getAdministtradores() {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("rol_usuario", "Administrador");
        $this->db->where("estado", "Activo");
        $result = $this->db->get();
        return $result;
    }

    public function getAtenciones() {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("rol_usuario", "Atencion");
        $this->db->where("estado", "Activo");
        $result = $this->db->get();

        return $result;
    }

    public function getEnfermeras() {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("rol_usuario", "Enfermera");
        $this->db->where("estado", "Activo");
        $result = $this->db->get();

        return $result;
    }

    public function getDoctor() {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("rol_usuario", "Doctor");
        $this->db->where("estado", "Activo");
        $result = $this->db->get();

        return $result;
    }

    public function getLaboratorista() {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("rol_usuario", "Laboratorista");
        $this->db->where("estado", "Activo");
        $result = $this->db->get();

        return $result;
    }

    public function getPatologo() {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("rol_usuario", "Patologo");
        $this->db->where("estado", "Activo");
        $result = $this->db->get();

        return $result;
    }

    public function crearUsuarios($data) {
        
        $pass_encrypt = $this->Generic_model->encriptarPassword($data["password"]);
        $datos = [
            "usuario" => $data["usuario"],
            "password" => $pass_encrypt,
            "email" => $data["email"],
            "nombre" => $data["nombre"],
            "apellido" => $data["apellido"],
            "empresa" => "Salud madre y mujer",
            "telefono" => $data["telefono"],
            "rol_usuario" => $data["tp_usuario"],
            "estado" => "Activo",
            "usuario_creacion" => $this->session->userdata("nombre")
        ];
        $this->db->insert("doctores", $datos);
    }

    public function getUsuariosId($id) {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("codigo_doctor", $id);
        $result = $this->db->get();

        return $result->row();
    }

    public function actualizarUsuario($data, $id) {
        $datos = [
            "rol_usuario " => $data["tp_usuario"],
            "telefono" => $data["telefono"],
            "email" => $data["correo"],
            "usuario" => $data["usuario"]
        ];
        $this->db->where("codigo_doctor", $id);
        $this->db->update("usuarios", $datos);
    }

    public function eliminarUsuario($id) {
         $data = [
             "estado" => "Inactivo"
         ];
         $this->db->where("codigo_doctor", $id);
         $this->db->update("usuarios", $data);
    }

    public function getUsuarioInformacion() {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("codigo_doctor", $this->session->userdata("codigo"));
        $result = $this->db->get();

        return $result;
    }

}