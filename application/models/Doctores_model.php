<?php

class Doctores_model extends CI_model {

    public function getDoctores() {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("estado", "Activo");
        $this->db->where("rol_usuario", "Doctor");
        $result = $this->db->get();

        return $result;
    }
	public function getHorariosDoc() {
		$fecha = $this->input->post("fecha");//var_dump($fecha);
		$medico = $this->input->post("medico");//var_dump($medico);
		$CitasIdxFecha = $this->Citas_model->getCitasIdxFecha($fecha,$medico);
		$HorariosDoc 		= $this->Citas_model->getHorariosDoc($medico);
		$horario__ = "";//Horario del dia para este Doctor
		$timestamp = strtotime($fecha);
		$day = date('N', $timestamp);
		//var_dump($day);
		//var_dump($CitasIdxFecha);
		if ($HorariosDoc->num_rows() > 0)
        {
			foreach ($HorariosDoc->result() as $row)
            {
				switch ($day){
					case 1: $horario__ = $row->Horas_lunes;break;
					case 2: $horario__ = $row->Horas_martes;break;
					case 3: $horario__ = $row->Horas_miercoles;break;
					case 4: $horario__ = $row->Horas_jueves;break;
					case 5: $horario__ = $row->Horas_viernes;break;
					case 6: $horario__ = $row->Horas_sabado;break;
					case 7: $horario__ = $row->Horas_domingo;break;
				}
            }
        }
		if($horario__!=""){
			$horarios_mostrar = array();
			$horas__ = explode(";", $horario__);
			$duracion__ = $horas__[0];
			array_splice($horas__,0,1);
			for($i=0; $i < sizeof($horas__);$i++){
				$hor__as = explode("-", $horas__[$i]);
				$hor__min_1 = explode(":", $hor__as[0]);
				$hor__min_2 = explode(":", $hor__as[1]);
				$hor__1 = ($hor__min_1[0]*1);	$min__1 = 0;
				if(sizeof($hor__min_1)>1){	$min__1 = ($hor__min_1[1]*1);}
				$hor__2 = ($hor__min_2[0]*1);	$min__2 = 0;
				if(sizeof($hor__min_2)>1){	$min__2 = ($hor__min_2[1]*1);}
				$hor________min_1 = $this->ceros($hor__1*1,2).":".$this->ceros($min__1*1,2).":00";
				$hor________min_1 = strtotime($hor________min_1);
				array_push($horarios_mostrar,array("hora" =>$hor________min_1));
				$hor________min_1 = strtotime('.'.$duracion__.' minute',$hor________min_1);
				array_push($horarios_mostrar,array("hora" =>$hor________min_1));
				$hor________min_2 = $this->ceros($hor__2*1,2).":".$this->ceros($min__2*1,2).":00";
				$hor________min_2 = strtotime($hor________min_2);
				for($i=0; $i < 50;$i++){
					if($hor________min_1>=$hor________min_2){
						$i = 50;
					}else{
						$hor________min_1 = strtotime('.'.$duracion__.' minute',$hor________min_1);
						array_push($horarios_mostrar,array("hora" =>$hor________min_1));
					}
				}
				for($iaa=0; $iaa < sizeof($horarios_mostrar);$iaa++){
					$horarios_mostrar[$iaa]['hora'] = date('H:i',$horarios_mostrar[$iaa]['hora']);
				}
			}
			if ($CitasIdxFecha->num_rows() > 0)
			{
				foreach ($CitasIdxFecha->result() as $row)
				{
					$horarios_mostrar = $this->eliminar__($horarios_mostrar,$row->hora);
				}
			}
			if(sizeof($horarios_mostrar)>0){
				$data = [
					"horarios_mostrar" => $horarios_mostrar,
					"sms" => "Horarios Disponibles",
					"acction" => 1
				];
				echo json_encode($data);
			}else{
				$data = [
					"horarios_mostrar" => $horarios_mostrar,
					"sms" => "Dia No Disponible",
					"acction" => 2
				];
				echo json_encode($data);
			}
		}else{
			$data = [
				"horarios_mostrar" => array(),
				"sms" => "Dia No Disponible",
				"acction" => 2
			];
			echo json_encode($data);
		}
	}
    public function eliminar__($arrr,$hora__){
		for($iaa=0; $iaa < sizeof($arrr);$iaa++){
			if($arrr[$iaa]['hora'] == $hora__){
				array_splice($arrr,$iaa,1);
				$this->eliminar__($arrr,$hora__);
			}
		}
        return $arrr;
    } 

    public function ceros($valor, $longitud){
        $res = str_pad($valor, $longitud, '0', STR_PAD_LEFT);
        return $res;
    } 
    public function getDoctoresId($id) {
        $this->db->select("*");
        $this->db->from("doctores");
        $this->db->where("codigo_doctor",$id);
        $result = $this->db->get();

        return $result->row();
    }

    public function crearDoctor($data) {
        $datos = [
            "cpe" => $data["cpe"],
            "nombre" => $data["nombre"],
            "email" => $data["correo"],
            "direccion" => $data["direccion"],
            "telefono" => $data["telefono"],
            "perfil" => $data["perfil"],
            "estado" => "Activo",
            "usuario" => $this->session->userdata("nombre")
        ];
        $this->db->insert("doctores", $datos);
    }

    public function eliminarDoctores($id){
        $data = [
            "estado" => "Inactivo"
        ];
        $this->db->where("codigo_doctor", $id);
        $this->db->update("doctores", $data);
    }

    public function actualizarDoctor($data) {
        $datos = [
           "cpe" => $data["documento"], 
           "nombre" => $data["nombre"], 
           "email" => $data["correo"], 
           "direccion" => $data["direccion"], 
           "telefono" => $data["telefono"], 
           "perfil" => $data["perfil"], 
           "lunes" => $data["lunes"], 
           "martes" => $data["martes"], 
           "miercoles" => $data["miercoles"], 
           "jueves" => $data["jueves"], 
           "viernes" => $data["viernes"], 
           "sabado" => $data["sabado"], 
           "domingo" => $data["domingo"],

           "Horas_lunes" => $data["Horas_lunes"],
           "Horas_martes" => $data["Horas_martes"],
           "Horas_miercoles" => $data["Horas_miercoles"],
           "Horas_jueves" => $data["Horas_jueves"],
           "Horas_viernes" => $data["Horas_viernes"],
           "Horas_sabado" => $data["Horas_sabado"],
           "Horas_domingo" => $data["Horas_domingo"],

           //"desde" => $data["desde"],
           //"hasta" => $data["hasta"],
        ];
        $this->db->where("codigo_doctor ", $data["id"]);
        $this->db->update("doctores", $datos);
    }
}