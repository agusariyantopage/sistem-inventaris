<?php
	session_start();
	include "koneksi.php";
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');

	// Mengambil Variabel Dari Form
	$id=$_GET['id'];

	// Cek Status Pengajuan Apakah Barang Sudah Diterima Sebelumnya
	$sql1="select * from habispakai where status='Disetujui' and diterima=0";
	$perintah1=mysqli_query($koneksi,$sql1);
	$trm=mysqli_num_rows($perintah1);
	
	//echo $trm;
	// Tambah Data Barang Ke Inventaris Jika Barang Belum Pernah Diterima
	if($trm==1){
		$sql2="update habispakai set update_terakhir=Default,diterima=1 where id_habispakai=$id";
		mysqli_query($koneksi,$sql2);
		
	}

	//echo $now;echo "<br>";echo $sql1;;echo "<br>";echo $sql2;;echo "<br>";echo $sql3;;echo "<br>";
	

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=habispakai");
?>