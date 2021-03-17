<?php
    session_start();
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0	=$_POST['id'];
	$x1	=$_POST['id_barang'];
    $x2	='[Kondisi : Baik > Rusak]';
    $x3	=$_POST['catatan'];
    $x4	=$_POST['tglrusak'];
    $x5	=$_POST['idunitkerja'];
    $x6	=$_POST['status'];
	
	

	// Perintah Insert Tabel
	$perintah="update barang_detail set kondisi='$x6' where id_barang_detail=$x0";
    //echo $perintah;
	mysqli_query($koneksi,$perintah);
    $perintah1="insert into barang_detail_log (id_barang_detail,id_barang,perubahan,catatan,tanggal,waktu_input,id_unit) values($x0,$x1,'$x2','$x3','$x4',Default,$x5)";
    mysqli_query($koneksi,$perintah1);
    echo $perintah1;
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
	header("location:index.php?p=mutasiitem");
?>