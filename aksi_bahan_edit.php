<?php
	session_start();
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_POST['id'];
	$x1	=$_POST['deskripsi'];
	$x2	=$_POST['satuan'];
	$x3	=$_POST['spesifikasi'];
	
	// Perintah Insert Tabel
	$cek="select * from barang_habispakai where deskripsi='$x1'";
	$cek_exe=mysqli_query($koneksi,$cek);
	$ketemu=mysqli_num_rows($cek_exe);
	if ($ketemu<=0) {
		$sql="update barang_habispakai set deskripsi='$x1',satuan='$x2',spesifikasi='$x3',update_terakhir=DEFAULT where id_barang_habispakai=$x0";
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
	}	
	//echo $sql;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=bahan");
?>