<html>
<head>
	<title>Data Jadwal Dosen</title>
	<link rel="stylesheet" type="text/css" href="CSS/layout.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/font.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/element.css"/>
	<script type="text/javascript" src="JS/krsjs.js"></script>
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
		<form action="tambahdatajadwaldosen.php" method="POST" name="formdosen">
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Data Jadwal Dosen</h1></td>
			</tr>
			<tr>
				<td>
					<a href="tampiljadwaldosen.php" title="Tampilkan Data Jadwal Dosen"><img src="Images/open.png" /></a>
				</td>
				<td>
					<a href="paneladmin.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<tr>
				<td>Nama Dosen</td>
				<td>:</td>
				<td>
					<select name="dosen">
						<option value="0">[Pilih Dosen]</option>
					<?php
						include "koneksi.php";
						
						$dosen = "SELECT * FROM dosen";
						$querydosen = mysql_query($dosen);
						while($hasil = mysql_fetch_array($querydosen)) {
							$nip = $hasil['nip'];
							$nama = $hasil['nama'];
					?>
							<option value="<?php echo $nip; ?>"><?php echo $nama; ?></option>
							
					<?php
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jadwal</td>
				<td>:</td>
				<td>
					<select name="jadwal">
						<option value="0">[Pilih Jadwal]</option>
					<?php 
						include "koneksi.php";
						
						$jadwal = "SELECT * FROM data_jadwal AS j INNER JOIN data_matkul AS m ON j.kodemk=m.kodemk;";
						$queryjadwal = mysql_query($jadwal);
						while($hasil = mysql_fetch_array($queryjadwal)) {
							$id = $hasil['id_jadwal'];
							$namamk = $hasil['namamk'];
							$kelompok = $hasil['kelompok'];
							$hari = $hasil['hari'];
							$jamm = $hasil['jammulai'];
							$jams = $hasil['jamselesai'];
							$hari2 = $hasil['hari2'];
							$jamm2 = $hasil['jammulai2'];
							$jams2 = $hasil['jamselesai2'];
					?>
							<option value="<?php echo $id; ?>"><?php echo $namamk. " (" .$kelompok. ") "; ?></option>
							
					<?php
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" name="submit" value="Submit" onclick="validasiFormDosen()" />
					<input type="reset" name="reset" value="Reset" />
				</td>
			</tr>
		</table>
		</form>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>