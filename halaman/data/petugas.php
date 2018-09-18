<?php
if(isset($_GET['delete']) and $_GET['delete']!="") {
	include "process/delpetugas.php"; //link ke delete buku
}
?>
      <!-- Breadcrumb-->
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo $url; ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Petugas</li>
                </ul>
            </div>
        </div>
        <section class="form">
            <div class="container-fluid">
            <!-- Page Header-->
                <header> 
                    <a href="?petugasadd" class="btn btn-primary btn-sm">Tambah Petugas</a>
                </header>
                <div class="row">
                    <div class="col-lg-12">
					 <!-- pesan pemberitahuan -->
					<?php include "halaman/notifikasi.php"; ?>
                    <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h4>Data Petugas</h4>
                            </div>
                        <div class="card-body">
                            <div>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <input type="text" placeholder="Pencarian" class="form-control form-control-sm" name="qcari">
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Petugas</th>
                                            <th>Alamat</th>
                                            <th>Nomor HP</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$no=1;
                                            $query = "SELECT * FROM petugas";
											 $queryjml = "SELECT * FROM  petugas";
                                            $query_dsn=mysqli_query($con,$query) or die(mysqli_error());
                                            if (mysqli_num_rows($query_dsn) > 0) {
                                                while ($data=mysqli_fetch_array($query_dsn)) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $no++; ?></th>
                                                        <td><?php echo $data['namapetugas']; ?></td>
                                                        <td><?php echo $data['alamat']; ?></td>
                                                        <td><?php echo $data['nomorhp']; ?></td>
                                                        <td><?php echo $data['username']; ?></td>
                                                        <td align="center">
                                                            <a href="?petugasedit&&id=<?php echo $data['idpetugas']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <a href="?petugas&delete=<?php echo $data['idpetugas']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>  
                                                <?php 
                                                } 
                                            }else{
                                                echo "<tr><td colspan=\"6\"align=\"center\">Data tidak ditemukan</td></tr>";
                                            } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="line"></div>
                         
                        </div>
                        </div>
                    </div>
                </div>
        </section>

