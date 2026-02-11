<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/fpdf/fpdf.php';

class PDF_UTF8 extends FPDF {
    function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='') {
        $txt = utf8_decode($txt);
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
    }

    function MultiCell($w, $h, $txt, $border=0, $align='J', $fill=false) {
        $txt = utf8_decode($txt);
        parent::MultiCell($w, $h, $txt, $border, $align, $fill);
    }

    // Agregar esta nueva función para la marca de agua
    var $extgstates = array();

    // Función para establecer la transparencia
    function SetAlpha($alpha, $bm='Normal') {
        // Set alpha for stroking (CA) and non-stroking (ca) operations
        $gs = $this->AddExtGState(array('ca'=>$alpha, 'CA'=>$alpha, 'BM'=>'/'.$bm));
        $this->SetExtGState($gs);
    }

    function AddExtGState($parms) {
        $n = count($this->extgstates)+1;
        $this->extgstates[$n]['parms'] = $parms;
        return $n;
    }

    function SetExtGState($gs) {
        $this->_out(sprintf('/GS%d gs', $gs));
    }

    function _enddoc() {
        if(!empty($this->extgstates) && $this->PDFVersion<'1.4')
            $this->PDFVersion='1.4';
        parent::_enddoc();
    }

    function _putextgstates() {
        for ($i = 1; $i <= count($this->extgstates); $i++) {
            $this->_newobj();
            $this->extgstates[$i]['n'] = $this->n;
            $this->_put('<</Type /ExtGState');
            $parms = $this->extgstates[$i]['parms'];
            $this->_put(sprintf('/ca %.3F', $parms['ca']));
            $this->_put(sprintf('/CA %.3F', $parms['CA']));
            $this->_put('/BM '.$parms['BM']);
            $this->_put('>>');
            $this->_put('endobj');
        }
    }

    function _putresourcedict() {
        parent::_putresourcedict();
        $this->_put('/ExtGState <<');
        foreach($this->extgstates as $k=>$extgstate)
            $this->_put('/GS'.$k.' '.$extgstate['n'].' 0 R');
        $this->_put('>>');
    }

    function _putresources() {
        $this->_putextgstates();
        parent::_putresources();
 
    }
    public function NbLines($w, $txt) {
    // Calcula el número de líneas que ocupará un MultiCell
    $cw = &$this->CurrentFont['cw'];
    if($w==0) $w = $this->w-$this->rMargin-$this->x;
    $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
    $s = str_replace("\r",'',(string)$txt);
    $nb = strlen($s);
    if($nb>0 && $s[$nb-1]=="\n") $nb--;
    $sep = -1; $i = 0; $j = 0; $l = 0; $nl = 1;
    while($i<$nb) {
        $c = $s[$i];
        if($c=="\n") { $i++; $sep = -1; $j = $i; $l = 0; $nl++; continue; }
        if($c==' ') $sep = $i;
        $l += $cw[$c];
        if($l>$wmax) {
            if($sep==-1) { if($i==$j) $i++; } else $i = $sep+1;
            $sep = -1; $j = $i; $l = 0; $nl++;
        } else $i++;
    }
    return $nl;
}
}
