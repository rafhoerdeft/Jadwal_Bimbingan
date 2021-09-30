
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<h3 class="page-title">Daftar Jadwal</h3>
				</div>
				<div class="col-md-2" align="right">
        			<a href="<?php echo base_url('Jadwal/inputJadwal'); ?>" class="btn btn-raised btn-primary"><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('success')){  ?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php 
					} elseif ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="false fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php } ?>
					<div class="panel">
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Tanggal</th>
										<th>Waktu</th>
										<th style="text-align: center;">Quota Mahasiswa</th>
										<th style="text-align: center;">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									if($jadwal){
										foreach ($jadwal as $value) {
											// $encrypted_string = $this->encrypt->encode($value['id_jadwal']);
											// $id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);
											$id = encode($value['id_jadwal']);
											?>
											<tr>
												<td><?php echo $i++ . "."; ?></td>												
												<!-- <td><?php echo convertDay($value['hari_pertama']).' s/d '.convertDay($value['hari_terakhir']); ?></td> -->
												<!-- <td><?= date('d-m-Y', strtotime($value['tgl_pertama'])).' s/d '.date('d-m-Y', strtotime($value['tgl_terakhir'])) ?></td> -->
												<td><?= date('d-m-Y', strtotime($value['tgl_pertama'])) ?></td>
												<td><?= date('H:i', strtotime($value['jam_pertama'])).' s/d '.date('H:i', strtotime($value['jam_terakhir'])) ?></td>
												<td align="center"><?= $value['quota'] ?></td>
												<td align="center">
												
													<a title="Ubah" href="<?php echo base_url('Jadwal/jadwalEdit/'.$id); ?>" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>

													<a title="Hapus" href="<?php echo base_url('Jadwal/deleteJadwal/'.$id); ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
													
												</td>
											</tr>
											<?php
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>