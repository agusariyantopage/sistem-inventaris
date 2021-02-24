<?php
	session_start();
	include "koneksi.php";

	$id=$_SESSION['idunit'];
	$sq="select * from tambah where tipe_sumber='Mandiri' and id_unit=$id and status='Sedang Diverifikasi' and final=0";
	$pr=mysqli_query($koneksi,$sq);
	$r=mysqli_fetch_array($pr); 
	if(mysqli_num_rows($pr)<=0){
	  $id_tambah=0;
	} else {
	  $id_tambah=$r['id_tambah'];  
	}
	
	// Mengambil Variabel Dari Form
	$x1	=$id_tambah;
	$x2	=$_POST['id'];
	$x3	='Baik';
	$x4	=$_POST['lokasi'];
	$x5	=$_POST['nilai'];
	$x6 =$_POST['qtybaik'];
	

	// Perintah Insert Tabel
	$sql1="insert into tambah_detail (id_tambah, id_barang, status, qty, lokasi, 
		nilai_perolehan, dibuat_pada) 
		values($x1,$x2,Default,$x6,'$x4',$x5,Default)";
		//echo $sql1;
	mysqli_query($koneksi,$sql1);
	

	$sukses=mysqli_affected_rows($koneksi);

	if($sukses>=1){
		$pesan='Sukses';
		$aksi='Menambahkan Data';
		$type='success';
	}
	else {
		$pesan='Gagal';
		$aksi='Menambahkan Data';
		$type='danger';
	}
	
	$_SESSION['msg'] = [
		'pesan' => $pesan,
		'aksi'  => $aksi,
		'type'  => $type
	];


	
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=tambahitem-mandiri-step4");
?>