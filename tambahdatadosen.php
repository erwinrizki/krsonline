<?php
	include ("koneksi.php");
	
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$pass = $_POST['pass'];
	
	$tambah = "INSERT INTO dosen VALUES(NULL,'$nip','$nama','$pass');";
	$querytambah = mysql_query($tambah);
	
	if($querytambah) {
		echo "<script>alert('Data Berhasil Ditambahkan');location.replace('datadosen.html');</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan');location.replace('datadosen.html');</script>";
	}
?>