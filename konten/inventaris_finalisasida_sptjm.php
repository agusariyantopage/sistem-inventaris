<?php 
  //echo $file_sptjm;
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Finalisasi Data Awal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
              <li class="breadcrumb-item"><a href="#">Input Inventaris</a></li>              
              <li class="breadcrumb-item active">Finalisasi Data Awal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Surat Pernyataan Tanggung Jawab Mutlak</h3>
              </div>
               
              <!-- /.card-header -->
              <div class="card-body">
<?php 
  if($file_sptjm==null){
     $pesan="Terima kasih proses finalisasi sudah dilaksanakan , selanjutnya silahkan cetak dan tanda tangani surat pernyataan dengan menekan tombol <b>Cetak SPTJM</b> sebagai bukti keabsahan data yang sudah anda masukkan kemudian kirimkan hardcopy dan softcopy ke Yayasan Triatma Surya Jaya.";
?>
                <a target="blank" href="pdf/examples/spfinalisasida.php">
                  <button class="btn btn-primary mb-2">Cetak SPTJM</button>
                </a>

<?php 
} else {
      $pesan="Seluruh proses pengerjaan data awal sudah selesai selanjutnya fitur pengajuan , mutasi dan penghapusan inventaris sudah dapat diakses setelah SPTJM yang diupload selesai direview oleh pihak Yayasan.Apabila masih terdapat kesalahan pada data awal inventaris silahkan hubungi yayasan untuk membuka kembali akses input inventaris data awal";
}
 ?>                  
                <p align="justify"><?= $pesan; ?></p>
                <hr>                
                UPLOAD SPTJM YANG SUDAH DISYAHKAN
                <hr>
    <?php 
      if($file_sptjm==null){
     ?>
                <form method="post" enctype="multipart/form-data" action="aksi_upload_sptjmda.php">
                  <input type="file" required="" name="fileToUpload" id="fileToUpload"><input type="submit" value="Upload">
                </form>
                <?php 
                if(!empty($_GET['err'])){
                  $sts=$_GET['status'];
                  $err=$_GET['err'];
                  
                  if ($err=='size'){
                    echo "Gagal Upload : Ukuran File Tidak Boleh Lebih Dari 3 MB";
                  }

                  if ($err=='filetype'){
                    echo "Gagal Upload : Upload File Dalam Format PDF";
                  }

                  if ($err=='exist'){
                    echo "Gagal Upload : File sudah pernah diupload silahkan gunakan file yang lain/ubah nama file yang akan diupload";
                  }
                  
                  
                } else { 
                 //echo "Netral"; 
                }            
                ?>
      <?php 
        } else {
          echo "File Sudah Diupload : <a target='blank' href='sptjm/".$file_sptjm."'>".$file_sptjm."</a> Download SPTJM Awal : <a target='blank' href='pdf/examples/spfinalisasida.php'>Unduh</a> ";
          //echo "<br><i>Catatan: Apabila terjadi kesalahan upload silahkan hubungi Yayasan</i>";
        }
       ?>          
                
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
            <!-- Main content -->
    
