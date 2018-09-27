<?php
//peminjaman hari ini
$tgl = date('Y-m-d');
$sql = "SELECT COUNT(*) AS jumlahpinjaman FROM transaksipeminjaman WHERE tanggalpeminjaman='".$tgl."'";

$query = mysqli_query($con,$sql);
$hasil= mysqli_fetch_row($query);

//pengembalian hari ini
$tglkembali = date('Y-m-d');
$sqlkembali = "SELECT COUNT(*) AS jumlahkembali FROM transaksipengembalian WHERE tanggalkembali='".$tglkembali."'";

$querykembali = mysqli_query($con,$sqlkembali);
$hasilkembali= mysqli_fetch_row($querykembali);
?>
<section class="dashboard-counts section-padding">
		  <div class="container-fluid">
			 <div class="row">
			 <div class="col-md-12">
				<h2><?php echo date("D, d/m/Y"); ?></h2>
				<br>
			 </div>
				<!-- Count item widget-->
				<div class="col-xl-4 col-md-4 col-6">
				  <div class="wrapper count-title d-flex">
					 <div class="icon"><i class="fa fa-book"></i></div>
					 <div class="name"><strong class="text-uppercase">Jumlah Pinjaman Hari Ini</strong>
						<div class="count-number">
							<?php echo $hasil[0]; ?>
						</div>
					 </div>
				  </div>
				</div>
				
				<div class="col-xl-4 col-md-4 col-6">
				  <div class="wrapper count-title d-flex">
					 <div class="icon"><i class="fa fa-undo"></i></div>
					 <div class="name"><strong class="text-uppercase">Jumlah Pengembalian Hari Ini</strong>
						<div class="count-number">
							<?php echo $hasilkembali[0]; ?>
						</div>
					 </div>
				  </div>
				</div>
				<br><br><br>
				<br><br>
				<div class="col-md-8">
				  <div class="wrapper count-title d-flex">
					
					 <div class="name"><strong class="text-uppercase"><u>Perpustakaan FMIPA UNIPA</u></strong>
					<p>
					Adalah perpustakaan yang menyediakan berbagai buku untuk referensi mahasiswa.
					</p>
					 </div>
				  </div>
				</div>
				
				
			 </div>
		  </div>
		</section>
		