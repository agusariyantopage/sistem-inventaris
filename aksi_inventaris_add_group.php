<?php
	session_start();
	include "koneksi.php";
	$max=$_POST['max']-1;
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);	
	//echo $max."<br>";
	for ($x = 0; $x <= $max; $x++) {
		$x1			=$_POST['id'][$x];
		$x2			=$_POST['idunitkerja'];
		$qty_baik	=$_POST['qty_baik'][$x];
		$qty_rusak	=$_POST['qty_rusak'][$x];
		$x3			=$_POST['lokasi'];
		$x4			=$_POST['catatan'];

  		//echo "Data Baris[".$x."]=".$_POST['qty_baik'][$x];
		//echo "<br>";
		//echo "Data Baris[".$x."]=".$_POST['qty_baik'][$x];
		//echo "<br>";
		//echo $x1."|".$qty_baik."|".$qty_rusak."<br>";
		for ($x_baik = 1; $x_baik <= $qty_baik; $x_baik++) {
  		$sql="insert into barang_detail (id_barang,id_unitkerja,kondisi,tanggal_input,jam_input,id_input,lokasi,catatan) values('$x1',$x2,'Baik','$tanggal','$jam','$input_id','$x3','$x4')";
			mysqli_query($koneksi,$sql);
			//echo $sql."<br>";
		}

		for ($x_rusak = 1; $x_rusak <= $qty_rusak; $x_rusak++) {
  		$sql2="insert into barang_detail (id_barang,id_unitkerja,kondisi,tanggal_input,jam_input,id_input,lokasi,catatan) values('$x1',$x2,'Rusak','$tanggal','$jam','$input_id','$x3','$x4')";
			mysqli_query($koneksi,$sql2);
			//echo $sql2."<br>";
		}
  		
		
	}
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=selesaiaddinventaris&id=$input_id");
	
?>