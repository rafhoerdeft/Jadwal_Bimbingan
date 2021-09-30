
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Detail Jadwal</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('Layanan/updateLayanan'); ?>" method="POST">
								<input type="hidden" value="<?php echo $id_layanan; ?>" name="id_layanan">
								<div class="col-md-6">
									<?php 
									if($list){
										foreach ($list as $value) {
											?>
											<div class="form-group">
												<label for="nama-dokter">Nama</label>
												<h4 id="nama-dokter"><?php echo $value['nama']; ?></h4>
												<hr>
											</div>
											<div class="form-group">
												<label for="layanan_medis">Layanan Medis</label>
												<h4 id="layanan_medis"><?php echo $value['layanan_medis']; ?></h4>
												<hr>
											</div>
											<div class="form-group">
												<label for="info_medis">Info Medis</label>
												<h4 id="info_medis"><?php echo $value['info_medis']; ?></h4>
											</div>
											<hr>
										</div>
										<?php
									}
								}
								?>
								<div class="col-md-12">
									<a href="<?php echo base_url('Layanan/layananEdit/'.$id); ?>" class="btn btn-raised btn-primary" type="submit" value="Edit">Edit</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
