<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sami extends Admin_Controller {

    public function camas() {
      $this->load->view('SAMI/camas'); 
    }

    public function acostarPaciente() {
      $this->load->view('SAMI/acostarpaciente');  
    }

    public function solicitudFarmacia() {
      $this->load->view('SAMI/solicitudfarmacia'); 
    }

    public function despachoFarmacia() {
      $this->load->view('SAMI/despachosfarmacia');  
    }
    public function aplicacionMedicamentos() {
      $this->load->view('SAMI/aplicacionmedicamentos');  
    }
}