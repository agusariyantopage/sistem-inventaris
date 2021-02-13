<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_GET['id'];
	
	// Cek Apakah Ada Item Dengan Turunan Katalog Ini
	$sql1="select * from barang_detail where id_barang=$x0";
	$pr1=mysqli_query($koneksi,$sql1);
	$ketemu=mysqli_num_rows($pr1);
	if($ketemu<=0){	
		// Data Hanya Akan Dihapus Bila Tidak Ditemukan Item Dengan Katalog Yang Sama
		$sql="delete from barang where id_barang=$x0";
		mysqli_query($koneksi,$sql);
	}

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=barang");
?>