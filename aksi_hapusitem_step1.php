<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x1	=$_POST['idunitkerja'];
	$x2	=$_POST['alasan'];
	$x3	=$_POST['pengaju'];
	$x4	=$_POST['penanggung'];
	$x5	=$_POST['tindaklanjut'];
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y-m-d H:i:s');
	

	
	$sql1="insert into hapus(id_unit,alasan,pengaju,penanggung,tgl_aju,update_terakhir,tindak_lanjut)
	 values($x1,'$x2','$x3','$x4','$tanggal','$now','$x5')";
	mysqli_query($koneksi,$sql1);
	

	//echo $sql1;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=hapusitem-step2");
?>