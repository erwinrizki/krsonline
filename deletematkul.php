<?php
	include "koneksi.php";
	
	$id = $_GET['id_matkul'];
	$hapus = "DELETE FROM data_matkul WHERE id_matkul='$id';";
	$queryhapus = mysql_query($hapus);
	
	if($queryhapus) {
		echo "<script>location.replace('tampilmatkul.php');</script>";
	} else {
		echo "<script>location.replace('tampilmatkul.php');</script>";
	}
?>