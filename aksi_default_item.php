<?php
	include "koneksi.php";

	// Perintah Update Tabel
	$sql="select * from subkategori where item=1";
	$perintah=mysqli_query($koneksi,$sql);
	while ($r=mysqli_fetch_array($perintah)) {
		$x1=$r['subkategori'];
		$x2=$r['kode'];
		$x3=$r['id_subkategori'];

		$sql1="select * from barang where id_subkategori=$x3";
		$perintah1=mysqli_query($koneksi,$sql1);
		$ketemu=mysqli_num_rows($perintah1);
		if($ketemu<=0){
			$sql2="insert into barang (deskripsi,id_subkategori,merk,spesifikasi,keterangan) values('$x1','$x3','-','-','Default Item')";
			mysqli_query($koneksi,$sql2);
		}
	}
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=barang");
?>