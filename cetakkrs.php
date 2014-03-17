<html>
<head>
	<title>Cetak KRS</title>
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
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="4"><h1>Cetak KRS</h1></td>
			</tr>
			<td>
				<a href="paneladmin.php" title="Kembali"><img src="Images/back.png" /></a>
			</td>
			<tr>
				<td><b>Masukkan NIM Mahasiswa</b></td>
				<td>:</td>
				<td><input type="text" name="nim" size="35" /></td>
				<td><input type="submit" name="cari" value="Cari" /></td>
			</tr>
		</table>
		</form>
		<?php
			include "koneksi.php";
			
			$nim = $_POST['nim'];
			$cari = "SELECT * FROM data_krsmhs WHERE NIM='$nim';";
			$cariquery = mysql_query($cari);
			$jumlah = mysql_num_rows($cariquery);
			
			if($jumlah>0) {
		?>
				<hr/>
				<table border="0" cellspacing="40">
					<tr>
						<td><b>NIM</b></td>
						<td><b>Action</b></td>
					</tr>
					<tr>
						<td><?php echo $nim; ?></td>
						<td><a href="downloadpdf.php?nim=<?php echo $nim; ?>"><img src="Images/cetakpdf.png" /></a></td>
					</tr>
				</table>
		<?php
			}
		?>
	</div>
	</div>
</body>
</html>