<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colposcopia extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Colposcopia_model");
        $this->load->library('upload'); // Cargar librería de subida
    }

    public function index() {
        $colposcopias = $this->Colposcopia_model->getColposcopia();
        $data = ["colposcopia" => $colposcopias];
        $this->load->view("administrador/colposcopia", $data);
    }

    public function crearColposcopia() {
        // 1. CONFIGURACIÓN DE SUBIDA DE IMÁGENES (Más seguro que move_uploaded_file)
        $config['upload_path']   = './public/colposcopia/'; // Asegúrate que esta carpeta exista
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5120; // 5MB
        $config['encrypt_name']  = TRUE; // Encripta el nombre (ej: 837483.jpg)

        // Verificamos si la carpeta existe, si no, la creamos
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        // 2. SUBIR IMAGEN 1
        $imagen1 = "";
        if (!empty($_FILES['imagen1']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('imagen1')) {
                $uploadData = $this->upload->data();
                $imagen1 = $uploadData['file_name'];
            }
        }

        // 3. SUBIR IMAGEN 2
        $imagen2 = "";
        if (!empty($_FILES['imagen2']['name'])) {
            $this->upload->initialize($config); // Reiniciamos config
            if ($this->upload->do_upload('imagen2')) {
                $uploadData = $this->upload->data();
                $imagen2 = $uploadData['file_name'];
            }
        }

        // 4. SUBIR IMAGEN 3
        $imagen3 = "";
        if (!empty($_FILES['imagen3']['name'])) {
            $this->upload->initialize($config); // Reiniciamos config
            if ($this->upload->do_upload('imagen3')) {
                $uploadData = $this->upload->data();
                $imagen3 = $uploadData['file_name'];
            }
        }

        // 5. PREPARAR TODOS LOS DATOS (Texto + Imágenes)
        // Nota: He actualizado los nombres de los campos a los del NUEVO FORMULARIO
        $data = [
            // Datos Paciente / Sistema
            "dni"              => $this->input->post("dni"),
            "nombre"           => $this->input->post("nombre"),
            "medico"           => $this->input->post("medico"),
            "fecha"            => $this->input->post("fecha"),
            "conclusiones"     => $this->input->post("conclusiones"),
            
            // Nuevos Campos Médicos (Estandarizados)
            "escamo_columnar"  => $this->input->post("escamo_columnar"),
            "hallazgos_cervix" => $this->input->post("hallazgos_cervix"), // Antes endocervix
            "vagina"           => $this->input->post("vagina"),
            "vulva"            => $this->input->post("vulva"),
            "perineo_anal"     => $this->input->post("perineo_anal"), // Campo unificado
            "biopsia"          => $this->input->post("biopsia"),
            "papanicolaou"     => $this->input->post("papanicolaou"), // Nuevo
            
            // Imágenes (Guardamos el nombre del archivo)
            "imagen1"          => $imagen1,
            "imagen2"          => $imagen2,
            "imagen3"          => $imagen3
        ];

        // 6. GUARDAR EN UN SOLO PASO
        $this->Colposcopia_model->crearColposcopia($data);

        // Redireccionar
        redirect(base_url("administracion/colposcopia"));
    }

    // Tu función PDF se mantiene igual, solo asegúrate que el modelo traiga los nuevos campos
    public function crearpdfcolposcopia() {
        $id = $this->uri->segment(3);
        $this->load->library("pdf");
        $pdfAct = new Pdf();
        $colposcopias = $this->Colposcopia_model->crearpdfcolposcopia($id);
        $data = [
            "colposcopia" => $colposcopias,
        ];
        $this->load->view("administrador/pdfcolposcopia", $data);
    }
}