<?php
	session_start();
	include "koneksi.php";

	// Ambil ID Hapus Terakhir
	$x1	=$_POST['id'];
	
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y-m-d H:i:s');
	
	$sql1="update hapus set update_terakhir='$now',final=1 where id_hapus=$x1";
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
		
	
	//echo $sq;
	//echo $sql1;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=hapusitem");
?>