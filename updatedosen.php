<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$pass = $_POST['pass'];
	
	$update = "UPDATE dosen SET nip='$nip',nama='$nama',password='$pass' WHERE id='$id';";
	$queryupdate = mysql_query($update);
	
	if($queryupdate) {
		echo "<script>alert('Data Berhasil Diupdate');location.replace('tampildosen.php');</script>";
	} else {
		echo "<script>alert('Data Gagal Diupdate');location.replace('tampildosen.php');</script>";
	}
?>