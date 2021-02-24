<?php
	require "config/config.php";

	$server	= DB_HOST;
	$user	= DB_USER;
	$passw	= DB_PASS;
	$db		= DB_NAME;

	$koneksi=mysqli_connect($server,$user,$passw,$db);

	if(!$koneksi){
		die("Koneksi Ke Database Gagal");
	} else {
		//echo "Koneksi Ke Database Sukses";
	}
?>