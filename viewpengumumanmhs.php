<html>
<head>
	<title>Daftar Pengumuman</title>
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
				<td colspan="3"><h1>Daftar Pengumuman</h1></td>
			</tr>
			<tr>
				<td>
					<a href="pengumumanmhs.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
				include "koneksi.php";
				
				$pilih = $_GET['id'];
				$tampil = "SELECT * FROM data_pengumuman WHERE id=$pilih;";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$id = $hasil['id'];
					$judul = $hasil['judul'];
					$author = $hasil['author'];
					$isi = $hasil['isi'];
			?>
					<tr>
						<td>
							<?php echo "<b>$judul</b>"; ?>
							<br/><br/>
							<?php echo $isi; ?><br/>
							<?php echo "By: " .$author; ?>
						</td>
					</tr>
			<?php
				}
			?>
		</table>
	</div>
	</div>
</body>
</html>