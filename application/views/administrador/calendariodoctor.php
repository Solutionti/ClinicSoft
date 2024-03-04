<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion / Pacientes</title>
    <?php require_once("componentes/head.php"); ?>
</head>
<body>
<div class="container-fluid">
  <div class="row mt-4">
  <div class="col-md-12">
    <h5 >Citas Programadas - Pendientes y Confirmadas</h5>
   </div>
</div>
    <div class="row">
      <div class="col-md-9">
        <div id='calendario'></div>
        <hr> 
        <div class="table-responsive" >
  <table class="table align-items-center table-borderless mb-0" id="table-citas">
    <thead>
      <tr>
         <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Estado</th>
         <th class="text-dark text-xs font-weight-bolder opacity-12">Para <i class="fa fa-clock"></i> </th>
         <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Fecha</th>
         <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Documento - Nombre</th>
         <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Telefono</th>
         <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Medico</th>
         <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-12">Observacion</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($cita_doc->result() as $citas) { ?>
        <tr>
         <?php if($citas->estado == "Confirmado"){ ?>
         <td class="text-xs text-dark mb-0 text-success"><?php echo  $citas->estado; ?></td>
         <?php } else if ($citas->estado == "Pendiente") { ?>
         <td class="text-xs text-dark mb-0 text-primary"><?php echo  $citas->estado; ?></td>
         <?php } else if ($citas->estado == "Cancelado"){ ?>
         <td class="text-xs text-dark mb-0 text-danger"><?php echo  $citas->estado; ?></td>
         <?php } else if ($citas->estado == "Tratado"){ ?>
         <td class="text-xs text-dark mb-0 text-info"><?php echo  $citas->estado; ?></td>
         <?php } else { ?>
         <td class="text-xs text-dark mb-0 text-info"><?php echo  "S/C;" ?></td>
         <?php } ?>
         <td class="text-xs text-dark mb-0">
         <?php 
           $firstDate  = strtotime(date("Y-m-d"));
           $secondDate = strtotime($citas->fecha);
           $intvl = (($secondDate-$firstDate)/3600)/24;
            if($intvl==0){
              echo " - <strong>Hoy</strong> a las <strong>".$citas->hora."</strong>";
            }else if($intvl==1){
              echo " - <strong>Mañana</strong> a las <strong>".$citas->hora."</strong>";
            }else if($intvl>1){
              echo " - En ".$intvl." días a las <strong>".$citas->hora."</strong>";
            }else if($intvl==(-1)){
              echo " - Ayer a las <strong>".$citas->hora."</strong>";
            }else if($intvl<(-1)){
              echo " - Hace ".($intvl*-1)." días a las <strong>".$citas->hora."</strong>";
            }
         ?>
         </td>
         <td class="text-xs text-dark mb-0"><?php echo  $citas->date_cita; ?></td>
         <td class="text-xs text-dark mb-0"><?php echo  "<strong>".$citas->documento."</strong>"." - ".$citas->nombre; ?></td>
         <td class="text-xs text-dark mb-0"><?php echo  "<strong>".$citas->telefono."</strong>"; ?></td>
         <td class="text-xs text-dark mb-0"><?php echo  $citas->doctor; ?></td>
         <td class="text-xs text-dark mb-0"><?php echo  $citas->comentarios; ?></td>
      </tr>
         <?php } ?>
     </tbody>
   </table>
   <br>
   </div>
      </div>      
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" width="120px;" class="img-fluid mt-4 rounded-circle">
          <h5>Doctor@</h5>
          <h4 class="text-uppercase"><?php echo $this->session->userdata("nombre")." ".$this->session->userdata("apellido") ?></h4>
        </div>
        <br>
      </div>          
    </div>
  </div> 

<?php require("componentes/scripts.php"); ?>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendario');
      let url1 = baseurl + "administracion/citasmedico";
      var calendar = new FullCalendar.Calendar(calendarEl, {
        
        slotLabelFormat:{
             hour: '2-digit',
             minute: '2-digit',
             hour12: true
        },
        eventSources: {
            url: url1,
            method: "GET",
            color: "green"
          },
         eventTimeFormat: {
               hour: '2-digit',
               minute: '2-digit',
               hour12: true
              },
        
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap',
        locale: 'es',
        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek',
       },
       buttonText: {
            today:'Hoy',
             month:'Mes',
             week:'Semanal',
             day: 'Dia',
             list: 'Lista'
        },
        allDayText: "Todo el dia",
        height: 580,
       });
      calendar.render();
     });
  </script>
</body>
</html>