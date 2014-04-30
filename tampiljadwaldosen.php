<html>
<head>
	<title>Data Jadwal</title>
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
		<table border="0" cellspacing="30">
			<tr>
				<td colspan="8"><h1>Data Jadwal Dosen</h1></td>
			</tr>
			<tr>
				<td>
					<a href="datajadwaldosen.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<table border="0" cellspacing="40">
				<tr>
					<td><b>No</b></td>
					<td><b>Nama Dosen</b></td>
					<td><b>Jadwal Mengajar</b></td>
				</tr>
				<?php
					session_start();
					include "koneksi.php";
					
					$no = 1;
					$tampil = "SELECT * FROM data_jadwaldosen AS j
								INNER JOIN data_jadwal AS jd ON j.id_jadwal=jd.id_jadwal
								INNER JOIN data_matkul AS m ON jd.kodemk=m.kodemk
								INNER JOIN dosen AS d ON j.nip=d.nip;";
					$querytampil = mysql_query($tampil);
					while($hasil = mysql_fetch_array($querytampil)) {
						$id = $hasil['id_ajar'];
						$dosen = $hasil['nama'];
						$nama = $hasil['namamk'];
						$kelompok = $hasil['kelompok'];
				?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $dosen; ?></td>
							<td><?php echo $nama; ?></td>
							<td><?php echo $kelompok; ?></td>
							<td>
								<a href="formupdatejadwaldosen.php?id=<?php echo $id; ?>" title="Update"><img src="Images/update.png" /></a>
								<a href="deletejadwaldosen.php?id=<?php echo $id; ?>" title="Delete" onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"><img src="Images/delete.png" /></a>
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