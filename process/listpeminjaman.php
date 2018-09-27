<?php
include('../include/koneksi.php');

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
    0 => 'kodepeminjam',
    1 => 'namapeminjam', 
    2 => 'tanggalpeminjaman',
    3 => 'tanggalkembali',
    4 => 'buku',
    5 => 'jumlah',
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM peminjam, buku, transaksipeminjaman";
$sql.=" WHERE idbuku=buku_idbuku and idpeminjam=peminjam_idpeminjam";

$query=mysqli_query($con, $sql) or die("listpeminjaman.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT * ";
$sql.=" FROM transaksipeminjaman,peminjam, buku";
	$sql.=" WHERE idbuku=buku_idbuku and idpeminjam=peminjam_idpeminjam";
    $sql.=" AND kodepeminjam LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
    $sql.=" OR namapeminjam LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR namabuku LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tanggalpeminjaman LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tanggalpemulangan LIKE '".$requestData['search']['value']."%' ";
	
	
	$requestData['search']['value']."%' ";
	
    $query=mysqli_query($con, $sql) or die("listpeminjam.php: get PO");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($con, $sql) or die("listpeminjaman.php: get PO"); // again run query with limit
    
} else {    

    $sql = "SELECT * ";
	$sql.=" FROM peminjam, buku, transaksipeminjaman";
	$sql.=" WHERE idbuku=buku_idbuku and idpeminjam=peminjam_idpeminjam";

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $query=mysqli_query($con, $sql) or die("listpeminjaman.php: get PO");
    
}

$data = array();
$no=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 
	
	//cek peminjaman yang sudah dikembalikan
	$sqlcek = "SELECT count(*)as nilai from transaksipengembalian WHERE kodetransaksipeminjaman='".$row['idtransaksipeminjaman']."'";
	$hasilsqlcek = mysqli_query($con, $sqlcek);
	$hasilquery = mysqli_fetch_array($hasilsqlcek);
	
	
    $nestedData[] = $no++;
    $nestedData[] = $row["kodepeminjam"];
    $nestedData[] = ucwords($row["namapeminjam"]);
    $nestedData[] = ucwords($row["prodi"]);
    $nestedData[] = date("d/m/Y",strtotime($row["tanggalpemulangan"]));
    $nestedData[] = $row["namabuku"];
    $nestedData[] = $row["jumlahpinjaman"];
	if($hasilquery['nilai'] > 0){
		$nestedData[] = '<td>
                     <a href="?peminjamanedit&id='.$row['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                     <a href="?peminjaman&delete='.$row['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a> </td>';      
	}
	else {
		$nestedData[] = '<td>
                     <a href="?peminjamanedit&id='.$row['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                     <a href="?peminjaman&delete='.$row['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a> 
					 <a href="?pengembalian&id='.$row['idtransaksipeminjaman'].'"  data-toggle="tooltip" title="Pengembalian" class="btn btn-sm btn-info"> <i class="fa fa-undo"></i> </a></td>';      
	}
      
    
    $data[] = $nestedData;
    
}



$json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval( $totalData ),  // total number of records
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
            );

echo json_encode($json_data);  // send data as json format

?>