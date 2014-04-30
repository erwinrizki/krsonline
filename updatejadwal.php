<?php
	include "koneksi.php";
	date_default_timezone_set("Asia/Jakarta");
	
	$id = $_GET['id'];
	$kodemk = $_POST['kodemk'];
	$kelompok = $_POST['kelompok'];
	$hari = $_POST['hari'];
	$mulai = $_POST['jamm'];
	$selesai = $_POST['jams'];
	$kuota = $_POST['kuota'];
	$ruang = $_POST['ruang'];
	$hari2 = $_POST['hari2'];
	$mulai2 = $_POST['jamm2'];
	$selesai2 = $_POST['jams2'];
	$ruang2 = $_POST['ruang2'];
	
	
	$cmulai = strtotime($mulai);
	$cselesai = strtotime($selesai);
	$cmulai2 = strtotime($mulai2);
	$cselesai2 = strtotime($selesai2);
	
	$tidakoverlap = 0;
	$belumada = 0;

	if($hari2=="-") {
		$show = "SELECT * FROM data_jadwal 
				WHERE (hari='$hari' AND koderuang='$ruang') OR (hari2='$hari' AND koderuang2='$ruang');";
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
				
			if(($h==$hari && $kr==$ruang) && ($h2==$hari && $kr2==$ruang)) {
				$intersect = min($cselesai,$cjs) - max($cmulai,$cjm);
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
				
				$intersect = min($cselesai,$cjs2) - max($cmulai,$cjm2);
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
			} else if(($h!=$hari && $kr!=$ruang) && ($h2==$hari && $kr2==$ruang)) {
				$intersect = min($cselesai,$cjs2) - max($cmulai,$cjm2);
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
			} else {
				$intersect = min($cselesai,$cjs) - max($cmulai,$cjm);
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
			}
		}
		
		if($tidakoverlap==0) {
			$tambah = "UPDATE data_jadwal SET kodemk='$kodemk', kelompok='$kelompok', 
						hari='$hari', jammulai='$mulai', jamselesai='$selesai', kuota=$kuota, koderuang='$ruang', 
						hari2='$hari2', jammulai2='$mulai2', jamselesai2='$selesai2', koderuang2='$ruang2'
						WHERE id_jadwal=$id;";
			$querytambah = mysql_query($tambah);
			if($querytambah) {
				echo "<script>alert('Data Berhasil Diupdate');location.replace('tampiljadwal.php');</script>";
			} else {
				echo "<script>alert('Data Gagal Diupdate');location.replace('tampiljadwal.php');</script>";
			}
		}
	} else {
		$show = "SELECT * FROM data_jadwal 
				WHERE (hari='$hari' AND koderuang='$ruang') OR (hari2='$hari' AND koderuang2='$ruang')
				OR (hari='$hari2' AND koderuang='$ruang2') OR (hari2='$hari2' AND koderuang2='$ruang2');";
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
				
			if(($hari==$h && $ruang==$kr) && ($hari==$h2 && $ruang==$kr2)) {
				$intersect = min($cselesai,$cjs) - max($cmulai,$cjm);
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
				
				$intersect = min($cselesai,$cjs2) - max($cmulai,$cjm2);
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
			} else if(($hari!=$h && $ruang!=$kr) && ($hari==$h2 && $ruang==$kr2)) {
				$intersect = min($cselesai,$cjs2) - max($cmulai,$cjm2);
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
			} else if(($hari==$h && $ruang==$kr) && ($hari!=$h2 && $ruang!=$kr2)) {
				$intersect = min($cselesai,$cjs) - max($cmulai,$cjm);
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
			}
			
			if(($hari2==$h && $ruang2==$kr) && ($hari2==$h2 && $ruang2==$kr2)) {
				$intersect = min($cselesai2,$cjs) - max($cmulai2,$cjm);
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
			} else if(($hari2!=$h && $ruang2!=$kr) && ($hari2==$h2 && $ruang2==$kr2)) {
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
			} else if(($hari2==$h && $ruang2==$kr) && ($hari2!=$h2 && $ruang2!=$kr2)) {
				$intersect = min($cselesai2,$cjs) - max($cmulai2,$cjm);
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
			}
		}
		
		if($tidakoverlap==0) {
			$tambah = "UPDATE data_jadwal SET kodemk='$kodemk', kelompok='$kelompok', 
						hari='$hari', jammulai='$mulai', jamselesai='$selesai', kuota=$kuota, koderuang='$ruang', 
						hari2='$hari2', jammulai2='$mulai2', jamselesai2='$selesai2', koderuang2='$ruang2'
						WHERE id_jadwal=$id;";
			$querytambah = mysql_query($tambah);
			if($querytambah) {
				echo "<script>alert('Data Berhasil Diupdate');location.replace('tampiljadwal.php');</script>";
			} else {
				echo "<script>alert('Data Gagal Diupdate');location.replace('tampiljadwal.php');</script>";
			}
		}
	}
?>