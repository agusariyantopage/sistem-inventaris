<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0	=$_POST['idunit'];
	$x1	=$_POST['kode'];
	$x2	=$_POST['namasingkat'];
	$x3	=$_POST['namapanjang'];
	$x4	=$_POST['namaketum'];
	$x5	=$_POST['namakasarpras'];
	$x6	=$_POST['password'];
	$x7	=$_POST['newpassword'];
	$x8	=$_POST['renewpassword'];
	

	// Perintah Insert Tabel
	$perintah="update unit_kerja set kode='$x1',nama_singkat='$x2',nama_panjang='$x3',nama_pimpinan='$x4',nama_kasarpras='$x5' where id_unit=$x0";
	mysqli_query($koneksi,$perintah);
	echo $perintah;

	// Ubah Password
	$sts2='none';
	$sql1="select * from unit_kerja where id_unit=$x0 and password='$x6'";
	$perintah1=mysqli_query($koneksi,$sql1);
	$ketemu=mysqli_num_rows($perintah1);
	if ($ketemu>=1){
		if($x7!=''&&$x7==$x8){
			$perintah2="update unit_kerja set password='$x7' where id_unit=$x0";
			mysqli_query($koneksi,$perintah2);
			$sts2='ok';
		} else {
			$sts2='failed';
		}
	} else {
		if($x6!=''){
			$sts2='failed';
		}
	}

	// Mengarahkan Ke Halaman Daftar	
	header("location:index.php?p=changeprofil&sts1=ok&sts2=$sts2");
?>