<?php 

	$idpetugas		= $_POST['idpetugas'];
	$namapetugas	= $_POST['namapetugas'];
	$alamat			= $_POST['alamat'];
	$gender			= $_POST['gender'];
	$nomorhp		= $_POST['nomorhp'];
	$username		= $_POST['username'];
	
	if($_POST['password'] !=""){
		$password		= md5($_POST['password']);
	}

	$msg = "";
	
	if(isset($password)){
		$sql_edit = "UPDATE petugas SET namapetugas='$namapetugas', alamat='$alamat', gender='$gender', nomorhp='$nomorhp', username='$username', password='$password' WHERE idpetugas='$idpetugas'";
	}
	else {
		$sql_edit = "UPDATE petugas SET namapetugas='$namapetugas', alamat='$alamat', gender='$gender', nomorhp='$nomorhp', username='$username' WHERE idpetugas='$idpetugas'";
	}
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