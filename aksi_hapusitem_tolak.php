<?php
	session_start();
	include "koneksi.php";
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y-m-d H:i:s');

	// Mengambil Variabel Dari Form
	$id=$_POST['id'];
	$alasan=$_POST['alasan'];
	
	$sql1="update hapus set alasan_ditolak='$alasan',status ='Ditolak',update_terakhir='$now' where id_hapus=$id";
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

	$sql2="update hapus_detail set status='Ditolak' where id_hapus=$id";
	mysqli_query($koneksi,$sql2);

	//echo $now;echo "<br>";echo $sql1;;echo "<br>";echo $sql2;;echo "<br>";echo $sql3;;echo "<br>";
	

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=hapusitem");
?>