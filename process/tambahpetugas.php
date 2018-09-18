<?php
$namapetugas	= $_POST['namapetugas'];
$alamat			= $_POST['alamat'];
$gender			= $_POST['gender'];
$nomorhp		= $_POST['nomorhp'];
$username		= $_POST['username'];
$password		= md5($_POST['password']);

$msg = "";

$sql = "INSERT INTO petugas (idpetugas,namapetugas,alamat,gender,nomorhp,username,password) VALUES ('','$namapetugas','$alamat','$gender','$nomorhp','$username','$password')";

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