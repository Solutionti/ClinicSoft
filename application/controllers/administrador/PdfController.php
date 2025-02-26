<?php
header('Content-Type: text/html; charset=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {

    private function fixText($texto) {
        return utf8_decode($texto);
    }

    
    public function __construct() {
        parent::__construct();
        $this->load->model('Ecografias_model'); // Cargar el modelo
    }

    public function getEcografiaMamaPdf($dni) {
      $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
      $datosecografia = $this->Ecografias_model->getEcografiaMamaPdf($dni)->result()[0];
    
      //documentar esta linea para que genere el pdf 
      //print_r($datosPaciente);
      //echo "<br><br><br><br>";
      //print_r($datosecografia);
    //   ********************************************

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false);

    $pdf->SetAlpha(0.1); // Transparencia (0.1 = 10% opacidad)
    $pdf->Image("public/img/theme/logo.png", 70, 90, 120); // Ajusta las coordenadas y tamaño según necesites
    $pdf->SetAlpha(1); // Restauramos la opacidad al 100%
        
     // Barra lateral izquierda con imágenes
     $pdf->SetFillColor(230,230,230);
     $pdf->Rect(10, 10, 50, 277, 'F'); // Barra lateral gris
     
     // Imágenes en la barra lateral
     $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
     $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
     $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
     
     // Lista de ecografías en la barra lateral
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(15, 140); // Ajustamos la coordenada X de 12 a 15 para más margen
    $listado = array(
        "Ecografía Morfológica",
        "Ecografía Genética",
        "Ecografía Obstétrica",
        "Ecografía Obstétrica Doppler",
        "Ecografía Seguimiento ",
        "Ovulatorio",
        "Ecografía Transvaginal",
        "Ecografía Obstétrica",
        "Ecografía Gemelar",
        "Ecografía 3D, 4D, 5D",
        "Ecografía de Mamas",
        "OTRAS ECOGRAFÍAS",  
        "Ecografía Partes Blandas",
        "Ecografía Abdominal",
        "Ecografía Tiroides",
        "Ecografía Pélvica"
    );

    $tituloOtras = false;
    
    foreach($listado as $item) {
        if($item == "OTRAS ECOGRAFÍAS") {
            $pdf->SetFont('Arial', 'B', 8);
            $tituloOtras = true;
        } else if($tituloOtras) {
            $pdf->SetFont('Arial', '', 8);
        }
        
        if($item != "") {
            // Ajustamos el ancho de la celda y la alineación
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            // Reseteamos la posición X para la siguiente línea
            $pdf->SetX(15);
        } else {
            $pdf->Cell(50, 4, "", 0, 1, 'L');
            $pdf->SetX(15);
        }
    }

    $pdf->Ln(5);

    // Agregamos las dos nuevas imágenes después de toda la lista
    $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
    $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);

     // Título
     $pdf->SetFont('Arial', 'B', 14);
     $pdf->SetXY(70, 10);
     $pdf->Cell(130, 10, 'ECOGRAFÍA DE MAMA', 0, 1, 'C');
     
     // Información del paciente
     $pdf->SetFont('Arial', 'B', 10);
     $pdf->SetXY(70, 30);
     $pdf->Cell(30, 6, 'PACIENTE:', 0);
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);
     
     $pdf->SetXY(70, 36);
     $pdf->SetFont('Arial', 'B', 10);
     $pdf->Cell(30, 6, 'DNI:', 0);
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(100, 6, $datosPaciente->documento, 0);
     
     $pdf->SetXY(70, 42);
     $pdf->SetFont('Arial', 'B', 10);
     $pdf->Cell(30, 6, 'EDAD:', 0);
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);
     
     $pdf->SetXY(70, 48);
     $pdf->SetFont('Arial', 'B', 10);
     $pdf->Cell(30, 6, 'FECHA:', 0);
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(100, 6, $datosecografia->fecha, 0);
     
     $pdf->SetXY(70, 54);
     $pdf->SetFont('Arial', 'B', 10);
     $pdf->Cell(30, 6, 'MÉDICO:', 0);
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);
 
     // MAMA IZQUIERDA
     $pdf->SetXY(70, 70);
     $pdf->SetFont('Arial', 'B', 10);
     $pdf->Cell(130, 6, 'MAMA IZQUIERDA:', 0, 1);
     
     $pdf->SetXY(70, 80);
     $pdf->Cell(30, 6, 'Pezón:', 0);
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(100, 6, $datosecografia->pezon_izq, 0);
    
    $pdf->SetXY(70, 86);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'TCSC:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->tcsc_izq, 0);
    
    $pdf->SetXY(70, 92);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'T. Glandular:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->tejido_glandular_izq, 0);
    
    $pdf->SetXY(70, 98);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'Axila:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->axila_izq, 0);

    // MAMA DERECHA
    $pdf->SetXY(70, 110);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(130, 6, 'MAMA DERECHA:', 0, 1);
    
    $pdf->SetXY(70, 120);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'Pezón:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->pezon_der, 0);
    
    $pdf->SetXY(70, 126);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'TCSC:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->tcsc_der, 0);
    
    $pdf->SetXY(70, 132);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'T. Glandular:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->tejido_glandular_der, 0);
    
    $pdf->SetXY(70, 138);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'Axila:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->axila_der, 0);

    // CONCLUSIÓN
    $pdf->SetXY(70, 150);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(130, 6, 'CONCLUSIÓN:', 0, 1);
    $pdf->SetXY(70, 156);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 6, $datosecografia->conclusion_mama, 0);

    // SUGERENCIAS
    $pdf->SetXY(70, 180);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    $pdf->SetXY(70, 186);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 6, $datosecografia->sugerencias_mama, 0);
 
     // Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 943037841', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);
 
     $pdf->Output('I', 'ecografia_mama.pdf');
     exit;
 }
//--------------------------------------------------------------------------------------------------------
public function getEcografiaGeneticaPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaGeneticaPdf($dni)->result()[0];

  $this->load->library('PDF_UTF8');
  $pdf = new PDF_UTF8();
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false);

// Marca de agua
    $pdf->SetAlpha(0.1);
    $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
    $pdf->SetAlpha(1);

    // Barra lateral izquierda con imágenes
    $pdf->SetFillColor(230,230,230);
    $pdf->Rect(10, 5, 50, 277, 'F');
    
    // Imágenes en la barra lateral
    $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
    $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
    $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
    
    // Lista de ecografías en la barra lateral
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(15, 140);
    $listado = array(
        "Ecografía Morfológica",
        "Ecografía Genética",
        "Ecografía Obstétrica",
        "Ecografía Obstétrica Doppler",
        "Ecografía Seguimiento",
        "Ovulatorio",
        "Ecografía Transvaginal",
        "Ecografía Obstétrica – Dopple",
        "Ecografía Gemelar",
        "Ecografía 3D, 4D, 5D",
        "Ecografía de Mamas",
        "",
        "OTRAS ECOGRAFÍAS",
        "Ecografía Partes Blandas",
        "Ecografía Abdominal",
        "Ecografía Tiroides",
        "Ecografía Pélvica"
    );

    foreach($listado as $item) {
        $pdf->Cell(50, 4, $item, 0, 1, 'L');
        $pdf->SetX(15);
    }

    // Imágenes adicionales en la barra lateral
    $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
    $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);

    // Título
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, 'ECOGRAFÍA GENÉTICA', 0, 1, 'C');
    
    // Información del paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30);
    $pdf->Cell(30, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);
    
    $pdf->SetXY(70, 36);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);
    
    $pdf->SetXY(70, 48);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->fecha, 0);
    
    $pdf->SetXY(70, 54);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);

    // HALLAZGOS FETALES
    $pdf->SetXY(70, 70);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'HALLAZGOS FETALES:', 0, 1);
    
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 80);
    $pdf->Cell(50, 6, 'Feto/Embrión:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->fetoembrion, 0);

    $pdf->SetXY(70, 86);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'Situación:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->situacion, 0);

    $pdf->SetXY(70, 92);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'Líquido Amniótico:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->liquidoAmniotico, 0);

    // MEDICIONES
    $pdf->SetXY(70, 104);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MEDICIONES:', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 114);
    $pdf->Cell(50, 6, 'Placenta:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->placenta . ' mm', 0);

    $pdf->SetXY(70, 120);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'LCR:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->lcr . ' mm', 0);

    $pdf->SetXY(70, 126);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'LCF:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->lcf . ' lpm', 0);

    // DOPPLER
    $pdf->SetXY(70, 138);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'ESTUDIO DOPPLER:', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 148);
    $pdf->Cell(50, 6, 'Art. Uterina Der:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->artUteder, 0);

    $pdf->SetXY(70, 154);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'Art. Uterina Izq:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->artUteizq, 0);

    $pdf->SetXY(70, 160);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'IP Promedio:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->ippromedio, 0);

    // MARCADORES
    $pdf->SetXY(70, 172);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MARCADORES:', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 182);
    $pdf->Cell(50, 6, 'Hueso Nasal:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->huesoNasal, 0);

    $pdf->SetXY(70, 188);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'Translucencia Nucal:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->translucenciaNucal . ' mm', 0);

    $pdf->SetXY(70, 194);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'Ductus Venoso:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $datosecografia->ductudVenosa, 0);

    // CONCLUSIÓN Y SUGERENCIAS
    $pdf->SetXY(70, 206);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'CONCLUSIÓN:', 0, 1);
    $pdf->SetXY(70, 213);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 6, $datosecografia->conclusion_mama, 0);

    $pdf->SetXY(70, 230);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    $pdf->SetXY(70, 237);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 6, $datosecografia->sugerencias_mama, 0);

    // Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 943037841', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_genetica.pdf');
    exit;
}

//-------------------------------------------------------------------------------------------------------
public function getEcografiaMorfologicaPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaMorfologicaPdf($dni)->result()[0];

  $this->load->library('PDF_UTF8');
  $pdf = new PDF_UTF8();
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false);

// Marca de agua
$pdf->SetAlpha(0.1);
$pdf->Image("public/img/theme/logo.png", 70, 90, 120);
$pdf->SetAlpha(1);

// Barra lateral izquierda con imágenes
$pdf->SetFillColor(230,230,230);
$pdf->Rect(10, 5, 50, 277, 'F');

// Imágenes en la barra lateral
$pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
$pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
$pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

// Lista de ecografías (igual que antes)
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15, 140);

$listado = array(
    "Ecografía Morfológica",
    "Ecografía Genética",
    "Ecografía Obstétrica",
    "Ecografía Obstétrica Doppler",
    "Ecografía Seguimiento",
    "Ovulatorio",
    "Ecografía Transvaginal",
    "Ecografía Obstétrica – Dopple",
    "Ecografía Gemelar",
    "Ecografía 3D, 4D, 5D",
    "Ecografía de Mamas",
    "",
    "OTRAS ECOGRAFÍAS",
    "Ecografía Partes Blandas",
    "Ecografía Abdominal",
    "Ecografía Tiroides",
    "Ecografía Pélvica"
);

foreach($listado as $item) {
    $pdf->Cell(50, 4, $item, 0, 1, 'L');
    $pdf->SetX(15);
}

// Imágenes adicionales en la barra lateral
$pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
$pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);

// Título
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetXY(70, 10);
$pdf->Cell(130, 10, 'ECOGRAFÍA MORFOLÓGICA', 0, 1, 'C');

// Información del paciente
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 30);
$pdf->Cell(30, 6, 'PACIENTE:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);

$pdf->SetXY(70, 36);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'DNI:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->documento, 0);

$pdf->SetXY(70, 42);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'EDAD:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);

$pdf->SetXY(70, 48);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'FECHA:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->fecha, 0);

$pdf->SetXY(70, 54);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'MÉDICO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);

// EVALUACIÓN MORFOLÓGICA (comenzamos en 70)
$pdf->SetXY(70, 70);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'EVALUACIÓN MORFOLÓGICA:', 0, 1);

// Situación (a 80)
$pdf->SetXY(70, 80);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'Situación:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->situacion, 0);

// CABEZA Y SNC (a 90)
$pdf->SetXY(70, 90);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'CABEZA Y SISTEMA NERVIOSO CENTRAL:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 97);
$pdf->MultiCell(130, 5, 'Forma y estructura: ' . $datosecografia->formacabeza, 0);

$pdf->SetXY(70, 107);
$pdf->Cell(60, 6, 'Cerebelo: ' . $datosecografia->cerebelo . ' mm', 0);
$pdf->SetXY(140, 107);
$pdf->Cell(60, 6, 'Cisterna Magna: ' . $datosecografia->cisternaMagna . ' mm', 0);

// CARA Y CUELLO (a 117)
$pdf->SetXY(70, 117);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'CARA Y CUELLO:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 130);
$pdf->MultiCell(130, 5, 'Perfil facial: ' . $datosecografia->perfilCara, 0);

$pdf->SetXY(70, 125);
$pdf->MultiCell(130, 5, 'Cuello: ' . $datosecografia->cuello, 0);

// TÓRAX Y CORAZÓN (a 144)
$pdf->SetXY(70, 136);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'TÓRAX Y CORAZÓN:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 142);
$pdf->MultiCell(130, 5, 'Perfil torácico: ' . ($datosecografia->perfiltorax), 0);

$pdf->SetXY(70, 147);
$pdf->MultiCell(130, 5, 'Evaluación cardíaca: ' . ($datosecografia->corazon), 0);

// ABDOMEN Y COLUMNA (a 176)
$pdf->SetXY(70, 165);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'ABDOMEN Y COLUMNA VERTEBRAL:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 170);
$pdf->MultiCell(130, 5, 'Abdomen: ' . $datosecografia->abdomen, 0);

$pdf->SetXY(70, 185);
$pdf->MultiCell(130, 5, 'Columna vertebral: ' . $datosecografia->columnaVertebral, 0);

// BIOMETRÍA FETAL (a 208)
$pdf->SetXY(70, 190);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(160, 5, "BIOMETRÍA FETAL:", 0, 1, 'L');

$pdf->SetX(70);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(160, 5, "SEXO: " . $datosecografia->sexo, 0, 1, 'L');

// Datos biométricos (comenzando en 218)
$pdf->SetX(70);
$pdf->Cell(80, 5, "DBP: " . $datosecografia->dbp . " mm", 0, 0, 'L');
$pdf->Cell(80, 5, "CC: " . $datosecografia->cc . " mm", 0, 1, 'L');

$pdf->SetX(70);
$pdf->Cell(80, 5, "CA: " . $datosecografia->ca . " mm", 0, 0, 'L');
$pdf->Cell(80, 5, "LF: " . $datosecografia->lf . " mm", 0, 1, 'L');

$pdf->SetX(70);
$pdf->Cell(80, 5, "LCF: " . $datosecografia->lcf . " lpm", 0, 0, 'L');
$pdf->Cell(80, 5, "Peso estimado: " . $datosecografia->ponderadoFetal . " g", 0, 1, 'L');

// COMENTARIOS Y CONCLUSIONES (a 238)
$pdf->SetXY(70, 215);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'COMENTARIOS:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 220);
$pdf->MultiCell(130, 5, $datosecografia->comentario, 0);

$pdf->SetXY(70, 232);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 240);
$pdf->MultiCell(130, 5, $datosecografia->conclusiones, 0);


// Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 943037841', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

$pdf->Output('I', 'ecografia_morfologica.pdf');
exit;

}

public function getEcografiaTrasvaginalPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaTrasvaginalPdf($dni)->result()[0];

       //documentar esta linea para que genere el pdf 
        //print_r($datosPaciente);
      //  echo "<br><br><br><br>";
      // print_r($datosecografia);
    //   

  $this->load->library('PDF_UTF8');
  $pdf = new PDF_UTF8();
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false);

// Marca de agua
$pdf->SetAlpha(0.1);
$pdf->Image("public/img/theme/logo.png", 70, 90, 120);
$pdf->SetAlpha(1);

// Barra lateral izquierda con imágenes
$pdf->SetFillColor(230,230,230);
$pdf->Rect(10, 5, 50, 277, 'F');

// Imágenes en la barra lateral
$pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
$pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
$pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

// Lista de ecografías (igual que antes)
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15, 140);

$listado = array(
    "Ecografía Morfológica",
    "Ecografía Genética",
    "Ecografía Obstétrica",
    "Ecografía Obstétrica Doppler",
    "Ecografía Seguimiento",
    "Ovulatorio",
    "Ecografía Transvaginal",
    "Ecografía Obstétrica – Dopple",
    "Ecografía Gemelar",
    "Ecografía 3D, 4D, 5D",
    "Ecografía de Mamas",
    "",
    "OTRAS ECOGRAFÍAS",
    "Ecografía Partes Blandas",
    "Ecografía Abdominal",
    "Ecografía Tiroides",
    "Ecografía Pélvica"
);

foreach($listado as $item) {
    $pdf->Cell(50, 4, $item, 0, 1, 'L');
    $pdf->SetX(15);
}

// Título
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetXY(70, 10);
$pdf->Cell(130, 10, 'ECOGRAFIA TRASVAGINAL', 0, 1, 'C');

// Imágenes adicionales en la barra lateral
$pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
$pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);


// Información del paciente
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 30);
$pdf->Cell(30, 6, 'PACIENTE:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);

$pdf->SetXY(70, 36);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'DNI:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->documento, 0);

$pdf->SetXY(70, 42);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'EDAD:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);

$pdf->SetXY(70, 48);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'FECHA:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->fecha, 0);

$pdf->SetXY(70, 54);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'MÉDICO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);



// Información del paciente
// [código de información del paciente igual que antes]

// ÚTERO
$pdf->SetXY(70, 70);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'ÚTERO:', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 77);
$pdf->Cell(50, 6, 'Tipo:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->uteroTipo, 0);

$pdf->SetXY(70, 84);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Superficie:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->superficie, 0);

$pdf->SetXY(70, 91);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Medidas:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->uteroMedidas . ' x ' . $datosecografia->medidaUtero1 . ' x ' . $datosecografia->medidaUtero2 . ' mm', 0);

$pdf->SetXY(70, 98);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Miometrio:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->miometrio, 0);

$pdf->SetXY(70, 105);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Comentario:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->comentarioUtero, 0);

// ENDOMETRIO
$pdf->SetXY(70, 122);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'ENDOMETRIO:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 129);
$pdf->MultiCell(130, 5, $datosecografia->endometrio, 0);

// OVARIOS
$pdf->SetXY(70, 145);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'OVARIOS:', 0, 1);

// Ovario Derecho
$pdf->SetXY(70, 152);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Ovario Derecho:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->ovarioDer1 . ' x ' . $datosecografia->ovarioDer2 . ' mm', 0);

$pdf->SetXY(70, 159);
$pdf->MultiCell(130, 5, 'Comentario: ' . $datosecografia->comentarioOvarioDer, 0);

// Ovario Izquierdo
$pdf->SetXY(70, 171);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Ovario Izquierdo:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->ovarioIz1 . ' x ' . $datosecografia->ovarioIz2 . ' mm', 0);

$pdf->SetXY(70, 178);
$pdf->MultiCell(130, 5, 'Comentario: ' . $datosecografia->comentarioOvarioIzq, 0);

// OTROS HALLAZGOS
$pdf->SetXY(70, 190);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'OTROS HALLAZGOS:', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 197);
$pdf->Cell(50, 6, 'Fondo de Saco:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->fondosaco, 0);

$pdf->SetXY(70, 204);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Tumor Anexial:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->tumorAnexialCom, 0);

// CONCLUSIÓN Y SUGERENCIAS
$pdf->SetXY(70, 221);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'CONCLUSIÓN:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 228);
$pdf->MultiCell(130, 5, $datosecografia->conclusion, 0);

$pdf->SetXY(70, 245);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 252);
$pdf->MultiCell(130, 5, $datosecografia->sugerencias, 0);


// Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 943037841', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

$pdf->Output('I', 'ecografia_trasvaginal.pdf');
exit;


}

public function getEcografiaPelvicaPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaPelvicaPdf($dni)->result()[0];

  $this->load->library('PDF_UTF8');
  $pdf = new PDF_UTF8();
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false);

  // Marca de agua
$pdf->SetAlpha(0.1);
$pdf->Image("public/img/theme/logo.png", 70, 90, 120);
$pdf->SetAlpha(1);

// Barra lateral izquierda con imágenes
$pdf->SetFillColor(230,230,230);
$pdf->Rect(10, 5, 50, 277, 'F');

// Imágenes en la barra lateral
$pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
$pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
$pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

// Lista de ecografías (igual que antes)
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15, 140);

$listado = array(
    "Ecografía Morfológica",
    "Ecografía Genética",
    "Ecografía Obstétrica",
    "Ecografía Obstétrica Doppler",
    "Ecografía Seguimiento",
    "Ovulatorio",
    "Ecografía Transvaginal",
    "Ecografía Obstétrica – Dopple",
    "Ecografía Gemelar",
    "Ecografía 3D, 4D, 5D",
    "Ecografía de Mamas",
    "",
    "OTRAS ECOGRAFÍAS",
    "Ecografía Partes Blandas",
    "Ecografía Abdominal",
    "Ecografía Tiroides",
    "Ecografía Pélvica"
);

foreach($listado as $item) {
    $pdf->Cell(50, 4, $item, 0, 1, 'L');
    $pdf->SetX(15);
}


// Imágenes adicionales en la barra lateral
$pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
$pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);

  // Título
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->SetXY(70, 10);
  $pdf->Cell(130, 10, ('ECOGRAFÍA PÉLVICA'), 0, 1, 'C');

// Información del paciente
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 30);
$pdf->Cell(30, 6, 'PACIENTE:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);

$pdf->SetXY(70, 36);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'DNI:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->documento, 0);

$pdf->SetXY(70, 42);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'EDAD:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);

$pdf->SetXY(70, 48);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'FECHA:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->fecha, 0);

$pdf->SetXY(70, 54);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'MÉDICO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);

// ÚTERO
$pdf->SetXY(70, 70);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, ('ÚTERO:'), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 77);
$pdf->Cell(50, 6, 'Tipo:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->utero_tipo, 0);

$pdf->SetXY(70, 84);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Superficie:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->superficie, 0);

$pdf->SetXY(70, 91);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Medidas:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->utero_medidas . ' x ' . $datosecografia->medida_utero1 . ' x ' . $datosecografia->medida_utero2 . ' mm', 0);

$pdf->SetXY(70, 98);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Miometrio:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->miometrio, 0);

$pdf->SetXY(70, 105);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Comentario:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->comentario_utero, 0);

// ENDOMETRIO
$pdf->SetXY(70, 122);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'ENDOMETRIO:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 129);
$pdf->MultiCell(130, 5, $datosecografia->endometrio, 0);

// OVARIOS
$pdf->SetXY(70, 145);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'OVARIOS:', 0, 1);

// Ovario Derecho
$pdf->SetXY(70, 152);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Ovario Derecho:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->ovario_der1 . ' x ' . $datosecografia->ovario_der2 . ' mm', 0);

$pdf->SetXY(70, 159);
$pdf->MultiCell(130, 5, 'Comentario: ' . $datosecografia->comentario_ovario_der, 0);

// Ovario Izquierdo
$pdf->SetXY(70, 171);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Ovario Izquierdo:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->ovario_iz1 . ' x ' . $datosecografia->ovario_iz2 . ' mm', 0);

$pdf->SetXY(70, 178);
$pdf->MultiCell(130, 5, 'Comentario: ' . $datosecografia->comentario_ovario_izq, 0);

// OTROS HALLAZGOS
$pdf->SetXY(70, 190);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'OTROS HALLAZGOS:', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 197);
$pdf->Cell(50, 6, 'Fondo de Saco:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->fondosaco, 0);

$pdf->SetXY(70, 204);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Tumor Anexial:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->tumor_anexial_com, 0);

// CONCLUSIÓN Y SUGERENCIAS
$pdf->SetXY(70, 221);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, $this->fixText('CONCLUSIÓN:'), 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 228);
$pdf->MultiCell(130, 5, $datosecografia->conclusion, 0);

$pdf->SetXY(70, 245);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 252);
$pdf->MultiCell(130, 5, $datosecografia->sugerencias, 0);


// Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 943037841', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

$pdf->Output('I', 'ecografia_pelvica.pdf');
exit;


}

public function getEcografiaObstetricaPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaObstetricaPdf($dni)->result()[0];

       //documentar esta linea para que genere el pdf 
       //print_r($datosPaciente);
       //echo "<br><br><br><br>";
     //print_r($datosecografia);
    //   

  $this->load->library('PDF_UTF8');
  $pdf = new PDF_UTF8();
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false);

  // Marca de agua
$pdf->SetAlpha(0.1);
$pdf->Image("public/img/theme/logo.png", 70, 90, 120);
$pdf->SetAlpha(1);

// Barra lateral izquierda con imágenes
$pdf->SetFillColor(230,230,230);
$pdf->Rect(10, 5, 50, 277, 'F');

// Imágenes en la barra lateral
$pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
$pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
$pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

// Lista de ecografías (igual que antes)
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15, 140);

$listado = array(
    "Ecografía Morfológica",
    "Ecografía Genética",
    "Ecografía Obstétrica",
    "Ecografía Obstétrica Doppler",
    "Ecografía Seguimiento",
    "Ovulatorio",
    "Ecografía Transvaginal",
    "Ecografía Obstétrica – Dopple",
    "Ecografía Gemelar",
    "Ecografía 3D, 4D, 5D",
    "Ecografía de Mamas",
    "",
    "OTRAS ECOGRAFÍAS",
    "Ecografía Partes Blandas",
    "Ecografía Abdominal",
    "Ecografía Tiroides",
    "Ecografía Pélvica"
);

foreach($listado as $item) {
    $pdf->Cell(50, 4, $item, 0, 1, 'L');
    $pdf->SetX(15);
}


// Imágenes adicionales en la barra lateral
$pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
$pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);


$pdf->SetFont('Arial', 'B', 14);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA OBSTÉTRICA'), 0, 1, 'C');

// Información del paciente
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 30);
$pdf->Cell(30, 6, 'PACIENTE:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);

$pdf->SetXY(70, 36);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'DNI:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->documento, 0);

$pdf->SetXY(70, 42);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'EDAD:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);

$pdf->SetXY(70, 48);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'FECHA:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->fecha, 0);

$pdf->SetXY(70, 54);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'MÉDICO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);

// EVALUACIÓN FETAL
$pdf->SetXY(70, 70);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, ('EVALUACIÓN FETAL:'), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 77);
$pdf->Cell(50, 6, 'Feto/Embrión:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->fetoembrion, 0);

$pdf->SetXY(70, 84);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, ('Situación:'), 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->situacion, 0);

$pdf->SetXY(70, 91);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Estado Fetal:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->estadoFeto, 0);

// BIOMETRÍA FETAL
$pdf->SetXY(70, 110);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, ('BIOMETRÍA FETAL:'), 0, 1);

// Primera fila
$pdf->SetFont('Arial', '', 10);
$pdf->SetX(70);
$pdf->Cell(65, 6, 'DBP: ' . $datosecografia->dpb . ' mm', 0, 0, 'L');
$pdf->Cell(65, 6, 'CC: ' . $datosecografia->cc . ' mm', 0, 1, 'L');

// Segunda fila
$pdf->SetX(70);
$pdf->Cell(65, 6, 'CA: ' . $datosecografia->ca . ' mm', 0, 0, 'L');
$pdf->Cell(65, 6, 'LF: ' . $datosecografia->lf . ' mm', 0, 1, 'L');

// Tercera fila
$pdf->SetX(70);
$pdf->Cell(65, 6, 'LCF: ' . $datosecografia->lcf . ' lpm', 0, 0, 'L');
$pdf->Cell(65, 6, 'Minutos: ' . $datosecografia->min, 0, 1, 'L');

// OTROS HALLAZGOS
$pdf->SetXY(70, 140);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'OTROS HALLAZGOS:', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 147);
$pdf->Cell(50, 6, 'Placenta:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->placenta . ' mm', 0);

$pdf->SetXY(70, 154);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, ('Líquido Amniótico:'), 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->ila, 0);

$pdf->SetXY(70, 167);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Percentil:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->percentil, 0);

// RECOMENDACIONES
$pdf->SetXY(70, 180);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'TIPO DE PARTO:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 187);
$pdf->MultiCell(130, 5, $datosecografia->tipoParto, 0);

// CONCLUSIÓN Y SUGERENCIAS
$pdf->SetXY(70, 200);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, ('CONCLUSIÓN:'), 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 207);
$pdf->MultiCell(130, 5, $datosecografia->conclusion, 0);

$pdf->SetXY(70, 225);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 232);
$pdf->MultiCell(130, 5, $datosecografia->sugerencia, 0);

// Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 943037841', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

$pdf->Output('I', 'ecografia_obstetrica.pdf');
exit;

}

public function getEcografiaAbdominalPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaAbdominalPdf($dni)->result()[0];

       //documentar esta linea para que genere el pdf 
       
       //print_r($datosPaciente);
       //echo "<br><br><br><br>";
    //  print_r($datosecografia);
    //   

  $this->load->library('PDF_UTF8');
  $pdf = new PDF_UTF8();
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false);

  // Marca de agua
$pdf->SetAlpha(0.1);
$pdf->Image("public/img/theme/logo.png", 70, 90, 120);
$pdf->SetAlpha(1);

// Barra lateral izquierda con imágenes
$pdf->SetFillColor(230,230,230);
$pdf->Rect(10, 5, 50, 277, 'F');

// Imágenes en la barra lateral
$pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
$pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
$pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

// Lista de ecografías (igual que antes)
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15, 140);

$listado = array(
    "Ecografía Morfológica",
    "Ecografía Genética",
    "Ecografía Obstétrica",
    "Ecografía Obstétrica Doppler",
    "Ecografía Seguimiento",
    "Ovulatorio",
    "Ecografía Transvaginal",
    "Ecografía Obstétrica – Dopple",
    "Ecografía Gemelar",
    "Ecografía 3D, 4D, 5D",
    "Ecografía de Mamas",
    "",
    "OTRAS ECOGRAFÍAS",
    "Ecografía Partes Blandas",
    "Ecografía Abdominal",
    "Ecografía Tiroides",
    "Ecografía Pélvica"
);

foreach($listado as $item) {
    $pdf->Cell(50, 4, $item, 0, 1, 'L');
    $pdf->SetX(15);
}


// Imágenes adicionales en la barra lateral
$pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
$pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);


$pdf->SetFont('Arial', 'B', 14);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA ABDOMINAL'), 0, 1, 'C');

// Información del paciente
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 30);
$pdf->Cell(30, 6, 'PACIENTE:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);

$pdf->SetXY(70, 36);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'DNI:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->documento, 0);

$pdf->SetXY(70, 42);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'EDAD:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);

$pdf->SetXY(70, 48);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'FECHA:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->fecha, 0);

$pdf->SetXY(70, 54);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'MÉDICO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);

// MOTIVO
$pdf->SetXY(70, 60);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'MOTIVO DE EXAMEN:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 67);
$pdf->MultiCell(130, 5, $datosecografia->motivo, 0);

// HALLAZGOS
$pdf->SetXY(70, 80);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'HALLAZGOS:', 0, 1);

// Estómago
$pdf->SetXY(70, 87);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'ESTÓMAGO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->estomago, 0);

// Hígado
$pdf->SetXY(70, 100);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'HÍGADO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->higado, 0);

// Vesícula
$pdf->SetXY(70, 113);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'VESÍCULA:', 0, 1);

$pdf->SetX(70);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65, 6, 'Volumen: ' . $datosecografia->vesicula_volumen, 0, 1);
$pdf->SetX(70);
$pdf->Cell(65, 6, 'Paredes: ' . $datosecografia->vesicula_paredes, 0, 1);
$pdf->SetX(70);
$pdf->Cell(65, 6, 'Colédoco: ' . $datosecografia->coledoco_diametro . ' mm', 0, 1);

// Bazo
$pdf->SetXY(70, 138);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'BAZO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->bazo, 0);

// Riñones
$pdf->SetXY(70, 150);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'RIÑONES:', 0, 1);

$pdf->SetX(70);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65, 6, 'Derecho: ' . $datosecografia->rinon_derecho, 0, 1);
$pdf->SetX(70);
$pdf->Cell(65, 6, 'Izquierdo: ' . $datosecografia->rinon_izquierdo, 0, 1);

// Otros Hallazgos
$pdf->SetXY(70, 170);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 6, 'OTROS HALLAZGOS:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 177);
$pdf->MultiCell(130, 5, $datosecografia->otros_hallazgos, 0);

// Conclusiones
$pdf->SetXY(70, 195);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 202);
$pdf->MultiCell(130, 5, $datosecografia->conclusiones, 0);

// Sugerencias
$pdf->SetXY(70, 220);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 227);
$pdf->MultiCell(130, 5, $datosecografia->sugerencias, 0);

// Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 943037841', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

$pdf->Output('I', 'ecografia_abdominal.pdf');
exit;

}

}









