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
                            <li> <a class="btn btn-danger btn-xs mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" > Nueva</a>  <a (click)="imprimirhistoriaclinica()" class="btn btn-success btn-xs mt-3">Imprimir</a> </li>
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
                      <!-- <ul
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
                      </ul> -->

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
          <!-- <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#examenesauxiliares" aria-expanded="false" aria-controls="examenesauxiliares">
              <span class="ps-1 text-dark text-bold"><i class="fas fa-x-ray"></i> EXAMENES AUXULIARES</span>
          </a> -->
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
            <label>Cons Historia</label>
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
            <button class="nav-link text-danger text-uppercase" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" hidden>Anamnesis</button>
            <button class="nav-link text-danger text-uppercase" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" hidden>Examen fisico</button>
            <button class="nav-link text-danger text-uppercase" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" hidden>Plan de trabajo</button>
            <!--  -->
            <button class="nav-link text-danger text-uppercase"   id="nav-antecedentesgine-tab" data-bs-toggle="tab" data-bs-target="#nav-antecedentesgine" type="button" role="tab" aria-controls="nav-antecedentesgine" aria-selected="false" hidden>Antecedentes</button>
            <button class="nav-link text-danger text-uppercase"   id="nav-fisicogine-tab" data-bs-toggle="tab" data-bs-target="#nav-fisicogine" type="button" role="tab" aria-controls="nav-fisicogine" aria-selected="false" hidden>Examen fisico</button>
            <button class="nav-link text-danger text-uppercase"   id="nav-consultagine-tab" data-bs-toggle="tab" data-bs-target="#nav-consultagine" type="button" role="tab" aria-controls="nav-consultagine" aria-selected="false" hidden>Consulta</button>
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
                    formControlName="anamnesis_directa"
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
                    formControlName="anamnesis_empresa"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">COMPAÑIA</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_compañia"
                  >
                </div>
                <div class="col-md-2">
                  <label class="text-primary">IAFA</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_iafa"
                  >
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <label class="text-primary">NOMBRES Y APELLIDOS DEL ACOMPAÑANTE</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_acompañante"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">DNI</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_dni"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">CELULAR</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_celular"
                  >
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <label class="text-primary">MOTIVO CONSULTA</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="anamnesis_consulta"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="text-primary">TRATAMIENTO ANTERIOR</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="anamnesis_tratamiento"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-3">
                  <label class="text-primary">ENFERMEDAD ACTUAL</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_enfermedad"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">TIEMPO DE ENFERMEDAD</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_tiempo"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">INICIO</label>
                  <input
                    type="date"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_inicio"
                  >
                </div>
                <div class="col-md-3">
                  <label class="text-primary">CURSO</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="anamnesis_curso"
                  >
                </div>
              </div>
              <div class="row mt-2" >
                <div class="col-md-12">
                  <label class="text-primary">SINTOMAS</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="anamnesis_sintomas"
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
                    formControlName="fisico_piel"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">CUELLO</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="fisico_cuello"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">ABDOMEN</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="fisico_abdomen"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-4">
                  <label class="text-primary">AP RESPIRATORIO</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="fisico_respiratorio"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">AP CARDIO VASCULAR</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="fisico_cardio"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">SISTEMA NERVIOSO</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="fisico_sistema"
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
                    formControlName="fisico_cabeza"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="text-primary">LOCOMOTOR</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="fisico_locomotor"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-4">
                  <label class="text-primary">APETITO</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="fisico_apetito"
                  >
                </div>
                <div class="col-md-4">
                  <label class="text-primary">SED</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="fisico_sed"
                  >
                </div>
                <div class="col-md-4">
                  <label class="text-primary">ORINA</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="fisico_orina"
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
                    formControlName="plan_examen"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="text-primary">PROCEDIMIENTOS</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="plan_procedimiento"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label class="text-primary">INTERCONSULTAS</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="plan_interconsulta"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="text-primary">TRATAMIENTO</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="plan_tratamiento"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label class="text-primary">REFERENCIA</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="plan_referencia"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="text-primary">FIRMA DEL MEDICO</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="plan_firma"
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
                      <?php foreach($diagnostico->result() as $diagnosticos){ ?>
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
                    formControlName="antecedentes_familiares"
                  ></textarea>
                </div>
                <div class="col-md-4">
                <label class="color_ginecologia">PATOLOGICOS</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="antecedentes_patologicos"
                  ></textarea>
                </div>
                <div class="col-md-4">
                <label class="color_ginecologia">GINECO-OBSTETRICOS</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="antecedentes_gineco"
                  ></textarea>
                </div>
              </div>
              <!--  -->
              <div class="row mt-2">
                <div class="col-md-3">
                  <label class="color_ginecologia">FUM</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_fum"
                  >
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">RM (RET.MENSTR)</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_rm"
                  >
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">FLUJO GENITAL</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_flujo"
                  >
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">No PAREJAS</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_parejas"
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
                    formControlName="antecedentes_gestas"
                  >
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">PARTOS</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_partos"
                  >
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">ABORTOS</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_abortos"
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
                    formControlName="antecedentes_anticonceptivos"
                  >
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">TIPOS</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_tipos"
                  >
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">TIEMPO</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_tiempo"
                  >
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                <label class="color_ginecologia">CIRUGIA GINECOLOGICA</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="antecedentes_cirugia"
                  ></textarea>
                </div>
                <div class="col-md-6">
                  <label class="color_ginecologia">OTROS</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="antecedentes_otros"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <label class="color_ginecologia">FECHA PAP</label>
                  <input
                    type="date"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_fecha"
                  >
                </div>
                <div class="col-md-6">
                  <label class="color_ginecologia">No HIJOS</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    formControlName="antecedentes_hijos"
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
                    formControlName="examen_piel"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">TIROIDES</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="examen_tiroides"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">MAMAS</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="examen_mamas"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-3">
              <div class="col-md-4">
                <label class="color_ginecologia">A RESPIRATORIO</label>
                <textarea
                  class="form-control form-control-sm"
                  formControlName="examen_respiratorio"
                ></textarea>
              </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">A CARDIOVASCULAR</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="examen_cardiovascular"
                  ></textarea>
                </div>
                <div class="col-md-4">
                  <label class="color_ginecologia">ABDOMEN</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="examen_cardiovascular"
                  ></textarea>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-3">
                  <label class="color_ginecologia">A GENITO - URINARIO</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="examen_genito"
                  ></textarea>
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">TACTO RECTAL</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="examen_tacto"
                  ></textarea>
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">LOCOMOTOR</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="examen_locomotor"
                  ></textarea>
                </div>
                <div class="col-md-3">
                  <label class="color_ginecologia">SISTEMA NERVIOSO</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="examen_sistema"
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
                    formControlName="consulta_motivo"
                    rows="6"
                  ></textarea>
                </div>
              </div>
              <!--  -->
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="color_ginecologia">SIGNOS Y SINTOMAS</label>
                  <textarea
                    class="form-control form-control-sm"
                    formControlName="consulta_sintomas"
                    rows="6"
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
                      <?php foreach($procedimiento->result() as $procedimientos){ ?>
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
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
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
            <button class="nav-link" id="nav-medicamentos-tab" data-bs-toggle="tab" data-bs-target="#nav-medicamentos" type="button" role="tab" aria-controls="nav-medicamentos" aria-selected="false">MEDICAMENTOS</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" disabled>DIETA NUTRICIONAL</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-alergias" role="tabpanel" aria-labelledby="nav-alergias-tab" tabindex="0">
           <div class="container">
            <form [formGroup]="alergiasForm">
              <div class="row mt-4">
              <div class="col-md-12">
                <label>Tipo de alergia</label>
                <select
                  class="form-control"
                  id="tpalergia"
                >
                  <option value="">SELECCIONA UNA OPCION</option>
                  <option value="Medicamentos">ALERGIA A MEDICAMENTOS</option>
                  <option value="Otras">OTRAS ALERGIAS</option>
                </select>
              </div>
             </div>
             <div class="row mt-3">
               <div class="col-md-12">
                 <label>Descripcion</label>
                 <textarea
                   class="form-control"
                   id="descripcion_alergia"
                 ></textarea>
               </div>
             </div>
            </form>
            <div class="row mt-3">
              <div class="col-md-12">
                <button
                  class="btn btn-primary"
                  onclick="crearAlergias()"
                >
                  Guardar
                </button>
              </div>
            </div>
           </div>
          </div>
          <div class="tab-pane fade" id="nav-medicamentos" role="tabpanel" aria-labelledby="nav-medicamentos-tab" tabindex="0">
            <div class="container">
                <div class="row mt-4">
                  <div class="col-md-7">
                    <label>Medicamento</label>
                    <div class="input-group ">
                      <input
                        type="text"
                        class="form-control"
                        id="medicamento_medicamento"
                      >
                      <!-- <button
                        class="btn btn-primary"
                        type="button"
                      >
                        <i class="fas fa-eye"></i>
                      </button> -->
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Cantidad</label>
                    <input
                      type="number"
                      class="form-control"
                      id="cantidad_medicamento"
                    >
                  </div>
                  <div class="col-md-3">
                    <label>Dosis</label>
                    <select
                      class="form-control text-uppercase"
                      id="dosis_medicamento"
                    >
                      <option value="">Seleccione la dosis</option>
                      <option value="Noespecificada">No especifica</option>
                      <option value="Ampolla">Ampolla</option>
                      <option value="Aplicación">Aplicación</option>
                      <option value="Capsula">Capsula</option>
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
                <div class="row ">
                  <div class="col-md-4">
                    <label>Via Aplicación</label>
                    <select
                      class="form-control text-uppercase"
                      id="via_aplicacion_medicamento"
                    >
                      <option value="">Seleccione la via aplicación</option>
                        <option value="Via_oral">Via oral</option>
                        <option value="Via_intramuscular">Via intramuscular</option>
                        <option value="Via_intravenoso">Via intravenoso</option>
                        <option value="Vaginal">Vaginal</option>
                        <option value="Transtraqueal">Transtraqueal</option>
                        <option value="Transdermica">Transdermica</option>
                        <option value="Topica">Topica</option>
                        <option value="Sub_lingual">Sub lingual</option>
                        <option value="Sub_cutanea">Sub cutanea</option>
                        <option value="Rectal">Rectal</option>
                        <option value="Por_sng">Por sng</option>
                        <option value="Por_gastronomica">Por gastronomica</option>
                        <option value="Parenteral">Parenteral </option>
                        <option value="Sub_lingual">Sub lingual</option>
                        <option value="Sub_cutanea">Sub cutanea</option>
                        <option value="Ojo_derecha">Ojo derecho</option>
                        <option value="Ojo_izquierdo">Ojo izquierdo</option>
                        <option value="Oido_derecho">Oido derecho</option>
                        <option value="Oido_izquierdo">Oido izquierdo</option>
                        <option value="No_especifica">No especifica</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Frecuencia</label>
                    <select
                      class="form-control text-uppercase"
                      id="frecuencia_medicamento"
                    >
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
                        <option value="mañana_tarde_noche">Mañana,Tarde,Noche</option>
                        <option value="tres_veces_semana">Tres veces por semana</option>
                        <option value="una_vez_semana">Una vez por semana</option> 
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Duración</label>
                    <select
                      class="form-control text-uppercase"
                      id="duracion_medicamento"
                    >
                      <option value="">Seleccione la duración</option>
                        <option value="cinco_dias">05 días</option>
                        <option value="diez_dias">10 días</option>
                        <option value="quince_dias">15 días</option>
                        <option value="treinta_dias">30 días</option>
                        <option value="dos_dias">Dos días</option>
                        <option value="durante_tres_meses">Durante 3 meses</option>
                        <option value="tres_dias">Tres días</option>
                        <option value="un dia">Un día</option>
                        <option value="una_semana">Una semana</option>
                        <option value="unica_vez">Unica vez</option>
                    </select>
                  </div>
                </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <button
                    class="btn btn-primary"
                    onclick="crearMedicamento()"
                  >
                    Guardar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <!--  -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- archivos  -->
<div class="modal fade" id="archivos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="archivosLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="archivosLabel">SUBIR ARCHIVOS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <div class="flex align-items-center gap-3 mb-3">
      <label>Tipo de Archivo</label>
      <select
        class="form-control form-control-sm"
        formControlName="tparchivo"
      >
        <option value="">Seleccione una opcion</option>
        <option value="HF">Historial Fisico</option>
        <option value="LB">Laboratorio</option>
      </select>
    </div>
    <div class="flex align-items-center gap-3 mb-3">
      <label>Titulo</label>
      <input
        type="text"
        class="form-control form-control-sm"
        formControlName="titulo"
        autocomplete="off"
      />
    </div>
    <div class="flex align-items-center gap-3 mb-5">
        <label>Archivo</label>
        <input
          type="file"
          class="form-control form-control-sm"
          (change)="cargueDocumento($event)"
          accept=".pdf"
        />
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
      <?php require_once("componentes/scripts.php"); ?>
      <script src="<?php echo base_url(); ?>public/js/scripts/historiaclinica.js"></script>
   </body>
</html>