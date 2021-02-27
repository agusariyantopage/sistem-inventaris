<?php
	session_start();
	include "koneksi.php";
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');

	// Mengambil Variabel Dari Form
	$id=$_POST['id'];
	
	$sql1="update tambah set status ='Disetujui',tgl_setuju='$tanggal',update_terakhir=Default where id_tambah=$id";
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
	
	$sql2="update tambah_detail set status ='Disetujui' where id_tambah=$id";
	mysqli_query($koneksi,$sql2);

	// Hapus Data Barang
	$sql3="select tambah_detail.*,id_unit,tgl_terima_barang,tipe_sumber from tambah_detail,tambah where tambah.id_tambah=tambah_detail.id_tambah and tambah_detail.id_tambah=$id";
	$perintah=mysqli_query($koneksi,$sql3);
	while ($r=mysqli_fetch_array($perintah)){
		$j=$r['qty'];
		for ($i = 1; $i <= $j; $i++) {
			$x1=$r['id_barang'];
			$x2='Baik';
			$x3=$r['lokasi'];
			$x4=$r['tipe_sumber'];
			$x5='';
			$x6=$r['id_unit'];
			$x7=$r['tgl_terima_barang'];
			$x8='12:00:00';
			$x9=$r['id_tambah'];
			$x10=$r['nilai_perolehan'];
			

			$sql4="INSERT INTO barang_detail(id_input, id_barang, kondisi, lokasi,
			catatan, gambar, id_unitkerja, tanggal_input, jam_input,
			id_tambah, nilai_perolehan, perubahan_terakhir) VALUES ('',$x1,'$x2','$x3',
			'$x4','$x5',$x6,'$x7','$x8',
			$x9,$x10,Default)";
			mysqli_query($koneksi,$sql4);
			//echo $sql4;;echo "<br>";
		}	
	}
	

	//echo $now;echo "<br>";echo $sql1;;echo "<br>";echo $sql2;;echo "<br>";echo $sql3;;echo "<br>";
	

	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=tambahitem");
?>