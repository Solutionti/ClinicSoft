<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administracion / Triaje</title>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Triaje</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Triaje</h6>
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
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?php echo base_url();?>img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-dark mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?php echo base_url();?>public/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-dark mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-dark mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
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
       <div class="col-md-7">
         <div class="table-responsive" >
           <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-triaje">
             <thead>
               <tr>
                 <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark">Opciones</th>
                 <th  class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark" data-sort="status">Estado</th>
                 <th  class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark" data-sort="name">DNI</th>
                 <th  class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark" data-sort="name">Paciente</th>
                 <th  class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark" data-sort="budget">Doctor</th>
                 <th  class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark" data-sort="budget">Especialidad</th>
                 <th  class="text-uppercase text-white text-xs font-weight-bolder opacity-12 bg-dark" data-sort="budget">Costo</th>
               </tr>
             </thead>
             <tbody>
             <?php foreach($atencion->result() as $triaje) { ?>
               <tr>
                 <td class="">
                   <div class="row">
                       <a 
                       class="icon icon-shape icon-sm me-2 bg-gradient-info shadow mx-3"
                       href="<?php echo base_url(); ?>administracion/pasarconsulta/<?php echo $triaje->codigo_atencion; ?>"
                       title="pasar a consulta"  
                       >
                       <i class="fas fa-check text-white opacity-10"></i>
                     </a>
                     <a 
                     class="icon icon-shape icon-sm bg-gradient-danger shadow text-center"
                     onclick="triajeModalData(<?php echo $triaje->codigo_atencion; ?>)"
                     >
                     <i class="fas fa-laptop-medical text-white opacity-10"></i>
                      </a>
                   </div>
                 </td>
                               
                               <?php if($triaje->estado == "Registrado"){ ?> 
                             <td class="text-xs text-danger mb-0"><?php echo $triaje->estado; ?></td>
                             <?php } else {?>
                               <td class="text-xs text-danger mb-0"><?php echo $triaje->estado; ?></td>
                             <?php } ?>
                             <td class="text-xs text-dark mb-0"><?php echo $triaje->documento; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $triaje->apellido." ".$triaje->paciente; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $triaje->nombre; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $triaje->descripcion; ?></td>
                           <td class="text-xs text-dark mb-0"><?php echo $triaje->costo; ?></td>
                           </tr>
                           <?php } ?>
             </tbody>
           </table>
           <br>
         </div>
        </div>
        <div class="col-md-5">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group input-group-sm">
                    <label>DNI</label>
                    <input type="number" class="form-control" id="dni" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group input-group-sm">
                    <label>Paciente</label>
                    <input type="text" class="form-control" id="paciente" readonly>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group input-group-sm">
                    <label>Edad</label>
                    <input type="text" class="form-control" id="edad" readonly>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group input-group-sm">
              <label>Doctor</label>
                <select class="form-control" id="doctor">
                  <option value="">Seleccione el doctor</option>
                      <?php  foreach($doctor->result() as $doctores) { ?>
                        <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre.' '.$doctores->apellido ." ( ".$doctores->perfil . " )"; ?></option>
                      <?php }?>
                </select>
            </div>
          </div>
            <div class="col-md-6">
              <div class="form-group input-group-sm">
                 <label>Especialidad</label>
                 <select class="form-control" id="especialidad">
                    <option value="">Seleccione la especialidad</option>
                    <?php foreach($especialidad->result() as $especialidades){ ?>
                    <option value="<?php echo $especialidades->codigo_especialidad; ?>"><?php echo $especialidades->descripcion; ?></option>
                    <?php } ?>
                  </select>
              </div>
            </div>
         </div>
         <div class="row">
           <div class="col-md-6">
               <div class="form-group input-group-sm">
                   <label>Presion arterial(mmHg)</label>
                   <input type="text" class="form-control" id="arterial" autocomplete="off">
               </div>
           </div>
           <div class="col-md-6">
               <div class="form-group input-group-sm">
                   <label>Temperatura (C)</label>
                   <input type="number" class="form-control" id="temperatura" autocomplete="off">
               </div>
           </div>
        </div>
        <div class="row">
           <div class="col-md-4">
               <div class="form-group input-group-sm">
                   <label>Frecuencia Respiratoria</label>
                   <input type="number" class="form-control" id="respiratoria" autocomplete="off">
               </div>
           </div>
           <div class="col-md-4">
               <div class="form-group input-group-sm">
                   <label>Frecuencia cardiaca</label>
                   <input type="number" class="form-control" id="cardiaca" autocomplete="off">
               </div>
           </div>
           <div class="col-md-4">
               <div class="form-group input-group-sm">
                   <label>Saturaciòn O2</label>
                   <input type="number" class="form-control" id="saturacion" autocomplete="off">
               </div>
           </div>
        </div>
         <div class="row">
           <div class="col-md-5">
              <div class="form-group input-group-sm">
                 <label>Peso (kg)</label>
                 <input type="" class="form-control" id="peso" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group input-group-sm">
                <label>Talla (cm)</label>
                  <input type="number" class="form-control" id="talla" autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group input-group-sm">
                <label>Imc</label>
                 <input type="number" class="form-control" id="lmc" autocomplete="off">
              </div>
            </div>
            <div class="row">
              <button type="button" class="btn btn-danger" id="pasar-vacio">Pasar vacio</button>
              <button type="button" class="btn btn-primary" id="crearTriaje">Guardar</button>
            </div>
         </div>
        </div>
     </div>
        <br>  
</div>
   <?php require_once("componentes/footer.php"); ?>
    </div>
  </main>
  <?php require_once("componentes/personalizar.php"); ?>

  <!-- LARGE MODAL -->

  <div class="modal fade" id="Agregartriaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hacer evaluacion de  triaje</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         
        </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<?php require_once("componentes/scripts.php"); ?>
  <script>

$("#table-triaje").DataTable({
        "lengthMenu": [10, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_  Atenciones",
          "info": "Mirando _START_ a _END_ de _TOTAL_ Atenciones",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
       });

    $("#talla").on("blur", function () {
        var peso = Math.round($("#peso").val()),
            altura = Math.round($("#talla").val()) / 100;
            indice = (peso / Math.pow(altura,2));
            convertir = Number.parseFloat(indice).toFixed(2);
            $("#lmc").val(convertir);
    });

    function triajeModalData(id) {
       var url1 = baseurl + "administracion/consultartriaje/" + id;

        $.ajax({
            url: url1,
            method: "GET",
            success: function (data) {
              data = JSON.parse(data);
                // $("#Agregartriaje").modal("show");
                $("#dni").val(data.documento);
                $("#paciente").val(data.apellido +"  "+ data.paciente);
                $("#edad").val(data.edad);
                $("#doctor").val(data.medico).prop("selected", true);
                $("#especialidad").val(data.especialidad).prop("selected", true);
            }
        });
      }

      $("#pasar-vacio").on("click", function () {
        var arterial = $("#arterial"),
        temperatura = $("#temperatura"),
        respiratoria = $("#respiratoria"),
        cardiaca = $("#cardiaca"),
        saturacion = $("#saturacion"),
        peso = $("#peso"),
        talla = $("#talla"),
        lmc = $("#lmc");

        arterial.val(0);
        temperatura.val(0);
        respiratoria.val(0);
        cardiaca.val(0);
        saturacion.val(0);
        peso.val(0);
        talla.val(0);
        lmc.val(0);
      });

      $("#crearTriaje").on("click", function () {
         var url2 = baseurl + "administracion/creartriaje",
            dni = $("#dni").val(),
            doctor = $("#doctor").val(),
            especialidad = $("#especialidad").val(),
            presion = $("#arterial").val(),
            temperatura = $("#temperatura").val(),
            respiratoria = $("#respiratoria").val(),
            cardiaca = $("#cardiaca").val(),
            saturacion = $("#saturacion").val(),
            peso = $("#peso").val(),
            talla = $("#talla").val(),
            lmc = $("#lmc").val();

            $.ajax({
              url: url2,
              method: "POST",
              data: { 
                dni: dni,
                doctor: doctor,
                especialidad: especialidad,
                presion: presion,
                temperatura: temperatura,
                respiratoria: respiratoria,
                cardiaca: cardiaca,
                saturacion: saturacion,
                peso: peso,
                talla: talla,
                lmc:lmc
              },
              success: function () {
                $("body").overhang({
                    type: "success",
                    message: "Examen triaje registrado correctamente"
                });
                setTimeout(reloadPage, 3000);
                
              }
            });
      });
      const reloadPage = () => {
    location.reload();
  }
  </script>

  
  
</body>
</html>