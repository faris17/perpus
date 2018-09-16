<?php
	$idbuku		= $_GET['delete'];
	
	$msg = ""; 

	$sql_edit = "DELETE FROM buku WHERE idbuku ='".$idbuku."'";

	$query = mysqli_query($con,$sql_edit) or die(mysqli_error());
	
	if ($query) {
		$kategorimsg ="success";
		$msg = "Data berhasil dihapus";
		$_SESSION['msg']=$msg;
		
		header("location:index.php?buku");
	}else{
		$kategorimsg ="error";
		$msg = "Data gagal dihapus";
		$_SESSION['msg']=$msg;
		header("location:index.php?buku");
	}

	
?>