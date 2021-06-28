<?php
	session_start();
	include "koneksi.php";
	date_default_timezone_set('Asia/Singapore');
	$id=$_GET['id'];
	if(empty($_SESSION['barcode_cart'])){
		$_SESSION['barcode_cart']=array();
	}	
	//$_SESSION['barcode_cart']=array();
	$sql1="select barang_detail.*,deskripsi from barang_detail,barang where barang.id_barang=barang_detail.id_barang and id_barang_detail=$id";
	$q1=mysqli_query($koneksi,$sql1);
	$r1=mysqli_fetch_array($q1);
	$deskripsi=$r1['deskripsi'];
	$lokasi=$r1['lokasi'];
	$newelement=array($id,$deskripsi,$lokasi);
	$jumlah=count($_SESSION['barcode_cart']);
	if($jumlah<16){
		array_push($_SESSION['barcode_cart'],$newelement);	
	}	
	
	for ($row = 0; $row < $jumlah; $row++) {			  
		  echo $_SESSION['barcode_cart'][$row][0]."-".$_SESSION['barcode_cart'][$row][1]."-".$_SESSION['barcode_cart'][$row][2]."<br>";
		
	  }
	// Mengarahkan Ke Halaman Daftar
	$rd="location:index.php?p=barcode-by-lokasi&lok=".$_SESSION['lok'];	
	header($rd);
?>