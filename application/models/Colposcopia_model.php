<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colposcopia_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // --- GUARDAR TODO EN UN SOLO PASO ---
    public function crearColposcopia($data) {
        
        $datos_insertar = [
            // Vinculación
            "paciente" => $data["dni"], // Tu tabla usa 'paciente' (int) pero veo que guardas DNI o ID aquí
            "fecha" => $data["fecha"],
            "medico" => $data["medico"], // Nombre del doctor
            
            // CAMPOS MÉDICOS (Coinciden con tu ALTER TABLE)
            "escamo_columnar" => $data["escamo_columnar"],
            "hallazgos_cervix" => $data["hallazgos_cervix"], // Antes endo_cervix
            "vagina" => $data["vagina"],
            "vulva" => $data["vulva"],
            "perineo_anal" => $data["perineo_anal"], // Antes perineo
            "biopsia" => $data["biopsia"],
            "papanicolaou" => $data["papanicolaou"], 
            "conclusiones" => $data["conclusiones"],
            
            // IMÁGENES
            "imagen1" => $data["imagen1"],
            "imagen2" => $data["imagen2"],
            "imagen3" => isset($data["imagen3"]) ? $data["imagen3"] : "", // Por si agregas la 3ra foto
            
            // AUDITORÍA
            "usuario" => $this->session->userdata("nombre"),
            "cmp" => $this->session->userdata("cmp")
        ];

        $this->db->insert("colposcopias", $datos_insertar);
        return $this->db->insert_id();
    }

    // --- OBTENER DATOS ---
    public function getColposcopia() {
        $this->db->select("c.*, p.nombre, p.apellido, p.documento");
        $this->db->from("colposcopias c");
        // Ajusta 'p.documento' si tu tabla pacientes usa 'id' como clave primaria
        $this->db->join("pacientes p", "c.paciente = p.documento"); 
        $this->db->order_by("c.codigo_colposcopia", "DESC");
        $result = $this->db->get();
        return $result->result();
    }

    // --- DATOS PARA PDF ---
    public function crearpdfcolposcopia($id){
        $this->db->select("c.*, p.nombre, p.apellido, p.edad, p.sexo, p.documento");
        $this->db->from("colposcopias c");
        $this->db->join("pacientes p", "c.paciente = p.documento");
        $this->db->where("c.codigo_colposcopia", $id);
        $result = $this->db->get();
        return $result->result();
    }
}