<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$hapus = "DELETE FROM data_pengumuman WHERE id='$id';";
	$queryhapus = mysql_query($hapus);
	
	if($queryhapus) {
		echo "<script>location.replace('tampilpengumuman.php');</script>";
	} else {
		echo "<script>location.replace('tampilpengumuman.php');</script>";
	}
?>