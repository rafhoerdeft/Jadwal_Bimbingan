
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Ubah Jadwal</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('Jadwal/updateJadwal'); ?>" method="POST">

								<input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">

								<div class="row form-group">
									<div class="col-md-2">
										<label for=time_awal>Tanggal</label>
									</div>

									<div class="col-md-2">
										<!-- <input type="text" required name="range_tanggal" class="form-control" id="daterange" value="<?= date('d/m/Y', strtotime($list['tgl_pertama'])).' - '.date('d/m/Y', strtotime($list['tgl_terakhir'])) ?>"> -->
										<input type="text" autocomplete="off" required name="range_tanggal" class="form-control" id="datepicker" value="<?= date('d-m-Y', strtotime($list['tgl_pertama'])) ?>">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-2">
										<label for=time_awal>Waktu</label>
									</div>
									<div class="col-md-2">
										<input id="time_awal" name="time_awal" type="time" class="form-control" placeholder="Bagian" required="" value="<?= $list['jam_pertama'] ?>">
									</div>
									<div class="col-md-1 text-center"><label>s/d</label></div>
									<div class="col-md-2">
										<input id="time_akhir" name="time_akhir" type="time" class="form-control" placeholder="Bagian" required="" value="<?= $list['jam_terakhir'] ?>">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-2">
										<label for="quota">Kuota Bimbingan</label>
									</div>
									<div class="col-md-2">
										<input id="quota" name="quota" onkeypress="return inputAngka(event)" maxlength="3" type="text" class="form-control" required="" value="<?= $list['quota'] ?>">
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

