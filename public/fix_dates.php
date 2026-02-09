<?php
$file = 'c:\xampp\htdocs\clinicsoft\application\controllers\administrador\PdfController.php';
$content = file_get_contents($file);

// Replace width 100 occurrences
// Match: $pdf->Cell(100, 6, $datosecografia->fecha, 0);
// Allowing for some whitespace variation
$pattern = '/(\$pdf->Cell\(100,\s*6,\s*)(\$datosecografia->fecha)(\s*,\s*0\);)/';
$replacement = '$1date("d/m/Y", strtotime($2))$3';

$new_content = preg_replace($pattern, $replacement, $content, -1, $count);

if ($new_content !== null) {
    file_put_contents($file, $new_content);
    echo "Replaced $count occurrences.";
} else {
    echo "Error in replacement.";
}
?>