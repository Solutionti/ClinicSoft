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
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaTiroidesPdf($dni)->result()[0]; 

  $this->load->library('PDF_UTF8');
  $pdf = new PDF_UTF8();
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false);

  // Marca de agua
$pdf->SetAlpha(0.1);
$pdf->Image("public/img/theme/logo.png", 70, 90, 120);
$pdf->SetAlpha(1);

// Barra lateral izquierda con imágenes
$pdf->SetFillColor(230,230,230);
$pdf->Rect(10, 5, 50, 277, 'F');

// Imágenes en la barra lateral
$pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
$pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
$pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

// Lista de ecografías (igual que antes)
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15, 140);

$listado = array(
    "Ecografía Morfológica",
    "Ecografía Genética",
    "Ecografía Obstétrica",
    "Ecografía Obstétrica Doppler",
    "Ecografía Seguimiento",
    "Ovulatorio",
    "Ecografía Transvaginal",
    "Ecografía Obstétrica – Dopple",
    "Ecografía Gemelar",
    "Ecografía 3D, 4D, 5D",
    "Ecografía de Mamas",
    "",
    "OTRAS ECOGRAFÍAS",
    "Ecografía Partes Blandas",
    "Ecografía Abdominal",
    "Ecografía Tiroides",
    "Ecografía Pélvica"
);

foreach($listado as $item) {
    $pdf->Cell(50, 4, $item, 0, 1, 'L');
    $pdf->SetX(15);
}


// Imágenes adicionales en la barra lateral
$pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
$pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);


$pdf->SetFont('Arial', 'B', 14);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA TIROIDES'), 0, 1, 'C');

// Información del paciente
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 30);
$pdf->Cell(30, 6, 'PACIENTE:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);

$pdf->SetXY(70, 36);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'DNI:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->documento, 0);

$pdf->SetXY(70, 42);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'EDAD:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);

$pdf->SetXY(70, 48);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'FECHA:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->fecha, 0);

$pdf->SetXY(70, 54);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'MÉDICO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);

// MOTIVO
$pdf->SetXY(70, 60);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'MOTIVO DE EXAMEN:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 67);
$pdf->MultiCell(130, 5, $datosecografia->motivo, 0);

// TIROIDES
$pdf->SetXY(70, 80);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'TIROIDES:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 87);
$pdf->MultiCell(130, 5, $datosecografia->descripcionTiroides, 0);

// Lóbulos y Istmo
$pdf->SetXY(70, 102);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Lóbulo Derecho:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->lobuloDerecho, 0);

$pdf->SetXY(70, 109);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Lóbulo Izquierdo:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->lobuloIzquierdo, 0);

$pdf->SetXY(70, 116);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Istmo:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->istmo, 0);

// Estructuras y Glandulas
$pdf->SetXY(70, 123);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'ESTRUCTURAS ADYACENTES:', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 130);
$pdf->Cell(50, 6, 'Estructuras Vasculares:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->estructurasVasculares, 0);

$pdf->SetXY(70, 137);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Glándulas Submaxilares:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->glandulasSubmaxilares, 0);

$pdf->SetXY(70, 144);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Adenopatía Cervicales:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->adenopatiaCervicales, 0);

// Piel y TCSC
$pdf->SetXY(70, 151);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'PIEL Y TCSC:', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 158);
$pdf->Cell(50, 6, 'Piel:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 6, $datosecografia->piel, 0);

$pdf->SetXY(70, 165);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'TCSC:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(80, 6, $datosecografia->tcsc, 0);

// Conclusiones
$pdf->SetXY(70, 180);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 187);
$pdf->MultiCell(130, 5, $datosecografia->conclusiones, 0);

// Sugerencias
$pdf->SetXY(70, 205);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 212);
$pdf->MultiCell(130, 5, $datosecografia->sugerencias, 0);


// Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

$pdf->Output('I', 'ecografia_tiroides.pdf');
exit;

}


public function getEcografiaHisterosonografiaPdf($dni) {
    $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
    $datosecografia = $this->Ecografias_model->getEcografiaHisterosonografiaPdf($dni)->result()[0];

       //documentar esta linea para que genere el pdf 
       
     // print_r($datosPaciente);
    // echo "<br><br><br><br>";
    //print_r($datosecografia);
    //   

  $this->load->library('PDF_UTF8');
  $pdf = new PDF_UTF8();
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false);

  // Marca de agua
$pdf->SetAlpha(0.1);
$pdf->Image("public/img/theme/logo.png", 70, 90, 120);
$pdf->SetAlpha(1);

// Barra lateral izquierda con imágenes
$pdf->SetFillColor(230,230,230);
$pdf->Rect(10, 5, 50, 277, 'F');

// Imágenes en la barra lateral
$pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
$pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
$pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);

// Lista de ecografías (igual que antes)
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(15, 140);

$listado = array(
    "Ecografía Morfológica",
    "Ecografía Genética",
    "Ecografía Obstétrica",
    "Ecografía Obstétrica Doppler",
    "Ecografía Seguimiento",
    "Ovulatorio",
    "Ecografía Transvaginal",
    "Ecografía Obstétrica – Dopple",
    "Ecografía Gemelar",
    "Ecografía 3D, 4D, 5D",
    "Ecografía de Mamas",
    "",
    "OTRAS ECOGRAFÍAS",
    "Ecografía Partes Blandas",
    "Ecografía Abdominal",
    "Ecografía Tiroides",
    "Ecografía Pélvica"
);

foreach($listado as $item) {
    $pdf->Cell(50, 4, $item, 0, 1, 'L');
    $pdf->SetX(15);
}


// Imágenes adicionales en la barra lateral
$pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
$pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);


$pdf->SetFont('Arial', 'B', 14);
    $pdf->SetXY(70, 10);
    $pdf->Cell(130, 10, ('ECOGRAFÍA HISTEROSONOGRAFIA'), 0, 1, 'C');

// Información del paciente
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 30);
$pdf->Cell(30, 6, 'PACIENTE:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);

$pdf->SetXY(70, 36);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'DNI:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->documento, 0);

$pdf->SetXY(70, 42);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'EDAD:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);

$pdf->SetXY(70, 48);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'FECHA:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->fecha, 0);

$pdf->SetXY(70, 54);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'MÉDICO:', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);

// MOTIVO
$pdf->SetXY(70, 65);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'MOTIVO DE EXAMEN:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 70);
$pdf->MultiCell(130, 5, $datosecografia->motivo, 0);

// DESCRIPCIÓN DEL PROCEDIMIENTO
$pdf->SetXY(70, 85);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'DESCRIPCIÓN DEL PROCEDIMIENTO:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 92);
$pdf->MultiCell(130, 5, $datosecografia->descripcionProcedimiento, 0);

// CONCLUSIONES
$pdf->SetXY(70, 130);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 137);
$pdf->MultiCell(130, 5, $datosecografia->conclusiones, 0);

// SUGERENCIAS
$pdf->SetXY(70, 160);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(70, 167);
$pdf->MultiCell(130, 5, $datosecografia->sugerencias, 0);


// Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_histerosonografia.pdf');
    exit;


    }

    public function getEcografiaArterialPdf($dni) {
        $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
        $datosecografia = $this->Ecografias_model->getEcografiaArterialPdf($dni)->result()[0];  
    
      $this->load->library('PDF_UTF8');
      $pdf = new PDF_UTF8();
      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false);
    
      // Marca de agua
    $pdf->SetAlpha(0.1);
    $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
    $pdf->SetAlpha(1);
    
    // Barra lateral izquierda con imágenes
    $pdf->SetFillColor(230,230,230);
    $pdf->Rect(10, 5, 50, 277, 'F');
    
    // Imágenes en la barra lateral
    $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
    $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
    $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
    
    // Lista de ecografías (igual que antes)
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(15, 140);
    
    $listado = array(
        "Ecografía Morfológica",
        "Ecografía Genética",
        "Ecografía Obstétrica",
        "Ecografía Obstétrica Doppler",
        "Ecografía Seguimiento",
        "Ovulatorio",
        "Ecografía Transvaginal",
        "Ecografía Obstétrica – Dopple",
        "Ecografía Gemelar",
        "Ecografía 3D, 4D, 5D",
        "Ecografía de Mamas",
        "",
        "OTRAS ECOGRAFÍAS",
        "Ecografía Partes Blandas",
        "Ecografía Abdominal",
        "Ecografía Tiroides",
        "Ecografía Pélvica"
    );
    
    foreach($listado as $item) {
        $pdf->Cell(50, 4, $item, 0, 1, 'L');
        $pdf->SetX(15);
    }
    
    
    // Imágenes adicionales en la barra lateral
    $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
    $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    
    
    $pdf->SetFont('Arial', 'B', 13);
        $pdf->SetXY(70, 10);
        $pdf->Cell(130, 10, ('ECOGRAFÍA DOPPLER ARTERIAL DE MIEMBROS INFERIORES'), 0, 1, 'C');
    
    // Información del paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30);
    $pdf->Cell(30, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);
    
    $pdf->SetXY(70, 36);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);
    
    $pdf->SetXY(70, 48);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->fecha, 0);
    
    $pdf->SetXY(70, 54);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, utf8_decode($datosecografia->codigo_doctor), 0);

    // MIEMBRO INFERIOR DERECHO
    $pdf->SetXY(70, 60);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MIEMBRO INFERIOR DERECHO', 0, 1);
    
    // Descripción del procedimiento derecho
    if (!empty($datosecografia->descripcionProcedimientoDerecho)) {
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(70, 68);
        $pdf->MultiCell(130, 5, $datosecografia->descripcionProcedimientoDerecho, 0);
        $pdf->Ln(3);
    }

    // Tabla para miembro inferior derecho
    $pdf->SetXY(70, 75);
    
    // Encabezados de tabla
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(60, 7, 'ARTERIA', 1, 0, 'C');
    $pdf->Cell(35, 7, 'VPS (cm/seg)', 1, 0, 'C');
    $pdf->Cell(35, 7, 'ONDA', 1, 1, 'C');
    
    // Datos de la tabla
    $pdf->SetFont('Arial', '', 9);
    
    // Femoral Común
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Femoral Común', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_fc_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_fc_derecho, 1, 1, 'C');
    
    // Femoral Superficial
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Femoral Superficial', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_fs_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_fs_derecho, 1, 1, 'C');
    
    // Poplítea
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Poplítea', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_poplitea_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_poplitea_derecho, 1, 1, 'C');
    
    // Tibial Posterior
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Tibial Posterior', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_tp_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_tp_derecho, 1, 1, 'C');
    
    // Tibial Anterior
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Tibial Anterior', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_ta_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_ta_derecho, 1, 1, 'C');
    
    // Pedia
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Pedia', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_media_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_media_derecho, 1, 1, 'C');

    // MIEMBRO INFERIOR IZQUIERDO
    $pdf->SetXY(70, 125);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MIEMBRO INFERIOR IZQUIERDO', 0, 1);
    
    // Descripción del procedimiento izquierdo
    if (!empty($datosecografia->descripcionProcedimientoIzquierdo)) {
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(70, 132);
        $pdf->MultiCell(130, 5, $datosecografia->descripcionProcedimientoIzquierdo, 0);
        $pdf->Ln(3);
    }

    // Tabla para miembro inferior izquierdo
    $pdf->SetXY(70, 140);
    
    // Encabezados de tabla
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(60, 7, 'ARTERIA', 1, 0, 'C');
    $pdf->Cell(35, 7, 'VPS (cm/seg)', 1, 0, 'C');
    $pdf->Cell(35, 7, 'ONDA', 1, 1, 'C');
    
    // Datos de la tabla
    $pdf->SetFont('Arial', '', 9);
    
    // Femoral Común
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Femoral Común', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_fc_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_fc_izquierdo, 1, 1, 'C');
    
    // Femoral Superficial
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Femoral Superficial', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_fs_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_fs_izquierdo, 1, 1, 'C');
    
    // Poplítea
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Poplítea', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_poplitea_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_poplitea_izquierdo, 1, 1, 'C');
    
    // Tibial Posterior
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Tibial Posterior', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_tp_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_tp_izquierdo, 1, 1, 'C');
    
    // Tibial Anterior
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Tibial Anterior', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_ta_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_ta_izquierdo, 1, 1, 'C');
    
    // Pedia
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'Pedia', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->vps_media_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->onda_media_izquierdo, 1, 1, 'C');

    // CONCLUSIONES
    $pdf->SetXY(70, 190);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'CONCLUSIONES:', 0, 1);
    
    // Separamos las conclusiones por líneas y las mostramos con viñetas
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 197);
    $pdf->MultiCell(130, 5, $datosecografia->conclusiones, 0);

    // SUGERENCIAS
    $pdf->SetXY(70, 220);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 227);
    $pdf->MultiCell(130, 5, $datosecografia->sugerencias, 0);

    // Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_arterial.pdf');
    exit;
    
    }

    public function getEcografiaVenosaPdf($dni) {
        $datosPaciente = $this->Ecografias_model->getDatosPaciente($dni)->result()[0];
        $datosecografia = $this->Ecografias_model->getEcografiaVenosaPdf($dni)->result()[0];
    
           //documentar esta linea para que genere el pdf 
           
          //print_r($datosPaciente);
         //echo "<br><br><br><br>";
      // print_r($datosecografia);
        //   
    
      $this->load->library('PDF_UTF8');
      $pdf = new PDF_UTF8();
      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false);
    
      // Marca de agua
    $pdf->SetAlpha(0.1);
    $pdf->Image("public/img/theme/logo.png", 70, 90, 120);
    $pdf->SetAlpha(1);
    
    // Barra lateral izquierda con imágenes
    $pdf->SetFillColor(230,230,230);
    $pdf->Rect(10, 5, 50, 277, 'F');
    
    // Imágenes en la barra lateral
    $pdf->Image("public/img/theme/ecografia_mama.jpg", 12, 20, 46, 30);
    $pdf->Image("public/img/theme/ecografia_renal.jpg", 12, 60, 46, 30);
    $pdf->Image("public/img/theme/ecografia_prostatica.jpg", 12, 100, 46, 30);
    
    // Lista de ecografías (igual que antes)
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(15, 140);
    
    $listado = array(
        "Ecografía Morfológica",
        "Ecografía Genética",
        "Ecografía Obstétrica",
        "Ecografía Obstétrica Doppler",
        "Ecografía Seguimiento",
        "Ovulatorio",
        "Ecografía Transvaginal",
        "Ecografía Obstétrica – Dopple",
        "Ecografía Gemelar",
        "Ecografía 3D, 4D, 5D",
        "Ecografía de Mamas",
        "",
        "OTRAS ECOGRAFÍAS",
        "Ecografía Partes Blandas",
        "Ecografía Abdominal",
        "Ecografía Tiroides",
        "Ecografía Pélvica"
    );
    
    foreach($listado as $item) {
        $pdf->Cell(50, 4, $item, 0, 1, 'L');
        $pdf->SetX(15);
    }
    
    
    // Imágenes adicionales en la barra lateral
    $pdf->Image("public/img/theme/ecografia_abdominal.jpg", 12, 210, 46, 30);
    $pdf->Image("public/img/theme/ecografia_tiroides.jpg", 12, 245, 46, 30);
    
    
    $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetXY(70, 10);
        $pdf->Cell(130, 10, ('ECOGRAFÍA DOPPLER VENOSO DE MIEMBROS INFERIORES'), 0, 1, 'C');
    
    // Información del paciente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(70, 30);
    $pdf->Cell(30, 6, 'PACIENTE:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->nombre . ' ' . $datosPaciente->apellido, 0);
    
    $pdf->SetXY(70, 36);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'DNI:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->documento, 0);
    
    $pdf->SetXY(70, 42);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'EDAD:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosPaciente->edad . ' años', 0);
    
    $pdf->SetXY(70, 48);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'FECHA:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->fecha, 0);
    
    $pdf->SetXY(70, 54);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 6, 'MÉDICO:', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 6, $datosecografia->codigo_doctor, 0);

    // MIEMBRO INFERIOR DERECHO
    $pdf->SetXY(70, 60);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MIEMBRO INFERIOR DERECHO', 0, 1);
    
    // Descripción del procedimiento derecho
    if (!empty($datosecografia->descripcionProcedimientoDerecho)) {
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(70, 65);
        $pdf->MultiCell(130, 5, $datosecografia->descripcionProcedimientoDerecho, 0);
        $pdf->Ln(3);
    }

    // Tabla para miembro inferior derecho
    $pdf->SetXY(70, 75);
    
    // Encabezados de tabla
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(60, 7, 'VENA', 1, 0, 'C');
    $pdf->Cell(35, 7, 'MEDIDA MM', 1, 0, 'C');
    $pdf->Cell(35, 7, 'REFLUJO', 1, 1, 'C');
    
    // Datos de la tabla
    $pdf->SetFont('Arial', '', 9);
    
    // Femoral Común
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'F. COMÚN', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_fc_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_fc_derecho, 1, 1, 'C');
    
    // Safena Mayor Muslo
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'SAFENA MAYOR MUSLO', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_fs_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_fs_derecho, 1, 1, 'C');
    
    // Safena Mayor Pierna
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'SAFENA MAYOR PIERNA', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_tp_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_tp_derecho, 1, 1, 'C');
    
    // Poplítea
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'POPLÍTEA', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_poplitea_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_poplitea_derecho, 1, 1, 'C');
    
    // Safena Menor
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'SAFENA MENOR', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_ta_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_ta_derecho, 1, 1, 'C');
    
    // Perforantes
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'PERFORANTES', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_media_derecho, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_media_derecho, 1, 1, 'C');

    // MIEMBRO INFERIOR IZQUIERDO
    $pdf->SetXY(70, 125);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'MIEMBRO INFERIOR IZQUIERDO', 0, 1);
    
    // Descripción del procedimiento izquierdo
    if (!empty($datosecografia->descripcionProcedimientoIzquierdo)) {
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(70, 132);
        $pdf->MultiCell(130, 5, $datosecografia->descripcionProcedimientoIzquierdo, 0);
        $pdf->Ln(3);
    }

    // Tabla para miembro inferior izquierdo
    $pdf->SetXY(70, 145);
    
    // Encabezados de tabla
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(60, 7, 'VENA', 1, 0, 'C');
    $pdf->Cell(35, 7, 'MEDIDA MM', 1, 0, 'C');
    $pdf->Cell(35, 7, 'REFLUJO', 1, 1, 'C');
    
    // Datos de la tabla
    $pdf->SetFont('Arial', '', 9);
    
    // Femoral Común
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'F. COMÚN', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_fc_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_fc_izquierdo, 1, 1, 'C');
    
    // Safena Mayor Muslo
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'SAFENA MAYOR MUSLO', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_fs_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_fs_izquierdo, 1, 1, 'C');
    
    // Safena Mayor Pierna
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'SAFENA MAYOR PIERNA', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_tp_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_tp_izquierdo, 1, 1, 'C');
    
    // Poplítea
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'POPLÍTEA', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_poplitea_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_poplitea_izquierdo, 1, 1, 'C');
    
    // Safena Menor
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'SAFENA MENOR', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_ta_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_ta_izquierdo, 1, 1, 'C');
    
    // Perforantes
    $pdf->SetX(70);
    $pdf->Cell(60, 6, 'PERFORANTES', 1, 0, 'L');
    $pdf->Cell(35, 6, $datosecografia->medida_media_izquierdo, 1, 0, 'C');
    $pdf->Cell(35, 6, $datosecografia->reflujo_media_izquierdo, 1, 1, 'C');

    // CONCLUSIONES
    $pdf->SetXY(70, 190);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'CONCLUSIÓN:', 0, 1);

    // Mostramos las conclusiones como texto normal
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 197);
    $pdf->MultiCell(130, 5, $datosecografia->conclusiones, 0);

    
    // SUGERENCIAS
    $pdf->SetXY(70, 220);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(130, 6, 'SUGERENCIAS:', 0, 1);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(70, 227);
    $pdf->MultiCell(130, 5, $datosecografia->sugerencias, 0);

    // Pie de página
     // Borde superior decorativo
     $pdf->SetFillColor(0,24,0); // Verde oscuro
     $pdf->Rect(10, 290, 190, 2, 'F');
 
     // Información de contacto
    // Lado izquierdo - Dirección
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(128,128,128); // Color gris para el texto
    $pdf->SetXY(60, 283);
    $pdf->Cell(100, 5, ('DIRECCIÓN: Av. Salaverry 1402 - Urb. Bancarios'), 0, 0, 'L');

    // Lado derecho - Celular e íconos
    $pdf->SetXY(140, 283);
    $pdf->Cell(30, 5, 'CELULAR: 902720312', 0, 0, 'R');
    
    // Íconos al lado del celular
    $pdf->Image("public/img/theme/facebook.png", 175, 283, 4, 4);
    $pdf->Image("public/img/theme/instagram.png", 182, 283, 4, 4);
    $pdf->Image("public/img/theme/wsp.jpeg", 189, 283, 4, 4);

    $pdf->Output('I', 'ecografia_venoso.pdf');
    exit;

    }

}