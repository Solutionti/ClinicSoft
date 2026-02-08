<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecografia Arterial</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ecografia Arterial</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ecografia Arterial</h6>
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
   <h5 class="text-uppercase">Ecografía Arterial</h5>
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
            <div class="form-row">
                <div class="form-group col-md-12">
                    <h6>MIEMBRO INFERIOR <span style="color: green;">DERECHO</span>:</h6>
                    <textarea class="form-control" id="descripcionProcedimiento" rows="3">PLACAS ATEROMATOSAS EN TIBIAL ANTERIOR DISTAL Y PEDIA.</textarea>
                </div>
            </div>

                <form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Arteria</th>
                                <th>VPS</th>
                                <th>ONDA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>F. Común</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_fc" value="65"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_fc" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>F. Superficial</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_fs" value="60"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_fs" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>Poplitea</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_poplitea" value="45"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_poplitea" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>Tibial Posterior</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_tp" value="40"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_tp" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>Tibial Anterior</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_ta" value="40-42"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_ta" value="Bifásica"></td>
                            </tr>
                            <tr>
                                <td>Media</td>
                                <td><input type="text" class="form-control form-control-sm" name="vps_media" value="38"></td>
                                <td><input type="text" class="form-control form-control-sm" name="onda_media" value="Bifásica"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h6>MIEMBRO INFERIOR <span style="color: rgb(128, 15, 0);">IZQUIERDA</span>:</h6>
                        <textarea class="form-control form-control-sm" id="descripcionProcedimientoIzquierdo" rows="3">PLACAS ATEROMATOSA A PREDOMINIO DE PIERNA.</textarea>
                    </div>
                </div>
    
                    <form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Arteria</th>
                                    <th>VPS</th>
                                    <th>ONDA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>F. Común</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_fc" value="60"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_fc" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>F. Superficial</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_fs" value="50"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_fs" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>Poplitea</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_poplitea" value="35"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_poplitea" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>Tibial Posterior</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_tp" value="35"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_tp" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>Tibial Anterior</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_ta" value="38"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_ta" value="Bifásica"></td>
                                </tr>
                                <tr>
                                    <td>Media</td>
                                    <td><input type="text" class="form-control form-control-sm" name="vps_media" value="35"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="onda_media" value="Bifásica"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
            
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
                <button type="button" class="btn btn-primary" onclick="createEcografiaArterial()">Guardar</button>
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
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/ecografiaarterial.js"></script>
</body>
</html>