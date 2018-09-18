 <?php 
 if(isset($_POST['save'])=='tambah') 
	include "process/tambahdenda.php";
 if(isset($_GET['id']) !=""){
	if(isset($_POST['update'])){
		include"process/editdenda.php";
	}
	$edit ='edit';
	$iddenda = $_GET['id'];
	$query = mysqli_query($con,"SELECT * FROM denda WHERE iddenda='$iddenda'") or die(mysqli_error($con));
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
                <a href="?denda">Denda</a>
            </li>
			<?php if(isset($edit)) { ?>
            <li class="breadcrumb-item active">Edit Denda</li>
			<?php } 
			else {
			?>
			<li class="breadcrumb-item active">Tambah Denda</li>
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
                        <h4>Tambah Denda</h4>
                    </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="">
                                
                                <div class="form-group col-lg-6">       
                                    <label>Lama Denda /Hari</label>
                                    <input type="text" placeholder="Lama Denda" class="form-control form-control-sm" name="lamadenda" required oninvalid="this.setCustomValidity('Lama Denda Kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['lamadenda']; ?>">
                                </div>
                                <div class="form-group col-lg-6">       
                                    <label>Nominal</label>
                                    <input type="text" placeholder="Nominal" class="form-control form-control-sm" name="nominal" required oninvalid="this.setCustomValidity('Nominal kosong !!')" oninput="this.setCustomValidity('')" value="<?php echo $data['nominal']; ?>">
                                </div>
                                <div class="form-group col-lg-6">
								<?php if(isset($edit)) { ?>
								 <input type="submit" class="btn btn-info" name="update" value="edit">
								<?php } 
								else {
								?>
								 <input type="submit" class="btn btn-primary" name="save" value="tambah">
								<?php } ?>
                                   
                                    <a href="index.php?denda" class="btn btn-danger">Kembali</a>
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