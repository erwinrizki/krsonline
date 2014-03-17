<html>
<head>
	<title>Data Mahasiswa</title>
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
				<td colspan="3"><h1>Data Mahasiswa</h1></td>
			</tr>
			<tr>
				<td>
					<a href="datamhs.html" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<table border="0" cellspacing="35">
				<tr>
					<td><b>No</b></td>
					<td><b>NIM</b></td>
					<td><b>Nama</b></td>
					<td><b>Password</b></td>
					<td><b>Progdi</b></td>
					<td><b>Aksi</b></td>
				</tr>
				<?php
					include "koneksi.php";
					
					$no = 1;
					$tampil = "SELECT * FROM mhs;";
					$querytampil = mysql_query($tampil);
					
					while($hasil = mysql_fetch_array($querytampil)) {
						$id = $hasil['id'];
						$nim = $hasil['NIM'];
						$nama = $hasil['Nama'];
						$pass = $hasil['Password'];
						$progdi = $hasil['Progdi'];
				?>
						
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $nim; ?></td>
						<td><?php echo $nama; ?></td>
						<td><?php echo $pass; ?></td>
						<td><?php echo $progdi; ?></td>
						<td>
							<a href="formupdatemhs.php?id=<?php echo $id; ?>" title="Update"><img src="Images/update.png" /></a>
							<a href="deletemhs.php?id=<?php echo $id; ?>" title="Delete" onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"><img src="Images/delete.png" /></a>
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