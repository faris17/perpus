 <?php 
 if(isset($_POST['save'])=='tambah') 
	include "process/tambahpetugas.php";
 if(isset($_GET['id']) !=""){
	if(isset($_POST['update'])){
		include"process/editpetugas.php";
	}
	$edit ='edit';
	$idpetugas = $_GET['id'];
	$query = mysqli_query($con,"SELECT * FROM petugas WHERE idpetugas='$idpetugas'") or die(mysqli_error($con));
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
                <a href="?petugas">Petugas</a>
            </li>
			<?php if(isset($edit)) { ?>
            <li class="breadcrumb-item active">Edit Petugas</li>
			<?php } 
			else {
			?>
			<li class="breadcrumb-item active">Tambah Petugas</li>
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
                        <h4>Tambah Petugas</h4>
                    </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="">
                                <div class="form-group col-lg-6">
                                    <label>Nama Petugas</label>
                                    <input type="text" placeholder="Nama Petugas" class="form-control form-control-sm" name="namapetugas" required oninvalid="this.setCustomValidity('Nama petugas kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['namapetugas']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Alamat</label>
                                    <input type="text" placeholder="Alamat" class="form-control form-control-sm" name="alamat" value="<?php echo $data['alamat']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Gender</label>
                                    <label><input type="radio" name="gender" value="pria" <?php if(isset($data['gender']) and $data['gender']=='pria') echo "checked"; ?> /> Pria</label>
                                    <label><input type="radio" name="gender" value="wanita" <?php if(isset($data['gender']) and $data['gender']=='wanita') echo "checked"; ?> /> Wanita</label>
                                </div>
                               <div class="form-group col-lg-6">       
                                    <label>Nomor HP</label>
                                    <input type="text" placeholder="Nomor HP" class="form-control form-control-sm" name="nomorhp" value="<?php echo $data['nomorhp']; ?>">
                                </div>
								<div class="form-group col-lg-6">       
                                    <label>Username</label>
                                    <input type="text" placeholder="Username" class="form-control form-control-sm" name="username" value="<?php echo $data['username']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Password</label>
                                    <input type="password" placeholder="Password" class="form-control form-control-sm" name="password" >
									<?php if(isset($edit) and $data['password'] !="") { ?>
								 <small>Biarkan Kosong bila tidak mau mengganti password</small>
								<?php } if (isset($edit) and $data['password'] =="") { ?>
								 <small>Password belum ada, silahkan dibuat</small>
								<?php } ?>
                                </div>
                                
                                <div class="form-group col-lg-6">
								<?php if(isset($edit)) { ?>
								<input type="hidden" name="idpetugas" value="<?php echo $data['idpetugas']; ?>">
								 <input type="submit" class="btn btn-info" value="Update" name="update" >
								<?php } 
								else {
								?>
								 <input type="submit" class="btn btn-primary" name="save" value="tambah">
								<?php } ?>
                                   
                                    <a href="index.php?page=petugas" class="btn btn-danger">Kembali</a>
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