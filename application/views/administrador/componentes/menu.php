<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
   <div class="sidenav-header">
      <i class="fas text-primary fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?php echo base_url(); ?>administracion/perfil">
      <img src="<?php echo base_url();?>public/img/theme/logo.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-primary">Clinic</span><span class="font-weight-bold text-default">Soft<small class="text-danger">Peru</small></span>
      </a>
   </div>
   <hr class="horizontal dark mt-0">
   <div class="navbar-collapse  w-auto " style="height: 563px !important;" id="sidenav-collapse-main">
      <ul class="navbar-nav">
         <!-- ROL ADMINISTRADOR TIENE TODOS LOS PRIVILEGIOS --> 
         <?php if($this->session->userdata("rol") == "Administrador"){ ?>
         <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>administracion/inicio">
            <i class="fas text-primary fa-home"></i>
            <span class=" "> Inicio</span>
            </a>
         </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url(); ?>administracion/citas" target="_blank">
              <i class="fa fa-calendar text-primary"></i>
              <span class="sidenav-normal"> Citas</span>
            </a>
          </li>
         <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#atencion">
            <i class="fas text-primary fa-user-nurse"></i>
            <span class="sidenav-normal "> Admisiones <b class="caret"></b></span>
            </a>
            <div class="collapse " id="atencion">
               <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/pacientes">
                     <span class="sidenav-normal">Pacientes</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/atencion">
                     <span class="sidenav-normal"> Admision</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/laboratorio">
                     <span class="sidenav-normal">Laboratorio</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/triaje">
                     <span class="sidenav-normal"> Triaje</span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#procedimientos">
            <i class="fas text-primary fa-flask"></i>
            <span class="sidenav-normal "> Procedimientos <b class="caret"></b></span>
            </a>
            <div class="collapse " id="procedimientos">
               <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/colposcopia">
                     <span class="sidenav-normal"> Colposcopia</span>
                     </a>
                  </li>
                  
               </ul>
            </div>
         </li>
         <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#ecografias">
            <i class="fas text-primary fa-prescription"></i>
            <span class="sidenav-normal "> Ecografias <b class="caret"></b></span>
            </a>
            <div class="collapse " id="ecografias">
               <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaMamaview">
                     <span class="sidenav-normal"> Ecografia Mama</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaGeneticaview">
                     <span class="sidenav-normal"> Ecografia Genetica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaMorfologicaview">
                     <span class="sidenav-normal"> Ecografia Morfologica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaTrasvaginalview">
                     <span class="sidenav-normal"> Ecografia Trasvaginal</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaPelvicaview">
                     <span class="sidenav-normal"> Ecografia Pelvica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaObstetricaview">
                     <span class="sidenav-normal"> Ecografia Obstetrica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaAbdominalview">
                     <span class="sidenav-normal"> Ecografia Abdominal</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaProstaticaview">
                     <span class="sidenav-normal"> Ecografia Prostatica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaRenalview">
                     <span class="sidenav-normal"> Ecografia Renal</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaTiroidesview">
                     <span class="sidenav-normal"> Ecografia Tiroides</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaHisteronosografiaview">
                     <span class="sidenav-normal"> Ecografia Histeronosografia</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaArterialview">
                     <span class="sidenav-normal"> Ecografia Arterial</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaVenosaview">
                     <span class="sidenav-normal"> Ecografia Venosa</span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         
         <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#inventarios">
            <i class="fa fa-shopping-cart text-primary"></i>
            <span class="sidenav-normal"> Inventarios <b class="caret"></b></span>
            </a>
            <div class="collapse " id="inventarios">
               <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/productos">
                     <span class="sidenav-normal"> Productos</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/inventarios">
                     <span class="sidenav-normal"> Kardex</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/movimientos">
                     <span class="sidenav-normal">Movimientos</span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#usuarios">
            <i class="fas text-primary fa-users"></i>
            <span class="sidenav-normal"> Usuarios <b class="caret"></b></span>
            </a>
            <div class="collapse " id="usuarios">
               <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/doctores">
                     <span class="sidenav-normal"> Doctores</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/recursoshumanos">
                     <span class="sidenav-normal"> Administrativos</span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#contabilidad">
            <i class="fas text-primary fa-money-bill"></i>
            <span class="sidenav-normal"> Contabilidad <b class="caret"></b></span>
            </a>
            <div class="collapse " id="contabilidad">
               <ul class="nav nav-sm flex-column">
                  <!-- <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/facturaelectronica">
                     <span class="sidenav-normal"> Factura electronica</span>
                     </a>
                  </li> -->
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/financiero">
                     <span class="sidenav-normal">Pagos</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/gastos">
                     <span class="sidenav-normal">Gastos</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/precioslaboratorio">
                     <span class="sidenav-normal">Precio laboratorio</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/precios">
                     <span class="sidenav-normal">Precio especialidades</span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <!-- SEGURIDAD EN APLICACION DE MEDICAMENTO INTELIGENTE -->
         <!-- <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#resoluciones">
            <i class="fas text-primary fa-pills"></i>
            <span class="sidenav-normal">SAMI<b class="caret"></b></span> 
            </a>
            <div class="collapse " id="resoluciones">
               <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>sami/camas" target="_blank">
                     <span class="sidenav-normal">Camas</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>sami/acostarpaciente" target="_blank">
                     <span class="sidenav-normal">Acostar Pacientes</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>sami/acostarpaciente" target="_blank">
                     <span class="sidenav-normal">Manillas QR</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>sami/solicitudfarmacia" target="_blank">
                     <span class="sidenav-normal">Solicitud Farmacia</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>sami/despachofarmacia" target="_blank">
                     <span class="sidenav-normal">Despacho Farmacia</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>sami/aplicacionmedicamentos" target="_blank">
                     <span class="sidenav-normal">Aplicaciòn Medicamento</span>
                     </a>
                  </li>
               </ul>
            </div>
         </li> -->
         <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>administracion/reportes">
            <i class="fas text-primary fa-chart-pie"></i>
            <span> Reportes</span>
            </a>
         </li>
         
         <li class="nav-item">
            <a class="nav-link " href="https://boticasmm.saludmadreymujer.com" target="_blank">
            <i class="fas text-primary fa-laptop-medical"></i>
            <span class="">Farmacia</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fas text-primary fa-info-circle"></i>
            <span> Version 3.0.0.0</span>
            </a>
         </li>
      </ul>
   </div>
   <div class="sidenav-footer ">
      <div class="card card-plain shadow-none" id="sidenavCard">
         <div class="card-body  p-3 w-100 pt-0">
            <div class="docs-info">
               <ul class="navbar-nav">
                  <!-- MENU DOCTORES -->
                  <?php } else if ($this->session->userdata("rol") == "Doctor"){  ?>
                  <li class="nav-item">
                     <a class="nav-link" target="blank" href="<?php echo base_url(); ?>administracion/calendariodoctor">
                     <i class="fas text-primary fa-home"></i>
                     <span class=" "> Inicio</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/atencionmedicos">
                     <i class="fas text-primary fa-user-md"></i>
                     <span class=" "> Atención</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link"  href="<?php echo base_url(); ?>administracion/pacientes">
                     <i class="fas text-primary fa-users"></i>
                     <span class=" "> Pacientes</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link"  href="<?php echo base_url(); ?>administracion/colposcopia">
                     <i class="fas text-primary fa-microscope"></i>
                     <span class=" "> Colposcopia</span>
                     </a>
                  </li>
                  <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#ecografias">
            <i class="fas text-primary fa-prescription"></i>
            <span class="sidenav-normal "> Ecografias <b class="caret"></b></span>
            </a>
            <div class="collapse " id="ecografias">
               <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaMamaview">
                     <span class="sidenav-normal"> Ecografia Mama</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaGeneticaview">
                     <span class="sidenav-normal"> Ecografia Genetica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaMorfologicaview">
                     <span class="sidenav-normal"> Ecografia Morfologica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaTrasvaginalview">
                     <span class="sidenav-normal"> Ecografia Trasvaginal</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaPelvicaview">
                     <span class="sidenav-normal"> Ecografia Pelvica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaObstetricaview">
                     <span class="sidenav-normal"> Ecografia Obstetrica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaAbdominalview">
                     <span class="sidenav-normal"> Ecografia Abdominal</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaProstaticaview">
                     <span class="sidenav-normal"> Ecografia Prostatica</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaRenalview">
                     <span class="sidenav-normal"> Ecografia Renal</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaTiroidesview">
                     <span class="sidenav-normal"> Ecografia Tiroides</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaHisteronosografiaview">
                     <span class="sidenav-normal"> Ecografia Histeronosografia</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaArterialview">
                     <span class="sidenav-normal"> Ecografia Arterial</span>
                     </a>
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/ecografiaVenosaview">
                     <span class="sidenav-normal"> Ecografia Venosa</span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
                  <!-- MENU ENFERMERA -->
                  <?php } else if($this->session->userdata("rol") == "Enfermera") { ?>
                  <li class="nav-item ">
                     <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#atencion">
                     <i class="fas text-primary fa-user-nurse"></i>
                     <span class="sidenav-normal "> Atención <b class="caret"></b></span>
                     </a>
                     <div class="collapse " id="atencion">
                        <ul class="nav nav-sm flex-column">
                           <li class="nav-item">
                              <a class="nav-link" href="<?php echo base_url(); ?>administracion/atencion">
                              <span class="sidenav-normal"> Recepción</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " href="<?php echo base_url(); ?>administracion/triaje">
                              <span class="sidenav-normal"> Triaje</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " href="<?php echo base_url(); ?>administracion/pacientes">
                              <span class="sidenav-normal">Pacientes</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " href="<?php echo base_url(); ?>administracion/laboratorio">
                              <span class="sidenav-normal">Laboratorio</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " href="<?php echo base_url(); ?>administracion/financiero">
                              <span class="sidenav-normal">Pagos</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <li class="nav-item">
                     <a class="nav-link"  href="<?php echo base_url(); ?>administracion/citas">
                     <i class="fas text-primary fa-stethoscope"></i>
                     <span class=" "> Citas</span>
                     </a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#inventarios">
                     <i class="fa fa-shopping-cart"></i>
                     <span class="sidenav-normal"> Inventarios <b class="caret"></b></span>
                     </a>
                     <div class="collapse " id="inventarios">
                        <ul class="nav nav-sm flex-column">
                           <li class="nav-item">
                              <a class="nav-link " href="<?php echo base_url(); ?>administracion/productos">
                              <span class="sidenav-normal"> Productos</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " href="<?php echo base_url(); ?>administracion/inventarios">
                              <span class="sidenav-normal"> Kardex</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " href="<?php echo base_url(); ?>administracion/movimientos">
                              <span class="sidenav-normal">Movimientos</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  
                  <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url(); ?>administracion/gastos">
                     <i class="fas text-primary fa-money-bill"></i>
                     <span class="">Gastos</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="https://boticasmm.saludmadreymujer.com" target="_blank">
                     <i class="fas text-primary fa-money-bill"></i>
                     <span class="">Botica</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link"  href="<?php echo base_url(); ?>administracion/colposcopia">
                     <i class="fas text-primary fa-microscope"></i>
                     <span class=" "> Colposcopia</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link"  href="<?php echo base_url(); ?>administracion/doctores">
                     <i class="fas text-primary fa-user-md"></i>
                     <span class=" "> Medicos</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link"  href="<?php echo base_url(); ?>administracion/pacientes">
                     <i class="fas text-primary fa-download"></i>
                     <span class=" "> Cargar Documentos</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/reportes">
                     <i class="fas text-primary fa-chart-pie"></i>
                     <span> Reportes</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">
                     <i class="fas text-primary fa-info-circle"></i>
                     <span> Version 2.0.0.0</span>
                     </a>
                  </li>
                  <!-- MENU LABORATORIO -->
                  <?php } else if($this->session->userdata("rol") == "Laboratorista") { ?>
                  <li class="nav-item">
                     <a class="nav-link"  href="<?php echo base_url(); ?>administracion/pacientes">
                     <i class="fas text-primary fa-download"></i>
                     <span class=" "> Cargar documentos</span>
                     </a>
                  </li>
                  <!-- MENU PATOLOGIA -->
                  <?php } else if($this->session->userdata("rol") == "Patologo"){ ?>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>administracion/pacientes">
                     <i class="fas text-primary fa-file-pdf"></i>
                     <span> Cargar documentos</span>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</aside>