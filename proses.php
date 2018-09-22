<?php
	include "include/koneksi.php";

	if (isset($_POST['login'])) {
		$username	= $_POST['loginUsername'];
		$password	= md5($_POST['loginPassword']);

		$sql = "select username,password from petugas where username='$username' and password='$password'";

		$query = mysqli_query($con,$sql) or die(mysql_error());

		$row = mysqli_num_rows($query);

		// untuk mendapatkan data session
		$select = mysqli_query($con,"select * from petugas");
		$data = mysqli_fetch_array($select);

		if ($row > 0) {
			session_start();
			$_SESSION['id']=$data['idpetugas'];
			$_SESSION['nama']=$data['namapetugas'];
			$_SESSION['username']=$username;
			header("location:index.php");
		}else{
			header("location:login.php");
		}
	}
?>