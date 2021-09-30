<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Masuk</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/linearicons/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/toastr/toastr.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.css'); ?>">
	<link href="<?php echo base_url('assets/css/font.source-sans-pro.css'); ?>" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.webp'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.webp'); ?>">  
</head>
<body>
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<p class="lead">Registrasi Dosen</p>
							</div>
							<form class="form-auth-small" method="POST" action="<?php echo base_url('Register/insertakun'); ?>">
								<div class="form-group">
									<!-- <label for="nama">Nama</label> -->
									<input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" required="">
								</div>
								<div class="form-group">
									<!-- <label for="nama">NIP</label> -->
									<input id="nip" name="nip" type="text" class="form-control" placeholder="NIP" required="">
								</div>
								<div class="form-group">
									<!-- <label for="username">Username</label> -->
									<input id="username" name="username" type="text" class="form-control" placeholder="Username" required="">
								</div>
								<div class="form-group">
									<!-- <label for="password">Password</label> -->
									<input id="password" name="password" type="password" class="form-control" placeholder="Password" required="">
								</div>
								
								
								<!-- <div class="form-group">
									<label for="nama">Hak Akses</label>
									<input id="akses" name="" type="text" class="form-control" value="Dosen" readonly>
								</div> -->
								<!-- <div class="form-group">
									<label for="akses">Hak Akses</label>
									<select name="akses" class="form-control">
										<option value="Admin">Dosen</option>
										<option value="Pengurus">Pengurus</option>
										<option value="Pegawai">Pegawai</option>
										<option value="User">User</option>
									</select>
								</div> -->
								<input type="submit" class="btn btn-primary btn-lg btn-block" value="Daftar"/>
							</form>
							<br>
							<div class="row">
								<div class="col-md-3">
									<a href="<?= base_url() ?>">
										<i class="fa fa-home"></i> Home
									</a>
								</div>

								<div class="col-md-9">
									<p class="pull-right"> 
										Sudah punya akun? <a href="Login" style="font-weight: bold">Login</a> 
									</p>
								</div>
							</div>		

						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Register Dosen</h1>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/klorofil-common.js');  ?>"></script>
	<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/toastr/toastr.min.js'); ?>"></script>
	<script type="text/javascript">
	<?php 
	if($this->session->flashdata('error')){
		?>
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	Command: toastr["error"]("<?php echo $this->session->flashdata('error'); ?>")
	<?php
	}
	?>
	</script>
</body>
</html>