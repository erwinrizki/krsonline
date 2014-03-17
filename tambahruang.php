<?php
	include "koneksi.php";
	
	$kode = $_POST['kdruang'];
	$kapasitas = $_POST['kapasitas'];
	$tambah = "INSERT INTO data_ruang VALUES(null,'$kode','$kapasitas');";
	$querytambah = mysql_query($tambah);
	if(querytambah) {
		echo "<script>alert('Data Berhasil Ditambahkan');location.replace('dataruang.html');</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan');location.replace('dataruang.html');</script>";
	}
?>