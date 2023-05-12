<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link  rel="icon"  href="<?php echo base_url(); ?>public/img/theme/logo2.ico" type="image/ico" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font-awesome.min.css">
    <link id="pagestyle" href="<?php echo base_url(); ?>public/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
	  <link href="<?php echo base_url(); ?>public/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/fontawesome/css/brands.css" rel="stylesheet">
  	<link href="<?php echo base_url(); ?>public/fontawesome/css/solid.css" rel="stylesheet">
  <style>
    .color-rosa {
      background-color: #CF1B77 !important;
    }
    .color-cyan { 
      background-color: #219B9F !important;
    }
    .cyan-text {
      color: #219B9F !important;
    }
    .rosa-text {
      color: #CF1B77 !important;
    }
  </style>
</head>

  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://cdn.pixabay.com/photo/2021/10/11/17/37/doctor-6701410_960_720.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
              <img src="<?php echo base_url(); ?>public/img/theme/logoblanco.png" width="80px;" class="img-fluid">
            <h1 class="text-white mb-2 mt-2">Bienvenido</h1>
            <p class="font-weight-bold text-white">Ingrese su usuario o contraseña para entrar a la administración.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n11 mt-md-n11 mt-n11 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="messageError"></div>
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5 class="text-uppercase">Iniciar Sesión</h5>
            </div>
            <div class="row px-xl-5 px-sm-4 px-3">
              <div class="position-relative text-center">
                <!-- <p class="text-sm font-weight-bold  text-secondary text-border d-inline z-index-2 bg-white px-1">
                  <span class="cyan-text lead font-weight-bold">Medical</span> <span class="rosa-text lead font-weight-bold">Clinic</span> 
                </p> -->
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post" validate id="FormLOG">
                <div class="mb-3">
                  <input type="text" required class="form-control" id="correo" value=""  placeholder="Usuario">
                </div>
                <div class="mb-3">
                  <input type="password" id="password" value="" class="form-control" required placeholder="Contraseña">
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn color-cyan text-white w-100 my-4 mb-2" id="login">Ingresar</button>
                </div>
                <p class="text-sm mt-3 mb-0">No tiene usuario y contraseña? <a href="javascript:;" class="text-dark font-weight-bolder">Solicitar</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center mb-1">
        </div> 
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> clinicaenfoquesalud.com
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/plugins/chartjs.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/argon-dashboard.min.js?v=2.0.2"></script>
  <script>
     var url1 = "<?php echo base_url(); ?>iniciarsesion";
     var baseurl = "<?php echo base_url();?>";
  </script>
  <script src="<?php echo base_url(); ?>public/js/scripts/login.js"></script>
</body>
</html>