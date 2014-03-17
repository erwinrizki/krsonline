<?php
	include "koneksi.php";
	
	$id = $_GET['id_matkul'];
	$kodemk = $_POST['kdmk'];
	$namamk = $_POST['namamk'];
	$sks = $_POST['sks'];
	$tp = $_POST['tp'];
	$smt = $_POST['semester'];
	
	$update = "UPDATE data_matkul SET kodemk='$kodemk',namamk='$namamk',sks='$sks',tp='$tp',semester='$smt' WHERE id_matkul='$id';";
	$queryupdate = mysql_query($update);
	
	if($queryupdate) {
		echo "<script>alert('Data Berhasil Diupdate');location.replace('tampilmatkul.php');</script>";
	} else {
		echo "<script>alert('Data Gagal Diupdate');location.replace('tampilmatkul.php');</script>";
	}
?>