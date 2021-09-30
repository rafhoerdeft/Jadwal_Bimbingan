<style type="text/css">
	#counter {
	    width: 100px;
	    height: 40px;
	    background-color: white;
	    text-align: center;
	    font-size: 18pt;
	    border: solid 2px black;
	    line-height: 35px;
	    color: #e43030;
	}
</style>

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<h3 class="page-title">Daftar Antrian</h3>
				</div>
				<!-- <div class="col-md-2" align="right">
        			<a href="<?php echo base_url('Antrian/inputAntrian'); ?>" class="btn btn-raised btn-primary"><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah</a>
				</div> -->
			</div>

			<div class="panel">
				<div class="panel-body" style="padding-bottom: 5px;">
					<div class="row">
						<div class="col-md-6 pull-left">
							<span style="font-size: 14pt">Antrian saat ini:</span> <label id="counter"><?= ($antrianNow['antrian'] != null?$antrianNow['antrian']:'--') ?></label>
						</div>

						<div class="col-md-6" align="right" style="margin-top: 5px">
							<?php if ($antrianNow['antrian'] != null) { ?>
								<!-- <a title="Lewati Antrian" href="<?= base_url('Antrian/skipAntrian/'.encode($antrianNow['id_antrian'])); ?>" class="btn btn-sm btn-warning"><span class="fa fa-fast-forward"></span></a> -->
								<span style="font-size: 14pt">Bimbingan Selanjutnya:</span> 
								<a title="Lanjut" href="<?= base_url('Antrian/selesaiAntrian/'.encode($antrianNow['id_antrian'])); ?>" class="btn btn-sm btn-success"><span class="fa fa-arrow-right"></span></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('success')){  ?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php }elseif($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="false fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php } ?>
					<div class="panel">
						<div class="panel-body">
							<table id="doctor-table" class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nomor Antrian</th>
										<th>Tanggal</th>
										<th>Nama Mhs</th>
										<th>NPM</th>
										<th>Topik Bimbingan</th>
										<th style="text-align: center;">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$i = 1;
										if($antrian){
											foreach ($antrian as $value) {
												// $encrypted_string = $this->encrypt->encode($value['id_antrian']);
												// $id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);
												$id = encode($value['id_antrian']);
									?> 
												<tr <?= ($value['status']==2?'style="background-color: yellow"':'') ?>>
													<td><?php echo $i++ . "."; ?></td>
													<td><?php echo $value['antrian']; ?></td>
													<td><?= date('d-m-Y', strtotime($value['tanggal'])) ?></td>
													<td><?php echo $value['nama_mhs']; ?></td>
													<td><?php echo $value['nim']; ?></td>
													<!-- <td><?php echo $value['nama']; ?></td> -->
													<td><?php echo $value['topik_bimbingan']; ?></td>
													<td align="center">

														<?php if ($value['status']==2) { ?>
															<a title="Selesai" href="<?php echo base_url('Antrian/selesaiAntrian/'.$id); ?>" class="btn btn-sm btn-success"><span class="fa fa-check"></span></a>
														<?php } ?>

														<a title="Hapus" href="<?php echo base_url('Antrian/deleteAntrian/'.$id); ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
														<!-- <a title="Lewati Antrian" href="<?php echo base_url('Antrian/skipAntrian/'.$id); ?>" class="btn btn-sm btn-warning"><span class="fa fa-hand-o-right"></span></a> -->
														<!-- <button class="btn btn-sm btn-danger" onclick="deleteThis('<?php echo base_url('Antrian/deleteAntrian/'.$id); ?>');" ><span class="fa fa-trash"></span></button>  -->
														<!-- <button class="btn btn-sm btn-success" onclick="skipThis('<?php echo base_url('Antrian/skipAntrian/'.$id); ?>');" ><span class="fa fa-hand-o-right"></span></button>  -->
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