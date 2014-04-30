<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$judul = $_POST['judul'];
	$author = $_POST['author'];
	$isi = $_POST['isi'];
	
	$update = "UPDATE data_pengumuman SET judul='$judul',author='$author',isi='$isi' WHERE id='$id';";
	$queryupdate = mysql_query($update);
	
	if($queryupdate) {
		echo "<script>alert('Data Berhasil Diupdate');location.replace('tampilpengumuman.php');</script>";
	} else {
		echo "<script>alert('Data Gagal Diupdate');location.replace('tampilpengumuman.php');</script>";
	}
?>