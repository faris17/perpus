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
                    <a href="?pencarianexport" class="btn btn-info btn-sm" style="float: right;">Export PDF</a>
                </header>
                <div>
                  <?php include "../process/exportpeminjamanprodi.php"; ?>
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
