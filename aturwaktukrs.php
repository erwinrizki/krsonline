<html>
<head>
	<title>Atur Waktu KRS</title>
	<link rel="stylesheet" type="text/css" href="CSS/layout.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/element.css"/>
	<script type="text/javascript" src="JS/krsjs.js"></script>
	
	<link rel="stylesheet" type="text/css" href="CSS/jquery.ui.all.css" />
	<link rel="stylesheet" type="text/css" href="CSS/demos.css" />
	<link rel="stylesheet" type="text/css" href="CSS/jquery.ui.datepicker.css" />
	 
	<script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="JS/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="JS/ui/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="JS/ui/i18n/jquery.ui.datepicker-id.js"></script>
	 
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tanggal").datepicker({
				showOn: "both", buttonImage: "Images/calendar.gif", buttonImageOnly: true, nextText: "", prevText: "", changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd"
			});
		});
	</script>
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
		<form action="tambahwaktu.php" method="POST">
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Atur Waktu KRS</h1></td>
			</tr>
			<tr>
				<td>
					<a href="paneladmin.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
				include "koneksi.php";
				
				$tampil = "SELECT * FROM data_waktu";
				$querytampil = mysql_query($tampil);
				$jum = mysql_num_rows($querytampil);
				if($jum==1) {
					echo "<tr>";
					echo "<td><a href=\"resetwaktu.php\" title=\"Reset Waktu\"><img src=\"Images/bin.png\" /></a></td>";
					echo "<td><a href=\"resetwaktu.php\" title=\"Reset Waktu\"><h2>Atur Ulang Waktu KRS</h2></a></td>";
					echo "</tr>";
				} else {
			?>
			<tr>
				<td><h2>Tanggal</h2></td>
				<td>:</td>
				<td><input id="tanggal" type="text" name="tgl"></td>
			</tr>
			<tr>
				<td><h2>Jam</h2></td>
				<td>:</td>
				<td><input type="text" name="jam" size="15" /></td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" name="submit" value="Submit" />
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