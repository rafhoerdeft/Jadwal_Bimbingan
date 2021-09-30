
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<h3 class="page-title">Kotak Masuk</h3>
				</div>
				<!-- <div class="col-md-2" align="right">
        			<a href="<?php echo base_url('Hubungi/inputHubungi'); ?>" class="btn btn-raised btn-primary"><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah</a>
				</div> -->
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php echo $status; ?>
					<div class="panel">
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th style="text-align: center;">No.</th>
										<th style="text-align: center;">Nama</th>
										<th style="text-align: center;">Email</th>
										<th width="30%" style="text-align: center;">Message</th>
										<th style="text-align: center;">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									if($hubungi){
										foreach ($hubungi as $value) {
											$encrypted_string = $this->encrypt->encode($value['id_hubungi']);
											$id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);
											?>
											<tr>
												<td align="center"><?php echo $i++ . "."; ?></td>
												<td align="center"><?php echo $value['nama']; ?></td>
												<td align="center"><?php echo $value['email']; ?></td>
												<td  align="center" class="long-text"><?php echo $value['pesan']; ?></td>
												<td align="center">
													<a href="<?php echo base_url('Hubungi/hubungiAnswer/'.$id); ?>" class="btn btn-sm btn-success"><span class="fa fa-comments"></span></a>
													<a href="<?php echo base_url('Hubungi/hubungiDetail/'.$id); ?>" class="btn btn-sm btn-primary"><span class="fa fa-search"></span></a>
													
													<button class="btn btn-sm btn-danger" onclick="deleteThis('<?php echo base_url('Hubungi/deleteHubungi/'.$id); ?>');" ><span class="fa fa-trash"></span></button>
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