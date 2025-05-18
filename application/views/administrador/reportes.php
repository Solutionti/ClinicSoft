<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Administracion / Reportes</title>
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
                     <li class="breadcrumb-item text-sm text-white active" aria-current="page">Reportes</li>
                  </ol>
                  <h6 class="font-weight-bolder text-white mb-0">Reportes</h6>
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
                                       <p class="text-xs text-secondary mb-0">
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
                                       <p class="text-xs text-secondary mb-0">
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
                                       <p class="text-xs text-secondary mb-0">
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
         <div class="row">
      <div class="card">
        <div class="row mt-4">
        <div class="col-lg-8">
          <div class="row">
          <div class="col-xl-6 mb-xl-0 mb-4">
          <div class="card bg-transparent shadow-xl">
          <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 p-3">
          <i class="fas fa-wifi text-white p-2"></i>
          <h5 class="text-white mt-4 mb-5 pb-2">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;0003</h5>
          <div class="d-flex">
          <div class="d-flex">
          <div class="me-4">
          <p class="text-white text-sm opacity-8 mb-0">Titular de la tarjeta</p>
          <h6 class="text-white mb-0">Mi Salud Clinica</h6>
          </div>
          <div>
          <p class="text-white text-sm opacity-8 mb-0">Expiración</p>
          <h6 class="text-white mb-0">01/30</h6>
          </div>
          </div>
          <div class="ms-auto">
            <img class="img-fluid" src="<?php echo base_url('public/img/theme/logo.png'); ?>" alt="Logo de la Clínica" style="max-height: 40px; width: auto; filter: brightness(0) invert(1);">
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          <div class="col-xl-6">
          <div class="row">
          <div class="col-md-6">
          <div class="card">
          <div class="card-header mx-4 p-3 text-center">
          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
            <i class="fas fa-money-bill-wave opacity-10"></i>
          </div>
          </div>
          <div class="card-body pt-0 p-3 text-center">
          <h6 class="text-center mb-0">Efectivo</h6>
          <!-- <span class="text-xs">Belong Interactive</span> -->
          <hr class="horizontal dark my-3">
          <h5 class="mb-0">S/.0</h5>
          </div>
          </div>
          </div>
          <div class="col-md-6 mt-md-0 mt-4">
          <div class="card">
          <div class="card-header mx-4 p-3 text-center">
          <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
            <i class="fas fa-credit-card"></i>
          </div>
          </div>
          <div class="card-body pt-0 p-3 text-center">
          <h6 class="text-center mb-0">Tarjeta</h6>
          <!-- <span class="text-xs">Freelance Payment</span> -->
          <hr class="horizontal dark my-3">
          <h5 class="mb-0">S/.0</h5>
          </div>
          </div>
          </div>
          </div>
          </div>
          <div class="col-md-12 mb-lg-0 mb-4">
          <div class="card mt-4">
          <div class="card-header pb-0 p-3">
          <div class="row">
          <div class="col-6 d-flex align-items-center">
          <h6 class="mb-0">Reportes</h6>
          </div>
          <div class="col-6 text-end">
          <button
            class="btn bg-gradient-dark mb-0"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            <i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar Filtros
          </button>
          </div>
          </div>
          </div>
          <div class="card-body p-3">
          <div class="row">
          <div class="col-md-6 mb-md-0 mb-4">
          <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
          <i class="fas fa-user-md fa-2x me-3 text-primary"></i>
          <h6 class="mb-0">Atenciones Doctores</h6>
            <div class="ms-auto d-flex align-items-center">
              <button 
                onclick="reporteDiario()"
                class="btn btn-link p-1 me-2 text-danger"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Generar PDF"
              >
                <i class="fas fa-file-pdf fa-lg"></i>
              </button>
              <button
                onclick="reporteComisionExcel()"
                class="btn btn-link p-1 text-success"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Generar Excel"
              >
                <i class="fas fa-file-excel fa-lg"></i>
              </button>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
          <i class="fas fa-file-invoice-dollar fa-2x me-3 text-success"></i>
          <h6 class="mb-0">Gastos</h6>
          <div class="ms-auto d-flex align-items-center">
            <button 
              onclick="reporteGastos()"
              class="btn btn-link p-1 text-danger"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Generar PDF"
            >
              <i class="fas fa-file-pdf fa-lg"></i>
            </button>
          </div>
          </div>
          </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
              <i class="fas fa-cash-register fa-2x me-3 text-warning"></i>
              <h6 class="mb-0">Cierre de Caja (Ing - Gast)</h6>
              <div class="ms-auto d-flex align-items-center">
                <button 
                  class="btn btn-link p-1 text-success"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  title="Generar Excel"
                  onclick="Suubtmit()"
                >
                  <i class="fas fa-file-excel fa-lg"></i>
                </button>
              </div>
              </div>
              </div>
              <div class="col-md-6">
                <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                  <i class="fas fa-flask fa-2x me-3 text-info"></i>
                  <h6 class="mb-0">Laboratorio</h6>
                  <div class="ms-auto d-flex align-items-center">
                    <button 
                      onclick="reporteLaboratorio()"
                      class="btn btn-link p-1 text-danger"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      title="Generar PDF"
                    >
                      <i class="fas fa-file-pdf fa-lg"></i>
                    </button>
                  </div>
                </div>
              </div>
          </div>
          <div class="row mt-3">
          <div class="col-md-2"></div>
          <div class="col-md-7">
            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
              <i class="fas fa-calendar-day text-primary me-3" style="font-size: 1.5rem;"></i>
              <h6 class="mb-0">Reporte de citas listado dia a dia</h6>
              <i 
                (click)="generarPdfLaboratorio()" 
                class="fas fa-file-pdf ms-auto text-danger cursor-pointer" 
                data-bs-toggle="tooltip" 
                data-bs-placement="top" 
                title="Generar PDF">
              </i>
            </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
        </div>
        <!-- Sección de Facturación Mensual -->
        <div class="col-lg-4">
          <div class="card h-100">
            <!-- Encabezado -->
            <div class="card-header pb-0 p-3 bg-transparent">
              <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Facturación Mensual</h6>
                <button class="btn btn-sm btn-outline-primary mb-0">
                  <i class="fas fa-sync-alt me-1"></i> Actualizar
                </button>
              </div>
              <p class="text-sm text-muted mb-0 mt-2">Resumen de facturación por período</p>
            </div>
            
            <!-- Lista de Períodos -->
            <div class="card-body p-3">
              <!-- Año 2025 -->
              <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="text-uppercase text-xs font-weight-bolder text-secondary mb-0">2025</h6>
                  <button id="toggleMonths" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-chevron-down"></i> Ver más
                  </button>
                </div>
                <!-- Contenedor de meses ocultos -->
                <div id="hiddenMonths" style="display: none;">
                  <!-- Los meses 4-6 se cargarán aquí -->
                </div>
                
                <!-- Período 1: Ene-Feb -->
                <div class="card card-body border-0 shadow-sm mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape bg-gradient-primary text-white rounded-circle me-3 text-center" style="width: 40px; height: 40px; line-height: 40px;">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 text-sm">Enero - Febrero</h6>
                        <p class="text-xs text-muted mb-0">#EF-20250102</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="badge bg-light text-dark me-2">S/ 0.00</span>
                      <button class="btn btn-link text-danger p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar PDF">
                        <i class="fas fa-file-pdf"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Período 2: Mar-Abr -->
                <div class="card card-body border-0 shadow-sm mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape bg-gradient-success text-white rounded-circle me-3 text-center" style="width: 40px; height: 40px; line-height: 40px;">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 text-sm">Marzo - Abril</h6>
                        <p class="text-xs text-muted mb-0">#MA-20250304</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="badge bg-light text-dark me-2">S/ 0.00</span>
                      <button class="btn btn-link text-danger p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar PDF">
                        <i class="fas fa-file-pdf"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Período 3: May-Jun -->
                <div class="card card-body border-0 shadow-sm mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle me-3 text-center" style="width: 40px; height: 40px; line-height: 40px;">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 text-sm">Mayo - Junio</h6>
                        <p class="text-xs text-muted mb-0">#MJ-20250506</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="badge bg-light text-dark me-2">S/ 0.00</span>
                      <button class="btn btn-link text-danger p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar PDF">
                        <i class="fas fa-file-pdf"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Período 4: Jul-Ago (Oculto inicialmente) -->
                <div class="card card-body border-0 shadow-sm mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape bg-gradient-warning text-white rounded-circle me-3 text-center" style="width: 40px; height: 40px; line-height: 40px;">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 text-sm">Julio - Agosto</h6>
                        <p class="text-xs text-muted mb-0">#JA-20250708</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="badge bg-light text-dark me-2">S/ 0.00</span>
                      <button class="btn btn-link text-danger p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar PDF">
                        <i class="fas fa-file-pdf"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Período 5: Sep-Oct (Oculto inicialmente) -->
                <div class="card card-body border-0 shadow-sm mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape bg-gradient-danger text-white rounded-circle me-3 text-center" style="width: 40px; height: 40px; line-height: 40px;">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 text-sm">Septiembre - Octubre</h6>
                        <p class="text-xs text-muted mb-0">#SO-20250910</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="badge bg-light text-dark me-2">S/ 0.00</span>
                      <button class="btn btn-link text-danger p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar PDF">
                        <i class="fas fa-file-pdf"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Período 6: Nov-Dic (Oculto inicialmente) -->
                <div class="card card-body border-0 shadow-sm">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape bg-gradient-dark text-white rounded-circle me-3 text-center" style="width: 40px; height: 40px; line-height: 40px;">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 text-sm">Noviembre - Diciembre</h6>
                        <p class="text-xs text-muted mb-0">#ND-20251112</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="badge bg-light text-dark me-2">S/ 0.00</span>
                      <button class="btn btn-link text-danger p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Descargar PDF">
                        <i class="fas fa-file-pdf"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Script para manejar el acordeón -->
            <script>
            document.addEventListener('DOMContentLoaded', function() {
              // Mover los meses 4-6 al contenedor oculto
              const months = document.querySelectorAll('.card.mb-3');
              const hiddenMonths = document.getElementById('hiddenMonths');
              const toggleButton = document.getElementById('toggleMonths');
              
              // Mover los meses 4-6 al contenedor oculto
              for (let i = 3; i < months.length; i++) {
                hiddenMonths.appendChild(months[i]);
              }
              
              // Manejar el clic en el botón
              toggleButton.addEventListener('click', function() {
                const isHidden = hiddenMonths.style.display === 'none';
                const icon = this.querySelector('i');
                
                if (isHidden) {
                  hiddenMonths.style.display = 'block';
                  icon.className = 'fas fa-chevron-up';
                  this.innerHTML = '<i class=\'fas fa-chevron-up\'></i> Ver menos';
                } else {
                  hiddenMonths.style.display = 'none';
                  icon.className = 'fas fa-chevron-down';
                  this.innerHTML = '<i class=\'fas fa-chevron-down\'></i> Ver más';
                }
              });
            });
            </script>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- <div class="row mt-4">
      <div class="col-md-7">
        
      </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
          <div class="card-header pb-0 px-3">
          <div class="row">
          <div class="col-md-6">
          <h6 class="mb-0">Ultimas Transacciones</h6>
          </div>
          <div class="col-md-6 d-flex justify-content-end align-items-center">
          <i class="fas fa-calendar-alt me-2"></i>
          <small>06-02-2025</small>
          </div>
          </div>
          </div>
          <div class="card-body pt-4 p-3">
          <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Hoy</h6>
          <ul class="list-group">
          <li
            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg"
            *ngFor="let transacciones of transaccion"
          >
          <div class="d-flex align-items-center">
          <button
            class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"
            *ngIf="transacciones.tipoingreso == 'Ingreso'"
            >
            <i class="fas fa-arrow-up"></i>
          </button>
          <button
            class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"
            *ngIf="transacciones.tipoingreso == 'Gasto'"
          >
          <i
            class="fas fa-arrow-down"
          >
          </i>
          </button>
          <div class="d-flex flex-column">
          <h6 class="mb-1 text-dark text-sm">Ingreso de admision</h6>
          <span class="text-xs">26-12-1993 a las 7:50</span>
          </div>
          </div>
          <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
            $10.000 
          </div>
          </li>
          </ul>
          </div>
          </div>
          </div>
        </div>
      </div>   
         </div> -->

         <!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Filtro de busqueda</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form [formGroup]="reportesForm">
        <div class="flex align-items-center gap-3 mb-3">
          <label>Doctores</label>
          <select
            class="form-control form-control-sm"
            id="doctor_reporte_global"
          >
          <option value="">Todos los Doctores</option>
          <?php foreach($doctor->result() as $doctores){ ?>
            <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre.' '.$doctores->apellido; ?></option>
          <?php } ?>
          </select>
        </div>

        <div class="flex align-items-center gap-3 mb-3">
          <label>Fecha Inicial</label>
          <input
            type="date"
            class="form-control form-control-sm"
            value="<?php echo date("Y-m-d"); ?>"
            id="fechainicial_reporte_global"
          >
        </div>

        <div class="flex align-items-center gap-3 mb-5">
          <label>Fecha Final</label>
          <input
            type="date"
            class="form-control form-control-sm"
            value="<?php echo date("Y-m-d"); ?>"
            id="fechafinal_reporte_global"
          >
        </div>
       </form>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-primary"
          data-bs-dismiss="modal"
        >
          Aceptar
        </button>
      </div>
    </div>
  </div>
</div>
            <?php require_once("componentes/footer.php"); ?>
      </main>
      <?php require_once("componentes/personalizar.php"); ?>
      <?php require_once("componentes/scripts.php"); ?>
      <script src="<?php echo base_url(); ?>public/js/scripts/reportes.js"></script>
   </body>
</html>