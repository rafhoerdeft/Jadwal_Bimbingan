
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Edit Antrian</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('Antrian/updateAntrian'); ?>" method="POST">
								<div class="col-md-6">
									<input type="hidden" name="id_antrian" value="<?php echo $id_antrian; ?>">
									<div class="form-group">
										<label for="nama_lengkap">Nama Lengkap</label>
										<input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" value="<?php echo $list[0]['nama']; ?>" required="">
									</div>
									<div class="form-group">
										<label for="Umur">Umur</label>
										<input id="Umur" name="bagian" type="text" class="form-control" placeholder="Bagian" value="<?php echo $list[0]['umur']; ?>" required="">
									</div>
									<div class="form-group">
										<label for="bagian">Berat</label>
										<input id="bagian" name="bagian" type="text" class="form-control" placeholder="Bagian" value="<?php echo $list[0]['berat_badan']; ?>" required="">
									</div>
									<div class="form-group">
										<label for="hari">Jenis Kelamin</label>
										<select id="hari" name="hari"  class="form-control">
											
											<option value="Laki - Laki">Laki - Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
									<div class="form-group">
										<label for="bagian">Alamat</label>
										<input id="bagian" value="<?php echo $list[0]['alamat']; ?>" name="bagian" type="text" class="form-control" placeholder="Bagian" required="">
									</div>
									<div class="form-group">
										<label for="bagian">Tanggal Besuk</label>
										<input id="bagian" name="bagian" type="text" value="<?php echo $list[0]['tanggal_besuk']; ?>" class="form-control" placeholder="Bagian" required="">
									</div>
									<div class="form-group">
										<label for="id_dokter">Dokter</label>
										<select id="id_dokter" name="id_dokter"  class="form-control">
											<?php 
											if($dokter){
												foreach ($dokter as $value) { ?>
												<option value="<?php echo $value['id_dok']; ?>"><?php echo $value['nama_dokter']; ?></option>
												<?php }} ?>
											</select>
										</div>
										<div class="form-group">
											<label for="id_jamkes">Jaminan Kesehatan</label>
											<select id="id_jamkes" name="id_jamkes"  class="form-control">
												<?php 
												if($jamkes){
													foreach ($jamkes as $value) { ?>
													<option value="<?php echo $value['id_jamkes']; ?>"><?php echo $value['singkatan']; ?>&nbsp;(<?php echo $value['nama_jamkes']; ?>)</option>
													<?php }} ?>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<input class="btn btn-raised btn-primary" type="submit" value="Edit">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
