<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0 =$_GET['id'];
	
	// Cek Apakah Ada Item Dengan Turunan Katalog Ini
	$sql1="select * from habispakai_detail where id_barang_habispakai=$x0";
	$pr1=mysqli_query($koneksi,$sql1);
	$ketemu=mysqli_num_rows($pr1);
	if($ketemu<=0){	
		// Data Hanya Akan Dihapus Bila Tidak Ditemukan Item Dengan Katalog Yang Sama
        $sql2="select * from habispakai_realisasi where id_barang_habispakai=$x0";
        $pr2=mysqli_query($koneksi,$sql2);
        $ketemu2=mysqli_num_rows($pr2);
        if($ketemu2<=0){	
            $sql="delete from barang_habispakai where id_barang_habispakai=$x0";
            mysqli_query($koneksi,$sql);
        }    
	}

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=bahan");
?>