<html>
<head>
	<title>Message</title>
	<link rel="stylesheet" type="text/css" href="CSS/layout.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/font.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/element.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> <!-- source jquery -->
	<script>
		function inbox() {
			$(document).ready(function(){
			$("#isimsg").load('halamanmessage.php #inbox');
			});
		}
		
		function compose() {
			$(document).ready(function(){
			$("#isimsg").load('halamanmessage.php #isi');
			});
		}
		
		function outbox() {
			$(document).ready(function(){
			$("#isimsg").load('halamanmessage.php #outbox');
			});
		}
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
	<div id="cpanel">
		<h1>Message Mahasiswa</h1><br/>
		<a href="panelmhs.php" title="Kembali"><img src="Images/back.png" /></a><br/>
		<div id="isimsg">
			<form action="kirimmhs.php" method="POST">
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
		<div id="menumsg">
			<a href="#" onclick="compose()"><img src="Images/open.png" width="30" height="30" /><b><font color="white">Compose</font></b></a><br/>
			<a href="#" onclick="inbox()"><img src="Images/inbox.png" width="30" height="30" /><b><font color="white">Inbox</font></b></a><br/>
			<a href="#" onclick="outbox()"><img src="Images/outbox.png" width="30" height="30" /><b><font color="white">Outbox</font></b></a><br/>
		</div>
	</div>
	</div>
	<div id="footer">Copyright &copy; 2013 ERA</div>
</body>
</html>