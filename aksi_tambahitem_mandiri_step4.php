<?php
session_start();
include "koneksi.php";

// Ambil ID 
$x1	=$_GET['id'];

$sql1="update tambah set update_terakhir=default,final=1 where id_tambah=$x1";
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

//echo $sql1;

// Mengarahkan Ke Halaman Daftar
header("location:index.php?p=tambahitem-mandiri");