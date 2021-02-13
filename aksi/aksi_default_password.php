<?php
	include "koneksi.php";

	// Perintah Update Tabel
	$sql="select * from unit_kerja";
	$perintah=mysqli_query($koneksi,$sql);
	while ($r=mysqli_fetch_array($perintah)) {
		$x1=$r['id_unit'];
		$x2=$r['nama_singkat'];
		$x3=substr(md5($r['nama_singkat']),0,10);

		$sql1="update unit_kerja set username='$x2',password='$x3' where id_unit=$x1";
		$perintah1=mysqli_query($koneksi,$sql1);
		
		
	}
	// Mengarahkan Ke Halaman Daftar
	//header("location:index.php?p=barang");
?>