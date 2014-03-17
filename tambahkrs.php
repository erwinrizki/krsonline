<?php
	session_start();
	include "koneksi.php";
	
	$nim = $_SESSION['user'];
	$kuota = 0;
	$id = $_GET['id'];
	$tambah = "INSERT INTO data_krsmhs VALUES(null,$id,'$nim');";
	$querytambah = mysql_query($tambah);
	$tampil = "SELECT * FROM data_jadwal WHERE id_jadwal='$id';";
	$querytampil = mysql_query($tampil);
	while($hasil = mysql_fetch_array($querytampil)) {
		$k = $hasil['kuota'];
		$k = $k - 1;
		$kuota = $k;
	}
	$update = "UPDATE data_jadwal SET kuota=$kuota WHERE id_jadwal='$id';";
	$queryupdate = mysql_query($update);
	if($queryupdate) {
		echo "<script>location.replace('inputkrs.php');</script>";
	} else {
		echo "<script>location.replace('inputkrs.php');</script>";
	}
?>