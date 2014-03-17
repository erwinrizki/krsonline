<?php
	include "koneksi.php";
	
	$id = $_GET['id_ruang'];
	$kode = $_POST['kdruang'];
	$kapasitas = $_POST['kapasitas'];
	
	$update = "UPDATE data_ruang SET koderuang='$kode',kapasitas=$kapasitas WHERE id_ruang='$id';";
	$queryupdate = mysql_query($update);
	
	if($queryupdate) {
		echo "<script>alert('Data Berhasil Diupdate');location.replace('tampilruang.php');</script>";
	} else {
		echo "<script>alert('Data Gagal Diupdate');location.replace('tampilruang.php');</script>";
	}
?>