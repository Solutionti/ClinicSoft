<div class="container-fluid">
              <div class="row">
             <div class="col-md-2">
              <label>ID</label>
              <input
                type="text"
                class="form-control"
                id="diagnostico_id"
                readonly
              >
             </div>
             <div class="col-md-2">
              <label>Codigo</label>
              <input
                type="text"
                class="form-control"
                id="diagnostico_codigo"
                readonly
              >
             </div>
             <div class="col-md-5">
              <label>Nombre Diagnostico</label>
              <input
                type="text"
                class="form-control"
                id="diagnostico_nombre"
                readonly
              >
             </div>
             <div class="col-md-2">
              <label>Tipo</label>
              <select
                class="form-control"
                id="diagnostico_tipo"
              >
                <option value="">Seleccione el tipo</option>
                <option value="D">Definitivo</option>
                <option value="P">Presentivo</option>
                <option value="R">Repetitivo</option>
              </select>
             </div>
             <div class="col-md-1">
              <label>&nbsp;</label>
              <button class="btn btn-success w-100" id="agregar_diagnostico">
                <i class="fas fa-plus me-1"></i>
              </button>
             </div>
            </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table align-items-center table-borderless" id="table-diagnosticos2">
                      <thead class="bg-default">
                        <tr>
                          <th scope="col" class="sort text-sm text-white text-black">ID</th>
                          <th scope="col" class="sort text-sm text-white text-black" data-sort="name">Codigo</th>
                          <th scope="col" class="sort text-sm text-white text-black" data-sort="budget">Nombre diagnostico</th>
                          <th scope="col" class="sort text-sm text-white text-black" data-sort="budget">Tipo</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($diagnostico->result() as $diagnosticos) { ?>
                        <tr>
                          <td class="budget"><?php echo $diagnosticos->id; ?></td>
                          <td class="budget"><?php echo $diagnosticos->clave; ?></td>
                          <td class="budget"><?php echo $diagnosticos->descripcion; ?></td>
                          <td class="budget"></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                 <div class="table-responsive">
                  <table class="table align-items-center table-borderless" id="items-general-table">
                    <thead class="bg-success">
                      <tr>
                        <th scope="col" class="sort  text-sm text-white">ID</th>
                        <th scope="col" class="sort  text-sm text-white" data-sort="name">Codigo</th>
                        <th scope="col" class="sort  text-sm text-white" data-sort="budget">Nombre diagnostico</th>
                        <th scope="col" class="sort  text-sm text-white" data-sort="budget">Tipo</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary" >
                      <i class="fas fa-save me-1"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-warning">
                      <i class="fas fa-broom me-1"></i> Limpiar
                    </button>
                  </div>
                  </div>
                </div>
              </div>
            </div>