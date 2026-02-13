<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Obstetrica</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia Obstetrica</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Obstetrica</h6>
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
   <h5 class="text-uppercase">Ecografía Obstetrica</h5>
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
        <div class="col-6">
            <button type="button" class="btn btn-outline-warning btn-block font-weight-bold" id="btn_precoz" onclick="activarModo('precoz')">
                <i class="fas fa-baby"></i> 1º TRIMESTRE (< 13 Sem)
            </button>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-primary btn-block font-weight-bold" id="btn_avanzado" onclick="activarModo('avanzado')">
                <i class="fas fa-child"></i> 2º y 3º TRIMESTRE (> 13 Sem)
            </button>
        </div>
    </div>

    <div id="bloque_precoz" style="display: none;">
        <div class="card mb-3 border-warning">
            <div class="card-header bg-light text-warning font-weight-bold py-1">
                BIOMETRÍA Y SACO (PRIMERAS SEMANAS)
                <button class="btn btn-xs btn-warning float-right" onclick="cargarPrecozNormal()">Cargar Normal</button>
            </div>
            <div class="card-body py-2">
                <div class="row">
                    <div class="col-md-3">
                        <label class="small font-weight-bold">Saco Gestacional</label>
                        <select id="saco_gestacional" class="form-control form-control-sm">
                            <option value="">--</option>
                            <option value="Normoinserto">Normoinserto</option>
                            <option value="Irregular">Irregular</option>
                            <option value="Doble">Doble</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="small font-weight-bold">Vesícula Vitelina</label>
                        <select id="saco_vitelino" class="form-control form-control-sm">
                            <option value="">--</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="small font-weight-bold text-primary">LCC (Longitud mm)</label>
                        <input type="number" id="lcc" class="form-control form-control-sm" placeholder="mm">
                    </div>
                    <div class="col-md-3">
                        <label class="small font-weight-bold">Embrión</label>
                        <select id="embrion_visualizado" class="form-control form-control-sm">
                            <option value="Visualizado">Visualizado</option>
                            <option value="No Visualizado">No Visualizado</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="bloque_avanzado">
        
        <div class="card mb-3 border-primary">
            <div class="card-header bg-light text-primary font-weight-bold py-1">
                BIOMETRÍA Y PESO (Hadlock)
                <button class="btn btn-xs btn-primary float-right" onclick="cargarAvanzadoNormal()">Cargar Normal</button>
            </div>
            <div class="card-body py-2">
                <div class="row">
                    <div class="col-md-3">
                        <label class="small">DBP (Cabeza)</label>
                        <input type="number" id="dpb" class="form-control form-control-sm" placeholder="mm">
                    </div>
                    <div class="col-md-3">
                        <label class="small">CC (Circunf.)</label>
                        <input type="number" id="cc" class="form-control form-control-sm" placeholder="mm">
                    </div>
                    <div class="col-md-3">
                        <label class="small">CA (Abdomen)</label>
                        <input type="number" id="ca" class="form-control form-control-sm" placeholder="mm">
                    </div>
                    <div class="col-md-3">
                        <label class="small">LF (Fémur)</label>
                        <input type="number" id="lf" class="form-control form-control-sm" placeholder="mm">
                    </div>
                </div>
                <hr class="my-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="small font-weight-bold text-success">Peso Estimado (g)</label>
                        <input type="number" id="ponderado" class="form-control form-control-sm font-weight-bold text-success" placeholder="Gramos">
                    </div>
                    <div class="col-md-4">
                        <label class="small font-weight-bold">Edad Gestacional</label>
                        <input type="text" id="edad_gestacional" class="form-control form-control-sm" placeholder="Ej: 25 sem">
                    </div>
                    <div class="col-md-4">
                        <label class="small font-weight-bold">Percentil</label>
                        <input type="text" id="percentil" class="form-control form-control-sm" placeholder="%">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-3">
                <label class="small font-weight-bold">Situación</label>
                <select id="situacion" class="form-control form-control-sm">
                    <option value="Longitudinal">Longitudinal</option>
                    <option value="Transversa">Transversa</option>
                    <option value="Oblicua">Oblicua</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold">Presentación</label>
                <select id="presentacion" class="form-control form-control-sm">
                    <option value="Cefalico">Cefálico</option>
                    <option value="Podalico">Podálico</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold">Dorso</label>
                <select id="dorso" class="form-control form-control-sm">
                    <option value="Derecho">Derecho</option>
                    <option value="Izquierdo">Izquierdo</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold text-info">Sexo Fetal</label>
                <select id="sexo" class="form-control form-control-sm">
                    <option value="No Visible">No Visible</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label class="small font-weight-bold">Placenta</label>
                <select id="placenta_ub" class="form-control form-control-sm">
                    <option value="Corporal Anterior">Anterior</option>
                    <option value="Corporal Posterior">Posterior</option>
                    <option value="Fúndica">Fúndica</option>
                    <option value="Previa">Previa</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="small font-weight-bold">Grado</label>
                <select id="placenta_grado" class="form-control form-control-sm">
                    <option value="0">0</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                </select>
            </div>
        </div>
    </div>

    <h6 class="text-secondary font-weight-bold border-bottom pb-1">Vitalidad y Conclusiones</h6>
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="small font-weight-bold text-danger">LCF (Latidos)</label>
            <input type="number" id="lcf" class="form-control form-control-sm" placeholder="140">
        </div>
        <div class="col-md-4">
            <label class="small font-weight-bold">Movimientos</label>
            <input type="text" id="movimientos" class="form-control form-control-sm" value="Presentes">
        </div>
        <div class="col-md-5">
            <label class="small font-weight-bold">Líquido Amniótico (ILA)</label>
            <input type="text" id="ila" class="form-control form-control-sm" value="Normal">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label class="small font-weight-bold">Conclusión</label>
            <textarea id="conclusion" class="form-control" rows="2"></textarea>
        </div>
        <div class="col-md-12 mt-2">
            <label class="small font-weight-bold">Sugerencias</label>
            <textarea id="sugerencia" class="form-control" rows="1"></textarea>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary" onclick="createEcografiaObstetrica()">Guardar Ecografía</button>
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
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiaobstetrica.js"></script>
</body>
</html>