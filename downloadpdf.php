<?php
	define('FPDF_FONTPATH','fpdf/font/');
	include "koneksi.php";
	require('fpdf/fpdf.php');

	class PDF extends FPDF {
		function Header() {
			$nim = $_GET['nim'];
			$nama = "";
			$prodi = "";
			$show = "SELECT * FROM mhs WHERE NIM='$nim';";
			$queryshow = mysql_query($show);
			while($hasil = mysql_fetch_array($queryshow)) {
				$nama = $hasil['Nama'];
				$prodi = $hasil['Progdi'];
			}
			$this->Image('Images/dinus.jpg',1,0.75,4);
			$this->SetFont('Arial','B',18);
			$this->Cell(0,0.75,' Kartu Rencana Studi Mahasiswa ',0,0,'C');
			$this->Ln();
			$this->Ln();
			$this->Cell(5);
			$this->SetFont('Arial','B',12);
			$this->Cell(15,0.75,' NIM         : ' .$nim,0,0,'L');
			$this->Ln();
			$this->Cell(5);
			$this->SetFont('Arial','B',12);
			$this->Cell(15,0.75,' Nama      : ' .$nama,0,0,'L');
			$this->Ln();
			$this->Cell(5);
			$this->SetFont('Arial','B',12);
			$this->Cell(15,0.75,' Progdi     : ' .$prodi,0,0,'L');
			$this->Ln();
			$this->SetFont('Arial','B',14);
			$this->Line(1, 5, 27, 5);
			$this->Ln();
		}
	}

	$pdf=new PDF('L','cm','Letter');
	$pdf->Open();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetMargins(1,1,1);
	$pdf->SetFont('Arial','B',12);

	//membuat kop tabel
	$x=$pdf->GetY();
	$pdf->SetY($x+1);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(1,1.5,'No',1,0,'L');
	$pdf->Cell(3,1.5,'Kode MK',1,0,'L');
	$pdf->Cell(6,1.5,'Mata Kuliah',1,0,'L');
	$pdf->Cell(1,1.5,'SKS',1,0,'L');
	$pdf->Cell(3,1.5,'Kelompok',1,0,'L');
	$pdf->Cell(4.5,1.5,'Jadwal 1',1,0,'L');
	$pdf->Cell(1.5,1.5,'Ruang',1,0,'L');
	$pdf->Cell(4.5,1.5,'Jadwal 2',1,0,'L');
	$pdf->Cell(1.5,1.5,'Ruang',1,0,'L');
	$pdf->Ln();

	//query dan arraying
	$i = 1;
	$jumsks = 0;
	$nim = $_GET['nim'];;
	$tampil = "SELECT * FROM data_krsmhs AS k
				INNER JOIN data_jadwal AS j ON k.id_jadwal=j.id_jadwal
				INNER JOIN data_matkul AS m ON j.kodemk=m.kodemk
				WHERE k.NIM='$nim';";
	//$tampil = "SELECT * FROM mhs";
	$querytampil = mysql_query($tampil);
	while($hasil = mysql_fetch_array($querytampil)) {
		$kode = $hasil['kodemk'];
		$nama = $hasil['namamk'];
		$sks = $hasil['sks'];
		$kelompok = $hasil['kelompok'];
		$hari = $hasil['hari'];
		$jamm = $hasil['jammulai'];
		$jams = $hasil['jamselesai'];
		$ruang = $hasil['koderuang'];
		$hari2 = $hasil['hari2'];
		$jamm2 = $hasil['jammulai2'];
		$jams2 = $hasil['jamselesai2'];
		$ruang2 = $hasil['koderuang2'];
		
		$j1 = $hari. ", " .$jamm. " - " .$jams;
		$j2 = $hari2. ", " .$jamm2. " - " .$jams2;

		$pdf->SetFont('Arial','B',10);
		
		$pdf->Cell(1,0.5,$i,1,0,'L');
		$pdf->Cell(3,0.5,$kode,1,0,'L');
		$pdf->Cell(6,0.5,$nama,1,0,'L');
		$pdf->Cell(1,0.5,$sks,1,0,'L');
		$pdf->Cell(3,0.5,$kelompok,1,0,'L');
		$pdf->Cell(4.5,0.5,$j1,1,0,'L');
		$pdf->Cell(1.5,0.5,$ruang,1,0,'L');
		$pdf->Cell(4.5,0.5,$j2,1,0,'L');
		$pdf->Cell(1.5,0.5,$ruang2,1,0,'L');
		$pdf->Ln();
		
		$jumsks += $sks;
		$i++;
	}
	//$pdf->Cell(1,0.5,$i,1,0,'L');
	//$pdf->Cell(3,0.5,$kode,1,0,'L');
	//$pdf->Cell(6,0.5,$nama,1,0,'L');
	$pdf->Cell(10,1,'Jumlah SKS',1,0,'C');
	$pdf->Cell(1,1,$jumsks,1,0,'L');
	/* while($hasil = mysql_fetch_array($querytampil)) {
		$id = $hasil['id'];
		$nim = $hasil['NIM'];
		
		$pdf->Cell(1,0.5,'$i',1,0,'L');
		$pdf->Cell(2,0.5,'$id',1,0,'L');
		$pdf->Cell(2,0.5,'$nim',1,0,'L');
	} */
	$pdf->Output();
?>