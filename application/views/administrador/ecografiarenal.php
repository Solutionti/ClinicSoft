<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Renal</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia Renal</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Renal</h6>
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
   <h5 class="text-uppercase">Ecografía Renal</h5>
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
    <form id="formRenal">
        
        <div class="row mb-3">
            <div class="col-md-8">
                <label class="small font-weight-bold">Motivo del Examen</label>
                <input type="text" class="form-control form-control-sm" id="motivo" placeholder="Dolor lumbar, infección urinaria...">
            </div>
            <div class="col-md-4 text-right mt-4">
                <button type="button" class="btn btn-success btn-sm btn-block" onclick="cargarRenalNormal()">
                    <i class="fas fa-magic"></i> Cargar Normal
                </button>
            </div>
        </div>

        <div class="card mb-3 border-primary">
            <div class="card-header bg-light text-primary font-weight-bold py-1 text-center">
                1. EVALUACIÓN RENAL COMPARATIVA
            </div>
            <div class="card-body py-2 px-1">
                <div class="row mx-0 border-bottom pb-2 mb-2">
                    <div class="col-md-2 text-center"></div>
                    <div class="col-md-5 text-center font-weight-bold text-primary">RIÑÓN DERECHO</div>
                    <div class="col-md-5 text-center font-weight-bold text-primary">RIÑÓN IZQUIERDO</div>
                </div>

                <div class="row mx-0 mb-2 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Morfología</label></div>
                    <div class="col-md-5">
                        <select id="rd_morfologia" class="form-control form-control-sm">
                            <option value="Normal">Normal</option>
                            <option value="Anormal">Anormal</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select id="ri_morfologia" class="form-control form-control-sm">
                            <option value="Normal">Normal</option>
                            <option value="Anormal">Anormal</option>
                        </select>
                    </div>
                </div>

                <div class="row mx-0 mb-2 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Ecogenicidad</label></div>
                    <div class="col-md-5">
                        <select id="rd_ecogenicidad" class="form-control form-control-sm">
                            <option value="Normal">Normal</option>
                            <option value="Aumentada">Aumentada</option>
                            <option value="Disminuida">Disminuida</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select id="ri_ecogenicidad" class="form-control form-control-sm">
                            <option value="Normal">Normal</option>
                            <option value="Aumentada">Aumentada</option>
                            <option value="Disminuida">Disminuida</option>
                        </select>
                    </div>
                </div>

                <div class="row mx-0 mb-2 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Longitud (mm)</label></div>
                    <div class="col-md-5"><input type="number" id="rd_longitud" class="form-control form-control-sm text-center" placeholder="RD"></div>
                    <div class="col-md-5"><input type="number" id="ri_longitud" class="form-control form-control-sm text-center" placeholder="RI"></div>
                </div>

                <div class="row mx-0 mb-2 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Parénquima (mm)</label></div>
                    <div class="col-md-5"><input type="number" id="rd_parenquima" class="form-control form-control-sm text-center" placeholder="RD"></div>
                    <div class="col-md-5"><input type="number" id="ri_parenquima" class="form-control form-control-sm text-center" placeholder="RI"></div>
                </div>

                <div class="row mx-0 mb-2 align-items-center bg-light py-1">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Img. Sólidas</label></div>
                    <div class="col-md-5">
                        <select id="rd_solidas" class="form-control form-control-sm">
                            <option value="No">No</option>
                            <option value="Sí">Sí</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select id="ri_solidas" class="form-control form-control-sm">
                            <option value="No">No</option>
                            <option value="Sí">Sí</option>
                        </select>
                    </div>
                </div>

                <div class="row mx-0 mb-2 align-items-center bg-light py-1">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Img. Quísticas</label></div>
                    <div class="col-md-5">
                        <select id="rd_quisticas" class="form-control form-control-sm">
                            <option value="No">No</option>
                            <option value="Sí">Sí</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select id="ri_quisticas" class="form-control form-control-sm">
                            <option value="No">No</option>
                            <option value="Sí">Sí</option>
                        </select>
                    </div>
                </div>

                <div class="row mx-0 mb-2 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0 text-danger">Hidronefrosis</label></div>
                    <div class="col-md-5">
                        <div class="input-group input-group-sm">
                            <select id="rd_hidronefrosis" class="form-control form-control-sm" style="max-width: 70px;">
                                <option value="No">No</option>
                                <option value="Sí">Sí</option>
                            </select>
                            <input type="text" id="rd_hidro_medida" class="form-control" placeholder="Medida (mm)">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group input-group-sm">
                            <select id="ri_hidronefrosis" class="form-control form-control-sm" style="max-width: 70px;">
                                <option value="No">No</option>
                                <option value="Sí">Sí</option>
                            </select>
                            <input type="text" id="ri_hidro_medida" class="form-control" placeholder="Medida (mm)">
                        </div>
                    </div>
                </div>

                <div class="row mx-0 mb-2 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Microlitiasis</label></div>
                    <div class="col-md-5">
                        <div class="input-group input-group-sm">
                            <select id="rd_microlitiasis" class="form-control form-control-sm" style="max-width: 70px;">
                                <option value="No">No</option>
                                <option value="Sí">Sí</option>
                            </select>
                            <input type="text" id="rd_micro_medida" class="form-control" placeholder="Medida (mm)">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group input-group-sm">
                            <select id="ri_microlitiasis" class="form-control form-control-sm" style="max-width: 70px;">
                                <option value="No">No</option>
                                <option value="Sí">Sí</option>
                            </select>
                            <input type="text" id="ri_micro_medida" class="form-control" placeholder="Medida (mm)">
                        </div>
                    </div>
                </div>

                <div class="row mx-0 mb-2 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0 text-danger">Cálculos</label></div>
                    <div class="col-md-5">
                        <div class="input-group input-group-sm">
                            <select id="rd_calculos" class="form-control form-control-sm" style="max-width: 70px;">
                                <option value="No">No</option>
                                <option value="Sí">Sí</option>
                            </select>
                            <input type="text" id="rd_calculos_medida" class="form-control" placeholder="Medida (mm)">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group input-group-sm">
                            <select id="ri_calculos" class="form-control form-control-sm" style="max-width: 70px;">
                                <option value="No">No</option>
                                <option value="Sí">Sí</option>
                            </select>
                            <input type="text" id="ri_calculos_medida" class="form-control" placeholder="Medida (mm)">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 border-info">
            <div class="card-header bg-light text-info font-weight-bold py-1">
                2. VEJIGA Y VOLÚMENES
            </div>
            <div class="card-body py-2">
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="small font-weight-bold">Repleción</label>
                        <select id="vejiga_replecion" class="form-control form-control-sm">
                            <option value="Normal">Normal</option>
                            <option value="Mínima">Mínima</option>
                            <option value="Excesiva">Excesiva</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="small font-weight-bold">Paredes</label>
                        <select id="vejiga_paredes" class="form-control form-control-sm">
                            <option value="Normal">Normal</option>
                            <option value="Delgadas">Delgadas</option>
                            <option value="Engrosadas">Engrosadas</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="small font-weight-bold">Contenido Anecoico</label>
                        <select id="vejiga_contenido" class="form-control form-control-sm">
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="small font-weight-bold">Img. Expansivas</label>
                        <select id="vejiga_imagenes" class="form-control form-control-sm">
                            <option value="No">No</option>
                            <option value="Sí">Sí</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                     <div class="col-md-3">
                        <label class="small font-weight-bold">Cálculos</label>
                        <select id="vejiga_calculos" class="form-control form-control-sm">
                            <option value="No">No</option>
                            <option value="Sí">Sí</option>
                        </select>
                    </div>
                    <div class="col-md-9">
                        <label class="small font-weight-bold">Descripción Vejiga</label>
                        <input type="text" id="descripcion_vejiga" class="form-control form-control-sm" placeholder="Detalles...">
                    </div>
                </div>

                <div class="row bg-light p-2 rounded mx-0 border">
                    <div class="col-md-4">
                        <label class="small font-weight-bold text-primary">Vol. Pre-miccional (cc)</label>
                        <input type="number" id="vol_pre" class="form-control form-control-sm" placeholder="0">
                    </div>
                    <div class="col-md-4">
                        <label class="small font-weight-bold text-primary">Vol. Post-miccional (cc)</label>
                        <input type="number" id="vol_post" class="form-control form-control-sm" placeholder="0">
                    </div>
                    <div class="col-md-4">
                        <label class="small font-weight-bold text-danger">% Retención</label>
                        <input type="text" id="retencion" class="form-control form-control-sm font-weight-bold text-danger" readonly placeholder="Calculado">
                    </div>
                </div>
            </div>
        </div>

        <h6 class="font-weight-bold mt-2">Observaciones Adicionales</h6>
        <div class="mb-2">
             <textarea id="observaciones" class="form-control form-control-sm" rows="2"></textarea>
        </div>

        <h6 class="font-weight-bold text-primary">Conclusiones</h6>
        <div class="mb-3">
            <textarea id="conclusiones" class="form-control form-control-sm" rows="3"></textarea>
        </div>
    </form>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary" onclick="createEcografiaRenal()">Guardar Ecografía</button>
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
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiarenal.js"></script>
</body>
</html>