<?php
	session_start();
	include "koneksi.php";
	

	// Mengambil Variabel Dari Form
	$id=$_POST['id'];
	$alasan=$_POST['alasan'];
	
	$sql1="update tambah set status ='Ditolak',update_terakhir=default,alasan_ditolak='$alasan' where id_tambah=$id";
	mysqli_query($koneksi,$sql1);
	$sukses=mysqli_affected_rows($koneksi);
	//echo $sql1;
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
	$sql2="update tambah_detail set status='Ditolak' where id_tambah=$id";
	mysqli_query($koneksi,$sql2);

	//echo $now;echo "<br>";echo $sql1;;echo "<br>";echo $sql2;;echo "<br>";echo $sql3;;echo "<br>";
	

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=tambahitem");
?>