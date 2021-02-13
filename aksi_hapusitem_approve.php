<?php
	session_start();
	include "koneksi.php";
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y-m-d H:i:s');

	// Mengambil Variabel Dari Form
	$id=$_GET['id'];
	
	$sql1="update hapus set status ='Disetujui',tgl_setuju='$tanggal',update_terakhir='$now' where id_hapus=$id";
	mysqli_query($koneksi,$sql1);

	$sql2="update hapus_detail set status ='Disetujui' where id_hapus=$id";
	mysqli_query($koneksi,$sql2);

	// Hapus Data Barang
	$sql3="select * from hapus_detail where id_hapus=$id";
	$perintah=mysqli_query($koneksi,$sql3);
	while ($r=mysqli_fetch_array($perintah)){
		$id_item=$r['id_barang_detail'];

		$sql4="delete from barang_detail where id_barang_detail=$id_item";
		mysqli_query($koneksi,$sql4);
		//echo $sql4;;echo "<br>";
	}
	

	//echo $now;echo "<br>";echo $sql1;;echo "<br>";echo $sql2;;echo "<br>";echo $sql3;;echo "<br>";
	

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=hapusitem");
?>