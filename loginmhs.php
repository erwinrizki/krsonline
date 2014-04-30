<?php
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	include "koneksi.php";
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$date = date('Y-m-d H:i:s');
	$ip = $_SERVER['SERVER_ADDR'];
	
	$login = "SELECT * FROM mhs WHERE NIM='$user' AND Password='$pass';";
	$querylogin = mysql_query($login);
	$cek = mysql_num_rows($querylogin);
	if($cek) {
		$_SESSION['user'] = $user;
		mysql_query("INSERT INTO log_login_mhs VALUES(null,'$user','$pass','$ip','$date');");
		echo "<script>location.replace('panelmhs.php');</script>";
	} else {
		echo "<script>alert('Kombinasi NIM dan Password Salah!');location.replace('mhslogin.html');</script>";
	}
?>