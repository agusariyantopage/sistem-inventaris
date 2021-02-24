<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_GET['id'];
	
	// Perintah Update Tabel
	$sql="delete from tambah_detail where id_tambah_detail=$x0";
	mysqli_query($koneksi,$sql);

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=tambahitem-mandiri-step4");
?>