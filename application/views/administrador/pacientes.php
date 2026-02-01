<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administracion / Inicio</title>
  <?php require_once ('componentes/head.php'); ?>
</head>
<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-default position-absolute w-100"></div>
  <?php require ('componentes/menu.php'); ?>
  <main class="main-content position-relative border-radius-lg">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                     <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">administración</a></li>
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pacientes</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Pacientes</h6>
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
                                       <img src="<?php echo base_url(); ?>img/team-2.jpg" class="avatar avatar-sm  me-3 ">
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
                                       <img src="<?php echo base_url(); ?>public/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
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
    <div class="row ">
      <div class="card">
        <div class="container-fluid mt-3">
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex flex-row-reverse">
                <?php if ($this->session->userdata('rol') != 'Doctor') { ?>
                <a
                  class="btn btn-danger text-white btn-xs mx-2"
                  hidden
                  id="btnactualizar"
                >
                  <i class="fas fa-pen text-white"></i> Actualizar
                </a>
                <button
                  type="button"
                  class="btn btn-primary text-white btn-xs mx-1"
                  id="crearpaciente"
                >
                  <i class="fas fa-database text-white"></i> Crear
                </button>
                <?php } ?>
              </div>
            </div>
          </div>
          <form >
          <div class="row">
              <div class="col-md-3">
                <label>Tipo de Documento</label>
                <select
                  class="form-control form-control-sm"
                >
                  <option value="DNI">DNI</option>
                </select>
              </div>
              <div class="col-md-5">
                <label>Buscar por apellidos </label>
                <input
                  type="text"
                  class="form-control form-control-sm input-buscar"
                  id="apellido_buscar"
                  value="%0%"
                >
              </div>
              <div class="col-md-4">
                <label>Buscar por DNI *</label>
                <div class="input-group">
                  <input
                    type="number"
                    class="form-control form-control-sm input-buscar"
                    id="dni_buscar"
                  >
                  <!-- <button
                    class="btn btn-primary btn-sm"
                    type="button"
                  >
                    <i class="fas fa-fingerprint"></i>
                  </button> -->
                </div>
              </div>
            </div>
          </form>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table_buscar">
                  <thead>
                    <tr class="text-xs text-white bg-default">
                      <th ></th>
                      <th pSortableColumn="docuemento" class="text-xs text-white bg-default" style="width:27%">PACIENTE</th>
                      <th class="text-xs text-white bg-default">TELEFONO</th>
                      <th class="text-xs text-white bg-default">FECHA NACIMIENTO</th>
                      <th class="text-xs text-white bg-default">SEXO</th>
                      <th class="text-xs text-white bg-default">ESTADO CIVIL</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php if ($this->session->userdata('rol') != 'Doctor') { ?>
          <div class="row mt-2">
            <h6>Datos de los Pacientes</h6>
          </div>
          <form [formGroup]="crearPacienteForm">
          <div class="row">
            <div class="col-md-2">
              <label>DNI *</label>
              <div class="input-group">
              <input
                type="number"
                class="form-control form-control-sm"
                id="dni"
              >
              <!-- <button class="btn btn-primary btn-xs" type="button">
                <i class="fas fa-fingerprint"></i>
              </button> -->
              
            </div>
            </div>
            <div class="col-md-4">
              <label>Apellidos *</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="apellido"
              >
              
            </div>
            <div class="col-md-4">
              <label>Nombres *</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="nombre"
              >
            </div>
            <div class="col-md-2">
              <label>HC *</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="hc"
                readonly
              >
              <div
                class="error"
                *ngIf="hcControl.invalid && (hcControl.touched || hcControl.dirty)"
              >
              </div>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col-md-3">
              <label>Celular </label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="celular"
              >
            </div>
            <div class="col-md-2">
              <label>Sexo *</label>
              <select
                class="form-control form-control-sm text-uppercase"
                id="sexo"
              >
                <option value="">Seleccione el sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="O">Otro</option>
              </select>
              <div
                class="error"
                *ngIf="sexoControl.invalid && (sexoControl.touched || sexoControl.dirty)"
              >
              </div>
            </div>
            <div class="col-md-2">
              <label>Fecha de Nacimiento *</label>
              <input
                type="date"
                class="form-control form-control-sm"
                id="fecha_nacimiento"
              >
              <div
                class="error"
                *ngIf="nacimientoControl.invalid && (nacimientoControl.touched || nacimientoControl.dirty)"
              >
              </div>
            </div>
            <div class="col-md-1">
              <label>Edad</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="edad"
              >
            </div>
            <div class="col-md-4">
              <label>Direcciòn *</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="direccion"
              >
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <label>Departamento *</label>
              <select
                class="form-control form-control-sm text-uppercase"
                id="departamento"
              >
                <option value="">Seleccione el departamento</option>
                <?php foreach ($departamento->result() as $departamentos) { ?>
                    <option value="<?php echo $departamentos->id; ?>"><?php echo $departamentos->name; ?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="col-md-4">
              <label>Provincia *</label>
              <select
                class="form-control form-control-sm text-uppercase"
                id="provincia"
              >
                <option value="">Seleccione la provincia</option>
                <?php foreach ($provincia->result() as $provincias) { ?>
                  <option value="<?php echo $provincias->id; ?>"><?php echo $provincias->name; ?></option>
                <?php } ?>
              </select>
              
            </div>
            <div class="col-md-4">
              <label>Distrito *</label>
              <select
                class="form-control form-control-sm text-uppercase"
                id="distrito"
              >
                <option value="">Seleccione el distrito</option>
                <?php foreach ($distrito->result() as $distritos) { ?>
                  <option value="<?php echo $distritos->id; ?>"><?php echo $distritos->name; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <label>Ocupaciòn</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="ocupacion"
              >
            </div>
            <div class="col-md-4">
              <label>Grado Academico *</label>
              <select
                class="form-control form-control-sm text-uppercase"
                id="grado_academico"
              >
                <option value="">Seleccione el grado academico</option>
                <option value="Kinder">Kinder</option>
                <option value="Preescolar">Pre Escolar</option>
                <option value="analfabeto">Analfabeto</option>
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Superior">Superior</option>
              </select>
            </div>
            <div class="col-md-4">
              <label>Estado Civil *</label>
              <select
                class="form-control form-control-sm text-uppercase"
                id="estado_civil"
              >
                <option value="">Seleccione estado civil</option>
                <option value="Soltero">Soltero(a)</option>
                <option value="Casado">Casado(a)</option>
                <option value="Viudo">Viudo(a)</option>
                <option value="Conviviente">Conviviente(a)</option>
                <option value="Divorciado">Divorciado(a)</option>
                <option value="Otro">Otro(a)</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <h6>¿Es menor de edad ?</h6>
              <div class="form-check form-switch">
                <input
                  class="form-check-input"
                  type="checkbox"
                  role="switch"
                  id="flexSwitchCheckChecked"
                  
                >
                <label class="form-check-label" for="flexSwitchCheckChecked">Si</label>
              </div>
            </div>
            <div class="row mt-1" [hidden]="containerResponsable">
              <div class="col-md-3">
                <label>Documento</label>
                <input
                  type="text"
                  class="form-control form-control-sm"
                  id="documento"
                >
              </div>
              <div class="col-md-4">
                <label>Nombre Responsable</label>
                <input
                  type="text"
                  class="form-control form-control-sm"
                  id="fresponsable"
                  
                >
              </div>
              <div class="col-md-2">
                <label>Telefono</label>
                <input
                  type="text"
                  class="form-control form-control-sm"
                  
                >
              </div>
              <div class="col-md-3">
                <label>Parentesco</label>
                <select
                  class="form-control form-control-sm"
                  id="parentesco"
                  name="parentesco"
                  >
                  <option value="">Seleccione una opción</option>
                  <option value="Padre">Padre</option>
                  <option value="Madre">Madre</option>
                  <option value="Hijo">Hijo</option>
                  <option value="Hija">Hija</option>
                  <option value="Hermano">Hermano</option>
                  <option value="Hermana">Hermana</option>
                  <option value="Abuelo">Abuelo</option>
                  <option value="Abuela">Abuela</option>
                  <option value="Tío">Tío</option>
                  <option value="Tía">Tía</option>
                  <option value="Primo">Primo</option>
                  <option value="Prima">Prima</option>
                  <option value="Esposo">Esposo</option>
                  <option value="Esposa">Esposa</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>
          </div>
          <br>
        </form>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php require_once ('componentes/personalizar.php'); ?>
  <?php require_once ('componentes/scripts.php'); ?>
  <script src="<?php echo base_url(); ?>public/js/scripts/pacientes_v2.js"></script>
  
  <script>
    var departamento = <?php echo json_encode($departamento->result()); ?>;
    var provincia = <?php echo json_encode($provincia->result()); ?>;
    var distrito = <?php echo json_encode($distrito->result()); ?>;
  </script>

</body>

</html>
