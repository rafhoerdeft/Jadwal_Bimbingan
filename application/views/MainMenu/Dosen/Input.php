<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<!-- <nav>
			<ul class="nav">
				<li><a href="<?php echo base_url('DashboardAdmin'); ?>" ><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
				<li><a class="active" href="<?php echo base_url('Jadwal/index'); ?>" class=""><i class="lnr lnr-clock"></i> <span>Atur Jadwal</span></a></li>
				<li><a href="<?php echo base_url('Antrian/index'); ?>" class=""><i class="lnr lnr-eye"></i> <span>Lihat Antrian</span></a></li>
				<li><a ref="<?php echo base_url('Hubungi/index'); ?>" class=""><i class="lnr lnr-phone"></i> <span>Kotak Masuk</span></a></li>
			</ul>
		</nav> -->
	</div>
</div>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Tambah</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('Dosen/insertDosen'); ?>" method="POST">
							<div class="row">
							<div class="form-group">
									<label for="id">ID</label>
									<input id="id" name="id" type="text" class="form-control" placeholder="id">
								</div>
								<div class="form-group">
									<label for="mahasiswa">mahasiswa</label>
									<input id="mahasiswa" name="mahasiswa" type="mahasiswa" class="form-control" placeholder="mahasiswa" required="">
								</div>
								<div class="form-group">
									<label for="antrian">antrian</label>
									<input id="antrian" name="antrian" type="text" class="form-control" placeholder="antrian" required="">
								</div>
							
								<!-- <div class="col-md-6"> -->
									<!-- <div class="form-group">
										<label for="id_dosen">Dosen</label>
										<select id="id_dosen" name="id_dosen"  class="form-control">
											<?php 
											if($dosen){
												foreach ($dosen as $value) { ?>
												<option value="<?php echo $value['id']; ?>"><?php echo $value['mahasiswa']; ?></option>
												<?php }} ?>
											</select>
										</div> -->

										<!-- <div class="row">
										<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">DOSEN</label>
											<select id="id_dosen" name="id_dosen" class="form-control" required="">
											<option>Tidak Ada</option>
											<?php foreach ($dosen as $value) { ?>
											<option value="<?php echo $value['id']; ?>">
											<?php echo $this->session->userdata('mahasiswa'); ?></option>
												<?php }; ?>
											</select>
											</div>
										</div>
										</div>
									
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-2">
													<label for=time_awal>Hari</label>
												</div>

												<div class="col-md-4">
													<select id="hari" name="hari_pertama"  class="form-control">
														<option value=1>Senin</option>
														<option value=2>Selasa</option>
														<option value=3>Rabu</option>
														<option value=4>Kamis</option>
														<option value=5>Jumat</option>
														<option value=6>Sabtu</option>
														<option value=7>Minggu</option>
													</select>
												</div>
												<div class="col-md-2 text-center"><label>s/d</label></div>
												<div class="col-md-4">
													<select id="hari" name="hari_terakhir"  class="form-control">
														<option value=1>Senin</option>
														<option value=2>Selasa</option>
														<option value=3>Rabu</option>
														<option value=4>Kamis</option>
														<option value=5>Jumat</option>
														<option value=6>Sabtu</option>
														<option value=7>Minggu</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-2">
													<label for=time_awal>Jam</label>
												</div>
												<div class="col-md-4">
													<input id="time_awal" name="time_awal" type="time" class="form-control" placeholder="Bagian" required="">
												</div>
												<div class="col-md-2 text-center"><label>s/d</label></div>
												<div class="col-md-4">
													<input id="time_akhir" name="time_akhir" type="time" class="form-control" placeholder="Bagian" required="">
												</div>
											</div>
										</div>
									</div> -->
									<div class="col-md-12">
										<input class="btn btn-raised btn-primary" type="submit" value="Tambah">
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
