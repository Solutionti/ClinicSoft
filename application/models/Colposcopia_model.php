<?php

class Colposcopia_model extends CI_model {

    public function crearColposcopia($data) {
        $datos = [
            "paciente" => $data["dni"],
            "fecha" => $data["fecha"],
            "medico" => $data["medico"],
            "escamo_columnar" => $data["escamo_columnar"],
            "endo_cervix" => $data["endocervix"],
            "vagina" => $data["vagina"],
            "vulva" => $data["vulva"],
            "perineo" => $data["perineo"],
            "region_Parianal" => $data["region_parianal"],
            "biopsia" => $data["biopsia"],
            "papanicolaou" => $data["papanicolaou"],
            "conclusiones" => $data["conclusiones"],
            "usuario" => $this->session->userdata("nombre"),
            "cmp" => $this->session->userdata("cmp")
        ];
        $this->db->insert("colposcopias", $datos);
        $id = $this->db->insert_id();

        return $id;
    }

    public function getColposcopia() {
        $this->db->select("c.*, p.nombre as paciente,p.apellido, p.documento");
        $this->db->from("colposcopias c");
        $this->db->join("pacientes p ", "c.paciente = p.documento");
        $result =  $this->db->get();

       return $result;

    }

    public function updateImagen1($data) {
        $datos = [
            "imagen1" => $data["icono"],
        ];
        $this->db->where("codigo_colposcopia", $data["id"]);
        $this->db->update("colposcopias", $datos);
    }

    public function updateImagen2($data) {
        $datos = [
            "imagen2" => $data["icono"],
        ];
        $this->db->where("codigo_colposcopia", $data["id"]);
        $this->db->update("colposcopias", $datos);
    }

    public function  crearpdfcolposcopia($id){
        $this->db->select("c.*, p.nombre, p.apellido");
        $this->db->from("colposcopias c");
        $this->db->join("pacientes p", "c.paciente = p.documento");
        $this->db->where("c.codigo_colposcopia", $id);
        $result = $this->db->get();

        return $result;

    }

    public function getCpeDoctor() {
        $this->db->select("cpe");
        $this->db->from("doctores");
        $this->db->where("nombre", $this->session->userdata("apellido")." ".$this->session->userdata("nombre"));
        $result = $this->db->get();

        return $result;
    }

}

//https://acordes.lacuerda.net/ska-p/el_vals_del_obrero.shtml
//https://acordes.lacuerda.net/mana/oye_mi_amor-3.shtml
//https://acordes.lacuerda.net/mana/me_vale.shtml
//https://www.cifraclub.com.br/los-prisioneros/el-baile-de-los-que-sobran/