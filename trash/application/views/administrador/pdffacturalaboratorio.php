<?php

$pdf=new FPDF();
$pdf->addpage();

$pdf->Image('public/img/theme/logo.png' , 24 ,5, 20 , 17,'png');
$pdf->Image('public/img/theme/zonac.png' , 28 ,107, 15 , 15,'png');

$pdf->SetFont('Times','',8);
$pdf->Ln(13);
$pdf->Cell(7,5,'', '', 0,'L', false );
$pdf->Cell(1,5,'CLINICA ENFOQUE SALUD', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(10,5,'', '', 0,'L', false );
$pdf->Cell(1,5,'Maternidad y Especialidades', '', 0,'L', false );
$pdf->Ln(5);
$pdf->Cell(4,5,'', '', 0,'L', false );
$pdf->Cell(7,5,'Calle Alfonso Ugarte #673', '', 0,'L', false );
$pdf->Ln(2);
$pdf->Cell(10,5,'____________________________________', '', 0,'L', false );
$pdf->SetFont('Times','',8);

$pdf->Ln(5);
$pdf->Cell(8,5,'Fecha:', '', 0,'L', false );
$pdf->Cell(5,5,date("d-m-Y"), '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(7,5,'DNI:', '', 0,'L', false );
$pdf->Cell(4,5,'1110542802', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(1,5,'Galvez Ensuncho Jerson', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(10,5,'Celular:', '', 0,'L', false );
$pdf->Cell(5,5,'3227659534', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(12,5,'Doctor:', '', 0,'L', false );
$pdf->Cell(5,5,'Diaz Vasquez Feliz', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(11,5,'Servicio:', '', 0,'L', false );
$pdf->Cell(5,5,'Laboratorio', '', 0,'L', false );
$pdf->SetFont('Times','b',8);
$pdf->Ln(6);
$pdf->Cell(4,5,'', '', 0,'L', false );
$pdf->Cell(5,5,'* ACIDO LACTICO', '', 0,'L', false );

$pdf->Ln(4);
$pdf->Cell(4,5,'', '', 0,'L', false );
$pdf->Cell(5,5,'* ALDOSTERONA ', '', 0,'L', false );

$pdf->Ln(4);
$pdf->Cell(4,5,'', '', 0,'L', false );
$pdf->Cell(5,5,'* ALBUMINA SERICA ', '', 0,'L', false );

$pdf->SetFont('Times','',8);
$pdf->Ln(6);
$pdf->Cell(2,5,'', '', 0,'L', false );
$pdf->Cell(25,5,' RECARGATE DE ENERGIA POSITIVA ', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(13,5,'', '', 0,'L', false );
$pdf->Cell(40,5,'PROXIMAMENTE', '', 0,'L', false );
$pdf->Ln(5);
$pdf->Cell(1,5,'', '', 0,'L', false );
$pdf->Cell(25,5,'Para consultar sus resultados medicos ingresar', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(5,5,'', '', 0,'L', false );
$pdf->Cell(10,5,'www.clinicaenfoquesalud.com/resultados', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(3,5,'', '', 0,'L', false );
$pdf->Cell(25,5,'Digitar su numero de historia mas su DNI', '', 0,'L', false );
$pdf->Ln(6);
$pdf->Cell(11,5,'', '', 0,'L', false );
$pdf->Cell(25,5,'www.clinicaenfoquesalud.com', '', 0,'L', false );
$pdf->Output();

?>
