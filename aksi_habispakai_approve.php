<?php
	session_start();
	include "koneksi.php";
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');

	// Mengambil Variabel Dari Form
	$id=$_POST['id'];

	
	
	$sql1="update habispakai set status ='Disetujui',tgl_setuju='$tanggal',update_terakhir=Default where id_habispakai=$id";
	mysqli_query($koneksi,$sql1);
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
	header("location:index.php?p=habispakai");
?>