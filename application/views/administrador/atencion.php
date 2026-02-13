<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Administracion / Admisiones</title>
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
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Admisiones</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Admisiones</h6>
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
                     
                  </ul>
               </div>
            </div>
         </nav>
         <!-- End Navbar -->
         <div class="container py-5">
         <div class="row ">
            <div class="card">
               <div class="row mt-4">
                  <div class="col-md-12">
                  <div class="d-flex flex-row-reverse">
                     <a class="btn bg-gradient-primary btn-xs mx-2" type="button"  id="crear-atencion"> <i class="fas fa-database"> </i> Guardar   </a>
                  </div>
                  </div>
               </div>
               <br>  
               <div class="table-responsive" >
                  <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-atencion">
                     <thead>
                        <tr>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark">Opciones</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark">Paciente</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark">Estado</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12 ps-2 bg-dark">Doctor</th>
                           <th class="text-center text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark">Especialidad</th>
                           <th class="text-center text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark">Costo</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($atencion->result() as $atenciones){ ?>
                        <tr>
                           <td class="">
                              <div class="row">
                                 <a 
                                    class="icon icon-shape icon-sm me-2 bg-gradient-info shadow mx-3"
                                    href="<?php echo base_url(); ?>administracion/cambiarestado/<?php echo $atenciones->codigo_atencion; ?>"
                                    title="pasar a triaje"  
                                    >
                                 <i class="fas fa-check text-white opacity-10"></i>
                                 </a>
                                 <a 
                                    class="icon icon-shape icon-sm bg-gradient-danger shadow text-center"
                                    href="<?php echo base_url() ?>administracion/cargarfactura/<?php echo $atenciones->codigo_atencion; ?>"
                                    target="_blank"
                                    title="Generar tiquet"
                                    >
                                 <i class="fas fa-file-pdf text-white opacity-10"></i>
                                 </a>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex px-2 py-1">
                                 <div>
                                    <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" class="avatar avatar-sm me-3">
                                 </div>
                                 <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?php echo $atenciones->apellido." ".$atenciones->paciente; ?></h6>
                                    <p class="text-xs text-dark mb-0"><?php echo $atenciones->documento; ?></p>
                                 </div>
                              </div>
                           </td>
                           <td class="text-xs text-success mb-0"><?php echo $atenciones->estado; ?></td>
                           <td>
                              <p class="text-xs text-dark mb-0"><?php echo $atenciones->nombre; ?></p>
                           </td>
                           <td class="align-middle  text-sm">
                              <?php echo $atenciones->descripcion; ?>
                           </td>
                           <td class="align-middle text-center">
                              <span class="text-dark text-xs font-weight-bold"><?php echo $atenciones->costo; ?></span>
                           </td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>

               <div class="container-fluid mt-4">
                     <div class="messageError"></div>
                     <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <h6>Datos del paciente</h6>
                            <div class="col-md-4">
                              <div class="form-group input-group-sm">
                                  <label>DNI</label>
                                  <input type="number" class="form-control" id="dni" name="dni">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                  <label>No HC</label>
                                  <input type="text" class="form-control" id="hc" name="hc" readonly>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group input-group-sm">
                                  <label>¿Lista de espera?</label>
                                  <div class="form-group input-group-sm">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="atencion_espera" id="atencion_espera_1" value="Si" checked>
                                      <label class="form-check-label" for="inlineRadio1">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="atencion_espera" id="atencion_espera_2" value="No">
                                      <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group input-group-sm">
                                  <label>Nombre completo</label>
                                  <input type="text" class="form-control" id="nombre" name="nombre">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                  <label>Especialidad</label>
                                  <select class="form-control" id="especialidad" name="especialidad">
                                    <option value="">Seleccione la especialidad</option>
                                    <?php foreach($especialidad->result() as $especialidades){ ?>
                                    <option value="<?php echo $especialidades->codigo_especialidad; ?>"> <?php echo $especialidades->descripcion; ?> </option>
                                    <?php } ?> 
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                  <label>Doctor</label>
                                  <select class="form-control" id="doctor" name="doctor">
                                    <option value="">Seleccione el doctor</option>
                                    <?php foreach($doctor->result() as $doctores ){ ?>
                                    <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre.' '.$doctores->apellido; ?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          
                          <h6 class="mt-2">Datos de la factura</h6>
                          <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <label>Fecha</label>
                                        <input type="text" class="form-control" id="fecha" value="<?php echo date("d-m-Y"); ?>" readonly>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <label>No Factura</label>
                                        <input type="text" class="form-control" id="fecha" value="001" readonly>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group input-group-sm">
                                        <label>Costo</label>
                                        <input type="number" class="form-control" id="costo" value="0">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group input-group-sm">
                                        <label>Descuento</label>
                                        <input type="number" class="form-control" id="descuento" value="0">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group input-group-sm">
                                        <label>Comisión</label>
                                        <input type="number" class="form-control" id="comision" value="0">
                                    </div>
                                  </div>
                                
                                    <div class="col-md-4">
                                      <div class="form-group input-group-sm">
                                          <label>Cantidad recibida</label>
                                          <input type="number" class="form-control" id="cantidadr" value="0">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group input-group-sm">
                                          <label>Cantidad a devolver</label>
                                          <input type="number" class="form-control" id="cantidadv" readonly value="0">
                                      </div>
                                    </div>
                                    <div class="col-md-3">
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
                              <div class="col-md-6">
                                <h5 class="mt-2">TOTAL</h5>
                              </div>
                              <div class="col-md-6">
                                <input type="number" class="form-control" id="total" readonly>
                              </div>
                          </div>
                          <br>
                        </div>
                      </div>
                  </div>
            </div>
            <?php require_once("componentes/footer.php"); ?>
         </div>
      </main>
      <?php require_once("componentes/personalizar.php"); ?>
      <?php require_once("componentes/scripts.php"); ?>
      <script src="<?php echo base_url(); ?>public/js/scripts/atencion.js"></script>
   </body>
</html>