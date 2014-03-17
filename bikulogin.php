<?php
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	include "koneksi.php";
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$passmd5 = md5($pass);
	$date = date('Y-m-d H:i:s');
	$ip = $_SERVER['SERVER_ADDR'];
	
	$login = "SELECT * FROM biku WHERE username='$user' AND password='$passmd5';";
	$querylogin = mysql_query($login);
	$cek = mysql_num_rows($querylogin);
	
	if($cek) {
		$_SESSION['user'] = $user;
		mysql_query("INSERT INTO log_login_biku VALUES(null,'$user','$passmd5','$ip','$date');");
		echo "<script>location.replace('panelbiku.php');</script>";
	} else {
		echo "<script>alert('Kombinasi Username dan Password Salah!');location.replace('loginbiku.html');</script>";
	}
?>