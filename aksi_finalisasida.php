<?php
	session_start();
	include "koneksi.php";
	
	// Ambil ID Hapus Terakhir
	$token=$_GET['token'];
	$id=$_SESSION['idunit'];
	
	if($token==md5($id)){
		$sql1="update unit_kerja set final_data_awal=1 where id_unit=$id";
		mysqli_query($koneksi,$sql1);
		// Mengarahkan Ke Halaman Daftar
		header("location:index.php?p=finalisasi-dataawal");
	} else {	
		echo "Invalid Token";
	}
?>