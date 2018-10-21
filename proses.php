<?php
	include "include/koneksi.php";

	if (isset($_POST['login'])) {
		$username	= $_POST['loginUsername'];
		$password	= md5($_POST['loginPassword']);

		$sql = "select idpetugas, username,password from petugas where username='$username' and password='$password'";

		$query = mysqli_query($con,$sql) or die(mysql_error());

		$row = mysqli_num_rows($query);

		$data = mysqli_fetch_row($query);
		if ($row > 0) {
			session_start();
			$_SESSION['id']=$data[0];
			$_SESSION['nama']=$data[1];
			$_SESSION['username']=$username;
			header("location:index.php");
		}else{
			header("location:login.php");
		}
	}
?>