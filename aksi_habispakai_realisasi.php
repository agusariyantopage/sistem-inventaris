<?php
	session_start();
	include "koneksi.php";
	$id			=$_POST['idhabispakai'];
	$max		=$_POST['jdata']-1;
	$tgl		=$_POST['tgl_realisasi'];
	$supplier	=$_POST['supplier'];
	$sukses		=0;
	for ($x = 0; $x <= $max; $x++) {
		$x1			=$_POST['id_barang'][$x];
		$x2			=$_POST['harga'][$x];
		$x3			=$_POST['jumlah'][$x];
		

  		if($x3>0){
			$sql1="update habispakai_detail set jumlah_realisasi=jumlah_realisasi+$x3 where id_barang_habispakai=$x1 and id_habispakai=$id";
			mysqli_query($koneksi,$sql1);
			$aksi_sukses=mysqli_affected_rows($koneksi);
			$sukses=$sukses+$aksi_sukses;
			
			$sql2="insert into habispakai_realisasi (id_habispakai,id_barang_habispakai,harga,jumlah,tgl_realisasi,supplier) 
			values($id,$x1,$x2,$x3,'$tgl','$supplier')";
			mysqli_query($koneksi,$sql2);
			echo $sql2;
			echo "<br>";
			
		}	
		
  		
		
	}

	if($sukses>=1){
		$pesan='Sukses';
		$aksi='Menambahkan Data Pengajuan Penambahan Mekanisme Mandiri';
		$type='success';
	}
	else {
		$pesan='Gagal';
		$aksi='Menambahkan Data Pengajuan Penambahan Mekanisme Mandiri';
		$type='danger';
	}
	
	$_SESSION['msg'] = [
		'pesan' => $pesan,
		'aksi'  => $aksi,
		'type'  => $type
	]; 
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=habispakai-rinci&id=$id");
	
?>