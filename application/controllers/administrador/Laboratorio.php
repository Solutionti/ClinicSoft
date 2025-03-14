<?php



defined('BASEPATH') OR exit('No direct script access allowed');







class Laboratorio extends Admin_Controller {







    public function __construct() {



		parent::__construct();







		$this->load->model("Doctores_model");



		$this->load->model("Atencion_model");



		$this->load->model("Pagos_model");



		$this->load->model("Laboratorio_model");



	}







    public function index() {



        $laboratorios = $this->Laboratorio_model->getPreciosLaboratorio();



        $doctores = $this->Doctores_model->getDoctores();



        $data = ["doctor" => $doctores, "laboratorio" => $laboratorios];



        $this->load->view("administrador/laboratorio", $data);



    }







    public function CountLaboratorioId() {



		$result = $this->Laboratorio_model->CountLaboratorioId();



		$data = [



			"numero" => $result



		];



		echo  json_encode($data);



	}







    public function precioLaboratorio() {



        $laboratorios = $this->Laboratorio_model->getPreciosLaboratorio();







        $data = [



            "laboratorio" => $laboratorios



        ];



        $this->load->view("administrador/precio_laboratorio", $data);



    }







    public function pdfReciboLaboratorio($id) {



        



        $laboratorios = $this->Laboratorio_model->getLaboratoriPdf($id);



        $laboratorio = $laboratorios->result()[0];



        $servicios = $this->Laboratorio_model->getLaboratorioServicios($id);



        $this->load->library("pdf");



        $pdfAct = new Pdf();



        


        $this->load->library('PDF_UTF8');
        $pdf = new PDF_UTF8();



        $pdf->addpage();







        $pdf->Image('public/img/theme/logo.png' , 15,5, 20 , 17,'png');



        $pdf->Image('public/img/theme/zonac.png' , 40 ,5, 15 , 15,'png');



        $pdf->Ln();

        $pdf->SetFont('Times','B',11);

        $pdf->Ln(13);

        $pdf->Cell(20,5,'', '', 0,'L', false );

        $pdf->Cell(1,5,'Clinica', '', 0,'L', false );

        $pdf->Ln(5);

        $pdf->Cell(17,5,'', '', 0,'L', false );

        $pdf->Cell(1,5,'"Mi salud"', '', 0,'L', false );

        $pdf->Ln(5);

        $pdf->Cell(4,5,'', '', 0,'L', false );

        $pdf->Cell(7,5,'Av. Salaverry #1402 - Chiclayo', '', 0,'L', false );

        $pdf->Ln(2);

        $pdf->Cell(10,5,'_________________________________', '', 0,'L', false );

        $pdf->SetFont('Times','',8);

        $pdf->Ln(5);

        $pdf->Cell(8,5,'Fecha:', '', 0,'L', false );

        $pdf->Cell(25,5,date("d-m-Y"), '', 0,'L', false );

        $pdf->Cell(10,5,'Cajero:', '', 0,'L', false );

        $pdf->Cell(5,5,$this->session->userdata("nombre"), '', 0,'L', false );

        $pdf->Ln(5);

        $pdf->SetFont('Times','b',8);

        $pdf->Cell(7,5,'DNI:', '', 0,'L', false );

        $pdf->Cell(4,5,$laboratorio->dni_paciente, '', 0,'L', false ); 

        $pdf->Ln(5);

        $pdf->SetFont('Times','b',8);

        $pdf->Cell(15,5,'Contraseña:', '', 0,'L', false );

        $pdf->Cell(4,5,$laboratorio->password, '', 0,'L', false );

        $pdf->SetFont('Times','',8);

        $pdf->Ln(5);

        $pdf->Cell(1,5,utf8_decode($laboratorio->apellido." ".$laboratorio->nombre), '', 0,'L', false );

        $pdf->Ln(5);

        $pdf->Cell(10,5,'Celular:', '', 0,'L', false );

        $pdf->Cell(5,5,$laboratorio->telefono, '', 0,'L', false );

        $pdf->Ln(5);

        $pdf->Cell(10,5,'Doctor:', '', 0,'L', false );

        $pdf->Cell(5,5,utf8_decode($laboratorio->doctor), '', 0,'L', false );

        $pdf->Ln(5);

        $pdf->Cell(11,5,'Servicio:', '', 0,'L', false );

        $pdf->Cell(5,5,'Laboratorio', '', 0,'L', false );

        $pdf->SetFont('Times','',8);

        $pdf->Ln(5);

        foreach($servicios->result() as $servicio) {

          $pdf->MultiCell(55, 4,'* '. $servicio->nombre, '', 'L', false);   

        }

        $pdf->SetFont('Times','',8);

        $pdf->Ln(2);

        $pdf->Cell(1,5,'', '', 0,'L', false );

        $pdf->setFontSize(9);

        $pdf->Cell(43,5,'TOTAL : =============> S/.', '', 0,'L', false );

        $pdf->setFontSize(15);

        $pdf->Cell(20,5,$laboratorio->total, '', 0,'L', false );

        $pdf->setFontSize(8);

        $pdf->Cell(2,5,'', '', 0,'L', false );

        $pdf->Ln(2);

        $pdf->Cell(10,5,'_____________________________________________', '', 0,'L', false );

        $pdf->SetFont('Times','',8);

        $pdf->Ln(6);

        $pdf->Cell(6,5,'', '', 0,'L', false );

        $pdf->Cell(31,5,'Para consultar sus resultados medicos ingresa :', '', 0,'L', false );

        $pdf->Ln(4);

        $pdf->Cell(15,5,'', '', 0,'L', false );

        $pdf->Cell(10,5,'https://misalud.com/zonac', '', 0,'L', false );

        $pdf->Ln(4);

        $pdf->Cell(8,5,'', '', 0,'L', false );

        $pdf->Cell(25,5,'Ingrese su numero de DNI y Contraseña.', '', 0,'L', false );

        $pdf->Ln(4);

        $pdf->Cell(5,5,'', '', 0,'L', false );

        $pdf->Cell(25,5,'*Puede canjear este ticket por boleta o factura', '', 0,'L', false );

        $pdf->Output();


    }





    public function crearServicioLaboratorio() {



        $dni = $this->input->post("dni");

        $doctor = $this->input->post("doctor");

        $forma_pago = $this->input->post("forma_pago");

        $observacion = $this->input->post("observacion");

        $fecha = $this->input->post("fecha");

        $total = $this->input->post("total");

        $laboratorio = $this->input->post("laboratorio");



        $data = [

            "tipo_deposito" => $forma_pago,

            "dni" => $dni,

            "doctor" => $doctor,

            "observacion" => $observacion,

            "fecha" => $fecha,

            "total" => $total



        ];



        $detallelaboratorio = $this->Laboratorio_model->crearServicioLaboratorio($data);



        



        for($i=0; $i < sizeof($laboratorio); $i++){



           $data2 = [



               "id_laboratorio" => $detallelaboratorio,



               "servicio" => $laboratorio[$i],



               "fecha" => $fecha



           ];



           $this->Laboratorio_model->crearDetalleLaboratorio($data2);



        }



        $this->Atencion_model->CrearLineaTiempoLaboratorio($dni,'Laboratorio',$doctor);



        echo json_encode($detallelaboratorio);



    }







    public function subirDocumentoLaboratorio() {



        $paciente = $this->input->post("paciente");

		$titulo = $this->input->post("titulo");

        $fecha = date("dmY");

		$dir_subida = 'public/laboratorio/';

        $fichero_subido = $dir_subida.basename($paciente."-".$fecha."-".$_FILES['icono']['name']);



		move_uploaded_file($_FILES['icono']['tmp_name'], $fichero_subido);

			$datos = array(

				"paciente" => $paciente,

				"titulo" => $titulo,

				"icono" => $paciente."-".$fecha."-".$_FILES['icono']['name']

			);

		

		$this->Laboratorio_model->subirDocumentoLaboratorio($datos);



		redirect(base_url("administracion/historia/".$paciente));

    }



    public function createPrecioLaboratorio(){



        $servicio = $this->input->post("servicio");



        $precio = $this->input->post("precio");



        $data = [



         "servicio" => $servicio,



         "precio" => $precio



        ];



        $this->Laboratorio_model->createPrecioLaboratorio($data);



    }







    public function getDataPrecioLaboratorio($id) {



        $precios = $this->Laboratorio_model->getDataPrecioLaboratorio($id);







        echo json_encode($precios);



        



    }



    public function actualizarpreciosLaboratorio() {



        $id = $this->input->post("id");



        $especialidad = $this->input->post("especialidad");



        $precio = $this->input->post("precio");



        $estado = $this->input->post("estado");



        



        $data = [



            "id" => $id,



            "especialidad" => $especialidad,



            "precio" => $precio,



            "estado" => $estado,



        ];



        $this->Laboratorio_model->actualizarpreciosLaboratorio($data);



    }



}