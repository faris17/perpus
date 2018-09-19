<?php
include('../include/koneksi.php');

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
    0 => 'idpeminjam',
    1 => 'kodepeminjam', 
    2 => 'namapeminjam',
    3 => 'gender',
    4 => 'alamat',
    5 => 'nohp',
    6 => 'email'
);

// getting total number records without any search
$sql = "SELECT idpeminjam, kodepeminjam, namapeminjam, gender, alamat, nohp, email ";
$sql.=" FROM peminjam";
$query=mysqli_query($con, $sql) or die("listpeminjam.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT idpeminjam, kodepeminjam, namapeminjam, gender, alamat, nohp, email ";
$sql.=" FROM peminjam";
    $sql.=" WHERE kodepeminjam LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
    $sql.=" OR namapeminjam LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR gender LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR alamat LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nohp LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
    $query=mysqli_query($con, $sql) or die("listpeminjam.php: get PO");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($con, $sql) or die("listpeminjam.php: get PO"); // again run query with limit
    
} else {    

    $sql = "SELECT idpeminjam, kodepeminjam, namapeminjam, gender, alamat, nohp, email ";
$sql.=" FROM peminjam";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $query=mysqli_query($con, $sql) or die("listbuku.php: get PO");
    
}

$data = array();
$no=1;
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 

    $nestedData[] = $no++;
    $nestedData[] = $row["kodepeminjam"];
    $nestedData[] = ucwords($row["namapeminjam"]);
    $nestedData[] = ucwords($row["gender"]);
    $nestedData[] = $row["alamat"];
    $nestedData[] = $row["nohp"];
    $nestedData[] = $row["email"];
    $nestedData[] = '<td><center>
                     <a href="?peminjamedit&id='.$row['idpeminjam'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                     <a href="?peminjam&delete='.$row['idpeminjam'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
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