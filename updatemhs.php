<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$pass = $_POST['pass'];
	$progdi = $_POST['progdi'];
	
	$update = "UPDATE mhs SET NIM='$nim',Nama='$nama',Password='$pass',Progdi='$progdi' WHERE id='$id';";
	$queryupdate = mysql_query($update);
	
	if($queryupdate) {
		echo "<script>alert('Data Berhasil Diupdate');location.replace('tampilmhs.php');</script>";
	} else {
		echo "<script>alert('Data Gagal Diupdate');location.replace('tampilmhs.php');</script>";
	}
?>