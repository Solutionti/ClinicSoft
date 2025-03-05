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

  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  * -->
<!-- * * * * * * * * * * * JERSON GALVEZ ENSUNCHO * * * * * * * * * * * -->
<!-- ******* * * * * * * * PROYECTO CLINICSOFT * * * * * * * * * * * * * -->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<div  [hidden]="spinner" class="overlay z-index">
  <div class="dot-wave">
    <div class="dot-wave__dot"></div>
    <div class="dot-wave__dot"></div>
    <div class="dot-wave__dot"></div>
    <div class="dot-wave__dot"></div>
  </div>
</div>
<p-toast position="top-right"/>
<main class="main-content  mt-0">
    <section>
    <div class="page-header min-vh-100">
    <div class="container">
    <div class="row">
      <div class="col-6 d-lg-flex d-none h-100  position-absolute top-0 end-0 text-center justify-content-center flex-column">
    <div
      class="position-relative bg-gradient-danger h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
      style="background-image: url('https://www.policlinicorisso.com/assets/uploads/especialidades/1665593423_6ef6619f6c1b9a1c11e1.jpg'); background-size: cover;"
    >
    <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
    <div class="card card-plain">
    <div class="card-header pb-0 text-start">
      <div class="text-center">
        <img src="<?php echo base_url(); ?>public/img/theme/logo2.png" class="img-fluid mb-3" width="80px;">
      </div>
      <div class="text-center">
        <span class="mx-3 font-weight-bold"> <span class="text-black h6 text-bold">ClinicSoft</span><small class="text-danger text-bold">peru</small></span>
      </div>
      <h4 class="font-weight-bolder text-center mt-4">Iniciar sesión</h4>
    </div>
    
    <div class="card-body">
    <div class="messageError"></div>
    <form role="form" method="post" validate id="FormLOG">
      <div class="mb-3">
        <input type="text" required class="form-control" id="correo" value=""  placeholder="Usuario">
      </div>
      <div class="mb-3">
      <div class="input-group">
        <input
          type="password"
          id="password"
          value=""
          class="form-control"
          required placeholder="Contraseña"
        >
        <a
          class="input-group-append input-group-text"
          (click)="verContrasena()"
          [hidden]="verhidden"
        >
          <i id="changePassIcon" class="fas fa-eye"></i>
        </a>
      </diV>
      </div>
      
      
      <div class="text-center">
        <button type="submit" class="btn bg-default text-white w-100 my-4 mb-2" id="login">Ingresar</button>
      </div>
      <p class="text-sm mt-3 mb-0">No tiene usuario y contraseña? <a href="javascript:;" class="text-dark font-weight-bolder">Solicitar</a></p>
    </form>
    </div>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
    <p class="mb-4 text-sm mx-auto">
      ¿No tienes una cuenta?
      <a
        href="javascript:;"
        class="text-primary text-gradient font-weight-bold"
      >
        Inscribete
      </a>
    </p>
    </div>
  </div>
 </div>
</div>
</div>
</div>
</section>
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
            Todos los derechos © <script>
              document.write(new Date().getFullYear())
            </script> gofuturedigitalsolution.com
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