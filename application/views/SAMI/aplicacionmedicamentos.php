<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion de medicamentos</title>
    <?php require_once("componentes/head.php"); ?>
</head>
<body>
<div class="position-absolute w-100 min-height-200 top-0" style="background-image: url('https://www.lubrizol.com/-/media/Lubrizol/Health/Images/LH/OSD2---LH.jpg?h=329&w=1170&la=en&hash=5D6B3832C761C0ACAE4DB4D0028DF3D1'); background-position-y: 30%; background-repeat: no-repeat; background-size: cover;">
    <span class="mask bg-default opacity-6"></span>
  </div>
<div class="main-content position-relative">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">SAMI</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Camas</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Camas</h6>
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
            <div class="avatar avatar-xl position-relative text-primary mx-4">
              <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mt-3">Camas de la clinica</h5>
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Crear Camas</button>
            </div>
          </div>
        </div>
        <br>
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-md-2">
              <div class="card  mb-3" >
                <div class="card-body">
                  <h5 class="card-title text-primary"> Cama #0102 <i class="fas fa-bed"></i></h5>
                  <p class="card-text">
                    1110542802
                    <br>
                    Jerson  Galvez Ensuncho
                    <br>
                    Consecutivo: 0012
                  </p>
                  <a href="#" class="btn btn-danger btn-sm">Acostar paciente</a>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-md-2">
              <div class="card  mb-3" >
                <div class="card-body">
                  <h5 class="card-title text-primary"> Cama #0102 <i class="fas fa-bed"></i></h5>
                  <p class="card-text">
                    1110542802
                    <br>
                    Jerson  Galvez Ensuncho
                    <br>
                    Consecutivo: 0012
                  </p>
                  <a href="#" class="btn btn-danger btn-sm">Acostar paciente</a>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-md-2">
              <div class="card  mb-3" >
                <div class="card-body">
                  <h5 class="card-title text-primary"> Cama #0102 <i class="fas fa-bed"></i></h5>
                  <p class="card-text">
                    1110542802
                    <br>
                    Jerson  Galvez Ensuncho
                    <br>
                    Consecutivo: 0012
                  </p>
                  <a href="#" class="btn btn-danger btn-sm">Acostar paciente</a>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-md-2">
              <div class="card  mb-3">
                <div class="card-body">
                  <h5 class="card-title text-primary"> Cama #0102 <i class="fas fa-bed"></i></h5>
                  <p class="card-text">
                    1110542802
                    <br>
                    Jerson  Galvez Ensuncho
                    <br>
                    Consecutivo: 0012
                  </p>
                  <a href="#" class="btn btn-danger btn-sm">Acostar paciente</a>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-md-2">
              <div class="card  mb-3">
                <div class="card-body">
                  <h5 class="card-title text-primary"> Cama #0102 <i class="fas fa-bed"></i></h5>
                  <p class="card-text">
                    1110542802
                    <br>
                    Jerson  Galvez Ensuncho
                    <br>
                    Consecutivo: 0012
                  </p>
                  <a href="#" class="btn btn-danger btn-sm">Acostar paciente</a>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-md-2">
              <div class="card  mb-3">
                <div class="card-body">
                  <h5 class="card-title text-primary"> Cama #0102 <i class="fas fa-bed"></i></h5>
                  <p class="card-text">
                    1110542802
                    <br>
                    Jerson  Galvez Ensuncho
                    <br>
                    Consecutivo: 0012
                  </p>
                  <a href="#" class="btn btn-danger btn-sm">Acostar paciente</a>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-md-2">
              <div class="card  mb-3">
                <div class="card-body">
                  <h5 class="card-title text-primary"> Cama #0102 <i class="fas fa-bed"></i></h5>
                  <p class="card-text">
                    1110542802
                    <br>
                    Jerson  Galvez Ensuncho
                    <br>
                    Consecutivo: 0012
                  </p>
                  <a href="#" class="btn btn-danger btn-sm">Acostar paciente</a>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-md-2">
              <div class="card  mb-3">
                <div class="card-body">
                  <h5 class="card-title text-primary"> Cama #0102 <i class="fas fa-bed"></i></h5>
                  <p class="card-text">
                    1110542802
                    <br>
                    Jerson  Galvez Ensuncho
                    <br>
                    Consecutivo: 0012
                  </p>
                  <a href="#" class="btn btn-danger btn-sm">Acostar paciente</a>
                </div>
              </div>
            </div>
            <!--  -->
          </div>
      </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">CREAR CAMAS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
  <?php require_once("componentes/scripts.php"); ?>
  <script src="<?php echo base_url(); ?>public/js/scripts/pqrs.js"></script>
</body>
</html>