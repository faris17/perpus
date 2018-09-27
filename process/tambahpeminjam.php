<?php
$kodepeminjam	= $_POST['kodepeminjam'];
$namapeminjam	= $_POST['namapeminjam'];
$gender			= $_POST['gender'];
$alamat			= $_POST['alamat'];
$nohp			= $_POST['nohp'];
$email			= $_POST['email'];
$prodi			= $_POST['prodi'];

$msg = "";

$sql = "INSERT INTO peminjam (idpeminjam,kodepeminjam,namapeminjam,gender,alamat,nohp,email,prodi) VALUES ('','$kodepeminjam','$namapeminjam','$gender','$alamat','$nohp','$email','$prodi')";

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