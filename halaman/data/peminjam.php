<?php
if(isset($_GET['delete']) and $_GET['delete']!="") {
	include "process/delpeminjam.php"; //link ke delete buku
}
?>
      <!-- Breadcrumb-->
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Peminjam</li>
                </ul>
            </div>
        </div>
        <section class="form">
            <div class="container-fluid">
            <!-- Page Header-->
                <header> 
                    <a href="?peminjamadd" class="btn btn-primary btn-sm">Tambah Peminjam</a>
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
                                <h4>Data Peminjam</h4>
                            </div>
                        <div class="card-body">
                            <div>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <input type="text" placeholder="Pencarian" class="form-control form-control-sm col-lg-11" name="qcari" style="float: left;">
                                        <button class="btn btn-success btn-sm" type="submit" name="qcari">Cari</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode Peminjam</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>No. HP</th>
                                                    <th>E-Mail</th>
                                                    <th width="150px"><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $batas = 2;
                                                    $hal = @$_GET['hal'];
                                                    if (empty($hal)) {
                                                        $posisi = 0;
                                                        $hal = 1;
                                                    }else{
                                                        $posisi = ($hal - 1) * $batas;
                                                    }
                                                    $no=1;
                                                    if ($_SERVER['REQUEST_METHOD']=="POST") {
                                                        $qcari = trim(mysqli_real_escape_string($_POST['qcari']));
                                                        if ($qcari != "") {
                                                            $sql = "SELECT * FROM peminjam WHERE kodepeminjam LIKE '%$qcari%' or namapeminjam LIKE '%$qcari%'";
                                                            $query = $sql;
                                                            $queryjml = $sql;
                                                        }else{
                                                            $query = "SELECT * FROM peminjam LIMIT $posisi, $batas";
                                                            $queryjml = "SELECT * FROM buku";
                                                            $no = $posisi + 1;
                                                        }
                                                    }else{
                                                        $query = "SELECT * FROM peminjam LIMIT $posisi, $batas";
                                                        $queryjml = "SELECT * FROM peminjam";
                                                        $no = $posisi + 1;
                                                    }
                                                    $query_all=mysqli_query($con,$query) or die(mysqli_error());
                                                    if (mysqli_num_rows($query_all) > 0) {
                                                        while ($data=mysqli_fetch_array($query_all)) { ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $no++; ?></th>
                                                                <td><?php echo $data['kodepeminjam']; ?></td>
                                                                <td><?php echo $data['namapeminjam']; ?></td>
                                                                <td><?php if ($data['gender']=="pria") { echo "Laki - laki";}else{echo "Perempuan";} ?></td>
                                                                <td><?php echo $data['alamat']; ?></td>
                                                                <td><?php echo $data['nohp']; ?></td>
                                                                <td><?php echo $data['email']; ?></td>
                                                                <td align="center">
                                                                    <a href="?peminjamedit&&id=<?php echo $data['idpeminjam']; ?>" class="btn-success btn-sm">Edit</a>
                                                                    <a href="?peminjam&delete=<?php echo $data['idpeminjam']; ?>" class="btn-danger btn-sm">Delete</a>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

