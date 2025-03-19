<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Administracion / Inicio</title>
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
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Laboratorio</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Laboratorio</h6>
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

                                       <p class="text-xs text-dark mb-0">

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

                                       <p class="text-xs text-dark mb-0">

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

                                       <p class="text-xs text-dark mb-0">

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
            <form class="card" method="post" id="Form_Lab" validate="">
               <div class="row mt-4">
                  <div class="col-md-12">
                     <!-- <h6>LABORATORIO</h6> -->
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-1"  hidden>
                     <div class="form-group input-group-sm">
                        <label>id</label>
                        <input required type="number" class="form-control" id="id" name="id" readonly>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group input-group-sm">
                        <label>DNI</label>
                        <input required type="text" class="form-control" id="dni" name="dni">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group input-group-sm">

                        <label>Nombre completo</label>

                        <input required type="text" class="form-control" id="nombre" name="nombre" readonly>

                     </div>

                  </div>

                  <div class="col-md-3">

                     <div class="form-group input-group-sm">

                        <label>Doctor</label>

                        <select required class="form-control" id="doctor" name="doctor">

                           <option value="">Seleccione el doctor</option>

                            <?php foreach($doctor->result() as $doctores ){ ?>

                              <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre.' '.$doctores->apellido; ?></option>

                            <?php } ?>

                        </select>

                     </div>

                  </div>

                  <div class="col-md-2">

                     <div class="form-group input-group-sm">

                        <label>Fecha</label>

                        <input required type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" id="fecha" readonly>

                     </div>
                  </div>
                  <div class="col-md-2">
                     <label for="">Forma de pago</label>
                     <div class="form-group input-group-sm">
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="tipopago" id="inlineRadio1" value="Efectivo" checked>
                           <label class="form-check-label" for="inlineRadio1">Efectivo</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="tipopago" id="inlineRadio2" value="Tarjeta">
                           <label class="form-check-label" for="inlineRadio2">Tarjeta</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-laboratorio-items">
                                 <thead>
                                    <tr class="bg-default text-white">
                                       <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                                       <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Analisis</th>
                                       <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Precio</th>
                                       <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Estado</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group input-group-sm">
                              <label>Observación</label>
                              <textarea class="form-control" id="observacion" rows="2"></textarea>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group input-group-lg mt-2">
                              <label>TOTAL DE LOS ANALISIS</label>
                              <input type="text" id="total" class="form-control" placeholder="Total"
                                 readonly>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">

                              <button

                                 type="submit"

                                 class="btn btn-primary btn-xs"

                                 >

                                Registrar

                              </button>

                              <button 

                                 class="btn btn-danger btn-xs"

                                 id="ticket-laboratorio"

                                 hidden

                                 >

                              Ticket 

                              </button>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>
               <div class="table-responsive" >
                  <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-laboratorio">
                     <thead  class="bg-default text-white">
                        <tr>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Analisis</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Precio</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12 ps-2">Estado</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($laboratorio->result() as $laboratorios){ ?>
                        <tr>
                           <td class="text-xs"><?php echo $laboratorios->codigo; ?></td>
                           <td class="text-xs"><?php echo $laboratorios->nombre; ?></td>
                           <td class="text-xs"><?php echo $laboratorios->precio; ?></td>
                           <td class="text-xs">ACTIVO</td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  <br>
               </div>
            </form>
            <?php require_once("componentes/footer.php"); ?>
         </div>
      </main>

      <?php require_once("componentes/personalizar.php"); ?>

      <?php require_once("componentes/scripts.php"); ?>

      <script src="<?php echo base_url(); ?>public/js/scripts/laboratorio.js"></script>

      <script src="<?php echo base_url(); ?>public/js/scripts/get_Items.js"></script>

   </body>

</html>