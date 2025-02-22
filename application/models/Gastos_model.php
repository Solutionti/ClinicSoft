<?php

class Gastos_model extends CI_model {

    public function getGastos() {
        $this->db->select("c.*,u.nombre,u.apellido,CONCAT('<strong> | S/ </strong>',format(c.monto,2)) as monto_v2,CONCAT(LPAD((c.serie),4,'0'),'-',LPAD((c.numero),8,'0')) as comprobante, DATE_FORMAT(c.f_recepcion, '%d/%m/%Y') as f_recepcion");
        $this->db->from("cpe_gastos c");
        $this->db->join("doctores u", "c.codigo_usuario  = u.codigo_doctor ");
        $result = $this->db->get();
        return $result;
    }

    public function FormGastoCPE($data) {
        if($data['statee']=='Registrar'){
            $data_v2 = [
                "tipo_doc" => $data['prov_tipo_doc'],
                "nro_doc" => $data['prov_nro_doc'],
                "razon_social" => $data['prov_razon_social'],
                "descripcion" => $data['descripcion'],
                "f_recepcion" => $data['f_recepcion'],
                "f_emision" => $data['f_emision'],
                "tipo_cpe" => $data['cpe_tipo'],
                "serie" => $data['cpe_serie'],
                "numero" => $data['cpe_numero'],
                "sub_total" => $data['cpe_total'],
                "igv" => $data['cpe_igv'],
                "op_grav" => $data['cpe_gravada'],
                "op_inafec" => 0,
                "op_exone" => 0,
                "monto" => $data['cpe_total'],
                "codigo_usuario" => $data['codigo_usuario'],
                "codigo_usuario_sys " => $this->session->userdata("codigo")
            ];
            $this->db->insert("cpe_gastos", $data_v2);
        }else{
            $data_v2 = [
                "tipo_doc" => $data['prov_tipo_doc'],
                "nro_doc" => $data['prov_nro_doc'],
                "razon_social" => $data['prov_razon_social'],
                "descripcion" => $data['descripcion'],
                "f_recepcion" => $data['f_recepcion'],
                "f_emision" => $data['f_emision'],
                "tipo_cpe" => $data['cpe_tipo'],
                "serie" => $data['cpe_serie'],
                "numero" => $data['cpe_numero'],
                "sub_total" => $data['cpe_total'],
                "igv" => $data['cpe_igv'],
                "op_grav" => $data['cpe_gravada'],
                "op_inafec" => 0,
                "op_exone" => 0,
                "monto" => $data['cpe_total'],
                "codigo_usuario" => $data['codigo_usuario']
            ];
            $this->db->where("iddoc_cpe =".$data['idgastos']);
            $this->db->update("cpe_gastos", $data_v2);
        }
    }

    public function val_CPE($cpe_tipo,$cpe_serie,$cpe_numero,$prov_nro_doc,$idgastos,$statee) {
        if($cpe_tipo==123){
            return false;
        }else{
            $this->db->select("*");
            $this->db->from("cpe_gastos");
            if($statee=="Registrar"){
                $this->db->where(" tipo_cpe = ".($cpe_tipo*1)." AND  serie = '".$cpe_serie."' AND  numero = ".($cpe_numero*1)." AND  nro_doc = '".$prov_nro_doc."' " );
            }else{
                $this->db->where(" tipo_cpe = ".($cpe_tipo*1)." AND  serie = '".$cpe_serie."' AND  numero = ".($cpe_numero*1)." AND  nro_doc = '".$prov_nro_doc."'  AND  iddoc_cpe != ".$idgastos );
            }
            $result = $this->db->get();
            if(($result->num_rows() > 0)) {
                return true;
            }else {
                return false;
            }
        }
    }

    public function LoadCpeGasto($ideee) {
        $this->db->select("*");
        $this->db->from("cpe_gastos");
        $this->db->where("iddoc_cpe ", $ideee);
        $result = $this->db->get();
        return $result;
    }
    public function searchProveedor($ruc) {
        $this->db->select("razon_social");
        $this->db->from("cpe_gastos");
        $this->db->where("nro_doc", $ruc);
        $result = $this->db->get();
        if($result->num_rows() > 0) {
            return $result->row();
        }
        else {
            return 0;
        }
    }

}

?>