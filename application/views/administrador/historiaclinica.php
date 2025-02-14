<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Administracion / historias</title>
      <?php require_once("componentes/head.php"); ?>
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
                     <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                           <li class="mb-2">
                              <a class="dropdown-item border-radius-md" href="javascript:;">
                                 <div class="d-flex py-1">
                                    <div class="my-auto">
                                       <img src="<?php echo base_url();?>img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                       <h6 class="text-sm font-weight-normal mb-1">
                                          <span class="font-weight-bold">New message</span> from Laur
                                       </h6>
                                       <p class="text-xs text-secondary mb-0">
                                          <i class="fa fa-clock me-1"></i>
                                          13 minutes ago
                                       </p>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="mb-2">
                              <a class="dropdown-item border-radius-md" href="javascript:;">
                                 <div class="d-flex py-1">
                                    <div class="my-auto">
                                       <img src="<?php echo base_url();?>public/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                       <h6 class="text-sm font-weight-normal mb-1">
                                          <span class="font-weight-bold">New album</span> by Travis Scott
                                       </h6>
                                       <p class="text-xs text-secondary mb-0">
                                          <i class="fa fa-clock me-1"></i>
                                          1 day
                                       </p>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item border-radius-md" href="javascript:;">
                                 <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                       <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                          <title>credit-card</title>
                                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                   <g transform="translate(453.000000, 454.000000)">
                                                      <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                      <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                   </g>
                                                </g>
                                             </g>
                                          </g>
                                       </svg>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                       <h6 class="text-sm font-weight-normal mb-1">
                                          Payment successfully completed
                                       </h6>
                                       <p class="text-xs text-secondary mb-0">
                                          <i class="fa fa-clock me-1"></i>
                                          2 days
                                       </p>
                                    </div>
                                 </div>
                              </a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
  <div class="container-fluid py-1">
    <div class="row">
      <div class="card">
        <div class="container-fluid mt-3">
          <div class="row">
            <div class="col-md-3">
               <h4 class="page-header-title h6"> <?php echo $pacientes->nombre." ".$pacientes->apellido; ?></h4>
                <div class="page-header">
                  <div class="d-flex align-items-lg-center">
                    <div class="flex-shrink-0">
                      <img
                        class="avatar avatar-xl avatar-circle"
                        src="https://htmlstream.com/preview/front-v4.2/html/assets/img/160x160/img9.jpg"
                        alt="Image Description"
                      >
                    </div>
                    <div class="flex-grow-1 ms-4">
                      <div class="row">
                        <div class="col-lg mb-3 mb-lg-0">
                          <ul class="list-inline list-separator">
                            <li class="list-inline-item">
                              <i class="bi-geo-alt-fill text-primary me-1"></i> <?php echo $pacientes->fecha_nacimiento; ?> - <?php echo $pacientes->edad; ?> años
                            </li>
                            <li> <a class="btn btn-danger btn-xs mt-3"> Nueva</a>  <a (click)="imprimirhistoriaclinica()" class="btn btn-success btn-xs mt-3">Imprimir</a> </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="card card-dashed h-900">
              <div class="card-header bg-default"><h6 class="text-white text-uppercase">Ultimos signos vitales</h6></div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="list-inline ">
                          <li><i class="fas fa-ruler-vertical mt-2 text-danger"></i> Estatura</li>
                          <li><i class="fas fa-weight text-dark mt-2"></i> Peso</li>
                          <li><i class="fas fa-child mt-2 text-warning"></i> Masa Corporal</li>
                          <li><i class="fas fa-thermometer mt-2 text-success"></i> Temperatura</li>
                          <li><i class="fas fa-diagnoses text-dark"></i> Frec. Respiratoria</li>
                          <li><i class="fas fa-heartbeat mt-2 text-danger"></i> Frec. Cardiaca</li>
                          <li><i class="fas fa-child mt-2 text-danger"></i> Porcentaje Grasa</li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <ul class="list-inline ">
                            <li class="mt-1" id="estatura"></li>
                            <li class="mt-0" id="peso"> </li>
                            <li class="mt-1" id="imc"> </li>
                            <li class="mt-0" id="temperatura"></li>
                            <li class="mt-2" id="respiratoria"></li>
                            <li class="mt-1" id="cardiaca"> </li>
                            <li class="mt-0">0 %</li>
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
                        <li>
                          <i class="fas fa-file-pdf mx-1 text-danger"></i>
                          <a
                            href="http://localhost:8000/archivospdf/{{ archivos.url_documento }}"
                            target="_blank"
                          >
                            Ecografias
                          </a>
                         </li>
                        <small>1 mb | 26-12-1993</small>
                      </ul>

                      <button
                        class="btn btn-primary btn-xs"
                        (click)="archivos = true"
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
                 <div class="card-header bg-default"><h6 class="text-white text-uppercase">Procesos clinicos </h6></div> 
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
              <li ></li>
            </ul>
            <hr>
            <h6 class="alert-heading">Otras Alergias</h6>
            <ul class="list-inline ">
              <li ></li>
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
                      <!-- <tr *ngFor="let diagnosticos of getdiagnostico">
                        <td> {{ diagnosticos.codigo_diagnosti }}</td>
                        <td> {{  diagnosticos.descripcion }}</td>
                      </tr> -->
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
                      <!-- <tr *ngFor="let procedimiento of getprocedimiento">
                        <td>{{ procedimiento.codigo_procedimiento }}</td>
                        <td>{{ procedimiento.nombre }}</td>
                      </tr> -->
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
              <span class="ps-1 text-dark text-bold"><i class="fas fa-pills"></i> FORMULA DE MEDICAMENTOS</span>
          </a>
        </div>
        <div id="medicamentosactivos" class="accordion-collapse collapse" aria-labelledby="btn-icon-start-headingThree" data-bs-parent="#accordionBtnIconStartExample">
          <div class="accordion-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="bg-dark text-white">
                    <th class="text-uppercase text-xs">Descripcion Medicamento</th>
                    <th class="text-uppercase text-xs">Cant</th>
                    <th class="text-uppercase text-xs">Dosis</th>
                    <th class="text-uppercase text-xs">Via</th>
                    <th class="text-uppercase text-xs">Frecuencia</th>
                    <th class="text-uppercase text-xs">Duracion</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- <tr *ngFor="let medicamentos of getMedicamento">
                    <td>{{ medicamentos.codigo_medicamento }}</td>
                    <td>{{ medicamentos.cantidad }}</td>
                    <td>{{ medicamentos.dosis }}</td>
                    <td>{{ medicamentos.via }}</td>
                    <td>{{ medicamentos.frecuencia }}</td>
                    <td>{{ medicamentos.duracion }}</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-header" id="btn-icon-start-headingThree">
          <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#examenesauxiliares" aria-expanded="false" aria-controls="examenesauxiliares">
              <span class="ps-1 text-dark text-bold"><i class="fas fa-x-ray"></i> EXAMENES AUXULIARES</span>
          </a>
        </div>
        <div id="examenesauxiliares" class="accordion-collapse collapse" aria-labelledby="btn-icon-start-headingThree" data-bs-parent="#accordionBtnIconStartExample">
          <div class="accordion-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  
                </div>
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
                              data-bs-target="#staticBackdrop"
                            >
                            <i class="fas fa-calendar-alt"></i> Nueva Consulta
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

                          <div
                            class="alert alert-danger text-white"
                            role="alert"
                          >
                            <h6 class="alert-heading">CITA DE GINECOLOGIA</h6>
                            <hr>
                            <small>
                              <i class="fas fa-calendar"></i> 26-12-1993   12:30PM
                            </small>
                          </div>

                        <P>Aun no hay citas agendadas utiliza la <a class="text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">agenda</a>  para calendarizarla</P>
                      </div>
                      <div class="row mt-4">
                        <small class="text-bold mb-2">CONSULTAS INICIADAS</small>
                        <div
                          class="alert alert-info text-white"
                          role="alert"
                        >
                          <h6 class="alert-heading">
                            Dolor de garganta ||<small> Cancer de cabeza</small>
                          </h6>
                          <hr>
                          <ul class="list-inline">
                            <li>Amoxicilina</li>
                          </ul>
                          <small> <i class="fas fa-calendar"></i> 26/12/1993 12:30 PM</small>
                        </div>
                        <!--  -->
                        <div
                          class="alert alert-warning text-white"
                          role="alert"
                        >
                          <h6 class="alert-heading">
                            Dolor de garganta ||<small> Cancer de cabeza</small>
                          </h6>
                          <hr>
                          <ul class="list-inline">
                            <li>Amoxicilina</li>
                          </ul>
                          <small> <i class="fas fa-calendar"></i> 26/12/1993 12:30 PM</small>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
            <!--  -->
          </div>
        </div>
      </div>

      <?php require_once("componentes/scripts.php"); ?>
      <script src="<?php echo base_url(); ?>public/js/scripts/historiaclinica.js"></script>
   </body>
</html>