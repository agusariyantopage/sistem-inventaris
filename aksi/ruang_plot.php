<?php
session_start();
include "../koneksi.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $id_ruang=$_POST['id_ruang'];
        $tanggal=$_POST['tanggal'];
        $jam_mulai=$_POST['jam_mulai'];
        $jam_selesai=$_POST['jam_selesai'];
        $pengguna=$_POST['pengguna'];

        $sql="INSERT INTO ruang_plot(id_ruang_plot, id_ruang, tanggal, jam_mulai, jam_selesai, pengguna, dibuat_pada, diubah_pada, dihapus_pada) VALUES (DEFAULT, $id_ruang, '$tanggal', '$jam_mulai', '$jam_selesai', '$pengguna', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi,$sql);
        header("location:../index.php?p=ruang-jadwal");
        //echo $sql;
    }

    if($_POST['aksi']=='ubah'){
        

        header("location:../index.php?p=ruang");
          
    }
}