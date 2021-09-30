<div class="clearfix"></div>
		<footer>
			<!-- <div class="container-fluid">
				<p class="copyright">&copy; 2018. All Rights Reserved.</p>
			</div> -->
		</footer>
	</div>

	<script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/daterangepicker/moment.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/daterangepicker/daterangepicker2.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url('assets/vendor/timepicker/bootstrap-timepicker.js'); ?>"></script> -->
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/klorofil-common.js');  ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.js'); ?>"></script>
  	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/toastr/toastr.min.js'); ?>"></script>

	<script type="text/javascript">

		$('#datepicker').datepicker({
	      autoclose: true,
	      dateFormat: 'dd-mm-yy'
	    });

	    $('#daterange').daterangepicker({
	      autoclose: true,
	      locale: {
		      format: 'DD/MM/YYYY'
		  }
	    });
	</script>

	<script type="text/javascript">
	    function inputAngka(evt) {
	        var charCode = (evt.which) ? evt.which : event.keyCode
	        // alert(charCode);
	        if (charCode > 31 && (charCode < 46 || charCode > 57))

	        return false;
	        return true;
	    }
	</script>
	
</body>
</html>