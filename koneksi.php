<?php
	require "config/config.php";

	$server	= DB_HOST;
	$user	= DB_USER;
	$passw	= DB_PASS;
	$db		= DB_NAME;

	$koneksi=mysqli_connect($server,$user,$passw,$db);
	$mysqli = new mysqli($server,$user,$passw,$db); // OOP Style
    $mysqli->select_db($db); 
    $mysqli->query("SET NAMES 'utf8'");

	if(!$koneksi){
		die("Koneksi Ke Database Gagal");
	} else {
		//echo "Koneksi Ke Database Sukses";
	}
?>