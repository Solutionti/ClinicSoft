<?php

$atenciones = $atencion->result()[0];

$pdf=new FPDF();

$pdf->addpage();

$pdf->Image('public/img/theme/logo.png' , 28 ,5, 20 , 17,'png');

$pdf->Image('public/img/theme/web.png' , 28 ,86, 23 , 23,'png');

$pdf->SetFont('Times','B',11);

$pdf->Ln(13);

$pdf->Cell(23,5,'', '', 0,'L', false );

$pdf->Cell(1,5,'Clinica', '', 0,'L', false );

$pdf->Ln(4);

$pdf->Cell(20,5,'', '', 0,'L', false );

$pdf->Cell(1,5,'"Mi salud"', '', 0,'L', false );

$pdf->Ln(5);

$pdf->Cell(7,5,'', '', 0,'L', false );

$pdf->Cell(9,5,'Av. Salaverry #1402 - Chiclayo', '', 0,'L', false );

$pdf->Ln(2);

$pdf->Cell(10,5,'_________________________________', '', 0,'L', false );

$pdf->SetFont('Times','',8);

$pdf->Ln(5);

$pdf->Cell(8,5,'Fecha:', '', 0,'L', false );

$pdf->Cell(25,5,date("d-m-Y"), '', 0,'L', false );

$pdf->Cell(10,5,'Cajero:', '', 0,'L', false );

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

    $pdf->setFontSize(14);

    $pdf->Cell(5,5,$atenciones->orden__, '', 0,'L', false );

    $pdf->setFontSize(8);

    $pdf->Ln(1);

}



$pdf->Ln(4);

$pdf->Cell(12,5,'Servcio:', '', 0,'L', false );

$pdf->Cell(5,5,utf8_decode($atenciones->descripcion), '', 0,'L', false );

$pdf->Ln(4);

$pdf->Cell(10,5,'Doctor:', '', 0,'L', false );

$pdf->Cell(5,5,utf8_decode($atenciones->doctor), '', 0,'L', false );

$pdf->SetFont('Times','',8);

$pdf->Ln(5);

$pdf->Cell(1,5,'', '', 0,'L', false );

$pdf->setFontSize(10);

$pdf->Cell(48,5,'TOTAL : =============> S/.', '', 0,'L', false );

$pdf->setFontSize(15);

$pdf->Cell(20,5,$atenciones->costo, '', 0,'L', false );

$pdf->setFontSize(8);

$pdf->Ln(2);

$pdf->Cell(10,5,'_____________________________________________', '', 0,'L', false );

$pdf->SetFont('Times','',8);

$pdf->Ln(5);

$pdf->Cell(1,5,'', '', 0,'L', false );

$pdf->Cell(25,5,'*Puede canjear este ticket por boleta o factura', '', 0,'L', false );

$pdf->Ln(5);

$pdf->Cell(11,5,'', '', 0,'L', false );

$pdf->Cell(25,5,'www.clinicamisaludcix.com', '', 0,'L', false );

$pdf->Output();



?>



