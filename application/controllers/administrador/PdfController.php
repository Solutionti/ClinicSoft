<?php
header('Content-Type: text/html; charset=UTF-8');
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {

    private function fixText($texto) {
        return ($texto);
    }

    
    public function __construct() {
        parent::__construct();
        $this->load->model('Ecografias_model'); // Cargar el modelo
    }

    public function getEcografiaMamaPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaMamaPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false); 

    // 1. BARRA LATERAL (INTOCABLE)
    $pdf->SetAlpha(0.1); 
    $pdf->Image("public/img/theme/logo.png", 70, 90, 120); 
    $pdf->SetAlpha(1); 
        
    $pdf->SetFillColor(230,230,230);
    $pdf->Rect(10, 10, 50, 277, 'F'); 
    
    $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
    $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
    $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
    
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(15, 140);
    $listado = array(
        "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
        "Ecografía Obstétrica Doppler", "Ecografía Seguimiento ", "Ovulatorio",
        "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
        "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "OTRAS ECOGRAFÍAS",  
        "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
    );

    $tituloOtras = false;
    foreach($listado as $item) {
        if($item == "OTRAS ECOGRAFÍAS") {
            $pdf->SetFont('Arial', 'B', 8); $tituloOtras = true;
        } else if($tituloOtras) {
            $pdf->SetFont('Arial', '', 8);
        }
        // SIN utf8_decode
        $pdf->Cell(50, 4, $item, 0, 1, 'L'); 
        $pdf->SetX(15);
    }

    $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
    $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);


    // 2. CONTENIDO DEL REPORTE (A partir de X=70)
    
    // TÍTULO
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    // SIN utf8_decode
    $pdf->Cell(130, 10, 'ECOGRAFÍA DE MAMA', 0, 1, 'C'); 

    // DATOS PACIENTE
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30);
    $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, $datosPaciente->apellido . ' ' . $datosPaciente->nombre, 0);

    $pdf->SetXY(70, 36);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, $datosPaciente->documento, 0);

    $pdf->SetXY(70, 42);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, $datosPaciente->edad . ' años', 0); // Ojo con la ñ de "años" aquí

    $pdf->SetXY(70, 48);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);

    $pdf->SetXY(70, 54);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 6, 'MÉDICO:', 0); // Tilde directa
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, $datosecografia->codigo_doctor, 0);

    // 3. COMPARATIVA LADO A LADO
    $y_inicio = 70;
    
    // --- COLUMNA IZQUIERDA ---
    $pdf->SetXY(70, $y_inicio);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(220, 53, 69); 
    $pdf->Cell(60, 8, 'MAMA IZQUIERDA', 0, 1, 'L');
    $pdf->SetTextColor(0,0,0);

    $pdf->SetX(70); $pdf->SetFont('Arial','B',9); $pdf->Cell(25,5,'Pezón:',0); 
    $pdf->SetFont('Arial','',9); $pdf->Cell(35,5, $datosecografia->pezon_izq, 0,1);
    
    $pdf->SetX(70); $pdf->SetFont('Arial','B',9); $pdf->Cell(25,5,'TCSC:',0); 
    $pdf->SetFont('Arial','',9); $pdf->Cell(35,5, $datosecografia->tcsc_izq, 0,1);

    $pdf->SetX(70); $pdf->SetFont('Arial','B',9); $pdf->Cell(25,5,'T.Glandular:',0); 
    $pdf->SetFont('Arial','',9); $pdf->Cell(35,5, $datosecografia->tejido_glandular_izq, 0,1);

    $pdf->SetX(70); $pdf->SetFont('Arial','B',9); $pdf->Cell(25,5,'Axila:',0); 
    $pdf->SetFont('Arial','',9); $pdf->Cell(35,5, $datosecografia->axila_izq, 0,1);

    $pdf->SetX(70); $pdf->SetFont('Arial','B',9); $pdf->Cell(60,5,'Hallazgos:',0,1);
    $pdf->SetX(70); $pdf->SetFont('Arial','',8); 
    $pdf->MultiCell(60, 4, utf8_encode($datosecografia->comentario_mama_izq), 0, 'L');
    $y_fin_izq = $pdf->GetY();


    // --- COLUMNA DERECHA ---
    $x_col2 = 135;
    $pdf->SetXY($x_col2, $y_inicio);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(13, 110, 253); 
    $pdf->Cell(60, 8, 'MAMA DERECHA', 0, 1, 'L');
    $pdf->SetTextColor(0,0,0);

    $pdf->SetX($x_col2); $pdf->SetFont('Arial','B',9); $pdf->Cell(25,5,'Pezón:',0); 
    $pdf->SetFont('Arial','',9); $pdf->Cell(35,5, $datosecografia->pezon_der, 0,1);
    
    $pdf->SetX($x_col2); $pdf->SetFont('Arial','B',9); $pdf->Cell(25,5,'TCSC:',0); 
    $pdf->SetFont('Arial','',9); $pdf->Cell(35,5, $datosecografia->tcsc_der, 0,1);

    $pdf->SetX($x_col2); $pdf->SetFont('Arial','B',9); $pdf->Cell(25,5,'T.Glandular:',0); 
    $pdf->SetFont('Arial','',9); $pdf->Cell(35,5, $datosecografia->tejido_glandular_der, 0,1);

    $pdf->SetX($x_col2); $pdf->SetFont('Arial','B',9); $pdf->Cell(25,5,'Axila:',0); 
    $pdf->SetFont('Arial','',9); $pdf->Cell(35,5, $datosecografia->axila_der, 0,1);

    $pdf->SetX($x_col2); $pdf->SetFont('Arial','B',9); $pdf->Cell(60,5,'Hallazgos:',0,1);
    $pdf->SetX($x_col2); $pdf->SetFont('Arial','',8);
    $pdf->MultiCell(60, 4, utf8_encode($datosecografia->comentario_der), 0, 'L');
    $y_fin_der = $pdf->GetY();

    // ==========================================
    // 4. BI-RADS, CONCLUSIONES Y SUGERENCIAS
    // ==========================================
    
    // Calculamos dónde terminaron las columnas
    $y_final = max($y_fin_izq, $y_fin_der) + 10;
    
    // --- 1. BI-RADS (AHORA VA PRIMERO) ---
    $pdf->SetXY(70, $y_final);
    
    // Estilo "Sello Médico": Texto rojo, negrita, sin caja gigante
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(220, 53, 69); // Rojo clínico
    
    // Imprimimos solo el texto limpio
    // Usamos utf8_encode por si viene de la BD
    $pdf->Cell(130, 6, 'CATEGORÍA: ' . utf8_encode($datosecografia->birads_final), 0, 1, 'L');
    
    $pdf->SetTextColor(0, 0, 0); // Volvemos a negro para el resto

    // --- 2. CONCLUSIÓN TEXTO (DEBAJO DEL BI-RADS) ---
    $pdf->Ln(2); // Pequeño espacio
    $pdf->SetX(70);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(130, 6, 'CONCLUSIÓN:', 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    // Texto de la conclusión
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusion_mama), 0, 'J');

    // --- 3. SUGERENCIAS ---
    $pdf->Ln(5);
    $pdf->SetX(70);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    // Texto de sugerencias
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->sugerencias_mama), 0, 'J');
    

    // 5. PIE DE PÁGINA
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, 'DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios', 0, 0, 'L');
    
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_mama.pdf');
    exit;


 }
//--------------------------------------------------------------------------------------------------------
public function getEcografiaGeneticaPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaGeneticaPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false);

    // 1. MARCA DE AGUA Y LOGO
    $pdf->SetAlpha(0.1);
    $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
    $pdf->SetAlpha(1);

    // 2. BARRA LATERAL (TU DISEÑO INTOCABLE)
    $pdf->SetFillColor(230,230,230);
    $pdf->Rect(10, 5, 50, 277, 'F');
    
    // Imágenes y lista lateral
    $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
    $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
    $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
    
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(15, 140);
    $listado = array(
        "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
        "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
        "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
        "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
        "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
    );

    foreach($listado as $item) {
        $pdf->Cell(50, 4, ($item), 0, 1, 'L');
        $pdf->SetX(15);
    }
    
    $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
    $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);

    // 3. ENCABEZADO Y DATOS PACIENTE
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA GENÉTICA (11-14 SEM)'), 0, 1, 'C');
    
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30);
    $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, ($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);
    
    $pdf->SetXY(70, 36);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0);
    
    $pdf->SetXY(70, 48);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
    
    $pdf->SetXY(70, 54);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 6, ('MÉDICO:'), 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(105, 6, ($datosecografia->codigo_doctor), 0);

    // ==========================================
    // 4. CUERPO DEL REPORTE (DISEÑO VERTICAL MEJORADO)
    // ==========================================
    
    // Función auxiliar para filas estandarizadas
    // $label: Título del campo (Azul)
    // $valor: Valor del paciente (Negro)
    function filaVertical($pdf, $y, $label, $valor) {
        $pdf->SetXY(70, $y);
        
        // Etiqueta en Azul Clínico
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(13, 110, 253); // Azul
        $pdf->Cell(50, 6, ($label), 0);
        
        // Valor en Negro
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0); // Negro
        $pdf->Cell(80, 6, ($valor), 0);
    }

    $y_cursor = 70; // Posición inicial

    // --- SECCIÓN: HALLAZGOS FETALES ---
    $pdf->SetXY(70, $y_cursor);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetFillColor(240, 240, 240); // Fondo gris suave para títulos
    $pdf->Cell(130, 8, ('  1. HALLAZGOS FETALES'), 0, 1, 'L', true);
    $y_cursor += 10;

    filaVertical($pdf, $y_cursor, 'Feto/Embrión:', $datosecografia->fetoembrion); $y_cursor += 6;
    filaVertical($pdf, $y_cursor, 'Situación:', $datosecografia->situacion); $y_cursor += 6;
    filaVertical($pdf, $y_cursor, 'Líquido Amniótico:', $datosecografia->liquidoAmniotico); $y_cursor += 10; // Espacio extra

    // --- SECCIÓN: BIOMETRÍA Y MEDICIONES ---
    $pdf->SetXY(70, $y_cursor);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 8, ('  2. MEDICIONES Y BIOMETRÍA'), 0, 1, 'L', true);
    $y_cursor += 10;

    filaVertical($pdf, $y_cursor, 'Placenta:', $datosecografia->placenta); $y_cursor += 6;
    filaVertical($pdf, $y_cursor, 'LCC (Longitud):', $datosecografia->lcc . ' mm'); $y_cursor += 6;
    filaVertical($pdf, $y_cursor, 'LCF (Latidos):', $datosecografia->lcf . ' lpm'); $y_cursor += 10;

    // --- SECCIÓN: ESTUDIO DOPPLER ---
    $pdf->SetXY(70, $y_cursor);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 8, ('  3. ESTUDIO DOPPLER (PREECLAMPSIA)'), 0, 1, 'L', true);
    $y_cursor += 10;

    filaVertical($pdf, $y_cursor, 'Art. Uterina Der:', $datosecografia->artUteder); $y_cursor += 6;
    filaVertical($pdf, $y_cursor, 'Art. Uterina Izq:', $datosecografia->artUteizq); $y_cursor += 6;
    
    // Resaltamos el IP Promedio
    $pdf->SetXY(70, $y_cursor);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(50, 6, 'IP Promedio:', 0);
    $pdf->SetFont('Arial', 'B', 10); // Negrita para el valor
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(80, 6, $datosecografia->ippromedio, 0); 
    $y_cursor += 10;

    // --- SECCIÓN: MARCADORES GENÉTICOS ---
    $pdf->SetXY(70, $y_cursor);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(220, 53, 69); // Rojo para esta sección crítica
    $pdf->Cell(130, 8, ('  4. MARCADORES CROMOSÓMICOS'), 0, 1, 'L', true);
    $pdf->SetTextColor(0,0,0); // Reset
    $y_cursor += 10;

    filaVertical($pdf, $y_cursor, 'Hueso Nasal:', $datosecografia->huesoNasal); $y_cursor += 6;
    filaVertical($pdf, $y_cursor, 'Translucencia Nucal:', $datosecografia->translucenciaNucal . ' mm'); $y_cursor += 6;
    filaVertical($pdf, $y_cursor, 'Ductus Venoso:', $datosecografia->ductudVenosa); $y_cursor += 6;
    // AGREGADO: Flujo Tricuspideo
    filaVertical($pdf, $y_cursor, 'Flujo Tricuspídeo:', $datosecografia->flujoTricuspideo); $y_cursor += 10;


    // --- CONCLUSIÓN Y SUGERENCIAS ---
    // Usamos MultiCell porque el texto puede ser largo
    $pdf->SetXY(70, $y_cursor);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 8, ('CONCLUSIÓN:'), 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    // CORREGIDO: variable 'conclusion' (no 'conclusion_mama')
    $pdf->MultiCell(130, 5, ($datosecografia->conclusion_mama), 0, 'J'); 
    
    $pdf->Ln(5);
    $pdf->SetX(70);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 8, 'SUGERENCIAS:', 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, ($datosecografia->sugerencias_mama), 0, 'J');


    // 5. PIE DE PÁGINA (TU DISEÑO INTOCABLE)
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');
    
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_genetica.pdf');
    exit;

}

//-------------------------------------------------------------------------------------------------------
public function getEcografiaMorfologicaPdf($dni) {
    // 1. Carga de Datos
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaMorfologicaPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); // Importante: Controlamos el salto manualmente

    // =========================================================
    // 2. DEFINIMOS LA PLANTILLA (Esto dibuja la barra lateral)
    // =========================================================
    // Usamos una función anónima para no repetir código
    $imprimirPlantilla = function($pdf) {
        // A. Marca de agua
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        // B. Barra lateral gris
        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');

        // C. Imágenes laterales
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        // D. Lista de ecografías
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            $pdf->SetX(15);
        }

        // E. Imágenes inferiores
        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. INICIO PÁGINA 1
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf); // <--- LLAMAMOS A LA PLANTILLA AQUÍ

    // ENCABEZADO Y DATOS (Solo en la página 1)
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA MORFOLÓGICA (20-24 SEM)'), 0, 1, 'C');

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);

    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);

    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0); // ñ simple

    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);

    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosecografia->codigo_doctor), 0);


    // =========================================================
    // 4. CUERPO DEL REPORTE
    // =========================================================
    $y = 70; // Cursor inicial

    // Definimos tu función auxiliar aquí dentro
    function itemMorpho($pdf, &$y, $label, $valor, $esLargo = false, $yaEsUTF8 = false) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(13, 110, 253); 
        $pdf->Cell(45, 6, $label, 0); 
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0); 
        
        $texto_final = ($yaEsUTF8) ? $valor : utf8_encode($valor);

        if ($esLargo) {
            $pdf->SetXY(115, $y); 
            $pdf->MultiCell(85, 5, $texto_final, 0, 'L');
            $y = $pdf->GetY() + 2; 
        } else {
            $pdf->Cell(85, 6, $texto_final, 0, 1);
            $y += 6;
        }
    }

    // --- BLOQUE 1 ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell(130, 7, '  1. DATOS GENERALES', 0, 1, 'L', true);
    $y += 8;

    itemMorpho($pdf, $y, 'Sexo Fetal:', $datosecografia->sexo, false, true);
    itemMorpho($pdf, $y, 'Situación:', $datosecografia->situacion, false, true);

    // --- BLOQUE 2 ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '  2. NEUROSONOGRAFÍA (CABEZA)', 0, 1, 'L', true);
    $y += 8;

    itemMorpho($pdf, $y, 'Cerebro/Cráneo:', $datosecografia->formacabeza, true);
    
    // Fila medidas
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(20, 6, 'Cerebelo:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(15, 6, $datosecografia->cerebelo . ' mm', 0);
    
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(22, 6, 'Cist. Magna:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(15, 6, $datosecografia->cisternaMagna . ' mm', 0);

    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(18, 6, 'Atrio V:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(15, 6, $datosecografia->atrioVentricular . ' mm', 0);
    $y += 6;
    
    itemMorpho($pdf, $y, 'Pliegue Nucal:', $datosecografia->pliegueNucal . ' mm');

    // --- BLOQUE 3 ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '  3. CARA, CUELLO Y TÓRAX', 0, 1, 'L', true);
    $y += 8;

    itemMorpho($pdf, $y, 'Perfil Facial:', $datosecografia->perfilCara, true);
    itemMorpho($pdf, $y, 'Cuello:', $datosecografia->cuello);
    itemMorpho($pdf, $y, 'Pulmones:', $datosecografia->perfiltorax, true);
    itemMorpho($pdf, $y, 'Corazón:', $datosecografia->corazon, true);

    // --- BLOQUE 4 ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '  4. ABDOMEN Y EXTREMIDADES', 0, 1, 'L', true);
    $y += 8;

    itemMorpho($pdf, $y, 'Abdomen:', $datosecografia->abdomen, true);
    itemMorpho($pdf, $y, 'Columna:', $datosecografia->columnaVertebral, true);
    itemMorpho($pdf, $y, 'Extremidades:', $datosecografia->extremidades, true);

    // --- BLOQUE 5 ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '  5. BIOMETRÍA Y PERFIL MATERNO', 0, 1, 'L', true);
    $y += 8;

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(10, 6, 'DBP:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(20, 6, $datosecografia->dbp . ' mm', 0);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(10, 6, 'CC:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(20, 6, $datosecografia->cc . ' mm', 0);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(10, 6, 'CA:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(20, 6, $datosecografia->ca . ' mm', 0);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(10, 6, 'LF:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(20, 6, $datosecografia->lf . ' mm', 0);
    $y += 6;

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(25, 6, 'Peso Fetal:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(35, 6, $datosecografia->ponderadoFetal . ' g', 0);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(15, 6, 'LCF:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(35, 6, $datosecografia->lcf . ' lpm', 0);
    $y += 6;

    itemMorpho($pdf, $y, 'Placenta/ILA:', $datosecografia->placenta_liquido, true);

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(220, 53, 69);
    $pdf->Cell(45, 6, 'Cervicometría:', 0);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(0);
    $pdf->Cell(85, 6, $datosecografia->cervicometria . ' mm', 0, 1);
    $y += 6;

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(25, 6, 'IP Ut. Der:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(15, 6, $datosecografia->ipder, 0);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(25, 6, 'IP Ut. Izq:', 0); $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $pdf->Cell(15, 6, $datosecografia->ipizq, 0);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(25, 6, 'IP Promedio:', 0); $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(0);
    $pdf->Cell(15, 6, $datosecografia->ip_promedio, 0);
    $y += 10;

    // =========================================================
    // 5. CONCLUSIÓN Y SALTO DE PÁGINA AUTOMÁTICO
    // =========================================================
    
    // Si nos queda poco espacio (menos de 40mm) y viene la conclusión...
    if ($y > 230) { 
        $pdf->AddPage(); // Agregamos página nueva
        $imprimirPlantilla($pdf); // <--- VOLVEMOS A DIBUJAR LA BARRA LATERAL
        $y = 30; // Reseteamos la altura Y para empezar arriba
    }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, ('CONCLUSIÓN:'), 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusiones), 0, 'J');

    // Pie de página (Solo en la última hoja)
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_morfologica.pdf');
    exit;
}

public function getEcografiaTrasvaginalPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaTrasvaginalPdf($dni)->result()[0]; // Asegúrate que tu modelo traiga los campos nuevos (ut_ap, ut_vol, etc.)

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. DEFINIMOS LA PLANTILLA (DISEÑO BASE)
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        // Marca de agua
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        // Barra lateral
        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');

        // Imágenes laterales
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        // Lista
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            $pdf->SetX(15);
        }

        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. PÁGINA 1 Y ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA TRANSVAGINAL'), 0, 1, 'C');

    // Datos Paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);

    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);

    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0);

    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);

    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosecografia->codigo_doctor), 0);


    // =========================================================
    // 4. CUERPO DEL REPORTE (VERTICAL)
    // =========================================================
    $y = 70;

    // Función auxiliar (Con interruptor de UTF8)
    function itemTV($pdf, &$y, $label, $valor, $esLargo = false, $yaEsUTF8 = false) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(13, 110, 253); // Azul
        $pdf->Cell(45, 6, $label, 0); 
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0); // Negro
        
        $texto_final = ($yaEsUTF8) ? $valor : utf8_encode($valor);

        if ($esLargo) {
            $pdf->SetXY(115, $y); 
            $pdf->MultiCell(85, 5, $texto_final, 0, 'L');
            $y = $pdf->GetY() + 2; 
        } else {
            $pdf->Cell(85, 6, $texto_final, 0, 1);
            $y += 6;
        }
    }

    // --- 1. ÚTERO ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell(130, 7, ('  1. EVALUACIÓN DEL ÚTERO'), 0, 1, 'L', true);
    $y += 8;

    itemTV($pdf, $y, 'Posición:', $datosecografia->uteroTipo, false, true); // true si viene del select
    itemTV($pdf, $y, 'Superficie:', $datosecografia->superficie, false, true);
    itemTV($pdf, $y, 'Miometrio:', $datosecografia->miometrio, false, true);
    
    // Dimensiones Uterinas (L x AP x T)
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(45, 6, 'Dimensiones:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
    // Armamos la cadena de medidas: 80 x 40 x 50 mm
    $dims = $datosecografia->ut_l . ' x ' . $datosecografia->ut_ap . ' x ' . $datosecografia->ut_t . ' mm';
    $pdf->Cell(85, 6, $dims, 0, 1);
    $y += 6;

    // Volumen Uterino (Resaltado)
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(45, 6, 'Volumen Uterino:', 0);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(0); // Negrita
    $pdf->Cell(85, 6, $datosecografia->ut_vol, 0, 1);
    $y += 6;

    itemTV($pdf, $y, 'Comentario:', $datosecografia->comentarioUtero, true);

    // Endometrio
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(220, 53, 69); // Rojo
    $pdf->Cell(45, 6, 'Endometrio:', 0);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(0);
    $pdf->Cell(85, 6, $datosecografia->endometrio_grosor . ' mm', 0, 1);
    $y += 10;


    // --- 2. OVARIOS ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '  2. OVARIOS (MEDIDAS Y VOLUMEN)', 0, 1, 'L', true);
    $y += 8;

    // Ovario Derecho
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(130, 6, 'OVARIO DERECHO:', 0, 1);
    $y += 6;
    
    // Medidas OD
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(0);
    $dims_od = 'Medidas: ' . $datosecografia->od_l . ' x ' . $datosecografia->od_ap . ' x ' . $datosecografia->od_t . ' mm';
    $pdf->Cell(80, 5, $dims_od, 0);
    // Volumen OD
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(15, 5, 'Vol:', 0); $pdf->SetTextColor(0);
    $pdf->Cell(35, 5, $datosecografia->od_vol, 0, 1);
    $y += 5;
    
    itemTV($pdf, $y, 'Descripción:', $datosecografia->comentarioOvarioDer, true);
    $y += 2; // Espacio extra

    // Ovario Izquierdo
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(130, 6, 'OVARIO IZQUIERDO:', 0, 1);
    $y += 6;
    
    // Medidas OI
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(0);
    $dims_oi = 'Medidas: ' . $datosecografia->oi_l . ' x ' . $datosecografia->oi_ap . ' x ' . $datosecografia->oi_t . ' mm';
    $pdf->Cell(80, 5, $dims_oi, 0);
    // Volumen OI
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(15, 5, 'Vol:', 0); $pdf->SetTextColor(0);
    $pdf->Cell(35, 5, $datosecografia->oi_vol, 0, 1);
    $y += 5;

    itemTV($pdf, $y, 'Descripción:', $datosecografia->comentarioOvarioIzq, true);
    $y += 8;


    // --- 3. FONDO DE SACO Y ANEXOS ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '  3. FONDO DE SACO Y ANEXOS', 0, 1, 'L', true);
    $y += 8;

    itemTV($pdf, $y, 'Fondo de Saco:', $datosecografia->fondosaco, true);
    
    // Tumor Anexial (Si tiene tumor, lo ponemos en rojo)
    if ($datosecografia->tiene_tumor == 'Si') {
        $pdf->SetTextColor(220, 53, 69);
    }
    itemTV($pdf, $y, 'Tumoración:', $datosecografia->tumorAnexialCom, true);
    $pdf->SetTextColor(0); // Reset color
    $y += 4;


    // =========================================================
    // 5. CONCLUSIÓN (CON SALTO DE PÁGINA INTELIGENTE)
    // =========================================================
    if ($y > 230) { 
        $pdf->AddPage(); 
        $imprimirPlantilla($pdf); 
        $y = 30; 
    }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, ('CONCLUSIÓN:'), 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusion), 0, 'J');

    $y = $pdf->GetY() + 5;

    // Sugerencias
    if ($y > 250) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->sugerencias), 0, 'J');


    // PIE DE PÁGINA
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, utf8_decode('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_trasvaginal.pdf');
    exit;


}

public function getEcografiaPelvicaPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaPelvicaPdf($dni)->result()[0]; // Asegúrate que tu modelo traiga 'replecion', 'ut_vol', etc.

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. DEFINIMOS LA PLANTILLA (DISEÑO BASE)
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        // Marca de agua
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        // Barra lateral
        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');

        // Imágenes laterales
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        // Lista
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            $pdf->SetX(15);
        }

        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. PÁGINA 1 Y ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA PÉLVICA'), 0, 1, 'C');

    // Datos Paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_encode($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);

    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);

    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0);

    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);

    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_encode($datosecografia->codigo_doctor), 0);


    // =========================================================
    // 4. CUERPO DEL REPORTE (VERTICAL)
    // =========================================================
    $y = 70;

    // Función auxiliar (Con interruptor de UTF8)
    function itemPelvic($pdf, &$y, $label, $valor, $esLargo = false, $yaEsUTF8 = false) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(13, 110, 253); // Azul
        $pdf->Cell(45, 6, $label, 0); 
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0); // Negro
        
        $texto_final = ($yaEsUTF8) ? $valor : utf8_encode($valor);

        if ($esLargo) {
            $pdf->SetXY(115, $y); 
            $pdf->MultiCell(85, 5, $texto_final, 0, 'L');
            $y = $pdf->GetY() + 2; 
        } else {
            $pdf->Cell(85, 6, $texto_final, 0, 1);
            $y += 6;
        }
    }

    // --- 1. VEJIGA (NUEVO BLOQUE) ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell(130, 7, ('  1. VEJIGA Y PREPARACIÓN'), 0, 1, 'L', true);
    $y += 8;

    itemPelvic($pdf, $y, 'Repleción:', $datosecografia->replecion, false, true); // true si viene del select
    itemPelvic($pdf, $y, 'Descripción:', $datosecografia->vejiga_desc, true);

    // --- 2. ÚTERO ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, ('  2. EVALUACIÓN DEL ÚTERO'), 0, 1, 'L', true);
    $y += 8;

    itemPelvic($pdf, $y, 'Posición:', $datosecografia->utero_tipo, false, true); 
    itemPelvic($pdf, $y, 'Superficie:', $datosecografia->superficie, false, true);
    itemPelvic($pdf, $y, 'Miometrio:', $datosecografia->miometrio, false, true);
    
    // Dimensiones Uterinas (L x AP x T)
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(45, 6, 'Dimensiones:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
    // Armamos la cadena de medidas
    $dims = $datosecografia->utero_medidas . ' x ' . $datosecografia->medida_utero1 . ' x ' . $datosecografia->medida_utero2 . ' mm';
    $pdf->Cell(85, 6, $dims, 0, 1);
    $y += 6;

    // Volumen Uterino (Resaltado)
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(45, 6, 'Volumen Uterino:', 0);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(0); // Negrita
    $pdf->Cell(85, 6, $datosecografia->ut_vol, 0, 1);
    $y += 6;

    itemPelvic($pdf, $y, 'Comentario:', $datosecografia->comentario_utero, true);

    // Endometrio
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(220, 53, 69); // Rojo
    $pdf->Cell(45, 6, 'Endometrio:', 0);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(0);
    $pdf->Cell(85, 6, $datosecografia->endometrio . ' mm', 0, 1);
    $y += 10;


    // --- 3. OVARIOS ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '  3. OVARIOS (MEDIDAS Y VOLUMEN)', 0, 1, 'L', true);
    $y += 8;

    // Ovario Derecho
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(130, 6, 'OVARIO DERECHO:', 0, 1);
    $y += 6;
    
    // Medidas OD
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(0);
    $dims_od = 'Medidas: ' . $datosecografia->ovario_der1 . ' x ' . $datosecografia->ovario_der2 . ' x ' . $datosecografia->ov_der_t . ' mm';
    $pdf->Cell(80, 5, $dims_od, 0);
    // Volumen OD
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(15, 5, 'Vol:', 0); $pdf->SetTextColor(0);
    $pdf->Cell(35, 5, $datosecografia->od_vol, 0, 1);
    $y += 5;
    
    itemPelvic($pdf, $y, 'Descripción:', $datosecografia->comentario_ovario_der, true);
    $y += 2; 

    // Ovario Izquierdo
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(130, 6, 'OVARIO IZQUIERDO:', 0, 1);
    $y += 6;
    
    // Medidas OI
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(0);
    $dims_oi = 'Medidas: ' . $datosecografia->ovario_iz1 . ' x ' . $datosecografia->ovario_iz2 . ' x ' . $datosecografia->ov_izq_t . ' mm';
    $pdf->Cell(80, 5, $dims_oi, 0);
    // Volumen OI
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(15, 5, 'Vol:', 0); $pdf->SetTextColor(0);
    $pdf->Cell(35, 5, $datosecografia->oi_vol, 0, 1);
    $y += 5;

    itemPelvic($pdf, $y, 'Descripción:', $datosecografia->comentario_ovario_izq, true);
    $y += 8;


    // --- 4. OTROS HALLAZGOS ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, '  4. OTROS HALLAZGOS', 0, 1, 'L', true);
    $y += 8;

    itemPelvic($pdf, $y, 'Fondo de Saco:', $datosecografia->fondosaco, true);
    
    // Tumor Anexial
    if ($datosecografia->tumoraxial == 'Si') { // Variable corregida
        $pdf->SetTextColor(220, 53, 69);
    }
    itemPelvic($pdf, $y, 'Tumoración:', $datosecografia->tumor_anexial_com, true);
    $pdf->SetTextColor(0); 
    $y += 4;


    // =========================================================
    // 5. CONCLUSIÓN (CON SALTO DE PÁGINA)
    // =========================================================
    if ($y > 230) { 
        $pdf->AddPage(); 
        $imprimirPlantilla($pdf); 
        $y = 30; 
    }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, ('CONCLUSIÓN:'), 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusion), 0, 'J');

    $y = $pdf->GetY() + 5;

    // Sugerencias
    if ($y > 250) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    
    $pdf->SetX(70);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->sugerencias), 0, 'J');


    // PIE DE PÁGINA
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, utf8_decode('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_pelvica.pdf');
    exit;



}

public function getEcografiaObstetricaPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaObstetricaPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. DEFINIMOS LA PLANTILLA (BARRA LATERAL)
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);
        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');
        // Imágenes laterales...
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
        // Lista de ecografías...
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L'); $pdf->SetX(15);
        }
        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA OBSTÉTRICA'), 0, 1, 'C');

    // Datos Paciente (Igual que antes)...
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_encode($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);
    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);
    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0);
    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_encode($datosecografia->codigo_doctor), 0);

    // =========================================================
    // 4. LÓGICA INTELIGENTE: ¿ES PRECOZ O TARDÍA?
    // =========================================================
    // Si llenaste el campo LCC, asumimos que es precoz.
    $esPrecoz = !empty($datosecografia->lcc); 

    $y = 70;

    // Función auxiliar para imprimir líneas
    function itemObs($pdf, &$y, $label, $valor, $esLargo = false) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(13, 110, 253); 
        $pdf->Cell(45, 6, $label, 0); 
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0); 
        $valorLimpio = utf8_encode($valor);
        if ($esLargo) {
            $pdf->SetXY(115, $y); $pdf->MultiCell(85, 5, $valorLimpio, 0, 'L');
            $y = $pdf->GetY() + 2; 
        } else {
            $pdf->Cell(85, 6, $valorLimpio, 0, 1); $y += 6;
        }
    }

    // --- BLOQUE 1: DATOS BIOMÉTRICOS ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    
    // CAMBIA EL TÍTULO SEGÚN EL TIPO
    $tituloBloque1 = $esPrecoz ? '  1. BIOMETRÍA (PRIMERAS SEMANAS)' : '  1. BIOMETRÍA FETAL';
    $pdf->Cell(130, 7, ($tituloBloque1), 0, 1, 'L', true);
    $y += 8;

    if ($esPrecoz) {
        // [DISEÑO A] SI ES PRECOZ: Muestra Saco, LCC, etc.
        itemObs($pdf, $y, 'Saco Gestacional:', $datosecografia->saco_gestacional);
        itemObs($pdf, $y, 'Vesícula Vitelina:', $datosecografia->saco_vitelino);
        itemObs($pdf, $y, 'LCC (Longitud):', $datosecografia->lcc . ' mm');
        itemObs($pdf, $y, 'Embrión:', $datosecografia->embrion_visualizado);
    } else {
        // [DISEÑO B] SI ES AVANZADA: Muestra DBP, LF, Peso
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
        $pdf->Cell(20, 6, 'DBP:', 0); $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
        $pdf->Cell(45, 6, $datosecografia->dpb . ' mm', 0);
        
        $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
        $pdf->Cell(20, 6, 'CC:', 0); $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
        $pdf->Cell(45, 6, $datosecografia->cc . ' mm', 0, 1);
        $y += 6;

        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
        $pdf->Cell(20, 6, 'CA:', 0); $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
        $pdf->Cell(45, 6, $datosecografia->ca . ' mm', 0);
        
        $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
        $pdf->Cell(20, 6, 'LF:', 0); $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
        $pdf->Cell(45, 6, $datosecografia->lf . ' mm', 0, 1);
        $y += 8;

        // Peso Resaltado
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
        $pdf->Cell(45, 6, 'Peso Estimado:', 0);
        $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(0);
        $pdf->Cell(85, 6, $datosecografia->ponderado . ' g  (P: ' . $datosecografia->percentil . ')', 0, 1);
        $y += 6;
        
        itemObs($pdf, $y, 'Edad Gestacional:', $datosecografia->edad_gestacional);
    }

    // --- BLOQUE 2: VITALIDAD ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, ('  2. ESTÁTICA Y VITALIDAD'), 0, 1, 'L', true);
    $y += 8;

    if (!$esPrecoz) { // Solo mostrar esto si es grande
        itemObs($pdf, $y, 'Situación:', $datosecografia->situacion);
        itemObs($pdf, $y, 'Presentación:', $datosecografia->presentacion);
        itemObs($pdf, $y, 'Dorso:', $datosecografia->dorso);
    }
    
    itemObs($pdf, $y, 'Latidos (LCF):', $datosecografia->lcf . ' lpm');
    // Mapeamos 'estadoFeto' que ahora guarda los movimientos
    itemObs($pdf, $y, 'Actividad:', $datosecografia->estadoFeto, true); 
    
    if (!$esPrecoz) {
        itemObs($pdf, $y, 'Sexo Fetal:', $datosecografia->sexo);
    }
    $y += 2;

    // --- BLOQUE 3: PLACENTA ---
    if (!$esPrecoz) { // La placenta no se evalúa igual en precoz
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(130, 7, ('  3. PLACENTA Y LÍQUIDO'), 0, 1, 'L', true);
        $y += 8;

        itemObs($pdf, $y, 'Ubicación:', $datosecografia->placenta); // Campo 'placenta'
        itemObs($pdf, $y, 'Grado:', 'Grado ' . $datosecografia->placenta_grado);
        itemObs($pdf, $y, 'Líquido Amniótico:', $datosecografia->ila, true);
        $y += 4;
    } else {
        // En precoz, solo mostramos si hay hematomas o datos relevantes en ILA
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(130, 7, ('  3. OBSERVACIONES ADICIONALES'), 0, 1, 'L', true);
        $y += 8;
        itemObs($pdf, $y, 'Trofoblasto/ILA:', $datosecografia->ila, true);
    }

    // --- CONCLUSIÓN ---
    if ($y > 230) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->Cell(130, 6, ('CONCLUSIÓN:'), 0, 1);
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusion), 0, 'J');
    $y = $pdf->GetY() + 5;

    // --- SUGERENCIAS ---
    if ($y > 250) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->sugerencia), 0, 'J');

    // PIE DE PÁGINA
    $pdf->SetFillColor(0,24,0); $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283); $pdf->Cell(100, 5, utf8_decode('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');
    $pdf->SetXY(140, 283); $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_obstetrica.pdf');
    exit;
}

public function getEcografiaAbdominalPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaAbdominalPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. PLANTILLA BASE (BARRA LATERAL Y LOGO)
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        // Logo y Marca de agua
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        // Barra Lateral
        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');

        // Imágenes
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        // Lista de servicios
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            $pdf->SetX(15);
        }

        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA ABDOMINAL'), 0, 1, 'C');

    // Datos del Paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_encode($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);

    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);

    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0);

    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);

    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_encode($datosecografia->codigo_doctor), 0);


    // =========================================================
    // 4. CUERPO DEL REPORTE (NUEVOS CAMPOS)
    // =========================================================
    $y = 70;

    // Función auxiliar para imprimir líneas estandarizadas (Etiqueta Azul / Valor Negro)
    function itemAbd($pdf, &$y, $label, $valor, $esLargo = false) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(13, 110, 253); // Azul
        $pdf->Cell(35, 6, ($label), 0); 
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0); // Negro
        
        $valorLimpio = ($valor);

        if ($esLargo) {
            $pdf->SetXY(105, $y); 
            $pdf->MultiCell(95, 5, $valorLimpio, 0, 'L');
            $y = $pdf->GetY() + 2; 
        } else {
            $pdf->Cell(95, 6, $valorLimpio, 0, 1);
            $y += 6;
        }
    }

    // --- BLOQUE 1: HÍGADO Y VÍAS BILIARES ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell(130, 7, ('  1. HÍGADO Y VÍAS BILIARES'), 0, 1, 'L', true);
    $y += 8;

    itemAbd($pdf, $y, 'Tamaño Hepático:', $datosecografia->higado_tamano . ' mm');
    itemAbd($pdf, $y, 'Ecoestructura:', $datosecografia->higado_eco);
    itemAbd($pdf, $y, 'Colédoco:', $datosecografia->coledoco_diametro . ' mm');
    
    // Vesícula (Combinamos Paredes + Detalles)
    $vesicula_texto = $datosecografia->vesicula_paredes . '. ' . $datosecografia->vesicula_detalles;
    itemAbd($pdf, $y, 'Vesícula Biliar:', $vesicula_texto, true);
    $y += 2;

    // --- BLOQUE 2: PÁNCREAS Y BAZO ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, ('  2. PÁNCREAS Y BAZO'), 0, 1, 'L', true);
    $y += 8;

    itemAbd($pdf, $y, 'Páncreas:', utf8_encode($datosecografia->pancreas), true);
    
    // Bazo (Tamaño + Aspecto)
    $bazo_texto = 'Longitud: ' . $datosecografia->bazo_tamano . ' mm. Aspecto: ' . $datosecografia->bazo_aspecto;
    itemAbd($pdf, $y, 'Bazo:', utf8_encode($bazo_texto), true);
    $y += 2;

    // --- BLOQUE 3: RIÑONES (COMPARATIVA) ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, ('  3. RIÑONES'), 0, 1, 'L', true);
    $y += 10; // Damos un poco más de aire antes de la tabla

    // Encabezados de tabla (CENTRADOS Y MÁS SEPARADOS)
    // Encabezados de tabla (CON COLOR)
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); 
    
    // CAMBIO DE COLOR A AZUL
    $pdf->SetTextColor(13, 110, 253); 
    
    $pdf->Cell(40, 5, '', 0); // Espacio vacío
    $pdf->Cell(45, 5, 'DERECHO', 0, 0, 'C'); 
    $pdf->Cell(45, 5, 'IZQUIERDO', 0, 1, 'C'); 
    
    // RESET A NEGRO PARA LO QUE SIGUE
    $pdf->SetTextColor(0); 
    $y += 6;

    // Fila 1: Longitud
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253); // Azul
    $pdf->Cell(40, 6, 'Longitud:', 0); // Etiqueta más ancha (40)
    $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0); // Negro
    $pdf->Cell(45, 6, $datosecografia->rd_long . ' mm', 0, 0, 'C');
    $pdf->Cell(45, 6, $datosecografia->ri_long . ' mm', 0, 1, 'C');
    $y += 6;

    // Fila 2: Parénquima
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(40, 6, ('Parénquima:'), 0);
    $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
    $pdf->Cell(45, 6, $datosecografia->rd_par . ' mm', 0, 0, 'C');
    $pdf->Cell(45, 6, $datosecografia->ri_par . ' mm', 0, 1, 'C');
    $y += 6;

    // Fila 3: Aspecto / Diagnóstico (MultiCell para que no se corte)
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(40, 6, 'Diagnostico:', 0);
    $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    
    // Guardamos la posición Y actual
    $y_inicio = $y;
    
    // Columna Derecha
    $pdf->SetXY(110, $y_inicio); // 70 + 40 = 110
    $pdf->MultiCell(45, 5, utf8_encode($datosecografia->rinon_derecho), 0, 'C');
    $y_final_der = $pdf->GetY();
    
    // Columna Izquierda
    $pdf->SetXY(155, $y_inicio); // 110 + 45 = 155
    $pdf->MultiCell(45, 5, utf8_encode($datosecografia->rinon_izquierdo), 0, 'C');
    $y_final_izq = $pdf->GetY();
    
    // El nuevo Y será el mayor de los dos bloques + margen
    $y = max($y_final_der, $y_final_izq) + 6;


    // --- BLOQUE 4: OTROS HALLAZGOS ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 7, utf8_decode('  4. OTROS HALLAZGOS'), 0, 1, 'L', true);
    $y += 8;

    itemAbd($pdf, $y, 'Estómago:',utf8_encode($datosecografia->estomago), true);
    itemAbd($pdf, $y, 'Cavidad/Vejiga:', utf8_encode($datosecografia->otros_hallazgos), true);
    $y += 4;


    // =========================================================
    // 5. CONCLUSIONES Y SUGERENCIAS
    // ========================================================
    
    // Validar salto de página
    if ($y > 230) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    // Conclusiones
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetTextColor(0);
    $pdf->Cell(130, 6, ('CONCLUSIÓN:'), 0, 1);
    $y += 6;
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusiones), 0, 'J');
    $y = $pdf->GetY() + 5;

    // Sugerencias
    if ($y > 250) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    $y += 6;
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->sugerencias), 0, 'J');


    // =========================================================
    // 6. PIE DE PÁGINA
    // =========================================================
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, utf8_decode('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_abdominal.pdf');
    exit;
}

public function getEcografiaProstaticaPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaProstaticaPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. PLANTILLA BASE
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');
        
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            $pdf->SetX(15);
        }

        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    // SIN utf8_decode/encode en el título
    $pdf->Cell(130, 10, 'ECOGRAFÍA VESICO-PROSTÁTICA', 0, 1, 'C');

    // Datos del Paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_encode($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);
    
    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0);
    
    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
    
    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_encode($datosecografia->codigo_doctor), 0);

    // =========================================================
    // 4. CUERPO DEL REPORTE
    // =========================================================
    $y = 70;

    // Función auxiliar: NO codifica el $label, SI codifica el $valor (data de BD)
    function itemPros($pdf, &$y, $label, $valor, $esLargo = false) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(13, 110, 253); 
        
        // AQUÍ: $label se imprime directo, sin utf8_encode/decode
        $pdf->Cell(45, 6, $label, 0); 
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0); 
        
        // El valor de la BD sí suele necesitar encode si la BD no es UTF8 nativa
        $valorLimpio = utf8_encode($valor); 

        if ($esLargo) {
            $pdf->SetXY(115, $y); 
            $pdf->MultiCell(85, 5, $valorLimpio, 0, 'L');
            $y = $pdf->GetY() + 2; 
        } else {
            $pdf->Cell(85, 6, $valorLimpio, 0, 1);
            $y += 6;
        }
    }

    // --- BLOQUE 1: VEJIGA ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240); $pdf->SetTextColor(0);
    // Texto directo
    $pdf->Cell(130, 7, '  1. VEJIGA', 0, 1, 'L', true);
    $y += 8;

    itemPros($pdf, $y, 'Paredes:', $datosecografia->paredes);
    itemPros($pdf, $y, 'Contenido:', $datosecografia->contenido);
    itemPros($pdf, $y, 'Descripción:', $datosecografia->descripcion_vejiga, true);
    $y += 2;

    // --- BLOQUE 2: VOLÚMENES Y RESIDUO ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetTextColor(0);
    // Texto directo "VOLÚMENES" (si tu archivo PHP es UTF8, esto pasará bien)
    $pdf->Cell(130, 7, '  2. VOLÚMENES Y RESIDUO', 0, 1, 'L', true);
    $y += 8;

    itemPros($pdf, $y, 'Vol. Pre-miccional:', $datosecografia->vol_pre . ' cc');
    itemPros($pdf, $y, 'Vol. Post-miccional:', $datosecografia->vol_post . ' cc');
    
    // Retención
    $retencionVal = floatval($datosecografia->retencion);
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    
    // Texto directo
    $pdf->Cell(45, 6, 'Retención (%):', 0);
    
    $pdf->SetFont('Arial', 'B', 10); 
    if($retencionVal > 20) $pdf->SetTextColor(220, 53, 69); 
    else $pdf->SetTextColor(0); 
    
    $pdf->Cell(85, 6, $datosecografia->retencion, 0, 1);
    $y += 8;

    // --- BLOQUE 3: PRÓSTATA ---
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetTextColor(0);
    // Texto directo
    $pdf->Cell(130, 7, '  3. PRÓSTATA', 0, 1, 'L', true);
    $y += 8;

    // Medidas
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(25, 6, 'Dimensiones:', 0);
    $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(0);
    $medidas = 'Transv: '.$datosecografia->transverso.'mm  x  AP: '.$datosecografia->antero_posterior.'mm  x  Long: '.$datosecografia->longitudinal.'mm';
    $pdf->Cell(105, 6, $medidas, 0, 1);
    $y += 6;

    // Características
    itemPros($pdf, $y, 'Volumen / Peso:', $datosecografia->volumen);
    itemPros($pdf, $y, 'Bordes:', $datosecografia->bordes);
    itemPros($pdf, $y, 'Ecoestructura:', $datosecografia->observacion, true);
    $y += 4;

    // =========================================================
    // 5. CONCLUSIONES Y SUGERENCIAS
    // =========================================================
    if ($y > 230) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    // Conclusiones
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetTextColor(0);
    // Texto directo
    $pdf->Cell(130, 6, 'CONCLUSIÓN:', 0, 1);
    $y += 6;
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusiones), 0, 'J');

    // Pie de Página
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    // Textos directos (si tu editor guarda en UTF8, los acentos se verán bien con PDF_UTF8)
    $pdf->Cell(100, 5, 'DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios', 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_prostatica.pdf');
    exit;
}

public function getEcografiaRenalPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaRenalPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. PLANTILLA BASE
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');
        
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            $pdf->SetX(15);
        }

        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, 'ECOGRAFÍA RENAL', 0, 1, 'C'); 

    // Datos del Paciente (SIN utf8_encode)
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->apellido . ' ' . $datosPaciente->nombre, 0);
    
    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->edad . ' años', 0);
    
    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
  
    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosecografia->codigo_doctor, 0);

    // Motivo
    $pdf->SetXY(70, 60);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MOTIVO DE EXAMEN:', 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 66);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->motivo), 0);

    // =========================================================
    // 4. COMPARATIVA RENAL (LIMPIA)
    // =========================================================
    $y = 80;

    // Título Principal
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240); $pdf->SetTextColor(0);
    $pdf->Cell(130, 7, '  1. EVALUACIÓN RENAL', 0, 1, 'L', true);
    $y += 10;

    // Encabezados
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253); 
    $pdf->Cell(30, 5, '', 0); 
    $pdf->Cell(50, 5, 'DERECHO', 0, 0, 'C');
    $pdf->Cell(50, 5, 'IZQUIERDO', 0, 1, 'C');
    $pdf->SetTextColor(0); 
    $y += 6;

    // Función fila simple (SIN utf8_encode)
    function filaComp($pdf, &$y, $label, $valDer, $valIzq) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 9); 
        $pdf->Cell(30, 6, $label, 0); 
        
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 6, $valDer, 0, 0, 'C'); 
        $pdf->Cell(50, 6, $valIzq, 0, 1, 'C'); 
        $y += 6;
    }

    filaComp($pdf, $y, 'Morfología:', $datosecografia->rd_morfologia, $datosecografia->ri_morfologia);
    filaComp($pdf, $y, 'Ecogenicidad:', $datosecografia->rd_ecogenicidad, $datosecografia->ri_ecogenicidad);
    
    // Medidas (Concatenamos mm solo si hay número)
    $longD = !empty($datosecografia->rd_longitud) ? $datosecografia->rd_longitud . ' mm' : '-';
    $longI = !empty($datosecografia->ri_longitud) ? $datosecografia->ri_longitud . ' mm' : '-';
    filaComp($pdf, $y, 'Longitud:', $longD, $longI);

    $parD = !empty($datosecografia->rd_parenquima) ? $datosecografia->rd_parenquima . ' mm' : '-';
    $parI = !empty($datosecografia->ri_parenquima) ? $datosecografia->ri_parenquima . ' mm' : '-';
    filaComp($pdf, $y, 'Parénquima:', $parD, $parI);

    // Patologías (Lógica corregida: Solo mostrar medida si es "Sí")
    filaComp($pdf, $y, 'Img. Sólidas:', $datosecografia->rd_solidas, $datosecografia->ri_solidas);
    filaComp($pdf, $y, 'Img. Quísticas:', $datosecografia->rd_quisticas, $datosecografia->ri_quisticas);
    
    // Hidronefrosis: Verificar si dice "Sí" (considerando acentos)
    $esSi_HD = ($datosecografia->rd_hidronefrosis == 'Sí' || $datosecografia->rd_hidronefrosis == 'Si');
    $esSi_HI = ($datosecografia->ri_hidronefrosis == 'Sí' || $datosecografia->ri_hidronefrosis == 'Si');

    $hidroD = $datosecografia->rd_hidronefrosis . ($esSi_HD ? ' ('.$datosecografia->rd_hidro_medida.')' : '');
    $hidroI = $datosecografia->ri_hidronefrosis . ($esSi_HI ? ' ('.$datosecografia->ri_hidro_medida.')' : '');
    filaComp($pdf, $y, 'Hidronefrosis:', $hidroD, $hidroI);

    // Microlitiasis
    $esSi_MD = ($datosecografia->rd_microlitiasis == 'Sí' || $datosecografia->rd_microlitiasis == 'Si');
    $esSi_MI = ($datosecografia->ri_microlitiasis == 'Sí' || $datosecografia->ri_microlitiasis == 'Si');
    
    $microD = $datosecografia->rd_microlitiasis . ($esSi_MD ? ' ('.$datosecografia->rd_micro_medida.')' : '');
    $microI = $datosecografia->ri_microlitiasis . ($esSi_MI ? ' ('.$datosecografia->ri_micro_medida.')' : '');
    filaComp($pdf, $y, 'Microlitiasis:', $microD, $microI);

    // Cálculos
    $esSi_CD = ($datosecografia->rd_calculos == 'Sí' || $datosecografia->rd_calculos == 'Si');
    $esSi_CI = ($datosecografia->ri_calculos == 'Sí' || $datosecografia->ri_calculos == 'Si');

    $calcD = $datosecografia->rd_calculos . ($esSi_CD ? ' ('.$datosecografia->rd_calculos_medida.')' : '');
    $calcI = $datosecografia->ri_calculos . ($esSi_CI ? ' ('.$datosecografia->ri_calculos_medida.')' : '');
    filaComp($pdf, $y, 'Cálculos:', $calcD, $calcI);
    
    $y += 4; 

    // =========================================================
    // 5. VEJIGA
    // =========================================================
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell(130, 7, '  2. VEJIGA', 0, 1, 'L', true);
    $y += 8;

    function itemVej($pdf, &$y, $label, $val, $col2Label = '', $col2Val = '') {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
        $pdf->Cell(35, 6, $label, 0);
        $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
        $pdf->Cell(30, 6, $val, 0); // Sin encode
        
        if($col2Label != '') {
            $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
            $pdf->Cell(35, 6, $col2Label, 0);
            $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
            $pdf->Cell(30, 6, $col2Val, 0); // Sin encode
        }
        $pdf->Ln();
        $y += 6;
    }

    itemVej($pdf, $y, 'Repleción:', $datosecografia->vejiga_replecion, 'Paredes:', $datosecografia->vejiga_paredes);
    itemVej($pdf, $y, 'Contenido:', $datosecografia->vejiga_contenido, 'Cálculos:', $datosecografia->vejiga_calculos);
    
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(35, 6, 'Descripción:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
    $pdf->MultiCell(95, 6, utf8_encode($datosecografia->descripcion_vejiga), 0);
    $y = $pdf->GetY() + 2;


    // =========================================================
    // 6. VOLÚMENES
    // =========================================================
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell(130, 7, '  3. VOLÚMENES', 0, 1, 'L', true);
    $y += 8;

    itemVej($pdf, $y, 'Pre-miccional:', $datosecografia->vol_pre . ' cc', 'Post-miccional:', $datosecografia->vol_post . ' cc');
    
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(35, 6, 'Retención (%):', 0);
    
    $valRet = floatval($datosecografia->retencion);
    if($valRet > 20) $pdf->SetTextColor(220, 53, 69); // Rojo
    else $pdf->SetTextColor(0); // Negro
    
    $pdf->Cell(30, 6, $datosecografia->retencion, 0, 1);
    $y += 8;

    // =========================================================
    // 7. CONCLUSIONES
    // =========================================================
    if ($y > 220) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    if (!empty($datosecografia->observaciones)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11); $pdf->SetTextColor(0);
        $pdf->Cell(130, 6, 'OBSERVACIONES:', 0, 1);
        $y += 6;
        $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(130, 5, $datosecografia->observaciones, 0);
        $y = $pdf->GetY() + 6;
    }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);
    $y += 6;
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusiones), 0);
    $y = $pdf->GetY() + 6;

    if (!empty($datosecografia->sugerencias)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
        $y += 6;
        $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(130, 5, $datosecografia->sugerencias, 0);
    }

    // Pie de Página
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, 'DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios', 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_renal.pdf');
    exit;
}


public function getEcografiaTiroidesPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaTiroidesPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. PLANTILLA BASE
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');
        
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Obstétrica", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            $pdf->SetX(15);
        }

        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, 'ECOGRAFÍA DE TIROIDES', 0, 1, 'C'); 

    // Datos del Paciente (SIN utf8_encode)
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->apellido . ' ' . $datosPaciente->nombre, 0);
    
    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->edad . ' años', 0);
    
    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
    
    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosecografia->codigo_doctor, 0);

    // Motivo
    $pdf->SetXY(70, 64);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MOTIVO DE EXAMEN:', 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 70);
    $pdf->MultiCell(130, 5, $datosecografia->motivo, 0);

    // =========================================================
    // 4. TIROIDES - DESCRIPCIÓN Y MEDIDAS
    // =========================================================
    $y = 85;

    // Título Principal
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240); $pdf->SetTextColor(0);
    $pdf->Cell(130, 7, '  1. DESCRIPCIÓN Y BIOMETRÍA', 0, 1, 'L', true);
    $y += 10;

    // Descripción General
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(35, 6, 'Descripción:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
    $pdf->MultiCell(95, 6, utf8_encode($datosecografia->descripcion_tiroides), 0);
    $y = $pdf->GetY() + 4;

    // --- TABLA DE MEDIDAS (LADO A LADO) ---
    // Encabezados
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253); 
    $pdf->Cell(30, 5, '', 0); 
    $pdf->Cell(50, 5, 'LÓBULO DERECHO', 0, 0, 'C');
    $pdf->Cell(50, 5, 'LÓBULO IZQUIERDO', 0, 1, 'C');
    $pdf->SetTextColor(0); 
    $y += 6;

    // Función fila comparativa
    function filaMedida($pdf, &$y, $label, $valDer, $valIzq) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 9); 
        $pdf->Cell(30, 6, $label, 0); 
        
        $pdf->SetFont('Arial', '', 9);
        $valDerStr = !empty($valDer) ? $valDer . ' mm' : '-';
        $valIzqStr = !empty($valIzq) ? $valIzq . ' mm' : '-';
        
        $pdf->Cell(50, 6, $valDerStr, 0, 0, 'C'); 
        $pdf->Cell(50, 6, $valIzqStr, 0, 1, 'C'); 
        $y += 6;
    }

    filaMedida($pdf, $y, 'Longitud:', $datosecografia->ld_long, $datosecografia->li_long);
    filaMedida($pdf, $y, 'Antero-Post:', $datosecografia->ld_ap, $datosecografia->li_ap);
    filaMedida($pdf, $y, 'Transverso:', $datosecografia->ld_trans, $datosecografia->li_trans);

    // Volumen Individual
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(13, 110, 253);
    $pdf->Cell(30, 6, 'Volumen:', 0); 
    $pdf->SetFont('Arial', 'B', 9); $pdf->SetTextColor(0); // Negrita para volumen
    $volD = !empty($datosecografia->ld_volumen) ? $datosecografia->ld_volumen : '-';
    $volI = !empty($datosecografia->li_volumen) ? $datosecografia->li_volumen : '-';
    $pdf->Cell(50, 6, $volD, 0, 0, 'C'); 
    $pdf->Cell(50, 6, $volI, 0, 1, 'C'); 
    $y += 8;

    // Volumen Total
    if(!empty($datosecografia->volumen_total)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10); $pdf->SetTextColor(13, 110, 253);
        $pdf->Cell(130, 6, 'VOLUMEN GLANDULAR TOTAL: ' . $datosecografia->volumen_total, 0, 1, 'C');
        $pdf->SetTextColor(0);
        $y += 6;
    }

    // =========================================================
    // 5. OTRAS ESTRUCTURAS
    // =========================================================
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell(130, 7, '  2. ESTRUCTURAS ADYACENTES', 0, 1, 'L', true);
    $y += 8;

    function itemEstructura($pdf, &$y, $label, $val) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 10); 
        $pdf->Cell(50, 6, $label, 0);
        $pdf->SetFont('Arial', '', 10); 
        $pdf->Cell(80, 6, $val, 0);
        $y += 6;
    }

    itemEstructura($pdf, $y, 'Istmo:', $datosecografia->istmo);
    itemEstructura($pdf, $y, 'Vasculares:', $datosecografia->estructuras_vasculares);
    itemEstructura($pdf, $y, 'Submaxilares:', $datosecografia->glandulas_submaxilares);
    itemEstructura($pdf, $y, 'Adenopatías:', $datosecografia->adenopatia_cervicales);
    
    // Piel y TCSC
    $y += 2;
    itemEstructura($pdf, $y, 'Piel:', $datosecografia->piel);
    
    // TCSC (Puede ser largo)
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 6, 'TCSC:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(80, 6, utf8_encode($datosecografia->tcsc), 0);
    $y = $pdf->GetY() + 4;

    // =========================================================
    // 6. CONCLUSIONES
    // =========================================================
    if ($y > 220) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);
    $y += 6;
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusiones), 0);
    $y = $pdf->GetY() + 6;

    if (!empty($datosecografia->sugerencias)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
        $y += 6;
        $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(130, 5, utf8_encode($datosecografia->sugerencias), 0);
    }

    // Pie de Página
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, 'DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios', 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_tiroides.pdf');
    exit;
}

public function getEcografiaHisterosonografiaPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaHisterosonografiaPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. PLANTILLA BASE
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');
        
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Histerosonografía", "Ecografía Gemelar",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, $item, 0, 1, 'L');
            $pdf->SetX(15);
        }

        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, 'HISTEROSONOGRAFÍA', 0, 1, 'C'); // Título sin encode

    // Datos del Paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->apellido . ' ' . $datosPaciente->nombre, 0);
    
    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->edad . ' años', 0);
    
    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
    
    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosecografia->codigo_doctor, 0);

    // Motivo
    $pdf->SetXY(70, 64);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MOTIVO DE EXAMEN:', 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 70);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->motivo), 0);

    // =========================================================
    // 4. PROCEDIMIENTO Y HALLAZGOS
    // =========================================================
    $y = 85;

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240); $pdf->SetTextColor(0);
    $pdf->Cell(130, 7, '  1. PROCEDIMIENTO Y HALLAZGOS', 0, 1, 'L', true);
    $y += 10;

    // Descripción del Procedimiento (Texto largo -> CON utf8_encode)
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', '', 10); $pdf->SetTextColor(0);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->descripcion_procedimiento), 0);
    $y = $pdf->GetY() + 8;

    // =========================================================
    // 5. CONCLUSIONES
    // =========================================================
    if ($y > 220) { $pdf->AddPage(); $imprimirPlantilla($pdf); $y = 30; }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);
    $y += 6;
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusiones), 0);
    $y = $pdf->GetY() + 6;

    if (!empty($datosecografia->sugerencias)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
        $y += 6;
        $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(130, 5, utf8_encode($datosecografia->sugerencias), 0);
    }

    // Pie de Página
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, 'DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios', 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'histerosonografia.pdf');
    exit;
}

    public function getEcografiaArterialPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaArterialPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. PLANTILLA BASE (Logo y Barra Lateral)
    // =========================================================
    $imprimirPlantilla = function($pdf) {
        $pdf->SetAlpha(0.1);
        $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
        $pdf->SetAlpha(1);

        $pdf->SetFillColor(230,230,230);
        $pdf->Rect(10, 5, 50, 277, 'F');
        
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(15, 140);
        // Lista Lateral
        $listado = array(
            "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
            "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
            "Ecografía Transvaginal", "Ecografía Arterial M.I.", "Ecografía Venosa M.I.",
            "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
            "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica"
        );
        foreach($listado as $item) {
            $pdf->Cell(50, 4, utf8_decode($item), 0, 1, 'L');
            $pdf->SetX(15);
        }

        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    };

    // =========================================================
    // 3. ENCABEZADO
    // =========================================================
    $pdf->AddPage();
    $imprimirPlantilla($pdf);

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA ARTERIAL DE MIEMBROS INFERIORES'), 0, 1, 'C'); 

    // Datos del Paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_decode($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);
    
    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0);
    
    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
    
    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, utf8_decode('MÉDICO:'), 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, utf8_decode($datosecografia->codigo_doctor), 0);

    // Motivo
    $pdf->SetXY(70, 64);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MOTIVO DE EXAMEN:', 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 70);
    $pdf->MultiCell(130, 5, utf8_decode($datosecografia->motivo), 0);

    $y = 85;

    // =========================================================
    // 4. FUNCIÓN PARA DIBUJAR TABLAS (DERECHA E IZQUIERDA)
    // =========================================================
    $dibujarSeccionPierna = function($pdf, &$y, $titulo, $descripcion, $prefijo, $data) {
        // Título de la Sección
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11); 
        $pdf->SetFillColor(240, 240, 240); 
        $pdf->SetTextColor(0);
        $pdf->Cell(130, 7, ($titulo), 0, 1, 'L', true);
        $y += 10;

        // Descripción de Hallazgos
        if (!empty($descripcion)) {
            $pdf->SetXY(70, $y);
            $pdf->SetFont('Arial', '', 10);
            $pdf->MultiCell(130, 5, ($descripcion), 0);
            $y = $pdf->GetY() + 4;
        }

        // --- TABLA DE VALORES ---
        // Cabecera
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 9); 
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(50, 6, 'ARTERIA', 1, 0, 'C', true);
        $pdf->Cell(40, 6, 'VPS (cm/s)', 1, 0, 'C', true);
        $pdf->Cell(40, 6, 'ONDA', 1, 1, 'C', true);
        $y += 6;

        // Filas
        $arterias = [
            'fc' => ('F. Común'),
            'fs' => ('F. Superficial'),
            'pop' => ('Poplítea'),
            'tp' => ('Tibial Posterior'),
            'ta' => ('Tibial Anterior'),
            'media' => ('Media / Pedia')
        ];

        $pdf->SetFont('Arial', '', 9);
        foreach($arterias as $key => $nombre) {
            $pdf->SetX(70);
            // Obtenemos valor dinámicamente del objeto $data (ej: mid_fc_vps)
            $vps = $data->{$prefijo . '_' . $key . '_vps'};
            $onda = $data->{$prefijo . '_' . $key . '_onda'};
            
            $pdf->Cell(50, 6, ($nombre), 1);
            $pdf->Cell(40, 6, $vps, 1, 0, 'C');
            $pdf->Cell(40, 6, ($onda), 1, 1, 'C');
            $y += 6;
        }
        $y += 8; // Espacio después de la tabla
    };

    // =========================================================
    // 5. IMPRIMIR SECCIONES
    // =========================================================
    
    // --> MIEMBRO DERECHO
    $dibujarSeccionPierna(
        $pdf, $y, '1. MIEMBRO INFERIOR DERECHO', 
        $datosecografia->mid_descripcion, 
        'mid', 
        $datosecografia
    );

    // Verificamos espacio para el Izquierdo
    if ($y > 200) { 
        $pdf->AddPage(); 
        $imprimirPlantilla($pdf); 
        $y = 30; 
    }

    // --> MIEMBRO IZQUIERDO
    $dibujarSeccionPierna(
        $pdf, $y, '2. MIEMBRO INFERIOR IZQUIERDO', 
        $datosecografia->mii_descripcion, 
        'mii', 
        $datosecografia
    );

    // =========================================================
    // 6. CONCLUSIONES Y SUGERENCIAS
    // =========================================================
    if ($y > 220) { 
        $pdf->AddPage(); 
        $imprimirPlantilla($pdf); 
        $y = 30; 
    }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);
    $y += 6;
    $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 5, utf8_encode($datosecografia->conclusiones), 0);
    $y = $pdf->GetY() + 6;

    if (!empty($datosecografia->sugerencias)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
        $y += 6;
        $pdf->SetX(70); $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(130, 5, ($datosecografia->sugerencias), 0);
    }

    // Pie de Página
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, utf8_decode('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_arterial.pdf');
    exit;
}

    public function getEcografiaVenosaPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaVenosaPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 

    // =========================================================
    // 2. PLANTILLA BASE
    // =========================================================
    $pdf->AddPage();
    
    // Marca de agua
    $pdf->SetAlpha(0.1);
    $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
    $pdf->SetAlpha(1);
    
    // Barra lateral
    $pdf->SetFillColor(230,230,230);
    $pdf->Rect(10, 5, 50, 277, 'F');
    
    // Imágenes laterales
    $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
    $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
    $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
    
    // Lista de ecografías
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(15, 135);
    $listado = array(
        "Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica",
        "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio",
        "Ecografía Transvaginal", "Histerosonografía", "Ecografía Gemelar",
        "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS",
        "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica",
        "Ecografía Venosa M.I."
    );
    
    foreach($listado as $item) {
        $pdf->Cell(50, 4, ($item), 0, 1, 'L');
        $pdf->SetX(15);
    }
    
    $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
    $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);

    // =========================================================
    // 3. DATOS DEL PACIENTE
    // =========================================================
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA DOPPLER VENOSO DE MIEMBROS INFERIORES'), 0, 1, 'C');

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->apellido . ' ' . $datosPaciente->nombre), 0);
    
    $pdf->SetXY(70, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosPaciente->edad . ' años'), 0);
    
    $pdf->SetXY(70, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
    
    $pdf->SetXY(70, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, ('MÉDICO:'), 0);
    $pdf->SetFont('Arial', '', 10); $pdf->Cell(105, 6, ($datosecografia->codigo_doctor), 0);

    // Motivo
    $pdf->SetXY(70, 64);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MOTIVO DE EXAMEN:', 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 70);
    $pdf->MultiCell(130, 5, utf8_decode($datosecografia->motivo), 0);

    $y = 85;

    // =========================================================
    // 4. MIEMBRO INFERIOR DERECHO
    // =========================================================
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); 
    $pdf->SetFillColor(240, 240, 240); 
    $pdf->SetTextColor(0);
    $pdf->Cell(130, 7, 'MIEMBRO INFERIOR DERECHO', 0, 1, 'L', true);
    $y += 10;

    // Descripción Derecha
    if (!empty($datosecografia->mid_descripcion)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(130, 5, utf8_encode($datosecografia->mid_descripcion), 0);
        $y = $pdf->GetY() + 4;
    }

    // Encabezados Tabla
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); 
    $pdf->SetFillColor(220, 220, 220);
    $pdf->Cell(50, 6, 'VENA', 1, 0, 'C', true);
    $pdf->Cell(40, 6, 'MEDIDA MM', 1, 0, 'C', true);
    $pdf->Cell(40, 6, 'REFLUJO', 1, 1, 'C', true);
    $y += 6;

    // Filas Derecha
    $pdf->SetFont('Arial', '', 9);
    
    // F. Común
    $pdf->SetX(70);
    $pdf->Cell(50, 6, ('F. Común'), 1);
    $pdf->Cell(40, 6, $datosecografia->mid_fc_med, 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mid_fc_ref), 1, 1, 'C');
    $y += 6;

    // Safena Mayor Muslo
    $pdf->SetX(70);
    $pdf->Cell(50, 6, 'Safena Mayor Muslo', 1);
    $pdf->Cell(40, 6, ($datosecografia->mid_smm_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mid_smm_ref), 1, 1, 'C');
    $y += 6;

    // Safena Mayor Pierna
    $pdf->SetX(70);
    $pdf->Cell(50, 6, 'Safena Mayor Pierna', 1);
    $pdf->Cell(40, 6, ($datosecografia->mid_smp_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mid_smp_ref), 1, 1, 'C');
    $y += 6;

    // Poplítea
    $pdf->SetX(70);
    $pdf->Cell(50, 6, ('Poplítea'), 1);
    $pdf->Cell(40, 6, ($datosecografia->mid_pop_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mid_pop_ref), 1, 1, 'C');
    $y += 6;

    // Safena Menor
    $pdf->SetX(70);
    $pdf->Cell(50, 6, 'Safena Menor', 1);
    $pdf->Cell(40, 6, ($datosecografia->mid_sm_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mid_sm_ref), 1, 1, 'C');
    $y += 6;

    // Perforantes
    $pdf->SetX(70);
    $pdf->Cell(50, 6, 'Perforantes', 1);
    $pdf->Cell(40, 6, ($datosecografia->mid_perf_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mid_perf_ref), 1, 1, 'C');
    $y += 10;

    // =========================================================
    // 5. MIEMBRO INFERIOR IZQUIERDO
    // =========================================================
    
    // Validar espacio
    if ($y > 200) { 
        $pdf->AddPage(); 
        $imprimirPlantilla($pdf); // NO hay helper aquí, solo el código de arriba
        // Como imprimirPlantilla es local, copiamos la lógica si no usas funciones
        // Pero para simplificar, asumimos que copiaste la parte de arriba
        $pdf->SetAlpha(0.1); $pdf->Image("public/img/theme/logo.png", 70, 90, 120); $pdf->SetAlpha(1);
        $pdf->SetFillColor(230,230,230); $pdf->Rect(10, 5, 50, 277, 'F');
        // (Imágenes laterales...)
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
        $pdf->SetFont('Arial', 'B', 8); $pdf->SetXY(15, 135);
        foreach($listado as $item) { $pdf->Cell(50, 4, $item, 0, 1, 'L'); $pdf->SetX(15); }
        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
        
        $y = 30; 
    }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11); 
    $pdf->SetFillColor(240, 240, 240); 
    $pdf->SetTextColor(0);
    $pdf->Cell(130, 7, 'MIEMBRO INFERIOR IZQUIERDO', 0, 1, 'L', true);
    $y += 10;

    // Descripción Izquierda
    if (!empty($datosecografia->mii_descripcion)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(130, 5, utf8_encode($datosecografia->mii_descripcion), 0);
        $y = $pdf->GetY() + 4;
    }

    // Encabezados Tabla
    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 9); 
    $pdf->SetFillColor(220, 220, 220);
    $pdf->Cell(50, 6, 'VENA', 1, 0, 'C', true);
    $pdf->Cell(40, 6, 'MEDIDA MM', 1, 0, 'C', true);
    $pdf->Cell(40, 6, 'REFLUJO', 1, 1, 'C', true);
    $y += 6;

    // Filas Izquierda
    $pdf->SetFont('Arial', '', 9);
    
    // F. Común
    $pdf->SetX(70);
    $pdf->Cell(50, 6, ('F. Común'), 1);
    $pdf->Cell(40, 6, ($datosecografia->mii_fc_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mii_fc_ref), 1, 1, 'C');
    $y += 6;

    // Safena Mayor Muslo
    $pdf->SetX(70);
    $pdf->Cell(50, 6, 'Safena Mayor Muslo', 1);
    $pdf->Cell(40, 6, ($datosecografia->mii_smm_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mii_smm_ref), 1, 1, 'C');
    $y += 6;

    // Safena Mayor Pierna
    $pdf->SetX(70);
    $pdf->Cell(50, 6, 'Safena Mayor Pierna', 1);
    $pdf->Cell(40, 6, ($datosecografia->mii_smp_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mii_smp_ref), 1, 1, 'C');
    $y += 6;

    // Poplítea
    $pdf->SetX(70);
    $pdf->Cell(50, 6, ('Poplítea'), 1);
    $pdf->Cell(40, 6, ($datosecografia->mii_pop_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mii_pop_ref), 1, 1, 'C');
    $y += 6;

    // Safena Menor
    $pdf->SetX(70);
    $pdf->Cell(50, 6, 'Safena Menor', 1);
    $pdf->Cell(40, 6, ($datosecografia->mii_sm_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mii_sm_ref), 1, 1, 'C');
    $y += 6;

    // Perforantes
    $pdf->SetX(70);
    $pdf->Cell(50, 6, 'Perforantes', 1);
    $pdf->Cell(40, 6, ($datosecografia->mii_perf_med), 1, 0, 'C');
    $pdf->Cell(40, 6, ($datosecografia->mii_perf_ref), 1, 1, 'C');
    $y += 10;

    // =========================================================
    // 6. CONCLUSIONES
    // =========================================================
    if ($y > 220) { 
        $pdf->AddPage(); 
        // Copiar lógica de plantilla lateral de nuevo si es necesario
        $pdf->SetAlpha(0.1); $pdf->Image("public/img/theme/logo.png", 70, 90, 120); $pdf->SetAlpha(1);
        $pdf->SetFillColor(230,230,230); $pdf->Rect(10, 5, 50, 277, 'F');
        // (Imágenes laterales...)
        $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
        $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
        $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
        $pdf->SetFont('Arial', 'B', 8); $pdf->SetXY(15, 135);
        foreach($listado as $item) { $pdf->Cell(50, 4, $item, 0, 1, 'L'); $pdf->SetX(15); }
        $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
        $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
        $y = 30; 
    }

    $pdf->SetXY(70, $y);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, ('CONCLUSIÓN:'), 0, 1);
    $y += 6;
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, $y);
    $pdf->MultiCell(130, 5, utf8_decode($datosecografia->conclusiones), 0);
    $y = $pdf->GetY() + 6;

    // Sugerencias
    if (!empty($datosecografia->sugerencias)) {
        $pdf->SetXY(70, $y);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
        $y += 6;
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(70, $y);
        $pdf->MultiCell(130, 5, utf8_decode($datosecografia->sugerencias), 0);
    }
    
    // Pie de página
    $pdf->SetFillColor(0,24,0); 
    $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, utf8_decode('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_venoso.pdf');
    exit;
}

public function getEcografiaDopplerPdf($dni) {
    // 1. CARGA DE DATOS
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaDopplerPdf($dni)->result()[0];

    $this->load->library('PDF_UTF8');
    $pdf = new PDF_UTF8();
    $pdf->SetAutoPageBreak(false); 
    $pdf->AddPage();

    // ==========================================
    // PLANTILLA
    // ==========================================
    $pdf->SetAlpha(0.1); $pdf->Image("public/img/theme/logo.png", 75, 90, 110); $pdf->SetAlpha(1);
    
    // Barra Lateral
    $pdf->SetFillColor(230,230,230); $pdf->Rect(10, 5, 50, 277, 'F');
    $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
    $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
    $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
    
    $pdf->SetFont('Arial', 'B', 8); $pdf->SetXY(15, 135);
    $listado = ["Ecografía Morfológica", "Ecografía Genética", "Ecografía Obstétrica", "Ecografía Obstétrica Doppler", "Ecografía Seguimiento", "Ovulatorio", "Ecografía Transvaginal", "Histerosonografía", "Ecografía Gemelar", "Ecografía 3D, 4D, 5D", "Ecografía de Mamas", "", "OTRAS ECOGRAFÍAS", "Ecografía Partes Blandas", "Ecografía Abdominal", "Ecografía Tiroides", "Ecografía Pélvica", "Ecografía Venosa M.I."];
    
    foreach($listado as $item) { 
        $pdf->Cell(50, 4, ($item), 0, 1, 'L'); 
        $pdf->SetX(15); 
    }
    $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
    $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);

    // Configuración de Márgenes
    $X = 65; 
    $W = 140;

    // ==========================================
    // ENCABEZADO
    // ==========================================
    $pdf->SetFont('Arial', 'B', 14); $pdf->SetXY($X, 10);
    $pdf->Cell($W, 10, ('ECOGRAFÍA OBSTÉTRICA DOPPLER'), 0, 1, 'C');

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY($X, 30); $pdf->Cell(25, 6, 'PACIENTE:', 0); $pdf->SetFont('Arial', '', 10); $pdf->Cell(115, 6, utf8_decode($datosPaciente->nombre . ' ' . $datosPaciente->apellido), 0);
    $pdf->SetXY($X, 36); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'DNI:', 0); $pdf->SetFont('Arial', '', 10); $pdf->Cell(115, 6, $datosPaciente->documento, 0);
    $pdf->SetXY($X, 42); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'EDAD:', 0); $pdf->SetFont('Arial', '', 10); $pdf->Cell(115, 6, ($datosPaciente->edad . ' años'), 0);
    $pdf->SetXY($X, 48); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, 'FECHA:', 0); $pdf->SetFont('Arial', '', 10); $pdf->Cell(115, 6, date("d/m/Y", strtotime($datosecografia->fecha)), 0);
    $pdf->SetXY($X, 54); $pdf->SetFont('Arial', 'B', 10); $pdf->Cell(25, 6, utf8_decode('MÉDICO:'), 0); $pdf->SetFont('Arial', '', 10); $pdf->Cell(115, 6, utf8_decode($datosecografia->codigo_doctor), 0);

    $pdf->SetXY($X, 64); $pdf->SetFont('Arial', 'B', 11); $pdf->Cell($W, 6, 'MOTIVO DE EXAMEN:', 0, 1);
    $pdf->SetFont('Arial', '', 10); $pdf->SetXY($X, 70); $pdf->MultiCell($W, 5, utf8_encode($datosecografia->motivo), 0);

    $y = 85;

    // ==========================================
    // 1. BIOMETRÍA FETAL
    // ==========================================
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240); $pdf->SetTextColor(0);
    $pdf->Cell($W, 7, ('  1. BIOMETRÍA FETAL'), 0, 1, 'L', true); $y += 8;

    // Anchos optimizados
    $w1 = 38; $w2 = 27; $w3 = 43; $w4 = 25;

    // Fila 1: Etiquetas
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($w1, 5, ('Situación:'),0); $pdf->Cell($w2, 5, ('LCF (lpm):'),0); 
    $pdf->Cell($w3, 5, ('Placenta:'),0);  $pdf->Cell($w4, 5, ('ILA (Líquido):'),0);
    $y += 5;

    // Fila 1: Valores
    $pdf->SetFont('Arial', '', 8);
    
    // Guardamos posiciones para calcular altura máxima de fila
    $y_start = $y;
    
    $pdf->SetXY($X, $y); 
    $pdf->MultiCell($w1, 4, utf8_encode($datosecografia->situacion), 0, 'L');
    $h1 = $pdf->GetY() - $y;

    $pdf->SetXY($X+$w1, $y); 
    $pdf->Cell($w2, 4, ($datosecografia->lcf), 0, 0, 'L');

    $pdf->SetXY($X+$w1+$w2, $y); 
    $pdf->MultiCell($w3, 4, utf8_encode($datosecografia->placenta_grado), 0, 'L');
    $h3 = $pdf->GetY() - $y;

    $pdf->SetXY($X+$w1+$w2+$w3, $y); 
    $pdf->Cell($w4, 4, utf8_encode($datosecografia->ila), 0, 0, 'L');

    // Ajustamos Y al más alto para que nada se monte
    $y += max($h1, $h3, 5) + 2;

    // Fila 2: Medidas
    $col_eq = 35;
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($col_eq, 5, 'DBP (mm):',0); $pdf->Cell($col_eq, 5, 'CC (mm):',0); $pdf->Cell($col_eq, 5, 'CA (mm):',0); $pdf->Cell($col_eq, 5, 'LF (mm):',0);
    $y += 5;
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', '', 9);
    $pdf->Cell($col_eq, 5, $datosecografia->dbp,0); $pdf->Cell($col_eq, 5, $datosecografia->cc,0); $pdf->Cell($col_eq, 5, $datosecografia->ca,0); $pdf->Cell($col_eq, 5, $datosecografia->lf,0);
    $y += 10;

    // Peso Fetal
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell($W, 8, utf8_decode('PESO FETAL ESTIMADO: ' . $datosecografia->pfe), 1, 1, 'C');
    $y += 12;

    // ==========================================
    // 2. HEMODINAMIA (Tabla con NbLines)
    // ==========================================
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell($W, 7, utf8_decode('  2. HEMODINAMIA (DOPPLER COLOR)'), 0, 1, 'L', true); $y += 8;

    // Anchos de tabla
    $cw_vaso = 34; $cw_ip = 30; $cw_ir = 30; $cw_otro = 46;

    // Cabecera Tabla
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 8); $pdf->SetFillColor(220, 220, 220);
    $pdf->Cell($cw_vaso, 6, 'VASO', 1, 0, 'C', true);
    $pdf->Cell($cw_ip, 6, 'IP', 1, 0, 'C', true);
    $pdf->Cell($cw_ir, 6, 'IR', 1, 0, 'C', true);
    $pdf->Cell($cw_otro, 6, 'OTRO / S/D', 1, 1, 'C', true);
    $y += 6;

    // FUNCIÓN DE IMPRESIÓN CON NbLines
    $printRow = function($c1, $c2, $c3, $c4) use ($pdf, $X, $cw_vaso, $cw_ip, $cw_ir, $cw_otro) {
        $pdf->SetFont('Arial', '', 8);
        
        // Calcular alto máximo de la fila
        $nb1 = $pdf->NbLines($cw_vaso, utf8_decode($c1));
        $nb2 = $pdf->NbLines($cw_ip, utf8_decode($c2));
        $nb3 = $pdf->NbLines($cw_ir, utf8_encode($c3));
        $nb4 = $pdf->NbLines($cw_otro, ($c4));
        
        $h = 5 * max($nb1, $nb2, $nb3, $nb4); // 5mm de alto por línea
        
        // Salto de página
        if($pdf->GetY() + $h > 275) $pdf->AddPage();
        
        $y_curr = $pdf->GetY();
        
        // Imprimir Celdas
        $pdf->SetXY($X, $y_curr); $pdf->MultiCell($cw_vaso, 5, ($c1), 0, 'L');
        $pdf->SetXY($X, $y_curr); $pdf->Rect($X, $y_curr, $cw_vaso, $h);

        $pdf->SetXY($X+$cw_vaso, $y_curr); $pdf->MultiCell($cw_ip, 5, ($c2), 0, 'C');
        $pdf->SetXY($X+$cw_vaso, $y_curr); $pdf->Rect($X+$cw_vaso, $y_curr, $cw_ip, $h);

        $pdf->SetXY($X+$cw_vaso+$cw_ip, $y_curr); $pdf->MultiCell($cw_ir, 5, ($c3), 0, 'C');
        $pdf->SetXY($X+$cw_vaso+$cw_ip, $y_curr); $pdf->Rect($X+$cw_vaso+$cw_ip, $y_curr, $cw_ir, $h);

        $pdf->SetXY($X+$cw_vaso+$cw_ip+$cw_ir, $y_curr); $pdf->MultiCell($cw_otro, 5, ($c4), 0, 'C');
        $pdf->SetXY($X+$cw_vaso+$cw_ip+$cw_ir, $y_curr); $pdf->Rect($X+$cw_vaso+$cw_ip+$cw_ir, $y_curr, $cw_otro, $h);

        $pdf->SetY($y_curr + $h);
    };

    // Imprimir datos
    $printRow('Art. Umbilical', utf8_encode($datosecografia->au_ip), utf8_encode($datosecografia->au_ir), 'S/D: ' . utf8_encode($datosecografia->au_sd));
    $printRow('Art. Cerebral Media', utf8_encode($datosecografia->acm_ip), '-', 'Vmax: ' . utf8_encode($datosecografia->acm_vmax));
    $printRow('Art. Uterinas', 'Der: ' . utf8_encode($datosecografia->ut_der_ip), 'Izq: ' . utf8_encode($datosecografia->ut_izq_ip), utf8_encode($datosecografia->ut_promedio));
    
    $y = $pdf->GetY() + 4;

    // Ductus y CPR
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 9); $pdf->Cell(30, 6, 'Ductus Venoso:', 0); 
    $pdf->SetFont('Arial', '', 9); $pdf->Cell(110, 6, utf8_encode($datosecografia->ductus_venoso), 0); $y += 5;

    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 9); $pdf->Cell(30, 6, 'CPR (Ratio):', 0); 
    $pdf->SetFont('Arial', '', 9); $pdf->Cell(110, 6, utf8_encode($datosecografia->ratio_cerebro_placentario), 0); $y += 10;

    // ==========================================
    // 3. OBSERVACIONES Y CONCLUSIONES
    // ==========================================
    if ($y > 220) { $pdf->AddPage(); $pdf->SetFillColor(230,230,230); $pdf->Rect(10, 5, 50, 277, 'F'); $pdf->Image("public/img/theme/logo.png", 75, 90, 110); $y = 30; }

    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 11); $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell($W, 7, ('  3. OBSERVACIONES ANATÓMICAS'), 0, 1, 'L', true); $y += 8;
    
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', '', 9);
    $pdf->MultiCell($W, 5, utf8_encode($datosecografia->descripcion_anatomica), 0);
    $y = $pdf->GetY() + 6;

    if ($y > 230) { $pdf->AddPage(); $pdf->SetFillColor(230,230,230); $pdf->Rect(10, 5, 50, 277, 'F'); $y = 30; }

    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 11); $pdf->Cell($W, 6, 'CONCLUSIONES:', 0, 1); $y += 6;
    $pdf->SetXY($X, $y); $pdf->SetFont('Arial', '', 10); $pdf->MultiCell($W, 5, utf8_encode($datosecografia->conclusiones), 0); 
    
    if (!empty($datosecografia->sugerencias)) {
        $y = $pdf->GetY() + 6;
        $pdf->SetXY($X, $y); $pdf->SetFont('Arial', 'B', 11); $pdf->Cell($W, 6, 'SUGERENCIAS:', 0, 1); $y += 6;
        $pdf->SetXY($X, $y); $pdf->SetFont('Arial', '', 10); $pdf->MultiCell($W, 5, utf8_encode($datosecografia->sugerencias), 0);
    }

    // Pie
    $pdf->SetFillColor(0,24,0); $pdf->Rect(10, 290, 190, 2, 'F');
    $pdf->SetFont('Arial', '', 9); $pdf->SetTextColor(128,128,128);
    $pdf->SetXY(60, 283); $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');
    $pdf->SetXY(140, 283); $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4); $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4); $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_doppler.pdf');
    exit;
}

}