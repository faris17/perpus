 <?php 
 if(isset($_POST['save'])=='tambah') 
	include "process/tambahtransaksipeminjaman.php";
 if(isset($_GET['id']) !=""){
	if(isset($_POST['update'])){
		include"process/edittransaksipeminjaman.php";
	}
	$edit ='edit';
	$idtransaksipeminjaman = $_GET['id'];
	$query = mysqli_query($con,"SELECT * FROM transaksipeminjaman, peminjam, buku WHERE idpeminjam=peminjam_idpeminjam and idbuku=buku_idbuku and idtransaksipeminjaman='$idtransaksipeminjaman'") or die(mysqli_error($con));
	$data = mysqli_fetch_array($query);
 }
 ?>
 <div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="?peminjaman">Transaksi Peminjaman</a>
            </li>
			<?php if(isset($edit)) { ?>
            <li class="breadcrumb-item active">Edit Peminjaman</li>
			<?php } 
			else {
			?>
			<li class="breadcrumb-item active">Peminjaman</li>
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
                        <h4>Tambah Peminjaman</h4>
                    </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="">
                                <div class="form-group col-lg-6">
                                    <label>Kode Peminjam</label>
                                    <input type="text" placeholder="Kode Peminjam" class="form-control form-control-sm" name="kodepeminjam" required oninvalid="this.setCustomValidity('Kode buku kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['kodepeminjam']; ?>">
                                </div> 
								<div class="form-group col-lg-6">
                                    <label>Kode Buku</label>
                                    <input type="text" placeholder="Kode Buku" class="form-control form-control-sm" name="kodebuku" required oninvalid="this.setCustomValidity('Kode buku kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['kodebuku']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Tanggal Peminjaman</label>
                                    <input type="text"  class="form-control form-control-sm" name="tanggalpeminjaman"  id="tanggalpeminjaman" value="<?php echo date('d/m/Y',strtotime($data['tanggalpeminjaman'])); ?>">
                                </div>
								<div class="form-group col-lg-6">       
                                    <label>Tanggal Pengembalian</label>
                                    <input type="text"  class="form-control form-control-sm" name="tanggalpengembalian"   id="tanggalpengembalian" value="<?php echo date('d/m/Y',strtotime($data['tanggalpemulangan'])); ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Jumlah Peminjaman</label>
                                    <input type="number" class="form-control form-control-sm" name="jumlahpinjaman" required oninvalid="this.setCustomValidity('Jumlah buku  yang dipinjaman kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['jumlahpinjaman']; ?>">
                                </div>
                                
                                <div class="form-group col-lg-6">
								<?php if(isset($edit)) { ?>
								<input type="hidden" name="idtransaksipeminjaman" value="<?php echo $data['idtransaksipeminjaman']; ?>" />
								 <input type="submit" class="btn btn-info" name="update" value="edit">
								<?php } 
								else {
								?>
								 <input type="submit" class="btn btn-primary" name="save" value="tambah">
								<?php } ?>
                                   
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