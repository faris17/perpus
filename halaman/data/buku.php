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
					<!-- pesan pemberitahuan -->
					<?php include "halaman/notifikasi.php"; ?>
                        
						<div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h4>Data Buku</h4>
                            </div>
                        <div class="card-body">
                            <div>
                                <table id="datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Buku</th>
                                            <th>Nama Buku</th>
                                            <th>Tahun</th>
                                            <th>Jumlah Buku</th>
                                            <th>Stok</th>
                                            <th>Action</th>
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
        </section>
	<script>
	$(document).ready(function() {
		
		var dataTable = $('#datatable').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"process/listbuku.php", // json datasource
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
