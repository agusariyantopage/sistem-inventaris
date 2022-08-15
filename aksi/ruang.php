<?php
session_start();
include "../koneksi.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $id_unit_kerja=$_POST['id_unit_kerja'];
        $kode_ruang=$_POST['kode_ruang'];
        $nama_ruang=$_POST['nama_ruang'];
        $deskripsi=$_POST['deskripsi'];
        $lokasi_lantai=$_POST['lokasi_lantai'];

        $sql="INSERT INTO ruang(id_ruang, id_unit_kerja, kode_ruang, nama_ruang, deskripsi, lokasi_lantai, dibuat_pada, diubah_pada, dihapus_pada) VALUES (DEFAULT, $id_unit_kerja, '$kode_ruang', '$nama_ruang', '$deskripsi', '$lokasi_lantai', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi,$sql);
        header("location:../index.php?p=ruang");
        //echo $sql;
    }

    if($_POST['aksi']=='ubah'){
        $id_ruang=$_POST['id_ruang'];
        $id_unit_kerja=$_POST['id_unit_kerja'];
        $kode_ruang=$_POST['kode_ruang'];
        $nama_ruang=$_POST['nama_ruang'];
        $deskripsi=$_POST['deskripsi'];
        $lokasi_lantai=$_POST['lokasi_lantai'];

        $sql="UPDATE ruang SET id_unit_kerja=$id_unit_kerja, kode_ruang='$kode_ruang', nama_ruang='$nama_ruang', deskripsi='$deskripsi', lokasi_lantai='$lokasi_lantai', diubah_pada=DEFAULT WHERE id_ruang=$id_ruang";
        mysqli_query($koneksi,$sql);

        header("location:../index.php?p=ruang");
          
    }
}