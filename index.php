<?php
error_reporting(0);
session_start();
include "include/koneksi.php";
	$url 	= "http://localhost/perpus/";
	include "include/header.php";
?>
  <body>
  	<?php
	if ($_SESSION['username']=="") {
		include "halaman/login.php";
	}else{

  		
  	?>
	 
	 <div class="page">
  	<?php
  	include "include/header_menu.php";
  	
	//Link ke Buku
	if(isset($_GET['buku'])) {
		$menubuku='active';
		include "halaman/data/buku.php"; //include ke data buku
	}
	else if(isset($_GET['bukuadd'])) {
		$menubuku='active';
		include "halaman/form/buku.php"; //include ke data buku add
	}
	else if(isset($_GET['bukuedit'])) {
		$menubuku='active';
		include "halaman/form/buku.php"; //include ke data buku edit
	}
	
	
	else  {
		$menuhome='active';
		include "halaman/data/home.php"; //link ke halaman depan
	}
	//endhalaman
	include "include/sidebar_menu.php";
  	include "include/footer.php";
}
?>
		