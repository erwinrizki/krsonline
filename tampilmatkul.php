<html>
<head>
	<title>Data Matkul</title>
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
				<td colspan="6"><h1>Data Matkul</h1></td>
			</tr>
			<tr>
				<td>
					<a href="datamatkul.html" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<table border="0" cellspacing="35">
				<tr>
					<td><b>No</b></td>
					<td><b>Kode MK</b></td>
					<td><b>Nama MK</b></td>
					<td><b>SKS</b></td>
					<td><b>T/P</b></td>
					<td><b>Semester</b></td>
					<td><b>Aksi</b></td>
				</tr>
				<?php
					include "koneksi.php";
					
					$no = 1;
					$tampil = "SELECT * FROM data_matkul;";
					$querytampil = mysql_query($tampil);
					
					while($hasil = mysql_fetch_array($querytampil)) {
						$id = $hasil['id_matkul'];
						$kodemk = $hasil['kodemk'];
						$namamk = $hasil['namamk'];
						$sks = $hasil['sks'];
						$tp = $hasil['tp'];
						$smt = $hasil['semester'];
				?>
						
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $kodemk; ?></td>
						<td><?php echo $namamk; ?></td>
						<td><?php echo $sks; ?></td>
						<td><?php echo $tp; ?></td>
						<td><?php echo $smt; ?></td>
						<td>
							<a href="formupdatematkul.php?id_matkul=<?php echo $id; ?>" title="Update"><img src="Images/update.png" /></a>
							<a href="deletematkul.php?id_matkul=<?php echo $id; ?>" title="Delete" onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"><img src="Images/delete.png" /></a>
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