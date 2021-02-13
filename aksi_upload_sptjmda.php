<?php
	session_start();
	include "koneksi.php";
	
	// Ambil ID Hapus Terakhir
	$id=$_SESSION['idunit'];
	date_default_timezone_set('Asia/Singapore');
	$tanggal=date('Y-m-d');
	$jam=date('H:i:s');
	$date = date_create();
	$input_id = date_timestamp_get($date);
	$now = date('Y_m_d_H_i_s');
	$waktu_upload = date('Y-m-d H:i:s');
	$error	='none';

	$target_dir = "sptjm/";
	$namafile2 ="SPTJM-".$id."_".$now.".pdf";
	$namafile=basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir .$namafile ;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
	    echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	  } else {
	    echo "File is not an image.";
	    $uploadOk = 0;
	  }
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	  $error="exist";
	  $uploadOk = 0;
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
	  $error="size";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	
	if($imageFileType != "pdf" ) {
	  $error="filetype";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		//$target_file2 = $target_dir .$namafile2 ;
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    // Ubah Nama File Ketika Sukses DiUpload
		$namafilebaru="SPTJM_".$id."_".$now.".pdf";		
		rename($target_file,"sptjm/".$namafilebaru);
	    $sql1="update unit_kerja set file_sk_data_awal='$namafilebaru' , waktu_upload_sk_data_awal='$waktu_upload' where id_unit=$id";
	    mysqli_query($koneksi,$sql1);
	  } else {
	    echo "Sorry, there was an error uploading your file.";
	  }
	}
	
	// Mengarahkan Ke Halaman Daftar
	header("location:index.php?p=finalisasi-dataawal&status=$uploadOk&err=$error");
?>