        <style>
          #ctn_loading {
              border: 8px solid #f3f3f3; /* Light grey */
              border-top: 8px solid #3498db; /* Blue */
              border-radius: 50%;
              width: 70px;
              height: 70px;
              animation: spin 2s linear infinite;
          }

          @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
          }
        </style>
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Analisa rekomendasi lokasi peletakan barang
              </h1>
            </div>
			<?php 
			$rak=array('Cepat', 'Sedang', 'Lambat');
			$k=array('A','B','C','D','E','F', 'G', 'H', 'I');
			?>
            <center><div id="ctn_loading"></div></center>
            <div class="row" id="ctn_analisa">
                <?php for($i=1; $i<5; $i++){ ?>
                  <div class="col-6 col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body p-3 text-center">
                        <!-- <div class="text-right text-green">
                          6%
                          <i class="fe fe-chevron-up"></i>
                        </div> -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="h1 m-0"><img src="<?php echo base_url()?>assets/images/package.png" width="40"></div>
                            <div class="text-muted mb-4"><?php echo $barang[$i*10];?></div>
                          </div>
                          <div class="col-md-4">
                            <div class="h1 m-0"><img src="<?php echo base_url()?>assets/images/package.png" width="40"></div>
                            <div class="text-muted mb-4"><?php echo $barang[$i*10-1];?></div>
                          </div>
                          <div class="col-md-4">
                            <div class="h1 m-0"><img src="<?php echo base_url()?>assets/images/package.png" width="40"></div>
                            <div class="text-muted mb-4"><?php echo $barang[$i*10+1];?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
							<img src="<?php echo base_url()?>assets/images/trolley.png" width="40">
							<div class="text-muted mb-4">Tipe Rak : 
							<?php $a=rand(0,2); 
							if($a==0){
								echo '<i class="badge badge-success" style="font-size:14px">'.$rak[$a].'</i>';
							}if($a==1){
								echo '<i class="badge badge-warning" style="font-size:14px">'.$rak[$a].'</i>';
							}if($a==2){
								echo '<i class="badge badge-primary" style="font-size:14px">'.$rak[$a].'</i>';
							}
							?>
							</div>
                            <div class="text-muted mb-4">Lokasi : 
							<?php 
							if($a==0){
								$b=rand(0,3);
								echo $k[$b];
							}if($a==1){
								$b=rand(3,5);
								echo $k[$b];
							}if($a==2){
								$b=rand(5,7);
								echo $k[$b];
							}
							?>
							<?php echo rand(1,9);?></div>
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
      </div>
      <script>
        var myVar;
        function myFunction() {
          document.getElementById("ctn_loading").style.display = 'block';
          document.getElementById("ctn_analisa").classList.add('d-none');
            myVar = setTimeout(showPage, 700);
        }
        function showPage() {
          document.getElementById("ctn_loading").style.display = 'none';
          document.getElementById("ctn_analisa").classList.remove('d-none');
        }
        myFunction();
      </script>