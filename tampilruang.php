<html>
<head>
	<title>Data Ruang</title>
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
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="4"><h1>Data Ruang</h1></td>
			</tr>
			<tr>
				<td>
					<a href="dataruang.html" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<table border="0" cellspacing="35">
				<tr>
					<td><b>No</b></td>
					<td><b>Kode Ruang</b></td>
					<td><b>Kapasitas</b></td>
					<td><b>Aksi</b></td>
				</tr>
				<?php
					include "koneksi.php";
					
					$no = 1;
					$tampil = "SELECT * FROM data_ruang;";
					$querytampil = mysql_query($tampil);
					
					while($hasil = mysql_fetch_array($querytampil)) {
						$id = $hasil['id_ruang'];
						$kode = $hasil['koderuang'];
						$kapasitas = $hasil['kapasitas'];
				?>
						
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $kode; ?></td>
						<td><?php echo $kapasitas; ?></td>
						<td>
							<a href="formupdateruang.php?id_ruang=<?php echo $id; ?>" title="Update"><img src="Images/update.png" /></a>
							<a href="deleteruang.php?id_ruang=<?php echo $id; ?>" title="Delete" onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"><img src="Images/delete.png" /></a>
						</td>
					</tr>
				<?php	
						$no++;
					}
				?>
			</table>
		</table>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>