<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$hapus = "DELETE FROM data_jadwal WHERE id_jadwal='$id';";
	$queryhapus = mysql_query($hapus);
	
	if($queryhapus) {
		echo "<script>location.replace('tampiljadwal.php');</script>";
	} else {
		echo "<script>location.replace('tampiljadwal.php');</script>";
	}
?>