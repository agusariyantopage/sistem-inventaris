<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_GET['id'];
	
	// Perintah Update Tabel
	$sql1="delete from habispakai where id_habispakai=$x0";
	$sql2="delete from habispakai_detail where id_habispakai=$x0";
	$sql3="delete from habispakai_realisasi where id_habispakai=$x0";
	mysqli_query($koneksi,$sql1);
	mysqli_query($koneksi,$sql2);
	mysqli_query($koneksi,$sql3);

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=habispakai");
?>