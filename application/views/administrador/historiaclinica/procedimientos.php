<div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table align-items-center table-borderless" id="table-procedimientos2">
                      <thead class="bg-default">
                        <tr>
                          <th scope="col" class="sort  text-white text-sm" data-sort="name">Codigo</th>
                          <th scope="col" class="sort  text-white text-sm" data-sort="budget">Nombre procedimiento</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($procedimiento->result() as $procedimientos) { ?>
                        <tr>
                          <td> <?php echo $procedimientos->codigo_cpt; ?> </td>
                          <td> <?php echo $procedimientos->nombre; ?> </td>
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