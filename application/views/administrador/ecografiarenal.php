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
        <div class="row mb-3">
                <div class="col-md-12">
                    <label for="motivo" class="form-label">Motivo del Examen:</label>
                    <input type="text" class="form-control form-control-sm" id="motivo" formControlName="motivo">
                </div>
            
            <h5 class="mt-4">Hallazgos:</h5>
            <h6 class="mt-3">Riñon derecho:</h6>
        
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="morfologia_movilidad_derecho" class="form-label">Morfologia y movilidad:</label>
                    <select class="form-select form-select-sm" id="morfologia_movilidad_derecho" formControlName="morfologia_movilidad_derecho">
                        <option>Normal</option>
                        <option>Anormal</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="ecogenicidad_derecho" class="form-label">Ecogenicidad:</label>
                    <select class="form-select form-select-sm" id="ecogenicidad_derecho" formControlName="ecogenicidad_derecho">
                        <option>Normal</option>
                        <option>Aumentada</option>
                        <option>Disminuida</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="medidas_longitud_derecho" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medidas</label>
                    <input type="text" class="form-control form-control-sm" id="medidas_longitud_derecho" formControlName="medidas_longitud_derecho" value="     mm de longitud">
                    </div>
                <div class="col-md-3">
                    <label for="medidas_parenquima_derecho" class="form-label">:</label>
                    <input type="text" class="form-control form-control-sm" id="medidas_parenquima_derecho" formControlName="medidas_longitud_derecho" value="     mm de parénquima">
                    </div>
                </div>
                
                <div class="row mb-3">
                <!-- Imágenes expansivas -->
                <div class="col-md-3">
                    <label for="imagenes_expansivas_solidas_derecho" class="form-label">Imágenes expansivas: Sólidas</label>
                    <select class="form-select form-select-sm" id="imagenes_expansivas_solidas_derecho" formControlName="imagenes_expansivas_solidas_derecho" >
                        <option value="No">No</option>
                        <option value="Sí">Sí</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="imagenes_expansivas_quisticas_derecho" class="form-label">Quísticas</label>
                    <select class="form-select form-select-sm" id="imagenes_expansivas_quisticas_derecho" formControlName="imagenes_expansivas_quisticas_derecho" >
                        <option value="No">No</option>
                        <option value="Sí">Sí</option>
                    </select>
                      </div>
                      <div class="col-md-3">
                        <label for="hidronefrosis_derecho" class="form-label">Hidronefrosis:</label>
                        <select class="form-select form-select-sm" id="hidronefrosis_derecho" formControlName="hidronefrosis_derecho" (change)="onhidronefrosisChange($event)">
                          <option value="No">No</option>
                          <option value="Sí">Sí</option>
                      </select>
                    </div>
                    <div class="col-md-3" *ngIf="ishidronefrosisSi">
                      <label for="medidas_hidronefrosis" class="form-label">Medidas:</label>
                      <input type="text" class="form-control form-control-sm" id="medidas_hidronefrosis" formControlName="medidas_hidronefrosis" value="     mm">
                  </div>
                </div>
               
                
              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="micro_litiasis_derecho" class="form-label">Micro litiasis:</label>
                  <select class="form-select form-select-sm" id="micro_litiasis_derecho" formControlName="micro_litiasis_derecho" (change)="onmicro_litiasiChange($event)">
                    <option value="No">No</option>
                    <option value="Sí">Sí</option>
                </select>
              </div>
              <div class="col-md-3" *ngIf="ismicro_litiasiSi">
                <label for="medidas_hidronefrosis" class="form-label">Medidas:</label>
                <input type="text" class="form-control form-control-sm" id="medidas_hidronefrosis" formControlName="medidas_hidronefrosis" value="     mm">
            </div>
                
                <div class="col-md-3">
                  <label for="calculos_derecho" class="form-label">Calculos:</label>
                  <select class="form-select form-select-sm" id="calculos_derecho" formControlName="calculos_derecho" (change)="oncalculosChange($event)">
                    <option value="No">No</option>
                    <option value="Sí">Sí</option>
                </select>
                </div>
                <div class="col-md-3" *ngIf="iscalculosSi">
                  <label for="medidas_calculos_derecho" class="form-label">Medidas:</label>
                  <input type="text" class="form-control form-control-sm" id="medidas_calculos_derecho" formControlName="medidas_calculos_derecho" value="     mm"> 
              </div>
          </div>
            <div class="mb-3">
                <label for="descripcion_otros_derecho" class="form-label">Descripción/Otros:</label>
                <textarea class="form-control form-control-sm" id="descripcion_otros_derecho" formControlName="descripcion_otros_derecho" rows="3"></textarea>
            </div>
            <!-- RIÑON IZQ -->
            <h6 class="mt-4">Riñón Izquierdo:</h6>
            <div class="row mb-3">
              <div class="col-md-3">
                  <label for="morfologia_movilidad_izquierdo" class="form-label">Morfologia y movilidad:</label>
                  <select class="form-select form-select-sm" id="morfologia_movilidad_izquierdo" formControlName="morfologia_movilidad_izquierdo">
                      <option>Normal</option>
                      <option>Anormal</option>
                  </select>
              </div>
              <div class="col-md-3">
                  <label for="ecogenicidad_izquierdo" class="form-label">Ecogenicidad:</label>
                  <select class="form-select form-select-sm" id="ecogenicidad_izquierdo" formControlName="ecogenicidad_izquierdo">
                      <option>Normal</option>
                      <option>Aumentada</option>
                      <option>Disminuida</option>
                  </select>
              </div>
              <div class="col-md-3">
                  <label for="medidas_longitud_izquierdo" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medidas</label>
                  <input type="text" class="form-control form-control-sm" id="medidas_longitud_izquierdo" formControlName="medidas_longitud_izquierdo" value="     mm de longitud">
                  </div>
              <div class="col-md-3">
                  <label for="medidas_parenquima_izquierdo" class="form-label">:</label>
                  <input type="text" class="form-control form-control-sm" id="medidas_parenquima_izquierdo" formControlName="medidas_longitud_izquierdo" value="     mm de parénquima">
                  </div>
              </div>
              
              <div class="row mb-3">
              
              <div class="col-md-3">
                  <label for="imagenes_expansivas_solidas_izquierdo" class="form-label">Imágenes expansivas: Sólidas</label>
                  <select class="form-select form-select-sm" id="imagenes_expansivas_solidas_izquierdo" formControlName="imagenes_expansivas_solidas_izquierdo" >
                      <option value="No">No</option>
                      <option value="Sí">Sí</option>
                  </select>
              </div>
              <div class="col-md-3">
                  <label for="imagenes_expansivas_quisticas_izquierdo" class="form-label">Quísticas</label>
                  <select class="form-select form-select-sm" id="imagenes_expansivas_quisticas_izquierdo" formControlName="imagenes_expansivas_quisticas_izquierdo" >
                      <option value="No">No</option>
                      <option value="Sí">Sí</option>
                  </select>
                    </div>
                    <div class="col-md-3">
                      <label for="hidronefrosis_izquierdo" class="form-label">Hidronefrosis:</label>
                      <select class="form-select form-select-sm" id="hidronefrosis_izquierdo" formControlName="hidronefrosis_izquierdo" (change)="onhidronefrosisChange($event)">
                        <option value="No">No</option>
                        <option value="Sí">Sí</option>
                    </select>
                  </div>
                  <div class="col-md-3" *ngIf="ishidronefrosisSi">
                    <label for="medidas_hidronefrosis" class="form-label">Medidas:</label>
                    <input type="text" class="form-control form-control-sm" id="medidas_hidronefrosis" formControlName="medidas_hidronefrosis" value="     mm">
                </div>
              </div>
            <div class="row mb-3">
              <div class="col-md-3">
                <label for="micro_litiasis_izquierdo" class="form-label">Micro litiasis:</label>
                <select class="form-select form-select-sm" id="micro_litiasis_izquierdo" formControlName="micro_litiasis_izquierdo" (change)="onmicro_litiasiChange($event)">
                  <option value="No">No</option>
                  <option value="Sí">Sí</option>
              </select>
            </div>
            <div class="col-md-3" *ngIf="ismicro_litiasiSi">
              <label for="medidas_hidronefrosis" class="form-label">Medidas:</label>
              <input type="text" class="form-control form-control-sm" id="medidas_hidronefrosis" formControlName="medidas_hidronefrosis" value="     mm">
          </div>
              
              <div class="col-md-3">
                <label for="calculos_izquierdo" class="form-label">Calculos:</label>
                <select class="form-select form-select-sm" id="calculos_izquierdo" formControlName="calculos_izquierdo" (change)="oncalculosChange($event)">
                  <option value="No">No</option>
                  <option value="Sí">Sí</option>
              </select>
              </div>
              <div class="col-md-3" *ngIf="iscalculosSi">
                <label for="medidas_calculos_izquierdo" class="form-label">Medidas:</label>
                <input type="text" class="form-control form-control-sm" id="medidas_calculos_izquierdo" formControlName="medidas_calculos_izquierdo" value="     mm"> 
            </div>
        </div>
        <div class="mb-3">
          <label for="descripcion_otros_izquierdo" class="form-label">Descripción/Otros:</label>
          <textarea class="form-control form-control-sm" id="descripcion_otros_izquierdo" formControlName="descripcion_otros_izquierdo" rows="3"></textarea>
      </div>

      <h6 class="mt-4">Vejiga:</h6>
      <div class="row mb-3">
        <div class="col-md-3">
            <label for="repelcion_vejiga" class="form-label">Repelcion:</label>
            <select class="form-select form-select-sm" id="repelcion_vejiga" formControlName="repelcion_vejiga">
              <option>Normal</option>
              <option>Minimo</option>
              <option>Excesiva</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="paredes_vejiga" class="form-label">Paredes:</label>
            <select class="form-select form-select-sm" id="paredes_vejiga" formControlName="paredes_vejiga">
                <option>Normal</option>
                <option>Delgado</option>
                <option>Engrosaso</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="contenido_aneocoico" class="form-label">Contenido aneocoico</label>
            <select class="form-select form-select-sm" id="contenido_aneocoico" formControlName="contenido_aneocoico">
              <option>Si</option>
              <option>No</option>
          </select>
            </div>
        <div class="col-md-3">
            <label for="imagenes_expansivas_vejiga" class="form-label">Imagenes expansivas</label>
            <select class="form-select form-select-sm" id="imagenes_expansivas_vejiga" formControlName="imagenes_expansivas_vejiga">
              <option>Si</option>
              <option>No</option>
            </select>
        </div>
      </div>

        <div class="row mb-3">
        <div class="col-md-3">
            <label for="calculos_vejiga" class="form-label">Calculos en su interior</label>
            <select class="form-select form-select-sm" id="calculos_vejiga" formControlName="calculos_vejiga" >
                <option value="No">No</option>
                <option value="Sí">Sí</option>
            </select>
        </div>
          <div class="col-md-3">
              <label for="vol_pre_miccional" class="form-label">Vol.pre-miccional (cc):</label>
              <input type="text" class="form-control form-control-sm" id="vol_pre_miccional" formControlName="vol_pre_miccional">
          </div>
      
          <div class="col-md-3">
              <label for="vol_post_miccional" class="form-label">Vol.post-miccional (cc):</label>
              <input type="text" class="form-control form-control-sm" id="vol_post_miccional" formControlName="vol_post_miccional">
          </div>
      
          <div class="col-md-3">
              <label for="retencion" class="form-label">% de retención:</label>
              <input type="text" class="form-control form-control-sm" id="retencion" formControlName="retencion">
          </div>
      </div>

      <div class="mb-3">
      <label for="descripcion_otros_izquierdo" class="form-label">Descripción/Otros:</label>
      <textarea class="form-control form-control-sm" id="descripcion_otros_izquierdo" formControlName="descripcion_otros_izquierdo" rows="3"></textarea>
      </div>
      
            <div class="d-flex align-items-center mt-4">
                <h6 class="mb-0">Observaciones:</h6>
                <div class="ms-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="otra" id="otra" formControlName="observacion" (change)="onObservacionChange($event)">
                        <label class="form-check-label" for="otra">Agregar</label>
                    </div>
                </div>
            </div>
            <div class="mt-3" *ngIf="isObservacionOtra">
                <textarea class="form-control form-control-sm" id="observacion_textarea" formControlName="observacion_textarea" rows="3" placeholder="Escriba su observación"></textarea>
            </div>
            
            <h6 class="mt-4">Conclusiones:</h6>
            <div class="mb-3">
                <textarea class="form-control form-control-sm" id="conclusiones" formControlName="conclusiones" rows="3" placeholder="Escriba sus conclusiones"></textarea>
            </div>
            
              <!--  -->
            </form>
            <div class="row mt-1">
              <div class="col-md-3">
              <button type="button" class="btn btn-danger" onclick="generarpdfRenal()">
                     <i class="fas fa-file-pdf"></i> pdf
                     </button>
              <button type="button" class="btn btn-primary" onclick="createEcografiaRenal()">Guardar</button>
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