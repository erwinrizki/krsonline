<?php
	include "koneksi.php";
	
	$tgl = $_POST['tgl'];
	$jam = $_POST['jam'];
	
	$tambah = "INSERT INTO data_waktu VALUES(null,'$tgl','$jam');";
	$querytambah = mysql_query($tambah);
	if($querytambah) {
		echo "<script>alert('Data Berhasil Ditambahkan');location.replace('aturwaktukrs.php');</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan');location.replace('aturwaktukrs.php');</script>";
	}
?>