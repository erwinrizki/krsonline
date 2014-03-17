<?php
	include "koneksi.php";
	date_default_timezone_set("Asia/Jakarta");
	
	function tutup() {
		$tanggal = "";
		$jam = "";
		$waktu = "SELECT * FROM data_waktu";
		$querywaktu = mysql_query($waktu);
		while($hasil = mysql_fetch_array($querywaktu)) {
			$tanggal = $hasil['tanggal'];
			$jam = $hasil['jam'];
		}
		$tanggalarray = explode("-", $tanggal);
		$jamarray = explode(".", $jam);
		$selisih1 =  mktime($jamarray[0], $jamarray[1], 0, $tanggalarray[1], $tanggalarray[2], $tanggalarray[0]);

		// mencari mktime untuk current time
		$selisih2 = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));

		// mencari selisih detik antara kedua waktu
		$delta = $selisih1 - $selisih2;
		
		return $delta;
	}
	
	function sisasks($nim) {
		$jumsks = 20;
		$tampil = "SELECT k.NIM, m.sks 
					FROM data_krsmhs AS k INNER JOIN data_jadwal AS j ON k.id_jadwal=j.id_jadwal
					INNER JOIN data_matkul AS m ON j.kodemk=m.kodemk WHERE k.NIM='$nim';";
		$querytampil = mysql_query($tampil);
		while($hasil = mysql_fetch_array($querytampil)) {
			$sks = $hasil['sks'];
			$jumsks = $jumsks - $sks;
		}
		return $jumsks;
	}
	
	function matkulada($kode,$nim) {
		$sama = 0;
		$tampil = "SELECT j.kodemk, k.NIM FROM data_krsmhs AS k
					INNER JOIN data_jadwal AS j ON k.id_jadwal=j.id_jadwal WHERE k.NIM='$nim';";
		$querytampil = mysql_query($tampil);
		while($hasil = mysql_fetch_array($querytampil)) {
			$k = $hasil['kodemk'];
			
			if($k==$kode) {
				$sama = 1;
				break;
			}
		}
		if($sama==1) {
			return true;
		} else {
			return false;
		}
	}
	
	function tabrakan($hari, $jammulai, $jamselesai, $hari2, $jammulai2, $jamselesai2, $nim) {
		$tidakoverlap = 0;
		$jammulai = strtotime($jammulai);
		$jamselesai = strtotime($jamselesai);
		$jammulai2 = strtotime($jammulai2);
		$jamselesai2 = strtotime($jamselesai2);
		
		$show = "SELECT * FROM data_krsmhs AS k INNER JOIN data_jadwal AS j ON k.id_jadwal=j.id_jadwal WHERE k.NIM='$nim';";
		$queryshow = mysql_query($show);
		while($r = mysql_fetch_array($queryshow)) {
			$h = $r['hari'];
			$jm = $r['jammulai'];
			$js = $r['jamselesai'];
			$h2 = $r['hari2'];
			$jm2 = $r['jammulai2'];
			$js2 = $r['jamselesai2'];
			
			if($hari2=="-") {
				if($hari==$h && $hari==$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai,$cjs) - max($jammulai,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
					
					$intersect = min($jamselesai,$cjs2) - max($jammulai,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				} else if($hari==$h && $hari!=$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai,$cjs) - max($jammulai,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				} else if($hari!=$h && $hari==$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai,$cjs2) - max($jammulai,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				} else if($hari!=$h && $hari!=$h2) {
					continue;
				}
			} else {
				if($hari==$h && $hari==$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai,$cjs) - max($jammulai,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
					
					$intersect = min($jamselesai,$cjs2) - max($jammulai,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				} else if($hari==$h && $hari!=$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai,$cjs) - max($jammulai,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				} else if($hari!=$h && $hari==$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai,$cjs2) - max($jammulai,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				}
				
				if($hari2==$h && $hari2==$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai2,$cjs) - max($jammulai2,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
					
					$intersect = min($jamselesai2,$cjs2) - max($jammulai2,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				} else if($hari2==$h && $hari2!=$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai2,$cjs) - max($jammulai2,$cjm);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				} else if($hari2!=$h && $hari2==$h2) {
					$cjm = strtotime($jm);
					$cjs = strtotime($js);
					$cjm2 = strtotime($jm2);
					$cjs2 = strtotime($js2);
					
					$intersect = min($jamselesai2,$cjs2) - max($jammulai2,$cjm2);
					if($intersect < 0) {
						$intersect = 0;
					}
					
					$overlap = $intersect / 3600;
					if($overlap <= 0) {
						$tidakoverlap = 0;
					} else {
						$tidakoverlap = 1;
						break;
					}
				} else if ($hari2!=$h && $hari2==$h2) {
					continue;
				}
			}
		}
		
		if($tidakoverlap==0) {
			return false;
		} else {
			return true;
		}
	}
?>