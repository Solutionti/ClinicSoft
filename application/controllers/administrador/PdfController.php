<?php
header('Content-Type: text/html; charset=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {

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
        // Lista de ecografías en la barra lateral
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
     $pdf->SetFont('Arial', '', 8);
     $pdf->SetXY(10, 260);
     $pdf->Cell(190, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 1, 'C');
     $pdf->Cell(190, 5, ('TELÉFONO: 074322723 - CELULAR: 943037841'), 0, 1, 'C');
     
     // Logo de redes sociales
     //$pdf->Image("public/img/theme/facebook.png", 10, 270, 5, 5);
 
     $pdf->Output('I', 'ecografia_mama.pdf');
     exit;
 }
    //  $pdf->Output();
    //}

    // public function generarPdfHisterosonografia($dni) {
    //     $ecografia = $this->Ecografias_model->obtener_por_dni($dni);

    //     if (!$ecografia) {
    //         show_404();
    //         return;
    //     }

    //     $pdf = new Fpdf_lib();
    //     $pdf->AddPage();
    //     $pdf->SetFont('Arial', 'B', 16);
    //     $pdf->Cell(190, 10, 'Ecografía Histerosonografía', 0, 1, 'C');
    //     $pdf->Ln(10);

    //     // Información del paciente y médico
    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->Cell(50, 10, 'Doctor:', 0, 0);
    //     $pdf->Cell(140, 10, $ecografia->codigo_doctor, 0, 1);

    //     $pdf->Cell(50, 10, 'Fecha:', 0, 0);
    //     $pdf->Cell(140, 10, $ecografia->fecha, 0, 1);

    //     $pdf->Cell(50, 10, 'Hora:', 0, 0);
    //     $pdf->Cell(140, 10, $ecografia->hora, 0, 1);
    //     $pdf->Ln(5);

    //     // Motivo del examen
    //     $pdf->SetFont('Arial', 'B', 12);
    //     $pdf->Cell(50, 10, 'Motivo del Examen:', 0, 1);
    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->MultiCell(190, 10, $ecografia->motivo, 0, 'L');

    //     // Descripción del procedimiento
    //     $pdf->SetFont('Arial', 'B', 12);
    //     $pdf->Cell(50, 10, 'Descripción del Procedimiento:', 0, 1);
    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->MultiCell(190, 10, $ecografia->descripcionProcedimiento, 0, 'L');

    //     // Conclusiones
    //     $pdf->SetFont('Arial', 'B', 12);
    //     $pdf->Cell(50, 10, 'Conclusiones:', 0, 1);
    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->MultiCell(190, 10, $ecografia->conclusiones, 0, 'L');

    //     // Sugerencias
    //     $pdf->SetFont('Arial', 'B', 12);
    //     $pdf->Cell(50, 10, 'Sugerencias:', 0, 1);
    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->MultiCell(190, 10, $ecografia->sugerencias, 0, 'L');

    //     // Descargar el PDF con el DNI en el nombre
    //     $pdf->Output('D', 'Ecografia_Histerosonografia_'.$dni.'.pdf');
    // }
}
