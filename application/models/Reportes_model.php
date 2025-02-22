<?php



class Reportes_model extends CI_model {



    public function  reporteComisionDiario($medico, $fecha){

        $this->db->select("pa.codigo_pago,p.documento,p.nombre,p.apellido, d.nombre as medico, e.descripcion, pa.tipo_deposito, pa.total, pa.comision, pa.fecha");

        $this->db->from("pagos pa");

        $this->db->join("pacientes p", "pa.dni_paciente = p.documento");

        $this->db->join("doctores d", "pa.medico = d.codigo_doctor");

        $this->db->join("especialidades e", "pa.especialidad = e.codigo_especialidad");

        $this->db->where("pa.medico", $medico);

        $this->db->where("pa.fecha", $fecha);

        $this->db->where("pa.usuario", $this->session->userdata("nombre"));

        $this->db->order_by('pa.medico ASC, pa.dni_paciente ASC');

        $result = $this->db->get();

        return $result;

    }



    public function getTotalComisionDiario($medico, $fecha) {

        $this->db->select("SUM(comision) as comision, SUM(total)as total, fecha");

        $this->db->from("pagos");

        $this->db->where("medico", $medico);

        $this->db->where("fecha", $fecha);

        $this->db->where("tipo_deposito", "Efectivo");

        $this->db->where("usuario", $this->session->userdata("nombre"));

        $result = $this->db->get();

        return $result;

    }



    public function reporteGastos($start_date, $end_date) {

        $this->db->select("c.*,u.nombre,u.apellido,CONCAT('S/ ',format(c.monto,2)) as monto_v1,CONCAT('<strong> | S/ </strong>',format(c.monto,2)) as monto_v2,CONCAT(LPAD((c.serie),4,'0'),'-',LPAD((c.numero),8,'0')) as comprobante, DATE_FORMAT(c.f_recepcion, '%d/%m/%Y') as f_recepcion");

        $this->db->from("cpe_gastos c");

        $this->db->join("doctores u", "c.codigo_usuario  = u.codigo_doctor ");

        $this->db->where('c.codigo_usuario_sys = '.$this->session->userdata("codigo").' AND c.f_recepcion BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        $result = $this->db->get();        

        return $result;

    }

	

    public function getTotalGastos($start_date, $end_date) {

        $this->db->select("

        format(SUM(c.sub_total),2) as sub_total,

        format(SUM(c.igv),2) as igv,

        format(SUM(c.op_grav),2) as op_grav,

        format(SUM(c.op_inafec),2) as op_inafec,

        format(SUM(c.op_exone),2) as op_exone,

        format(SUM(c.monto),2) as monto, c.f_recepcion");

        $this->db->from("cpe_gastos c");

        $this->db->join("doctores u", "c.codigo_usuario  = u.codigo_doctor ");

        $this->db->where('c.codigo_usuario_sys = '.$this->session->userdata("codigo").' AND c.f_recepcion BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        $result = $this->db->get();        

        return $result;

    }



    public function reporteLaboratorio($usuario, $fecha) {

        //$fechaact = date("d-m-Y", strtotime($fecha));

        $this->db->select("d.fecha,d.codigo_pago_laboratorio, l.precio,l.nombre, m.apellido");

        $this->db->from("detalle_pago_laboratorio d");

        $this->db->join("precio_laboratorio l", "d.servicio = l.codigo");

        $this->db->join("laboratorio p", "d.id_laboratorio = p.codigo_laboratorio");

        $this->db->join("pacientes m", "p.dni_paciente = m.documento");

        $this->db->where("d.usuario", $usuario);

        $this->db->where("d.fecha", $fecha);

        $result = $this->db->get();

        return $result;

    }



    public function totalLaboratorio($usuario, $fecha) {

        $fechaact = date("d-m-Y", strtotime($fecha));

        $this->db->select("SUM(total) as total, fecha");

        $this->db->from("laboratorio");

        $this->db->where("usuario", $usuario);

        $this->db->where("fecha", $fechaact);

        $result = $this->db->get();

        return $result;

    }



    public function reporteGastosGLOBAL($start_date, $end_date) {

        $this->db->select("c.*,CONCAT(u.nombre,' ',u.apellido) as user_gasto, CONCAT(uu.nombre,' ',uu.apellido) as user_reg, DATE_FORMAT(c.f_recepcion, '%d/%m/%Y') as f_recepcion");

        $this->db->from("cpe_gastos c");

        $this->db->join("doctores uu", "c.codigo_usuario_sys  = uu.codigo_doctor");

        $this->db->join("doctores u", "c.codigo_usuario  = u.codigo_doctor ");

        if($this->session->userdata("rol") == "Administrador"){

            $this->db->where('c.f_recepcion BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        }else{

            $this->db->where('c.codigo_usuario_sys = '.$this->session->userdata("codigo").' AND c.f_recepcion BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        }

        $this->db->order_by('c.codigo_usuario_sys ASC, c.codigo_usuario ASC');

        $result = $this->db->get();        

        //var_dump($result->result());

        return $result;

    }



    public function reporteComisionDiarioGLOBAL($start_date, $end_date){

        $this->db->select("pa.codigo_pago,p.documento,p.nombre,p.apellido, d.nombre as medico,d.codigo_doctor, e.descripcion, pa.tipo_deposito, pa.total, pa.comision, pa.fecha, pa.usuario");

        $this->db->from("pagos pa");

        $this->db->join("pacientes p", "pa.dni_paciente = p.documento");

        $this->db->join("doctores d", "pa.medico = d.codigo_doctor");

        $this->db->join("especialidades e", "pa.especialidad = e.codigo_especialidad");

        $this->db->where('pa.fecha BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        if($this->session->userdata("rol") == "Administrador"){

        }else{

            $this->db->where("pa.usuario", $this->session->userdata("nombre"));

        }

        $this->db->order_by('pa.usuario ASC, d.codigo_doctor ASC, pa.dni_paciente ASC');

        $result = $this->db->get();

        return $result;

    }



    public function reporteComisionDiarioGLOBAL_CAJAS($start_date, $end_date){

        $this->db->select("pa.usuario");

        $this->db->from("pagos pa");

        $this->db->where('pa.fecha BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        if($this->session->userdata("rol") == "Administrador"){

        }else{

            $this->db->where("pa.usuario", $this->session->userdata("nombre"));

        }

        $this->db->group_by('pa.usuario');

        $result = $this->db->get();

        return $result;

    }

    

    public function reporteLaboratorioGLOBAL($start_date, $end_date) {

        $this->db->select("d.fecha,d.usuario,d.codigo_pago_laboratorio, l.precio,l.nombre as descripcion,m.documento, m.nombre, m.apellido,p.tipo_deposito");

        //$this->db->select("d.fecha,d.codigo_pago_laboratorio, l.precio,l.nombre, m.apellido");

        $this->db->from("detalle_pago_laboratorio d");

        $this->db->join("precio_laboratorio l", "d.servicio = l.codigo");

        $this->db->join("laboratorio p", "d.id_laboratorio = p.codigo_laboratorio");

        $this->db->join("pacientes m", "p.dni_paciente = m.documento");

        //$this->db->where("d.usuario", $usuario);

        if($this->session->userdata("rol") == "Administrador"){

            $this->db->where('d.fecha BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        }else{

            $this->db->where('d.usuario = "'.$this->session->userdata("nombre").'" AND d.fecha BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        }

        $this->db->order_by('d.usuario');

        $result = $this->db->get();

        return $result;

    }



}

