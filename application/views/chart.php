		<div class="container">
		<br>
			<h3>Grafik Rak</h3>
			<div class="row">
			<div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Persentase Rak</h3>
                      </div>
                      <div class="card-body">
                        <div id="chart-pie" style=""></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function(c3, $) {
                      	$(document).ready(function(){
                      		var chart = c3.generate({
                      			bindto: '#chart-pie', // id of chart wrapper
                      			data: {
                      				columns: [
                      				    // each columns data
                      					['data1', 60],
                      					['data2', 30],
                      					['data3', 10],
                      					
                      				],
                      				type: 'pie', // default type of chart
                      				colors: {
                      					'data1': tabler.colors["green"],
                      					'data2': tabler.colors["yellow"],
                      					'data3': tabler.colors["blue"],
                      					
                      				},
                      				names: {
                      				    // name of each serie
                      					'data1': 'Cepat',
                      					'data2': 'Sedang',
                      					'data3': 'Lambat',
                      					
                      				}
                      			},
                      			axis: {
                      			},
                      			legend: {
                                      show: false, //hide legend
                      			},
                      			padding: {
                      				bottom: 0,
                      				top: 0
                      			},
                      		});
                      	});
                      });
                    </script>
              </div>
              <div class="col-md-6">
				<div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="h5">Barang masuk hari ini</div>
                      </div>
                    </div>
                </div>
				<div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <h4>Cepat : 400 barang</h4>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-green" style="width: 40%"></div>
                        </div>
                      </div>
                    </div>
                </div>
				<div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
						<h4>Sedang : 500 barang</h4>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-yellow" style="width: 50%"></div>
                        </div>
                      </div>
                    </div>
                </div>
				<div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
						<h4>Lambat : 100 barang</h4>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-blue" style="width: 10%"></div>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
            </div>
        </div>