<?php
	session_start();
	include "koneksi.php";

	// Ambil ID HabisPakai Terakhir
	$id=$_SESSION['idunit'];
	$sq="select * from habispakai where id_unit=$id and final=0";
	$pr=mysqli_query($koneksi,$sq);
	$r=mysqli_fetch_array($pr);

	// Mengambil Variabel Dari Form
	$max=$_POST['max'][0];
	
	
	for ($x = 0; $x <= $max-1; $x++) {
		$x1=$r['id_habispakai'];
		$x2=$_POST['deskripsi'][$x];
		$x3=$_POST['satuan'][$x];
		$x4=$_POST['harga'][$x];
		$x5=$_POST['jumlah'][$x];
		$sql="insert into habispakai_detail (id_habispakai, deskripsi, satuan, harga, jumlah) values($x1,'$x2','$x3',$x4,$x5)";

		//echo $sql."<br>";  
		$perintah=mysqli_query($koneksi,$sql);
		
	}
	
	$sql1="update habispakai set final=1,update_terakhir=DEFAULT where id_habispakai=$x1";
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
	header("location:index.php?p=habispakai");
?>