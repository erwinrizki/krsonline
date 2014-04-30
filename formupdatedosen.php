<html>
<head>
	<title>Data Dosen</title>
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
		<form action="updatedosen.php?id=<?php echo $_GET['id']; ?> " method="POST" name="formdosen" >
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Data Dosen</h1></td>
			</tr>
			<tr>
				<td>
					<a href="tampildosen.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
				include "koneksi.php";
				
				$id = $_GET['id'];
				$tampil = "SELECT * FROM dosen WHERE id='$id';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$nip = $hasil['nip'];
					$nama = $hasil['nama'];
					$pass = $hasil['password'];
			?>
					<tr>
						<td>NIP</td>
						<td>:</td>
						<td><input type="text" name="nip" value="<?php echo $nip; ?>" /></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="nama" size="35" value="<?php echo $nama; ?>" /></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="text" name="pass" size="25" value="<?php echo $pass; ?>" /></td>
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