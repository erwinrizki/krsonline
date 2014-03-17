<?php
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	include "koneksi.php";
	
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$passwordhash = md5($password);
	$date = date('Y-m-d H:i:s');
	$ip = $_SERVER['SERVER_ADDR'];
	
	$login = "SELECT * FROM admin WHERE username='$username' and password='$passwordhash';";
	$querylogin = mysql_query($login);
	$cek = mysql_num_rows($querylogin);
	if($cek) {
		$_SESSION['username'] = $username;
		mysql_query("INSERT INTO log_login VALUES(null,'$username','$passwordhash','$ip','$date');");
		echo "<script>location.replace('paneladmin.php');</script>";
	} else {
		//echo "Gagal login: " .mysql_error();
		echo "<script>alert('Kombinasi username dan password salah!');location.replace('adminlogin.html');</script>";
		//header('location:adminlogin.html');
		
	}
?>