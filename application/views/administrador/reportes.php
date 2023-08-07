<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Administracion / Reportes</title>
      <?php require_once("componentes/head.php"); ?>
   </head>
   <body class="g-sidenav-show bg-gray-100">
      <div class="min-height-300 bg-default position-absolute w-100"></div>
      <?php require_once("componentes/menu.php"); ?>
      <main class="main-content position-relative border-radius-lg">
         <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                     <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">administración</a></li>
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Reportes</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Reportes</h6>
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
         <div class="container-fluid py-5">
            <div class="row ">
               <div class="card">
                  <div class="row mt-4">
                     <div class="col-md-12">
                        <h5>Reportes</h5>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-7">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title">Reporte de Atenciones Doctores </h6>
                              <form target="blank" action="<?php echo base_url(); ?>administracion/reportediario" method="POST">
                                 <div class="row">
                                    <div class="col-md-5" style="margin-bottom:10px">
                                       <select name="doctor" class="form-control">
                                          <option value="">Seleccione una opcion</option>
                                          <?php foreach($doctor->result() as $doctores){ ?>
                                          <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre; ?></option>
                                          <?php } ?>
                                          <option value="all">Reporte Ingresos y Gastos</option>
                                       </select>
                                    </div>
                                    <div class="col-md-5">
                                       <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    <div class="col-md-2">
                                       <button type="submit" class="btn btn-primary btn-block"  title="Descargar PDF"> <i class="fa fa-download"></i> </button>
                                    </div>
                                 </div>
                              </form>
                              <hr>
                              <h6 class="card-title">Reporte de gastos</h6>
                              <form target="blank" action="<?php echo base_url(); ?>administracion/reportegastos" method="POST">
                                 <div class="row">
                                    <div class="col-md-5">
                                       <div class="form-group">
                                          <label for="">Desde</label>
                                          <input type="date" name="fecha1" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-5">
                                       <div class="form-group">
                                          <label for="">Hasta</label>
                                          <input type="date" name="fecha2" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <label for=""><br></label>
                                       <button type="submit" class="btn btn-primary btn-block"  title="Descargar PDF"> <i class="fa fa-download"></i> </button>
                                    </div>
                                 </div>
                              </form>
                              <hr>
                              <h5 class="card-title">Reporte Cierre de CAJA <span style="font-size:16px">(Ingresos-Gastos)</span></h5>
                              <form id="reporteglobal" >
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="">Desde</label>
                                          <input type="date" name="fecha_global_1" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="">Hasta</label>
                                          <input type="date" name="fecha_global_2" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <label for=""> </label>
                                       <button type="submit" class="btn btn-primary btn-block"  title="Descargar PDF"> <i class="fa fa-download"></i> </button>
                                    </div>
                                    
                                    
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-5">
                        <div class="card">
                           <form target="blank" action="<?php echo base_url(); ?>administracion/reportelaboratorio" method="POST">
                              <div class="card-body">
                                 <h5 class="card-title">Reporte de laboratorio</h5>
                                 <div class="row">
                                    <div class="col-md-7"  style="margin-bottom:10px">
                                       <input type="text" class="form-control" name="usuario" value="<?php echo $this->session->userdata("nombre"); ?>" readonly>
                                    </div>
                                    <div class="col-md-5">
                                       <input type="date" name="fecha" value="<?php echo date("Y-m-d"); ?>" class="form-control"> 
                                    </div>
                                    <div class="col-md-6" >
                                       <button type="submit" style="width: 100%;" class="btn btn-primary btn-block"> Generar <i class="fa fa-download"></i> </button>
                                    </div>

                                 </div>
                                 <br>
                              </div>
                           </form>
                           
                           <div class="card-body">
                              <h5 class="card-title">Reporte de citas listado dia a dia</h5>
                              <label for="">Seleccione un doctor o ver todos para ver el reporte</label>
                              <select name="" id="" class="form-control">
                                 <option value="">SELECCIONE UNA OPCIÓN</option>
                                 <option value="">VER TODOS</option>
                                 <?php foreach($doctor->result() as $doctores){ ?>
                                 <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre; ?></option>
                                 <?php } ?>
                              </select>
                              <br>
                              
                              <div class="col-md-6" >
                                 <button type="submit" style="width: 100%;" class="btn btn-primary btn-block"> Generar <i class="fa fa-download"></i> </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <?php require_once("componentes/footer.php"); ?>
         </div>
      </main>
      <?php require_once("componentes/personalizar.php"); ?>
      <?php require_once("componentes/scripts.php"); ?>
      <script src="<?php echo base_url(); ?>public/js/scripts/reportes.js"></script>
   </body>
</html>