<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0	=$_POST['idunit'];
	$x1	=$_POST['username'];
	$x2	=$_POST['password'];
	
	

	// Perintah Insert Tabel
	$perintah="update unit_kerja set username='$x1',password='$x2' where id_unit=$x0";
	mysqli_query($koneksi,$perintah);
	//echo $perintah;
	// Mengarahkan Ke Halaman Daftar	
	header("location:index.php?p=unitkerja");
?>