
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Edit Akun</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="<?php echo base_url('User/updateUser'); ?>" method="POST">
								<input type="hidden" value="<?php echo $id_user; ?>" name="id_user">
								<div class="col-md-6">
									<?php 
									if($list){
										foreach ($list as $value) {
											?>
											<div class="form-group">
												<label for="username">Username</label>
												<input id="username" name="username" type="text" class="form-control" placeholder="Username" value="<?php echo $value['username']; ?>" required="">
											</div>
											<div class="form-group">
												<label for="nama">Nama</label>
												<input id="nama" name="nama" type="text" class="form-control" value="<?php echo $value['nama']; ?>" placeholder="Nama" required="">
											</div>
											<div class="form-group">
												<label for="akses">Hak Akses</label>
												<select name="akses" class="form-control">
													<option value="<?php echo $value['akses']; ?>">Admin</option>
													<option value="Admin">Admin</option>
													<option value="Pengurus">Pengurus</option>
													<option value="Pegawai">Pegawai</option>
													<option value="User">User</option>
												</select>
											</div>
										</div>
										<?php
									}
								}
								?>
								<div class="col-md-12">
									<input class="btn btn-raised btn-primary" type="submit" value="Edit">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
