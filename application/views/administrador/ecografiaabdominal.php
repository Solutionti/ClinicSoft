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
       <div class="modal-body">

    <div class="row mb-3">
        <div class="col-md-8">
            <label class="small font-weight-bold">Motivo del Examen</label>
            <input type="text" class="form-control form-control-sm" id="motivo" placeholder="Dolor abdominal, chequeo...">
        </div>
        <div class="col-md-4 text-right mt-4">
            <button type="button" class="btn btn-success btn-sm btn-block" onclick="cargarAbdominalNormal()">
                <i class="fas fa-magic"></i> Cargar Normal
            </button>
        </div>
    </div>

    <div class="card mb-3 border-primary">
        <div class="card-header bg-light text-primary font-weight-bold py-1">
            1. HÍGADO Y VÍAS BILIARES
        </div>
        <div class="card-body py-2">
            <div class="row mb-2">
                <div class="col-md-4">
                    <label class="small font-weight-bold">Longitud Hepática (mm)</label>
                    <input type="number" id="higado_tamano" class="form-control form-control-sm" placeholder="< 150 mm">
                </div>
                <div class="col-md-4">
                    <label class="small font-weight-bold">Ecoestructura (Grasa)</label>
                    <select id="higado_eco" class="form-control form-control-sm">
                        <option value="Conservada">Conservada</option>
                        <option value="Esteatosis Leve">Esteatosis Leve (Grado I)</option>
                        <option value="Esteatosis Moderada">Esteatosis Moderada (Grado II)</option>
                        <option value="Esteatosis Severa">Esteatosis Severa (Grado III)</option>
                        <option value="Cirrosis">Patrón Cirrótico</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="small font-weight-bold">Colédoco (mm)</label>
                    <input type="number" id="coledoco_diametro" class="form-control form-control-sm" placeholder="< 6 mm">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="small font-weight-bold">Vesícula Biliar</label>
                    <div class="input-group input-group-sm">
                        <select id="vesicula_paredes" class="form-control form-control-sm" style="max-width: 160px;"> <option value="Paredes Delgadas">Paredes Delgadas</option>
                            <option value="Paredes Engrosadas">Paredes Engrosadas</option>
                            <option value="Alitiásica">Alitiásica</option>
                            <option value="Litiásica">Litiásica (Piedras)</option>
                            <option value="Extirpada">Extirpada (Ausente)</option>
                        </select>
                        <input type="text" id="vesicula_detalles" class="form-control" placeholder="Detalles adicionales (ej: Pólipos, barro biliar)">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card border-secondary h-100">
                <div class="card-header bg-light text-secondary font-weight-bold py-1">2. PÁNCREAS</div>
                <div class="card-body py-2">
                    <textarea id="pancreas" class="form-control form-control-sm" rows="2" placeholder="Cabeza, cuerpo y cola..."></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-secondary h-100">
                <div class="card-header bg-light text-secondary font-weight-bold py-1">3. BAZO</div>
                <div class="card-body py-2">
                    <div class="row">
                        <div class="col-5">
                            <label class="small font-weight-bold">Longitud (mm)</label>
                            <input type="number" id="bazo_tamano" class="form-control form-control-sm" placeholder="< 120">
                        </div>
                        <div class="col-7">
                            <label class="small font-weight-bold">Aspecto</label>
                            <select id="bazo_aspecto" class="form-control form-control-sm">
                                <option value="Homogéneo">Homogéneo</option>
                                <option value="Esplenomegalia">Esplenomegalia</option>
                                <option value="Granulomas">Granulomas</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3 border-success">
        <div class="card-header bg-light text-success font-weight-bold py-1">
            4. RIÑONES (Longitud y Parénquima)
        </div>
        <div class="card-body py-2">
            <div class="row mb-2">
                <div class="col-md-2"><label class="small font-weight-bold mt-1">Derecho:</label></div>
                <div class="col-md-3">
                    <input type="number" id="rd_long" class="form-control form-control-sm" placeholder="Long (mm)">
                </div>
                <div class="col-md-3">
                    <input type="number" id="rd_par" class="form-control form-control-sm" placeholder="Parénq (mm)">
                </div>
                <div class="col-md-4">
                    <select id="rinon_derecho" class="form-control form-control-sm"> <option value="Conservado">Conservado</option>
                        <option value="Litiasis">Litiasis</option>
                        <option value="Hidronefrosis">Hidronefrosis</option>
                        <option value="Quiste Simple">Quiste Simple</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><label class="small font-weight-bold mt-1">Izquierdo:</label></div>
                <div class="col-md-3">
                    <input type="number" id="ri_long" class="form-control form-control-sm" placeholder="Long (mm)">
                </div>
                <div class="col-md-3">
                    <input type="number" id="ri_par" class="form-control form-control-sm" placeholder="Parénq (mm)">
                </div>
                <div class="col-md-4">
                    <select id="rinon_izquierdo" class="form-control form-control-sm"> <option value="Conservado">Conservado</option>
                        <option value="Litiasis">Litiasis</option>
                        <option value="Hidronefrosis">Hidronefrosis</option>
                        <option value="Quiste Simple">Quiste Simple</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label class="small font-weight-bold">Estómago / Intestino</label>
            <input type="text" id="estomago" class="form-control form-control-sm" value="Meteorismo habitual.">
        </div>
        <div class="col-md-8">
            <label class="small font-weight-bold">Otros Hallazgos (Líquido/Vejiga)</label>
            <textarea id="otros_hallazgos" class="form-control form-control-sm" rows="1">No líquido libre en cavidad. Vejiga vacía.</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label class="small font-weight-bold">Conclusiones</label>
            <textarea id="conclusiones" class="form-control" rows="2"></textarea>
        </div>
        <div class="col-md-12 mt-2">
            <label class="small font-weight-bold">Sugerencias</label>
            <textarea id="sugerencias" class="form-control" rows="1"></textarea>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 text-right">
            <button class="btn btn-primary" onclick="createEcografiaAbdominal()">
                <i class="fas fa-save"></i> Guardar Ecografía
            </button>
        </div>
    </div>
</div>
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