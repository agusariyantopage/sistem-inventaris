<?php
	include "koneksi.php";

	// Mengambil Variabel Dari Form
	$x0	=$_POST['idunit'];
	$x1	=$_POST['finalda'];
	$x2	=$_POST['uploadda'];
	
	if($x1==0||$x2==0){ // Menghapus File Yang Diupload
		$sql1="select * from unit_kerja where id_unit=$x0";
		$pr1=mysqli_query($koneksi,$sql1);
		$r1=mysqli_fetch_array($pr1);
		if($r1['file_sk_data_awal']!=''){
			$sk="sptjm/".$r1['file_sk_data_awal'];
			unlink($sk);
		}
		$sql2="update unit_kerja set final_data_awal=$x1,file_sk_data_awal='',waktu_upload_sk_data_awal=null where id_unit=$x0 and akses_pengajuan=0";
		mysqli_query($koneksi,$sql2);	
		//echo "Hapus";
	} else {
		//echo "Tidak Hapus";
	}

	// Perintah Insert Tabel
	//$perintah="update unit_kerja set username='$x1',password='$x2' where id_unit=$x0";
	//mysqli_query($koneksi,$perintah);
	//echo $perintah;
	// Mengarahkan Ke Halaman Daftar	
	header("location:index.php?p=unitkerja");
?>