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
$pdf->Cell(1,6,'ECOGRAFIA OBSTETRICA', '', 0,'L', false );
$pdf->SetFont('Times','',9);
$pdf->Ln(14);

$pdf->Ln(5);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(19,6,'PACIENTE:', '', 0,'L', false );
$pdf->Cell(115,6,"JERSON GALVEZ ", '', 0,'L', false );

$pdf->Ln(5);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(13,6,'EDAD:', '', 0,'L', false );
$pdf->Cell(120,6,"28", '', 0,'L', false);

$pdf->Ln(5);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(36,6,'EXAMEN SOLICITADO:', '', 0,'L', false );
$pdf->Cell(115,6,"ECOGRAFIA OBSTETRICA", '', 0,'L', false);

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
$pdf->MultiCell(130, 5,"FETO UNICO ACTIVO EN LONGITUD CEFALICO DERECHO MOVIMIENTOS RESPIRATORIOS Y CORPORALES PRESENTES", '', 'L', false);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );

$pdf->Cell(27,6,'TONO FETAL ADECUADO', '', 0,'L', false );
$pdf->SetFont('Times','',9);
$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(10,6,'DPB:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(10,6,'CC:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(10,6,'CA:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(10,6,'LF', '', 0,'L', false );
$pdf->Cell(20,6,'____ mm', '', 0,'L', false );


$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(10,6,'LCF', '', 0,'L', false );
$pdf->Cell(50,6,'____ LATIDOS POR MINUTO', '', 0,'L', false );
$pdf->Cell(10,6,'PESO', '', 0,'L', false );
$pdf->Cell(10,6,'____ gr', '', 0,'L', false );
 
$pdf->Ln(9);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(40,6,'PLACENTA ANTERIOR GRADO 1', '', 0,'L', false );
$pdf->Cell(50,6,"", '', 0,'L', false);
$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(40,6,'LA ADECUADO PARA LA EDAD GESTACIONAL (POZO MAYOR 42 mm)', '', 0,'L', false );
$pdf->Cell(50,6,"____ ", '', 0,'L', false);
$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(20,6,'PERCENTIL:', '', 0,'L', false );
$pdf->Cell(50,6,"____ %", '', 0,'L', false);

$pdf->SetFont('Times','B',9);
$pdf->Ln(10);
$pdf->Cell(40,6,'', '', 0,'L', false );

$pdf->Cell(26,6,'CONCLUSION:', '', 0,'L', false );
$pdf->SetFont('Times','',9);

$pdf->Ln(6);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->MultiCell(140, 5,"SE SUGIERE PARTO INSTITUCIONAL", '', 'L', false);
$pdf->Output();

?>