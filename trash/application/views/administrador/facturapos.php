<?php
$atenciones = $atencion->result()[0];
$pdf=new FPDF();
$pdf->addpage();

$pdf->Image('public/img/theme/logo.png' , 24 ,5, 20 , 17,'png');
$pdf->Image('public/img/theme/web.png' , 24 ,95, 23 , 23,'png');

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
$pdf->Cell(18,5,date("d-m-Y"), '', 0,'L', false );
$pdf->Cell(5,5,$this->session->userdata("nombre"), '', 0,'L', false );

$pdf->Ln(4);
$pdf->Cell(7,5,'DNI:', '', 0,'L', false );
$pdf->Cell(4,5,$atenciones->documento, '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(1,5,utf8_decode($atenciones->apellido." ".$atenciones->nombre), '', 0,'L', false );

$pdf->Ln(4);
$pdf->Cell(12,5,'No HC:', '', 0,'L', false );
$pdf->Cell(5,5,$atenciones->hc, '', 0,'L', false );
if((($atenciones->orden__)*1)>0){
    $pdf->Ln(5);
    $pdf->Cell(29,5,'Orden de ATENCION:', '', 0,'L', false );
    $pdf->setFontSize(15);
    $pdf->Cell(5,5,$atenciones->orden__, '', 0,'L', false );
    $pdf->setFontSize(8);
    $pdf->Ln(1);
}

$pdf->Ln(5);
$pdf->Cell(18,5,'Especialidad:', '', 0,'L', false );

if($atenciones->especialidad == 1){
    $pdf->Cell(5,5,'Ginecologia', '', 0,'L', false );
}
else if ($atenciones->especialidad == 2){
    $pdf->Cell(5,5,'Medicina General ', '', 0,'L', false );
}
else if($atenciones->especialidad == 3){
    $pdf->Cell(5,5,'Infertilidad', '', 0,'L', false );
}
else if($atenciones->especialidad == 4){
    $pdf->Cell(5,5,'Dermatologia', '', 0,'L', false );
}
else if($atenciones->especialidad == 5) {
    $pdf->Cell(5,5,'Gine. Oncologia', '', 0,'L', false );
}
else if($atenciones->especialidad == 6) {
    $pdf->Cell(5,5,'Mastologia', '', 0,'L', false );
}
else if($atenciones->especialidad == 7){
    $pdf->Cell(5,5,'Ecografia transvaginal', '', 0,'L', false );

}
else if($atenciones->especialidad == 8){
    $pdf->Cell(5,5,'Pediatria', '', 0,'L', false );

}
$pdf->Ln(4);
$pdf->Cell(10,5,'Doctor:', '', 0,'L', false );
$pdf->Cell(5,5,utf8_decode($atenciones->doctor), '', 0,'L', false );

$pdf->SetFont('Times','',8);

$pdf->Ln(6);
$pdf->Cell(2,5,'', '', 0,'L', false );
$pdf->Cell(25,5,' RECARGATE DE ENERGIA POSITIVA ', '', 0,'L', false );
$pdf->Ln(5);
$pdf->Cell(1,5,'', '', 0,'L', false );
$pdf->Cell(25,5,'Para consultar sus resultados medicos ingresar', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(5,5,'', '', 0,'L', false );
$pdf->Cell(10,5,'www.clinicaenfoquesalud.com/zonac', '', 0,'L', false );
$pdf->Ln(4);
$pdf->Cell(3,5,'', '', 0,'L', false );
$pdf->Cell(25,5,'Digitar su numero de DNI y Contraseña', '', 0,'L', false );
$pdf->Ln(5);
$pdf->Cell(11,5,'', '', 0,'L', false );
$pdf->Cell(25,5,'www.clinicaenfoquesalud.com', '', 0,'L', false );
$pdf->Output();

?>
