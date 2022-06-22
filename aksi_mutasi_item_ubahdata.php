<?php
    session_start();
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0	=$_POST['id'];
	$x1	=$_POST['catatan'];
	$x2	=$_POST['lokasi'];
	$x3=$_POST['nilai_perolehan'];
	$x4=$_POST['tanggal_perolehan'];
	

	// Perintah Insert Tabel
	$perintah="update barang_detail set catatan='$x1',lokasi='$x2',nilai_perolehan=$x3,tanggal_perolehan='$x4' where id_barang_detail=$x0";
	mysqli_query($koneksi,$perintah);
	$sukses=mysqli_affected_rows($koneksi);
	if($sukses>=1){
		$pesan='Sukses';
		$aksi='Menambahkan Data';
		$type='success';
	}
	else {
		$pesan='Gagal';
		$aksi='Menambahkan Data';
		$type='danger';
	}

	$_SESSION['msg'] = [
		'pesan' => $pesan,
		'aksi'  => $aksi,
		'type'  => $type
	];

	// Mengarahkan Ke Halaman Daftar	
	header("location:index.php?p=mutasiitem");
?>