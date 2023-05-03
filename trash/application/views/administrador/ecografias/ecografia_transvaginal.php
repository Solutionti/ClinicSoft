<?php

$pdf = new FPDF();
$pdf->addpage();
$pdf->Image('public/img/theme/logo.png' , 10 ,9, 25 , 20,'png');

$pdf->SetFont('Times','',13);
$pdf->Ln(1);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(60,6,'CLINICA ENFOQUE SALUD Maternidad y Especialidades', '', 0,'L', false );
$pdf->Ln(8);
$pdf->Cell(70,6,'', '', 0,'L', false );
$pdf->Cell(1,6,'ECOGRAFIA TRANSVAGINAL', '', 0,'L', false );
$pdf->SetFont('Times','',9);
$pdf->Ln(15);

$pdf->Ln(5);
$pdf->Cell(19,6,'PACIENTE:', '', 0,'L', false );
$pdf->Cell(115,6,"JERSON REINEL GALVEZ ENSUNCHO", '', 0,'L', false );

$pdf->Ln(5);
$pdf->Cell(13,6,'EDAD:', '', 0,'L', false );
$pdf->Cell(120,6,"28", '', 0,'L', false);

$pdf->Ln(5);
$pdf->Cell(36,6,'EXAMEN SOLICITADO:', '', 0,'L', false );
$pdf->Cell(115,6,"ECOGRAFIA TRANSVAGINAL", '', 0,'L', false);

$pdf->Ln(5);
$pdf->Cell(34,6,'MEDICO TRATANTE:', '', 0,'L', false );
$pdf->Cell(120,6,"FELIX DIAZ", '', 0,'L', false);
$pdf->Ln(5);
$pdf->Cell(15,6,'FECHA:', '', 0,'L', false );
$pdf->Cell(120,6,date("d-m-Y"), '', 0,'L', false);
$pdf->Ln(13);
$pdf->SetFont('Times','B',9);
$pdf->Cell(27,6,'INFORME', '', 0,'L', false );
$pdf->SetFont('Times','',10);

$pdf->Ln(8);
$pdf->MultiCell(160, 5,"UTERO:  AQUI VA EL TEXTO  DE BORDES REGULARES Y PARENQUIMA HOMOGENEO.", '', 'L', false);

$pdf->Ln(6);
$pdf->MultiCell(160, 5,"ENDOMENTRO:  AQUI VA EL TEXTO  HOMOGENEO.", '', 'L', false);

$pdf->Ln(6);
$pdf->MultiCell(160, 5,"OVARIO DERECHO:  AQUI VA EL TEXTO  DE ASPECTO NORMAL.", '', 'L', false);

$pdf->Ln(6);
$pdf->MultiCell(160, 5,"OVARIO IZQUIERDO:  AQUI VA EL TEXTO  DE ASPECTO NORMAL.", '', 'L', false);

$pdf->Ln(6);
$pdf->MultiCell(160, 5,"FONDO DE SACO:  AQUI VA EL TEXTO  LIBRE.", '', 'L', false);

$pdf->SetFont('Times','B',9);
$pdf->Ln(10);
$pdf->Cell(26,6,'CONCLUSION:', '', 0,'L', false );
$pdf->SetFont('Times','',9);

$pdf->Ln(6);
$pdf->MultiCell(160, 5,"prueba", '', 'L', false);
$pdf->Output();

?>