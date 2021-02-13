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
	$lokasiasli=$_POST['lokasi_asli'];
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	
	// Hapus Data Lama
	$sql="delete from barang_detail where lokasi='$lokasiasli'and id_unitkerja='$x1a' and id_barang='$x0'";
	mysqli_query($koneksi,$sql);
	
	// Perintah Insert Tabel
	for ($x = 1; $x <= $x6; $x++) {
  		$sql1="insert into barang_detail (id_barang,id_unitkerja,kondisi,tanggal_input,jam_input,id_input,lokasi,catatan) values('$x0',$x1a,'Baik','$tanggal','$jam','$input_id','$x8','$x9')";
		mysqli_query($koneksi,$sql1);
		$jumlah1=mysqli_affected_rows($koneksi);
	}

	for ($x = 1; $x <= $x7; $x++) {
		$sql2="insert into barang_detail (id_barang,id_unitkerja,kondisi,tanggal_input,jam_input,id_input,lokasi,catatan) values('$x0',$x1a,'Rusak','$tanggal','$jam','$input_id','$x8','$x9')";
		mysqli_query($koneksi,$sql2);
		$jumlah2=mysqli_affected_rows($koneksi);
	}
	$jumlah=$x6+$x7;
	//echo $sql1;
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=inventarisperbaikan&msg=update-success&qty=$jumlah");
?>