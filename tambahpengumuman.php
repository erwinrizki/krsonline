<?php
	include "koneksi.php";
	
	$judul = $_POST['judul'];
	$penulis = $_POST['author'];
	$isi = $_POST['isi'];
	
	$tambah = "INSERT INTO data_pengumuman VALUES(null,'$judul','$penulis','$isi');";
	$querytambah = mysql_query($tambah);
	
	if($querytambah) {
		echo "<script>alert('Data Berhasil Ditambahkan');location.replace('datapengumuman.html');</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan');location.replace('datapengumuman.html');</script>";
	}
?>