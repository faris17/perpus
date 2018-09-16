<?php  
if (isset($kategorimsg) and $kategorimsg=="success") { ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil |</strong> <?php echo $_SESSION['msg']; ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } 
if (isset($kategorimsg)  and $kategorimsg =="error") { ?>
	<div class="alert alert-error alert-dismissible fade show" role="alert">
		<strong>Gagal |</strong> <?php echo $_SESSION['msg']; ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php }
?>