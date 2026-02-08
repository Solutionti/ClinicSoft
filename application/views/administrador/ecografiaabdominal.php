<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Abdominal</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia Abdominal</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Abdominal</h6>
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
   <h5 class="text-uppercase">Ecografía Abdominal</h5>
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
        <div class="row mb-3">
                <div class="col-md-12">
                    <label for="motivo" class="form-label">Motivo del Examen:</label>
                    <input type="text" class="form-control form-control-sm" id="motivo" formControlName="motivo">
                </div>
            </div>
            <h6>Hallazgos:</h6>
            <!-- Estómago y hígado en la misma línea -->
            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="estomago">Estómago:</label>
                    <input type="text" class="form-control form-control-sm" id="estomago" placeholder="Ingrese hallazgos">
                </div>
                <div class="form-group col-md-6">
                    <label for="higado">Hígado:</label>
                    <input type="text" class="form-control form-control-sm" id="higado" placeholder="Ingrese hallazgos">
                </div>
            </div>

            <!-- Colédoco y vesícula en la misma línea -->
            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="coledoco_diametro">Colédoco (diámetro):</label>
                    <input type="text" class="form-control form-control-sm" id="coledoco_diametro" placeholder="Ingrese diámetro en mm">
                </div>
                <div class="form-group col-md-6">
                    <label for="vesicula_volumen">Vesícula (medidas):</label>
                    <input type="text" class="form-control form-control-sm" id="vesicula_volumen" placeholder="Ingrese medidas">
                </div>
            </div>

            <!-- Páncreas y bazo en la misma línea -->
            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="vesicula_paredes">Páncreas:</label>
                    <input type="text" class="form-control form-control-sm" id="vesicula_paredes" placeholder="Ingrese tamaño y ecoestructura">
                </div>
                <div class="form-group col-md-6">
                    <label for="bazo">Bazo:</label>
                    <input type="text" class="form-control form-control-sm" id="bazo" placeholder="Ingrese tamaño y ecoestructura">
                </div>
            </div>

            <!-- Riñones (derecho e izquierdo) en la misma línea -->
            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="rinon_derecho">Riñón Derecho:</label>
                    <input type="text" class="form-control form-control-sm" id="rinon_derecho" placeholder="Ingrese hallazgos">
                </div>
                <div class="form-group col-md-6">
                    <label for="rinon_izquierdo">Riñón Izquierdo:</label>
                    <input type="text" class="form-control form-control-sm" id="rinon_izquierdo" placeholder="Ingrese hallazgos">
                </div>
            </div>

            <!-- Otros hallazgos, conclusiones y sugerencias en filas separadas -->
            <div class="form-group">
                <label for="otros_hallazgos">Otros Hallazgos:</label>
                <textarea class="form-control form-control-sm" id="otros_hallazgos" rows="2" placeholder="Ingrese otros hallazgos"></textarea>
            </div>
            <div class="form-group">
                <label for="conclusiones">Conclusiones:</label>
                <textarea class="form-control form-control-sm" id="conclusiones" rows="2" placeholder="Ingrese conclusiones"></textarea>
            </div>
            <div class="form-group">
                <label for="sugerencias">Sugerencias:</label>
                <textarea class="form-control form-control-sm" id="sugerencias" rows="2" placeholder="Ingrese sugerencias"></textarea>
            </div>
              <div class="row mt-1">
                <div class="col-md-3">
                  <button class="btn btn-primary btn-xs mt-2" onclick="createEcografiaAbdominal()">
                    Guardar
                  </button>
                </div>
              </div>
            </form>
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
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiaabdominal.js"></script>

</body>
</html>