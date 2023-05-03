<?php


$pdf=new FPDF();
$pdf->addpage();
$pdf->Image('public/img/theme/logo.png' , 10 ,9, 25 , 20,'png');
$pdf->SetFont('Times','',13);
$pdf->Ln(1);
$pdf->Cell(65,6,'', '', 0,'L', false );
$pdf->Cell(60,6,'"CLINICA ENFOQUE SALUD"', '', 0,'L', false );
$pdf->Ln(5);
$pdf->Cell(69,6,'', '', 0,'L', false );
$pdf->Cell(1,6,'Maternidad y Especialidades', '', 0,'L', false );
$pdf->Ln(5);
$pdf->Cell(71,6,'', '', 0,'L', false );
$pdf->Cell(7,6,'Calle Alfonso Ugarte #673', '', 0,'L', false );
$pdf->Ln(2);
$pdf->Cell(42,5,'', '', 0,'L', false );
$pdf->Cell(60,5,'_____________________________________________', '', 0,'L', false );
$pdf->SetFont('Times','b',13);
$pdf->Ln(10);
$pdf->Cell(45,6,'', '', 0,'L', false );
$pdf->Cell(60,6,'INFORME DE EXISTENCIA DE INVENTARIO', '', 0,'L', false );
$pdf->SetFont('Times','B',9);
$pdf->Ln(14);
$pdf->Cell(60,6,'FECHA', 1, 0,'C', false );
$pdf->Cell(134,6,'RESPONSABLE', 1, 0,'L', false );

$pdf->SetFont('Times','',9);
$pdf->Ln(6);
$pdf->Cell(60,6,date("d-m-Y"), 1, 0,'C', false );
$pdf->Cell(134,6,$this->session->userdata("nombre")." ".$this->session->userdata("apellido"), 1, 0,'L', false );
$pdf->SetFont('Arial', '', 11);
$pdf->Ln(9);
$pdf->Cell(1,6,'', '', 0,'L', false );
$pdf->Cell(70,6,'CONSULTA DE INVENTARIO DE FECHA '.date("d-m-Y"), '', 0,'L', false );
$pdf->SetFont('Times','B',9);
$pdf->Ln(8);
$pdf->Cell(20,6,'ID', 1, 0,'L', false );
$pdf->Cell(70,6,'PRODUCTO', 1, 0,'L', false );
$pdf->Cell(49,6,'PRECIO', 1, 0,'L', false );
$pdf->Cell(35,6,'STOCK', 1, 0,'L', false );
$pdf->Cell(20,6,'ESTADO', 1, 0,'L', false );


$pdf->SetFont('Times','',9);
foreach($inventario->result() as $inventarios) {
  $pdf->Ln(6);
  $pdf->Cell(20,6,$inventarios->codigo, 1, 0,'L', false );
  $pdf->Cell(70,6,$inventarios->nombre, 1, 0,'L', false );
  $pdf->Cell(49,6,$inventarios->precio, 1, 0,'L', false );
  $pdf->Cell(35,6,$inventarios->stock, 1, 0,'L', false );
  $pdf->Cell(20,6,$inventarios->estado, 1, 0,'L', false );
}


$pdf->Output();

?>
