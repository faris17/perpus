<?php
$kodebuku	= $_POST['kodebuku'];
$namabuku	= $_POST['namabuku'];
$tahunbuku	= $_POST['tahunbuku'];
$jumlahbuku	= $_POST['jumlahbuku'];
$stokbuku	= $_POST['stokbuku'];

$msg = "";

$sql = "INSERT INTO buku (idbuku,kodebuku,namabuku,tahun,jumlahbuku,stok) VALUES ('','$kodebuku','$namabuku','$tahunbuku','$jumlahbuku','$stokbuku')";

$query = mysqli_query($con,$sql);

if ($query) {
	$kategorimsg ="success";
	$msg = "Data berhasil ditambahkan";
	$_SESSION['msg']=$msg;
}else{
	$kategorimsg ="error";
	$msg = "Data gagal ditambahkan";
	$_SESSION['msg']=$msg;
}

?>