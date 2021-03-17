<?php
	session_start();
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y-m-d H:i:s');

	$x1	=$_POST['idunitkerja'];
	$x2	=$_POST['sumber'];
	$x3	=$_POST['ketsumber'];
	$x4	=$_POST['pengaju'];
	$x5	=$_POST['penanggung'];
	$x6	=false;  // Status
	$x7	='0000-00-00';
	$x8	=$_POST['tglterima'];
	$x9	=false; // Dibuat Pada
	$x10	=''; // Alasan Dihapus
	$x11	=false; // Update Terakhir
	$x12	=0;
	
	

	
	$sql1="insert into habispakai(id_unit, tipe_sumber, keterangan_tipe_sumber, pengaju, penanggung,
	 status, tgl_setuju_hapus, tgl_terima_barang, dibuat_pada, alasan_dihapus,
	  update_terakhir, final) values($x1,'$x2','$x3','$x4','$x5',DEFAULT,'$x7','$x8',DEFAULT,'$x10',DEFAULT,$x12)";
	//echo $sql1;  
	$perintah1=mysqli_query($koneksi,$sql1);
	$sukses=mysqli_affected_rows($koneksi);

	if($sukses>=1){
		$pesan='Sukses';
		$aksi='Menambahkan Data Pengajuan Penambahan Mekanisme Mandiri';
		$type='success';
	}
	else {
		$pesan='Gagal';
		$aksi='Menambahkan Data Pengajuan Penambahan Mekanisme Mandiri';
		$type='danger';
	}
	
	$_SESSION['msg'] = [
		'pesan' => $pesan,
		'aksi'  => $aksi,
		'type'  => $type
	]; 

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=habispakai-step2");
?>