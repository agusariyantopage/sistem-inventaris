<?php
	session_start();
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_GET['id'];
	
	$sql="select * from habispakai where id_habispakai=$x0 and status='Sedang Diverifikasi'";
	$p=mysqli_query($koneksi,$sql);
	$ketemu=mysqli_num_rows($p); // Data Hanya Akan Dihapus Jika Status Sedang Diverifikasi
	if($ketemu>=1){
		// Perintah Hapus
		$sql1="delete from habispakai where id_habispakai=$x0";
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
		// Perintah Hapus
		$sql2="delete from habispakai_detail where id_habispakai=$x0";
		mysqli_query($koneksi,$sql2);
	}

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=habispakai");
?>