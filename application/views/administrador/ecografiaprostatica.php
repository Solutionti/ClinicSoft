<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Prostatica</title>
    <?php require_once("componentes/head.php"); ?>
    <style>
    #observacion_container {
        display: none; /* Ocultar el textarea al inicio */
    }
</style>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia Prostatica</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Prostatica</h6>
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
   <h5 class="text-uppercase">Ecografía Prostatica</h5>
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
     <!-- contenido nuevo  -->
     <div class="modal-body">
    <form id="formProstata">
        <div class="row mb-3">
            <div class="col-md-8">
                <label for="motivo" class="form-label font-weight-bold">Motivo del Examen</label>
                <input type="text" class="form-control form-control-sm" id="motivo" placeholder="Ej: Dificultad para orinar, chequeo...">
            </div>
            <div class="col-md-4 text-right mt-4">
                <button type="button" class="btn btn-success btn-sm btn-block" onclick="cargarProstataNormal()">
                    <i class="fas fa-magic"></i> Cargar Normal
                </button>
            </div>
        </div>

        <h5 class="mt-4 text-primary border-bottom pb-2">1. VEJIGA Y RESIDUO</h5>
        
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="small font-weight-bold">Paredes</label>
                <select class="form-control form-control-sm" id="paredes">
                    <option value="Delgadas">Delgadas (Normal)</option>
                    <option value="Engrosadas">Engrosadas (>3mm)</option>
                    <option value="Trabeculadas">Trabeculadas (Lucha)</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold">Contenido</label>
                <select class="form-control form-control-sm" id="contenido">
                    <option value="Anecoico">Anecoico (Limpio)</option>
                    <option value="Sedimento">Con Sedimento</option>
                    <option value="Litiasis">Litiasis (Cálculos)</option>
                </select>
            </div>
             <div class="col-md-3">
                <label class="small font-weight-bold">Imágenes Expansivas</label>
                <select class="form-control form-control-sm" id="imagenes_expansivas">
                    <option value="No">No</option>
                    <option value="Sí">Sí</option>
                </select>
            </div>
            <div class="col-md-3">
                 <label class="small font-weight-bold">Cálculos</label>
                <select class="form-control form-control-sm" id="calculos">
                    <option value="No">No</option>
                    <option value="Sí">Sí</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
             <div class="col-md-12">
                <label class="small font-weight-bold">Descripción Adicional Vejiga</label>
                <input type="text" class="form-control form-control-sm" id="descripcion_vejiga" placeholder="Detalles adicionales...">
            </div>
        </div>

        <div class="row mb-3 p-2 bg-light rounded mx-0 border">
            <div class="col-md-4">
                <label class="small font-weight-bold text-primary">Vol. Pre-miccional (cc)</label>
                <input type="number" class="form-control form-control-sm" id="vol_pre" placeholder="0">
            </div>
            <div class="col-md-4">
                <label class="small font-weight-bold text-primary">Vol. Post-miccional (cc)</label>
                <input type="number" class="form-control form-control-sm" id="vol_post" placeholder="0">
            </div>
            <div class="col-md-4">
                <label class="small font-weight-bold text-danger">% Retención (Residuo)</label>
                <input type="text" class="form-control form-control-sm font-weight-bold text-danger" id="retencion" readonly placeholder="Calculando...">
            </div>
        </div>

        <h5 class="mt-4 text-primary border-bottom pb-2">2. PRÓSTATA</h5>
        
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="small font-weight-bold">Transverso (mm)</label>
                <input type="number" class="form-control form-control-sm" id="transverso" placeholder="mm">
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold">Antero-Posterior (mm)</label>
                <input type="number" class="form-control form-control-sm" id="antero_posterior" placeholder="mm">
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold">Longitudinal (mm)</label>
                <input type="number" class="form-control form-control-sm" id="longitudinal" placeholder="mm">
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold text-success">Volumen/Peso (cc)</label>
                <input type="text" class="form-control form-control-sm font-weight-bold text-success" id="volumen" readonly placeholder="Calculado">
            </div>
        </div>

        <div class="row mb-3">
             <div class="col-md-4">
                <label class="small font-weight-bold">Bordes</label>
                <select class="form-control form-control-sm" id="bordes">
                    <option value="Regulares">Regulares</option>
                    <option value="Irregulares">Irregulares</option>
                    <option value="Lobulados">Lobulados</option>
                </select>
            </div>
             <div class="col-md-8">
                <label class="small font-weight-bold">Observaciones / Ecoestructura</label>
                <textarea class="form-control form-control-sm" id="observacion_textarea" rows="1" placeholder="Homogénea, Heterogénea..."></textarea>
            </div>
        </div>

        <h5 class="mt-4 text-primary border-bottom pb-2">CONCLUSIONES</h5>
        <div class="mb-3">
            <textarea class="form-control" id="conclusiones" rows="3"></textarea>
        </div>
    </form>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary" onclick="createEcografiaProstatica()">Guardar Ecografía</button>
</div>
            </div>
              <br>
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
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiaprostatica.js"></script>
</body>
</html>