
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Tambah Jadwal</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('Jadwal/insertJadwal'); ?>" method="POST">
								<div class="row form-group">

									<div class="col-md-2">
										<label for="datepicker">Tanggal</label>
									</div>

									<div class="col-md-2">
										<input type="text" autocomplete="off" required name="range_tanggal" class="form-control" id="datepicker">
									</div>

									<!-- <div class="col-md-4">
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
									</div> -->

								</div>
								<div class="row form-group">
									<div class="col-md-2">
										<label for="time_awal">Waktu</label>
									</div>
									<div class="col-md-2">
										<input id="time_awal" name="time_awal" type="time" class="form-control" placeholder="Bagian" required="">
									</div>
									<div class="col-md-1 text-center"><label>s/d</label></div>
									<div class="col-md-2">
										<input id="time_akhir" name="time_akhir" type="time" class="form-control" placeholder="Bagian" required="">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-2">
										<label for="quota">Kuota Bimbingan</label>
									</div>
									<div class="col-md-2">
										<input id="quota" name="quota" onkeypress="return inputAngka(event)" maxlength="3" type="text" class="form-control" required="">
									</div>
								</div>

								<div class="col-md-12">
									<button class="btn btn-raised btn-primary pull-right" type="submit">
										<i class="fa fa-save"></i> Simpan
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
