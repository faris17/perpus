<?php
	$idtransaksipeminjaman		= $_GET['delete'];
	
	$msg = ""; 

	$sql_edit = "DELETE FROM transaksipeminjaman WHERE idtransaksipeminjaman ='".$idtransaksipeminjaman."'";

	$query = mysqli_query($con,$sql_edit) or die(mysqli_error());
	
	if ($query) {
		$kategorimsg ="success";
		$msg = "Data berhasil dihapus";
		$_SESSION['msg']=$msg;
		
	}else{
		$kategorimsg ="error";
		$msg = "Data gagal dihapus";
		$_SESSION['msg']=$msg;
	}

	
?>