<?php //$this->load->view('Admin/V_Navigation'); ?>

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Statistik</h3>
					<p class="panel-subtitle"><?php echo date('l, d F Y'); ?></p>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="metric">
								<span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
								<p>
									<span class="number"><?= $antrianHariIni ?></span>
									<span class="title">Antrian Masuk Hari Ini</span>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="metric">
								<span class="icon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
								<p>
									<span class="number"><?= $totAntrian ?></span>
									<span class="title">Total Jumlah Antrian</span>
								</p>
							</div>
						</div>
						<!-- <div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
								<p>
									<span class="number"> -</span>
									<span class="title">Antrian berikutnya</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
								<p>
									<span class="number"> -</span>
									<span class="title">Waktu tunggu</span>
								</p>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>