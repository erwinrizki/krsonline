<?php
	include "koneksi.php";
	
	$delete = "DELETE FROM data_waktu;";
	$querydelete = mysql_query($delete);
	if(querydelete) {
		echo "<script>alert('Waktu Berhasil Direset');location.replace('aturwaktukrs.php');</script>";
	} else {
		echo "<script>alert('Waktu Gagal Direset');location.replace('aturwaktukrs.php');</script>";
	}
?>