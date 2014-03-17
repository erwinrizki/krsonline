<html>
<head>
	<title>Informasi Keuangan</title>
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
				<td colspan="3"><h1>Informasi Keuangan</h1></td>
			</tr>
			<tr>
				<td>
					<a href="panelmhs.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
				session_start();
				include "koneksi.php";
				
				$nim = $_SESSION['user'];
				$tampil = "SELECT dm.nim, dk.kewajiban, dk.status FROM data_keuangan as dk INNER JOIN mhs as dm ON dk.id = dm.id WHERE dm.nim = '$nim';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$nim = $hasil['nim'];
					$wajib = $hasil['kewajiban'];
					$status = $hasil['status'];
				
			?>
			<tr>
				<td><b>NIM</b></td>
				<td>:</td>
				<td><?php echo $nim; ?></td>
			</tr>
			<tr>
				<td><b>Kewajiban</b></td>
				<td>:</td>
				<td>Rp. <?php echo number_format($wajib,2,",","."); ?></td>
			</tr>
			<tr>
				<td><b>Status Pembayaran</b></td>
				<td>:</td>
				<td><?php echo $status; ?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</div>
	</div>
</body>
</html>