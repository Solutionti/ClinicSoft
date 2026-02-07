<div class="container-fluid">
              <div class="row mt-1">
                <div class="col-md-12">
                  <div class="accordion accordion-flush" id="accordionExamenesAux">
                    <!-- Orden de Laboratorio -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLabAux" aria-expanded="false" aria-controls="collapseLabAux">
                          <i class="fas fa-flask me-2"></i> ORDEN DE LABORATORIO
                        </button>
                      </h2>
                      <div id="collapseLabAux" class="accordion-collapse collapse" data-bs-parent="#accordionExamenesAux">
                        <div class="accordion-body">
                          <div class="row mt-3">
                <div class="col-md-6 mb-3">
                  <div class="form-group mb-0">
                      <label class="form-label" style="min-width: 120px;">Perfiles:</label>
                      <div class="d-flex align-items-center" style="width: 100%; max-width: 300px;">
                        <select class="form-select form-select-sm" id="selectPerfil" onchange="if(window.seleccionarPerfil) { seleccionarPerfil(); } else { console.error('seleccionarPerfil function not found'); }" style="width: 100%;">
                          <option value="">-- Seleccione un perfil --</option>
                          <option value="preoperatorio">Perfil Preoperatorio</option>
                          <option value="perfil_prenatal">Perfil Prenatal</option>
                          <option value="perfil_recien_nacido">Perfil Recien Nacido</option>
                          <option value="perfil_coagulacion">Perfil Coagulación</option>
                          <option value="perfil_cardiaco">Perfil Cardiaco</option>
                          <option value="perfil_torch">Perfil Torch</option>
                          <option value="perfil_hepatico">Perfil Hepatico</option>
                          <option value="perfil_lipidico">Perfil Lipidico</option>
                          <option value="perfil_prostatico">Perfil Prostático</option>
                          <option value="perfil_reumatico">Perfil Reumatico</option>
                          <option value="perfil_diabetes">Perfil Diabetes</option>
                          <option value="perfil_renal">Perfil Renal</option>
                          <option value="perfil_fertilidad">Perfil Fertilidad</option>
                        </select>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-laboratorio">
                     <thead  class="bg-default text-white">
                        <tr>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Analisis</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($laboratorio->result() as $laboratorios) { ?>
                        <tr>
                           <td class="text-xs"><?php echo $laboratorios->codigo; ?></td>
                           <td class="text-xs"><?php echo $laboratorios->nombre; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                   </table>
                </div>
                <div class="col-md-6">
                  <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-laboratorio-items">
                    <thead>
                      <tr class="bg-default text-white">
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">Analisis</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary" onclick="crearOrdenLaboratorioHistoria()">
                      <i class="fas fa-save me-1"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-warning" onclick="limpiarSeleccion()">
                      <i class="fas fa-broom me-1"></i> Limpiar
                    </button>
                  </div>
                </div>
                        </div>
                        </div>
                      </div>
                    </div>
                    <!-- Orden de Patología -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapsePatAux" aria-expanded="false" aria-controls="collapsePatAux">
                          <i class="fas fa-microscope me-2"></i> ORDEN DE PATOLOGÍA
                        </button>
                      </h2>
                      <div id="collapsePatAux" class="accordion-collapse collapse" data-bs-parent="#accordionExamenesAux">
                        <div class="accordion-body">
                          <form id="form_orden_patologica">
                         <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Nombre:</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        id="nombre_paciente"
                        value="<?php echo $pacientes->nombre . ' ' . $pacientes->apellido; ?>"
                        readonly
                    >
                </div>
                <div class="col-2">
                    <label class="form-label">Edad:</label>
                    <input
                        type="number"
                        class="form-control form-control-sm"
                        id="edad_paciente"
                        value="<?php echo $pacientes->edad; ?>"
                        readonly
                    >
                </div>
                <div class="col-4">
                    <label class="form-label">Sexo:</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M">
                            <label class="form-check-label" for="sexoM">M</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F">
                            <label class="form-check-label" for="sexoF">F</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Médico Solicitante:</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        id="medico_solicitante"
                        value="<?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') ?>"
                        readonly
                    >
                </div>
                <div class="col-6">
                    <label class="form-label">Muestra:</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="muestra" id="pap" value="PAP">
                            <label class="form-check-label" for="pap">PAP</label>
                        </div>
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="muestra" id="citologico" value="Citológico">
                            <label class="form-check-label" for="citologico">Citológico</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="muestra" id="histo" value="Histopatológico">
                            <label class="form-check-label" for="histo">Histopatológico</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-2">
                    <label class="form-label">Paridad:</label>
                    <input type="text" class="form-control form-control-sm" id="paridad_paciente">
                </div>
                <div class="col-2">
                    <label class="form-label">F.U.R:</label>
                    <input type="text" class="form-control form-control-sm" id="fur_paciente">
                </div>
                <div class="col-2">
                    <label class="form-label">F.U.P:</label>
                    <input type="text" class="form-control form-control-sm" id="fup_paciente">
                </div>
                <div class="col-6">
                    <label class="form-label">LACT:</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="lact" id="lactSi" value="S">
                            <label class="form-check-label" for="lactSi">Sí</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lact" id="lactNo" value="N">
                            <label class="form-check-label" for="lactNo">No</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Otros Antecedentes:</label>
                    <input type="text" class="form-control form-control-sm" id="antecedentes_paciente">
                </div>
                <div class="col-6">
                    <label class="form-label">Resultados de informes anteriores:</label>
                    <input type="text" class="form-control form-control-sm" id="resultados_anteriores">
                </div>
            </div>
            <h6 class="mt-3">HALLAZGOS</h6>
            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Otros:</label>
                    <input type="text" class="form-control form-control-sm" id="otros_hallazgos">
                </div>
                <div class="col-6">
                    <label class="form-label">Datos clínicos o tejidos a examinar:</label>
                    <input type="text" class="form-control form-control-sm" id="datos_clinicos">
                </div>
            </div>
              <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">Diagnóstico:</label>
                    <textarea class="form-control form-control-sm" rows="1" id="diagnostico_patologia"></textarea>
                </div>
                <div class="col-6">
                    <label class="form-label">Fecha:</label>
                    <input type="date" class="form-control form-control-sm" id="fechaActual" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
              <div class="row mt-3">
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-primary" id="btn_guardar_patologia" onclick="crearOrdenPatologica()">Guardar</button>
                </div>
            </div>
        </form>
                        </div>
                      </div>
                    </div>
                    <!-- ECOGRAFIA -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#ecografia" aria-expanded="false" aria-controls="ecografia">
                          <i class="fas fa-x-ray me-2"></i> ORDEN DE ECOGRAFIA
                        </button>
                      </h2>
                      <div id="ecografia" class="accordion-collapse collapse" data-bs-parent="#accordionExamenesAux">
                        <div class="accordion-body">
                          <!-- ECOGRAFIA -->
                           <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-6">
                                <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-ecografia">
                     <thead  class="bg-default text-white">
                        <tr>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">ECOGRAFIA</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($eco->result() as $tb_eco) { ?>
                        <tr>
                           <td class="text-xs"><?php echo $tb_eco->codigo; ?></td>
                           <td class="text-xs"><?php echo $tb_eco->nombre; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                   </table>
                              </div>
                              <div class="col-md-6">
                                <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-ecografia-items">
                    <thead>
                      <tr class="bg-default text-white">
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">ECOGRAFIA</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary" onclick="crearOrdenEcografiaHistoria()">
                      <i class="fas fa-save me-1"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-warning" onclick="limpiarSeleccionEcografia()">
                      <i class="fas fa-broom me-1"></i> Limpiar
                    </button>
                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!--  -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#tomografia" aria-expanded="false" aria-controls="tomografia">
                          <i class="fas fa-pager me-2"></i> ORDEN DE TOMOGRAFIA
                        </button>
                      </h2>
                      <div id="tomografia" class="accordion-collapse collapse" data-bs-parent="#accordionExamenesAux">
                        <div class="accordion-body">
                          <!-- TOMOGRAFIA -->
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-6">
                                <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-tomografia">
                     <thead  class="bg-default text-white">
                        <tr>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">TOMOGRAFIA</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($tomografias->result() as $tb_tomo) { ?>
                        <tr>
                           <td class="text-xs"><?php echo $tb_tomo->codigo; ?></td>
                           <td class="text-xs"><?php echo $tb_tomo->nombre; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                   </table>
                              </div>
                              <div class="col-md-6">
                                <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-tomografia-items">
                    <thead>
                      <tr class="bg-default text-white">
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">TOMOGRAFIA</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary" onclick="crearOrdenTomografiaHistoria()">
                      <i class="fas fa-save me-1"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-warning" onclick="limpiarSeleccionTomografia()">
                      <i class="fas fa-broom me-1"></i> Limpiar
                    </button>
                  </div>
                              </div>
                            </div>
                            <!--  -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--  -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#resonancia" aria-expanded="false" aria-controls="resonancia">
                          <i class="fas fa-radiation me-2"></i> ORDEN DE RESONANCIA
                        </button>
                      </h2>
                      <div id="resonancia" class="accordion-collapse collapse" data-bs-parent="#accordionExamenesAux">
                        <div class="accordion-body">
                          <!-- RESONANCIA -->
                           <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-6">
                                <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-resonancia">
                     <thead  class="bg-default text-white">
                        <tr>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                           <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">RESONANCIA</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($resonancias->result() as $tb_reso) { ?>
                        <tr>
                           <td class="text-xs"><?php echo $tb_reso->codigo; ?></td>
                           <td class="text-xs"><?php echo $tb_reso->nombre; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                   </table>
                              </div>
                              <div class="col-md-6">
                                <table class="table align-items-center table-borderless mb-0 text-uppercase" id="table-resonancia-items">
                    <thead>
                      <tr class="bg-default text-white">
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">#</th>
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-12">RESONANCIA</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary" onclick="crearOrdenResonanciaHistoria()">
                      <i class="fas fa-save me-1"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-warning" onclick="limpiarSeleccionResonancia()">
                      <i class="fas fa-broom me-1"></i> Limpiar
                    </button>
                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!--  -->
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>