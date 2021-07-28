<?php
	session_start();
	include "koneksi.php";
	

	// Mengambil Variabel Dari Form
	$id=$_POST['id'];
	$alasan=$_POST['alasan'];
	
	$sql1="update habispakai set status ='Ditolak',update_terakhir=default,alasan_dihapus='$alasan' where id_habispakai=$id";
	//echo $sql1;
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
	//$sql2="update habispakai_detail set status='Ditolak' where id_habispakai=$id";
	//mysqli_query($koneksi,$sql2);

	//echo $now;echo "<br>";echo $sql1;;echo "<br>";echo $sql2;;echo "<br>";echo $sql3;;echo "<br>";
	

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=habispakai");
?>