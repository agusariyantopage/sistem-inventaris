<?php
	session_start();
	include "koneksi.php";

	// Ambil ID Hapus Terakhir
	$id=$_SESSION['idunit'];
	$sq="select * from hapus where id_unit=$id and status='Sedang Diverifikasi' and final=0";
	$pr=mysqli_query($koneksi,$sq);
	$r=mysqli_fetch_array($pr);

	// Mengambil Variabel Dari Form
	$x1 =$r['id_hapus'];
	$x2	=$_GET['id'];
	
	// Ambil Nilai Barang,Lokasi dan Catatan
	$sq2="select * from barang_detail where id_barang_detail=$x2";
	$pr2=mysqli_query($koneksi,$sq2);
	$r2=mysqli_fetch_array($pr2);
	$x3=$r2['id_barang'];
	$x4=$r2['kondisi'];
	$x5=$r2['lokasi'];

	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y-m-d H:i:s');
	

	$sq1="select * from hapus_detail where id_barang_detail=$x2";
	$pr1=mysqli_query($koneksi,$sq1);
	$ketemu=mysqli_num_rows($pr1);
	if($ketemu<=0){
		$sql1="insert into hapus_detail(id_hapus,id_barang_detail,id_barang,kondisi,lokasi) values($x1,$x2,$x3,'$x4','$x5')";
		mysqli_query($koneksi,$sql1);
		$msg="success";
	} else {
		$msg="failed";
	}	
	
	//echo $sq;
	//echo $sql1;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=hapusitem-step3&msg=$msg");
?>