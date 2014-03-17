<?php
	include ("koneksi.php");
	
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$pass = $_POST['pass'];
	$progdi = $_POST['progdi'];
	
	$tambah = "INSERT INTO mhs VALUES(NULL,'$nim','$nama','$pass','$progdi');";
	$querytambah = mysql_query($tambah);
	
	if($querytambah) {
		echo "<script>alert('Data Berhasil Ditambahkan');location.replace('datamhs.html');</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan');location.replace('datamhs.html');</script>";
	}
?>