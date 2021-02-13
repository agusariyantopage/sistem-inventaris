<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0	=$_POST['id'];
	$x1	=$_POST['deskripsi'];
	$x1a=$_POST['idunitkerja'];
	$x2	=$_POST['idsubkategori'];
	$x3	=$_POST['merk'];
	$x4	=$_POST['spesifikasi'];
	$x5	=$_POST['keterangan'];
	$x6	=$_POST['qtybaik'];
	$x7	=$_POST['qtyrusak'];
	$x8	=$_POST['lokasi'];
	$x9	=$_POST['catatan'];
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	

	// Perintah Insert Tabel
	for ($x = 1; $x <= $x6; $x++) {
  		$sql1="insert into barang_detail (id_barang,id_unitkerja,kondisi,tanggal_input,jam_input,id_input,lokasi,catatan) values('$x0',$x1a,'Baik','$tanggal','$jam','$input_id','$x8','$x9')";
		mysqli_query($koneksi,$sql1);
	}

	for ($x = 1; $x <= $x7; $x++) {
		$sql2="insert into barang_detail (id_barang,id_unitkerja,kondisi,tanggal_input,jam_input,id_input,lokasi,catatan) values('$x0',$x1a,'Rusak','$tanggal','$jam','$input_id','$x8','$x9')";
		mysqli_query($koneksi,$sql2);
	}

	//echo $sql1;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=selesaiaddinventaris&id=$input_id");
?>