<?php
	session_start();
	$_SESSION['MaTK']='';
	$_SESSION['TenKH']='';
	header("Location: /Default.php");
exit;
?>
