 <?php 
 if(isset($_POST['save'])=='tambah') 
	include "process/tambahpeminjam.php";
 if(isset($_GET['id']) !=""){
	if(isset($_POST['update'])){
		include"process/editpeminjam.php";
	}
	$edit ='edit';
	$idpeminjam = $_GET['id'];
	$query = mysqli_query($con,"SELECT * FROM peminjam WHERE idpeminjam='$idpeminjam'") or die(mysqli_error($con));
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
                <a href="?peminjam">Peminjam</a>
            </li>
			<?php if(isset($edit)) { ?>
            <li class="breadcrumb-item active">Edit Peminjam</li>
			<?php } 
			else {
			?>
			<li class="breadcrumb-item active">Tambah Peminjam</li>
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
                        <h4>Tambah Peminjam</h4>
                    </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="">
                                <div class="form-group col-lg-6">
                                    <label>Kode Peminjam</label>
                                    <input type="text" placeholder="Kode Peminjam" class="form-control form-control-sm" name="kodepeminjam" required oninvalid="this.setCustomValidity('Kode peminjam kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['kodepeminjam']; ?>">
                                </div>
								<div class="form-group col-lg-6">
                                    <label>Program Studi</label>
									 <select class="form-control form-control-sm" name="prodi">
										<option value="Matematika" <?php if(isset($data['prodi']) and $data['prodi']=='Matematika') echo "selected='selected'" ; ?>>Matematika</option>
										<option value="Biologi" <?php if(isset($data['prodi']) and $data['prodi']=='Biologi') echo "selected='selected'" ; ?>>Biologi</option>
                                        <option value="Kimia" <?php if(isset($data['prodi']) and $data['prodi']=='Kimia') echo "selected='selected'" ; ?>>Kimia</option>
                                        <option value="Fisika" <?php if(isset($data['prodi']) and $data['prodi']=='Fisika') echo "selected='selected'" ; ?>>Fisika</option>
                                        <option value="Pend.Matematika" <?php if(isset($data['prodi']) and $data['prodi']=='Pend.Matematika') echo "selected='selected'" ; ?>>Pend.Matematika</option>
                                        <option value="Pend.Biologi" <?php if(isset($data['prodi']) and $data['prodi']=='Pend.Biologi') echo "selected='selected'" ; ?>>Pend.Biologi</option>
                                        <option value="Pend.Kimia" <?php if(isset($data['prodi']) and $data['prodi']=='Pend.Kimia') echo "selected='selected'" ; ?>>Pend.Kimia</option>
                                        <option value="Pend.Fisika" <?php if(isset($data['prodi']) and $data['prodi']=='Pend.Fisika') echo "selected='selected'" ; ?>>Pend.Fisika</option>
                                        <option value="Dosen/Staf" <?php if(isset($data['prodi']) and $data['prodi']=='Dosen/Staf') echo "selected='selected'" ; ?>>Dosen/Staf</option>
                                       
									</select>
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Nama Peminjam</label>
                                    <input type="text" placeholder="Nama Peminjam" class="form-control form-control-sm" name="namapeminjam"  oninvalid="this.setCustomValidity('Nama peminjam kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['namapeminjam']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control form-control-sm" name="gender">
                                        
                                        <option value="pria" <?php if(isset($data['gender']) and $data['gender']=='pria') echo "selected='selected'" ; ?>>Laki - laki</option>
                                        <option value="wanita" <?php if(isset($data['gender']) and $data['gender']=='wanita') echo "selected='selected'" ; ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Alamat</label>
                                    <input type="text" placeholder="Alamat" class="form-control form-control-sm" name="alamat" required oninvalid="this.setCustomValidity('Alamat kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['alamat']; ?>" maxlenght="4">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>No. Handphone</label>
                                    <input type="number" placeholder="Nomor Handphone" class="form-control form-control-sm" name="nohp" required oninvalid="this.setCustomValidity('No. Handphone kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['nohp']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>E-Mail</label>
                                    <input type="email" placeholder="E-Mail" class="form-control form-control-sm" name="email" required oninvalid="this.setCustomValidity('E-Mail kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['email']; ?>">
                                </div>
                                <div class="form-group col-lg-6">
								<?php if(isset($edit)) { ?>
								 <input type="submit" class="btn btn-info" name="update" value="Edit">
								<?php } 
								else {
								?>
								 <input type="submit" class="btn btn-primary" name="save" value="Tambah">
								<?php } ?>
                                   
                                    <a href="?peminjam" class="btn btn-danger">Kembali</a>
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