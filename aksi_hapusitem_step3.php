<?php
	session_start();
	include "koneksi.php";

	// Ambil ID Hapus Terakhir
	$x1	=$_GET['id'];
	
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y-m-d H:i:s');
	
	$sql1="update hapus set update_terakhir='$now',final=1 where id_hapus=$x1";
	mysqli_query($koneksi,$sql1);
		
	
	//echo $sq;
	//echo $sql1;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=hapusitem");
?>