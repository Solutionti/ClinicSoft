<?php

$pdf = new FPDF();
$pdf->addpage();
$pdf->Image('public/img/theme/logo.png' , 10 ,9, 25 , 20,'png');

$pdf->SetFont('Times','',13);
$pdf->Ln(1);
$pdf->Cell(40,6,'', '', 0,'L', false );
$pdf->Cell(60,6,'CLINICA ENFOQUE SALUD Maternidad y Especialidades', '', 0,'L', false );
$pdf->Ln(8);
$pdf->Cell(60,6,'', '', 0,'L', false );
$pdf->Cell(1,6,'ECOGRAFIA MORFOLOGICA', '', 0,'L', false );
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
$pdf->Cell(115,6,"ECOGRAFIA PELVICA - ABDOMINAL", '', 0,'L', false);

$pdf->Ln(5);
$pdf->Cell(34,6,'MEDICO TRATANTE:', '', 0,'L', false );
$pdf->Cell(120,6,"FELIX DIAZ", '', 0,'L', false);
$pdf->Ln(5);
$pdf->Cell(15,6,'FECHA:', '', 0,'L', false );
$pdf->Cell(120,6,date("d-m-Y"), '', 0,'L', false);
$pdf->Ln(13);
$pdf->SetFont('Times','B',9);
$pdf->Cell(27,6,'INFORME', '', 0,'L', false );
$pdf->SetFont('Times','', 9);

$pdf->Ln(8);
$pdf->MultiCell(160, 5,"CABEZA:   FORMA , ENCEFALO, VENTRICULO..... CEREBELO: ____ mm CISTERNA: ____ mm ATRIO VENTICULAR ___ mm", '', 'L', false);

$pdf->Ln(3);
$pdf->MultiCell(160, 5,"CARA: PERFIL Y FOSAS NASALES ", '', 'L', false);

$pdf->Ln(3);
$pdf->MultiCell(160, 5,"CUELLO: NO MASAS", '', 'L', false);

$pdf->Ln(3);
$pdf->MultiCell(160, 5,"TORAX: PULMONES Y CORAZON DE TAMAÑOS EDECUADOS", '', 'L', false);

$pdf->Ln(3);
$pdf->MultiCell(160, 5,"CORAZON: TAMAÑO, FECUENCIA CARDIACA 4 CAMARAS Y EJE CARDIACO NORMALES SALIDA DE AORTA", '', 'L', false);

$pdf->Ln(3);
$pdf->MultiCell(160, 5,"COLUMNA VERTEBRAL: DE ASPECTO NORMAL EN LOS PLANOS SAGITAL", '', 'L', false);

$pdf->Ln(3);
$pdf->MultiCell(160, 5,"ABDOMEN: PARED NORMAL ESTOMAGO PRESENTE RIÑOES NORMALES", '', 'L', false);

$pdf->Ln(3);
$pdf->MultiCell(160, 5,"EXTREMIDADES: APARENTE MENTE NORMALES", '', 'L', false);
$pdf->Ln(5);
$pdf->SetFont('Times','B',9);
$pdf->Cell(27,6,'BIOMETRIA FETAL', '', 0,'L', false );
$pdf->SetFont('Times','',9);

$pdf->Ln(6);
$pdf->Cell(10,6,'DBP:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);
$pdf->Cell(33,6,'PONDERADO FETAL:', '', 0,'L', false );
$pdf->Cell(120,6,"____ mm", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(10,6,'CC:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);
$pdf->Cell(10,6,'LCF:', '', 0,'L', false );
$pdf->Cell(120,6,"____ x min", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(10,6,'CA:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);
$pdf->Cell(10,6,'PLACENTA CORPORAL POSTERIOR GRADO 0', '', 0,'L', false );
$pdf->Cell(120,6,"", '', 0,'L', false);

$pdf->Ln(6);
$pdf->Cell(10,6,'LF:', '', 0,'L', false );
$pdf->Cell(50,6,"____ mm", '', 0,'L', false);
$pdf->Cell(10,6,'LA ADECUADO PARA EDAD GESTACIONAL', '', 0,'L', false );
$pdf->Cell(120,6,"", '', 0,'L', false);

$pdf->Ln(8);
$pdf->SetFont('Times','B',9);
$pdf->Cell(27,6,'DOPPLER ARTERIAS URINARIAS (IP)', '', 0,'L', false );
$pdf->SetFont('Times','',9);

$pdf->Ln(6);
$pdf->Cell(22,6,'DERECHA:', '', 0,'L', false );
$pdf->Cell(50,6,"____ ", '', 0,'L', false);
$pdf->Ln(6);
$pdf->Cell(22,6,'IZQUIERDA:', '', 0,'L', false );
$pdf->Cell(50,6,"____ ", '', 0,'L', false);

$pdf->SetFont('Times','B',9);
$pdf->Ln(10);
$pdf->Cell(26,6,'CONCLUSION:', '', 0,'L', false );
$pdf->SetFont('Times','',9);

$pdf->Ln(6);
$pdf->MultiCell(160, 5,"PRUEBA", '', 'L', false);
$pdf->Output();

?>