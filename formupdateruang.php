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
		<form action="updateruang.php?id_ruang=<?php echo $_GET['id_ruang']; ?> " method="POST" name="formruang" >
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Data Ruang</h1></td>
			</tr>
			<tr>
				<td>
					<a href="tampilruang.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
				include "koneksi.php";
				
				$id = $_GET['id_ruang'];
				$tampil = "SELECT * FROM data_ruang WHERE id_ruang=$id;";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$koderuang = $hasil['koderuang'];
					$kapasitas = $hasil['kapasitas'];
			?>
					<tr>
						<td>Kode Ruang</td>
						<td>:</td>
						<td><input type="text" name="kdruang" value="<?php echo $koderuang; ?>" /></td>
					</tr>
					<tr>
						<td>Kapasitas</td>
						<td>:</td>
						<td><input type="text" name="kapasitas" size="15" value="<?php echo $kapasitas; ?>" /></td>
					</tr>
					<tr>
						<td colspan="3">
						<input type="submit" name="update" value="Update" />
						<input type="reset" name="reset" value="Reset" />
						</td>
					</tr>
			<?php
				}
			?>
		</table>
		</form>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>