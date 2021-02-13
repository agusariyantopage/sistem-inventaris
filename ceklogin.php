<?php
	session_start();
	include "koneksi.php";
	$x0		= $_POST['akses'];
	$x1		= $_POST['username'];
	$x2		= $_POST['password'];

	// Cek Username Dan Password Di Database
	if($x0==1){
		$sql="select * from user where username='$x1' and password='$x2'";
		$_SESSION['jenisakses']='Yayasan';
	} else {
		$sql="select * from unit_kerja where username='$x1' and password='$x2'";
		$_SESSION['jenisakses']='Unit';
	}
	

	$perintah=mysqli_query($koneksi,$sql);
	$ketemu=mysqli_num_rows($perintah);
	//echo $sql;
	if($ketemu>=1){
		// echo "Login Sukses";
		$r=mysqli_fetch_array($perintah);
		$_SESSION['namapengguna'] 	= $r['username'];
		$_SESSION['namalengkap']	= $r['nama_panjang'];
		$_SESSION['level']			= $x0;
		$_SESSION['idunit']			= $r['id_unit'];
		
		header('location:index.php');
		//echo "Login Sukses | Jenis Akses:".$_SESSION['jenisakses']." | ".$_SESSION['namalengkap'];
	} else {
		session_destroy();
		header('location:login.php?status=gagallogin');
	}

?>