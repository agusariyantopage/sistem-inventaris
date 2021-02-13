<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0	=$_POST['idunit'];
	$x1	=$_POST['kode'];
	$x2	=$_POST['namasingkat'];
	$x3	=$_POST['namapanjang'];
	$x4	=$_POST['namaketum'];
	$x5	=$_POST['namakasarpras'];
	

	// Perintah Insert Tabel
	$perintah="update unit_kerja set kode='$x1',nama_singkat='$x2',nama_panjang='$x3',nama_pimpinan='$x4',nama_kasarpras='$x5' where id_unit=$x0";
	mysqli_query($koneksi,$perintah);
	echo $perintah;
	// Mengarahkan Ke Halaman Daftar	
	header("location:index.php?p=unitkerja");
?>