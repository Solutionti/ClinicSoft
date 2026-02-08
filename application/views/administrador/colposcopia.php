<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administracion / Colposcopia</title>
<?php require_once("componentes/head.php"); ?>
  
</head>
<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-default position-absolute w-100"></div>
  <?php require_once("componentes/menu.php"); ?>
  <main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">administración</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">colposcopia</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">colposcopia</h6>
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
    <div class="container-fluid py-5">
      <div class="row ">
      <div class="card">
     <div class="row mt-4">
       <div class="col-md-12">
       <?php if($this->session->userdata("rol") != "Enfermera") { ?>
       <a class="btn bg-gradient-danger btn-xs" data-bs-toggle="modal" href="#AgregarPaciente" role="button">Agregar <i class="fas fa-plus"></i> </a>
       <?php } ?>
       </div>
     </div>
        <br>  
  <div class="table-responsive" >
    <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-colposcopia">
      <thead>
        <tr class="bg-default">
          <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-12">Opciones</th>
          <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-12">Informe</th>
          <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-12">Paciente</th>
          <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-12">Fecha</th>
          <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-12 ps-2">Medico</th>
          <th class="text-center text-uppercase text-white text-xxs font-weight-bolder opacity-12">Imagenes</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($colposcopia as $colposcopias){ ?>
          <tr>
            <td class="">
              <div class="row">
                <a 
                class="icon icon-shape icon-sm me-2 bg-gradient-danger shadow mx-3"
                href="<?php echo base_url(); ?>administraciopn/pdfcolposcopia/<?php echo $colposcopias->codigo_colposcopia; ?>"
                title="Generar pdf"
                target="blank"  
                >
                <i class="fas fa-file-pdf text-white opacity-10"></i>
              </a>
          </div>
        </td>
        <td><?php echo $colposcopias->codigo_colposcopia; ?></td>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
                <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?php echo $colposcopias->apellido." ".$colposcopias->nombre; ?></h6>
                <p class="text-xs text-secondary mb-0"><?php echo $colposcopias->documento; ?></p>
              </div>
            </div>
          </td>
          <td class="text-xs text-secondary mb-0"><?php echo $colposcopias->fecha; ?></td>
          <td>
            <p class="text-xs text-secondary mb-0"><?php echo $colposcopias->medico; ?></p>
          </td>
          <td>
                      <div class="avatar-group">
                         <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Toma 1">
                             <img  src="<?php echo base_url() ?>public/colposcopia/<?php echo $colposcopias->imagen1; ?>">
                         </a>
                         <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Toma 2">
                             <img  src="<?php echo base_url() ?>public/colposcopia/<?php echo $colposcopias->imagen2; ?>">
                         </a>
                         <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Toma 3">
                             <img  src="<?php echo base_url() ?>public/colposcopia/<?php echo $colposcopias->imagen3; ?>">
                         </a>
                      </div>
                    </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <br>
  </div>
</div>
     <?php require_once("componentes/footer.php"); ?>
    </div>
  </main>
  <?php require_once("componentes/personalizar.php"); ?>

  <!-- LARGE MODAL -->

  <div class="modal fade" id="AgregarPaciente" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-fullscreen" role="document">
    <form class="modal-content" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>administracion/crearcolposcopia">
      <div class="modal-header bg-default">
        <h5 class="modal-title text-uppercase text-white" id="exampleModalLabel">Crear colposcopia</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   
      </div>
      <div class="modal-body">
      <div class="row mt-1">
      <div class="col-md-6">
         <div class="form-group">
            <label>Doctor tratante</label>
            <input
               type="text"
               class="form-control form-control-sm"
               value="<?php echo $this->session->userdata('nombre'). ' ' . $this->session->userdata('nombre'); ?>"
               readonly
               id="codigo_doctor"
               name="medico"
            >
         </div>
      </div>
      <div class="col-md-3">
         <div class="form-group">
            <label>Fecha</label>
            <input type="hidden" name="fecha" value="<?php echo date('Y-m-d'); ?>">
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
              <input type="text" class="form-control" id="dni" name="dni" style="height: 32px;padding: 0px;" minlength="7" maxlength="11" required>
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
            name="nombre"
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

        <div class="row">
    <div class="col-md-4">
        <div class="form-group input-group-sm">
            <label>U. Escamo Columnar (Visibilidad)</label> <select name="escamo_columnar" class="form-control">
                <option value="">Seleccione visibilidad</option>
                <option value="Visible (Tipo 1)">Completamente Visible (Tipo 1)</option>
                <option value="Parcialmente Visible (Tipo 2)">Parcialmente Visible (Tipo 2)</option>
                <option value="No Visible (Tipo 3)">No Visible (Tipo 3)</option>
                <option value="No aplicable">No aplicable (Histerectomía)</option>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group input-group-sm">
            <label>Hallazgos / Lesiones en Cérvix</label>
            <select name="hallazgos_cervix" class="form-control">
                <option value="">Sin hallazgos patológicos</option>
                <optgroup label="Hallazgos Normales">
                    <option value="Ectropión/Ectopia">Ectropión / Ectopia</option>
                    <option value="Metaplasia Escamosa">Metaplasia Escamosa</option>
                    <option value="Quistes de Naboth">Quistes de Naboth</option>
                </optgroup>
                <optgroup label="Grado 1 (Menor)">
                    <option value="Epitelio Blanco Delgado">Epitelio Blanco Delgado</option>
                    <option value="Mosaico Fino">Mosaico Fino</option>
                    <option value="Puntillado Fino">Puntillado Fino</option>
                </optgroup>
                <optgroup label="Grado 2 (Mayor)">
                    <option value="Epitelio Blanco Denso">Epitelio Blanco Denso</option>
                    <option value="Mosaico Grueso">Mosaico Grueso</option>
                    <option value="Puntillado Grueso">Puntillado Grueso</option>
                    <option value="Vasos Atípicos">Vasos Atípicos</option>
                </optgroup>
                 <optgroup label="Test de Schiller">
                    <option value="Schiller Positivo (Yodo Negativo)">Schiller Positivo (Zona Clara)</option>
                    <option value="Schiller Negativo (Yodo Positivo)">Schiller Negativo (Zona Oscura)</option>
                </optgroup>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group input-group-sm">
            <label>Vagina</label>
            <select name="vagina" class="form-control">
                <option value="Sin lesiones">Mucosa Normal / Sin Lesiones</option>
                <option value="Leucorrea/Flujo">Leucorrea / Flujo Inespecífico</option>
                <option value="Condilomas">Condilomas / Verrugas</option>
                <option value="Atrofia">Atrofia (Hipoestrogenismo)</option>
                <option value="Úlcera">Úlcera</option>
                <option value="VAIN">Sospecha de VAIN</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group input-group-sm">
            <label>Vulva</label>
            <select name="vulva" class="form-control">
                <option value="Sin lesiones">Sin lesiones</option>
                <option value="Condilomas">Condilomas Acuminados</option>
                <option value="Herpes">Vesículas Herpéticas</option>
                <option value="Nevus">Nevus (Lunar)</option>
                <option value="Distrofia">Distrofia / Liquen</option>
                <option value="Ulcera">Úlcera</option>
                <option value="VIN">Sospecha de VIN</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group input-group-sm">
            <label>Perineo y Región Perianal</label>
            <select name="perineo_anal" class="form-control">
                <option value="Sin lesiones">Sin lesiones</option>
                <option value="Condilomas">Condilomas / Verrugas</option>
                <option value="Plicomas">Plicomas</option>
                <option value="Fisura">Fisura Anal</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group input-group-sm">
             <label>Toma de Biopsia</label>
             <select name="biopsia" class="form-control">
                  <option value="No">No se realiza</option>
                  <option value="Cervix H12">Cérvix - Radio 12</option>
                  <option value="Cervix H6">Cérvix - Radio 6</option>
                  <option value="Cervix H3">Cérvix - Radio 3</option>
                  <option value="Cervix H9">Cérvix - Radio 9</option>
                  <option value="Varios Radios">Múltiples Radios</option>
                  <option value="Endocervical">Legrado Endocervical (LEC)</option>
                  <option value="Vagina">Vagina / Vulva</option>
             </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group input-group-sm">
            <label>Papanicolaou (PAP)</label>
            <select name="papanicolaou" class="form-control">
                <option value="No">No se realiza</option>
                <option value="Si - Convencional">Si - Convencional</option>
                <option value="Si - Base Liquida">Si - Base Líquida</option>
            </select>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-12">
        <div class="form-group input-group-sm">
            <label>Conclusiones / Plan de Tratamiento</label>
            <textarea name="conclusiones" rows="4" class="form-control" placeholder="Describa el diagnóstico colposcópico y el plan a seguir..."></textarea>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12 mb-2">
        <label>Seleccione las imágenes (Máx 3)</label>
    </div>
    
    <!-- Imagen 1 -->
    <div class="col-md-4">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="imagen1" id="inputImg1" accept=".jpg, .jpeg">
            <label class="custom-file-label">Sin Filtro (Basal)</label>
        </div>
        <div class="mt-2 text-center border rounded p-1" style="min-height: 150px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
            <img id="preview1" src="#" alt="Vista previa 1" style="max-width: 100%; max-height: 150px; display: none;">
            <span id="text-preview1" class="text-muted small">Sin imagen</span>
        </div>
    </div>

    <!-- Imagen 2 -->
    <div class="col-md-4">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="imagen2" id="inputImg2" accept=".jpg, .jpeg">
            <label class="custom-file-label">Con Ácido Acético</label>
        </div>
        <div class="mt-2 text-center border rounded p-1" style="min-height: 150px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
            <img id="preview2" src="#" alt="Vista previa 2" style="max-width: 100%; max-height: 150px; display: none;">
             <span id="text-preview2" class="text-muted small">Sin imagen</span>
        </div>
    </div>

    <!-- Imagen 3 -->
    <div class="col-md-4">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="imagen3" id="inputImg3" accept=".jpg, .jpeg">
            <label class="custom-file-label">Test de Schiller (Lugol)</label>
        </div>
        <div class="mt-2 text-center border rounded p-1" style="min-height: 150px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
            <img id="preview3" src="#" alt="Vista previa 3" style="max-width: 100%; max-height: 150px; display: none;">
             <span id="text-preview3" class="text-muted small">Sin imagen</span>
        </div>
    </div>
</div>
        </div>
      <div class="modal-footer">
        <input type="submit"  class="btn btn-primary" value="Guardar">
      </div>
    </form>
  </div>
</div>

  <?php require_once("componentes/scripts.php"); ?>
  <script src="<?php echo base_url(); ?>public/js/scripts/ecografias/global.js"></script>
  <script src="<?php echo base_url(); ?>public/js/scripts/colposcopia.js"></script>
  
</body>
</html>


