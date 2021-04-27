<?php
	session_start();
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x1	=$_POST['deskripsi'];
	$x2	=$_POST['satuan'];
	$x3	=$_POST['spesifikasi'];
	
	// Perintah Insert Tabel
	$cek="select * from barang_habispakai where deskripsi='$x1'";
	$cek_exe=mysqli_query($koneksi,$cek);
	$ketemu=mysqli_num_rows($cek_exe);
	if ($ketemu<=0) {
		$sql="insert into barang_habispakai (deskripsi,satuan,spesifikasi,harga,update_terakhir) values('$x1','$x2','$x3',0,DEFAULT)";
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