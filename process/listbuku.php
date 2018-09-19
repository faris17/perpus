<?php
include('../include/koneksi.php');

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
    0 => 'idbuku',
    1 => 'kodebuku', 
    2 => 'namabuku',
	3 => 'tahun',
	4 => 'jumlahbuku',
	5 => 'stok'
);

// getting total number records without any search
$sql = "SELECT idbuku, kodebuku, namabuku,tahun, jumlahbuku,stok ";
$sql.=" FROM buku";
$query=mysqli_query($con, $sql) or die("listbuku.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT idbuku, kodebuku, namabuku,tahun ,jumlahbuku,stok";
    $sql.=" FROM buku";
    $sql.=" WHERE namabuku LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
    $sql.=" OR kodebuku LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tahun LIKE '".$requestData['search']['value']."%' ";
    $query=mysqli_query($con, $sql) or die("listbuku.php: get PO");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($con, $sql) or die("listbuku.php: get PO"); // again run query with limit
    
} else {    

    $sql = "SELECT idbuku, kodebuku, namabuku,tahun,jumlahbuku,stok ";
    $sql.=" FROM buku";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $query=mysqli_query($con, $sql) or die("listbuku.php: get PO");
    
}

$data = array();
$no=1 + $requestData['start'];
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 

    $nestedData[] = $no++;
    $nestedData[] = $row["kodebuku"];
    $nestedData[] = $row["namabuku"];
    $nestedData[] = $row["tahun"];
    $nestedData[] = $row["jumlahbuku"];
    $nestedData[] = $row["stok"];
    $nestedData[] = '<td><center>
                     <a href="?bukuedit&id='.$row['idbuku'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                     <a href="?buku&delete='.$row['idbuku'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
                     </center></td>';        
    
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