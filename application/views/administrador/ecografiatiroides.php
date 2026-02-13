<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Tiroides</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia Tiroides</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Tiroides</h6>
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
   <h5 class="text-uppercase">Ecografía Tiroides</h5>
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
    <form id="formTiroides">
        
        <div class="row mb-3">
            <div class="col-md-8">
                <label class="small font-weight-bold">Motivo del Examen</label>
                <input type="text" class="form-control form-control-sm" id="motivo">
            </div>
            <div class="col-md-4 text-right mt-4">
                <button type="button" class="btn btn-success btn-sm btn-block" onclick="cargarTiroidesNormal()">
                    <i class="fas fa-magic"></i> Cargar Normal
                </button>
            </div>
        </div>

        <div class="form-group mb-3">
            <label class="small font-weight-bold">Descripción de la Tiroides</label>
            <textarea class="form-control form-control-sm" id="descripcionTiroides" rows="2">Ubicación central, Parénquima homogéneo, Volumen normal, No se observan lesiones focales</textarea>
        </div>

        <div class="card mb-3 border-primary">
            <div class="card-header bg-light text-primary font-weight-bold py-1 text-center">
                BIOMETRÍA Y VOLUMEN TIROIDEO
            </div>
            <div class="card-body py-2 px-1">
                <div class="row mx-0 border-bottom pb-1 mb-2">
                    <div class="col-md-2"></div>
                    <div class="col-md-5 text-center font-weight-bold text-primary">LÓBULO DERECHO</div>
                    <div class="col-md-5 text-center font-weight-bold text-primary">LÓBULO IZQUIERDO</div>
                </div>

                <div class="row mx-0 mb-1 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Long (mm)</label></div>
                    <div class="col-md-5"><input type="number" id="ld_long" class="form-control form-control-sm text-center" placeholder="L"></div>
                    <div class="col-md-5"><input type="number" id="li_long" class="form-control form-control-sm text-center" placeholder="L"></div>
                </div>
                <div class="row mx-0 mb-1 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Antero-P (mm)</label></div>
                    <div class="col-md-5"><input type="number" id="ld_ap" class="form-control form-control-sm text-center" placeholder="AP"></div>
                    <div class="col-md-5"><input type="number" id="li_ap" class="form-control form-control-sm text-center" placeholder="AP"></div>
                </div>
                <div class="row mx-0 mb-1 align-items-center">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0">Trans (mm)</label></div>
                    <div class="col-md-5"><input type="number" id="ld_trans" class="form-control form-control-sm text-center" placeholder="T"></div>
                    <div class="col-md-5"><input type="number" id="li_trans" class="form-control form-control-sm text-center" placeholder="T"></div>
                </div>

                <div class="row mx-0 mt-2 align-items-center bg-light py-2">
                    <div class="col-md-2 text-right"><label class="small font-weight-bold mb-0 text-success">Volumen</label></div>
                    <div class="col-md-5"><input type="text" id="ld_volumen" class="form-control form-control-sm text-center font-weight-bold text-success" readonly placeholder="0.0 cc"></div>
                    <div class="col-md-5"><input type="text" id="li_volumen" class="form-control form-control-sm text-center font-weight-bold text-success" readonly placeholder="0.0 cc"></div>
                </div>
            </div>
            <div class="card-footer py-1 text-center bg-white">
                <span class="small font-weight-bold text-dark">VOLUMEN GLANDULAR TOTAL: </span>
                <input type="text" id="volumen_total" class="d-inline-block form-control form-control-sm font-weight-bold text-center border-0 bg-transparent text-primary" style="width: 100px; font-size: 1.1em;" readonly>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <label class="small font-weight-bold">Istmo</label>
                <input type="text" class="form-control form-control-sm" id="istmo" placeholder="Espesor mm">
            </div>
            <div class="col-md-6">
                <label class="small font-weight-bold">Estructuras Vasculares</label>
                <input type="text" class="form-control form-control-sm" id="estructurasVasculares" value="Normales">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <label class="small font-weight-bold">Glándulas Submaxilares</label>
                <input type="text" class="form-control form-control-sm" id="glandulasSubmaxilares" value="Normales">
            </div>
            <div class="col-md-6">
                <label class="small font-weight-bold">Adenopatías Cervicales</label>
                <input type="text" class="form-control form-control-sm" id="adenopatiaCervicales" value="No se observan">
            </div>
        </div>

        <div class="form-group mb-2">
            <label class="small font-weight-bold">Piel</label>
            <input type="text" class="form-control form-control-sm" id="piel" value="Delgada sin diferenciación">
        </div>

        <div class="form-group mb-2">
            <label class="small font-weight-bold">TCSC</label>
            <textarea class="form-control form-control-sm" id="tcsc" rows="2">De caracteres normales ecográficamente normales, no se observan quistes, ni nódulos</textarea>
        </div>

        <h6 class="font-weight-bold mt-3">Conclusiones</h6>
        <div class="mb-2">
            <textarea class="form-control form-control-sm" id="conclusiones" rows="2"></textarea>
        </div>

        <h6 class="font-weight-bold">Sugerencias</h6>
        <div class="mb-3">
            <textarea class="form-control form-control-sm" id="sugerencias" rows="1"></textarea>
        </div>
    </form>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary" onclick="createEcografiaTiroides()">Guardar</button>
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
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiatiroides.js"></script>
</body>
</html>