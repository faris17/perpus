<?php
if(isset($_GET['delete']) and $_GET['delete']!="") {
	include "process/deltransaksipeminjaman.php"; //link ke delete buku
}
?>
      <!-- Breadcrumb-->
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Peminjaman</li>
                </ul>
            </div>
        </div>
        <section class="form">
            <div class="container-fluid">
            <!-- Page Header-->
                <header> 
                    <a href="?peminjamandd" class="btn btn-primary btn-sm">Pinjam Buku</a>
					 <a href="?peminjaman" class="btn btn-warning btn-sm">Transaksi Peminjaman</a>
					
					 <div style="float:right" id="table-filter">
					  <form method="post" action="<?php echo $url; ?>process/exportpeminjamanprodi.php">
						Pilih Program Studi : 
						<select name="prodi" style="height:30px">
							<option value="all">Semua Prodi</option>
							<option value="Biologi">Biologi</option>
							<option value="Fisika">Fisika</option>
							<option value="Kimia">Kimia</option>
							<option value="Matematika">Matematika</option>
							<option value="Pend.Matematika">Pend.Matematika</option>
							<option value="Pend.Biologi">Pend.Biologi</option>
							<option value="Pend.Kimia">Pend.Kimia</option>
							<option value="Pend.Fisika">Pend.Fisika</option>
							<option value="Dosen/Staf">Dosen/Staf</option>
						</select>
						 <button type="submit" style="float:right;height:30px" name="export" target="_blank" class="btn btn-info btn-sm">Export PDF</a>
						 </form>
					 </div>
					
					
                </header>
                <div class="row">
                    <div class="col-lg-12">
					<?php include "halaman/notifikasi.php"; ?>
                       
                        <div class="card">
                        <div class="card-body">
                            <div>
								<div class="table-responsive">
                                    
                                        <table id="datatables"  class="table table-striped table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nim</th>
                                                    <th>Nama </th>
                                                    <th>Prodi</th>
                                                    <th>Tanggal Kembali</th>
                                                    <th>Buku</th>
                                                    <th>Jumlah</th>
                                                    <th width="150px"><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no=1;
                                                    $sql = "SELECT * FROM peminjam, buku, transaksipeminjaman WHERE idbuku=buku_idbuku and idpeminjam=peminjam_idpeminjam and tanggalpemulangan < curdate() and idtransaksipeminjaman not in (SELECT kodetransaksipeminjaman FROM transaksipengembalian WHERE kodetransaksipeminjaman=idtransaksipeminjaman)";
                                                    $row = mysqli_fetch_array($con,$sql);
                                                    // $sql2 = "SELECT * FROM transaksipengembalian WHERE kodetransaksipeminjaman='".$row['idtransaksipeminjaman']."'";
                                                    $query = mysqli_query($con,$sql);
                                                    
                                                    while ($data = mysqli_fetch_array($query)) { ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $data['kodepeminjam']; ?></td>
                                                            <td><?php echo $data['namapeminjam']; ?></td>
                                                            <td><?php echo $data['prodi']; ?></td>
                                                            <td><?php echo date("d/m/Y",strtotime($data['tanggalpemulangan'])); ?></td>
                                                            <td><?php echo $data['namabuku']; ?></td>
                                                            <td><?php echo $data['jumlahpinjaman']; ?></td>
                                                            <?php
                                                                $sqlcek = "SELECT count(*)as nilai from transaksipengembalian WHERE kodetransaksipeminjaman='".$data['idtransaksipeminjaman']."'";
                                                                $hasilsqlcek = mysqli_query($con, $sqlcek);
                                                                $hasilquery = mysqli_fetch_array($hasilsqlcek);
                                                                if($hasilquery['nilai'] > 0){
                                                                    echo '<td>
                                                                                 <a href="?peminjamanedit&id='.$data['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                                                                 <a href="?peminjaman&delete='.$data['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a> </td>';      
                                                                }
                                                                else {
                                                                    echo '<td>
                                                                                 <a href="?peminjamanedit&id='.$data['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                                                                 <a href="?peminjaman&delete='.$data['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a> 
                                                                                 <a href="?pengembalian&id='.$data['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Pengembalian" class="btn btn-sm btn-info"> <i class="fa fa-undo"></i> </a></td>';      
                                                                }
                                                            ?>
                                                        </tr>
                                                    <?php

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
                </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function (){
                var table = $('#datatables').DataTable({
                   dom: 'lr<"table-filter-container">tip',
				   
                   initComplete: function(settings){
                      var api = new $.fn.dataTable.Api( settings );
                      $('.table-filter-container', api.table().container()).append(
                         $('#table-filter').detach().show()
                      );
                      
                      $('#table-filter select').on('change', function(){
                         table.search(this.value).draw();   
                      });       
                   }
				});
			});
        </script>
