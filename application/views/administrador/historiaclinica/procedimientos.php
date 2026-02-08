<div class="container-fluid">
              <div class="row">
             <div class="col-md-2">
              <label>Codigo</label>
              <input
                type="text"
                class="form-control"
                id="procedimiento_codigo"
                readonly
              >
             </div>
             <div class="col-md-4">
              <label>Nombre Procedimiento</label>
              <input
                type="text"
                class="form-control"
                id="procedimiento_nombre"
                readonly
              >
             </div>
             <div class="col-md-5">
              <label>Texto Plantilla</label>
              <input
                type="text"
                class="form-control"
                id="procedimiento_plantilla"
              >
             </div>
             <div class="col-md-1">
              <label>&nbsp;</label>
              <button class="btn btn-success w-100" id="agregar_procedimiento">
                <i class="fas fa-plus me-1"></i>
              </button>
             </div>
            </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table align-items-center table-borderless" id="table-procedimientos2">
                      <thead class="bg-default">
                        <tr>
                          <th scope="col" class="sort  text-white text-sm" data-sort="name">Codigo</th>
                          <th scope="col" class="sort  text-white text-sm" data-sort="budget">Nombre procedimiento</th>
                          <th scope="col" class="sort  text-white text-sm" data-sort="budget">Texto plantilla</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($procedimiento->result() as $procedimientos) { ?>
                        <tr>
                          <td> <?php echo $procedimientos->codigo_cpt; ?> </td>
                          <td> <?php echo $procedimientos->nombre; ?> </td>
                          <td><?php echo $procedimientos->texto_plantilla; ?></td>
                        </tr>
                     <?php } ?>
                     </tbody>
                    </table>
                  </div>
                </div>
              <!--  -->
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table align-items-center table-borderless" id="items-procedimientos2-table">
                      <thead class="bg-success">
                        <tr>
                          <th scope="col" class="sort text-white text-sm" data-sort="name">Codigo</th>
                          <th scope="col" class="sort text-white text-sm" data-sort="budget">Nombre procedimiento</th>
                          <th scope="col" class="sort text-white text-sm" data-sort="budget">Texto plantilla</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                    <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary" >
                      <i class="fas fa-save me-1"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-warning" id="btn-limpiar-procedimientos">
                      <i class="fas fa-broom me-1"></i> Limpiar
                    </button>
                  </div>
                  </div>
                </div>
              </div>
            </div>