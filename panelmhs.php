<?php
	session_start();
	
	if(!isset($_SESSION['user'])) {
		header('location:mhslogin.html');
	}
?>
<html>
<head>
	<title>Home | Mahasiswa</title>
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
	<div class="slide" style="background: lime;"><a href="#" class="btn-slide">Show/Hide Menu Utama</a></div>
	<div id="cpanel">
		<table border="0" cellspacing="30">
			<tr>
				<td colspan="4"><h1>Menu Utama</h1></td>
			</tr>
			<tr>
				<td><a href="inputkrs.php" title="Input KRS"><img src="Images/input.png" /></a></td>
				<td><a href="krsmahasiswa.php" title="Daftar Jadwal Kuliah"><img src="Images/listjadwal.png" /></a></td>
				<td><a href="messagemhs.php" title="Message"><img src="Images/pesan.png" /></a></td>
				<td><a href="pengumumanmhs.php" title="Pengumuman"><img src="Images/pengumuman.png" /></a></td>
				<td><a href="keuangan.php" title="Keuangan"><img src="Images/uang.png" /></a></td>
			</tr>
			<tr>
				<td><a href="inputkrs.php" title="Input KRS">Input KRS</a></td>
				<td><a href="krsmahasiswa.php" title="Daftar Jadwal Kuliah">Daftar Jadwal Kuliah</a></td>
				<td><a href="messagemhs.php" title="Message">Message</a></td>
				<td><a href="pengumumanmhs.php" title="Pengumuman">Pengumuman</a></td>
				<td><a href="keuangan.php" title="Keuangan">Keuangan</a></td>
			</tr>
		</table>
	</div>
	<div id="cpanel2">
		<table border="0" cellspacing="30">
			<tr>
				<td><a href="logoutmhs.php" title="Log Out" ><img src="Images/logout.png" /></a></td>
			</tr>
			<tr>
				<td><a href="logoutmhs.php" title="Log Out" >Log Out</a></td>
			</tr>
		</table>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>