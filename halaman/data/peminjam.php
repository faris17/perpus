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
                       
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h4>Data Peminjam</h4>
                            </div>
                        <div class="card-body">
                            <div>
								<div class="table-responsive">
                                        <table id="datatable"  class="table table-striped table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode</th>
                                                    <th>Nama </th>
                                                    <th>Gender</th>
                                                    <th>Alamat</th>
                                                    <th>No. HP</th>
                                                    <th>E-Mail</th>
                                                    <th width="150px"><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
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
<script>
	$(document).ready(function() {
		
		var dataTable = $('#datatable').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"process/listpeminjam.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".lookup-error").html("");
                            $("#datatable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#lookup_processing").css("display","none");
                            
                        }
                    }
                } );
	});
	</script>
