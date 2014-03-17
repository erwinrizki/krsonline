<?php
	include "koneksi.php";
	
	$id = $_GET['id_ruang'];
	$hapus = "DELETE FROM data_ruang WHERE id_ruang=$id;";
	$queryhapus = mysql_query($hapus);
	
	if($queryhapus) {
		echo "<script>location.replace('tampilruang.php');</script>";
	} else {
		echo "<script>location.replace('tampilruang.php');</script>";
	}
?>