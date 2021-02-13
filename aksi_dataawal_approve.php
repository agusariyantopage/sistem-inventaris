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
	$id=$_GET['token'];
	
	// Perintah Insert Tabel
	$perintah="update unit_kerja set akses_pengajuan=1,waktu_approval_data_awal='$now' where md5(id_unit)='$id'";
	mysqli_query($koneksi,$perintah);
	echo $perintah;
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=dataawal-app");
?>