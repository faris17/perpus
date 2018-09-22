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
	
	//Link ke Petugas
	else if(isset($_GET['petugas'])){
		$menupetugas='active';
		include "halaman/data/petugas.php"; //include ke data petugas
	}
	else if(isset($_GET['petugasadd'])) {
		$menupetugas='active';
		include "halaman/form/petugas.php"; //include ke data buku add
	}
	else if(isset($_GET['petugasedit'])) {
		$menupetugas='active';
		include "halaman/form/petugas.php"; //include ke data buku edit
	}
	
	//Link Ke Denda
	else if(isset($_GET['denda'])) {
		$menudenda='active';
		include "halaman/data/denda.php"; //include ke data denda
	}
	else if(isset($_GET['dendaadd'])) {
		$menudenda='active';
		include "halaman/form/denda.php"; //include ke data denda
	}
	else if(isset($_GET['dendaedit'])) {
		$menudenda='active';
		include "halaman/form/denda.php"; //include ke data denda
	}
	
	//Link ke biodata peminjam
	else if(isset($_GET['peminjam'])) {
		$menupeminjam='active';
		include "halaman/data/peminjam.php"; //include ke data buku
	}
	else if(isset($_GET['peminjamadd'])) {
		$menupeminjam='active';
		include "halaman/form/peminjam.php"; //include ke data buku add
	}
	else if(isset($_GET['peminjamedit'])) {
		$menupeminjam='active';
		include "halaman/form/peminjam.php"; //include ke data buku edit
	}
	
	//Link ke Peminjaman
	else if(isset($_GET['peminjaman'])) {
		$menupeminjaman='active';
		include "halaman/data/peminjaman.php"; //include ke data buku
	}
	else if(isset($_GET['peminjamandd'])) {
		$menupeminjaman='active';
		include "halaman/form/transaksipeminjaman.php"; //include ke data buku add
	}
	else if(isset($_GET['peminjamanedit'])) {
		$menupeminjaman='active';
		include "halaman/form/transaksipeminjaman.php"; //include ke data buku edit
	}
	else if(isset($_GET['pengembalian'])){
		$menupengembalian='active';
		include "halaman/form/transaksipengembalian.php"; //include ke data buku edit
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
		