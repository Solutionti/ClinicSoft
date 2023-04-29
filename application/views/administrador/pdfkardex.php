<?php
$productos = $producto->result()[0];

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
$pdf->Cell(60,6,'INFORME MOVIMIENTO DE KARDEX', '', 0,'L', false );
$pdf->SetFont('Times','B',9);
$pdf->Ln(14);
$pdf->Cell(60,6,'FECHA', 1, 0,'C', false );
$pdf->Cell(134,6,'RESPONSABLE', 1, 0,'L', false );

$pdf->SetFont('Times','',9);
$pdf->Ln(6);
$pdf->Cell(60,6,"CONSULTA ".$fecha1." - ".$fecha2, 1, 0,'C', false );
$pdf->Cell(134,6,$this->session->userdata("nombre")." ".$this->session->userdata("apellido"), 1, 0,'L', false );
$pdf->SetFont('Arial', 'B', 11);
$pdf->Ln(12);
$pdf->Cell(1,6,'', '', 0,'L', false );
$pdf->Cell(70,6,'MOVIMIENTOS DE KARDEX DEL PRODUCTO '.strtoupper($productos->nombre) , '', 0,'L', false );
$pdf->SetFont('Times','B',9);
foreach($kardex->result() as $kardexs) {
$pdf->Ln(6);
$pdf->Cell(20,6,'TIPO', 1, 0,'L', false );
$pdf->Cell(50,6,'MOTIVO', 1, 0,'L', false );
$pdf->Cell(35,6,'FECHA', 1, 0,'L', false );
$pdf->Cell(24,6,'ENTRADA', 1, 0,'L', false );
$pdf->Cell(35,6,'SALIDA', 1, 0,'L', false );
$pdf->Cell(30,6,'USUARIO', 1, 0,'L', false );


$pdf->SetFont('Times','',9);
  $pdf->Ln();
  $pdf->Cell(20,6,$kardexs->tp_documento."".$kardexs->codigo_kardex, 1, 0,'L', false );
  $pdf->Cell(50,6,$kardexs->motivo, 1, 0,'L', false );
  $pdf->Cell(35,6,$kardexs->fecha, 1, 0,'L', false );
  $pdf->Cell(24,6,$kardexs->entrada, 1, 0,'L', false );
  $pdf->Cell(35,6,$kardexs->salida, 1, 0,'L', false );
  $pdf->Cell(30,6,$kardexs->usuario, 1, 0,'L', false );
  $pdf->Ln(8);
  $pdf->MultiCell(200, 5,"DESCRIPCION:  ".$kardexs->descripcion, '', '', false);
}
    

$pdf->Output();

?>
