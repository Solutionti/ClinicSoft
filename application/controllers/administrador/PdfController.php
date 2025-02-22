<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ecografias_model'); // Cargar el modelo
        $this->load->library('fpdf_lib'); // Cargar la librería FPDF
    }

    public function generar_pdf_histerosonografia($dni) {
        $ecografia = $this->Ecografias_model->obtener_por_dni($dni);

        if (!$ecografia) {
            show_404();
            return;
        }

        $pdf = new Fpdf_lib();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, 'Ecografía Histerosonografía', 0, 1, 'C');
        $pdf->Ln(10);

        // Información del paciente y médico
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Doctor:', 0, 0);
        $pdf->Cell(140, 10, $ecografia->codigo_doctor, 0, 1);

        $pdf->Cell(50, 10, 'Fecha:', 0, 0);
        $pdf->Cell(140, 10, $ecografia->fecha, 0, 1);

        $pdf->Cell(50, 10, 'Hora:', 0, 0);
        $pdf->Cell(140, 10, $ecografia->hora, 0, 1);
        $pdf->Ln(5);

        // Motivo del examen
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Motivo del Examen:', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(190, 10, $ecografia->motivo, 0, 'L');

        // Descripción del procedimiento
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Descripción del Procedimiento:', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(190, 10, $ecografia->descripcionProcedimiento, 0, 'L');

        // Conclusiones
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Conclusiones:', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(190, 10, $ecografia->conclusiones, 0, 'L');

        // Sugerencias
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Sugerencias:', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(190, 10, $ecografia->sugerencias, 0, 'L');

        // Descargar el PDF con el DNI en el nombre
        $pdf->Output('D', 'Ecografia_Histerosonografia_'.$dni.'.pdf');
    }
}
