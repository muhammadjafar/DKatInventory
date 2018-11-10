        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Analisa rekomendasi lokasi peletakan barang
              </h1>
            </div>
            <div class="row row-cards">
              <?php for($i=1; $i<rand(2,9); $i++){ ?>
                <div class="col-6 col-sm-6 col-lg-3">
                  <div class="card border border-primary" style="background: rgba(3, 169, 244, 0.1);">
                    <div class="card-body p-3 text-center">
                      <!-- <div class="text-right text-green">
                        6%
                        <i class="fe fe-chevron-up"></i>
                      </div> -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="h1 m-0"><i class="fa fa-box"></i></div>
                          <div class="text-muted mb-4"><?php echo $barang[$i*10];?></div>
                        </div>
                        <div class="col-md-4">
                          <div class="h1 m-0"><i class="fa fa-box"></i></div>
                          <div class="text-muted mb-4"><?php echo $barang[$i*10-1];?></div>
                        </div>
                        <div class="col-md-4">
                          <div class="h1 m-0"><i class="fa fa-box"></i></div>
                          <div class="text-muted mb-4"><?php echo $barang[$i*10+1];?></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="h1 m-0"><?php echo rand(60,100);?>%</div>
                          <div class="text-muted">Ramalan keluar bersama</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              
            </div>
          </div>
        </div>
      </div>