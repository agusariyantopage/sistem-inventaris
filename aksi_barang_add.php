<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x1	=$_POST['deskripsi'];
	$x2	=$_POST['idsubkategori'];
	$x3	=$_POST['merk'];
	$x4	=$_POST['spesifikasi'];
	$x5	=$_POST['keterangan'];
	$rd=$_POST['rd'];
	

	// Perintah Insert Tabel
	$sql="insert into barang (deskripsi,id_subkategori,merk,spesifikasi,keterangan) values('$x1','$x2','$x3','$x4','$x5')";
	mysqli_query($koneksi,$sql);
	//echo $sql;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=$rd");
?>