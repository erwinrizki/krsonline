<html>
<head>
	<title>Data Keuangan</title>
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
				<td><img src="Images/biku.png" width="150" height="150" /></td>
				<td><h1>BIKU Page</h1></td>
			</tr>
		</table>
	</div>
	<div id="cpanel">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="formkeuangan" >
		<table border="0" cellspacing="30">
			<tr>
				<td colspan="4"><h1>Data Keuangan</h1></td>
			</tr>
			<tr>
				<td>
					<a href="datakeuangan.html" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<tr>
				<td>Masukkan NIM Mahasiswa</td>
				<td>:</td>
				<td><input type="text" name="cari" /></td>
				<td><input type="submit" name="search" value="Cari" /></td>
			</tr>
		</table>
		</form>
		<?php
			include "koneksi.php";
			
			$nim = $_POST['cari'];
			$tampil = "SELECT dm.NIM, dk.kewajiban, dk.status, dk.id FROM data_keuangan AS dk INNER JOIN mhs AS dm ON dk.id = dm.id WHERE dm.NIM = '$nim';";
			$querytampil = mysql_query($tampil);
			while($hasil = mysql_fetch_array($querytampil)) {
				$id = $hasil['id'];
				$nimmhs = $hasil['NIM'];
				$wajib = $hasil['kewajiban'];
				$status = $hasil['status'];
		?>
		<form action="updatekeuangan.php" method="POST">
		<table border="0" cellspacing="30">		
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim" value="<?php echo $nimmhs; ?>" disabled /></td>
			</tr>
			<tr>
				<td>Kewajiban</td>
				<td>:</td>
				<td><input type="text" name="kewajiban" size="35" value="<?php echo $wajib; ?>" disabled /></td>
			</tr>
			<tr>
				<td>Status Pembayaran</td>
				<td>:</td>
				<td>
					<select name="status">
						<option value="Terbayar" <?php if($status=="Terbayar") echo "selected"; ?>>Terbayar</option>
						<option value="Belum Terbayar" <?php if($status=="Belum Terbayar") echo "selected"; ?>>Belum Terbayar</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" name="update" value="Update" />
				</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $id; ?>" />
				</td>
			</tr>
		</table>
		</form>
		<?php
			}
		?>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>