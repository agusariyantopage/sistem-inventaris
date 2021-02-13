<?php
	session_start();
	include "koneksi.php";
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y-m-d H:i:s');

	// Mengambil Variabel Dari Form
	$id=$_GET['id'];
	
	$sql1="update hapus set status ='Ditolak',update_terakhir='$now' where id_hapus=$id";
	mysqli_query($koneksi,$sql1);

	$sql2="delete from hapus_detail where id_hapus=$id";
	mysqli_query($koneksi,$sql2);

	//echo $now;echo "<br>";echo $sql1;;echo "<br>";echo $sql2;;echo "<br>";echo $sql3;;echo "<br>";
	

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=hapusitem");
?>