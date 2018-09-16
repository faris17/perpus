<?php 


	$idbuku		= $_GET['id'];
	$kodebuku	= $_POST['kodebuku'];
	$namabuku	= $_POST['namabuku'];
	$tahunbuku	= $_POST['tahunbuku'];
	$jumlahbuku	= $_POST['jumlahbuku'];
	$stokbuku	= $_POST['stokbuku'];

	$msg = "";

	$sql_edit = "UPDATE buku SET kodebuku='$kodebuku', namabuku='$namabuku', tahun='$tahunbuku', jumlahbuku='$jumlahbuku', stok='$stokbuku' WHERE idbuku='$idbuku'";

	$query = mysqli_query($con,$sql_edit) or die(mysqli_error());

	if ($query) {
		$kategorimsg ="success";
		$msg = "Data berhasil diperbaharui";
		$_SESSION['msg']=$msg;
	}else{
		$kategorimsg ="error";
		$msg = "Data gagal diperbaharui";
		$_SESSION['msg']=$msg;
	}

	$_SESSION['msg']=$msg;
?>