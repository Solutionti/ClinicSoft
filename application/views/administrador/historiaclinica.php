<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>HISTORIA CLINICA</title>
      <?php require_once ('componentes/head.php'); ?>
      <link rel="stylesheet" href="<?php echo base_url('public/css/custom.css'); ?>">
      <!-- Script de reconocimiento de voz -->
      <script src="<?php echo base_url(); ?>public/js/scripts/speechRecognition.js"></script>
   </head>
   <body class="g-sidenav-show bg-gray-100">
    
   <div class="min-height-300 bg-default position-absolute w-100"></div>
   <?php $pacientes = $paciente->result()[0]; ?>
<main class="main-content position-relative border-radius-lg">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                     <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">administración</a></li>
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">historia Clinica</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">historia Clinica</h6>
               </nav>
               <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                  <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                     <div class="input-group">
                     </div>
                  </div>
                  <ul class="navbar-nav  justify-content-end">
                     <li class="nav-item d-flex align-items-center">
                        <a href="<?php echo base_url(); ?>cerrarsesion" class="nav-link text-white font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Cerrar Sesión</span>
                        </a>
                     </li>
                     <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                           <div class="sidenav-toggler-inner">
                              <i class="sidenav-toggler-line bg-white"></i>
                              <i class="sidenav-toggler-line bg-white"></i>
                              <i class="sidenav-toggler-line bg-white"></i>
                           </div>
                        </a>
                     </li>
                     <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                     </li>
                     <li class="nav-item pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
  <div class="container-fluid py-1">
    <div class="row">
      <div class="card" style="overflow: visible;">
        <div class="container-fluid mt-3">
          <div class="row">
            <div class="col-md-3">
               <h4 class="page-header-title h6"> <?php echo $pacientes->nombre . ' ' . $pacientes->apellido; ?></h4>
                <div class="page-header" style="position: relative; z-index: 20; overflow: visible;">
                  <div class="d-flex align-items-lg-center">
                    <div class="flex-shrink-0">
                      <?php
                      $genero = isset($pacientes->sexo) ? strtolower($pacientes->sexo) : '';
                      $imagen = (strpos($genero, 'femenino') !== false || $genero === 'f')
                        ? 'avatar-mujer.jpg'
                        : 'team-41.jpg';
                      ?>
                        <img
                            class="avatar avatar-xl avatar-circle"
                            src="<?php echo base_url('public/img/theme/' . $imagen); ?>"
                            alt="Foto de perfil de <?php echo htmlspecialchars($pacientes->nombre . ' ' . $pacientes->apellido); ?>"
                        >
                    </div>
                    <div class="flex-grow-1 ms-4">
                      <div class="row">
                        <div class="col-lg mb-3 mb-lg-0">
                          <ul class="list-inline list-separator">
                            <li class="list-inline-item">
                              <i class="bi-geo-alt-fill text-primary me-1"></i> <?php echo $pacientes->fecha_nacimiento; ?> - <?php echo $pacientes->edad; ?> años
                            </li>
                            <li style="position: relative; z-index: 30;">
                              <div class="dropdown d-inline-block">
                                <button class="btn btn-info btn-xs mt-3" type="button" id="dropdownNuevaConsulta" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                  Nueva Consulta <i class="fas fa-chevron-down ms-1"></i>
                                </button>
                                <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownNuevaConsulta" style="z-index: 1000;">
                                  <style>.dropdown-menu::before, .dropdown-menu::after { display: none !important; content: none !important; }</style>
                                  <li><a class="dropdown-item" href="#" onclick="abrirHistoriaClinica('1')">Consulta General</a></li>
                                  <li><a class="dropdown-item" href="#" onclick="abrirHistoriaClinica('2')">Consulta de Ginecología</a></li>
                                </ul>
                              </div>
                              <a
                                class="btn btn-danger btn-xs mt-3"
                                data-bs-toggle="modal"
                                data-bs-target="#descargamodalhc"
                                
                              >
                                Ver HC
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="card card-dashed h-900" style="position: relative; z-index: 1;">
              <div class="card-header bg-default"><h6 class="text-white text-uppercase">Ultimos signos vitales</h6></div>
              <div class="card-body px-2">
                <div class="row gx-0">
                    <div class="col-5 ps-1">
                        <ul class="list-inline mb-0">
                          <li class="align-middle me-2"><i class="fas fa-ruler-vertical me-1 text-danger"></i>Estatura</li>
                          <li class="align-middle me-2"><i class="fas fa-weight me-1 text-dark"></i>Peso</li>
                          <li class="align-middle me-2"><i class="fas fa-child me-1 text-warning"></i>Masa</li>
                          <li class="align-middle me-2"><i class="fas fa-thermometer me-1 text-success"></i>Temp</li>
                          <li class="align-middle me-2"><i class="fas fa-diagnoses me-1 text-dark"></i>F. Resp</li>
                          <li class="align-middle me-2"><i class="fas fa-heartbeat me-1 text-danger"></i>F. Card</li>
                          <li class="align-middle"><i class="fas fa-child me-1 text-danger"></i>% Grasa</li>
                        </ul>
                    </div>
                    <div class="col-7 ps-0">
                        <ul class="list-inline mb-0">
                            <li class="align-middle" id="estatura"></li>
                            <li class="align-middle" id="peso"> </li>
                            <li class="align-middle" id="imc"> </li>
                            <li class="align-middle" id="temperatura"></li>
                            <li class="align-middle" id="respiratoria"></li>
                            <li class="align-middle" id="cardiaca"> </li>
                            <li class="align-middle" id="grasa"></li>
                          </ul>
                    </div>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="card card-dashed h-200 mt-3">
              <div class="card-header bg-default"><h6 class="text-white text-uppercase">Archivos</h6></div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <ul
                        class="list-inline"
                        *ngFor="let archivos of archivospdf"
                      >
                        <?php foreach ($documentosPacientes->result() as $documentos) { ?>
                        <li>
                          <?php if ($this->session->userdata('rol') == 'Administrador') { ?>
                          <a
                            href="#"
                            class="mx-1 text-danger"
                            title="Borrar documento"
                            onclick="borrarDocumento('<?php echo $documentos->codigo_documento_pacientes; ?>','<?php echo $documentos->tp_documento; ?>', '<?php echo $documentos->url_documento; ?>')"
                          >
                            <i class="fas fa-times fa-1x"></i>
                          </a>
                          |
                          <?php } ?>
                          <i class="fas fa-file-pdf mx-1 text-danger"></i>
                          <?php if ($documentos->tp_documento == 'HF') { ?>
                          <a
                            target="_blank"
                            href="<?php echo base_url(); ?>public/documentos/<?php echo $documentos->url_documento; ?>"
                          >
                            <?php echo $documentos->titulo; ?> 
                          </a>
                          <?php } else if ($documentos->tp_documento == 'LB') { ?>
                            <a
                            target="_blank"
                            href="<?php echo base_url(); ?>public/documentos/<?php echo $documentos->url_documento; ?>"
                          >
                            <?php echo $documentos->titulo; ?>
                          </a>
                          <?php } else if ($documentos->tp_documento == 'PA') { ?>
                            <a
                            target="_blank"
                            href="<?php echo base_url(); ?>public/documentos/<?php echo $documentos->url_documento; ?>"
                          >
                            <?php echo $documentos->titulo; ?>
                          </a>
                          <?php } ?>
                         </li>
                          <small><?php echo $documentos->codigo_documento_pacientes; ?> | <?php echo $documentos->fecha; ?> </small>
                          
                        <?php } ?>
                      </ul>
                      <button
                        class="btn btn-primary btn-xs"
                        data-bs-toggle="modal" data-bs-target="#archivos"
                        
                      >
                        Subir archivo
                      </button>
                    </div>
                  </div>
              </div>
            </div>
             </div>
             <div class="col-md-6">
               <div class="card card-dashed h-200">
                 <div class="card-header bg-default"><h6 class="text-white text-uppercase">seguimiento de Procesos clinicos anteriores y actual</h6></div> 
                   <div class="card-body">
                     <div class="accordion accordion-btn-icon-start" id="accordionBtnIconStartExample">
                       <div class="accordion-item">
                         <div class="accordion-header" id="btn-icon-start-headingOne">
                           <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#btn-icon-start-collapseOne" aria-expanded="true" aria-controls="btn-icon-start-collapseOne">
                             <span class="ps-1 text-dark text-bold"><i class="fas fa-mortar-pestle"></i> ALERGIAS </span>
                           </a>
                         </div>
      <div id="btn-icon-start-collapseOne" class="accordion-collapse collapse show" aria-labelledby="btn-icon-start-headingOne" data-bs-parent="#accordionBtnIconStartExample">
        <div class="accordion-body">
          <div class="alert alert-primary text-white" role="alert">
            <h6 class="alert-heading">Alergia a Medicamentos</h6>
            <ul class="list-inline ">
              <?php foreach ($alergiamedica->result() as $alergiame) { ?>
                <li class="mx-4 text-capitalize"><?php echo $alergiame->descripcion; ?></li>
              <?php } ?>
            </ul>
            <hr>
            <h6 class="alert-heading">Otras Alergias</h6>
            <ul class="list-inline ">
              <?php foreach ($alergiaotro->result() as $alergiaotro) { ?>
                <li class="mx-4 text-capitalize"><?php echo $alergiaotro->descripcion; ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="accordion-item">
        <div class="accordion-header" id="btn-icon-start-headingThree">
          <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#btn-icon-start-collapseThree" aria-expanded="false" aria-controls="btn-icon-start-collapseThree">
              <span class="ps-1 text-dark text-bold"><i class="fas fa-utensils"></i> DIETA NUTRICIONAL</span>
          </a>
        </div>
        <div id="btn-icon-start-collapseThree" class="accordion-collapse collapse" aria-labelledby="btn-icon-start-headingThree" data-bs-parent="#accordionBtnIconStartExample">
          <div class="accordion-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                      <th class="text-uppercase text-xs">Codigo</th>
                      <th class="text-uppercase text-xs">Descripcion de la dieta</th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div> -->
      <div class="accordion-item">
        <div class="accordion-header" id="btn-icon-start-headingThree">
          <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#diagnosticos" aria-expanded="false" aria-controls="diagnosticos">
              <span class="ps-1 text-dark text-bold"><i class="fas fa-diagnoses"></i> DIAGNOSTICOS</span>
          </a>
        </div>
        <div id="diagnosticos" class="accordion-collapse collapse" aria-labelledby="btn-icon-start-headingThree" data-bs-parent="#accordionBtnIconStartExample">
          <div class="accordion-body">
            <!--PONER TABLA-->
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                        <tr class="bg-dark text-white">
                          <th class="text-uppercase text-xs">codigo</th>
                          <th class="text-uppercase text-xs">Nombre Diagnostico</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($diagpaciente->result() as $diagnosticos) { ?>
                      <tr class="text-capitalize">
                        <td> <?php echo $diagnosticos->clave; ?> </td>
                        <td> <?php echo $diagnosticos->descripcion; ?> </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-header" id="btn-icon-start-headingThree">
          <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#procedimientos" aria-expanded="false" aria-controls="procedimientos">
              <span class="ps-1 text-dark text-bold"><i class="fas fa-procedures"></i> PROCEDIMIENTOS</span>
          </a>
        </div>
        <div id="procedimientos" class="accordion-collapse collapse" aria-labelledby="btn-icon-start-headingThree" data-bs-parent="#accordionBtnIconStartExample">
          <div class="accordion-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                        <tr class="bg-dark text-white">
                          <th class="text-uppercase text-xs">codigo</th>
                          <th class="text-uppercase text-xs">Nombre procedimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($procepaciente->result() as $procedimientoss) { ?>
                      <tr class="text-capitalize">
                        <td><?php echo $procedimientoss->codigo_cpt; ?>  </td>
                        <td><?php echo $procedimientoss->nombre; ?>  </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-header" id="btn-icon-start-headingThree">
          <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#medicamentosactivos" aria-expanded="false" aria-controls="medicamentosactivos">
              <span class="ps-1 text-dark text-bold"><i class="fas fa-pills"></i> RECETA MEDICA</span>
          </a>
        </div>
        <div id="medicamentosactivos" class="accordion-collapse collapse" aria-labelledby="btn-icon-start-headingThree" data-bs-parent="#accordionBtnIconStartExample">
          <div class="accordion-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="bg-dark text-white">
                    <th class="text-uppercase text-xs"></th>
                    <th class="text-uppercase text-xs">Codigo</th>
                    <th class="text-uppercase text-xs">Fecha</th>
                    <th class="text-uppercase text-xs">triage</th>
                    <th class="text-uppercase text-xs">Usuario</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($recetas->result() as $medicamentos) { ?>
                  <tr class="text-capitalize">
                    <td>
                      <div class="row">
                        <a 
                          href="<?php echo base_url(); ?>administracion/pdfmedicamentosorden/<?php echo $medicamentos->paciente; ?>/<?php echo $medicamentos->triage; ?>"
                          class="icon icon-shape icon-sm bg-gradient-danger shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                        >
                          <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>

                      </div>
                    </td>
                    <td><?php echo $medicamentos->codigoreceta_medica; ?></td>
                    <td><?php echo $medicamentos->fecha; ?></td>
                    <td><?php echo $medicamentos->triage; ?> </td>
                    <td><?php echo $medicamentos->usuario; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-header" id="btn-icon-start-headingThree">
          <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#examenesauxiliares" aria-expanded="false" aria-controls="examenesauxiliares">
              <span class="ps-1 text-dark text-bold"><i class="fas fa-briefcase-medical"></i> ORDENAMIENTOS</span>
          </a>
        </div>
        <div id="examenesauxiliares" class="accordion-collapse collapse" aria-labelledby="btn-icon-start-headingThree" data-bs-parent="#accordionBtnIconStartExample">
          <div class="accordion-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr class="bg-dark text-white">
                      <th></th>
                      <th class="text-uppercase text-xs">Nombre Paciente</th>
                      <th class="text-uppercase text-xs">Tipo ordenamiento</th>
                      <th class="text-uppercase text-xs">Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ordenpatologica->result() as $ordenpato) { ?>
                    <tr>
                      <td>
                        <div class="row">
                          <a 
                            href="<?php echo base_url(); ?>administracion/pdfpatologiaorden/<?php echo $ordenpato->triage ?>/<?php echo $ordenpato->documento ?>"
                            class="icon icon-shape icon-sm bg-gradient-danger shadow text-center mx-3"
                            target="_blank"
                            title="Generar tiquet"
                          >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                          </a>
                        </div>
                      </td>
                      <td><?php echo $ordenpato->nombre; ?></td>
                      <td>Orden Patologica</td>
                      <td><?php echo $ordenpato->fecha; ?></td>
                    </tr>
                    <?php } ?>
                    <!--  -->
                    <?php foreach ($ordenLaboratorio->result() as $ordenlabo) { ?>
                    <tr>
                      <td>
                        <div class="row">
                          <a 
                            class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                            target="_blank"
                            title="Generar tiquet"
                            href="<?php echo base_url(); ?>administracion/pdflaboratoriorden/<?php echo $ordenlabo->cod_triage ?>/<?php echo $ordenlabo->documento_paciente ?>/<?php echo $ordenlabo->codigo_laboratorio ?>"
                          >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                          </a>
                        </div>
                      </td>
                      <td><?php echo $ordenlabo->nombre; ?></td>
                      <td>Orden Laboratorio</td>
                      <td><?php echo $ordenlabo->fecha; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="accordion-item">
        <div class="accordion-header" id="btn-icon-start-headingThree">
          <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#ecografias" aria-expanded="false" aria-controls="ecografias">
              <span class="ps-1 text-dark text-bold"><i class="fas fa-x-ray"></i> ECOGRAFIAS</span>
          </a>
        </div>
        <div id="ecografias" class="accordion-collapse collapse" aria-labelledby="btn-icon-start-headingThree" data-bs-parent="#accordionBtnIconStartExample">
          <div class="accordion-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped table-hover">
                  <thead  class="bg-dark text-white">
                    <th>
                      
                    </th>
                    <th class="text-uppercase text-xs">Tipo de ecografia</th>
                    <th class="text-uppercase text-xs">Doctor</th>
                    <th class="text-uppercase text-xs">fecha y hora</th>
                  </thead>
                  <tbody>
                    <?php foreach ($ecoAbdominales->result() as $acoabdominal) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiaabdominal/<?php echo $acoabdominal->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Abdominal</td>
                      <td><?php echo $acoabdominal->codigo_doctor; ?></td>
                      <td><?php echo $acoabdominal->fecha; ?></td>
                    </tr>
                    <?php } ?>
                      
                    <?php foreach ($ecoMamas->result() as $ecoMama) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiamama/<?php echo $ecoMama->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Mama</td>
                      <td><?php echo $ecoMama->codigo_doctor ?></td>
                      <td><?php echo $ecoMama->fecha ?></td>
                    </tr>
                    <?php } ?>

                     <?php foreach ($ecoGeneticas->result() as $ecoGenetica) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiagenetica/<?php echo $ecoGenetica->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Genetica</td>
                      <td><?php echo $ecoGenetica->codigo_doctor ?></td>
                      <td><?php echo $ecoGenetica->fecha ?></td>
                    </tr>
                    <?php } ?>


                     <?php foreach ($ecoMorfologicas->result() as $ecoMorfologica) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiamorfologica/<?php echo $ecoMorfologica->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Morfologica</td>
                      <td><?php echo $ecoMorfologica->codigo_doctor ?></td>
                      <td><?php echo $ecoMorfologica->fecha ?></td>
                    </tr>
                    <?php } ?>


                     <?php foreach ($ecoTrasvaginals->result() as $ecoTrasvaginal) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiatrasvaginal/<?php echo $ecoTrasvaginal->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Trasvaginal</td>
                      <td><?php echo $ecoTrasvaginal->codigo_doctor ?></td>
                      <td><?php echo $ecoTrasvaginal->fecha ?></td>
                    </tr>
                    <?php } ?>

                    <?php foreach ($ecoPelvicas->result() as $ecoPelvica) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiapelvica/<?php echo $ecoPelvica->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Pelvica</td>
                      <td><?php echo $ecoPelvica->codigo_doctor ?></td>
                      <td><?php echo $ecoPelvica->fecha ?></td>
                    </tr>
                    <?php } ?>

                    <?php foreach ($ecoObstetricas->result() as $ecoObstetrica) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiaobstetrica/<?php echo $ecoObstetrica->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Obstetrica</td>
                      <td><?php echo $ecoObstetrica->codigo_doctor ?></td>
                      <td><?php echo $ecoObstetrica->fecha ?></td>
                    </tr>
                    <?php } ?>

                     <?php foreach ($ecoProstaticas->result() as $ecoProstatica) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiaprostatica/<?php echo $ecoProstatica->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Prostatica</td>
                      <td><?php echo $ecoProstatica->codigo_doctor ?></td>
                      <td><?php echo $ecoProstatica->fecha ?></td>
                    </tr>
                    <?php } ?>

                    <?php foreach ($ecoRenals->result() as $ecoRenal) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiarenal/<?php echo $ecoRenal->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Renal</td>
                      <td><?php echo $ecoRenal->codigo_doctor ?></td>
                      <td><?php echo $ecoRenal->fecha ?></td>
                    </tr>
                    <?php } ?>


                     <?php foreach ($ecoTiroidess->result() as $ecoTiroides) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiatiroides/<?php echo $ecoTiroides->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Tiroides</td>
                      <td><?php echo $ecoTiroides->codigo_doctor ?></td>
                      <td><?php echo $ecoTiroides->fecha ?></td>
                    </tr>
                    <?php } ?>

                     <?php foreach ($ecoHisterosonografias->result() as $ecoHisterosonografia) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiaHisterosonografia/<?php echo $ecoHisterosonografia->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Histerosonografia</td>
                      <td><?php echo $ecoHisterosonografia->codigo_doctor ?></td>
                      <td><?php echo $ecoHisterosonografia->fecha ?></td>
                    </tr>
                    <?php } ?>

                      <?php foreach ($ecoArterials->result() as $ecoArterial) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiaarterial/<?php echo $ecoArterial->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Arterial</td>
                      <td><?php echo $ecoArterial->codigo_doctor ?></td>
                      <td><?php echo $ecoArterial->fecha ?></td>
                    </tr>
                    <?php } ?>


                      <?php foreach ($ecoVenosas->result() as $ecoVenosa) { ?>
                    <tr>
                      <td>
                        <div class="row">
                        <a 
                          class="icon icon-shape icon-sm bg-gradient-primary shadow text-center mx-3"
                          target="_blank"
                          title="Generar tiquet"
                          href="<?php echo base_url(); ?>administracion/pdfecografiavenosa/<?php echo $ecoVenosa->documento_paciente; ?>"
                        >
                            <i class="fas fa-file-pdf text-white opacity-10"></i>
                        </a>
                        </div>
                      </td>
                      <td>Ecografia Venosa</td>
                      <td><?php echo $ecoVenosa->codigo_doctor ?></td>
                      <td><?php echo $ecoVenosa->fecha ?></td>
                    </tr>
                    <?php } ?>




                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- End Accordion -->
                   </div>
               </div>
               <div class="col-md-3">
                <div class="card card-dashed h-900">
                    <div class="card-header bg-default"><h6 class="text-white text-uppercase">consulta</h6></div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="d-grid gap-2">
                            <button
                              class="btn btn-danger rounded-pill"
                              data-bs-toggle="modal"
                              data-bs-target="#procesosclinicos"
                              [disabled]="historiaTipoForm.invalid"
                            >
                             <i class="fas fa-database"></i> Procesos Clinicos
                            </button>
                          </div>
                          <div class="d-grid gap-2">
                            <button
                              class="btn btn-primary rounded-pill"
                              data-bs-toggle="modal"
                              data-bs-target="#citasmedicas"
                              >
                            <i class="fas fa-calendar-alt"></i> Agendar Cita
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <small class="text-bold mb-2">CONSULTAS AGENDADAS
                          <span class="icon icon-soft-primary">
                            <i class="fas fa-plus text-danger mx-1 "></i>
                          </span>
                        </small>
                          <?php if (!$poscita) { ?>
                            <P>Aun no hay citas agendadas utiliza la <a class="text-danger" data-bs-toggle="modal"
                            data-bs-target="#citasmedicas">agenda</a>  para calendarizarla</P>
                            <?php } else { ?>
                              <div
                                class="alert alert-danger text-white"
                                role="alert"
                              >
                                <h6 class="alert-heading text-uppercase"><?php echo $poscita->estado; ?></h6>
                                <hr>
                                <small>
                                  <i class="fas fa-calendar"></i>
                                  <?php echo substr($poscita->fecha, 0, 10); ?>   <?php echo $poscita->hora; ?>
                                </small>
                              </div>

                            <?php } ?>

                      </div>
                      <div class="row mt-4">
                        <small class="text-bold mb-2">CONSULTAS INICIADAS</small>
                         
                        <?php if (!$generaliniciada) { ?>
                          <P>Paciente no presenta atencion en <a class="text-primary">Consulta General</a></P>
                        <?php } else { ?>
                          <div
                            class="alert alert-info text-white"
                            role="alert"
                          >
                            <h6 class="alert-heading">
                              Consulta<small> General</small>
                            </h6>
                            <hr>
                            <ul class="list-inline">
                              <!-- <li>Amoxicilina</li> -->
                            </ul>
                            <small> <i class="fas fa-calendar"></i>
                            <?php echo $generaliniciada->fecha; ?> <?php echo $generaliniciada->hora; ?> 
                            </small>
                          </div>
                        <?php } ?>


                        <!--  -->
                        <?php if (!$ginecoiniciada) { ?>
                          <P>Paciente no presenta atencion en <a class="text-danger">Consulta Ginecologica</a></P>
                          <?php } else { ?>
                            <div
                              class="alert alert-warning text-white"
                              role="alert"
                            >
                              <h6 class="alert-heading">
                                Consulta<small> Ginecologica</small>
                              </h6>
                              <hr>
                              <ul class="list-inline">
                                <!-- <li>Amoxicilina</li> -->
                              </ul>
                              <small> <i class="fas fa-calendar"></i>
                                <?php echo $ginecoiniciada->fecha; ?> <?php echo $ginecoiniciada->hora; ?> 
                              </small>
                            </div>

                          <?php } ?>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- MODAL DEL HISTORIA CLINICA GENERAL Y GINECOLOGICA -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">HISTORIA CLINICA DEL PACIENTE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--  -->
        <div class="row">
          <div class="col-md-8">
            <label>Tipo de historia clinica</label>
            <select
              class="form-control"
              id="tphistoria"
            >
              <option value="">SELECCIONE UNA OPCION</option>
              <option value="1">CONSULTA GENERAL</option>
              <option value="2">CONSULTA DE GINECOLOGIA</option>
            </select>
          </div>
          <div class="col-md-2">
            <label>Documento</label>
            <input
              type="number"
              class="form-control"
              id="documento_historia"
              readonly
            >
          </div>
          <div class="col-md-2">
            <label>Cons Triage</label>
            <input
              type="number"
              class="form-control"
              id="consecutivo_historia"
              readonly
            >
          </div>
        </div>
        <!--  -->
        <br>
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link text-primary text-uppercase" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" hidden>Anamnesis</button>
            <button class="nav-link text-primary text-uppercase" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" hidden>Examen fisico</button>
            <button class="nav-link text-primary text-uppercase" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" hidden>Plan de trabajo</button>
            <!--  -->
            <button class="nav-link text-danger text-uppercase"   id="nav-antecedentesgine-tab" data-bs-toggle="tab" data-bs-target="#nav-antecedentesgine" type="button" role="tab" aria-controls="nav-antecedentesgine" aria-selected="false" hidden>Antecedentes</button>
            <button class="nav-link text-danger text-uppercase"   id="nav-consultagine-tab" data-bs-toggle="tab" data-bs-target="#nav-consultagine" type="button" role="tab" aria-controls="nav-consultagine" aria-selected="false" hidden>Consulta</button>
            <button class="nav-link text-danger text-uppercase"   id="nav-fisicogine-tab" data-bs-toggle="tab" data-bs-target="#nav-fisicogine" type="button" role="tab" aria-controls="nav-fisicogine" aria-selected="false" hidden>Examen fisico</button>
            
            <!--  -->
            <button class="nav-link text-dark text-uppercase"   id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Diagnosticos</button>
            <button class="nav-link text-dark text-uppercase"   id="nav-procedimientos-tab" data-bs-toggle="tab" data-bs-target="#nav-procedimientos" type="button" role="tab" aria-controls="nav-procedimientos" aria-selected="false">Procedimientos</button>
          </div>
        </nav>
        <br>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
                  <label class="text-primary">Tipo </label>
                  <select
                    class="form-select form-select-sm form-control form-control-sm"
                    id="anamnesis_directa"
                  >
                    <option value="D">DIRECTA</option>
                    <option value="I">INDIRECTA</option>
                    <option value="M">MIXTA</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="text-primary">EMPRESA</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="anamnesis_empresa"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">COMPAÑIA</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="anamnesis_compañia"
                  >
                </div>
                <div class="col-md-2">
                  <label class="text-primary">IAFA</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="anamnesis_iafa"
                  >
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <label class="text-primary">NOMBRES Y APELLIDOS DEL ACOMPAÑANTE</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="anamnesis_acompanante"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">DNI</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    id="anamnesis_dni"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">CELULAR</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    id="anamnesis_celular"
                  >
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <label class="text-primary">MOTIVO CONSULTA</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="anamnesis_consulta"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="text-primary">TRATAMIENTO ANTERIOR</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="anamnesis_tratamiento"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-3">
                  <label class="text-primary">ENFERMEDAD ACTUAL</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="anamnesis_enfermedad"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">TIEMPO DE ENFERMEDAD</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="anamnesis_tiempo"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">INICIO</label>
                  <input
                    type="date"
                    class="form-control form-control-sm"
                    id="anamnesis_inicio"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">CURSO</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="anamnesis_curso"
                  >
                </div>
              </div>
              <div class="row mt-2" >
                <div class="col-md-12">
                  <label class="text-primary">SINTOMAS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="anamnesis_sintomas"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
                  <label class="text-primary">PIEL</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="fisico_piel"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">CUELLO</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="fisico_cuello"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">ABDOMEN</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="fisico_abdomen"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-4">
                  <label class="text-primary">AP RESPIRATORIO</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="fisico_respiratorio"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">AP CARDIO VASCULAR</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="fisico_cardio"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">SISTEMA NERVIOSO</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="fisico_sistema"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-2">

                </div>
                <div class="col-md-4">
                  <label class="text-primary">CABEZA</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="fisico_cabeza"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">LOCOMOTOR</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="fisico_locomotor"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-4">
                  <label class="text-primary">APETITO</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="fisico_apetito"
                  >
                </div>
                <div class="col-md-4">
                  <label class="text-primary">SED</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="fisico_sed"
                  >
                </div>
                <div class="col-md-4">
                  <label class="text-primary">ORINA</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="fisico_orina"
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <label class="text-primary">EXAMEN DE AYUDA AL DX</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="plan_examen"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="text-primary">PROCEDIMIENTOS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="plan_procedimiento"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label class="text-primary">INTERCONSULTAS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="plan_interconsulta"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="text-primary">TRATAMIENTO</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="plan_tratamiento"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label class="text-primary">REFERENCIA</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="plan_referencia"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="text-primary">FIRMA DEL MEDICO</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="plan_firma"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table align-items-center table-borderless" id="table-diagnosticos2">
                      <thead class="bg-default">
                        <tr>
                          <th scope="col" class="sort text-sm text-white text-black">ID</th>
                          <th scope="col" class="sort text-sm text-white text-black" data-sort="name">Codigo</th>
                          <th scope="col" class="sort text-sm text-white text-black" data-sort="budget">Nombre diagnostico</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($diagnostico->result() as $diagnosticos) { ?>
                        <tr>
                          <td class="budget"><?php echo $diagnosticos->id; ?></td>
                          <td class="budget"><?php echo $diagnosticos->clave; ?></td>
                          <td class="budget"><?php echo $diagnosticos->descripcion; ?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                 <div class="table-responsive">
                  <table class="table align-items-center table-borderless" id="items-general-table">
                    <thead class="bg-success">
                      <tr>
                        <th scope="col" class="sort  text-sm text-white">ID</th>
                        <th scope="col" class="sort  text-sm text-white" data-sort="name">Codigo</th>
                        <th scope="col" class="sort  text-sm text-white" data-sort="budget">Nombre diagnostico</th>
                        <th scope="col" class="sort  text-sm text-white" data-sort="budget">Tipo</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade " id="nav-antecedentesgine" role="tabpanel" aria-labelledby="nav-antecedentesgine-tab" tabindex="0">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
                <label class="color_ginecologia">FAMILIARES</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="antecedentes_familiares"
                  ></textarea>
                </div>
                <div class="col-md-4">
                <label class="color_ginecologia">PATOLOGICOS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="antecedentes_patologicos"
                  ></textarea>
                </div>
                <div class="col-md-4">
                <label class="color_ginecologia">QUIRURGICOS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="antecedentes_cirugia"
                  ></textarea>
                </div>
              </div>
              <!--  -->
              <div class="row mt-3">
                <div class="col-12">
                  <h6 class="color_ginecologia">GINECO-OBSTETRICOS</h6>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label class="color_ginecologia">MENARQUIA</label>
                  <input type="text"
                    class="form-control form-control-sm"
                    id="antecedentes_gineco">
                </div>
                <div class="col">
                  <label class="color_ginecologia">FUR</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="antecedentes_fum"
                  >
                </div>
                <div class="col">
                  <label class="color_ginecologia">RM (RET.MENSTR)</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="antecedentes_rm"
                  >
                </div>
                <div class="col">
                  <label class="color_ginecologia">IRS</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="antecedentes_flujo"
                  >
                </div>
                <div class="col">
                  <label class="color_ginecologia">No PAREJAS</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    id="antecedentes_parejas"
                  >
                </div>
              </div>
              <!--  -->
              <div class="row mt-2">
                <div class="col-md-4">
                  <label class="color_ginecologia">GESTAS</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="antecedentes_gestas"
                  >
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">PARTOS</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    id="antecedentes_partos"
                  >
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">ABORTOS</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    id="antecedentes_abortos"
                  >
                </div>
              </div>
              <!--  -->
              <div class="row mt-2">
              <div class="col-md-4">
                  <label class="color_ginecologia">ANTICONCEPTIVOS</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="antecedentes_anticonceptivos"
                  >
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">TIPOS</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="antecedentes_tipos"
                  >
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">TIEMPO</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    id="antecedentes_tiempo"
                  >
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                  <label class="color_ginecologia">OTROS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="antecedentes_otros"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <label class="color_ginecologia">FECHA PAP</label>
                  <input
                    type="date"
                    class="form-control form-control-sm"
                    id="antecedentes_fecha"
                  >
                </div>
                <div class="col-md-6">
                  <label class="color_ginecologia">No HIJOS</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    id="antecedentes_hijos"
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade " id="nav-fisicogine" role="tabpanel" aria-labelledby="nav-fisicogine-tab" tabindex="0">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
                  <label class="color_ginecologia">PIEL Y TSCS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_piel"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">TIROIDES</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_tiroides"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">MAMAS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_mamas"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-3">
              <div class="col-md-4">
                <label class="color_ginecologia">A RESPIRATORIO</label>
                <textarea
                  class="form-control form-control-sm"
                  id="examen_respiratorio"
                ></textarea>
              </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">A CARDIOVASCULAR</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_cardiovascular"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">ABDOMEN</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_abdomen"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-3">
                  <label class="color_ginecologia">A GENITO - URINARIO</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_genito"
                  ></textarea>
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">TACTO RECTAL</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_tacto"
                  ></textarea>
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">LOCOMOTOR</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_locomotor"
                  ></textarea>
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">SISTEMA NERVIOSO</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="examen_sistema"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade " id="nav-consultagine" role="tabpanel" aria-labelledby="nav-consultagine-tab" tabindex="0">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <label class="color_ginecologia">MOTIVO CONSULTA</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="consulta_motivo"
                    rows="4"
                  ></textarea>
                </div>
              </div>
              <!--  -->
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="color_ginecologia">SIGNOS Y SINTOMAS</label>
                  <textarea
                    class="form-control form-control-sm"
                    id="consulta_sintomas"
                    rows="4"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-procedimientos" role="tabpanel" aria-labelledby="nav-procedimientos-tab" tabindex="0">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table align-items-center table-borderless" id="table-procedimientos2">
                      <thead class="bg-default">
                        <tr>
                          <th scope="col" class="sort  text-white text-sm" data-sort="name">Codigo</th>
                          <th scope="col" class="sort  text-white text-sm" data-sort="budget">Nombre procedimiento</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($procedimiento->result() as $procedimientos) { ?>
                        <tr>
                          <td> <?php echo $procedimientos->codigo_cpt; ?> </td>
                          <td> <?php echo $procedimientos->nombre; ?> </td>
                        </tr>
                     <?php } ?>
                     </tbody>
                    </table>
                  </div>
                </div>
              <!--  -->
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table align-items-center table-borderless" id="items-procedimientos2-table">
                      <thead class="bg-success">
                        <tr>
                          <th scope="col" class="sort text-white text-sm" data-sort="name">Codigo</th>
                          <th scope="col" class="sort text-white text-sm" data-sort="budget">Nombre procedimiento</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"  id="btn-general" hidden>Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"  id="btn-gineco" hidden>Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- PROCESOS CLINICOS ALERGIAS, MEDICAMENTOS, DIETA NUTRICIONAL -->
 <!--  -->
 <div class="modal fade" id="procesosclinicos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">PROCESOS CLINICOS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-alergias-tab" data-bs-toggle="tab" data-bs-target="#nav-alergias" type="button" role="tab" aria-controls="nav-alergias" aria-selected="true">ALERGIAS</button>
            <button class="nav-link" id="nav-medicamentos-tab" data-bs-toggle="tab" data-bs-target="#nav-medicamentos" type="button" role="tab" aria-controls="nav-medicamentos" aria-selected="false">RECETA MEDICA</button>
            <button class="nav-link" id="nav-ordlab-tab" data-bs-toggle="tab" data-bs-target="#nav-ordlab" type="button" role="tab" aria-controls="nav-ordlab" aria-selected="false">ORD. LABORATORIO</button>
            <button class="nav-link" id="nav-ordpat-tab" data-bs-toggle="tab" data-bs-target="#nav-ordpat" type="button" role="tab" aria-controls="nav-ordpat" aria-selected="false" >ORD. PATOLOGIA</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-alergias" role="tabpanel" aria-labelledby="nav-alergias-tab" tabindex="0">
            <div class="container">
              <form [formGroup]="alergiasForm">
                <div class="row mt-4">
                  <div class="col-md-12">
                    <label>Tipo de alergia</label>
                    <select class="form-control" id="tpalergia">
                      <option value="">SELECCIONA UNA OPCION</option>
                      <option value="Medicamentos">ALERGIA A MEDICAMENTOS</option>
                      <option value="Otras">OTRAS ALERGIAS</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                    <label>Descripción</label>
                    <textarea class="form-control" id="descripcion_alergia"></textarea>
                  </div>
                </div>
              </form>
              <div class="row mt-3">
                <div class="col-md-12">
                  <button class="btn btn-primary" onclick="crearAlergias()">
                    Guardar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-medicamentos" role="tabpanel" aria-labelledby="nav-medicamentos-tab" tabindex="0">
            <div class="container">
              <form [formGroup]="medicamentosForm">
                <div class="row mt-4">
                <div class="col-6">
                                <label class="form-label">Nombre:</label>
                                <input
                                  type="text"
                                  class="form-control form-control-sm"
                                  value="<?php echo $pacientes->nombre . ' ' . $pacientes->apellido; ?>"
                                  readonly
                                  >
                            </div>
                            <div class="col-1">
                                <label class="form-label">Edad:</label>
                                <input
                                  type="number"
                                  class="form-control form-control-sm"
                                  value="<?php echo $pacientes->edad; ?>"
                                  readonly
                                >
                            </div>
                            <div class="col-5">
                                <label class="form-label">Médico Solicitante:</label>
                                <input
                                  type="text"
                                  class="form-control form-control-sm"
                                  value="<?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') ?>"
                                  readonly
                                >
                            </div>
                  <div class="col-md-7">
                    <label>Medicamento</label>
                    <div class="input-group">
                      <a href="" class="input-group-text" data-bs-toggle="modal" data-bs-target="#modalmedicamentos" style="padding: 0.375rem 0.75rem;">
                        <i class="fas fa-eye"></i>
                      </a>
                      <input type="text" class="form-control" id="medicamento_medicamento">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Cantidad</label>
                    <input type="number" class="form-control" id="cantidad_medicamento">
                  </div>
                  <div class="col-md-3">
                    <label>Dosis</label>
                    <select class="form-control text-uppercase" id="dosis_medicamento">
                      <option value="">Seleccione la dosis</option>
                      <option value="Noespecificada">No especificada</option>
                      <option value="Ampolla">Ampolla</option>
                      <option value="Aplicación">Aplicación</option>
                      <option value="Capsula">Cápsula</option>
                      <option value="Comprimido">Comprimido</option>
                      <option value="Cucharada">Cucharada</option>
                      <option value="Cucharadita_5ML">Cucharadita 5ML</option>
                      <option value="Dosis">Dosis</option>
                      <option value="Exposición">Exposición</option>
                      <option value="Gota">Gota</option>
                      <option value="Gragea">Gragea</option>
                      <option value="Mililitros">Mililitros</option>
                      <option value="Puff">Puff</option>
                      <option value="Sesión">Sesión</option>
                      <option value="Sobre">Sobre</option>
                      <option value="Tableta">Tableta</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-4">
                    <label>Vía de aplicación</label>
                    <select class="form-control text-uppercase" id="via_aplicacion_medicamento">
                      <option value="">Seleccione la vía de aplicación</option>
                      <option value="Via_oral">Vía oral</option>
                      <option value="Via_intramuscular">Vía intramuscular</option>
                      <option value="Via_intravenoso">Vía intravenoso</option>
                      <option value="Vaginal">Vaginal</option>
                      <option value="Transtraqueal">Transtraqueal</option>
                      <option value="Transdermica">Transdérmica</option>
                      <option value="Topica">Tópica</option>
                      <option value="Sub_lingual">Sublingual</option>
                      <option value="Sub_cutanea">Subcutánea</option>
                      <option value="Rectal">Rectal</option>
                      <option value="Por_sng">Por SNG</option>
                      <option value="Por_gastronomica">Por gastronomía</option>
                      <option value="Parenteral">Parenteral</option>
                      <option value="Ojo_derecha">Ojo derecho</option>
                      <option value="Ojo_izquierdo">Ojo izquierdo</option>
                      <option value="Oido_derecho">Oído derecho</option>
                      <option value="Oido_izquierdo">Oído izquierdo</option>
                      <option value="No_especifica">No especifica</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Frecuencia</label>
                    <select class="form-control text-uppercase" id="frecuencia_medicamento">
                      <option value="">Seleccione la frecuencia</option>
                      <option value="No_especifica">No especifica</option>
                      <option value="dos_al_dia">2 veces al día</option>
                      <option value="tres_al_dia">3 veces al día</option>
                      <option value="al_acostarse">Al acostarse</option>
                      <option value="al_dia">Al día</option>
                      <option value="cada_doce_horas">Cada 12 horas</option>
                      <option value="cada_dos_horas">Cada 2 horas</option>
                      <option value="cada_tres_horas">Cada 3 horas</option>
                      <option value="cada_cuatro_horas">Cada 4 horas</option>
                      <option value="cada_seis_horas">Cada 6 horas</option>
                      <option value="cada_ocho_horas">Cada 8 horas</option>
                      <option value="dos_veces_por_semana">Dos veces por semana</option>
                      <option value="en_ayunas">En ayunas</option>
                      <option value="en_la_mañana">En la mañana</option>
                      <option value="mañana_noche">En la mañana, noche</option>
                      <option value="noche">En la noche</option>
                      <option value="tarde">En la tarde</option>
                      <option value="mañana_tarde_noche">Mañana, Tarde, Noche</option>
                      <option value="tres_veces_semana">Tres veces por semana</option>
                      <option value="una_vez_semana">Una vez por semana</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Duración</label>
                    <select class="form-control text-uppercase" id="duracion_medicamento">
                      <option value="">Seleccione la duración</option>
                      <option value="cinco_dias">05 días</option>
                      <option value="diez_dias">10 días</option>
                      <option value="quince_dias">15 días</option>
                      <option value="treinta_dias">30 días</option>
                      <option value="dos_dias">Dos días</option>
                      <option value="durante_tres_meses">Durante 3 meses</option>
                      <option value="tres_dias">Tres días</option>
                      <option value="un_dia">Un día</option>
                      <option value="una_semana">Una semana</option>
                      <option value="unica_vez">Única vez</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="button" onclick="crearMedicamento()">
                      Guardar
                    </button>
                    
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-ordlab" role="tabpanel" aria-labelledby="nav-ordlab-tab" tabindex="0">
            <div class="row mt-4 mb-4">
              <div class="col-6">
                 <label class="form-label">Nombre:</label>
                 <input
                   type="text"
                   class="form-control form-control-sm"
                   value="<?php echo $pacientes->nombre . '' . $pacientes->apellido; ?>"
                   id="nombre_lab"
                   readonly
                 >
              </div>
              <div class="col-1">
                <label class="form-label">Edad:</label>
                <input
                  type="number"
                  class="form-control form-control-sm"
                  value="<?php echo $pacientes->edad; ?>"
                  id="edad_lab"
                  readonly
                >
              </div>
              <div class="col-5">
                 <label class="form-label">Médico Solicitante:</label>
                 <input
                   type="text"
                   class="form-control form-control-sm"
                   value="<?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') ?>"
                   id="medico_lab"
                   readonly
                 >
              </div>
              <div class="row mt-3">
                <div class="col-md-12 mb-3">
                  <div class="form-group mb-0">
                    <div class="d-flex align-items-center">
                      <label class="form-label mb-0 me-2" style="min-width: 120px;">Perfiles:</label>
                      <div class="d-flex align-items-center" style="width: 100%; max-width: 300px;">
                        <select class="form-select form-select-sm" id="selectPerfil" onchange="if(window.seleccionarPerfil) { seleccionarPerfil(); } else { console.error('seleccionarPerfil function not found'); }" style="width: 100%;">
                          <option value="">-- Seleccione un perfil --</option>
                          <option value="preoperatorio">Perfil Preoperatorio</option>
                          <option value="perfil_prenatal">Perfil Prenatal</option>
                          <option value="perfil_recien_nacido">Perfil Recien Nacido</option>
                          <option value="perfil_coagulacion">Perfil Coagulación</option>
                          <option value="perfil_cardiaco">Perfil Cardiaco</option>
                          <option value="perfil_torch">Perfil Torch</option>
                          <option value="perfil_hepatico">Perfil Hepatico</option>
                          <option value="perfil_lipidico">Perfil Lipidico</option>
                          <option value="perfil_prostatico">Perfil Prostático</option>
                          <option value="perfil_reumatico">Perfil Reumatico</option>
                          <option value="perfil_diabetes">Perfil Diabetes</option>
                          <option value="perfil_renal">Perfil Renal</option>
                          <option value="perfil_fertilidad">Perfil Fertilidad</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-laboratorio">
                     <thead  class="bg-default text-white">
                        <tr>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Analisis</th>
                           <!-- <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Precio</th> -->
                           <!-- <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12 ps-2">Estado</th> -->
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($laboratorio->result() as $laboratorios) { ?>
                        <tr>
                           <td class="text-xs"><?php echo $laboratorios->codigo; ?></td>
                           <td class="text-xs"><?php echo $laboratorios->nombre; ?></td>
                           <!-- <td class="text-xs"/td> -->
                           <!-- <td class="text-xs">ACTIVO</td> -->
                        </tr>
                        <?php } ?>
                     </tbody>
                   </table>
                </div>
                <div class="col-md-6">
                  <!--  -->
                  <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-laboratorio-items">
                    <thead>
                      <tr class="bg-default text-white">
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Analisis</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary" onclick="crearOrdenLaboratorioHistoria()">
                      <i class="fas fa-save me-1"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-warning" onclick="limpiarSeleccion()">
                      <i class="fas fa-broom me-1"></i> Limpiar
                    </button>
                  </div>
                </div>
              </div>  
           </div>
            <!-- Contenido para orden de laboratorio -->
          </div>
          <div class="tab-pane fade" id="nav-ordpat" role="tabpanel" aria-labelledby="nav-ordpat-tab" tabindex="0">
    <div class="modal-body">
        <form id="form_orden_patologica">
            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Nombre:</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        id="nombre_paciente"
                        value="<?php echo $pacientes->nombre . ' ' . $pacientes->apellido; ?>"
                        readonly
                    >
                </div>
                <div class="col-2">
                    <label class="form-label">Edad:</label>
                    <input
                        type="number"
                        class="form-control form-control-sm"
                        id="edad_paciente"
                        value="<?php echo $pacientes->edad; ?>"
                        readonly
                    >
                </div>
                <div class="col-4">
                    <label class="form-label">Sexo:</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M">
                            <label class="form-check-label" for="sexoM">M</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F">
                            <label class="form-check-label" for="sexoF">F</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Médico Solicitante:</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        id="medico_solicitante"
                        value="<?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') ?>"
                        readonly
                    >
                </div>
                <div class="col-6">
                    <label class="form-label">Muestra:</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="muestra" id="pap" value="PAP">
                            <label class="form-check-label" for="pap">PAP</label>
                        </div>
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="muestra" id="citologico" value="Citológico">
                            <label class="form-check-label" for="citologico">Citológico</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="muestra" id="histo" value="Histopatológico">
                            <label class="form-check-label" for="histo">Histopatológico</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-2">
                    <label class="form-label">Paridad:</label>
                    <input type="text" class="form-control form-control-sm" id="paridad_paciente">
                </div>
                <div class="col-2">
                    <label class="form-label">F.U.R:</label>
                    <input type="text" class="form-control form-control-sm" id="fur_paciente">
                </div>
                <div class="col-2">
                    <label class="form-label">F.U.P:</label>
                    <input type="text" class="form-control form-control-sm" id="fup_paciente">
                </div>
                <div class="col-6">
                    <label class="form-label">LACT:</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="lact" id="lactSi" value="S">
                            <label class="form-check-label" for="lactSi">Sí</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lact" id="lactNo" value="N">
                            <label class="form-check-label" for="lactNo">No</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Otros Antecedentes:</label>
                    <input type="text" class="form-control form-control-sm" id="antecedentes_paciente">
                </div>
                <div class="col-6">
                    <label class="form-label">Resultados de informes anteriores:</label>
                    <input type="text" class="form-control form-control-sm" id="resultados_anteriores">
                </div>
            </div>
            <h6 class="mt-3">HALLAZGOS</h6>
            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Otros:</label>
                    <input type="text" class="form-control form-control-sm" id="otros_hallazgos">
                </div>
                <div class="col-6">
                    <label class="form-label">Datos clínicos o tejidos a examinar:</label>
                    <input type="text" class="form-control form-control-sm" id="datos_clinicos">
                </div>
            </div>
              <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Diagnóstico:</label>
                    <textarea class="form-control form-control-sm" rows="1" id="diagnostico_patologia"></textarea>
                </div>
                <div class="col-6">
                    <label class="form-label">Fecha:</label>
                    <input type="date" class="form-control form-control-sm" id="fechaActual" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
              <div class="row mt-3">
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-primary" id="btn_guardar_patologia" onclick="crearOrdenPatologica()">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

      <!--<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>-->
    </div>
  </div>
</div>
</div>
</div>



<!-- archivos  -->
<div class="modal fade" id="archivos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="archivosLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h1 class="modal-title fs-5 text-white" id="archivosLabel">SUBIR ARCHIVOS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-subir-documento" action="<?php echo base_url(); ?>administracion/subirdocumentos" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="paciente" value="<?php echo $pacientes->documento; ?>">
          <div class="mb-3">
            <label class="form-label">Tipo de Archivo</label>
            <select class="form-control form-control-sm" name="tipo_archivo" required>
              <option value="">Seleccione una opción</option>
              <option value="HF">Historial Físico</option>
              <option value="LB">Laboratorio</option>
              <option value="PA">Patología</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" class="form-control form-control-sm" name="titulo" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label class="form-label">Archivo</label>
            <input type="file" class="form-control form-control-sm" name="archivo" accept=".pdf" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" form="form-subir-documento" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- CITAS MEDICAS -->
<div class="modal fade" id="citasmedicas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="citasmedicasLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h1 class="modal-title fs-5 text-white" id="citasmedicasLabel">AGENDAMIENTO DE CITAS </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="messageError"></div>
                  <div class="row">
                     <div class="col-md-1" style="opacity: 0;">
                     </div>
                     <div class="col-md-10">
                        <div class="row">
                           <div class="col-md-8">
                              <div class="form-group input-group-sm">
                                 <label>Medico</label>
                                 <select class="form-control" id="medico" required disabled>
                                    <option value="">Seleccione un doctor</option>
                                    <?php foreach ($doctor->result() as $doctores) { ?>
                                    <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre . ' (' . $doctores->perfil . ' )'; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4" >
                              <div class="form-group input-group-sm">
                                 <label>Fecha</label>
                                 <div class="input-group">
                                    <input type="date" style="height: 32px;padding: 0px;padding-right: 10px;" required class="form-control" id="fecha" min="<?php echo date('Y-m-d'); ?>">
                                    <!-- <div class="input-group-append">
                                      <button type="button" style="padding: 5px 15px;" class="btn btn-primary" id="lupa_Horario"><i class="fa fa-search"></i></button>
                                    </div> -->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="" id="Cont_Horas" style="display: flex;flex-direction: row;flex-wrap: wrap;justify-content: center;">
                              </div>
                           </div>
                           <div class="col-md-6">
                           </div>
                           <div class="col-md-1" style="opacity: 0;">
                              <select class="form-control" id="hora" required style="height: 32px;padding: 0px;">
                                 <option value="">Seleccionar</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>DNI Paciente</label>
                                 <div class="input-group">
                                    <input readonly type="text" class="form-control" id="dni" style="height: 32px;padding: 0px;" minlength="7" maxlength="11" required>
                                    <div class="input-group-append">
                                       <button type="button" style="padding: 5px;" class="btn btn-primary" id="lupa_DNI"><i class="fa fa-search"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                 <label>Apellidos y Nombres  Paciente</label>
                                 <input type="text" class="form-control" id="nombre" required readonly>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>Celular</label>
                                 <input type="text" class="form-control" id="telefono">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                 <label>Estado Cita</label>
                                 <select class="form-control" id="estado" required disabled>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Confirmado">Confirmado</option>
                                    <option value="Tratado">Tratado</option>
                                    <option value="Cancelado">Cancelado</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                 <label>observaciones</label>
                                 <input type="text" class="form-control" id="observaciones" value="cita pendiente para confirmacion de hora ">
                              </div>
                              </div>
                              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="crearCita()">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<!-- IMPRESION DE LAS HISTORIAS CLINICAS GINECOLOGIA Y CONSULTA GENERAL -->
<div class="modal fade" id="descargamodalhc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="descargamodalhcLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h1 class="modal-title fs-5 text-white" id="descargamodalhcLabel">DESCARGA DE HISTORIAS CLINICAS DEL PACIENTE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover table-striped">
              <thead class="bg-default text-white">
                <tr>
                  <th>OPCION</th>
                  <th>CODIGO</th>
                  <th>DOCUMENTO</th>
                  <th>ATENCION</th>
                  <th>FECHA</th>
                  <th>NOMBRE</th>
                  <th>TRIAJE</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($historia->result() as $historias) { ?>
                
               <tr>
                 <?php if ($historias->tipo_consulta == 1) { ?>
                 <td>
                  <div class="row">
                    <a
                      href="#"
                      class="icon icon-shape icon-sm me-2 bg-gradient-danger shadow mx-4"
                      onclick="descargarHistoriaGeneral(<?php echo $historias->triaje; ?>)"
                    > <i class="fas fa-file-pdf"></i>
                    </a>
                  </div>
                 </td>
                 <?php } else { ?>
                 <td>
                   <div class="row">
                     <a
                       href="#"
                       class="icon icon-shape icon-sm me-2 bg-gradient-danger shadow mx-4"
                       onclick="descargarHistoriaGineco(<?php echo $historias->triaje; ?>)"
                     >
                       <i class="fas fa-file-pdf"></i>
                      </a>
                   </div>
                 </td>
                 <?php } ?>
                 <td class="text-xs text-secondary mb-0"><?php echo $historias->codigo_historial_paciente; ?></td>
                 <td class="text-xs text-secondary mb-0"><?php echo $historias->paciente; ?></td>
                 <?php if ($historias->tipo_consulta == 1) { ?>
                   <td class="text-xs text-primary mb-0">CONSULTA GENERAL</td>
                 <?php } else { ?>
                    <td class="text-xs text-danger mb-0">CONSULTA GINECOLOGICA</td>
                 <?php } ?>
                 <td class="text-xs text-secondary mb-0"><?php echo $historias->fecha; ?></td>
                 <td class="text-xs text-secondary mb-0"><?php echo $historias->apellido . ' ' . $historias->pacientes; ?></td>
                 <td class="text-xs text-secondary mb-0"><?php echo 'TRG' . $historias->triaje; ?></td>
                </tr>
                <?php } ?>
              </tbody>                      
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- modal de medicamentos -->
<div class="modal fade" id="modalmedicamentos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalmedicamentosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h1 class="modal-title fs-5 text-white text-uppercase" id="modalmedicamentosLabel">Medicamentos disponibles en Farmacia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover table-striped table-borderless" id="table-medicamentos-farmacia">
              <thead class="bg-default text-white">
                <tr>
                  <th></th>
                  <th>Codigo</th>
                  <th>Medicamento</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($medicamentofarmacias->result() as $farmacia) { ?>
                <tr>
                  <td>
                    <div class="form-check mb-3">
                      <input
                        type="radio"
                        class="form-check-input"
                        name="formRadio"
                        onchange="asociarmedicamentoFarmacia('<?php echo $farmacia->codigo_producto . ' - ' . utf8_decode($farmacia->nombre_producto); ?>')"
                      >
                    </div> 
                  </td>
                  <td><?php echo utf8_decode($farmacia->codigo_producto); ?></td>
                  <td><?php echo utf8_decode($farmacia->nombre_producto); ?></td>
                  <td>Disponible</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#procesosclinicos" >Aceptar</button>
        <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#procesosclinicos" onclick="CancelarMedicamento()">Cancelar</button>
      </div>
    </div>
  </div>
</div>

      <?php require_once ('componentes/scripts.php'); ?>
      <script src="<?php echo base_url(); ?>public/js/scripts/historiaclinica.js?v=1.0.3"></script>
      <script src="<?php echo base_url(); ?>public/js/scripts/laboratorio.js"></script>
      <script src="<?php echo base_url(); ?>public/js/scripts/seleccionarPerfil.js"></script>
      <script src="<?php echo base_url(); ?>public/js/scripts/get_Items.js"></script>
      
      <script>
        $(document).ready(function() {
          // Hacer la función global para que esté disponible en onclick
          window.abrirHistoriaClinica = function(tipo) {
            // Preseleccionar el tipo de historia clínica
            document.getElementById('tphistoria').value = tipo;
            
            // Disparar el evento change para activar la lógica de mostrar/ocultar tabs
            $('#tphistoria').trigger('change');
            
            // Abrir el modal
            var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            modal.show();
            
            // Prevenir que el enlace se comporte como un enlace normal
            return false;
          };
        });
      </script>
   </body>
</html>

