<html>
<head>
	<title>Data Pengumuman</title>
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
		<form action="updatepengumuman.php?id=<?php echo $_GET['id']; ?> " method="POST" name="formpengumuman" >
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Data Pengumuman</h1></td>
			</tr>
			<tr>
				<td>
					<a href="tampilpengumuman.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
				include "koneksi.php";
				
				$id = $_GET['id'];
				$tampil = "SELECT * FROM data_pengumuman WHERE id='$id';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$judul = $hasil['judul'];
					$author = $hasil['author'];
					$isi = $hasil['isi'];
			?>
					<tr>
						<td>Judul</td>
						<td>:</td>
						<td><input type="text" name="judul" size="55" value="<?php echo $judul; ?>" /></td>
					</tr>
					<tr>
						<td>Author</td>
						<td>:</td>
						<td><input type="text" name="author" size="25" value="<?php echo $author; ?>" /></td>
					</tr>
					<tr>
						<td>Isi Pengumuman</td>
						<td>:</td>
						<td>
							<textarea cols="45" rows="8" name="isi" ><?php echo $isi; ?></textarea>
						</td>
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