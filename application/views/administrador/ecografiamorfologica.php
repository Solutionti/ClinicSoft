<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Morfologica</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">ecografia morfologica</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Morfologica</h6>
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
   <h5 class="text-uppercase">Ecografía Morfologica</h5>
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
         <h6 class="text-secondary font-weight-bold border-bottom pb-2">Datos Generales</h6>
    <div class="row mb-3">
        <div class="col-md-6 border-right">
            <label class="small font-weight-bold d-block">Sexo Fetal:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo_m" value="Masculino">
                <label class="form-check-label small" for="sexo_m">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo_f" value="Femenino">
                <label class="form-check-label small" for="sexo_f">Femenino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo_no" value="No Visible">
                <label class="form-check-label small" for="sexo_no">No Visible</label>
            </div>
        </div>

        <div class="col-md-6">
            <label class="small font-weight-bold d-block">Situación:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="situacion" id="sit_cef" value="Cefálico" checked>
                <label class="form-check-label small" for="sit_cef">Cefálico</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="situacion" id="sit_pod" value="Podálico">
                <label class="form-check-label small" for="sit_pod">Podálico</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="situacion" id="sit_tra" value="Transverso">
                <label class="form-check-label small" for="sit_tra">Transverso</label>
            </div>
            <button type="button" class="btn btn-success btn-sm ml-2" onclick="cargarMorfologicaNormal()">
                <i class="fas fa-magic"></i> Cargar Todo Normal
            </button>
        </div>
    </div>
    


    <h6 class="text-primary font-weight-bold border-bottom pb-2">1. Neurosonografía (Cabeza)</h6>
    <div class="row mb-3">
        <div class="col-md-12">
            <label class="small font-weight-bold">Estructuras Intracraneales</label>
            <textarea id="formacabeza" class="form-control form-control-sm" rows="2">Encéfalo, ventrículos, línea media, tálamos y cisuras normales. Cavum del septum pellucidum y cuerpo calloso visibles.</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="small text-danger">Cerebelo (mm)</label>
            <input type="number" id="cerebelo" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
            <label class="small text-danger">Cist. Magna (mm)</label>
            <input type="number" id="cisternaMagna" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
            <label class="small text-danger">Atrio Vent. (mm)</label>
            <input type="number" id="atrioVentricular" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
            <label class="small text-danger font-weight-bold">Pliegue Nucal</label> <input type="number" id="pliegueNucal" class="form-control form-control-sm" placeholder="< 6mm">
        </div>
    </div>

    <h6 class="text-info font-weight-bold border-bottom pb-2 mt-2">2. Cara y Cuello</h6>
    <div class="row mb-3">
        <div class="col-md-8">
            <label class="small">Perfil Facial</label>
            <textarea id="perfilCara" class="form-control form-control-sm" rows="1">Nariz, fosas nasales, labio superior íntegro, órbitas y cristalinos normales.</textarea>
        </div>
        <div class="col-md-4">
            <label class="small">Cuello</label>
            <textarea id="cuello" class="form-control form-control-sm" rows="1">Sin masas ni circulares.</textarea>
        </div>
    </div>

    <h6 class="text-warning font-weight-bold border-bottom pb-2 mt-2">3. Tórax y Corazón</h6>
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="small">Pulmones / Tórax</label>
            <textarea id="perfiltorax" class="form-control form-control-sm" rows="2">Pulmones de ecogenicidad homogénea, diafragma íntegro, no masas.</textarea>
        </div>
        <div class="col-md-6">
            <label class="small">Corazón (4 Cámaras)</label>
            <textarea id="corazon" class="form-control form-control-sm" rows="2">Situs solitus, 4 cámaras simétricas, salida de grandes vasos normal. Ritmo regular.</textarea>
        </div>
    </div>

    <h6 class="text-success font-weight-bold border-bottom pb-2 mt-2">4. Abdomen y Columna</h6>
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="small">Abdomen / Gastro / Renal</label>
            <textarea id="abdomen" class="form-control form-control-sm" rows="3">Pared íntegra, estómago presente, riñones normales, vejiga visible con 2 arterias umbilicales.</textarea>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
                <label class="small">Columna Vertebral</label>
                <textarea id="columnaVertebral" class="form-control form-control-sm" rows="1">Íntegra en todos sus segmentos.</textarea>
            </div>
            <div class="mb-2">
                <label class="small text-danger font-weight-bold">Extremidades</label>
                <textarea id="extremidades" class="form-control form-control-sm" rows="1">4 extremidades presentes y móviles. Manos y pies visibles.</textarea>
            </div>
        </div>
    </div>

    <h6 class="text-secondary font-weight-bold border-bottom pb-2 mt-2">5. Biometría Fetal</h6>
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="small">DBP (mm)</label>
            <input type="number" id="dbp" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
            <label class="small">CC (mm)</label>
            <input type="number" id="cc" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
            <label class="small">CA (mm)</label>
            <input type="number" id="ca" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
            <label class="small">LF (mm)</label>
            <input type="number" id="lf" class="form-control form-control-sm">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="small">Peso (g)</label>
            <input type="number" id="ponderadoFetal" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
            <label class="small">LCF (lpm)</label>
            <input type="number" id="lcf" class="form-control form-control-sm">
        </div>
        <div class="col-md-6">
            <label class="small">Placenta / Líquido</label>
            <input type="text" id="placenta_liquido" class="form-control form-control-sm" value="Placenta Corporal Post. Grado I / ILA Normal">
        </div>
    </div>

    <h6 class="text-danger font-weight-bold border-bottom pb-2 mt-2">6. Doppler y Materno</h6>
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="small">IP Uterina Der.</label>
            <input type="number" step="0.01" id="ip-der" class="form-control form-control-sm" onchange="calcPromedioMorfo()">
        </div>
        <div class="col-md-3">
            <label class="small">IP Uterina Izq.</label>
            <input type="number" step="0.01" id="ip-izq" class="form-control form-control-sm" onchange="calcPromedioMorfo()">
        </div>
        <div class="col-md-3">
            <label class="small font-weight-bold">IP Promedio</label> <input type="number" id="ip_promedio" class="form-control form-control-sm bg-light" readonly>
        </div>
        <div class="col-md-3">
            <label class="small font-weight-bold text-danger">Cervicometría</label> <input type="number" id="cervicometria" class="form-control form-control-sm" placeholder="> 25mm">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label class="small font-weight-bold">Conclusión</label>
            <textarea id="conclusiones" class="form-control" rows="2"></textarea>
        </div>
    </div>
</div>

<div class="modal-footer">
     <button type="button" class="btn btn-primary" onclick="createEcografiaMorfologica()">Guardar Ecografía</button>
</div>

  <?php require_once("componentes/scripts.php"); ?>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/global.js"></script>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiamorfologica.js"></script>
</body>
</html>