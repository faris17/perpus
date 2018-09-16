<?php
if(isset($_GET['delete']) and $_GET['delete']!="") {
	include "process/delbuku.php"; //link ke delete buku
}
?>
      <!-- Breadcrumb-->
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Buku</li>
                </ul>
            </div>
        </div>
        <section class="form">
            <div class="container-fluid">
            <!-- Page Header-->
                <header> 
                    <a href="?bukuadd" class="btn btn-primary btn-sm">Tambah Buku</a>
                </header>
                <div class="row">
                    <div class="col-lg-12">
					<?php include "halaman/notifikasi.php"; ?>
                        <!-- pesan pemberitahuan -->
                        <?php  
                            if (isset($_GET['msg'])=="berhasil") { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Informasi |</strong> <?php echo $_SESSION['msg']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }elseif (isset($_GET['msg'])=="gagal") { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Informasi |</strong> <?php echo $_SESSION['msg']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }else{

                            }
                        ?>
                        

                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h4>Data Buku</h4>
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
                                            <th>Kode Buku</th>
                                            <th>Nama Buku</th>
                                            <th>Tahun Buku</th>
                                            <th>Jumlah Buku</th>
                                            <th>Stok Buku</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $batas = 20;
                                            $hal = @$_GET['hal'];
                                            if (empty($hal)) {
                                                $posisi = 0;
                                                $hal = 1;
                                            }else{
                                                $posisi = ($hal - 1) * $batas;
                                            }
                                            $no=1;
                                            if ($_SERVER['REQUEST_METHOD']=="POST") {
                                                $qcari = trim(mysql_real_escape_string($_POST['qcari']));
                                                if ($qcari != '') {
                                                    $sql = "SELECT * FROM buku WHERE idbuku LIKE '%$qcari%' or kodebuku LIKE '%$qcari%'";
                                                    $query = $sql;
                                                    $queryjml = $sql;
                                                }else{
                                                    $query = "SELECT * FROM buku LIMIT $posisi, $batas";
                                                    $queryjml = "SELECT * FROM buku";
                                                    $no = $posisi + 1;
                                                }
                                            }else{
                                                $query = "SELECT * FROM buku LIMIT $posisi, $batas";
                                                $queryjml = "SELECT * FROM buku";
                                                $no = $posisi + 1;
                                            }
                                            $query_dsn=mysqli_query($con,$query) or die(mysqli_error());
                                            if (mysqli_num_rows($query_dsn) > 0) {
                                                while ($data=mysqli_fetch_array($query_dsn)) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $no++; ?></th>
                                                        <td><?php echo $data['kodebuku']; ?></td>
                                                        <td><?php echo $data['namabuku']; ?></td>
                                                        <td><?php echo $data['tahun']; ?></td>
                                                        <td><?php echo $data['jumlahbuku']; ?></td>
                                                        <td><?php echo $data['stok']; ?></td>
                                                        <td align="center">
                                                            <a href="?bukuedit&&id=<?php echo $data['idbuku']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <a href="?buku&delete=<?php echo $data['idbuku']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
                            <?php
                                if ($qcari=="") { ?>
                                <div style="float: left;">
                                    <?php
                                    $jml =mysqli_num_rows(mysqli_query($con,$queryjml));
                                    echo "Jumlah Data : <b>$jml</b>";
                                    ?>
                                </div>
                                <nav aria-label="Page navigation example" style="float: right;">
                                    <ul class="pagination justify-content-center pagination-sm">
                                    <ul class="pagination pagination-sm" style="margin:0">
                                        <?php
                                            $jml_hal = ceil($jml/$batas);
                                            for ($i=1; $i <= $jml_hal; $i++) { 
                                                if ($i != $hal) {
                                                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?buku&hal=$i\">$i</a></li>";
                                                }else{
                                                    echo "<li class=\"page-item active\"><a class=\"page-link\">$i</a></li>";
                                                }
                                            }
                                            ?>
                                    </ul>
                                </div>
                                <?php
                            }else{ 
                                echo "<div style=\"float:left;\">";
                                $jml = mysqli_num_rows(mysqli_query($con,$queryjml));
                                echo "Data Hasil Pencarian : <b>$jml</b>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
        </section>

