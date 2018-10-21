 <?php 
 
 if(isset($_GET['id']) !=""){
    if(isset($_POST['update'])){
        include"process/tambahtransaksipengembalian.php";
    }
    $edit ='edit';
    $idtransaksipeminjaman = $_GET['id'];
	$query = mysqli_query($con,"SELECT * FROM transaksipeminjaman, peminjam, buku WHERE idpeminjam=peminjam_idpeminjam and idbuku=buku_idbuku and idtransaksipeminjaman='$idtransaksipeminjaman'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query);
	
	//menghitung hari keterlambatan
	$tgl_sekarang = explode("-", date('Y-m-d'));
	$tgl_kembali =  explode("-", $data['tanggalpemulangan']);
	$date1 =  mktime(0, 0, 0, $tgl_sekarang[1],$tgl_sekarang[2],$tgl_sekarang[0]);
	$date2 =  mktime(0, 0, 0, $tgl_kembali[1],$tgl_kembali[2],$tgl_kembali[0]);
	$interval =($date2 - $date1)/(3600*24) * -1;
	
	if(date('Y-m-d') >$data['tanggalpemulangan']){
		
		//Menghitung denda
		$querydenda = mysqli_query($con,"SELECT nominal FROM denda WHERE lamadenda='1'") or die(mysqli_error($con));
		$datadenda = mysqli_fetch_array($querydenda);
		$besardenda = $datadenda['nominal'];
		
		//jumlah yang dibayar
		$totalhargadenda = $interval * $besardenda;
	}
	else {
		$totalhargadenda=0;
		$interval =0;
	}
	
	
 }
 ?>
 <div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="?pengembalian">Pengembalian</a>
            </li>
            <?php if(isset($edit)) { ?>
            <li class="breadcrumb-item active">Edit Pengembalian, Tanggal Sekarang <?php echo date('d/m/Y'); ?></li>
            <?php } 
            else {
            ?>
            <li class="breadcrumb-item active">Tambah Pengembalian, Tanggal Sekarang <?php echo date('d/m/Y'); ?></li>
            <?php } ?>
        </ul>
    </div>
    
</div>
<section class="forms">
    <div class="container-fluid">
	
    <!-- Page Header-->
        <header> 
        </header>
        <div class="row">
            <div class="col-lg-12">
            <?php include "halaman/notifikasi.php"; ?>
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4><strong style='color:blue'>Pinjaman </strong> <?php echo date('d/m/Y',strtotime($data['tanggalpeminjaman'])).", <strong style='color:purple'>Tanggal Kembalikan </strong>".date('d/m/Y',strtotime($data['tanggalpemulangan'])); ?></h4>
                    </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="">
							<input type="hidden" name="kodetransaksipeminjaman" value="<?php echo $data['idtransaksipeminjaman']; ?>" />
							<div class="form-group col-lg-6">       
                                    <label>Denda</label>
                                    <input type="text" id="formatuang" class="form-control form-control-sm" name="denda" value="<?php echo $totalhargadenda; ?>" >
                             </div>
                                <!-- <div class="form-group col-lg-6">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" placeholder="Tanggal Pinjam" class="form-control form-control-sm" name="tanggalpinjam" required oninvalid="this.setCustomValidity('Tanggal Peminjaman kosong !!')" oninput="this.setCustomValidity('')" value="<?php //echo $data['kodepeminjam']; ?>">
                                </div> -->
                                <div class="form-group col-lg-6">       
                                    <label>Tanggal Kembali</label>
                                    <input type="text" placeholder="Tanggal Kembali" class="form-control form-control-sm" name="tanggalkembali" required oninvalid="this.setCustomValidity('Tanggal Pengembalian kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo date('d/m/Y'); ?>" id="tanggalpengembalian">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Kode Peminjam</label>
                                    <input type="tex" placeholder="Kode Peminjam" class="form-control form-control-sm" name="kodepeminjam" required oninvalid="this.setCustomValidity('E-Mail kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['kodepeminjam']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Kode Buku</label>
                                    <input type="text" placeholder="Kode Buku" class="form-control form-control-sm" name="kodebuku" required oninvalid="this.setCustomValidity('E-Mail kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['kodebuku']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Keterlambatan Hari</label>
                                    <input type="number" placeholder="Keterlambatan" class="form-control form-control-sm" name="keterlambatan" value="<?php echo $interval; ?>" >
                                </div>
                                
                                <div class="form-group col-lg-6">       
                                    <label>Jumlah Pinjaman Buku</label>
                                    <input type="number" class="form-control form-control-sm" name="jumlahkembali" required oninvalid="this.setCustomValidity('Jumlah Peminjaman kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['jumlahpinjaman']; ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                <?php if(isset($edit)) { ?>
                                 <input type="submit" class="btn btn-info" name="update" value="Simpan">
                                <?php }  ?>
                                   
                                    <a href="?peminjaman" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="line"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>