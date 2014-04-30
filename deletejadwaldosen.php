<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$hapus = "DELETE FROM data_jadwaldosen WHERE id_ajar='$id';";
	$queryhapus = mysql_query($hapus);
	
	if($queryhapus) {
		echo "<script>location.replace('tampiljadwaldosen.php');</script>";
	} else {
		echo "<script>location.replace('tampiljadwaldosen.php');</script>";
	}
?>