<html>
<head>
	<title>Data Jadwal</title>
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
		<form action="tambahjadwal.php" method="POST">
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Data Jadwal</h1></td>
			</tr>
			<tr>
				<td>
					<a href="tampiljadwal.php" title="Tampilkan Data Mhs"><img src="Images/open.png" /></a>
				</td>
				<td>
					<a href="paneladmin.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<tr>
				<td>Nama MK</td>
				<td>:</td>
				<td>
					<select name="kodemk">
						<option value="000" selected>[Pilih Nama MK]</option>
						<?php
							include "koneksi.php";
							
							$tampil = "SELECT * FROM data_matkul";
							$querytampil = mysql_query($tampil);
							while($hasil = mysql_fetch_array($querytampil)) {
								$kodemk = $hasil['kodemk'];
								$namamk = $hasil['namamk'];
								
						?>
								<option value="<?php echo $kodemk; ?>"><?php echo $kodemk. " " .$namamk; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kelompok</td>
				<td>:</td>
				<td><input type="text" name="kelompok" size="25" /></td>
			</tr>
			<tr>
				<td>Kuota</td>
				<td>:</td>
				<td><input type="text" name="kuota" size="15" /></td>
			</tr>
			<tr>
				<td colspan="3"><h2>Jadwal 1</h2></td>
			</tr>
			<tr>
				<td>Hari</td>
				<td>:</td>
				<td><input type="text" name="hari" size="25" /></td>
			</tr>
			<tr>
				<td>Jam Mulai</td>
				<td>:</td>
				<td><input type="text" name="jamm" size="25" /> *Contoh Format Penulisan Jam: 07.00, 10.20</td>
			</tr>
			<tr>
				<td>Jam Selesai</td>
				<td>:</td>
				<td><input type="text" name="jams" size="25" /></td>
			</tr>
			<tr>
				<td>Ruang</td>
				<td>:</td>
				<td>
					<select name="ruang">
						<option value="000" selected>[Pilih Kode Ruang]</option>
						<?php
							include "koneksi.php";
							
							$tampil = "SELECT * FROM data_ruang";
							$querytampil = mysql_query($tampil);
							while($hasil = mysql_fetch_array($querytampil)) {
								$koderuang = $hasil['koderuang'];
								
						?>
								<option value="<?php echo $koderuang; ?>"><?php echo $koderuang; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
			<tr>
				<td colspan="3"><h2>Jadwal 2</h2></td>
			</tr>
			<tr>
				<td>Hari</td>
				<td>:</td>
				<td><input type="text" name="hari2" size="25" value="-" /></td>
			</tr>
			<tr>
				<td>Jam Mulai</td>
				<td>:</td>
				<td><input type="text" name="jamm2" size="25" value="-" /></td>
			</tr>
			<tr>
				<td>Jam Selesai</td>
				<td>:</td>
				<td><input type="text" name="jams2" size="25" value="-" /></td>
			</tr>
			<tr>
				<td>Ruang</td>
				<td>:</td>
				<td>
					<select name="ruang2">
						<option value="-" selected>[Pilih Kode Ruang]</option>
						<?php
							include "koneksi.php";
							
							$tampil = "SELECT * FROM data_ruang";
							$querytampil = mysql_query($tampil);
							while($hasil = mysql_fetch_array($querytampil)) {
								$koderuang = $hasil['koderuang'];
								
						?>
								<option value="<?php echo $koderuang; ?>"><?php echo $koderuang; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
				<td colspan="3">
					<input type="submit" name="submit" value="Submit" />
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