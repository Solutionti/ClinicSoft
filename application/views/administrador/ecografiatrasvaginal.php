<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Trasvaginal</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia trasvaginal</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Trasvaginal</h6>
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
         <!-- aca va el contenido del formulario  -->
         <div class="container mt-4">
   <h5 class="text-uppercase">Ecografía Trasvaginal</h5>
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
       <div class="modal-body">
    
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
        <h6 class="text-primary font-weight-bold mb-0">1. Evaluación del Útero</h6>
        <button type="button" class="btn btn-success btn-sm" onclick="cargarTransvaginalNormal()">
            <i class="fas fa-magic"></i> Cargar Normal
        </button>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="small font-weight-bold">Posición</label>
            <select id="utero-tipo" class="form-control form-control-sm">
                <option value="Anteverso">Anteverso</option>
                <option value="Retroverso">Retroverso</option>
                <option value="Indiferente">Indiferente</option>
                <option value="Ausente">Ausente (Histerectomía)</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="small font-weight-bold">Superficie</label>
            <select id="superficie" class="form-control form-control-sm">
                <option value="Regular">Regular</option>
                <option value="Irregular/Miomatoso">Irregular (Miomatoso)</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="small font-weight-bold">Miometrio</label>
            <select id="miometrio" class="form-control form-control-sm">
                <option value="Homogéneo">Homogéneo</option>
                <option value="Heterogéneo">Heterogéneo</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="small font-weight-bold text-danger">Endometrio (mm)</label>
            <input type="number" id="endometrio_grosor" class="form-control form-control-sm" placeholder="mm">
        </div>
    </div>

    <div class="row mb-3 bg-light p-2 rounded">
        <div class="col-12"><label class="small font-weight-bold text-primary">Dimensiones Uterinas (L x AP x T)</label></div>
        <div class="col-md-3">
            <input type="number" id="ut_l" class="form-control form-control-sm" placeholder="Long (mm)">
        </div>
        <div class="col-md-3">
            <input type="number" id="ut_ap" class="form-control form-control-sm" placeholder="Antero-Post (mm)">
        </div>
        <div class="col-md-3">
            <input type="number" id="ut_t" class="form-control form-control-sm" placeholder="Trans (mm)">
        </div>
        <div class="col-md-3">
             <input type="text" id="ut_vol" class="form-control form-control-sm font-weight-bold" readonly placeholder="Volumen (cc)">
        </div>
        <div class="col-12 mt-2">
            <textarea id="comentarioUtero" class="form-control form-control-sm" rows="1" placeholder="Descripción adicional..."></textarea>
        </div>
    </div>

    <h6 class="text-warning font-weight-bold border-bottom pb-2 mt-4">2. Ovarios (Medidas y Volumen)</h6>
    
    <div class="row mb-2">
        <div class="col-md-12"><label class="small font-weight-bold text-secondary">OVARIO DERECHO</label></div>
        <div class="col-md-2">
            <input type="number" id="od_l" class="form-control form-control-sm" placeholder="L (mm)">
        </div>
        <div class="col-md-2">
            <input type="number" id="od_ap" class="form-control form-control-sm" placeholder="AP (mm)"> </div>
        <div class="col-md-2">
            <input type="number" id="od_t" class="form-control form-control-sm" placeholder="T (mm)">
        </div>
        <div class="col-md-2">
             <input type="text" id="od_vol" class="form-control form-control-sm bg-light" readonly placeholder="Vol. cc">
        </div>
        <div class="col-md-4">
            <textarea id="comentarioOvario-der" class="form-control form-control-sm" rows="1">Aspecto Normal</textarea>
        </div>
    </div>

    <div class="row mb-3 border-bottom pb-3">
        <div class="col-md-12"><label class="small font-weight-bold text-secondary">OVARIO IZQUIERDO</label></div>
        <div class="col-md-2">
            <input type="number" id="oi_l" class="form-control form-control-sm" placeholder="L (mm)">
        </div>
        <div class="col-md-2">
            <input type="number" id="oi_ap" class="form-control form-control-sm" placeholder="AP (mm)"> </div>
        <div class="col-md-2">
            <input type="number" id="oi_t" class="form-control form-control-sm" placeholder="T (mm)">
        </div>
        <div class="col-md-2">
             <input type="text" id="oi_vol" class="form-control form-control-sm bg-light" readonly placeholder="Vol. cc">
        </div>
        <div class="col-md-4">
            <textarea id="comentarioOvario-izq" class="form-control form-control-sm" rows="1">Aspecto Normal</textarea>
        </div>
    </div>

    <h6 class="text-info font-weight-bold border-bottom pb-2">3. Fondo de Saco y Anexos</h6>
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="small font-weight-bold">Fondo de Saco</label>
            <textarea id="fondosaco" class="form-control form-control-sm" rows="1">Libre</textarea>
        </div>
        <div class="col-md-6">
            <label class="small font-weight-bold">Tumoración Anexial</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" id="tiene_tumor">
                    </div>
                </div>
                <input type="text" id="tumorAnexial-com" class="form-control form-control-sm" value="No se observan masas">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label class="small font-weight-bold">Conclusión</label>
            <textarea id="conclusion" class="form-control" rows="2"></textarea>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label class="small font-weight-bold">Sugerencias</label>
            <textarea id="sugerencias" class="form-control" rows="1"></textarea>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary" onclick="createEcografiaTrasvaginal()">Guardar</button>
</div>

  <?php require_once("componentes/scripts.php"); ?>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/global.js"></script>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiatrasvaginal.js"></script>
</body>
</html>