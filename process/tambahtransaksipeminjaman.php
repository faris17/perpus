<?php
$kodepeminjam		= $_POST['kodepeminjam'];
$kodebuku			= $_POST['kodebuku'];
$tglpinjam	= $_POST['tanggalpeminjaman'];
	$tgl    = explode('/',$tglpinjam);
	$tanggalpeminjaman = $tgl[2]."-".$tgl[1]."-".$tgl[0];

$tglkembali = $_POST['tanggalpengembalian'];
	$tgl    = explode('/',$tglkembali);
	$tanggalpemulangan = $tgl[2]."-".$tgl[1]."-".$tgl[0];
	
$jumlahpinjaman		= $_POST['jumlahpinjaman'];
$petugas 			= $_SESSION['id'];	
$msg = "";

//ngambil id peminjam berdasarkan kodepeminjam
	$query = mysqli_query($con,"SELECT idpeminjam FROM peminjam WHERE kodepeminjam='$kodepeminjam'") or die(mysqli_error($con));
	$hsl = mysqli_fetch_array($query);
	$idpeminjam = $hsl['idpeminjam'];
	
//ngambil id buku berdasarkan kodebuku
	$query = mysqli_query($con,"SELECT idbuku FROM buku WHERE kodebuku='$kodebuku'") or die(mysqli_error($con));
	$hasil = mysqli_fetch_array($query);
	$idbuku = $hasil['idbuku'];

$sql = "INSERT INTO transaksipeminjaman (idtransaksipeminjaman,tanggalpeminjaman,tanggalpemulangan,keterangan,peminjam_idpeminjam,buku_idbuku,petugas_idpetugas,jumlahpinjaman) VALUES ('','$tanggalpeminjaman','$tanggalpemulangan','','$idpeminjam','$idbuku','$petugas','$jumlahpinjaman')";

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