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
		<form action="" >
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Daftar Pengumuman</h1></td>
			</tr>
			<tr>
				<td>
					<a href="panelmhs.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
				include "koneksi.php";
				
				$tampil = "SELECT * FROM data_pengumuman;";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$id = $hasil['id'];
					$judul = $hasil['judul'];
			?>
					<tr>
						<td>
							<ul type="square">
								<li><a href="viewpengumumanmhs.php?id=<?php echo $id; ?>"><?php echo $judul; ?></a></li>
							</ol>
						</td>
					</tr>
			<?php
				}
			?>
		</table>
		</form>
	</div>
	</div>
</body>
</html>