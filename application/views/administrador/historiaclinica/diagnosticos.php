<div class="container-fluid">
              <div class="row">
             <div class="col-md-2">
              <label>ID</label>
              <input
                type="number"
                class="form-control"
                readonly
              >
             </div>
             <div class="col-md-3">
              <label>Codigo</label>
              <input
                type="number"
                class="form-control"
                readonly
              >
             </div>
             <div class="col-md-5">
              <label>Nombre procedimiento</label>
              <input
                type="number"
                class="form-control"
                readonly
              >
             </div>
             <div class="col-md-2">
              <label>Tipo</label>
              <select
                class="form-control"
              >
                <option value="">Seleccione el tipo</option>
                <option value="">Principal</option>
                <option value="">Relacionado</option>
                <option value="">Complicacion</option>
              </select>
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
                  </div>
                </div>
              </div>
            </div>