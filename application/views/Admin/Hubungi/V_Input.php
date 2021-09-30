
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Input Hubungi</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
						</div>
						<div class="panel-body">
							<form action="<?php echo base_url('Hubungi/inserthubungi'); ?>" method="POST">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" required="">
								</div>
								<div class="form-group">
									<label for="nama">Email</label>
									<input id="nama" maxlength="3" name="email" type="email" class="form-control" placeholder="Email" style="width:30%" required="">
								</div>

								<div class="form-group">
									<label for="layanan_medis">Pesan</label>
									<textarea id="layanan_medis" name="pesan" type="text" class="form-control" placeholder="Pesan" required=""> </textarea>
								</div>
							</div>
							<div class="col-md-12">
								<input class="btn btn-success btn-lg" type="submit" value="Input">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
