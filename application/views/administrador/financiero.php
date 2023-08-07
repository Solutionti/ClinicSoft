<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Administracion / Financiero</title>
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
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Financiero</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Financiero</h6>
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
            <div class="card">
               <div class="row mt-4">
                  <div class="col-md-12">
                     <a class="btn bg-gradient-danger btn-xs" data-bs-toggle="modal" href="#modal-servicio" role="button">Agregar <i class="fas fa-plus"></i> </a>
                  </div>
               </div>
               <br>  
               <div class="table-responsive" >
                  <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-pagos">
                     <thead>
                        <tr>
                        <tr>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Opciones</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Factura</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Paciente</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Medico</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Especialidad</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Concepto</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Fecha</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Tipo de pago</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Descuento</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Total</th>
                           <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12" >Estado</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                        <?php foreach($pago->result() as $pagos){ ?>
                        <tr>
                           <td>
                              <div class="row">
                                 <a 
                                    class="icon icon-shape icon-sm me-1 bg-gradient-info shadow mx-3"
                                    href="#"
                                    onclick="editarPagos(<?php echo $pagos->codigo_pago; ?>);"
                                 >
                                 <i class="fas fa-eye text-white opacity-10"></i>
                                 </a>
                                 <a 
                                    class="icon icon-shape icon-sm  bg-gradient-danger shadow"
                                    target="blank"
                                    href="<?php echo base_url(); ?>administracion/cargarfactura/<?php echo $pagos->atencion; ?>"
                                 >
                                 <i class="fas fa-file-pdf text-white opacity-10"></i>
                                 </a>
                              </div>
                           </td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->codigo_pago; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->apellido." ".$pagos->paciente; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->doctor; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->especialidad; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->descripcion; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->fecha; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->tipo_deposito; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->descuento; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->total; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $pagos->estado; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  <br>
               </div>
            </div>
            <?php require_once("componentes/footer.php"); ?>
         </div>
      </main>

      <?php require_once("componentes/personalizar.php"); ?>
        <!-- VENTANAS MODALES -->
       
      <div class="modal fade" id="modal-pagos" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog  modal-xl" role="document">
            <form class="modal-content" id="AddCITA">
               <div class="modal-header bg-default">
                  <h5 class="modal-title text-uppercase text-white" id="exampleModalLabel">EDITAR PAGO</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6">
                       <div class="form-group input-group-sm">
                         <label>Atencion</label>
                         <input
                           type="text"
                           class="form-control"
                           id="atencionpa"
                           readonly
                         >
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group input-group-sm">
                         <label>Codigo pago</label>
                         <input
                           type="text"
                           class="form-control"
                           id="codigo_pago"
                           readonly
                         >
                       </div>
                     </div>
                  </div>
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>DNI Paciente</label>
                                 <div class="input-group">
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="dni"
                                      style="height: 32px;padding: 1px;"
                                      minlength="7"
                                      maxlength="11"
                                      disabled
                                    >
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-group input-group-sm">
                                 <label>Apellidos y Nombres  Paciente</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   id="nombre"
                                   disabled
                                 >
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group input-group-sm">
                                 <label>Fecha</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   id="fecha"
                                   disabled
                                 >
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group input-group-sm">
                                 <label>No HC</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   id="hc"
                                   disabled
                                 >
                              </div>
                           </div>
                           <h5>Datos del Ingreso</h5>
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>Costo</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   id="costo"
                                 >
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>Descuento</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   id="descuento"
                                 >
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>Comisiòn</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   id="comision"
                                 >
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>Cantidad recibida</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   id="cantidad_recibida"
                                 >
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                           <div class="form-group input-group-sm">
                              <label>Especialidad</label>
                              <select
                                class="form-control"
                                id="especialidad"
                              >
                                <option value="">SELECCIONE UNA OPCION</option>
                                <?php foreach($especialidad->result() as $especialidades){ ?>
                                  <option value="<?php echo $especialidades->codigo_especialidad; ?>"> <?php echo $especialidades->descripcion; ?> </option>
                                <?php } ?> 
                              </select>
                           </div>
                           </div>
                           <div class="col-md-6">
                           <div class="form-group input-group-sm">
                              <label>Doctor</label>
                              <select
                                class="form-control"
                                id="doctor"
                              >
                                <option value="">SELECCIONE UNA  OPCION</option>
                                <?php foreach($doctor->result() as $doctores ){ ?>
                                  <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre; ?></option>
                                <?php } ?>
                              </select>
                           </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                           <div class="form-group input-group-sm">
                              <label>Estado</label>
                              <select
                                class="form-control"
                                id="estado"
                              >
                                <option value="">SELECCIONE UNA OPCION</option>
                                <option value="Registrado">REGISTRADO</option>
                                <option value="Triaje">TRIAJE</option>
                                <option value="Consulta">CONSULTA</option>
                                <option value="Atendido">ATENDIDO</option>
                              </select>
                           </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" id="guardarDatosPagos">Guardar</button>
                     </div>
                  </form>
               </div>
            </div>
<div class="modal fade" id="modal-servicio" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h5 class="modal-title text-uppercase text-white" id="exampleModalLabel">Ingresar Pago</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group input-group-sm">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" id="descripcion">
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
                <div class="form-group input-group-sm">
                    <label>Precio</label>
                    <input type="number" class="form-control" id="precio-pago">
                </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="crearPago">Guardar</button>
       
      </div>
    </div>
  </div>
</div>
      <?php require_once("componentes/scripts.php"); ?>
      <script src="<?php echo base_url(); ?>public/js/scripts/pagos.js"></script>
   </body>
</html>