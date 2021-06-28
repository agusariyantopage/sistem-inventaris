<?php
	session_start();
	$_SESSION['barcode_cart']=array();
	
	// Mengarahkan Ke Halaman Daftar
	$rd="location:index.php?p=barcode-by-lokasi&lok=".$_SESSION['lok'];	
	header($rd);
?>