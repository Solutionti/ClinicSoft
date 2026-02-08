<?php
// Asegúrate de cargar la librería FPDF si no lo haces en el controlador
// require('fpdf/fpdf.php');

$colposcopias = $colposcopia[0]; // Tu objeto de datos

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 10); // Salto de página automático

// --- 1. ENCABEZADO Y LOGO ---
// Logo (Ajustado a la izquierda superior)
if(file_exists('public/img/theme/logo.png')){
    $pdf->Image('public/img/theme/logo.png', 10, 10, 25); 
}

// Título de la Clínica (Centrado)
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(0, 51, 102); // Azul oscuro corporativo
$pdf->Cell(0, 8, utf8_decode('"CLINICA MI SALUD"'), 0, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 5, utf8_decode('Av. Salaverry #1402'), 0, 1, 'C');
$pdf->Cell(0, 5, utf8_decode('Ginecología - Obstetricia - Colposcopía'), 0, 1, 'C');

// Línea decorativa
$pdf->Ln(2);
$pdf->SetDrawColor(0, 51, 102);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(5);

// TÍTULO DEL REPORTE
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 8, utf8_decode('INFORME DE COLPOSCOPÍA DIGITAL'), 0, 1, 'C');
$pdf->Ln(5);


// --- 2. DATOS DEL PACIENTE (En caja suave) ---
$pdf->SetFillColor(245, 245, 245); // Gris muy claro
$pdf->SetFont('Arial', 'B', 9);

// Cabeceras
$pdf->Cell(95, 6, 'PACIENTE', 1, 0, 'L', true);
$pdf->Cell(50, 6, 'DOCUMENTO', 1, 0, 'C', true);
$pdf->Cell(45, 6, 'FECHA', 1, 0, 'C', true);
$pdf->Ln();

// Datos
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(95, 7, utf8_decode($colposcopias->apellido . " " . $colposcopias->nombre), 1, 0, 'L');
$pdf->Cell(50, 7, $colposcopias->paciente, 1, 0, 'C');
$pdf->Cell(45, 7, date("d/m/Y", strtotime($colposcopias->fecha)), 1, 0, 'C');
$pdf->Ln(10);


// --- 3. HALLAZGOS MÉDICOS (Estilo Lista Limpia - SIN BORDES) ---
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(0, 51, 102);
$pdf->Cell(0, 8, utf8_decode('DETALLE DEL EXAMEN'), 0, 1, 'L');
$pdf->Line(10, $pdf->GetY(), 60, $pdf->GetY()); // Pequeña línea bajo el título
$pdf->Ln(3);

// Función auxiliar para imprimir filas limpias
function filaMedica($pdf, $titulo, $valor) {
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 6, utf8_decode($titulo), 0, 0, 'L'); // Etiqueta
    
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(50, 50, 50);
    $pdf->Cell(0, 6, utf8_decode(': ' . $valor), 0, 1, 'L'); // Valor
}

// Imprimimos los datos
filaMedica($pdf, 'U. Escamo Columnar', $colposcopias->escamo_columnar);
filaMedica($pdf, 'Hallazgos Cérvix', $colposcopias->hallazgos_cervix);
filaMedica($pdf, 'Vagina', $colposcopias->vagina);
filaMedica($pdf, 'Vulva', $colposcopias->vulva);
filaMedica($pdf, 'Perineo y Región Anal', $colposcopias->perineo_anal);
filaMedica($pdf, 'Biopsia Tomada', $colposcopias->biopsia);
filaMedica($pdf, 'Papanicolaou', $colposcopias->papanicolaou);

$pdf->Ln(5);


// --- 4. EVIDENCIA FOTOGRÁFICA (Dinámico y con Borde Rosado) ---
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(0, 51, 102);
$pdf->Cell(0, 8, utf8_decode('EVIDENCIA FOTOGRÁFICA'), 0, 1, 'L');
$pdf->Line(10, $pdf->GetY(), 60, $pdf->GetY());
$pdf->Ln(5);

// Configuración de fotos
$y_fotos = $pdf->GetY();
$ancho = 55; 
$alto = 45; // Un poco más rectangulares
$margen = 8;
$x_inicial = 15; // Para centrar el bloque de fotos

// COLOR DEL BORDE (El "Rosado Famygest": RGB 220, 53, 69)
$pdf->SetDrawColor(220, 53, 69);
$pdf->SetLineWidth(0.8); // Borde grueso elegante

// Foto 1
if (!empty($colposcopias->imagen1) && file_exists('public/colposcopia/'.$colposcopias->imagen1)) {
    $pdf->Image('public/colposcopia/'.$colposcopias->imagen1, $x_inicial, $y_fotos, $ancho, $alto);
    $pdf->Rect($x_inicial, $y_fotos, $ancho, $alto); // Borde
    
    // Etiqueta
    $pdf->SetXY($x_inicial, $y_fotos + $alto + 1);
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->SetTextColor(100, 100, 100);
    $pdf->Cell($ancho, 4, 'Sin Filtro (Basal)', 0, 0, 'C');
}

// Foto 2
if (!empty($colposcopias->imagen2) && file_exists('public/colposcopia/'.$colposcopias->imagen2)) {
    $x_pos = $x_inicial + $ancho + $margen;
    $pdf->Image('public/colposcopia/'.$colposcopias->imagen2, $x_pos, $y_fotos, $ancho, $alto);
    $pdf->Rect($x_pos, $y_fotos, $ancho, $alto); // Borde
    
    // Etiqueta
    $pdf->SetXY($x_pos, $y_fotos + $alto + 1);
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell($ancho, 4, utf8_decode('Con Ácido Acético'), 0, 0, 'C');
}

// Foto 3 (Si la agregaste a tu BD, descomenta esto)
if (!empty($colposcopias->imagen3) && file_exists('public/colposcopia/'.$colposcopias->imagen3)) {
    $x_pos = $x_inicial + ($ancho * 2) + ($margen * 2);
    $pdf->Image('public/colposcopia/'.$colposcopias->imagen3, $x_pos, $y_fotos, $ancho, $alto);
    $pdf->Rect($x_pos, $y_fotos, $ancho, $alto);
    
    $pdf->SetXY($x_pos, $y_fotos + $alto + 1);
    $pdf->Cell($ancho, 4, 'Test de Schiller (Lugol)', 0, 0, 'C');
}

// Mover cursor debajo de las fotos (Importante para que no se monte el texto)
$pdf->SetY($y_fotos + $alto + 10);


// --- 5. CONCLUSIONES ---
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(0, 51, 102);
$pdf->Cell(0, 8, utf8_decode('CONCLUSIONES Y PLAN'), 0, 1, 'L');
$pdf->Line(10, $pdf->GetY(), 60, $pdf->GetY());
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);
// MultiCell permite que el texto largo baje de línea automáticamente
$pdf->MultiCell(0, 6, utf8_decode($colposcopias->conclusiones), 0, 'L');


// --- 6. FIRMA DEL MÉDICO (Pie de página) ---
$pdf->Ln(25); // Espacio para firmar

$pdf->SetDrawColor(0, 0, 0); // Borde negro para la línea de firma
$pdf->SetLineWidth(0.2); // Línea fina
$pdf->Line(75, $pdf->GetY(), 135, $pdf->GetY()); // Línea centrada

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 5, utf8_decode($colposcopias->medico), 0, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, utf8_decode('CMP: ' . $colposcopias->cmp), 0, 1, 'C');

$pdf->Output();
?>