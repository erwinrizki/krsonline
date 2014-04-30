<html>
<head>
	<title>Data Jadwal</title>
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
		<form action="updatejadwal.php?id=<?php echo $_GET['id']; ?> " method="POST" name="formjadwal" >
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Data Jadwal</h1></td>
			</tr>
			<tr>
				<td>
					<a href="tampiljadwal.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
					session_start();
					include "koneksi.php";
					
					$no = 1;
					$id = $_GET['id'];
					$tampil = "SELECT * FROM data_jadwal
								WHERE id_jadwal='$id';";
					$querytampil = mysql_query($tampil);
					while($hasil = mysql_fetch_array($querytampil)) {
						$id = $hasil['id_jadwal'];
						$kode = $hasil['kodemk'];
						$nama = $hasil['namamk'];
						$kelompok = $hasil['kelompok'];
						$hari = $hasil['hari'];
						$jamm = $hasil['jammulai'];
						$jams = $hasil['jamselesai'];
						$ruang = $hasil['koderuang'];
						$hari2 = $hasil['hari2'];
						$jamm2 = $hasil['jammulai2'];
						$jams2 = $hasil['jamselesai2'];
						$ruang2 = $hasil['koderuang2'];
						$kuota = $hasil['kuota'];
				?>
			<tr>
				<td>Kode MK</td>
				<td>:</td>
				<td>
					<select name="kodemk">
						<option value="000" selected>[Pilih Kode MK]</option>
						<?php
							include "koneksi.php";
							
							$tampil = "SELECT * FROM data_matkul";
							$querytampil = mysql_query($tampil);
							while($hasil = mysql_fetch_array($querytampil)) {
								$kodemk = $hasil['kodemk'];
								
						?>
								<option value="<?php echo $kodemk; ?>" <?php if($kodemk==$kode) echo "selected"; ?>><?php echo $kodemk; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kelompok</td>
				<td>:</td>
				<td><input type="text" name="kelompok" size="25" value="<?php echo $kelompok; ?>" /></td>
			</tr>
			<tr>
				<td>Kuota</td>
				<td>:</td>
				<td><input type="text" name="kuota" size="15" value="<?php echo $kuota; ?>" /></td>
			</tr>
			<tr>
				<td colspan="3"><h2>Jadwal 1</h2></td>
			</tr>
			<tr>
				<td>Hari</td>
				<td>:</td>
				<td><input type="text" name="hari" size="25" value="<?php echo $hari; ?>" /></td>
			</tr>
			<tr>
				<td>Jam Mulai</td>
				<td>:</td>
				<td><input type="text" name="jamm" size="25" value="<?php echo $jamm; ?>" /></td>
			</tr>
			<tr>
				<td>Jam Selesai</td>
				<td>:</td>
				<td><input type="text" name="jams" size="25" value="<?php echo $jams; ?>" /></td>
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
								<option value="<?php echo $koderuang; ?>" <?php if($koderuang==$ruang) echo "selected"; ?>><?php echo $koderuang; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3"><h2>Jadwal 2</h2></td>
			</tr>
			<tr>
				<td>Hari</td>
				<td>:</td>
				<td><input type="text" name="hari2" size="25" value="<?php echo $hari2; ?>" /></td>
			</tr>
			<tr>
				<td>Jam Mulai</td>
				<td>:</td>
				<td><input type="text" name="jamm2" size="25" value="<?php echo $jamm2; ?>" /></td>
			</tr>
			<tr>
				<td>Jam Selesai</td>
				<td>:</td>
				<td><input type="text" name="jams2" size="25" value="<?php echo $jams2; ?>" /></td>
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
								$koderuang2 = $hasil['koderuang'];
								
						?>
								<option value="<?php echo $koderuang2; ?>" <?php if($koderuang2==$ruang2) ?>><?php echo $koderuang; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" name="update" value="Update" />
				</td>
			</tr>
		</table>
		<?php
			}
		?>
		</form>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>