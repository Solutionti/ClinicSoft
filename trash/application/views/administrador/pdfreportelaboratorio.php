<?php

$totales = $total->result()[0];
$pdf=new FPDF();
$pdf->addpage();
$pdf->Image('public/img/theme/logo.png' , 10 ,9, 25 , 20,'png');
$pdf->SetFont('Times','',13);
$pdf->Ln(1);
$pdf->Cell(65,6,'', '', 0,'L', false );
$pdf->Cell(60,6,'CLINICA ENFOQUE SALUD', '', 0,'L', false );
$pdf->Ln(5);
$pdf->Cell(72,6,'', '', 0,'L', false );
$pdf->Cell(1,6,'Maternidad y Especialidades', '', 0,'L', false );
$pdf->Ln(5);
$pdf->Cell(60,6,'', '', 0,'L', false );
$pdf->Cell(7,6,'Calle Alfonso Ugarte #673', '', 0,'L', false );
$pdf->Ln(2);
$pdf->Cell(42,5,'', '', 0,'L', false );
$pdf->Cell(60,5,'_____________________________________________', '', 0,'L', false );
$pdf->SetFont('Times','b',13);
$pdf->Ln(10);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(60,6,'INFORME LABORATORIO DE CIERRE DE CAJA', '', 0,'L', false );
$pdf->SetFont('Times','B',9);
$pdf->Ln(14);
$pdf->Cell(60,6,'FECHA', 1, 0,'C', false );
$pdf->Cell(134,6,'RESPONSABLE', 1, 0,'L', false );

$pdf->SetFont('Times','',9);
$pdf->Ln(6);
$pdf->Cell(60,6,$totales->fecha, 1, 0,'C', false );
$pdf->Cell(134,6,$this->session->userdata("nombre")." ".$this->session->userdata("apellido"), 1, 0,'L', false );
$pdf->SetFont('Arial', '', 11);
$pdf->Ln(9);
$pdf->Cell(1,6,'', '', 0,'L', false );
$pdf->Cell(70,6,'REPORTE DIARIO ', '', 0,'L', false );
$pdf->SetFont('Times','B',9);
$pdf->Ln(8);
$pdf->Cell(10,6,'No', 1, 0,'L', false );
$pdf->Cell(42,6,'PACIENTE', 1, 0,'L', false );
$pdf->Cell(107,6,'ESPECIALIDAD', 1, 0,'L', false );
$pdf->Cell(20,6,'PAGO', 1, 0,'L', false );
$pdf->Cell(15,6,'VALOR', 1, 0,'L', false );

$pdf->SetFont('Times','',9);
$numm = 1;
foreach($laboratorio->result() as $laboratorios) {
    $pdf->Ln(6);
    //$pdf->Cell(10,6,$laboratorios->codigo_pago_laboratorio  , 1, 0,'L', false );
    $pdf->Cell(10,6,$numm  , 1, 0,'L', false );
    $pdf->Cell(42,6,$laboratorios->apellido, 1, 0,'L', false );
    $pdf->Cell(107,6,$laboratorios->nombre, 1, 0,'L', false );
    $pdf->Cell(20,6,"Efectivo", 1, 0,'L', false );
    $pdf->Cell(15,6,$laboratorios->precio, 1, 0,'L', false );
    $numm = $numm + 1;
}
$pdf->SetFont('Times','B',9);

$pdf->Ln(11);
$pdf->Cell(54,6,'', 0,'', false );
$pdf->Cell(82,6,'', 0,'', false );
$pdf->Cell(20,6,'TOTAL', 1, 0,'', false );
$pdf->Cell(38,6,'S/ '. $totales->total, 1, 0,'', false );
$pdf->SetFont('Times','b',9);
$pdf->Output();

?>
