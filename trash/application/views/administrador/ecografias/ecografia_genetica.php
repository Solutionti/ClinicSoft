<?php

$pdf = new FPDF();
$pdf->addpage();
$pdf->Image('public/img/theme/baby.png' , 4 ,11, 50 , 35,'png');

$pdf->SetFont('Times','',10);
$pdf->Ln(6);
$pdf->Cell(60,6,'', '', 0,'L', false );
$pdf->Cell(60,6,'CLINICA ENFOQUE SALUD Maternidad y Especialidades', '', 0,'L', false );
$pdf->Ln(8);
$pdf->Cell(80,6,'', '', 0,'L', false );
$pdf->Cell(1,6,'ECOGRAFIA GENETICA', '', 0,'L', false );
$pdf->SetFont('Times','',9);
$pdf->Ln(14);

$pdf->Ln(5);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(19,6,'PACIENTE:', '', 0,'L', false );
$pdf->Cell(115,6,"JERSON REINEL GALVEZ ENSUNCHO", '', 0,'L', false );

$pdf->Ln(5);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(13,6,'EDAD:', '', 0,'L', false );
$pdf->Cell(120,6,"28", '', 0,'L', false);

$pdf->Ln(5);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(36,6,'EXAMEN SOLICITADO:', '', 0,'L', false );
$pdf->Cell(115,6,"ECOGRAFIA GENETICA", '', 0,'L', false);

$pdf->Ln(5);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(34,6,'MEDICO TRATANTE:', '', 0,'L', false );
$pdf->Cell(120,6,"FELIX DIAZ", '', 0,'L', false);
$pdf->Ln(5);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(15,6,'FECHA:', '', 0,'L', false );
$pdf->Cell(120,6,date("d-m-Y"), '', 0,'L', false);
$pdf->Ln(11);
$pdf->SetFont('Times','B',9);
$pdf->Cell(40,6,'', '', 0,'L', false );

$pdf->Cell(27,6,'INFORME', '', 0,'L', false );
$pdf->SetFont('Times','', 9);

$pdf->Ln(8);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->MultiCell(130, 5,"FETO  UNICO ACTIVO EN SITUACION INDIFERENTE, LIQUIDO AMNIOTICO VOLUMEN NORMAL PARA LA EDAD GESTACIONAL PLACENTA ANTERIOR  GRADO 0", '', 'L', false);


$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(10,6,'LCR:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(10,6,'LCF:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(45,6,'ART UTERINA DERECHA IP:', '', 0,'L', false );
$pdf->Cell(50,6,"____ ", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(50,6,'ART UTERINARIA IZQUIERDA IP', '', 0,'L', false );
$pdf->Cell(10,6,'____', '', 0,'L', false );

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(25,6,'IP PROMEDIO', '', 0,'L', false );
$pdf->Cell(40,6,'____', '', 0,'L', false );


$pdf->Ln(8);
$pdf->SetFont('Times','B',9);
$pdf->Cell(40,6,'', '', 0,'L', false );

$pdf->Cell(27,6,'MARCADORES DE CROMOSOPATIAS', '', 0,'L', false );
$pdf->SetFont('Times','',9);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(40,6,'HUESO NASAL PRESENTE:', '', 0,'L', false );
$pdf->Cell(50,6,"____ ", '', 0,'L', false);
$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(40,6,'TRANSLUCENCIA NUCAL:', '', 0,'L', false );
$pdf->Cell(50,6,"____ ", '', 0,'L', false);
$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(46,6,'DUCTUS VENOSO TRIFASICA:', '', 0,'L', false );
$pdf->Cell(50,6,"____ ", '', 0,'L', false);

$pdf->SetFont('Times','B',9);
$pdf->Ln(10);
$pdf->Cell(40,6,'', '', 0,'L', false );

$pdf->Cell(26,6,'CONCLUSION:', '', 0,'L', false );
$pdf->SetFont('Times','',9);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->MultiCell(140, 5,"PRUEBA", '', 'L', false);
$pdf->Output();

?>