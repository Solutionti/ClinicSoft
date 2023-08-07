<?php

$reportes2 = $reporte2->result()[0];

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
$pdf->Cell(50,6,'', '', 0,'L', false );
$pdf->Cell(60,6,'INFORME DIARIO DE CIERRE DE CAJA', '', 0,'L', false );
$pdf->SetFont('Times','B',9);
$pdf->Ln(14);
$pdf->Cell(60,6,'FECHA Referencia', 1, 0,'C', false );
$pdf->Cell(134,6,'RESPONSABLE', 1, 0,'L', false );

$pdf->SetFont('Times','',9);
$pdf->Ln(6);
$pdf->Cell(60,6,$reportes2->fecha, 1, 0,'C', false );
$pdf->Cell(134,6,$this->session->userdata("nombre")." ".$this->session->userdata("apellido"), 1, 0,'L', false );
$pdf->SetFont('Arial', '', 11);
$pdf->Ln(9);
$pdf->Cell(1,6,'', '', 0,'L', false );
$pdf->Cell(70,6,'REPORTE DIARIO '.$reportes2->fecha, '', 0,'L', false );
$pdf->SetFont('Times','B',9);
$pdf->Ln(8);
$pdf->Cell(42,6,'PACIENTE', 1, 0,'L', false );
$pdf->Cell(10,6,'No', 1, 0,'L', false );
$pdf->Cell(60,6,'MEDICO', 1, 0,'L', false );
$pdf->Cell(35,6,'ESPECIALIDAD', 1, 0,'L', false );
//$pdf->Cell(20,6,'PAGO', 1, 0,'L', false );
$pdf->Cell(20,6,'INGRESOS', 1, 0,'L', false );
//$pdf->Cell(18,6,'EGRESOS', 1, 0,'L', false );

foreach ($reporte1->result() as $resportes1){
    $pdf->SetFont('Times','',9);
    $pdf->Ln(6);
    $pdf->Cell(42,6,$resportes1->apellido, 1, 0,'L', false );
    $pdf->Cell(10,6,$resportes1->codigo_pago, 1, 0,'L', false );
    $pdf->Cell(60,6,utf8_decode($resportes1->medico), 1, 0,'L', false );
    $pdf->Cell(35,6,utf8_decode($resportes1->descripcion), 1, 0,'L', false );
    //$pdf->Cell(20,6,$resportes1->tipo_deposito, 1, 0,'L', false );
    //$pdf->Cell(20,6,$resportes1->total, 1, 0,'L', false );
    $pdf->Cell(20,6,$resportes1->comision, 1, 0,'L', false );
    $pdf->SetFont('Times','B',9);
}

//$pdf->Ln(11);
//$pdf->Cell(54,6,'', 0,'', false );
//$pdf->Cell(82,6,'', 0,'', false );
//$pdf->Cell(20,6,'TOTAL', 1, 0,'', false );
//$pdf->Cell(38,6,$reportes2->total, 1, 0,'', false );
//$pdf->SetFont('Times','b',9);

$pdf->Ln(6);
$pdf->Cell(42,6,'', 0,'', false );
$pdf->Cell(10,6,'', 0,'', false );
$pdf->Cell(60,6,'', 0,'', false );
$pdf->Cell(35,6,'Total Doctor', 1, 0,'', false );
$pdf->Cell(20,6,$reportes2->comision, 1, 0,'', false );
$pdf->SetFont('Times','B',9);

//$caja = $reportes2->total - $reportes2->comision;
//$pdf->Ln(6);
//
//$pdf->Cell(54,6,'', 0,'', false );
//$pdf->Cell(82,6,'', 0,'', false );
//$pdf->Cell(20,6,'CAJA', 1, 0,'', false );
//$pdf->Cell(38,6,$caja, 1, 0,'', false );
//$pdf->SetFont('Times','',9);
//$pdf->Ln(5);
$pdf->Ln(6);
$pdf->Cell(30,6,'Impresion', 1, 0,'C', false );
$pdf->Cell(30,6,date('H:i A d-m-Y'), 1, 0,'C', false );


$pdf->Output();

?>
