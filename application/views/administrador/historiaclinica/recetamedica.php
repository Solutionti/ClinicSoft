<div class="container-fluid">
                <div class="col-md-12">
                <div class="row ">
                  <div class="col-md-7">
                    <label>Medicamento</label>
                    <div class="input-group">
                      <a href="" class="input-group-text" data-bs-toggle="modal" data-bs-target="#modalmedicamentos" style="padding: 0.375rem 0.75rem;">
                        <i class="fas fa-eye"></i>
                      </a>
                      <input type="text" class="form-control" id="medicamento_medicamento">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Cantidad</label>
                    <input type="number" class="form-control" id="cantidad_medicamento">
                  </div>
                  <div class="col-md-3">
                    <label>Dosis</label>
                    <select class="form-control text-uppercase" id="dosis_medicamento">
                      <option value="">Seleccione la dosis</option>
                      <option value="Noespecificada">No especificada</option>
                      <option value="Ampolla">Ampolla</option>
                      <option value="Aplicación">Aplicación</option>
                      <option value="Capsula">Cápsula</option>
                      <option value="Comprimido">Comprimido</option>
                      <option value="Cucharada">Cucharada</option>
                      <option value="Cucharadita_5ML">Cucharadita 5ML</option>
                      <option value="Dosis">Dosis</option>
                      <option value="Exposición">Exposición</option>
                      <option value="Gota">Gota</option>
                      <option value="Gragea">Gragea</option>
                      <option value="Mililitros">Mililitros</option>
                      <option value="Puff">Puff</option>
                      <option value="Sesión">Sesión</option>
                      <option value="Sobre">Sobre</option>
                      <option value="Tableta">Tableta</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-4">
                    <label>Vía de aplicación</label>
                    <select class="form-control text-uppercase" id="via_aplicacion_medicamento">
                      <option value="">Seleccione la vía de aplicación</option>
                      <option value="Via_oral">Vía oral</option>
                      <option value="Via_intramuscular">Vía intramuscular</option>
                      <option value="Via_intravenoso">Vía intravenoso</option>
                      <option value="Vaginal">Vaginal</option>
                      <option value="Transtraqueal">Transtraqueal</option>
                      <option value="Transdermica">Transdérmica</option>
                      <option value="Topica">Tópica</option>
                      <option value="Sub_lingual">Sublingual</option>
                      <option value="Sub_cutanea">Subcutánea</option>
                      <option value="Rectal">Rectal</option>
                      <option value="Por_sng">Por SNG</option>
                      <option value="Por_gastronomica">Por gastronomía</option>
                      <option value="Parenteral">Parenteral</option>
                      <option value="Ojo_derecha">Ojo derecho</option>
                      <option value="Ojo_izquierdo">Ojo izquierdo</option>
                      <option value="Oido_derecho">Oído derecho</option>
                      <option value="Oido_izquierdo">Oído izquierdo</option>
                      <option value="No_especifica">No especifica</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Frecuencia</label>
                    <select class="form-control text-uppercase" id="frecuencia_medicamento">
                      <option value="">Seleccione la frecuencia</option>
                      <option value="No_especifica">No especifica</option>
                      <option value="dos_al_dia">2 veces al día</option>
                      <option value="tres_al_dia">3 veces al día</option>
                      <option value="al_acostarse">Al acostarse</option>
                      <option value="al_dia">Al día</option>
                      <option value="cada_doce_horas">Cada 12 horas</option>
                      <option value="cada_dos_horas">Cada 2 horas</option>
                      <option value="cada_tres_horas">Cada 3 horas</option>
                      <option value="cada_cuatro_horas">Cada 4 horas</option>
                      <option value="cada_seis_horas">Cada 6 horas</option>
                      <option value="cada_ocho_horas">Cada 8 horas</option>
                      <option value="dos_veces_por_semana">Dos veces por semana</option>
                      <option value="en_ayunas">En ayunas</option>
                      <option value="en_la_mañana">En la mañana</option>
                      <option value="mañana_noche">En la mañana, noche</option>
                      <option value="noche">En la noche</option>
                      <option value="tarde">En la tarde</option>
                      <option value="mañana_tarde_noche">Mañana, Tarde, Noche</option>
                      <option value="tres_veces_semana">Tres veces por semana</option>
                      <option value="una_vez_semana">Una vez por semana</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Duración</label>
                    <select class="form-control text-uppercase" id="duracion_medicamento">
                      <option value="">Seleccione la duración</option>
                      <option value="cinco_dias">05 días</option>
                      <option value="diez_dias">10 días</option>
                      <option value="quince_dias">15 días</option>
                      <option value="treinta_dias">30 días</option>
                      <option value="dos_dias">Dos días</option>
                      <option value="durante_tres_meses">Durante 3 meses</option>
                      <option value="tres_dias">Tres días</option>
                      <option value="un_dia">Un día</option>
                      <option value="una_semana">Una semana</option>
                      <option value="unica_vez">Única vez</option>
                    </select>
                  </div>
                </div>
                <button class="btn btn-primary btn-sm mt-3" onclick="crearMedicamento()"> <i class="fas fa-plus"></i> </button>
              </div>
              <div class="row mt-4">
                <div class="col-md-12">
                  <h6 class="text-success text-uppercase">Medicamentos Recetados</h6>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table-receta-consulta">
                      <thead class="bg-default text-white">
                        <tr>
                          <th></th>
                          <th>Medicamento</th>
                          <th>Cantidad</th>
                          <th>Dosis</th>
                          <th>Vía</th>
                          <th>Frecuencia</th>
                          <th>Duración</th>
                        </tr>
                      </thead>
                      <tbody id="listarecetamedica">
                        <!-- Los medicamentos se cargan dinámicamente -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>