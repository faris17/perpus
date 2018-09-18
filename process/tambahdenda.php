<?php
$lamadenda	= $_POST['lamadenda'];
$nominal	= $_POST['nominal'];

$msg = "";

$sql = "INSERT INTO denda (iddenda,lamadenda,nominal) VALUES ('','$lamadenda','$nominal')";

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