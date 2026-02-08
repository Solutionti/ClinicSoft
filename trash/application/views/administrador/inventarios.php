<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administracion / kardex</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">kardex</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">kardex</h6>
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
         <h5>Consulta de kardex</h5>
       </div>
     </div>
     <br>  
     <div class="container">
       <div class="row">
         <div class="col-md-4">
           <form action="<?php echo base_url(); ?>administracion/pdfkardex" method="POST">
           <div class="form-group">
              <label>Producto</label>
              <select id="producto_kardex" name="producto_kardex" class="form-control-sm form-control">
                <option value="">Seleccionar</option>
                <?php foreach($producto->result() as $productos) { ?>
                  <option value="<?php echo $productos->codigo_producto; ?>"><?php echo $productos->nombre; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Fecha inicial</label>
              <input type="date" id="fecha_inicial" name="fecha_inicial"  class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Fecha final</label>
              <input type="date" id="fecha_final" name="fecha_final" class="form-control">
            </div>
          </div>
        </div>
        <input type="submit" class="btn btn-danger btn-sm" value="Exportar pdf" id="pdf-kardex" hidden> 
        </form>
        <button class="btn btn-primary btn-sm" id="buscar_kardex"> <i class="fas fa-search"></i> Buscar</button>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-stripped table hover">
             <thead>
               <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">#</th>
               <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Fecha transacción</th>
               <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Tipo</th>
               <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Motivo</th>
               <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Entrada</th>
               <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Salida</th>
               <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Saldo</th>
             </thead>
             <tbody id="table-kardex">

             </tbody>
          </table>
        </div>
      </div>
 
   </div>
   </div>
     <?php require_once("componentes/footer.php"); ?>
    </div>
  </main>
  <?php require_once("componentes/personalizar.php"); ?>

  <?php require_once("componentes/scripts.php"); ?>
  <script src="<?php echo base_url(); ?>public/js/scripts/inventarios.js"></script>
  
</body>
</html>


