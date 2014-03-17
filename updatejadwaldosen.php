<?php
	include "koneksi.php";
	date_default_timezone_set("Asia/Jakarta");
	
	$idjadwal = $_GET['id'];
	$dosen = $_POST['dosen'];
	$jadwal = $_POST['jadwal'];
	$hari = "";
	$jamm = "";
	$jams = "";
	$hari2 = "";
	$jamm2 = "";
	$jams2 = "";
	
	$lihat = "SELECT * FROM data_jadwal WHERE id_jadwal='$jadwal';";
	$querylihat = mysql_query($lihat);
	while($hasil = mysql_fetch_array($querylihat)) {
		$hari = $hasil['hari'];
		$jamm = $hasil['jammulai'];
		$jams = $hasil['jamselesai'];
		$hari2 = $hasil['hari2'];
		$jamm2 = $hasil['jammulai2'];
		$jams2 = $hasil['jamselesai2'];
	}
	
	$cmulai = strtotime($jamm);
	$cselesai = strtotime($jams);
	$cmulai2 = strtotime($jamm2);
	$cselesai2 = strtotime($jams2);
	
	$tidakoverlap = 0;
	$belumada = 0;
	
	$tampil = "SELECT * FROM data_jadwaldosen WHERE id_jadwal='$jadwal';";
	$querytampil = mysql_query($tampil);
	$jumlah = mysql_num_rows($querytampil);

	if($jumlah==0) {
		if($hari2=="-") {
			$show = "SELECT * FROM data_jadwaldosen AS jd
					INNER JOIN data_jadwal AS j ON jd.id_jadwal=j.id_jadwal
					WHERE jd.nip='$dosen';";
			$queryshow = mysql_query($show);
			$jum = mysql_num_rows($queryshow);
			
			while($r = mysql_fetch_array($queryshow)) {
				$h = $r['hari'];
				$jm = $r['jammulai'];
				$js = $r['jamselesai'];
				$h2 = $r['hari2'];
				$jm2 = $r['jammulai2'];
				$js2 = $r['jamselesai2'];
					
				$cjm = strtotime($jm);
				$cjs = strtotime($js);
				$cjm2 = strtotime($jm2);
				$cjs2 = strtotime($js2);
					
				if($h==$hari && $h2==$hari) {
					$intersect = min($cselesai,$cjs) - max($cmulai,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
					
					$intersect = min($cselesai,$cjs2) - max($cmulai,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				} else if($h!=$hari && $h2==$hari) {
					$intersect = min($cselesai,$cjs2) - max($cmulai,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				} else if($h2="" && $h1==$hari) {
					$intersect = min($cselesai,$cjs) - max($cmulai,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok sih!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				}
			}
			
			if($tidakoverlap==0) {
				$tambah = "UPDATE data_jadwaldosen SET id_jadwal='$jadwal', nip='$dosen' WHERE id_ajar='$idjadwal';";
				$querytambah = mysql_query($tambah);
				if($querytambah) {
					echo "<script>alert('Data Berhasil Diupdate');location.replace('tampiljadwaldosen.php');</script>";
				} else {
					echo "<script>alert('Data Gagal Diupdate');location.replace('tampiljadwaldosen.php');</script>";
				}
			}
		} else {
			$show = "SELECT * FROM data_jadwaldosen AS jd
					INNER JOIN data_jadwal AS j ON jd.id_jadwal=j.id_jadwal
					WHERE jd.nip='$dosen';";
			$queryshow = mysql_query($show);
			$jum = mysql_num_rows($queryshow);
			
			while($r = mysql_fetch_array($queryshow)) {
				$h = $r['hari'];
				$kr = $r['koderuang'];
				$jm = $r['jammulai'];
				$js = $r['jamselesai'];
				$h2 = $r['hari2'];
				$kr2 = $r['koderuang2'];
				$jm2 = $r['jammulai2'];
				$js2 = $r['jamselesai2'];
					
				$cjm = strtotime($jm);
				$cjs = strtotime($js);
				$cjm2 = strtotime($jm2);
				$cjs2 = strtotime($js2);
					
				if($hari==$h && $hari==$h2) {
					$intersect = min($cselesai,$cjs) - max($cmulai,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
					
					$intersect = min($cselesai,$cjs2) - max($cmulai,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				} else if($hari!=$h && $hari==$h2) {
					$intersect = min($cselesai,$cjs2) - max($cmulai,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				} else if($hari==$h && $hari!=$h2) {
					$intersect = min($cselesai,$cjs) - max($cmulai,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				}
				
				if($hari2==$h && $hari2==$h2) {
					$intersect = min($cselesai2,$cjs) - max($cmulai2,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
					
					$intersect = min($cselesai2,$cjs2) - max($cmulai2,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Ruang Telah Dipakai Kelas Lain!');location.replace('tampiljadwal.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				} else if($hari2!=$h && $hari2==$h2) {
					$intersect = min($cselesai2,$cjs2) - max($cmulai2,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				} else if($hari2==$h && $hari2!=$h2) {
					$intersect = min($cselesai2,$cjs) - max($cmulai2,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
						
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						echo "<script>alert('Jadwal Dosen Dosen Bentrok!');location.replace('tampiljadwaldosen.php');</script>";
						$tidakoverlap = 1;
						break;
					}
				}
			}
			
			if($tidakoverlap==0) {
				$tambah = "UPDATE data_jadwaldosen SET id_jadwal='$jadwal', nip='$dosen' WHERE id_ajar='$idjadwal';";
				$querytambah = mysql_query($tambah);
				if($querytambah) {
					echo "<script>alert('Data Berhasil Diupdate');location.replace('tampiljadwaldosen.php');</script>";
				} else {
					echo "<script>alert('Data Gagal Diupdate');location.replace('tampiljadwaldosen.php');</script>";
				}
			}
		}
	} else {
		/* $tambah = "INSERT INTO data_jadwaldosen VALUES(null,'$jadwal','$dosen');";
		$querytambah = mysql_query($tambah);
		if($querytambah)
			echo "<script>alert('Data Berhasil Ditambahkan!');location.replace('datajadwaldosen.php');</script>";
		else 
			echo "<script>alert('Data Gagal Ditambahkan!');location.replace('datajadwaldosen.php');</script>"; */
		echo "<script>alert('Data Sudah Ada!');location.replace('tampiljadwaldosen.php');</script>";
	}
?>