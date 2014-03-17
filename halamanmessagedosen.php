<html>
<body>
	<div id="isi">
		<form action="kirimdosen.php" method="POST">
		<table border="0">
			<tr>
				<td><font color="white">To</font></td>
				<td><font color="white">:</font></td>
				<td><input type="text" name="tujuan" /><font color="white">* Masukkan NIM/NIP</font></td>
			</tr>
			<tr>
				<td><font color="white">Subject</font></td>
				<td><font color="white">:</font></td>
				<td><input type="text" name="subject" size="40" /></td>
			</tr>
			<tr>
				<td><font color="white">Mail</font></td>
				<td><font color="white">:</font></td>
				<td>
					<textarea cols="40" rows="10" name="isi"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<center>
					<input type="submit" value="Kirim" />
					<input type="reset" value="Cancel" />
					</center>
				</td>
			</tr>
		</table>
		</form>
	</div>
	<div id="inbox">
		<table border="0" cellspacing="35">
			<tr>
				<td colspan="2"><font color="white"><b>Inbox</b></font></td>
			</tr>
		<?php
			session_start();
			include "koneksi.php";
			
			$to = $_SESSION['user'];
			$no = 1;
			$in = "SELECT * FROM datapesan WHERE ke='$to' ORDER BY tanggal DESC;";
			$queryin = mysql_query($in);
			while($hasil = mysql_fetch_array($queryin)) {
				$sub = $hasil['subject'];
				$from = $hasil['dari'];
				$isi = $hasil['isi'];
				$tgl = $hasil['tanggal'];
		?>
				<tr>
					<td><font color="white">From: <?php echo $from; ?></font></td>
					<td><font color="white"><?php echo $isi; ?></font></td>
					<td><font color="white"><?php echo $tgl; ?></font></td>
				</tr>
		<?php
				$no++;
			}
		?>
		</table>
	</div>
	<div id="outbox">
		<table border="0" cellspacing="35">
			<tr>
				<td colspan="2"><font color="white"><b>Outbox</b></font></td>
			</tr>
		<?php
			session_start();
			include "koneksi.php";
			
			$from = $_SESSION['user'];
			$no = 1;
			$out = "SELECT * FROM datapesan WHERE dari='$from' ORDER BY tanggal DESC;";
			$queryout = mysql_query($out);
			while($hsl = mysql_fetch_array($queryout)) {
				$sub = $hsl['subject'];
				$to = $hsl['ke'];
				$isi = $hsl['isi'];
				$tgl = $hsl['tanggal'];
		?>
				<tr>
					<font color="white">
					<td><font color="white">To: <?php echo $to; ?></font></td>
					<td><font color="white"><?php echo $isi; ?></font></td>
					<td><font color="white"><?php echo $tgl; ?></font></td>
					</font>
				</tr>
		<?php
				$no++;
			}
		?>
		</table>
	</div>
</body>
</html>