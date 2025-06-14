<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patologia</title>
    <link  rel="icon"  href="<?php echo base_url(); ?>public/img/theme/logo2.ico" type="image/ico" />
<link id="pagestyle" href="<?php echo base_url(); ?>public/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/css/overhang.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/fontawesome/css/fontawesome.css">
<link href="<?php echo base_url(); ?>public/fontawesome/css/brands.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/fontawesome/css/solid.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/datatable.css" rel="stylesheet">
</head>
<body>
<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://patologiadelcentro.com/wp-content/uploads/2019/08/cropped-labora.png'); background-position-y: 40%;">
    <span class="mask bg-default opacity-6"></span>
  </div>
  
  <div class="main-content position-relative max-height-vh-100 h-100">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Zona c</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Patologia</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Patologia</h6>
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
            <br>
            <div class="avatar avatar-xl position-relative text-success">
              <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h4 class="mt-3">Examenes de Patologia</h4>
            </div>
          </div>
        </div>
        <br>
        <div class="container">
          <div class="row">
            <?php foreach($patologia->result() as $patologias){ ?>
            <div class="col-md-3 mt-4">
              <a target="_blank" href="<?php echo base_url(); ?>public/patologia/<?php echo $patologias->url_documento; ?>">
              <i class="fas fa-file-pdf fa-3x text-danger"></i>
              <small> <?php echo $patologias->fecha; ?></small>
              <h6><?php echo $patologias->titulo; ?></h6>
                Ver pdf
              </a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <script>
    var baseurl = "<?php echo base_url();?>";
  </script>
  <script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/datatable.js"></script>
  <script src="<?php echo base_url(); ?>public/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/overhang.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/chartjs.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/argon-dashboard.min.js?v=2.0.2"></script>
  <script src="<?php echo base_url(); ?>public/js/argon-dashboard.min.js?v=2.0.2"></script>
</body>
</html>