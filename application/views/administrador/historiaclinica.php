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
      <?php $pacientes = $paciente->result()[0]; ?>
      <div class="min-height-300 bg-default position-absolute w-100"></div>
      <?php require_once("componentes/menu.php"); ?>
      <main class="main-content position-relative border-radius-lg">
         <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                     <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">administración</a></li>
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Historias medicas</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Historias medicas</h6>
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
         <!-- End Navbar -->
         <div class="container-fluid py-4">
            <div class="row">
               <div class="row mt-4">
                  <div class="col-lg-9 mb-lg-0 mb-4">
                     <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                           <h6 class="text-uppercase">Historias Paciente</h6>
                           <p class="text-sm mb-0">
                              <!-- <i class="fa fa-arrow-up text-success"></i>
                                 <span class="font-weight-bold">4% more</span> in 2022
                                 -->
                           </p>
                        </div>
                        <div class="card-body p-3 text-uppercase">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Historias</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Receta Medica</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="laboratorio-tab" data-bs-toggle="tab" data-bs-target="#laboratorio" type="button" role="tab" aria-controls="laboratorio" aria-selected="false">Ord. laboratorio</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Información</button>
                              </li>
                           </ul>
                           <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 <div class="container mt-3">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="row">
                                             <div class="col-md-4">
                                                <h6>
                                                   Historias 
                                                   <li title="Especialidad Ginecologia" class="fas fa-plus-circle  text-danger" data-bs-toggle="modal" href="#Agregarhistoria" role="button"></li>
                                                   <li title="Especialidad Medicina General" class="fas fa-plus-circle text-primary" data-bs-toggle="modal" href="#Agregarhistoria2" role="button"></li>
                                                </h6>
                                             </div>
                                             <div class="col-md-6">
                                                <select id="ecografias" class="form-control form-control-sm">
                                                   <option value="">Seleccione una ecografia</option>
                                                   <option value="mama">Ecografia de mama</option>
                                                   <option value="transvaginal">Ecografia Transvaginal</option>
                                                   <option value="pelvica">Ecografia Pelvica</option>
                                                   <option value="morfologica">Ecografia Morfologica</option>
                                                   <option value="genetica">Ecografia Genetica</option>
                                                   <option value="obstetrica">Ecografia Obstetrica</option>
                                                </select>
                                             </div>
                                             <div class="col-md-2">
                                                <span class="badge rounded-pill  bg-danger">Ecografias</span>
                                             </div>
                                          </div>
                                          <br>
                                          <div class="table-responsive">
                                             <table class="table align-items-center">
                                                <thead class="thead-light">
                                                   <tr>
                                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Opciones</th>
                                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Fecha</th>
                                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Nombre</th>
                                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Doctor</th>
                                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Estado</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <?php foreach($historia->result() as $historias){ ?>
                                                   <tr>
                                                      <?php if($historias->tipo_consulta == 1){ ?>
                                                      <td>
                                                         <div class="row">
                                                            <button type="button" class="icon icon-shape icon-sm me-2  shadow mx-3  bg-gradient-success"> <i class="fas fa-pen"></i> </button>
                                                            <a href="<?php echo base_url(); ?>administracion/pdfgeneral/<?php echo $historias->codigo_historial_paciente; ?>/<?php echo $historias->fecha; ?>" class="icon icon-shape icon-sm me-2 bg-gradient-danger shadow " target="_blank"> <i class="fas fa-file-pdf"></i>  </a>
                                                         </div>
                                                      </td>
                                                      <?php } else { ?>
                                                      <td>
                                                         <div class="row">
                                                            <a href="#" class="icon icon-shape icon-sm me-2  shadow mx-3 bg-gradient-success"> <i class="fas fa-pen"></i> </a>
                                                            <a href="<?php echo base_url(); ?>administracion/pdfginecologia/<?php echo $historias->codigo_historial_paciente; ?>/<?php echo $historias->fecha; ?>" class="icon icon-shape icon-sm me-2 bg-gradient-danger shadow " target="_blank"> <i class="fas fa-file-pdf"></i>  </a>
                                                         </div>
                                                      </td>
                                                      <?php } ?>
                                                      <td class="text-xs text-secondary mb-0"><?php echo $historias->fecha; ?></td>
                                                      <td class="text-xs text-secondary mb-0"><?php echo $historias->apellido." ".$historias->pacientes; ?></td>
                                                      <td class="text-xs text-secondary mb-0"><?php echo $historias->doctor; ?></td>
                                                      <td class="text-xs text-secondary mb-0"><?php echo $historias->estado; ?></td>
                                                   </tr>
                                                   <?php }?>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- CAMBIO NUEVO DE ORDEN DE LABORATORIO -->
                              <div class="tab-pane fade" id="laboratorio" role="tabpanel" aria-labelledby="laboratorio-tab">
                                 <div class="container mt-3">
                                    <div class="row">
                                       <div class="col-md-12">
                                           <h6>
                                             Orden de laboratorio 
                                             <li title="Agregar" class="fas fa-plus-circle  text-dark" data-bs-toggle="modal" href="#modal-ordenlaboraorio" role="button"></li>
                                          </h6>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                 <div class="container mt-3">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <h6>
                                             Receta Medica 
                                             <li title="Agregar" class="fas fa-plus-circle  text-dark" data-bs-toggle="modal" href="#Agregarreceta" role="button"></li>
                                          </h6>
                                          <table class="table align-items-center">
                                             <thead class="thead-light">
                                                <tr>
                                                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Opciones</th>
                                                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Fecha</th>
                                                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Medicina</th>
                                                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-12">Receta</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php foreach($receta->result() as $resetas){ ?>
                                                <tr>
                                                   <td class="text-xs text-secondary mb-0"><button type="button" class="btn btn-primary btn-sm"> <i class="fas fa-pen"></i> </button></td>
                                                   <td class="text-xs text-secondary mb-0"><?php echo $resetas->fecha; ?></td>
                                                   <td class="text-xs text-secondary mb-0"><?php echo $resetas->medicina; ?></td>
                                                   <td class="text-xs text-secondary mb-0"><?php echo $resetas->receta; ?></td>
                                                </tr>
                                                <?php } ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="card card-profile">
                        <img src="<?php echo base_url(); ?>public/img/theme/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                           <div class="col-4 col-lg-4 order-lg-2">
                              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                 <a href="javascript:;">
                                 <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" class="rounded-circle img-fluid border border-2 border-white">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="card-body pt-0">
                        </div>
                        <div class="text-center mt-1">
                           <h6>
                              Información Paciente
                           </h6>
                           <div class="h6 font-weight-300">
                              <?php echo $pacientes->apellido." ".$pacientes->nombre; ?>
                           </div>
                           <div class="h6 mt-1">
                              <?php echo $pacientes->documento; ?>
                           </div>
                           <div>
                              No HC: <?php echo $pacientes->hc; ?>
                           </div>
                        </div>
                        <br>
                     </div>
                  </div>
               </div>
               <div class="row mt-4">
                  <div class="col-lg-7 mb-lg-0 mb-4">
                     <div class="card ">
                        <div class="card-header pb-0 p-3">
                           <div class="d-flex justify-content-between">
                              <h6 class="mb-2">Linea de tiempo <i class="fas fa-clock"></i></h6>
                           </div>
                        </div>
                        
                      <div class="table-responsive">
                        <table class="table align-items-center table-hover table-borderless">
                           <tbody>
                                   <?php foreach($linea->result() as $linea_){ ?>
                                  <tr>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Ultima visita:</p>
                                        <h6 class="text-xs mb-0"><?php echo $linea_->fecha." <br> ".$linea_->hora; ?></h6>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Servicio:</p>
                                        <h6 class="text-xs mb-0">
                                        <?php 
                                          if($linea_->tp_atencion == ""){?>
                                            <?php echo "Laboratorio"; ?>
                                          <?php } else { ?>
                                            <?php echo $linea_->tp_atencion; ?>
                                          <?php
                                          }
                                        ?>
                                        </h6>
                                        
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Médico:</p>
                                        <h6 class="text-xs mb-0"><?php echo $linea_->doctor; ?></h6>
                                      </div>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                        </table>


                      </div>
                     </div>
                  </div>
                  <div class="col-lg-5">
                     <div class="card">
                        <div class="card-header pb-0 p-3">
                           <h6 class="mb-0">ADICIONALES</h6>
                        </div>
                        <div class="card-body p-3">
                           <ul class="list-group">
                              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                 <div class="d-flex align-items-center">
                                    <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                       <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                          <i class="fas fa-file-medical-alt text-white opacity-10"></i>
                                       </div>
                                    </a>
                                    <div class="d-flex flex-column">
                                       <h6 class="mb-1 text-dark text-sm text-uppercase">Historial fisico</h6>
                                       <span class="text-xs"><span class="font-weight-bold">+ 100%</span></span>
                                    </div>
                                 </div>
                                 <div class="d-flex">
                                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                                 </div>
                              </li>
                              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                 <div class="d-flex align-items-center">
                                    <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop" >
                                       <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                          <i class="fas fa-flask text-white opacity-10"></i>
                                       </div>
                                    </a>
                                    <div class="d-flex flex-column">
                                       <h6 class="mb-1 text-dark text-sm text-uppercase">Laboratorio</h6>
                                       <span class="text-xs"><span class="font-weight-bold">+ 100%</span></span>
                                    </div>
                                 </div>
                                 <div class="d-flex">
                                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                                 </div>
                              </li>
                              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                 <div class="d-flex align-items-center">
                                    <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                       <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                          <i class="fas fa-bed text-white opacity-10"></i>
                                       </div>
                                    </a>
                                    <div class="d-flex flex-column">
                                       <h6 class="mb-1 text-dark text-sm text-uppercase">Patologia</h6>
                                       <span class="text-xs"><span class="font-weight-bold">+ 100%</span></span>
                                    </div>
                                 </div>
                                 <div class="d-flex">
                                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                                 </div>
                              </li>
                              <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                 <div class="d-flex align-items-center">
                                    <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling3" aria-controls="offcanvasScrolling3">
                                       <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                          <i class="fas fa-images text-white opacity-10"></i>
                                       </div>
                                    </a>
                                    <div class="d-flex flex-column">
                                       <h6 class="mb-1 text-dark text-sm text-uppercase">Ecografias</h6>
                                       <span class="text-xs font-weight-bold">+ 100%</span>
                                    </div>
                                 </div>
                                 <div class="d-flex">
                                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <?php require_once("componentes/footer.php");?>
            </div>
      </main>
      <?php require_once("componentes/personalizar.php"); ?>
      <!-- MODAL HISTORIA GINECOLOGIA-->
      <div class="modal fade" id="Agregarhistoria" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
      <div class="modal-header bg-default">
      <h5 class="modal-title text-uppercase text-white" id="exampleModalLabel">Historia Clinica <span class="rosa-text">GINECOLOGIA</span> del Paciente </h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>DNI</label>
      <input type="text" class="form-control" id="dni1" value="<?php echo $pacientes->documento; ?>" readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Paciente</label>
      <input type="text" class="form-control" id="paciente1"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Edad</label>
      <input type="text" class="form-control" id="edad1"  readonly>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-1" hidden>
      <div class="form-group input-group-sm">
      <label>id especialidad</label>
      <input type="text" class="form-control" id="especialidadid1"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Especialiad</label>
      <input type="text" class="form-control" id="especialidad1"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Sexo</label>
      <input type="text" class="form-control" id="sexo1"  readonly>
      </div>
      </div>
      <div class="col-md-4"  hidden>
      <div class="form-group input-group-sm">
      <label>Doctorid</label>
      <input type="text" class="form-control" id="doctorid1"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Doctor</label>
      <input type="text" class="form-control" id="doctor1"  readonly>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4" hidden>
      <div class="form-group input-group-sm">
      <label>Codigo triaje</label>
      <input type="text" class="form-control" id="triajeid1"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Presión arterial</label>
      <input type="text" class="form-control" id="arterial1"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Temperatura</label>
      <input type="text" class="form-control" id="temperatura1"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>frecuencia respiratoria</label>
      <input type="text" class="form-control" id="respiratoria1"  readonly>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>frecuencia Cardiaca</label>
      <input type="text" class="form-control" id="cardiaca1"  readonly>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group input-group-sm">
      <label>Saturación O2</label>
      <input type="text" class="form-control" id="saturacion1"  readonly>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group input-group-sm">
      <label>Peso</label>
      <input type="text" class="form-control" id="peso1" readonly>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group input-group-sm">
      <label>Talla</label>
      <input type="text" class="form-control" id="talla1" readonly>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group input-group-sm">
      <label>Imc</label>
      <input type="text" class="form-control" id="imc1" readonly>
      </div>
      </div>
      </div>
      <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">1. Antecendentes</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">2. Consulta</button>
      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">3. Examen fisico</button>
      <button class="nav-link" id="nav-contact-tab1" data-bs-toggle="tab" data-bs-target="#nav-contact1" type="button" role="tab" aria-controls="nav-contact1" aria-selected="false">4. Diagnostico</button>
      <button class="nav-link" id="nav-contact-tab2" data-bs-toggle="tab" data-bs-target="#nav-procedimientos" type="button" role="tab" aria-controls="nav-procedimientos" aria-selected="false">5. Procedimientos</button>
      </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Familiares</label>
      <input type="text" id="familiares1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Patologicos</label>
      <input type="text" id="patologicos1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Gineco - Obstetricos</label>
      <input type="text" id="gine_obste1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>FUM</label>
      <input type="text" id="fum1" class="form-control" >
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>RM (Ret. Menstr)</label>
      <input type="text" id="rm1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>Flujo genital</label>
      <input type="text" id="flujo_genital1" class="form-control" >
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>No de parejas</label>
      <input type="text" id="parejas1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Gestas</label>
      <input type="text" id="gestas1" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Partos</label>
      <input type="number" id="partos1" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Abortos</label>
      <input type="number" id="abortos1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Anticopcetivos</label>
      <input type="text" id="anticonceptivos1" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Tipo</label>
      <input type="text" id="tipo1" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Tiempo</label>
      <input type="text" id="tiempo1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Cirugia ginecologica</label>
      <input type="text" id="cirugia_ginecologica1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Otros</label>
      <input type="text" id="otros1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>Fecha PAP</label>
      <input type="date" id="pap1" class="form-control" >
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>No Hijos</label>
      <input type="text" id="hijos1" class="form-control" >
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Motivo Consulta</label>
      <textarea  rows="2" id="motivo_consulta1" class="form-control"></textarea>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Signos y sintomas</label>
      <textarea  rows="2" id="signos_sintomas1" class="form-control"></textarea>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Piel y TSCS</label>
      <input type="text" id="piel_tscs1" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Tiroides</label>
      <input type="text" id="tiroides1" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Mamas</label>
      <input type="text" id="mamas1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>A respiratorio</label>
      <input type="text" id="a_respiratorio1" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>A cardiovascular</label>
      <input type="text" id="a_cardiovascular1" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Abdomen</label>
      <input type="text" id="abdomen1" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-3">
      <div class="form-group input-group-sm">
      <label>A Genito - Urinario</label>
      <input type="text" id="genito1" class="form-control" >
      </div>
      </div>
      <div class="col-md-3">
      <div class="form-group input-group-sm">
      <label>Tacto rectal</label>
      <input type="text" id="tacto1" class="form-control" >
      </div>
      </div>
      <div class="col-md-3">
      <div class="form-group input-group-sm">
      <label>Locomotor</label>
      <input type="text" id="locomotor1" class="form-control" >
      </div>
      </div>
      <div class="col-md-3">
      <div class="form-group input-group-sm">
      <label>Sistema nervioso</label>
      <input type="text" id="sistema_nervioso1" class="form-control" >
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab1">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Examenes Auxiliares</label>
      <input id="exa_auxiliares1" class="form-control">
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <label for="">Diagnosticos</label>
      <div class="table-responsive">
      <table class="table align-items-center table-borderless" id="table-diagnosticos">
      <thead class="thead-light">
      <tr>
      <th scope="col" class="text-sm">ID</th>
      <th scope="col" class="sort text-sm" data-sort="name">Codigo</th>
      <th scope="col" class="sort text-sm" data-sort="budget">Nombre diagnostico</th>
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
      <table class="table align-items-center table-borderless" id="items-ginecologia-table">
      <thead class="thead-light">
      <tr>
      <th scope="col" class="text-sm">ID</th>
      <th scope="col" class="sort text-sm" data-sort="name">Codigo</th>
      <th scope="col" class="sort text-sm" data-sort="budget">Nombre diagnostico</th>
      </tr>
      </thead>
      <tbody>
      </tbody>
      </table>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Tratamiento</label>
      <textarea  rows="2" id="tratamientos_gine" class="form-control"></textarea>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Plan de trabajo</label>
      <input id="plan_trabajo1" class="form-control"></input>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>Proxima cita</label>
      <input type="date" id="proxima_cita1" class="form-control" >
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>Firma del medico</label>
      <input type="text" id="firma_medico1" class="form-control" >
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="tab-pane fade" id="nav-procedimientos" role="tabpanel" aria-labelledby="nav-procedimientos">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-6">
      <label for="">Procedimientos</label>
      <div class="table-responsive">
      <table class="table align-items-center table-borderless" id="table-procedimientos">
      <thead class="thead-light">
      <tr>
      <th scope="col" class="sort text-sm" data-sort="name">Codigo</th>
      <th scope="col" class="sort text-sm" data-sort="budget">Nombre procedimiento</th>
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
      <div class="col-md-6">
      <br>
      <div class="table-responsive">
      <table class="table align-items-center table-borderless" id="items-procedimientos-table">
      <thead class="thead-light">
      <tr>
      <th scope="col" class="sort text-sm" data-sort="name">Codigo</th>
      <th scope="col" class="sort text-sm" data-sort="budget">Nombre procedimiento</th>
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
      <button type="button" class="btn btn-primary" id="guardarhistoriaginecologia">Guardar</button>
      </div>
      </div>
      </div>
      </div>
      <!-- MODAL MEDICINA GENERAL -->
      <div class="modal fade" id="Agregarhistoria2" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
      <div class="modal-header bg-default">
      <h5 class="modal-title text-uppercase text-white" id="exampleModalLabel">Historia Clinica <span class="cyan-text">MEDICINA GENERAL</span> del Paciente </h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>DNI</label>
      <input type="text" class="form-control" id="documento2" value="<?php echo  $pacientes->documento;  ?>" readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Paciente</label>
      <input type="text" class="form-control" id="paciente2"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Edad</label>
      <input type="text" class="form-control" id="edad2"  readonly>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Especialiad</label>
      <input type="text" class="form-control" id="especialidad2"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Sexo</label>
      <input type="text" class="form-control" id="sexo2"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Doctor</label>
      <input type="text" class="form-control" id="doctor2"  readonly>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Presion arterial</label>
      <input type="text" class="form-control" id="presion2"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Temperatura</label>
      <input type="text" class="form-control" id="temperatura2"  readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Frecuencia respira</label>
      <input type="text" class="form-control" id="respiratoria2"  readonly>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Frecuencia Cardiaca</label>
      <input type="text" class="form-control" id="cardiaca2"  readonly>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group input-group-sm">
      <label>Saturación O2</label>
      <input type="text" class="form-control" id="saturacion2"  readonly>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group input-group-sm">
      <label>Peso</label>
      <input type="text" class="form-control" id="peso2"  readonly>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group input-group-sm">
      <label>Talla</label>
      <input type="text" class="form-control" id="talla2"  readonly>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group input-group-sm">
      <label>IMC</label>
      <input type="text" class="form-control" id="imc2"  readonly>
      </div>
      </div>
      </div>
      <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-anemesis-tab" data-bs-toggle="tab" data-bs-target="#nav-anemesis" type="button" role="tab" aria-controls="nav-anemesis" aria-selected="true">1. Anamnesis</button>
      <button class="nav-link" id="nav-fisico-tab" data-bs-toggle="tab" data-bs-target="#nav-fisico" type="button" role="tab" aria-controls="nav-fisico" aria-selected="false">2. Examen fisico</button>
      <button class="nav-link" id="nav-diagnostico-tab" data-bs-toggle="tab" data-bs-target="#nav-diagnostico" type="button" role="tab" aria-controls="nav-diagnostico" aria-selected="false">3. Diagnostico</button>
      <button class="nav-link" id="nav-trabajo-tab" data-bs-toggle="tab" data-bs-target="#nav-trabajo" type="button" role="tab" aria-controls="nav-trabajo" aria-selected="false">4. Plan de trabajo</button>
      <button class="nav-link" id="nav-procedimientos-tab" data-bs-toggle="tab" data-bs-target="#nav-procedimientos2" type="button" role="tab" aria-controls="nav-procedimientos2" aria-selected="false">5. Procedimientos</button>
      </div>
      </nav>
      <div class="tab-content" id="nav-tabContent1">
      <div class="tab-pane fade show active" id="nav-anemesis" role="tabpanel" aria-labelledby="nav-anemesis-tab">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Tipo de anamnesis :</label>
      <select class="form-control" id="anamnesis2">
      <option value="D">Directa</option>
      <option value="I">Indirecta</option>
      <option value="M">Mixta</option>
      </select>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Empresa</label>
      <input type="text" id="empresa2" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Compañia</label>
      <input type="text" id="compania2" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>IAFA</label>
      <input type="text" id="iafa2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Nombres y Apellidos del acompañante</label>
      <input type="text" id="acompanante2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>DNI</label>
      <input type="number" id="dni3" class="form-control" >
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>Celular</label>
      <input type="number" id="celular2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="tab-pane" id="consulta" role="tabpanel" aria-labelledby="profile-tab">
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Motivo Consulta</label>
      <textarea  rows="2" id="motivo_consulta2" class="form-control"></textarea>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Tratamiento Anterior</label>
      <textarea  rows="2" id="tratamiento_anterior2" class="form-control"></textarea>
      </div>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Enfermedad Actual</label>
      <input type="text" id="enfermedad_actual2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Tiempo de enfermedad</label>
      <input type="text" id="tp_enfermedad2" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Inicio</label>
      <input type="text" id="inicio2" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Curso</label>
      <input type="text" id="curso2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Sintomas</label>
      <input type="text" id="sintomas2" class="form-control" >
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="tab-pane fade" id="nav-fisico" role="tabpanel" aria-labelledby="nav-fisico-tab">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Piel</label>
      <input type="text" id="ap_genito2" class="form-control" >
      </div>
      </div>
      </div>
      
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Cuello</label>
      <input type="text" id="cuello2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>AP. Respiratorio</label>
      <input type="text" id="ap_respiratorio2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>AP. Cardio Vascular</label>
      <input type="text" id="ap_cardio2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Abdomen</label>
      <input type="text" id="abdomen2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Cabeza</label>
      <input type="text" id="cabeza2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Locomotor</label>
      <input type="text" id="locomotor2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Sistemas Nervioso</label>
      <input type="text" id="sistema_nervioso2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Apetito</label>
      <input type="text" id="apetito2" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Sed</label>
      <input type="text" id="sed2" class="form-control" >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group input-group-sm">
      <label>Orina</label>
      <input type="text" id="orina2" class="form-control" >
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="tab-pane fade" id="nav-diagnostico" role="tabpanel" aria-labelledby="nav-diagnostico-tab">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-6">
      <label for="">Diagnosticos</label>
      <div class="table-responsive">
      <table class="table align-items-center table-borderless" id="table-diagnosticos2">
      <thead class="thead-light">
      <tr>
      <th scope="col" class="text-sm">ID</th>
      <th scope="col" class="sort text-sm" data-sort="name">Codigo</th>
      <th scope="col" class="sort text-sm" data-sort="budget">Nombre diagnostico</th>
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
      <thead class="thead-light">
      <tr>
      <th scope="col" class="text-sm">ID</th>
      <th scope="col" class="sort  text-sm" data-sort="name">Codigo</th>
      <th scope="col" class="sort  text-sm" data-sort="budget">Nombre diagnostico</th>
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
      <div class="tab-pane fade" id="nav-procedimientos2" role="tabpanel" aria-labelledby="nav-procedimientos2">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-6">
      <label for="">Procedimientos</label>
      <div class="table-responsive">
      <table class="table align-items-center table-borderless" id="table-procedimientos2">
      <thead class="thead-light">
      <tr>
      <th scope="col" class="sort text-sm" data-sort="name">Codigo</th>
      <th scope="col" class="sort text-sm" data-sort="budget">Nombre procedimiento</th>
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
      <div class="col-md-6">
      <br>
      <div class="table-responsive">
      <table class="table align-items-center table-borderless" id="items-procedimientos2-table">
      <thead class="thead-light">
      <tr>
      <th scope="col" class="sort text-sm" data-sort="name">Codigo</th>
      <th scope="col" class="sort text-sm" data-sort="budget">Nombre procedimiento</th>
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
      <div class="tab-pane fade" id="nav-trabajo" role="tabpanel" aria-labelledby="nav-trabajo-tab">
      <div class="container mt-3">
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Examen de ayuda al Dx</label>
      <input type="text" id="examendx2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Procedimientos</label>
      <input type="text" id="procedimientos2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Interconsultas</label>
      <input type="text" id="interconsultas2" class="form-control" >
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Tratamiento</label>
      <textarea  rows="2" id="tratamiento2" class="form-control"></textarea>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group input-group-sm">
      <label>Referencia</label>
      <textarea  rows="2" id="referencia2" class="form-control"></textarea>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>Proxima cita</label>
      <input type="date" id="cita2" class="form-control" >
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group input-group-sm">
      <label>Firma del medico</label>
      <input type="text" id="firma2" class="form-control" >
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="guardarhistoriageneral">Guardar</button>
      <button type="button" class="btn btn-danger" id="cerrar">Cerrar</button>
      </div>
      </div>
      </div>
      </div>
      <!-- MODAL RECETA MEDICA -->
      <div class="modal fade" id="Agregarreceta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
      <div class="modal-header bg-default">
      <h5 class="modal-title text-uppercase text-white" id="exampleModalLabel">Recetario del Paciente</h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <form action="">
          <div class="row">
             <div class="col-md-2">
               <div class="form-group input-group-sm">
                 <label>Fecha</label>
                 <input type="text" id="fecha" value="<?php echo date("d-m-Y"); ?>" class="form-control" readonly>
               </div>
             </div>
             <div class="col-md-4">
               <div class="form-group input-group-sm">
                 <label>Doctor</label>
                 <input type="text" class="form-control">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group input-group-sm">
                 <label>Paciente</label>
                 <input type="text" class="form-control">
               </div>
             </div>    
        </form>
         <div class="row">
             <div class="col-md-6">
               <div class="form-group input-group-sm">
                 <label>Farmaco</label>
                 <input type="text" class="form-control">
               </div>
             </div>
             <div class="col-md-3">
               <div class="form-group input-group-sm">
                 <label>Cantidad</label>
                 <input type="text" class="form-control">
               </div>
             </div>
             <div class="col-md-3">
               <div class="form-group input-group-sm">
                   <label>Dosis</label>
                   <select class="form-control" id="dosis">
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
          <div class="row">
             <div class="col-md-4">
               <div class="form-group input-group-sm">
                 <label>Via Aplicación</label>
                 <select class="form-control" id="via_aplicaion">
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
             </div>
             <div class="col-md-4">
               <div class="form-group input-group-sm">
                 <label>Frecuencia</label>
                 <select class="form-control" id="frecuencia">
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
             </div>
             <div class="col-md-4">
               <div class="form-group input-group-sm">
                 <label>Duración</label>
                 <select class="form-control" id="duracion">
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
          </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
         
      <!-- ventanas laterales  DOCUMENTOS -->
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-header bg-default">
      <h5 class="offcanvas-title text-uppercase text-white" id="offcanvasScrollingLabel">Historias fisico</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <form action="<?php echo base_url(); ?>administracion/subirdocumentos" method="POST" enctype="multipart/form-data">
      <div class="row" hidden>
      <div class="form-group input-group-sm">
      <label>codigo</label>
      <input type="text" name="paciente"  value="<?php echo $pacientes->documento; ?>"  class="form-control" readonly>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group">
      <label>Nombre del archivo</label>
      <input type="text" name="titulo" class="form-control" required>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group">
      <label>Archivo</label>
      <input type="file" name="icono" id="icono"  class="form-control" accept="application/pdf" required>
      </div> 
      </div>
      </div>
      <div class="form-group">
      <input type ="submit" value="guardar" class="btn btn-primary btn-sm mt-2">
      </div>
      </form>
      <div class="row">
      <div class="col-md-12">
      <div class="table-responsive">
      <table class="table align-items-center ">
      <tbody>
      <?php foreach($documento->result() as $documentos){ ?>
      <tr>
      <td class="w-30">
      <div class="d-flex px-2 py-1 align-items-center">
      <div>
      <i class="fas fa-file-pdf"></i>
      </div>
      <div class="ms-4">
      <p class="text-xs font-weight-bold mb-0">url:</p>
      <a target="blank" href="<?php echo base_url(); ?>public/documentos/<?php echo $documentos->url_documento; ?>">Ver documento</a>
      </div>
      </div>
      </td> 
      <td>
      <div class="text-center">
      <p class="text-xs font-weight-bold mb-0">Nombre:</p>
      <h6 class="text-sm mb-0"><?php echo $documentos->titulo; ?></h6>
      </div>
      </td>
      </tr>
      <?php } ?>
      </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- LABORATORIO -->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
      <div class="offcanvas-header bg-default">
      <h5 class="offcanvas-title text-uppercase text-white" id="offcanvasWithBackdropLabel">Laboratorio</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <form action="<?php echo base_url(); ?>administracion/cargararchivoslaboratorio" method="POST" enctype="multipart/form-data">
      <div class="row" hidden>
      <div class="col-md-12">
      <div class="form-group ">
      <label>codigo</label>
      <input type="text" name="paciente"  value="<?php echo $pacientes->documento; ?>"  class="form-control">
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group">
      <label>Nombre del archivo</label>
      <input type="text" name="titulo"  class="form-control" required>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="form-group">
      <label>Archivo</label>
      <input type="file" name="icono" id="icono"  class="form-control" accept="application/pdf" required>
      </div> 
      </div>
      <div class="form-group">
      <input type ="submit" value="guardar" class="btn btn-primary btn-sm mt-2">
      </div>
      </form>
      <div class="row">
      <div class="col-md-12">
      <div class="table-responsive">
      <table class="table align-items-center ">
      <tbody>
      <?php foreach($docLaboratorio->result() as $docLaboratorios){ ?>
      <tr>
      <td class="w-30">
      <div class="d-flex px-2 py-1 align-items-center">
      <div>
      <i class="fas fa-file-pdf"></i>
      </div>
      <div class="ms-4">
      <p class="text-xs font-weight-bold mb-0">url:</p>
      <a target="blank" href="<?php echo base_url(); ?>public/laboratorio/<?php echo $docLaboratorios->url_documento; ?>">Ver documento</a>
      </div>
      </div>
      </td> 
      <td>
      <div class="text-center">
      <p class="text-xs font-weight-bold mb-0">Nombre:</p>
      <h6 class="text-sm mb-0"><?php echo $docLaboratorios->titulo; ?></h6>
      </div>
      </td>
      </tr>
      <?php } ?>
      </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- PATOLOGIA -->
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
      <div class="offcanvas-header bg-default">
      <h5 class="offcanvas-title text-uppercase text-white" id="offcanvasWithBothOptionsLabel">Patologia</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <form action="<?php echo base_url(); ?>administracion/cargararchivospatologos" method="POST" enctype="multipart/form-data">
      <div class="row" hidden>
      <div class="col-md-12">
      <div class="form-group ">
      <label>codigo</label>
      <input type="text" name="paciente"  value="<?php echo $pacientes->documento; ?>"  class="form-control">
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group">
      <label>Nombre del archivo</label>
      <input type="text" name="titulo"  class="form-control" required>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="form-group">
      <label>Archivo</label>
      <input type="file" name="icono" id="icono"  class="form-control" accept="application/pdf" required>
      </div> 
      </div>
      <div class="form-group">
      <input type ="submit" value="guardar" class="btn btn-primary btn-sm mt-2">
      </div>
      </form>
      <div class="row">
      <div class="col-md-12">
      <div class="table-responsive">
      <table class="table align-items-center ">
      <tbody>
      <?php foreach($docPatologia->result() as $docPatologias){ ?>
      <tr>
      <td class="w-30">
      <div class="d-flex px-2 py-1 align-items-center">
      <div>
      <i class="fas fa-file-pdf"></i>
      </div>
      <div class="ms-4">
      <p class="text-xs font-weight-bold mb-0">url:</p>
      <a target="blank" href="<?php echo base_url(); ?>public/patologia/<?php echo $docPatologias->url_documento; ?>">Ver documento</a>
      </div>
      </div>
      </td> 
      <td>
      <div class="text-center">
      <p class="text-xs font-weight-bold mb-0">Nombre:</p>
      <h6 class="text-sm mb-0"><?php echo $docPatologias->titulo; ?></h6>
      </div>
      </td>
      </tr>
      <?php } ?>
      </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- ECOGRAFIAS -->
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling3" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-header bg-default">
      <h5 class="offcanvas-title text-uppercase text-white" id="offcanvasWithBothOptionsLabel">Ecografias</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <form action="<?php echo base_url(); ?>administracion/cargararchivoecografias" method="POST" enctype="multipart/form-data">
      <div class="row" hidden>
      <div class="col-md-12">
      <div class="form-group ">
      <label>codigo</label>
      <input type="text" name="paciente"  value="<?php echo $pacientes->documento; ?>"  class="form-control">
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
      <div class="form-group">
      <label>Nombre del archivo</label>
      <input type="text" name="titulo"  class="form-control" required>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="form-group">
      <label>Archivo</label>
      <input type="file" name="icono" id="icono"  class="form-control" accept="application/pdf" required>
      </div> 
      </div>
      <div class="form-group">
      <input type ="submit" value="guardar" class="btn btn-primary btn-sm mt-2">
      </div>
      </form>
      <div class="row">
      <div class="col-md-12">
      <div class="table-responsive">
      <table class="table align-items-center ">
      <tbody>
      <?php foreach($docEcografia->result() as $docEcografias){ ?>
      <tr>
      <td class="w-30">
      <div class="d-flex px-2 py-1 align-items-center">
      <div>
      <i class="fas fa-file-pdf"></i>
      </div>
      <div class="ms-4">
      <p class="text-xs font-weight-bold mb-0">url:</p>
      <a target="blank" href="<?php echo base_url(); ?>public/ecografias/<?php echo $docEcografias->url_documento; ?>">Ver documento</a>
      </div>
      </div>
      </td> 
      <td>
      <div class="text-center">
      <p class="text-xs font-weight-bold mb-0">Nombre:</p>
      <h6 class="text-sm mb-0"><?php echo $docEcografias->titulo; ?></h6>
      </div>
      </td>
      </tr>
      <?php } ?>
      </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- ECOGRAFIA TRANSVAGINAL -->
      <div class="modal fade" id="ecografiatransvaginal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ecografia transvaginal</h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <div class="row ">
      <div class="col-md-6">
      <div class="form-group">
      <label>Doctor tratante</label>
      <input
        type="text"
        class="form-control form-control-sm"
        value="<?php echo $this->session->userdata("apellido")." ". $this->session->userdata("nombre") ?>"
        readonly
        id="codigo_doctor"
      >
      </div>
      </div>
      <div class="col-md-3">
      <div class="form-group">
      <label>Fecha</label>
      <input type="text" class="form-control form-control-sm" value="<?php echo date("d-m-Y"); ?>" readonly>
      </div>
      </div>
      <div class="col-md-3">
      <div class="form-group">
      <label>Hora</label>
      <input type="text" class="form-control form-control-sm" value="<?php echo date("h:i A"); ?>" readonly>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-3">
      <div class="form-group">
      <label>Documento</label>
      <input
        type="number"
        class="form-control form-control-sm"
        value="<?php echo $pacientes->documento; ?>"
        readonly
        id="documento_paciente"
      >
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group">
      <label>Apellidos</label>
      <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->apellido; ?>" readonly>
      </div>
      </div>
      <div class="col-md-4">
      <div class="form-group">
      <label>Nombres</label>
      <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->nombre; ?>" readonly>
      </div>
      </div>
      <div class="col-md-1">
      <div class="form-group">
      <label>Edad</label>
      <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->edad; ?>" readonly>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group">
      <label>Utero</label>
      <select class="form-control form-control-sm" id="utero">
      <option value="Anteverso">Anteverso</option>
      <option value="Retroverso">Retroverso</option>
      <option value="Ausente">Ausente</option>
      </select>
      </div>
      </div>
      <div class="col-md-4 offset-md-1">
      <label>Superficie</label>
      <br>
      <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
      <label class="form-check-label" for="inlineRadio1">Regular</label> 
      </div>
      <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
      <label class="form-check-label" for="inlineRadio2">Modular</label>
      </div> 
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group">
      <label>Endometrio</label>
      <textarea class="form-control" id="endometrio" rows="1">Grosor mm libre</textarea>
      <br>
      <label>Tumor anexial</label>
      <br>
      <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
      <label class="form-check-label" for="inlineRadio1">Si</label> 
      </div>
      <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
      <label class="form-check-label" for="inlineRadio2">No</label>
      </div> 
      <input type="text" class="form-control-sm form-control" value="No hay masas solidas ni quisticas">
      </div>
      </div>
      <div class="col-md-8 ">
      <div class="row">
      <div class="col-md-2 offset-md-1">
      <label>Dimensiones =></label>
      </div>
      <div class="col-md-2">
      <label>Longitud</label>
      </div>
      <div class="col-md-2">
      <label>Transverso</label>
      </div>
      <div class="col-md-2">
      <label>Ant. post</label>
      </div>
      </div>
      <div class="row">
      <div class="col-md-2 offset-md-1">
      <label>UTERO</label>
      </div>
      <div class="col-md-1">
      <input type="text" class="form-control form-control-sm" id="utero_medidas">
      </div>
      <div class="col-md-1">
      <label class="mt-3">mm</label>
      </div>
      <div class="col-md-1">
      <input type="text" class="form-control form-control-sm" id="utero_medidas1">
      </div>
      <div class="col-md-1">
      <label class="mt-3">mm</label>
      </div>
      <div class="col-md-1">
      <input type="text" class="form-control form-control-sm" id="utero_medidas2">
      </div>
      <div class="col-md-4">
      <textarea id="comentario_utero" class="form-control form-control-sm" rows="1">DE BORDES REGULARES Y PARENQUIMA HOMOGENEO</textarea>
      </div>
      </div>
      <br>
      <div class="row">
      <div class="col-md-2 offset-md-1">
      <label>OVARIO DERECHO</label>
      </div>
      <div class="col-md-1">
      <input type="text" class="form-control form-control-sm" id="ovario_der">
      </div>
      <div class="col-md-1">
      <label class="mt-3">mm</label>
      </div>
      <div class="col-md-1">
      <input type="text" class="form-control form-control-sm" id="ovario_der1">
      </div>
      <div class="col-md-1">
      <label class="mt-3">mm</label>
      </div>
      <div class="col-md-4">
      <textarea id="comentario_ovarioder" class="form-control form-control-sm" rows="1">DE ASPECTO NORMAL.</textarea>
      </div>
      </div>
      <br>
      <div class="row">
      <div class="col-md-2 offset-md-1">
      <label>OVARIO IZQUIERDO</label>
      </div>
      <div class="col-md-1">
      <input type="text" class="form-control form-control-sm" id="ovario_izq">
      </div>
      <div class="col-md-1">
      <label class="mt-3">mm</label>
      </div>
      <div class="col-md-1">
      <input type="text" class="form-control form-control-sm" id="ovario_izq1">
      </div>
      <div class="col-md-1">
      <label class="mt-3">mm</label>
      </div>
      <div class="col-md-4">
      <textarea id="comentario_ovarioizq" class="form-control form-control-sm" rows="1">DE ASPECTO NORMAL.</textarea>
      </div>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-2">
      <label>Fondo de saco</label>
      <textarea id="fondoSaco" class="form-control form-control-sm" rows="1">Libre</textarea>
      </div>
      <div class="col-md-5">
      <label>Conclusión</label>
      <textarea id="conclusion" class="form-control form-control-sm" rows="2"></textarea>
      </div>
      <div class="col-md-5">
      <label>Sugerencias</label>
      <textarea id="sugerencias" class="form-control form-control-sm" rows="2"></textarea>
      </div>
      </div>
      </div>
      <br>
      <div class="modal-footer">
      <button
        type="button"
        class="btn btn-danger"
        id="pdf_ecografia_transvaginal"
        onclick="imprimirEcografiaTransvaginal()"
        hidden
      >
        pdf
      </button>
      <button
        type="button"
        class="btn btn-primary"
        onclick="createEcografiaTransvaginal()"
      >
        Guardar
      </button>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- ECOGRAFIA PELVICA -->
      <div class="modal fade" id="ecografiapelvica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ecografia pelvica</h5>
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row ">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Doctor tratante</label>
                        <input
                          type="text"
                          class="form-control form-control-sm"
                          value="<?php echo $this->session->userdata("apellido")." ". $this->session->userdata("nombre") ?>"
                          readonly
                          id="codigo_doctor"
                        >
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Fecha</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo date("d-m-Y"); ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Hora</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo date("h:i A"); ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Documento</label>
                        <input 
                          type="number"
                          class="form-control form-control-sm" value="<?php echo $pacientes->documento; ?>"
                          readonly
                          id="documento_paciente"
                        >
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->apellido; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->nombre; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group">
                        <label>Edad</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->edad; ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Utero</label>
                        <select class="form-control form-control-sm" id="utero_tipo">
                           <option value="Anteverso">Anteverso</option>
                           <option value="Retroverso">Retroverso</option>
                           <option value="Ausente">Ausente</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4 offset-md-1">
                     <label>Superficie</label>
                     <br>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Regular</label> 
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Modular</label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Endometrio</label>
                           <textarea class="form-control" rows="1" id="endometrio">Grosor mm libre</textarea>
                           <br>
                           <label>Tumor anexial</label>
                           <br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label> 
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                           </div>
                           <input type="text" id="conclusion" id="tumorAnexial-com" class="form-control-sm form-control" value="No hay masas solidas ni quisticas">
                        </div>
                     </div>
                     <div class="col-md-8 ">
                        <div class="row">
                           <div class="col-md-2 offset-md-1">
                              <label>Dimensiones =></label>
                           </div>
                           <div class="col-md-2">
                              <label>Longitud</label>
                           </div>
                           <div class="col-md-2">
                              <label>Transverso</label>
                           </div>
                           <div class="col-md-2">
                              <label>Ant. post</label>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2 offset-md-1">
                              <label>UTERO</label>
                           </div>
                           <div class="col-md-1">
                              <input type="number" class="form-control form-control-sm" id="utero_medidas">
                           </div>
                           <div class="col-md-1">
                              <label class="mt-3">mm</label>
                           </div>
                           <div class="col-md-1">
                              <input type="number" class="form-control form-control-sm" id="medidaUtero1">
                           </div>
                           <div class="col-md-1">
                              <label class="mt-3">mm</label>
                           </div>
                           <div class="col-md-1">
                              <input type="number" class="form-control form-control-sm" id="medidaUtero2">>
                           </div>
                           <div class="col-md-3">
                              <textarea id="comentarioUtero" class="form-control form-control-sm" rows="1">DE BORDES REGULARES Y PARENQUIMA HOMOGENEO</textarea>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-2 offset-md-1">
                              <label>OVARIO DERECHO</label>
                           </div>
                           <div class="col-md-1">
                              <input type="number" class="form-control form-control-sm" id="ovario_der1">
                           </div>
                           <div class="col-md-1">
                              <label class="mt-3">mm</label>
                           </div>
                           <div class="col-md-1">
                              <input type="number" class="form-control form-control-sm" id="ovario_der2">
                           </div>
                           <div class="col-md-1">
                              <label class="mt-3">mm</label>
                           </div>
                           <div class="col-md-4">
                              <textarea id="comentarioOvario_der" class="form-control form-control-sm" rows="1">DE ASPECTO NORMAL.</textarea>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-2 offset-md-1">
                              <label>OVARIO IZQUIERDO</label>
                           </div>
                           <div class="col-md-1">
                              <input type="number" class="form-control form-control-sm" id="ovario_iz1">
                           </div>
                           <div class="col-md-1">
                              <label class="mt-3">mm</label>
                           </div>
                           <div class="col-md-1">
                              <input type="number" class="form-control form-control-sm" id="ovario_iz2">
                           </div>
                           <div class="col-md-1">
                              <label class="mt-3">mm</label>
                           </div>
                           <div class="col-md-4">
                              <textarea id="comentarioOvario_izq" class="form-control form-control-sm" rows="1">DE ASPECTO NORMAL.</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label>Fondo de saco</label>
                        <textarea id="fondosaco" class="form-control form-control-sm" rows="1">    Libre</textarea>
                     </div>
                     <div class="col-md-6">
                        <label>Miometrio</label>
                        <textarea id="miometrio" class="form-control form-control-sm" rows="1">Homogenio</textarea>
                     </div>
                  </div>
                  <br>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                        <label>Conclusión</label>
                        <textarea id="conclusion" class="form-control form-control-sm" rows="2"></textarea>
                     </div>
                     <div class="col-md-6">
                        <label>Sugerencias</label>
                        <textarea id="sugerencias" class="form-control form-control-sm" rows="2"></textarea>
                     </div>
                  </div>
               </div>
               <br>
               <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-danger"
                    id="pdf_ecografia_pelvica"
                    onclick="imprimirEcografiaPelvica()"
                    hidden
                  >
                    pdf
                  </button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    onclick="createEcografiaPelvica()"
                  >
                    Guardar
                  </button>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      <!-- ECOGRAFIA MORFOLOGICA -->
      <div class="modal fade" id="ecografiamorfologica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ecografia morfologica</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
               <div class="row ">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Doctor tratante</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $this->session->userdata("apellido")." ". $this->session->userdata("nombre") ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Fecha</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo date("d-m-Y"); ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Hora</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo date("h:i A"); ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Documento</label>
                        <input type="number" class="form-control form-control-sm" value="<?php echo $pacientes->documento; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->apellido; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->nombre; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group">
                        <label>Edad</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->edad; ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                 <div class="col-md-3">
                    <label>Sexo</label>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                     <label class="form-check-label" for="inlineRadio1">Masculino</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Femenino</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">No visible</label>
                   </div>
                 </div>
               </div>
               <div class="row mt-2">
               <div class="col-md-3">
                    <label>Situaciòn</label>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                     <label class="form-check-label" for="inlineRadio1">Cefalico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Podatico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Indiferente</label>
                   </div>
                 </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <h6 class="text-danger">CABEZA</h6>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Forma</label>
                              <textarea id="formacabeza" class="form-control">encefalo, ventriculos, linea media, talamos y cisuras normales, cavum del septum pellucidum y cuerpo calloso visible
                              </textarea>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Cerebelo (mm)</label>
                              <input type="number" id="cerebelo" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Cisterna Magna (mm)</label>
                              <input type="number" id="cisternaMagna" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Atrio Ventricular (mm)</label>
                              <input type="number" id="atrioVentricular" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <h6 class="text-primary">CARA</h6>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Perfil</label>
                              <textarea id="perfilCara" class="form-control">nariz y fosas nasales, labio superior, orbitas y cristalinos normales</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                           <h6 class="text-info">CUELLO</h6>
                              <textarea id="cuello" class="form-control">no masas</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <h6 class="text-warning">TORAX</h6>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Se observa</label>
                              <textarea id="perfiltorax" class="form-control">pulmones y corazón de tamaños adecuados, no masas</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                           <h6 class="text-secondary">CORAZON</h6>
                              <textarea id="corazon" class="form-control">situs solitus, tamaño, frecuencia cardiaca, 4 camaras y eje cardiaco normales, salida de aorta y arteria pulmonar normales y cruzamiento adecuados (“vasos bien relacionados”)</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  <div class="col-md-4">
                     <h6 class="text-warning">COLUMNA VERTEBRAL</h6>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Se observa</label>
                              <textarea id="columnaVertebral" class="form-control">de aspecto normal en los planos sagital coronal y tranversal.</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                           <h6 class="text-secondary">ABDOMEN</h6>
                              <textarea id="abdomen" class="form-control">pared normal, estomago presente, riñones normales, vejiga con 2 vasos (arterias umbilicales). intestinos de  ecogenicidad normal, insercion de cordon normal. </textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <h6 class="text-success">BIOMETRIA FETAL</h6>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>DBP (mm)</label>
                              <input type="number" id="dbp" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>CC (mm)</label>
                              <input type="number" id="cc" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>CA (mm)</label>
                              <input type="number" id="ca" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>LF (mm)
                              </label>
                              <input type="number" id="axila-der" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Comentario</label>
                              <textarea id="comentario" class="form-control">PLACENTA CORPORAL POSTERIOR GRADO  “0”                  LA: ADECUADO PARA EDAD GESTACIONAL</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <h6 class="text-primary">DOPPLER ARTERIAS UTERINAS (IP)</h6>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Derecha</label>
                              <input type="text" id="ip-der" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Izquierda</label>
                              <input type="text" id="ip-izq" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Ponderado Fetal (gr)</label>
                              <input type="number" id="ponderadoFetal" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>LCF (x min)</label>
                              <input type="number" id="axila-der" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Conclusiones</label>
                              <textarea id="conclusiones" class="form-control"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="pdfecografiamorfologica" hidden>pdf</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      <!-- ECOGRAFIA GENETICA -->
      <div class="modal fade" id="ecografiagenetica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ecografia genetica</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="row ">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Doctor tratante</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $this->session->userdata("apellido")." ". $this->session->userdata("nombre") ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Fecha</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo date("d-m-Y"); ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Hora</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo date("h:i A"); ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Documento</label>
                        <input type="number" class="form-control form-control-sm" value="<?php echo $pacientes->documento; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->apellido; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->nombre; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group">
                        <label>Edad</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->edad; ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                 <div class="col-md-3">
                    <label>Feto / Embriòn</label>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                     <label class="form-check-label" for="inlineRadio1">Unico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Multiple</label>
                   </div>
                 </div>
               </div>
               <div class="row mt-2">
               <div class="col-md-3">
                    <label>Situaciòn</label>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                     <label class="form-check-label" for="inlineRadio1">Cefalico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Podatico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Indiferente</label>
                   </div>
                 </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Liquido amniotico</label>
                        <textarea id="liquidoAmniotico" class="form-control" rows="1">volumen normal para la edad gestacional</textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-1">
                     <div class="form-group">
                        <label>Placenta</label>
                        <input id="placenta" type="text" class="form-control form-control-sm" placeholder="Grados"> 
                     </div>
                  </div>
                  <div class="col-md-1">
                     <label>LCR</label> 
                     <input id="lcr" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label class="mt-3">mm</label>
                  </div>
                  <div class="col-md-1">
                     <label>LCF</label> 
                     <input id="lcf" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4 text-center">
                    <label class="mt-3">X</label>
                  </div>
                  <div class="col-md-1">
                     <label>. </label> 
                     <input id="." type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-2">
                     <label>Art Uterina Derecha</label> 
                     <input id="art-Uteder" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-2">
                     <label>Art Uterina Izquierda</label> 
                     <input id="art-Uteizq" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-2">
                     <label>IP Promedio</label> 
                     <input id="ippromedio" type="text" class="form-control form-control-sm">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for=""></label>
                        <textarea id="huesoNasal" class="form-control" rows="1">Hueso nasal presente</textarea>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <label>Translucencia nucal</label> 
                     <input id="translucenciaNucal" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label class="mt-3">mm</label>
                  </div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <label for=""></label>
                        <textarea id="ductudVenosa" class="form-control" rows="1">Ductus venosa onda trifasica normal.</textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Conclusion</label>
                        <textarea id="conclusion" rows="2" class="form-control"></textarea>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Sugerencia</label>
                        <textarea id="sugerencia" rows="2" class="form-control"></textarea>
                     </div>
                  </div>
               </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="pdfecografiagenetica" hidden>pdf</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      <!-- ECOGRAFIA OBSTETRICA -->
      <div class="modal fade" id="ecografiaobstetrica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ecografia obstetrica</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
               <div class="row ">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Doctor tratante</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $this->session->userdata("apellido")." ". $this->session->userdata("nombre") ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Fecha</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo date("d-m-Y"); ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Hora</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo date("h:i A"); ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Documento</label>
                        <input type="number" class="form-control form-control-sm" value="<?php echo $pacientes->documento; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->apellido; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->nombre; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group">
                        <label>Edad</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->edad; ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                 <div class="col-md-3">
                    <label>Feto / Embrión</label>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                     <label class="form-check-label" for="inlineRadio1">Unico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Multiple</label>
                   </div>
                 </div>
               </div>
               <div class="row mt-2">
               <div class="col-md-3">
                    <label>Situaciòn</label>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                     <label class="form-check-label" for="inlineRadio1">Cefalico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Podatico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">Indiferente</label>
                   </div>
                 </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Estado del feto</label>
                        <textarea id="estadoFeto" class="form-control" rows="1">MOVIMIENTOS RESPIRATORIOS Y CORPORALES PRESENTES</textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-1">
                     <div class="form-group">
                        <label>Placenta</label>
                        <input id="placenta" type="text" class="form-control form-control-sm" placeholder="Grados"> 
                     </div>
                  </div>
                  <div class="col-md-1">
                     <label>DPB</label> 
                     <input id="dpb" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label class="mt-3">mm</label>
                  </div>
                  <div class="col-md-1">
                     <label>LCF</label> 
                     <input id="lcf" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4 text-center">
                    <label class="mt-3">X</label>
                  </div>
                  <div class="col-md-1">
                     <label>Min</label> 
                     <input id="min" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1">
                     <label>CC</label> 
                     <input id="cc" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label class="mt-3">mm</label>
                  </div>
                  <div class="col-md-1">
                     <label>CA</label> 
                     <input id="ca" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label class="mt-3">mm</label>
                  </div>
                  <div class="col-md-1">
                     <label>LF</label> 
                     <input id="lf" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label class="mt-3">mm</label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for=""></label>
                        <textarea id="ila" class="form-control" rows="1">ILA ADECUADO PARA LA EDAD GESTACIONAL (POZO MAYOR 42 mm)</textarea>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <label>Percentil</label> 
                     <input id="percentil" type="text" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label class="mt-3">%</label>
                  </div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <label for=""></label>
                        <textarea id="tipoParto" class="form-control" rows="1">SE SUGIERE PARTO INSTITUCIONAL.</textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Conclusion</label>
                        <textarea id="conclusion" rows="2" class="form-control"></textarea>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Sugerencia</label>
                        <textarea id="sugerencia" rows="2" class="form-control"></textarea>
                     </div>
                  </div>
               </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="pdfecografiaobstetrica" hidden>pdf</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      </div>
      <!-- ECOGRAFIA MAMA -->
      <div class="modal fade" id="ecografiamama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ecografia de mama</h5>
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row mt-1">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Doctor tratante</label>
                        <input
                          type="text"
                          class="form-control form-control-sm"
                          value="<?php echo $this->session->userdata("apellido")." ". $this->session->userdata("nombre") ?>"
                          readonly
                          id="codigo_doctor"
                        >
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Fecha</label>
                        <input
                          type="text"
                          class="form-control form-control-sm"
                          value="<?php echo date("d-m-Y"); ?>"
                          readonly
                        >
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Hora</label>
                        <input
                          type="text"
                          class="form-control form-control-sm"
                          value="<?php echo date("h:i A"); ?>"
                          readonly
                        >
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Documento</label>
                        <input
                          type="number"
                          class="form-control form-control-sm"
                          value="<?php echo $pacientes->documento; ?>"
                          readonly
                          id="documento_paciente"
                        >
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Apellidos</label>
                        <input
                          type="text"
                          class="form-control form-control-sm"
                          value="<?php echo $pacientes->apellido; ?>"
                          readonly
                        >
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->nombre; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group">
                        <label>Edad</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $pacientes->edad; ?>" readonly>
                     </div>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-4">
                     <h6 class="text-danger">MAMA IZQUIERDA</h6>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Pezon</label>
                              <input type="text" id="pezon_izq" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>TCSC</label>
                              <input type="text" id="tcsc_izq" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Tejido glandular</label>
                              <input type="text" id="tejido_glandular_izq" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Axila</label>
                              <input type="text" id="axila_izq" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Comentario</label>
                              <textarea class="form-control" id="comentario_mama_izq"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <h6 class="text-primary">MAMA DERECHA</h6>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Pezon</label>
                              <input type="text" id="pezon_der" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>TCSC</label>
                              <input type="text" id="tcsc_der" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Tejido glandular</label>
                              <input type="text" id="tejido_glandular_der" class="form-control form-control-sm">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Axila</label>
                              <input type="text" id="axila_der" class="form-control form-control-sm">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Comentario</label>
                              <textarea id="comentario_der" class="form-control"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <h6 class="text-info "> FINAL </h6>
                     <div class="form-group">
                        <label for="">Conclusión</label>
                        <textarea class="form-control" id="conclusion_mama"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Sugerencias</label>
                        <textarea class="form-control" id="sugerencias_mama"></textarea>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-danger"
                    id="btn_pdf_mama"
                    onclick="imprimirEcografiaMama()"
                    hidden
                  > 
                    <i class="fas fa-file-pdf"></i> PDF
                  </button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    onclick="createEcografiaMama()"
                  >
                    Guardar
                  </button>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      </div>
      <?php require_once("componentes/scripts.php"); ?>
      <script src="<?php echo base_url(); ?>public/js/scripts/historiaclinica.js"></script>
      <script src="<?php echo base_url(); ?>public/js/scripts/ecografias.js"></script>
      <script>
         $(document).ready(function (){
             var url1 = "<?php echo base_url(); ?>administracion/triajehistorias",
                 documento = $("#documento2").val();
         
                 $.ajax( {
                   url: url1,
                   method: "POST",
                   data: { documento: documento  },
                   success: function (data) {
                     data = JSON.parse(data);
                       console.log(data);
                       $("#paciente2").val(data.apellido +" "+ data.paciente);
                       $("#edad2").val(data.edad);
                       $("#especialidad2").val(data.descripcion);
                       $("#sexo2").val(data.sexo);
                       $("#doctor2").val(data.medico);
                       $("#presion2").val(data.presion_arterial);
                       $("#temperatura2").val(data.temperatura);
                       $("#respiratoria2").val(data.frecuencia_respiratoria);
                       $("#cardiaca2").val(data.frecuencia_cardiaca);
                       $("#saturacion2").val(data.saturacion);
                       $("#peso2").val(data.peso);
                       $("#talla2").val(data.talla);
                       $("#imc2").val(data.imc);
         
                       $("#paciente1").val(data.apellido +" "+ data.paciente);
                       $("#edad1").val(data.edad);
                       $("#especialidad1").val(data.descripcion);
                       $("#sexo1").val(data.sexo);
                       $("#doctor1").val(data.medico);
                       $("#arterial1").val(data.presion_arterial);
                       $("#temperatura1").val(data.temperatura);
                       $("#respiratoria1").val(data.frecuencia_respiratoria);
                       $("#cardiaca1").val(data.frecuencia_cardiaca);
                       $("#saturacion1").val(data.saturacion);
                       $("#peso1").val(data.peso);
                       $("#talla1").val(data.talla);
                       $("#imc1").val(data.imc);
                       $("#triajeid1").val(data.codigo_triaje);
                       $("#doctorid1").val(data.codigo_doctor);
                       $("#especialidadid1").val(data.codigo_especialidad);         
                   }
                 });
           
         })
      </script>
   </body>
</html>