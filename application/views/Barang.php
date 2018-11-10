        <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Input Barang</h3>
                </div>
                <div class="card-body">
                  <form>
                  <div class="form-group">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Nama Barang..">
                  </div>
                   <div class="form-group">
                        <label class="form-label">Kategori Barang</label>
                        <select class="form-control custom-select" name="kategori">
                          <?php foreach ($kategori as $kg) { ?>
                          <option value="<?php echo $kg->bk_id ?>"><?php echo $kg->bk_nama ?></option>
                          <?php } ?>
                        </select>
                      </div>
                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
              </div>
              <script>
                require(['input-mask']);
              </script>
            </div>
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Data Barang</h3>
                  <div class="row">
                    <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th>Barcode</th>
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="text-muted">001401</span></td>
                          <td>
                            <span class="status-icon bg-success"></span> Paid
                          </td>
                          <td>$887</td>
                          <td class="text-right">
                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Manage</a>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                            </div>
                          </td>
                          <td>
                            <a class="icon" href="javascript:void(0)">
                              <i class="fe fe-edit"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>