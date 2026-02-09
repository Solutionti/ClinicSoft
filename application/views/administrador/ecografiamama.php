<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia de Mama</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">ecografia de mama</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">ecografia de mama</h6>
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
   <h5 class="text-uppercase">Ecografía de Mama</h5>
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
              <input
                type="text"
                class="form-control"
                id="dni"
                style="height: 32px;padding: 0px;"
                minlength="7"
                maxlength="11"
                required
              >
           <div class="input-group-append">
             <button
               type="button"
               style="padding: 5px;"
               class="btn btn-primary"
               id="lupa_DNI"
               onclick="buscarPaciente()"
             >
               <i class="fa fa-search"></i>
              </button>
           </div>
          </div>
        </div>
      </div>
    <div class="col-md-3">
        <label class="form-label">Nombres</label>
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
 <div class="row mb-2">
    <div class="col-12 text-right">
        <button type="button" class="btn btn-success btn-sm" onclick="cargarNormalMama()">
            <i class="fa fa-magic"></i> Cargar Todo Normal
        </button>
    </div>
</div>

<div class="row">
    <div class="col-md-4 border-right">
        <h6 class="text-danger font-weight-bold text-center">MAMA IZQUIERDA</h6>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-danger small">Pezón</label>
                    <select id="pezon_izq" class="form-control form-control-sm">
                        <option value="Normal / Evertido">Normal / Evertido</option>
                        <option value="Umbilicado">Umbilicado</option>
                        <option value="Retraído">Retraído (Patológico)</option>
                        <option value="Ausente (Mastectomía)">Ausente</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-danger small">TCSC / Piel</label>
                    <select id="tcsc_izq" class="form-control form-control-sm">
                        <option value="Conservado">Conservado / Normal</option>
                        <option value="Edema (Piel de Naranja)">Edema (Piel de Naranja)</option>
                        <option value="Inflamatorio">Inflamatorio / Rojo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-danger small">Tejido Glandular</label>
                    <select id="tejido_glandular_izq" class="form-control form-control-sm">
                        <option value="Ecotextura Conservada">Ecotextura Conservada</option>
                        <option value="Patron Fibroquistico">Patrón Fibroquístico</option>
                        <option value="Dilatacion Ductal">Dilatación Ductal</option>
                        <option value="Denso Heterogeneo">Denso Heterogéneo</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-danger small">Axila</label>
                    <select id="axila_izq" class="form-control form-control-sm">
                        <option value="Ganglios Conservados">Ganglios Conservados</option>
                        <option value="Adenopatia Sospechosa">Adenopatía Sospechosa</option>
                        <option value="No se observan ganglios">No se observan ganglios</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="text-danger small">Hallazgos Focales (Nódulos/Quistes)</label>
                    <textarea class="form-control form-control-sm" id="comentario_mama_izq" rows="3" placeholder="Ej: Nódulo sólido en Radio 3, a 2cm del pezón. Medidas: 14x10mm."></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 border-right">
        <h6 class="text-primary font-weight-bold text-center">MAMA DERECHA</h6>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-primary small">Pezón</label>
                    <select id="pezon_der" class="form-control form-control-sm">
                        <option value="Normal / Evertido">Normal / Evertido</option>
                        <option value="Umbilicado">Umbilicado</option>
                        <option value="Retraído">Retraído (Patológico)</option>
                        <option value="Ausente (Mastectomía)">Ausente</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-primary small">TCSC / Piel</label>
                    <select id="tcsc_der" class="form-control form-control-sm">
                        <option value="Conservado">Conservado / Normal</option>
                        <option value="Edema (Piel de Naranja)">Edema (Piel de Naranja)</option>
                        <option value="Inflamatorio">Inflamatorio / Rojo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-primary small">Tejido Glandular</label>
                    <select id="tejido_glandular_der" class="form-control form-control-sm">
                        <option value="Ecotextura Conservada">Ecotextura Conservada</option>
                        <option value="Patron Fibroquistico">Patrón Fibroquístico</option>
                        <option value="Dilatacion Ductal">Dilatación Ductal</option>
                        <option value="Denso Heterogeneo">Denso Heterogéneo</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-primary small">Axila</label>
                    <select id="axila_der" class="form-control form-control-sm">
                        <option value="Ganglios Conservados">Ganglios Conservados</option>
                        <option value="Adenopatia Sospechosa">Adenopatía Sospechosa</option>
                        <option value="No se observan ganglios">No se observan ganglios</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="text-primary small">Hallazgos Focales (Nódulos/Quistes)</label>
                    <textarea class="form-control form-control-sm" id="comentario_der" rows="3" placeholder="Ej: Quiste simple en Radio 9. Medidas: 5mm."></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 bg-light">
        <h6 class="text-info font-weight-bold text-center mt-2">CONCLUSIÓN MÉDICA</h6>
        
        <div class="form-group">
            <label class="small font-weight-bold">Conclusión Texto</label>
            <textarea class="form-control" id="conclusion_mama" rows="4"></textarea>
        </div>

        <div class="form-group border border-info p-2 bg-white rounded">
            <label class="text-danger font-weight-bold" style="font-size: 14px;">Categoría BI-RADS (Obligatorio)</label>
            <select id="birads_final" class="form-control form-control-lg font-weight-bold text-danger">
                <option value="">Seleccione...</option>
                <option value="BIRADS 0">BIRADS 0 - Insuficiente (Ver Mamografía)</option>
                <option value="BIRADS 1">BIRADS 1 - Negativo (Normal)</option>
                <option value="BIRADS 2">BIRADS 2 - Benigno (Quistes/Ganglios)</option>
                <option value="BIRADS 3">BIRADS 3 - Probablemente Benigno (Control 6m)</option>
                <option value="BIRADS 4">BIRADS 4 - Sospechoso (Biopsia)</option>
                <option value="BIRADS 5">BIRADS 5 - Muy sospechoso (>95%)</option>
                <option value="BIRADS 6">BIRADS 6 - Malignidad conocida</option>
            </select>
        </div>

        <div class="form-group">
            <label class="mt-2 small">Sugerencias</label>
            <textarea class="form-control" id="sugerencias_mama"></textarea>
        </div>
        <div class="row mt-1">
                <div class="col-md-3">
                  <button class="btn btn-primary btn-xs mt-2" onclick="createEcografiaMama()">
                    Guardar
                  </button>
                </div>
              </div>
    </div>
</div>
              

  <?php require_once("componentes/scripts.php"); ?>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/global.js"></script>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiamama.js"></script>
</body>
</html>