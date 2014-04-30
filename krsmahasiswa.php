<html>
<head>
	<title>KRS Mahasiswa</title>
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
	<div id="cpanel">
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="9"><h1>KRS Mahasiswa</h1></td>
			</tr>
			<tr>
				<td><a href="downloadpdfkrs.php" title="Download" ><img src="Images/cetakpdf.png" />Download</a></td>
				<td><a href="panelmhs.php" title="Kembali"><img src="Images/back.png" /></a></td>
			</tr>
		</table>
		<table border="0" cellspacing="40">
			<tr>
				<td><b>No</b></td>
				<td><b>Kode MK</b></td>
				<td><b>Mata Kuliah</b></td>
				<td><b>SKS</b></td>
				<td><b>Kelompok</b></td>
				<td><b>Jadwal 1</b></td>
				<td><b>Ruang</b></td>
				<td><b>Jadwal 2</b></td>
				<td><b>Ruang</b></td>
			</tr>
			<?php
				session_start();
				include "koneksi.php";
				
				$no = 1;
				$nim = $_SESSION['user'];
				$tampil = "SELECT * FROM data_krsmhs AS k
							INNER JOIN data_jadwal AS j ON k.id_jadwal=j.id_jadwal
							INNER JOIN data_matkul AS m ON j.kodemk=m.kodemk
							WHERE k.NIM='$nim';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$kode = $hasil['kodemk'];
					$nama = $hasil['namamk'];
					$sks = $hasil['sks'];
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
						<td><?php echo $nama; ?></td>
						<td><?php echo $sks; ?></td>
						<td><?php echo $kelompok; ?></td>
						<td><?php echo $hari. ", " .$jamm. " - " .$jams; ?></td>
						<td><?php echo $ruang; ?></td>
						<td><?php echo $hari2. ", " .$jamm2. " - " .$jams2; ?></td>
						<td><?php echo $ruang2; ?></td>
					</tr>
			<?php
					$no++;
				}
			?>
		</table>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>