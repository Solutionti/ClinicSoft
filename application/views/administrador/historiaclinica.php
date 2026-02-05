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
                     <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Administración</a></li>
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Historia Clinica</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Historia Clinica</h6>
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
                        ? 'avatar-mujer.jpg': 'team-41.jpg';
                      ?>
                        <img
                          class="avatar avatar-xl avatar-circle rounded-circle"
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
                                <button class="btn btn-primary btn-xs mt-3" type="button" id="dropdownNuevaConsulta" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                  Nueva Consulta <i class="fas fa-chevron-down ms-1"></i>
                                </button>
                                <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownNuevaConsulta" style="z-index: 1000;">
                                  <style>.dropdown-menu::before, .dropdown-menu::after { display: none !important; content: none !important; }</style>
                                  <li><a class="dropdown-item" href="#" onclick="abrirHistoriaClinica('1')">Consulta General</a></li>
                                  <li><a class="dropdown-item" href="#" onclick="abrirHistoriaClinica('2')">Consulta Ginecología</a></li>
                                </ul>
                              </div>
                              <!-- <a
                                class="btn btn-danger btn-xs mt-3"
                                data-bs-toggle="modal"
                                data-bs-target="#descargamodalhc"
                              >
                                Ver HC
                              </a> -->
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
                          <li class="align-middle me-2"><i class="fas fa-thermometer me-1 text-success"></i>Temp</li>
                          <li class="align-middle me-2"><i class="fas fa-thermometer me-1 text-success"></i>P. Arterial</li>
                          <li class="align-middle me-2"><i class="fas fa-heartbeat me-1 text-danger"></i>F. Card</li>
                          <li class="align-middle me-2"><i class="fas fa-heartbeat me-1 text-danger"></i>F. Resp</li>
                          <li class="align-middle me-2"><i class="fas fa-heartbeat me-1 text-danger"></i>Saturacion</li>
                          <li class="align-middle me-2"><i class="fas fa-ruler-vertical me-1 text-danger"></i>Estatura</li>
                          <li class="align-middle me-2"><i class="fas fa-weight me-1 text-dark"></i>Peso</li>
                          <li class="align-middle me-2"><i class="fas fa-child me-1 text-warning"></i>Masa</li>
                        </ul>
                    </div>
                    <div class="col-7 ps-0">
                        <ul class="list-inline mb-0">
                            <li class="align-middle" id="temperatura"></li>
                            <li class="align-middle" id="arterial"></li>
                            <li class="align-middle" id="cardiaca"> </li>
                            <li class="align-middle" id="respiratoria"></li>
                            <li class="align-middle" id="saturacion"> </li>
                            <li class="align-middle" id="estatura"></li>
                            <li class="align-middle" id="peso"> </li>
                            <li class="align-middle" id="imc"> </li>
                            <!-- <li class="align-middle" id="grasa"></li> -->
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
             <div class="col-md-5">
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
               <div class="col-md-4">
                <div class="card card-dashed h-900">
                    <div class="card-header bg-default"><h6 class="text-white text-uppercase">consulta</h6></div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="d-grid gap-2">
                            <!-- <button
                              class="btn btn-danger rounded-pill"
                              data-bs-toggle="modal"
                              data-bs-target="#procesosclinicos"
                              [disabled]="historiaTipoForm.invalid"
                            >
                             <i class="fas fa-database"></i> Procesos Clinicos
                            </button> -->
                          </div>
                          <div class="d-grid gap-2">
                            <!-- <button
                              class="btn btn-primary rounded-pill"
                              data-bs-toggle="modal"
                              data-bs-target="#citasmedicas"
                              >
                            <i class="fas fa-calendar-alt"></i> Agendar Cita
                            </button> -->
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <small class="text-bold mb-2">LINEA DE TIEMPO
                          <span class="icon icon-soft-primary">
                            <i class="fas fa-file-alt text-danger mx-1 "></i>
                          </span>
                        </small>
                        <ul class="list-unstyled">
                          <?php foreach ($historia->result() as $historias): ?>
                            <?php //print_r($historias); ?>
                            <?php if($historias->tipo_consulta == 1) { ?>
                            <li class="">
                              <i class="fas fa-calendar-alt text-primary"></i>
                              <span class="text-primary">
                                <?php
                                  $fecha = $historias->fecha;
                                  $meses = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                                           'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

                                  $partes = explode('-', $fecha);
                                  echo $partes[0] . ' ' . $meses[(int)$partes[1]] . ' ' . $partes[2];
                                ?>
                              </span> 
                              - General (Dr.<?php echo $historias->doctor; ?>) - [<a href="#" onclick="descargarHistoriaGeneral(<?php echo $historias->triaje; ?>)">ver PDF</a>]
                            </li>
                            <?php } else { ?>
                            <li class="">
                              <i class="fas fa-calendar-alt text-danger"></i>
                               <span class="text-danger">
                                <?php
                                  $fecha = $historias->fecha;
                                  $meses = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                                           'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

                                  $partes = explode('-', $fecha);
                                  echo $partes[0] . ' ' . $meses[(int)$partes[1]] . ' ' . $partes[2];
                                ?>
                               </span> - Ginecologia (Dr.<?php echo $historias->doctor; ?>) - [<a href="#" onclick="descargarHistoriaGineco(<?php echo $historias->triaje; ?>)">ver PDF</a>]
                            </li>
                            <?php } ?>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                      <div class="row mt-3">
                        <small class="text-bold mb-2">CONSULTAS AGENDADAS
                          <span class="icon icon-soft-primary">
                            <i class="fas fa-plus text-danger mx-1 "></i>
                          </span>
                        </small>
                          <?php if (!$poscita) { ?>
                            <P>Aun no hay citas agendadas,<a class="text-danger"> no olvides agendarla en la historia clinica </a> cierre de atencion.</P>
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
          <div class="col-md-3" hidden>
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
          <div class="col-md-1" hidden>
            <label>Triaje</label>
            <input
              type="number"
              class="form-control"
              id="consecutivo_historia"
              readonly
            >
          </div>
          <div class="col-md-6">
            <label>Nombre del Paciente</label>
            <input
              type="text"
              class="form-control"
              id="nombre_historia"
              readonly
            >
          </div>
          <div class="col-md-2">
            <label>Edad</label>
            <input
              type="text"
              class="form-control"
              id="edad_historia"
              readonly
            >
          </div>
          <div class="col-md-2">
            <label>Sexo</label>
            <input
              type="text"
              class="form-control"
              id="sexo_historia"
              readonly
            >
          </div>
          
        </div>
        <!-- Signos Vitales del Paciente -->
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card bg-light">
              <div class="card-body py-2">
                <div class="row text-center">
                  <div class="col">
                    <small class="text-muted">Temperatura</small>
                    <p class="mb-0 fw-bold text-dark" id="temperatura_historia">--</p>
                  </div>
                  <div class="col">
                    <small class="text-muted">Peso</small>
                    <p class="mb-0 fw-bold text-dark" id="peso_historia">--</p>
                  </div>
                  <div class="col">
                    <small class="text-muted">Estatura</small>
                    <p class="mb-0 fw-bold text-dark" id="estatura_historia">--</p>
                  </div>
                  <div class="col">
                    <small class="text-muted">P. Arterial</small>
                    <p class="mb-0 fw-bold text-dark" id="pa_historia">--</p>
                  </div>
                  <div class="col">
                    <small class="text-muted">F. Cardiaca</small>
                    <p class="mb-0 fw-bold text-dark" id="fc_historia">--</p>
                  </div>
                </div>
              </div>
            </div>
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
            <button class="nav-link text-info text-uppercase" id="nav-auxiliares-tab" data-bs-toggle="tab" data-bs-target="#nav-auxiliares" type="button" role="tab" aria-controls="nav-auxiliares" aria-selected="false">Exámenes Auxiliares</button>
            <button class="nav-link text-dark text-uppercase"   id="nav-procedimientos-tab" data-bs-toggle="tab" data-bs-target="#nav-procedimientos" type="button" role="tab" aria-controls="nav-procedimientos" aria-selected="false">Procedimientos</button>
            <button class="nav-link text-success text-uppercase" id="nav-receta-tab" data-bs-toggle="tab" data-bs-target="#nav-receta" type="button" role="tab" aria-controls="nav-receta" aria-selected="false">Receta Médica</button>
            <button class="nav-link text-secondary text-uppercase" id="nav-cierre-tab" data-bs-toggle="tab" data-bs-target="#nav-cierre" type="button" role="tab" aria-controls="nav-cierre" aria-selected="false">Cierre atencion</button>
          </div>
        </nav>
        <br>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
              <?php require("historiaclinica/consultageneral/anamesis.php"); ?>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
              <?php require("historiaclinica/consultageneral/plantrabajo.php"); ?>
          </div>
          <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
            <?php require("historiaclinica/diagnosticos.php"); ?>
          </div>
          <div class="tab-pane fade " id="nav-antecedentesgine" role="tabpanel" aria-labelledby="nav-antecedentesgine-tab" tabindex="0">
            <?php require("historiaclinica/ginecologia/antecedentes.php"); ?>
          </div>
          <div class="tab-pane fade " id="nav-fisicogine" role="tabpanel" aria-labelledby="nav-fisicogine-tab" tabindex="0">
            <?php require("historiaclinica/consultageneral/examenfisico.php"); ?>
          </div>
          <div class="tab-pane fade " id="nav-consultagine" role="tabpanel" aria-labelledby="nav-consultagine-tab" tabindex="0">
            <?php require("historiaclinica/ginecologia/consulta.php"); ?>
          </div>
          <div class="tab-pane fade" id="nav-procedimientos" role="tabpanel" aria-labelledby="nav-procedimientos-tab" tabindex="0">
            <?php require("historiaclinica/procedimientos.php") ?>
          </div>
          <!-- TAB RECETA MÉDICA -->
          <div class="tab-pane fade" id="nav-receta" role="tabpanel" aria-labelledby="nav-receta-tab" tabindex="0">
            <?php require("historiaclinica/recetamedica.php"); ?>
          </div>
          <!-- TAB EXÁMENES AUXILIARES -->
          <div class="tab-pane fade" id="nav-auxiliares" role="tabpanel" aria-labelledby="nav-auxiliares-tab" tabindex="0">
            <?php require("historiaclinica/examenesauxiliares.php"); ?>
          </div>
          <!-- TAB CIERRE -->
          <div class="tab-pane fade" id="nav-cierre" role="tabpanel" aria-labelledby="nav-cierre-tab" tabindex="0">
            <div class="container-fluid">
             <?php require("historiaclinica/cierreatencion.php"); ?>
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
                  <th>Stock</th>
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
                  <td><?php echo utf8_decode($farmacia->b1); ?></td>
                  <td>Disponible</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Aceptar</button>
        <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="CancelarMedicamento()">Cancelar</button>
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

            if(tipo == 1) {
             $("#nav-antecedentesgine").removeClass("show active");
             $("#nav-home").addClass("show active");

            }
            else if(tipo == 2) {
              $("#nav-home").removeClass("show active");
             $("#nav-antecedentesgine").addClass("show active");
            
            }
            // Prevenir que el enlace se comporte como un enlace normal
            return false;
          };
        });
      </script>
   </body>
</html>

