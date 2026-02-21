<div class="container-fluid">
                <div class="col-md-12">
                <div class="row ">
                  <div class="col-md-7">
                    <label>Medicamento *</label>
                    <div class="input-group">
                      <a href="" class="input-group-text" data-bs-toggle="modal" data-bs-target="#modalmedicamentos" style="padding: 0.375rem 0.75rem;">
                        <i class="fas fa-eye"></i>
                      </a>
                      <input type="text" class="form-control" id="medicamento_medicamento">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Cantidad *</label>
                    <input type="number" class="form-control" id="cantidad_medicamento">
                  </div>
                  <div class="col-md-3">
                    <label>Forma Farmacéutica *</label>
                 <select class="form-control text-uppercase" id="dosis_medicamento" name="dosis_medicamento">
                
                 <option value="">SELECCIONE LA PRESENTACIÓN</option>
                <option value="No especificada">No especificada</option>

                 <optgroup label="Sólidos">
                    <option value="Capsula">Cápsula</option>
                    <option value="Comprimido">Comprimido</option>
                    <option value="Gragea">Gragea</option>
                    <option value="Polvo">Polvo / Granulado</option>
                    <option value="Sobre">Sobre</option>
                    <option value="Tableta">Tableta</option>
                </optgroup>

                <optgroup label="Líquidos">
                    <option value="Ampolla">Ampolla</option>
                    <option value="Frasco">Frasco</option>
                    <option value="Gotas">Gotas</option>
                    <option value="Jarabe">Jarabe</option>
                    <option value="Solucion">Solución</option>
                    <option value="Suspension">Suspensión</option>
                    <option value="Vial">Vial / Frasco Ámpula</option>
                </optgroup>

              <optgroup label="Semisólidos y Tópicos">
                  <option value="Crema">Crema</option>
                  <option value="Gel">Gel</option>
                  <option value="Locion">Loción</option>
                  <option value="Parche">Parche Transdérmico</option>
                  <option value="Pomada">Pomada / Ungüento</option>
              </optgroup>

                  <optgroup label="Vaginales y Rectales">
                      <option value="Enema">Enema</option>
                      <option value="Ovulo">Óvulo</option>
                      <option value="Supositorio">Supositorio</option>
                  </optgroup>

                  <optgroup label="Inhalatorios">
                      <option value="Aerosol">Aerosol / Spray</option>
                      <option value="Inhalador">Inhalador</option>
                  </optgroup>
              </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-4">
                <label>Vía de aplicación *</label>
                <select class="form-control text-uppercase" id="via_aplicacion_medicamento">
                    <option value="">Seleccione la vía de aplicación</option>
                    <option value="No_especifica">No especifica</option>

                    <optgroup label="Vía Oral y Enteral">
                        <option value="Via_oral">Vía oral (V.O.)</option>
                        <option value="Sub_lingual">Sublingual</option>
                        <option value="Por_sng">Por SNG (Sonda Nasogástrica)</option>
                        <option value="Por_gastronomica">Por gastrostomía</option> 
                    </optgroup>

                    <optgroup label="Vía Parenteral (Inyectables)">
                        <option value="Via_intramuscular">Vía intramuscular (I.M.)</option>
                        <option value="Via_intravenoso">Vía intravenosa (I.V.)</option> 
                        <option value="Sub_cutanea">Subcutánea (S.C.)</option>
                        <option value="Parenteral">Parenteral (General)</option>
                    </optgroup>

                    <optgroup label="Vía Tópica y Local">
                        <option value="Topica">Tópica (Piel)</option>
                        <option value="Transdermica">Transdérmica (Parches)</option>
                        <option value="Vaginal">Vaginal</option>
                        <option value="Rectal">Rectal</option>
                    </optgroup>

                    <optgroup label="Vía Respiratoria">
                        <option value="Inhalatoria">Inhalatoria / Respiratoria</option>
                        <option value="Nasal">Nasal</option>
                        <option value="Transtraqueal">Transtraqueal</option>
                    </optgroup>

                    <optgroup label="Oftálmica (Ojos) y Ótica (Oídos)">
                        <option value="Ojo_derecha">Ojo derecho</option>
                        <option value="Ojo_izquierdo">Ojo izquierdo</option>
                        <option value="Ambos_ojos">Ambos ojos (Bilateral)</option>
                        <option value="Oido_derecho">Oído derecho</option>
                        <option value="Oido_izquierdo">Oído izquierdo</option>
                        <option value="Ambos_oidos">Ambos oídos (Bilateral)</option>
                    </optgroup>
                </select>
                  </div>
                  <div class="col-md-4">
                   <label>Frecuencia *</label>
                <select class="form-control text-uppercase" id="frecuencia_medicamento">
                    <option value="">Seleccione la frecuencia</option>
                    <option value="No_especifica">No especifica</option>

                    <optgroup label="Intervalos de Horas">
                        <option value="cada_dos_horas">Cada 2 horas</option>
                        <option value="cada_tres_horas">Cada 3 horas</option>
                        <option value="cada_cuatro_horas">Cada 4 horas</option>
                        <option value="cada_seis_horas">Cada 6 horas</option>
                        <option value="cada_ocho_horas">Cada 8 horas</option>
                        <option value="cada_doce_horas">Cada 12 horas</option>
                        <option value="cada_24_horas">Cada 24 horas</option> </optgroup>

                    <optgroup label="Veces al Día">
                        <option value="al_dia">1 vez al día</option>
                        <option value="dos_al_dia">2 veces al día</option>
                        <option value="tres_al_dia">3 veces al día</option>
                    </optgroup>

                    <optgroup label="Momentos del Día">
                        <option value="en_ayunas">En ayunas</option>
                        <option value="en_la_mañana">En la mañana</option>
                        <option value="tarde">En la tarde</option>
                        <option value="noche">En la noche</option>
                        <option value="al_acostarse">Al acostarse</option>
                        <option value="mañana_noche">Mañana y Noche</option>
                        <option value="mañana_tarde_noche">Mañana, Tarde y Noche</option>
                    </optgroup>

                    <optgroup label="Frecuencia Semanal">
                        <option value="una_vez_semana">1 vez por semana</option>
                        <option value="dos_veces_por_semana">2 veces por semana</option>
                        <option value="tres_veces_semana">3 veces por semana</option>
                    </optgroup>

                    <optgroup label="Especiales / Condicionales">
                        <option value="dosis_unica">Dosis única (Stat)</option> <option value="condicional_sintomas">Condicional a dolor o fiebre (PRN)</option> <option value="con_comidas">Con las comidas</option> <option value="despues_comidas">Después de las comidas</option> </optgroup>
                </select>
                  </div>
                  <div class="col-md-4">
                  <label>Duración *</label>
                  <select class="form-control text-uppercase" id="duracion_medicamento">
                      <option value="">Seleccione la duración</option>

                      <optgroup label="Dosis Única o Condicional">
                          <option value="unica_vez">Única vez (Stat)</option>
                          <option value="condicional_sintomas">Condicional a síntomas</option> </optgroup>

                      <optgroup label="Días">
                          <option value="un_dia">1 día</option>
                          <option value="dos_dias">2 días</option>
                          <option value="tres_dias">3 días</option>
                          <option value="cuatro_dias">4 días</option> <option value="cinco_dias">5 días</option>
                          <option value="siete_dias">7 días</option> <option value="diez_dias">10 días</option>
                          <option value="catorce_dias">14 días</option> <option value="quince_dias">15 días</option>
                          <option value="treinta_dias">30 días</option>
                      </optgroup>

                      <optgroup label="Semanas y Meses">
                          <option value="una_semana">1 semana</option>
                          <option value="un_mes">1 mes</option> <option value="durante_tres_meses">3 meses</option>
                          <option value="uso_continuo">Uso continuo / Permanente</option> </optgroup>
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
                          <th>Presentación</th>
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
