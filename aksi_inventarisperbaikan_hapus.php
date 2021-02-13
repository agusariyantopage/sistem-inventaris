<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x1 =$_GET['lokasi'];
	$x2 =$_GET['id_unitkerja'];
	$x3 =$_GET['id_barang'];
	
	// Perintah Update Tabel
	$sql="delete from barang_detail where lokasi='$x1'and id_unitkerja='$x2' and id_barang='$x3'";
	mysqli_query($koneksi,$sql);
	$jumlah_delete=mysqli_affected_rows($koneksi);
	//echo $sql;
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=inventarisperbaikan&msg=delete-success&qty=$jumlah_delete");
?>