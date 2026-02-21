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
    body {
      background-color: #fbf8ff;
      background-image: url('public/img/theme/fondoagua.png');
    }
  </style>
</head>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  * -->
<!-- * * * * * * * * * * * JERSON GALVEZ ENSUNCHO * * * * * * * * * * * -->
<!-- ******* * * * * * * * PROYECTO CLINICSOFT * * * * * * * * * * * * * -->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<main class="main-content  mt-0">
  <div class="container-fluid">
  <div
    class="position-fixed"
    style="z-index:50;"
  >
    <a class="btn btn-dark btn-sm text-white " target="blank" href="https://wa.me/+51965291084">
      <i class="fab fa-whatsapp"></i> 
      Soporte y ventas
    </a>
  </div>
 </div>
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
    <h6 class="mt-1 text-white font-weight-bolder position-relative">Bienvenido a</h6>
    <h3 class="text-white font-weight-bolder position-relative">ClinicSoft</span> </h3>
      <p class=" font-weight-bold text-white position-relative">
        Bienvenido a la plataforma de gestión clínica diseñada para llevar su institución al siguiente nivel, 
        facilitando el control de inventarios, la administración de servicios y la organización eficiente
        de su centro de salud.
      </p>
    </div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
    <div class="card card-plain">
    <div class="card-header pb-0 text-start">
      <div class="text-center">
        <!-- <img src="<?php echo base_url(); ?>public/img/theme/logo2.png" class="img-fluid mb-3" width="50px;"> -->
      </div>
      <div class="text-center">
        <span class="mx-3 font-weight-bold h6"> <span class="text-primary h4 text-bold">Clinic</span><span class="text-default h3 text-bold">Soft</span><small class="text-danger text-bold">Peru</small></span>
        <div class="stats">
          <small class="">Software Para Clinicas y laboratorios</small>
        </div>
      </div>
      <h5 class="font-weight-bolder  mt-4">Iniciar sesión</h5>

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
      <br>
      <br>
    </form>
    <p class="mb-4 text-sm mx-auto">
      ¿Aun no tienes tu sistema medico ?
      <a
        target="_blank"
        href="https://wa.me/+51965291084"
        class="text-primary text-gradient font-weight-bold"
      >
        Contactanos
      </a>
    </p>
    </div>
    
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
    
    </div>
  </div>
 </div>
</div>
</div>
</div>
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
</section>
</footer>
</main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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