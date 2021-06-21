<?php
	session_start();
	include "koneksi.php";

	$id=$_SESSION['idunit'];
	$sq="select * from habispakai where final=0 and id_unit=$id";
	$pr=mysqli_query($koneksi,$sq);
	$r=mysqli_fetch_array($pr); 
	if(mysqli_num_rows($pr)<=0){
	  $id_tambah=0;
	} else {
	  $id_tambah=$r['id_habispakai'];  
	}
	
	// Mengambil Variabel Dari Form
	$x1	=$id_tambah;
	$x2	=$_POST['idbhn'];
	$x3	=$_POST['harga'];
	$x4	=$_POST['qty'];
	
	if($id_tambah>=1){
		// Perintah Insert Tabel
		$sql1="insert into habispakai_detail (id_habispakai,id_barang_habispakai,harga,jumlah) 
			values($x1,$x2,$x3,$x4)";
			//echo $sql1;
		mysqli_query($koneksi,$sql1);
	}

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
	header("location:index.php?p=habispakai-step2");
?>