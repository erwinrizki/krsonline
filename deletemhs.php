<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$hapus = "DELETE FROM mhs WHERE id='$id';";
	$queryhapus = mysql_query($hapus);
	
	if($queryhapus) {
		echo "<script>location.replace('tampilmhs.php');</script>";
	} else {
		echo "<script>location.replace('tampilmhs.php');</script>";
	}
?>