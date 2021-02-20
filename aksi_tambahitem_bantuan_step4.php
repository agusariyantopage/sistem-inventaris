<?php
session_start();
include "koneksi.php";

// Ambil ID 
$x1	=$_GET['id'];

$sql1="update tambah set update_terakhir=default,final=1 where id_tambah=$x1";
mysqli_query($koneksi,$sql1);
    

//echo $sql1;

// Mengarahkan Ke Halaman Daftar
header("location:index.php?p=tambahitem-bantuan");