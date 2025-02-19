<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Morfologica</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">ecografia morfologica</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Morfologica</h6>
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
   <h5 class="text-uppercase">Ecografía Morfologica</h5>
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
        <div class="row">
                 <div class="col-md-3">
                    <label>Sexo</label>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="sexo" id="masculino" value="M">
                     <label class="form-check-label" for="inlineRadio1">Masculino</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="sexo" id="femenino" value="F">
                     <label class="form-check-label" for="inlineRadio2">Femenino</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="sexo" id="novisible" value="N">
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
                     <input class="form-check-input" type="radio" name="situacion" id="cefa" value="cefalico">
                     <label class="form-check-label" for="inlineRadio1">Cefalico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="situacion" id="poda" value="podolico">
                     <label class="form-check-label" for="inlineRadio2">Podalico</label>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="situacion" id="indi" value="indiferente">
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
                              <input type="number" id="lf" class="form-control form-control-sm">
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
                              <input type="number" id="lcf" class="form-control form-control-sm">
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
                  <button type="button" class="btn btn-danger">pdf</button>
                  <button type="button" class="btn btn-primary" onclick="createEcografiaMorfologica()">Guardar</button>
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
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiamorfologica.js"></script>
</body>
</html>