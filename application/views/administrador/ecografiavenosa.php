<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Venosa</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia Venosa</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Venosa</h6>
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
   <h5 class="text-uppercase">Ecografía Venosa</h5>
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
          <button type="button" style="padding: 5px;" class="btn btn-primary" id="lupa_DNI" onclick="buscarPaciente()" ><i class="fa fa-search"></i></button>
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
    <form id="formVenosa">
        <div class="row mb-3">
            <div class="col-md-8">
                <label class="form-label">Motivo del Examen:</label>
                <input type="text" class="form-control form-control-sm" id="motivo">
            </div>
            <div class="col-md-4 text-right mt-4">
                <button type="button" class="btn btn-success btn-sm btn-block" onclick="cargarVenosaNormal()">
                    <i class="fas fa-magic"></i> Cargar Normal
                </button>
            </div>
        </div>

        <div class="form-group">
            <h6 style="color: green; font-weight: bold;">MIEMBRO INFERIOR DERECHO:</h6>
            <textarea class="form-control form-control-sm" id="mid_descripcion" rows="3">PAREDES LISAS, FLUJO FASICO CON LA RESPIRACIÓN, REFLUJOS SEGÚN DESCRIPCIÓN.</textarea>
        </div>

        <table class="table table-sm table-bordered">
            <thead class="bg-light">
                <tr><th>Vena</th> <th>MEDIDA MM</th> <th>REFLUJO</th></tr>
            </thead>
            <tbody>
                <tr><td>F. Común</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_fc_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_fc_ref"></td></tr>
                <tr><td>Safena mayor muslo</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_smm_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_smm_ref"></td></tr>
                <tr><td>Safena mayor pierna</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_smp_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_smp_ref"></td></tr>
                <tr><td>Poplítea</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_pop_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_pop_ref"></td></tr>
                <tr><td>Safena menor</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_sm_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_sm_ref"></td></tr>
                <tr><td>Perforantes</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_perf_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mid_perf_ref"></td></tr>
            </tbody>
        </table>

        <div class="form-group mt-4">
            <h6 style="color: rgb(128, 15, 0); font-weight: bold;">MIEMBRO INFERIOR IZQUIERDO:</h6>
            <textarea class="form-control form-control-sm" id="mii_descripcion" rows="3">PAREDES LISAS, FLUJO FASICO CON LA RESPIRACIÓN, REFLUJOS SEGÚN DESCRIPCIÓN.</textarea>
        </div>

        <table class="table table-sm table-bordered">
            <thead class="bg-light">
                <tr><th>Vena</th> <th>MEDIDA MM</th> <th>REFLUJO</th></tr>
            </thead>
            <tbody>
                <tr><td>F. Común</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_fc_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_fc_ref"></td></tr>
                <tr><td>Safena mayor muslo</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_smm_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_smm_ref"></td></tr>
                <tr><td>Safena mayor pierna</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_smp_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_smp_ref"></td></tr>
                <tr><td>Poplítea</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_pop_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_pop_ref"></td></tr>
                <tr><td>Safena menor</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_sm_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_sm_ref"></td></tr>
                <tr><td>Perforantes</td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_perf_med"></td> 
                    <td><input type="text" class="form-control form-control-sm" id="mii_perf_ref"></td></tr>
            </tbody>
        </table>

        <div class="form-group">
            <label>Conclusiones:</label>
            <textarea class="form-control form-control-sm" id="conclusiones" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label>Sugerencias:</label>
            <textarea class="form-control form-control-sm" id="sugerencias" rows="2"></textarea>
        </div>
    </form>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary" onclick="createEcografiaVenosa()">Guardar</button>
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
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiavenosa.js"></script>
</body>
</html>