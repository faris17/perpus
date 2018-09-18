<?php 


	$iddenda	= $_GET['iddenda'];
	$lamadenda	= $_POST['lamadenda'];
	$nominal	= $_POST['nominal'];
	
	$msg = "";

	$sql_edit = "UPDATE denda SET lamadenda='$lamadenda', nominal='$nominal' WHERE iddenda='$iddenda'";

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