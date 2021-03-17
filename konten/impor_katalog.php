<?php
 
 if (isset($_POST['upload'])) { // IF 1
  	$pesan='';
	$namafile=basename($_FILES["fileToUpload"]["name"]);
	$target_file = $namafile ;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if($imageFileType != "xls" ) { 
	  $msg="<span class='badge badge-danger'>Proses Impor Gagal .Silahkan Gunakan File Draft Yang Tersedia (Jangan Mengupload File Selain Draft Yang Disediakan)</span><br>";	  
	} else { //IF 2

		require('xlsreader/php-excel-reader/excel_reader2.php');
		require('xlsreader/SpreadsheetReader.php');

		//upload data excel kedalam folder upload
		$target_dir = "upload/".basename($_FILES['fileToUpload']['name']);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_dir);

		$Reader = new SpreadsheetReader($target_dir);

		$sukses=0;
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
			        	if(strlen($deskripsi)<=3){
			        		$pesan.="Gagal Impor Baris Ke : ".$Key." Deskripsi Katalog Barang Tidak Wajar (Kurang dari 4 Huruf) <br>";
			        	} else {
			               $query="INSERT INTO barang(id_subkategori,deskripsi,merk,spesifikasi,keterangan) VALUES ('".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."')";
			               mysqli_query($koneksi,$query);
			               $sukses++;
			       		}
			        }  
			    }
		       
		  } // Tutup Each
		  	date_default_timezone_set('Asia/Singapore');
			$tanggal=date('Y-m-d');
			$jam=date('H:i:s');
			$date = date_create();
			$input_id = date_timestamp_get($date);
			$now = date('Y_m_d_H_i_s');
			rename($target_dir,"upload/ImporKatalog_".$now.".xls");
	  		$msg="<span class='badge badge-success'>Berhasil Menambahkan : ".$sukses." Baris Dari ".$Key." Data </span><br>";
	}// Tutup If 2
 } // Tutup If 1
 	
 ?>

<!-- Tampilan Tambah Tabel Pelanggan -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0">Tambah Barang</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
		      <li class="breadcrumb-item"><a href="index.php?p=barang">Barang</a></li>
		      <li class="breadcrumb-item active">Impor Katalog Barang</li>
		    </ol>
		  </div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
	
<section class="content">
  	<div class="container-fluid">	
  		<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulir Impor Katalog Barang</h3>
              </div>  	
            		<div class="card-body">
            			<a href="draft/DraftImportKatalog.xls" target="blank"><button class="btn btn-success">Unduh Draft</button></a>
            			<br>
            			<?php  
							if (isset($_POST['upload'])) {
								
 								echo $msg;
						}		
            			?>
						<!-- Isian Form -->
						Untuk menambahkan katalog barang dengan fitur import silahkan gunakan draft file excel pada tombol unduh draft kemudian isi data sesuai keterangan kolom . Pastikan anda mengisi kolom id_subkategori sesuai dengan data yang ada.
						<form method="post" enctype="multipart/form-data">
							
							<div class="form-group">
								<label for="fileToUpload">Upload File</label>
								<input type="file" required="" class="form-control" name="fileToUpload" id="fileToUpload">	
							</div>
														
							<button type="submit" name="upload" class="btn btn-primary">Proses</button>
							
						</form>

					</div>		
			</div>
			</div>			
		</div>


	</div>
  	<!-- /.container-fluid -->
</section>
<!-- Main content -->