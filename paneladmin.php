<?php
	session_start();
	
	if(!isset($_SESSION['username'])) {
		header('location:adminlogin.html');
	}
?>
<html>
<head>
	<title>Panel Admin</title>
	<link rel="stylesheet" type="text/css" href="CSS/layout.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/font.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/element.css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".btn-slide").click(function(){
			$("#cpanel").slideToggle("slow");
			$(this).toggleClass("active");
			return false;
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".btn-slide1").click(function(){
			$("#cpanel1").slideToggle("slow");
			//$(this).toggleClass("active");
			return false;
			});
		});
	</script>
</head>
<body>
	<div id="container">
	<div id="header">
		<table border="0" cellspacing="10">
			<tr>
				<td><img src="Images/admin.png" /></td>
				<td><h1>Admin Page</h1></td>
			</tr>
		</table>
	</div>
	<div class="slide" style="background: lime;"><a href="#" class="btn-slide">Show/Hide Master Data</a></div>
	<div id="cpanel">
		<table border="0" cellspacing="30">
			<tr>
				<td colspan="5"><h1>Master Data</h1></td>
			</tr>
			<tr>
				<td><a href="datamhs.html" title="Data Mahasiswa"><img src="Images/student.png" width="150" height="150" /></a></td>
				<td><a href="datamatkul.html" title="Data Matkul"><img src="Images/matkul.png" width="150" height="150" /></a></td>
				<td><a href="datadosen.html" title="Data Dosen"><img src="Images/teacher.png" width="150" height="150" /></a></td>
				<td><a href="datajadwal.php" title="Data Jadwal"><img src="Images/jadwal.png" /></a></td>
				<td><a href="datapengumuman.html" title="Data Pengumuman"><img src="Images/pengumuman.png" /></a></td>
			</tr>
			<tr>
				<td><a href="datamhs.html" title="Data Mahasiswa">Data Mahasiswa</a></td>
				<td><a href="datamatkul.html" title="Data Matkul">Data Matkul</a></td>
				<td><a href="datadosen.html" title="Data Dosen">Data Dosen</a></td>
				<td><a href="datajadwal.php" title="Data Jadwal">Data Jadwal</a></td>
				<td><a href="datapengumuman.html" title="Data Pengumuman">Data Pengumuman</a></td>
			</tr>
			<tr>
				<td><a href="dataruang.html" title="Data Ruang"><img src="Images/ruang.png" /></a></td>
				<td><a href="datajadwaldosen.php" title="Data Jadwal Dosen"><img src="Images/jadwaldosen.png" /></a></td>
				<td><a href="aturwaktukrs.php" title="Atur Waktu KRS"><img src="Images/waktu.png" /></a></td>
			</tr>
			<tr>
				<td><a href="dataruang.html" title="Data Ruang">Data Ruang</a></td>
				<td><a href="datajadwaldosen.php" title="Data Jadwal Dosen">Data Jadwal Dosen</a></td>
				<td><a href="aturwaktukrs.php" title="Atur Waktu KRS">Atur Waktu KRS</a></td>
			</tr>
		</table>
	</div>
	<div class="slide1" style="background: lime;"><a href="#" class="btn-slide1">Show/Hide Laporan</a></div>
	<div id="cpanel1">
		<table border="0" cellspacing="30">
			<tr>
				<td colspan="5"><h1>Laporan</h1></td>
			</tr>
			<tr>
				<td><a href="cetakkrs.php" title="Cetak KRS"><img src="Images/cetak.png" /></a></td>
				<td><a href="jadwalkelas.php" title="Jadwal Kelas"><img src="Images/schedule.png" width="150" height="150" /></a></td>
			</tr>
			<tr>
				<td><a href="cetakkrs.php" title="Cetak KRS">Cetak KRS</a></td>
				<td><a href="jadwalkelas.php" title="Jadwal Kelas">Jadwal Kelas</a></td>
			</tr>
		</table>
	</div>
	<div id="cpanel2">
		<table border="0" cellspacing="30">
			<tr>
				<td><a href="logout.php" title="Log Out" ><img src="Images/logout.png" /></a></td>
			</tr>
			<tr>
				<td><a href="logout.php" >Log Out</a></td>
			</tr>
		</table>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>