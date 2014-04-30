<?php
	session_start();
	session_destroy();
	echo "<script>location.replace('dosenlogin.html');</script>";
?>