<?php
	include "koneksi.php";
	
	$nim = $_POST['nim'];
	$wajib = $_POST['kewajiban'];
	$status = $_POST['status'];
	
	$tampil = "SELECT * FROM mhs WHERE NIM='$nim';";
	$querytampil = mysql_query($tampil);
	while($hasil = mysql_fetch_array($querytampil)) {
		if(count($hasil)==0) {
			echo "<script>alert('NIM tidak ditemukan');location.replace('datakeuangan.html');</script>";
		} else {
			$id = $hasil['id'];
			$tambah = "INSERT INTO data_keuangan VALUES(null,$id,$wajib,'$status');";
			$querytambah = mysql_query($tambah);
			if($querytambah) {
				echo "<script>alert('Data Berhasil Ditambahkan');location.replace('datakeuangan.html');</script>";
			} else {
				echo "<script>alert('Data Gagal Ditambahkan');location.replace('datakeuangan.html');</script>";
			}
		}
	}
?>