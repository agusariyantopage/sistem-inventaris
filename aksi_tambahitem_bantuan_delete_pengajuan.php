<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_GET['id'];
	
	// Perintah Update Tabel
	$sql="delete from tambah where id_tambah=$x0";
	mysqli_query($koneksi,$sql);
	$sql1="delete from tambah_detail where id_tambah=$x0";
	mysqli_query($koneksi,$sql1);

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=tambahitem-bantuan");
?>