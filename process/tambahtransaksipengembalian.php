
<?php
$kodepeminjam		= $_POST['kodepeminjam'];
$kodebuku			= $_POST['kodebuku'];
$tglkembali	= $_POST['tanggalkembali'];
	$tgl    = explode('/',$tglkembali);
	$tglkembali = $tgl[2]."-".$tgl[1]."-".$tgl[0];

$jumlahpinjaman		= $_POST['jumlahpinjaman'];
$petugas 			= $_SESSION['id'];
$keterlambatanhari = $_POST['keterlambatan'];
$denda = str_replace(array('Rp','.'),'',$_POST['denda']);
$jumlahkembali = $_POST['jumlahkembali'];
$kodetransaksipeminjaman = $_POST['kodetransaksipeminjaman'];
	
$msg = "";

//ngambil id peminjam berdasarkan kodepeminjam
	$query = mysqli_query($con,"SELECT idpeminjam FROM peminjam WHERE kodepeminjam='$kodepeminjam'") or die(mysqli_error($con));
	$hsl = mysqli_fetch_array($query);
	$idpeminjam = $hsl['idpeminjam'];
	
//ngambil id buku berdasarkan kodebuku
	$query = mysqli_query($con,"SELECT idbuku FROM buku WHERE kodebuku='$kodebuku'") or die(mysqli_error($con));
	$hasil = mysqli_fetch_array($query);
	$idbuku = $hasil['idbuku'];

$sql = "INSERT INTO transaksipengembalian (idtransaksipengembalian,tanggalkembali,denda,petugas_idpetugas,peminjam_idpeminjam,buku_idbuku,jumlahkembali,jumlahhariketerlambatan, kodetransaksipeminjaman) VALUES ('','$tglkembali','$denda','$petugas','$idpeminjam','$idbuku','$jumlahkembali','$keterlambatanhari',$kodetransaksipeminjaman)";

$query = mysqli_query($con,$sql);

if ($query) {
	$kategorimsg ="success";
	$msg = "Buku berhasil dikembalikan";
	$_SESSION['msg']=$msg;
}else{
	$kategorimsg ="error";
	$msg = "Data gagal ditambahkan";
	$_SESSION['msg']=$msg;
}

?>