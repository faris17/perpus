<footer class="main-footer">
		  <div class="container-fluid">
			 <div class="row">
				<div class="col-sm-6">
				  <p>Komunitas Papua-Code Manokwari &copy; 2018</p>
				</div>
				<div class="col-sm-6 text-right">
				  <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
				  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
				</div>
			 </div>
		  </div>
		</footer>
	 </div>
	 <!-- JavaScript files-->
	 <script src="<?php echo $url; ?>assets/vendor/jquery/jquery.min.js"></script>
	 <script src="<?php echo $url; ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
	 <script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	 <script src="<?php echo $url; ?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
	 <script src="<?php echo $url; ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
	 <script src="<?php echo $url; ?>assets/vendor/chart.js/Chart.min.js"></script>
	 <script src="<?php echo $url; ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
	 <script src="<?php echo $url; ?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	 <script src="<?php echo $url; ?>assets/js/charts-home.js"></script>
	 <!-- Main File-->
	 <script src="<?php echo $url; ?>assets/js/front.js"></script>
	<script src="<?php echo $url; ?>assets/js/datatables.min.js" type="text/javascript"  ></script>
	<script src="<?php echo $url; ?>assets/js/jquery.dataTables.js" type="text/javascript"  ></script>
		<script src="<?php echo $url; ?>assets/js/jquery-ui.js"></script>
		<script src="<?php echo $url; ?>assets/js/jquery.maskMoney.min.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		$( function() {
			var dateToday = new Date();
			var dates = $("#tanggalpeminjaman, #tanggalpengembalian").datepicker({
			  defaultDate: "+2d",
			  dateFormat:'d/m/yy',
			  changeMonth: true,
			  numberOfMonths: 1,
			  minDate: dateToday,
			  onSelect: function(selectedDate) {
				  var option = this.id == "tanggalpeminjaman" ? "minDate" : "maxDate",
				  instance = $(this).data("datepicker"),
				  date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
				  dates.not(this).datepicker("option", option, date);
			  }
			});
		  });
		
		$("#tanggalpengembalian").datepicker({
			dateFormat:'d/m/yy'
		});
		
		$('#formatuang').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
	});
	</script>
  </body>
</html>