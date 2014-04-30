<?php
	include "koneksi.php";
	
	$kodemk = $_POST['kdmk'];
	$namamk = $_POST['namamk'];
	$sks = $_POST['sks'];
	$tp = $_POST['tp'];
	$smt = $_POST['semester'];
	
	$tambah = "INSERT INTO data_matkul VALUES(null,'$kodemk','$namamk',$sks,'$tp','$smt');";
	$querytambah = mysql_query($tambah);
	
	if($querytambah) {
		echo "<script>alert('Data Berhasil Ditambahkan');location.replace('datamatkul.html');</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan');location.replace('datamatkul.html');</script>";
	}
?>