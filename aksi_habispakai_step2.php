<?php
	session_start();
	include "koneksi.php";

	// Ambil ID HabisPakai Terakhir
	$id=$_SESSION['idunit'];
	$sq="select * from habispakai where id_unit=$id and final=0";
	$pr=mysqli_query($koneksi,$sq);
	$r=mysqli_fetch_array($pr);

	$x1=$r['id_habispakai'];
		
	$sql1="update habispakai set final=1,update_terakhir=DEFAULT where id_habispakai=$x1";
	//echo $sql1;
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