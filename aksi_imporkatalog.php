<?php
 require "koneksi.php";
 if (isset($_POST['upload'])) {

  require('xlsreader/php-excel-reader/excel_reader2.php');
  require('xlsreader/SpreadsheetReader.php');

  //upload data excel kedalam folder uploads
  $target_dir = "upload/".basename($_FILES['fileToUpload']['name']);
  
  move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_dir);

  $Reader = new SpreadsheetReader($target_dir);
  $pesan='';
  foreach ($Reader as $Key => $Row)
  {
   // import data excel mulai baris ke-2 (karena ada header pada baris 1)
   if ($Key <= 1) continue;
      //if($Row[1] != "" && $$Row[2] != ""){  
        // Validasi Sub Kategori
        $id_subkategori=$Row[0];
        $sql1="select * from subkategori where id_subkategori=$id_subkategori";
        $q1=mysqli_query($koneksi,$sql1);
        $val1=mysqli_num_rows($q1);
        if($val1<1){
          $pesan.="Gagal Impor Baris Ke : ".$Key." Karena Kode Subkategori Tidak Valid <br>";
        } else {
            $deskripsi=$Row[1];
            $sql2="select * from barang where deskripsi='$deskripsi'";
            $q2=mysqli_query($koneksi,$sql2);
            $val1=mysqli_num_rows($q2);
            if($val1==1){
              $pesan.="Gagal Impor Baris Ke : ".$Key." Nama Katalog Barang Sudah Pernah Digunakan <br>";
            } else {
               $query="INSERT INTO barang(id_subkategori,deskripsi,merk,spesifikasi,keterangan) VALUES ('".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."')";
               mysqli_query($koneksi,$query);
               $pesan.="Sukses Impor Baris Ke : ".$Key."<br>";
            }  
        }
        

       
       
        
       
  }
 
 } else {
  echo "Gagal Upload";
 }
 
 ?>