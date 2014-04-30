<?php
	include "koneksi.php";
	
	$status = $_POST['status'];
	$id = $_POST['id'];
	$update = "UPDATE data_keuangan SET status='$status' WHERE id=$id;";
	$queryupdate = mysql_query($update);
	if($queryupdate) {
		echo "<script>alert('Data Keuangan Berhasil Diupdate');location.replace('tampilkeuangan.php');</script>";
	} else {
		echo "<script>alert('Data Keuangan Gagal Diupdate');location.replace('tampilkeuangan.php');</script>";
	}
?>