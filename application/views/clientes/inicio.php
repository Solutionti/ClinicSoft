<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paciente</title>
    <link rel="icon" href="<?php echo base_url(); ?>public/img/theme/logo2.ico" type="image/ico" /> 
    <link id="pagestyle" href="<?php echo base_url(); ?>public/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/fontawesome/css/fontawesome.css">
	<link href="<?php echo base_url(); ?>public/fontawesome/css/brands.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/fontawesome/css/solid.css" rel="stylesheet">
</head>
<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://www.esaote.com/uploads/pics/cso_14.jpg'); background-position-y: 50%; background-repeat: no-repeat; background-size: 100%">
    <span class="mask bg-default opacity-6"></span>
  </div>

  <div class="main-content position-relative">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Zona c</a></li>
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
              <a href="<?php echo base_url(); ?>cerrarsesionclientes" class="nav-link text-white font-weight-bold px-0">
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
          </ul>
        </div>
      </div>
    </nav>
    <div class="card shadow-lg mx-4 mt-5">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?php echo $this->session->userdata("nombre")." ".$this->session->userdata("apellido"); ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Paciente Salud madre mujer
              </p>
            </div>
          </div>
          <div class="col-lg-5 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a target="_blank" class="nav-link mb-0 px-0 py-1  d-flex align-items-center justify-content-center disabled"  href="#" >
                    <i class="ni ni-app"></i>
                    <span class="ms-2 mx-1">Historia Clinica </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a target="_blank" class="nav-link mb-0 px-0 py-1  d-flex align-items-center justify-content-center disabled"  href="#" >
                    <i class="ni ni-app"></i>
                    <span class="ms-2 mx-1">Medicamentos </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a target="_blank" class="nav-link mb-0 px-0 py-1  d-flex align-items-center justify-content-center "  href="<?php echo base_url(); ?>clientes/laboratorio" >
                    <i class="ni ni-app"></i>
                    <span class="ms-2">Laboratorio</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a target="_blank" class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "  href="<?php echo base_url(); ?>clientes/patologia">
                    <i class="ni ni-email-83"></i>
                    <span class="ms-2">Patologia</span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a target="_blank" class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "  href="<?php echo base_url(); ?>clientes/ecografias">
                    <i class="ni ni-settings-gear-65"></i>
                    <span class="ms-2 mx-1">Ecografias </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
      <div class="col-md-3">
          <div class="card card-profile">
            <img src="<?php echo base_url(); ?>public/img/theme/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" class="rounded-circle img-fluid border border-2 border-white">
                    <i class="fas fa-circle text-success mx-1"> </i> En linea
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">0</span>
                      <span class="text-sm opacity-8">Laboratorio</span>
                    </div>
                    <div class="d-grid text-center mx-4">
                      <span class="text-lg font-weight-bolder">0</span>
                      <span class="text-sm opacity-8">Patologia</span>
                    </div>
                    <div class="d-grid text-center ">
                      <span class="text-lg font-weight-bolder">0</span>
                      <span class="text-sm opacity-8">Ecografias</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                <h5>
                  <?php echo $this->session->userdata("nombre"); ?><span class="font-weight-light"> <?php echo $this->session->userdata("apellido"); ?></span>
                </h5>
                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i>ultima sesion
                  <small><?php echo date("d-m-Y"); ?></small>
                </div>
                <div class="h6 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $this->session->userdata("direccion"); ?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo $this->session->userdata("ocupacion"); ?>
                </div>
              </div>
              <br>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Editar Perfil</p>
                <button class="btn btn-primary btn-sm ms-auto">Guardar</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Información del usuario</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Usuario</label>
                    <input class="form-control" type="text" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Correo electronico</label>
                    <input class="form-control" type="email" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Apellidos</label>
                    <input class="form-control" type="text" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nombres</label>
                    <input class="form-control" type="text" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Fecha de nacimiento</label>
                    <input class="form-control" type="date" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Telefono</label>
                    <input class="form-control" type="text" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Dirección</label>
                    <input class="form-control" type="text" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Estado</label>
                    <input class="form-control" type="text" value="Activo">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
            </div>
          </div>
        </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>public/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/chartjs.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/argon-dashboard.min.js?v=2.0.2"></script>
</body>
</html>