<?php 


	$idpeminjam			= $_GET['id'];
	$kodepeminjam	= $_POST['kodepeminjam'];
	$namapeminjam	= $_POST['namapeminjam'];
	$gender			= $_POST['gender'];
	$alamat			= $_POST['alamat'];
	$nohp			= $_POST['nohp'];
	$email			= $_POST['email'];

	$msg = "";

	$sql_edit = "UPDATE peminjam SET kodepeminjam='$kodepeminjam', namapeminjam='$namapeminjam', gender='$gender', alamat='$alamat', nohp='$nohp', email='$email' WHERE idpeminjam='$idpeminjam'";

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