<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Arterial</title>
    <?php require_once("componentes/head.php"); ?>
</head>
<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-default position-absolute w-100"></div> 
  <?php require("componentes/menu.php"); ?>
  <main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">administración</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia Arterial</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Arterial</h6>
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
    <div class="container py-5">
      <div class="row ">
      <div class="card">
     <div class="row mt-4">
       <div class="col-md-12">
         <!-- aca va el contenido del formulario  -->
         <div class="container mt-4">
   <h5 class="text-uppercase">Ecografía Arterial</h5>
   <hr>

   <div class="row mt-1">
      <div class="col-md-6">
         <div class="form-group">
            <label>Doctor tratante</label>
            <input
               type="text"
               class="form-control form-control-sm"
               value="<?php echo $this->session->userdata('apellido'). ' ' . $this->session->userdata('nombre'); ?>"
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
               value="<?php echo date('d-m-Y'); ?>"
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
               value="<?php echo date('h:i A'); ?>"
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
              <input type="text" class="form-control" id="dni" style="height: 32px;padding: 0px;" minlength="7" maxlength="11" required>
           <div class="input-group-append">
          <button type="button" style="padding: 5px;" class="btn btn-primary" id="lupa_DNI" onclick="buscarPaciente()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
    
    <div class="col-md-3">
        <label class="form-label">Nombre</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="nombre"
            readonly
        >
    </div>

    <div class="col-md-3">
        <label class="form-label">Apellidos</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="apellidos"
            readonly
        >
    </div>

    <div class="col-md-1">
        <label class="form-label">Edad</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="edad"
            readonly
        >
    </div>

    <div class="col-md-2">
        <label class="form-label">HC</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="hc"
            readonly
        >
        </div>
        </div>
        <div class="row mb-3">
                <div class="col-md-12">
                    <label for="motivo" class="form-label">Motivo del Examen:</label>
                    <input type="text" class="form-control form-control-sm" id="motivo" formControlName="motivo">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <h6>MIEMBRO INFERIOR <span style="color: green;">DERECHO</span>:</h6>
                    <textarea class="form-control" id="descripcionProcedimiento" rows="3">PLACAS ATEROMATOSAS EN TIBIAL ANTERIOR DISTAL Y PEDIA.</textarea>
                </div>
            </div>

                <form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Arteria</th>
                                <th>VPS</th>
                                <th>ONDA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>F. Común</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_fc" value="65"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_fc" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>F. Superficial</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_fs" value="60"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_fs" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>Poplitea</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_poplitea" value="45"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_poplitea" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>Tibial Posterior</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_tp" value="40"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_tp" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>Tibial Anterior</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_ta" value="40-42"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_ta" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>Media</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_media" value="38"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_media" value="Bifásica"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h6>MIEMBRO INFERIOR <span style="color: rgb(128, 15, 0);">IZQUIERDA</span>:</h6>
                        <textarea class="form-control form-control-sm" id="descripcionProcedimientoIzquierdo" rows="3">PLACAS ATEROMATOSA A PREDOMINIO DE PIERNA.</textarea>
                    </div>
                </div>
    
                    <form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Arteria</th>
                                    <th>VPS</th>
                                    <th>ONDA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>F. Común</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_fc" value="60"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_fc" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>F. Superficial</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_fs" value="50"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_fs" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>Poplitea</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_poplitea" value="35"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_poplitea" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>Tibial Posterior</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_tp" value="35"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_tp" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>Tibial Anterior</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_ta" value="38"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_ta" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>Media</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_media" value="35"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_media" value="Bifásica"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
            
            <div class="form-group">
                <label for="conclusiones">Conclusiones:</label>
                <textarea class="form-control form-control-sm" id="conclusiones" rows="2" placeholder="Ingrese conclusiones"></textarea>
            </div>
            <div class="form-group">
                <label for="sugerencias">Sugerencias:</label>
                <textarea class="form-control form-control-sm" id="sugerencias" rows="2" placeholder="Ingrese sugerencias"></textarea>
            </div>
              <div class="row mt-1">
                <div class="col-md-3">
                <button type="button" class="btn btn-primary" onclick="createEcografiaArterial()">Guardar</button>
                </div>
              </div>
            </form>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
       </div>
     </div>
     <br>  
   </div>
   </div>
    </div>
  </main>

  <?php require_once("componentes/scripts.php"); ?>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/global.js"></script>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiaarterial.js"></script>
</body>
</html>