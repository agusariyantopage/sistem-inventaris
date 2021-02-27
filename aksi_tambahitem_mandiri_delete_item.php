<?php
	session_start();
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_GET['id'];
	
	// Perintah Update Tabel
	$sql="delete from tambah_detail where id_tambah_detail=$x0";
	mysqli_query($koneksi,$sql);
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
	
	header("location:index.php?p=tambahitem-mandiri-step4");
?>