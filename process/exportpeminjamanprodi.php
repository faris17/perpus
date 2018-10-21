<?php
    session_start();
    include('../assets/fpdf/fpdf.php');
    include('../include/koneksi.php');
	
    $pdf = new FPDF();
    $pdf->AddPage('P','A4');
	
	//mengambil nilai prodi
	$prodi = $_POST['prodi'];
	
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,5,'PEMINJAMAN BELUM KEMBALI','0','1','C',false);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,5,"Perpustakaan FMIPA PRODI $prodi",'0','1','C',false);
    $pdf->Line(10, 25, 225-20, 25);
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(8,6,'No',1,0,'C');
    $pdf->Cell(18,6,'NIM',1,0,'C');
    $pdf->Cell(50,6,'Nama',1,0,'C');
    $pdf->Cell(35,6,'Prodi',1,0,'C');
    $pdf->Cell(20,6,'Tgl Kembali',1,0,'C');
    $pdf->Cell(55,6,'Buku',1,0,'C');
    $pdf->Cell(10,6,'Jumlah',1,0,'C');
    $pdf->Ln(2);
	
	
	
    $no = 0;
	
	if($prodi =='all'){
		 $sql = mysqli_query($con, "SELECT * FROM peminjam, buku, transaksipeminjaman WHERE idbuku=buku_idbuku and idpeminjam=peminjam_idpeminjam and tanggalpemulangan < curdate() and idtransaksipeminjaman not in (SELECT kodetransaksipeminjaman FROM transaksipengembalian WHERE kodetransaksipeminjaman=idtransaksipeminjaman) ORDER BY prodi ASC");
	}
	else {
		$sql = mysqli_query($con, "SELECT * FROM peminjam, buku, transaksipeminjaman WHERE idbuku=buku_idbuku and idpeminjam=peminjam_idpeminjam and prodi='$prodi' and tanggalpemulangan < curdate() and idtransaksipeminjaman not in (SELECT kodetransaksipeminjaman FROM transaksipengembalian WHERE kodetransaksipeminjaman=idtransaksipeminjaman) ORDER BY prodi ASC");
	}
   
    while ($data = mysqli_fetch_array($sql)) {
        $no++;
        $pdf->Ln(4);
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(8,4,$no.".",1,0,'C');
        $pdf->Cell(18,4,$data['kodepeminjam'],1,0,'L');
        $pdf->Cell(50,4,$data['namapeminjam'],1,0,'L');
        $pdf->Cell(35,4,$data['prodi'],1,0,'L');
        $pdf->Cell(20,4,date("d/m/Y",strtotime($data['tanggalpemulangan'])),1,0,'L');
        $pdf->Cell(55,4,$data['namabuku'],1,0,'L');
        $pdf->Cell(10,4,$data['jumlahpinjaman'],1,0,'R');

    }
    $pdf->Ln(5);
    // $pdf->AliasNbPages('{totalPages}');
    // $pdf->Cell(0, 5, "Page " . $pdf->PageNo() . "/{totalPages}", 0, 1);
    $pdf->Output('',"Laporan Peminjaman Prodi $prodi Belum Kembali.pdf");

?>