 <?php 
 if(isset($_POST['save'])=='tambah') 
	include "process/tambahbuku.php";
 if(isset($_GET['id']) !=""){
	if(isset($_POST['update'])){
		include"process/editbuku.php";
	}
	$edit ='edit';
	$idbuku = $_GET['id'];
	$query = mysqli_query($con,"SELECT * FROM buku WHERE idbuku='$idbuku'") or die(mysqli_error($con));
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
                <a href="?buku">Buku</a>
            </li>
			<?php if(isset($edit)) { ?>
            <li class="breadcrumb-item active">Edit Buku</li>
			<?php } 
			else {
			?>
			<li class="breadcrumb-item active">Tambah Buku</li>
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
                        <h4>Tambah Buku</h4>
                    </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="">
                                <div class="form-group col-lg-6">
                                    <label>Kode Buku</label>
                                    <input type="text" placeholder="Kode Buku" class="form-control form-control-sm" name="kodebuku" required oninvalid="this.setCustomValidity('Kode buku kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['kodebuku']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Nama Buku</label>
                                    <input type="text" placeholder="Nama Buku" class="form-control form-control-sm" name="namabuku" required oninvalid="this.setCustomValidity('Nama buku kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['namabuku']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Tahun Buku</label>
                                    <input type="number" placeholder="Tahun Buku" class="form-control form-control-sm" name="tahunbuku" required oninvalid="this.setCustomValidity('Tahun buku kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['tahun']; ?>" maxlenght="4" pattern="\d*">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Jumlah Buku</label>
                                    <input type="number" placeholder="Jumlah Buku" class="form-control form-control-sm" name="jumlahbuku" required oninvalid="this.setCustomValidity('Jumlah buku kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['jumlahbuku']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Stok Buku</label>
                                    <input type="number" placeholder="Stok Buku" class="form-control form-control-sm" name="stokbuku" required oninvalid="this.setCustomValidity('Stok buku kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['stok']; ?>">
                                </div>
                                <div class="form-group col-lg-6">
								<?php if(isset($edit)) { ?>
								 <input type="submit" class="btn btn-info" name="update" value="edit">
								<?php } 
								else {
								?>
								 <input type="submit" class="btn btn-primary" name="save" value="tambah">
								<?php } ?>
                                   
                                    <a href="index.php?page=buku" class="btn btn-danger">Kembali</a>
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