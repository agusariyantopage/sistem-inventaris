<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x1	=$_POST['kode'];
	$x2	=$_POST['namasingkat'];
	$x3	=$_POST['namapanjang'];
	$x4	=$_POST['namaketum'];
	$x5	=$_POST['namakasarpras'];
	

	// Perintah Insert Tabel
	mysqli_query($koneksi,"insert into unit_kerja (kode,nama_singkat,nama_panjang,nama_pimpinan,nama_kasarpras) values('$x1','$x2','$x3','$x4','$x5')");

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=unitkerja");
?>