<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_GET['id'];
	
	$sql="select * from hapus where id_hapus=$x0 and status='Sedang Diverifikasi'";
	$p=mysqli_query($koneksi,$sql);
	$ketemu=mysqli_num_rows($p); // Data Hanya Akan Dihapus Jika Status Sedang Diverifikasi
	if($ketemu>=1){
		// Perintah Hapus
		$sql1="delete from hapus where id_hapus=$x0";
		mysqli_query($koneksi,$sql1);

		// Perintah Hapus
		$sql2="delete from hapus_detail where id_hapus=$x0";
		mysqli_query($koneksi,$sql2);
	}

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=hapusitem");
?>