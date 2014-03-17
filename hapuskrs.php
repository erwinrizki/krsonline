<?php
	session_start();
	include "koneksi.php";
	
	$id = $_GET['id'];
	$kuota = 0;
	$idjadwal = 0;
	$tampil = "SELECT j.kuota, j.id_jadwal FROM data_krsmhs AS k
				INNER JOIN data_jadwal AS j ON k.id_jadwal=j.id_jadwal WHERE k.id_krs='$id';";
	$querytampil = mysql_query($tampil);
	while($hasil = mysql_fetch_array($querytampil)) {
		$k = $hasil['kuota'];
		$idj = $hasil['id_jadwal'];
		$k = $k + 1;
		$kuota = $k;
		$idjadwal = $idj;
	}
	$hapus = "DELETE FROM data_krsmhs WHERE id_krs='$id';";
	$queryhapus = mysql_query($hapus);
	$update = "UPDATE data_jadwal SET kuota=$kuota WHERE id_jadwal='$idjadwal';";
	$queryupdate = mysql_query($update);
	if($queryupdate) {
		echo "<script>location.replace('inputkrs.php');</script>";
	} else {
		echo "<script>location.replace('inputkrs.php');</script>";
	}
?>