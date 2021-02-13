<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0	=$_POST['id'];
	$x1	=$_POST['deskripsi'];
	$x2	=$_POST['idsubkategori'];
	$x3	=$_POST['merk'];
	$x4	=$_POST['spesifikasi'];
	$x5	=$_POST['keterangan'];
	

	// Perintah Insert Tabel
	$sql="update barang set deskripsi='$x1',id_subkategori='$x2',merk='$x3',spesifikasi='$x4',keterangan='$x5' where id_barang='$x0'";
	mysqli_query($koneksi,$sql);
	//echo $sql;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=barang");
?>