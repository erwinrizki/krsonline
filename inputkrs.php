<?php
	session_start();
	include "koneksi.php";
	include "sisasks.php";
	
	$nim = $_SESSION['user'];
	$stat = "SELECT * FROM data_keuangan AS k INNER JOIN mhs AS m ON k.id=m.id WHERE m.NIM='$nim';";
	$querystat = mysql_query($stat);
	$jum = mysql_num_rows($querystat);
	while($hasil = mysql_fetch_array($querystat)) {
		$status = $hasil['status'];
		
		if($status=="Belum Terbayar") {
			header("location: stop.html");
		}
	}
	
	if($jum==0) {
		header("location: stop.html");
	}
	
	$selisih = tutup();
	
	if($selisih>0) {
		header("location: stop1.html");
	}
?>

<html>
<head>
	<title>Input KRS Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="CSS/layout.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/font.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/element.css"/>
</head>
<body>
	<div id="container">
	<div id="header">
		<table border="0" cellspacing="10">
			<tr>
				<td><img src="Images/student.png" width="150" height="150" /></td>
				<td><h1>Student Page</h1></td>
			</tr>
		</table>
	</div>
	<div id="cpanelkrs">
		<table border="0" cellspacing="40">
			<tr>
				<td><h1>Input KRS Mahasiswa</h1></td>
			</tr>
			<tr>
				<td>
					<a href="panelmhs.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<tr>
				<table border="0" cellspacing="20">
					<?php
						session_start();
						include "koneksi.php";
						
						$nim = $_SESSION['user'];
						$tampil = "SELECT * FROM mhs WHERE NIM='$nim';";
						$querytampil = mysql_query($tampil);
						while($hasil = mysql_fetch_array($querytampil)) {
							$nama = $hasil['Nama'];
							$progdi = $hasil['Progdi'];
					?>
					<tr>
						<td width="400px">
							<table border="0" cellspacing="35">
								<tr>
									<td><b>NIM:</b></td>
									<td><?php echo $nim; ?></td>
								</tr>
								<tr>
									<td><b>Nama:</b></td>
									<td><?php echo $nama; ?></td>
								</tr>
								<tr>
									<td><b>Progdi:</b></td>
									<td><?php echo $progdi; ?></td>
								</tr>
							</table>
							<?php
								}
							?>
						</td>
						<td>
							<h2>Pilih Mata Kuliah:</h2>	<br/>
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
							<select name="mk" onchange="window.location=this.options[this.selectedIndex].value">
								<option value="#">[Pilih Mata Kuliah]</option>
								<?php
									session_start();
									include "koneksi.php";
									
									$tampil = "SELECT * FROM data_matkul;";
									$querytampil = mysql_query($tampil);
									while($hasil = mysql_fetch_array($querytampil)) {
										$kodemk = $hasil['kodemk'];
										$namamk = $hasil['namamk'];
										$sks = $hasil['sks'];
										$smt = $hasil['semester'];
										
								?>
										<option value="inputkrs.php?kodemk=<?php echo $kodemk ?>"><?php echo $kodemk. " " .$namamk. " " .$sks. " SKS (Semester " .$smt. ")" ?></option>
								<?php
									}
								?>
							</select>
							</form>
						</td>
					</tr>
				</table>
			</tr>
		</table>
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="7"><center><h2>Daftar Jadwal Mata Kuliah</h2><center></td>
			</tr>
			<tr>
				<td><b>No</b></td>
				<td><b>Kode MK</b></td>
				<td><b>Mata Kuliah</b></td>
				<td><b>Kelompok</b></td>
				<td><b>Jadwal 1</b></td>
				<td><b>Jadwal 2</b></td>
				<td><b>Kuota</b></td>
				<td><b>Aksi</b></td>
			</tr>
			<?php
				session_start();
				include "koneksi.php";
				//include "sisasks.php";
				
				$kode = $_GET['kodemk'];
				$no = 1;
				$nim = $_SESSION['user'];
				$sisa = sisasks($nim);
				$tampil = "SELECT * FROM data_jadwal AS j INNER JOIN data_matkul AS m ON j.kodemk=m.kodemk WHERE j.kodemk='$kode';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$id = $hasil['id_jadwal'];
					$kelompok = $hasil['kelompok'];
					$matkul = $hasil['namamk'];
					$hari = $hasil['hari'];
					$jamm = $hasil['jammulai'];
					$jams = $hasil['jamselesai'];
					$hari2 = $hasil['hari2'];
					$jamm2 = $hasil['jammulai2'];
					$jams2 = $hasil['jamselesai2'];
					$kuota = $hasil['kuota'];
					$sks = $hasil['sks'];
			?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $kode; ?></td>
						<td><?php echo $matkul; ?></td>
						<td><?php echo $kelompok; ?></td>
						<td><?php echo $hari. ", " .$jamm. " - " .$jams ; ?></td>
						<td><?php echo $hari2. ", " .$jamm2. " - " .$jams2 ; ?></td>
						<td><?php echo $kuota; ?></td>
						<td>
							<?php
								if(matkulada($kode,$nim)==true) {
							?>
									<img src="Images/delete.png" /><br/><b>Jadwal Sudah Ada</b>
							<?php
								} else if($kuota==0) {
							?>
									<img src="Images/delete.png" /><br/><b>Kuota Kelas Penuh</b>
							<?php
								} else if($sisa<$sks) {
							?>
									<img src="Images/delete.png" /><br/><b>Sisa SKS Tidak Memenuhi</b>
							<?php
								} else if(tabrakan($hari,$jamm,$jams,$hari2,$jamm2,$jams2,$nim)==true) {
							?>
									<img src="Images/delete.png" /><br/><b>Jadwal Bentrok</b>
							<?php
								} else {
							?>
									<a href="tambahkrs.php?id=<?php echo $id;  ?>" title="Tambahkan" ><img src="Images/add.png" /></a>
							<?php
								}
							?>
						</td>
					</tr>
			<?php
					$no++;
				}
			?>
		</table>
		<table border="0" cellspacing="50">
			<tr>
				<td colspan="9"><center><h2>KRS Sementara</h2><center></td>
			</tr>
			<tr>
				<td><b>No</b></td>
				<td><b>Kode MK</b></td>
				<td><b>Mata Kuliah</b></td>
				<td><b>Kelompok</b></td>
				<td><b>Jadwal 1</b></td>
				<td><b>Ruang</b></td>
				<td><b>Jadwal 2</b></td>
				<td><b>Ruang</b></td>
				<td><b>Aksi</b></td>
			</tr>
			<?php
				session_start();
				include "koneksi.php";
				
				$nim = $_SESSION['user'];
				$no = 1;
				$tampilkan = "SELECT * FROM data_krsmhs AS k 
								INNER JOIN data_jadwal AS j ON k.id_jadwal = j.id_jadwal
								INNER JOIN data_matkul AS m ON j.kodemk = m.kodemk WHERE k.NIM='$nim';";
				$querytampilkan = mysql_query($tampilkan);
				while($hasil = mysql_fetch_array($querytampilkan)) {
					$id = $hasil['id_krs'];
					$kode = $hasil['kodemk'];
					$matkul = $hasil['namamk'];
					$kelompok = $hasil['kelompok'];
					$hari = $hasil['hari'];
					$jamm = $hasil['jammulai'];
					$jams = $hasil['jamselesai'];
					$ruang = $hasil['koderuang'];
					$hari2 = $hasil['hari2'];
					$jamm2 = $hasil['jammulai2'];
					$jams2 = $hasil['jamselesai2'];
					$ruang2 = $hasil['koderuang2'];
			?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $kode; ?></td>
						<td><?php echo $matkul; ?></td>
						<td><?php echo $kelompok; ?></td>
						<td><?php echo $hari. ", " .$jamm. " - " .$jams ; ?></td>
						<td><?php echo $ruang; ?></td>
						<td><?php echo $hari2. ", " .$jamm2. " - " .$jams2 ; ?></td>
						<td><?php echo $ruang2; ?></td>
						<td>
							<a href="hapuskrs.php?id=<?php echo $id;  ?>" title="Hapus" ><img src="Images/delete.png" /></a>
						</td>
					</tr>
			<?php
					$no++;
				}
			?>
		</table>
	</div>
	</div>
	<div id="kuota">
		<h2>Sisa SKS:</h2>
		<?php
			session_start();
			include "koneksi.php";
			//include "sisasks.php";
			
			$nim = $_SESSION['user'];
			$jumsks = sisasks($nim);
		?>
		<h1><?php echo $jumsks; ?></h1>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>