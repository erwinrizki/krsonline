<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$hapus = "DELETE FROM dosen WHERE id='$id';";
	$queryhapus = mysql_query($hapus);
	
	if($queryhapus) {
		echo "<script>location.replace('tampildosen.php');</script>";
	} else {
		echo "<script>location.replace('tampildosen.php');</script>";
	}
?>