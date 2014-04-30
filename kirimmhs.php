<?php
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	include "koneksi.php";
	
	$to = $_POST['tujuan'];
	$sub = $_POST['subject'];
	$isi = $_POST['isi'];
	$nim = $_SESSION['user'];
	$date = date('Y-m-d H:i:s');
	
	$kirim = "INSERT INTO datapesan VALUES(null,'$nim','$to','$sub','$isi','$date');";
	$querykirim = mysql_query($kirim);
	if($querykirim) {
		echo "<script>alert('Pesan Berhasil Dikirim');location.replace('messagemhs.php');</script>";
	} else {
		echo "<script>alert('Pesan Gagal Dikirim');location.replace('messagemhs.php');</script>";
	}
?>