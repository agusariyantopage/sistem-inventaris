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
	$x2	='BANTUAN';
	$x3	=$_POST['sumber'];
	$x4	=$_POST['ketsumber'];
	$x5	='';
	$x6	=$_POST['pengaju'];
	$x7	=$_POST['penanggung'];
	$x8	='';  // Status
	$x9	=$tanggal;
	$x10	='';
	$x11	=$_POST['tglterima'];
	$x12	='';
	$x13	='';
	$x14	=0;
	
	

	
	$sql1="insert into tambah(id_unit, tipe_sumber, jenis_tipe_sumber, keterangan_tipe_sumber, alasan,
	 pengaju, penanggung, status, tgl_aju, tgl_setuju,
	  tgl_terima_barang, dibuat_pada, update_terakhir, final) values($x1,'$x2','$x3','$x4','$x5','$x6','$x7',DEFAULT,'$x9','$x10','$x11',DEFAULT,DEFAULT,'$x14')";
	//echo $sql1;  
	$perintah1=mysqli_query($koneksi,$sql1);
	$sukses=mysqli_affected_rows($koneksi);

	if($sukses>=1){
		$pesan='Sukses';
		$aksi='Menambahkan Data Pengajuan Penambahan Mekanisme Bantuan';
		$type='success';
	}
	else {
		$pesan='Gagal';
		$aksi='Menambahkan Data Pengajuan Penambahan Mekanisme Bantuan';
		$type='danger';
	}
	
	$_SESSION['msg'] = [
		'pesan' => $pesan,
		'aksi'  => $aksi,
		'type'  => $type
	]; 

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=tambahitem-bantuan-step2");
?>