<html>
<head>
	<title>Jadwal Kelas</title>
	<link rel="stylesheet" type="text/css" href="CSS/layout.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/font.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/element.css"/>
</head>
<body>
	<div id="container">
	<div id="header">
		<table border="0" cellspacing="10">
			<tr>
				<td><img src="Images/admin.png" width="150" height="150" /></td>
				<td><h1>Admin Page</h1></td>
			</tr>
		</table>
	</div>
	<div id="cpanel">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="4"><h1>Jadwal Kelas</h1></td>
			</tr>
			<tr>
				<td><a href="paneladmin.php" title="Kembali"><img src="Images/back.png" /></a></td>
			</tr>
			<tr>
				<td colspan="4"><h2>Cari Berdasarkan Dosen</h2></td>
			</tr>
			<tr>
				<td><b>Masukkan nama dosen</b></td>
				<td>:</td>
				<td>
					<select name="dosen">
						<?php
							include "koneksi.php";
							
							$daftardosen = "SELECT * FROM dosen";
							$querydaftard = mysql_query($daftardosen);
							while($hasil = mysql_fetch_array($querydaftard)) {
								$nip = $hasil['nip'];
								$nama = $hasil['nama'];
						?>
							<option value="<?php echo $nip; ?>"><?php echo $nama; ?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td><input type="submit" name="cari" value="Cari Dosen" />
				</td>
			</tr>
			<tr>
				<td colspan="4"><h2>Cari Berdasarkan Jam</h2></td>
			</tr>
			<tr>
				<td><b>Masukkan Hari</b></td>
				<td>:</td>
				<td><input type="text" name="hari" size="25" /></td>
				<td><input type="submit" name="cari" value="Cari Hari" /></td>
			</tr>
			<tr>
				<td colspan="4"><h2>Cari Berdasarkan Ruang</h2></td>
			</tr>
			<tr>
				<td><b>Masukkan Kode Ruang</b></td>
				<td>:</td>
				<td>
					<select name="ruang">
						<?php
							include "koneksi.php";
							
							$daftarruang = "SELECT * FROM data_ruang";
							$querydaftarr = mysql_query($daftarruang);
							while($hasil = mysql_fetch_array($querydaftarr)) {
								$nama = $hasil['koderuang'];
						?>
							<option value="<?php echo $nama; ?>"><?php echo $nama; ?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td><input type="submit" name="cari" value="Cari Ruang" /></td>
			</tr>
		</table>
		</form>
		<hr/>
		<form>
			<table border="0" cellspacing="30">
				<tr>
					<td colspan="8"><h1>Hasil:</h1></td>
				</tr>
				<tr>
					<td><b>No</b></td>
					<td><b>Kode MK</b></td>
					<td><b>Nama MK</b></td>
					<td><b>Kelompok</b></td>
					<td><b>Jadwal 1</b></td>
					<td><b>Ruang</b></td>
					<td><b>Jadwal 2</b></td>
					<td><b>Ruang</b></td>
				</tr>
		<?php
			include "koneksi.php";
			
			$tombol = $_POST['cari'];
			if($tombol=="Cari Dosen") {
				$dosen = $_POST['dosen'];
				$no = 1;
				$tampil = "SELECT dj.kodemk, dm.namamk, dj.kelompok, dj.hari, dj.jammulai, dj.jamselesai, dj.koderuang , dj.hari2, dj.jammulai2, dj.jamselesai2, dj.koderuang2 
							FROM data_jadwaldosen AS jd
							INNER JOIN data_jadwal AS dj ON jd.id_jadwal=dj.id_jadwal
							INNER JOIN data_matkul AS dm ON dj.kodemk=dm.kodemk
							WHERE jd.nip = '$dosen';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$kodemk = $hasil['kodemk'];
					$namamk = $hasil['namamk'];
					$kelompok = $hasil['kelompok'];
					$hari = $hasil['hari'];
					$jammulai = $hasil['jammulai'];
					$jamselesai = $hasil['jamselesai'];
					$koderuang = $hasil['koderuang'];
					$hari2 = $hasil['hari2'];
					$jammulai2 = $hasil['jammulai2'];
					$jamselesai2 = $hasil['jamselesai2'];
					$koderuang2 = $hasil['koderuang2'];
		?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $kodemk; ?></td>
							<td><?php echo $namamk; ?></td>
							<td><?php echo $kelompok; ?></td>
							<td><?php echo $hari. ", " .$jammulai. " - " .$jamselesai; ?></td>
							<td><?php echo $koderuang; ?></td>
							<td><?php echo $hari2. ", " .$jammulai2. " - " .$jamselesai2; ?></td>
							<td><?php echo $koderuang2; ?></td>
						</tr>
		<?php
					$no++;
				}
			} else if($tombol=="Cari Hari") {
				$hari = $_POST['hari'];
				$no = 1;
				$tampil = "SELECT dj.kodemk, dm.namamk, dj.kelompok, dj.hari, dj.jammulai, dj.jamselesai, dj.koderuang , dj.hari2, dj.jammulai2, dj.jamselesai2, dj.koderuang2 
							FROM data_jadwal AS dj 
							INNER JOIN data_matkul AS dm ON dj.kodemk=dm.kodemk 
							WHERE dj.hari='$hari' OR dj.hari2='$hari';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$kodemk = $hasil['kodemk'];
					$namamk = $hasil['namamk'];
					$kelompok = $hasil['kelompok'];
					$hari = $hasil['hari'];
					$jammulai = $hasil['jammulai'];
					$jamselesai = $hasil['jamselesai'];
					$koderuang = $hasil['koderuang'];
					$hari2 = $hasil['hari2'];
					$jammulai2 = $hasil['jammulai2'];
					$jamselesai2 = $hasil['jamselesai2'];
					$koderuang2 = $hasil['koderuang2'];
		?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $kodemk; ?></td>
							<td><?php echo $namamk; ?></td>
							<td><?php echo $kelompok; ?></td>
							<td><?php echo $hari. ", " .$jammulai. " - " .$jamselesai; ?></td>
							<td><?php echo $koderuang; ?></td>
							<td><?php echo $hari2. ", " .$jammulai2. " - " .$jamselesai2; ?></td>
							<td><?php echo $koderuang2; ?></td>
						</tr>
		<?php
					$no++;
				}
			} else {
				$ruang = $_POST['ruang'];
				$no = 1;
				$tampil = "SELECT dj.kodemk, dm.namamk, dj.kelompok, dj.hari, dj.jammulai, dj.jamselesai, dj.koderuang, dj.hari2, dj.jammulai2, dj.jamselesai2, dj.koderuang2
							FROM data_jadwal AS dj 
							INNER JOIN data_matkul AS dm ON dj.kodemk=dm.kodemk 
							WHERE dj.koderuang='$ruang' OR dj.koderuang2='$ruang';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$kodemk = $hasil['kodemk'];
					$namamk = $hasil['namamk'];
					$kelompok = $hasil['kelompok'];
					$hari = $hasil['hari'];
					$jammulai = $hasil['jammulai'];
					$jamselesai = $hasil['jamselesai'];
					$koderuang = $hasil['koderuang'];
					$hari2 = $hasil['hari2'];
					$jammulai2 = $hasil['jammulai2'];
					$jamselesai2 = $hasil['jamselesai2'];
					$koderuang2 = $hasil['koderuang2'];
		?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $kodemk; ?></td>
							<td><?php echo $namamk; ?></td>
							<td><?php echo $kelompok; ?></td>
							<td><?php echo $hari. ", " .$jammulai. " - " .$jamselesai; ?></td>
							<td><?php echo $koderuang; ?></td>
							<td><?php echo $hari2. ", " .$jammulai2. " - " .$jamselesai2; ?></td>
							<td><?php echo $koderuang2; ?></td>
						</tr>
		<?php
					$no++;
				}
			}
		?>
			</table>
		</form>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>