<div class="my-3 my-md-5">
	<div class="container">
	<br>
	<h3>Cek List</h3>
		<div class="card">
		  <div class="card-body ">
			<div class="table-responsive">
				<table class="table card-table table-striped table-vcenter">
				  <thead>
					<tr>
					  <th>Nama Barang</th>
					  <th>Tanggal Masuk</th>
					  <th>Stok</th>
					  <th>Status</th>
					  <th></th>
					</tr>
				  </thead>
				  <?php foreach ($list as $s){?>
				  <tbody>
					<tr>
						<td><?php echo $s->br_nama;?></td>
						<td><?php echo $s->pm_tgl;?></td>
						<td><?php echo $s->br_in;?></td>
						<td><?php echo $s->pm_status;?></td>
						<td><a href="<?php echo site_url('analisis')?>">konfirm</a></td>
					</tr>
					<!--<tr>
					  <td>Pasta Gigi Pepsodent</td>
					  <td>500</td>
					  <td>600</td>
					  <td>100</td>
					  <td>6 hari</td>
					  <td><a href="<?php echo site_url('Site/detail_permintaan')?>" class="btn btn-primary btn-sm">detail</a></td>
					</tr>
					<tr>
					  <td>Susu Frisian Flag</td>
					  <td>300</td>
					  <td>700</td>
					  <td>400</td>
					  <td>6 hari</td>
					  <td><a href="#" class="btn btn-primary btn-sm">detail</a></td>
					</tr>
					<tr>
					  <td>Hitmat Green Tea</td>
					  <td>800</td>
					  <td>2300</td>
					  <td>1500</td>
					  <td>6 hari</td>
					  <td><a href="#" class="btn btn-primary btn-sm">detail</a></td>
					</tr>
					<tr>
					  <td>Kecap Bango</td>
					  <td>600</td>
					  <td>3600</td>
					  <td>3000</td>
					  <td>6 hari</td>
					  <td><a href="#" class="btn btn-primary btn-sm">detail</a></td>
					</tr>
					<tr>
					  <td>Good Time Cookies</td>
					  <td>1000</td>
					  <td>12000</td>
					  <td>11000</td>
					  <td>6 hari</td>
					  <td><a href="#" class="btn btn-primary btn-sm">detail</a></td>
					</tr>-->
				  </tbody>
				  <?php }?>
				</table>
            </div>
        </div>
	</div>
	<hr>	
</div>
