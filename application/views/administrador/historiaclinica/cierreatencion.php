<div class="messageError"></div>
  <div class="row">
    <div class="col-md-1" style="opacity: 0;">
  </div>
  <div class="col-md-10">
    <div class="row">
                           <div class="col-md-8">
                              <div class="form-group input-group-sm">
                                 <label>Medico *</label>
                                 <select class="form-control" id="medico_cita" required disabled>
                                    <option value="">Seleccione un doctor</option>
                                    <?php foreach ($doctor->result() as $doctores) { ?>
                                    <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre . ' (' . $doctores->perfil . ' )'; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4" >
                              <div class="form-group input-group-sm">
                                 <div class="form-field">
                                 <label>Fecha *</label>
                                 <div class="input-group">
                                    <input type="date" style="height: 32px;padding: 0px;padding-right: 10px;" required class="form-control" id="fecha_cita" min="<?php echo date('Y-m-d'); ?>">
                                 </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>DNI Paciente *</label>
                                 <div class="input-group">
                                    <input readonly type="text" class="form-control" id="dni_cita" style="height: 32px;padding: 0px;" minlength="7" maxlength="11" required>
                                    <div class="input-group-append">
                                       <button type="button" style="padding: 5px;" class="btn btn-primary" id="lupa_DNI"><i class="fa fa-search"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                 <label>Apellidos y Nombres  Paciente *</label>
                                 <input type="text" class="form-control" id="nombre_cita" required readonly>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group input-group-sm">
                                 <label>Celular *</label>
                                 <input type="text" class="form-control" id="telefono_cita">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                 <label>Estado Cita *</label>
                                 <select class="form-control" id="estado_cita" required disabled>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Confirmado">Confirmado</option>
                                    <option value="Tratado">Tratado</option>
                                    <option value="Cancelado">Cancelado</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group input-group-sm">
                                 <label>Observaciones</label>
                                 <input type="text" class="form-control" id="observaciones_cita" value="cita pendiente para confirmacion de hora ">
                              </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-md-5">
                              <div class="form-field">
                             <label>Interconsulta </label>
                              <input type="text" class="form-control" id="interconsulta">
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-field">
                             <label>Destino del paciente </label>
                             <select class="form-control" id="destino">
                               <option value="">Ingrese el destino del paciente</option>
                             </select>
                             </div>
                           </div>
                           <div class="col-md-2 mt-3">
                              <button class="btn btn-primary btn-sm mt-3" id="terminargeneral" onclick="terminarAtenciongeneral()" hidden>
                                 Terminar
                              </button>
                              <button class="btn btn-danger btn-sm mt-3" id="terminarginecologia" onclick="terminarAtencionginecologia()" hidden>
                                 Terminar
                              </button>
                           </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <!-- <button 
                              class="btn btn-primary" 
                              onclick="crearCita()"
                            >
                              Guardar
                            </button> -->
                          </div>
                        </div>