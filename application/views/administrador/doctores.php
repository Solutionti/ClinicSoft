<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Administracion / Doctores</title>
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
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Doctores</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Doctores</h6>
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
                        <a class="btn bg-gradient-danger btn-xs" data-bs-toggle="modal" href="#AgregarDoctor" role="button">Agregar <i class="fas fa-plus"></i> </a>
                     </div>
                  </div>
                  <br>  
                  <div class="table-responsive" >
                     <table class="table align-items-center mb-0 text-uppercase" id="table-colposcopia">
                        <thead>
                           <tr>
                              <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Opciones</th>
                              <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">CMP</th>
                              <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Nombre</th>
                              <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Correo</th>
                              <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Telefono</th>
                              <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Perfil</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($doctor->result() as $doctores){ ?>
                           <tr>
                              <td class="">
                                 <div class="row">
                                 <?php if($this->session->userdata("rol") != "Enfermera"){ ?>
                                    <a 
                                       class="icon icon-shape icon-sm me-2 bg-gradient-danger shadow mx-3"
                                       href="<?php echo base_url(); ?>administracion/eliminardoctor/<?php echo $doctores->codigo_doctor; ?>"  
                                       >
                                    <i class="fas fa-times text-white opacity-10"></i>
                                    </a>
                                    <?php } ?>
                                    <a 
                                       class="icon icon-shape icon-sm me-2 bg-gradient-info shadow mx-3"
                                       onclick="getModalDataDoctor(<?php echo $doctores->codigo_doctor; ?>)"  
                                       >
                                    <i class="fas fa-cog text-white opacity-10"></i>
                                    </a>
                                 </div>
                              </td>
                              <td class="text-xs text-dark mb-0"><?php echo $doctores->cpe; ?></td>
                              <td class="text-xs text-dark mb-0"><?php echo $doctores->nombre; ?></td>
                              <td class="text-xs text-dark mb-0"><?php echo $doctores->email; ?></td>
                              <td class="text-xs text-dark mb-0"><?php echo $doctores->telefono; ?></td>
                              <td class="text-xs text-dark mb-0"><?php echo $doctores->perfil; ?></td>
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
      
      <!--  -->
      <?php require_once("componentes/personalizar.php"); ?>
      <!-- VENTANAS MODALES -->
      <div class="modal fade" id="AgregarDoctor" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-fullscreen" role="document">
            <div class="modal-content">
              <div class="modal-header bg-default">
                  <h5 class="modal-title text-uppercase text-white" id="exampleModalLabel">Crear Doctor</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                          <img class="img-fluid rounded-circle" width="130px;" src="<?php echo base_url(); ?>public/img/theme/team-41.jpg">
                        </div>
                    </div>
                  </div>
                  <br>  
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group input-group-sm">
                          <label>Documento</label>
                          <input type="number" class="form-control" id="cpe">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group input-group-sm">
                          <label>Nombre completo</label>
                          <input type="text" class="form-control" id="nombre">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group input-group-sm">
                          <label>Perfil</label>
                          <input type="text" class="form-control" id="perfil">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                          <label>Telefono</label>
                          <input type="number" class="form-control" id="telefono">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                          <label>Direcciòn</label>
                          <input type="text" class="form-control" id="direccion">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                          <label>Correo electronico</label>
                          <input type="text" class="form-control" id="correo">
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <label for="">Foto del doctor</label>
                        <input type="file" class="custom-file-input" id="customFileLangHTML">
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="crear-doctor">Guardar</button>
              </div>
            </div>
        </div>
      </div>
      <!-- MODAL CONGIFURAR DOCTOR -->
      <div class="modal fade" id="Doctorparametrizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header bg-default">
                  <h5 class="modal-title text-uppercase text-white" id="exampleModalLabel">Configuraciòn Doctor</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="text-center">
                                <img class="img-fluid rounded-circle" width="100px;" src="<?php echo base_url(); ?>public/img/theme/team-41.jpg">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group input-group-sm">
                                <label> Documento CPE</label>
                                <input type="number" class="form-control" id="cpe1">
                              </div>
                          </div>
                          <div class="col-md-8">
                              <div class="form-group input-group-sm">
                                <label>Nombre completo</label>
                                <input type="text" class="form-control" id="nombre1">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group input-group-sm">
                                <label>Telefono</label>
                                <input type="number" class="form-control" id="telefono1">
                              </div>
                          </div>
                          <div class="col-md-8">
                              <div class="form-group input-group-sm">
                                <label>Direcciòn</label>
                                <input type="text" class="form-control" id="direccion1">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                <label>Correo electronico</label>
                                <input type="text" class="form-control" id="correo1">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                <label>Perfil</label>
                                <input type="text" class="form-control" id="perfil1">
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                          <label>Dias laborables</label>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-5 hovdia" >
                                <div class="form-check" style="padding-left: 0px !important">
                                  <label class="hovdia_v2" for="todas" ><input class="" name="todas"  type="checkbox" id="todas"> - Todos los dias</label>    

                                    <!--label for="todas" style="margin: 0px;"> Todos los dias</label>
                                      <input class="form-check-input" type="checkbox" id="todas"  -->
                                  </div>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control Horas_data" placeholder="Ejm: Minutos;Horario1;Horario2" disabled id="Horas_todas" name="Horas_todas"   onfocus="focused(this)" onfocusout="defocused(this)" style="padding: 2px;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-5 hovdia" >
                                <div class="form-check" style="padding-left: 0px !important">
                                  <label class="hovdia_v2" for="lunes" ><input class="" name="dias" onchange="Checks_Change('lunes')" type="checkbox" id="lunes"> - Lunes</label>    
                                </div>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control Horas_data" placeholder="15;8:30-13:00" readonly id="Horas_lunes" name="Horas_lunes" style="padding: 2px;" >
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-5 hovdia" >
                                <div class="form-check" style="padding-left: 0px !important">
                                  <label class="hovdia_v2" for="martes" ><input class="" name="dias" onchange="Checks_Change('martes')" type="checkbox" id="martes"> - Martes</label>    
                                </div>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control Horas_data" placeholder="15;8:30-13:00" readonly id="Horas_martes" name="Horas_martes" style="padding: 2px;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-5 hovdia" >
                                <div class="form-check" style="padding-left: 0px !important">
                                  <label class="hovdia_v2" for="miercoles" ><input class="" name="dias" onchange="Checks_Change('miercoles')" type="checkbox" id="miercoles"> - Miercoles</label>    
                                </div>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control Horas_data" placeholder="15;8:30-13:00;15-19:30" readonly id="Horas_miercoles" name="Horas_miercoles" style="padding: 2px;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-5 hovdia" >
                                <div class="form-check" style="padding-left: 0px !important">
                                  <label class="hovdia_v2" for="jueves" ><input class="" name="dias" onchange="Checks_Change('jueves')" type="checkbox" id="jueves"> - Jueves</label>    
                                </div>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control Horas_data" placeholder="15;8:30-13:00;15-19:30" readonly id="Horas_jueves" name="Horas_jueves" style="padding: 2px;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-5 hovdia" >
                                <div class="form-check" style="padding-left: 0px !important">
                                  <label class="hovdia_v2" for="viernes" ><input class="" name="dias" onchange="Checks_Change('viernes')" type="checkbox" id="viernes"> - Viernes</label>    
                                </div>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control Horas_data" placeholder="15;8:30-13:00;15-19:30" readonly id="Horas_viernes" name="Horas_viernes" style="padding: 2px;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-5 hovdia" >
                                <div class="form-check" style="padding-left: 0px !important">
                                  <label class="hovdia_v2" for="sabado" ><input class="" name="dias" onchange="Checks_Change('sabado')" type="checkbox" id="sabado"> - Sabado</label>    
                                </div>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control Horas_data" placeholder="15;8:30-13:00;15-19:30" readonly id="Horas_sabado" name="Horas_sabado" style="padding: 2px;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-5 hovdia" >
                                <div class="form-check" style="padding-left: 0px !important">
                                  <label class="hovdia_v2" for="domingo" ><input class="" name="dias" onchange="Checks_Change('domingo')" type="checkbox" id="domingo"> - Domingo</label>    
                                </div>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control Horas_data" placeholder="15;8:30-13:00;15-19:30" readonly id="Horas_domingo" name="Horas_domingo" style="padding: 2px;">
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="actualizardoctor">Actualizar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      <?php require_once("componentes/scripts.php"); ?>
      <style>
        .hovdia{
          background: #efefef;
          padding: 1px 9px;
          border-radius: 9px;
        }
        .hovdia:hover{
          background: #bfbfbf;
        }

        
        .hovdia_v2{
          background: #efefef !important;
          margin: 0px;background: #efefef;width: 100%;padding: 5px 5px 5px 10px;border-radius: 7px;text-align: left;
        }
        .hovdia_v2:hover{
          cursor: pointer;
          background: #bfbfbf !important;
        }
      </style>
      <script src="<?php echo base_url(); ?>public/js/scripts/doctores.js"></script>
   </body>
</html>