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
		<form action="updatematkul.php?id_matkul=<?php echo $_GET['id_matkul']; ?> " method="POST" name="formmatkul" >
		<table border="0" cellspacing="40">
			<tr>
				<td colspan="3"><h1>Data Matkul</h1></td>
			</tr>
			<tr>
				<td>
					<a href="tampilmatkul.php" title="Kembali"><img src="Images/back.png" /></a>
				</td>
			</tr>
			<?php
				include "koneksi.php";
				
				$id = $_GET['id_matkul'];
				$tampil = "SELECT * FROM data_matkul WHERE id_matkul='$id';";
				$querytampil = mysql_query($tampil);
				while($hasil = mysql_fetch_array($querytampil)) {
					$kodemk = $hasil['kodemk'];
					$namamk = $hasil['namamk'];
					$sks = $hasil['sks'];
					$tp = $hasil['tp'];
					$smt = $hasil['semester'];
			?>
					<tr>
						<td>Kode MK</td>
						<td>:</td>
						<td><input type="text" name="kdmk" value="<?php echo $kodemk; ?>" /></td>
					</tr>
					<tr>
						<td>Nama MK</td>
						<td>:</td>
						<td><input type="text" name="namamk" size="35" value="<?php echo $namamk; ?>" /></td>
					</tr>
					<tr>
						<td>SKS</td>
						<td>:</td>
						<td><input type="text" name="sks" size="15" value="<?php echo $sks; ?>" /></td>
					</tr>
					<tr>
						<td>T/P</td>
						<td>:</td>
						<td>
							<select name="tp">
								<option value="">[Pilih]</option>
								<option value="T" <?php if($tp=="T") echo "selected"; ?>>T</option>
								<option value="P" <?php if($tp=="P") echo "selected"; ?>>P</option>
								<option value="T/P" <?php if($tp=="T/P") echo "selected"; ?>>T/P</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Semester</td>
						<td>:</td>
						<td><input type="text" name="semester" size="15" value="<?php echo $smt; ?>" /></td>
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