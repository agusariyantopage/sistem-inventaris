<?php 
  // Ambil ID Hapus Terakhir
  $id=$_SESSION['idunit'];
  $sq="select * from habispakai where id_unit=$id and status='Sedang Diverifikasi' and final=0";
  $pr=mysqli_query($koneksi,$sq);
  $r=mysqli_fetch_array($pr); 
  $id_habispakai=mysqli_num_rows($pr);  
  //echo $id_habispakai;
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penggunaan Barang Habis Pakai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Barang Habis Pakai</a></li>                          
              <li class="breadcrumb-item active">Pelaporan</li>
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
                <h3 class="card-title">Daftar Pengajuan</h3>
                <div class="flash-data" data-flashdata="<?= Flasher::message() ?>"></div> 
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
             
                <?php
                  if($id_habispakai==0) {
                ?>
                <a href="index.php?p=habispakai-step1">
                  <button class="btn btn-primary">Buat Pengajuan Baru</button>
                </a> 
                <?php
                  } else {
                ?>
                <a href="index.php?p=habispakai-step2">
                  <button class="btn btn-danger">Lanjutkan Pengajuan Terakhir</button>
                </a>
                <?php 
                  }
                  
                 ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <?php
                  $thead="<tr>
                      <th>ID </th>
                      <th>Unit Kerja</th>
                      <th>Sumber Dana</th> 
                      <th>Keterangan Sumber Dana</th>
                      <th>Tanggal Terima</th>                   
                      <th>Perubahan Terakhir</th>
                      <th>Aksi</th>
                    </tr>";
                  ?>
                  <?= $thead; ?>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      $id_unit= $_SESSION['idunit'];
                      $sql="select habispakai.*,nama_panjang from habispakai,unit_kerja where habispakai.id_unit=unit_kerja.id_unit and habispakai.id_unit=$id_unit";
                     
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td><?= $r['id_habispakai']; ?></td>                        
                        <td><?= $r['nama_panjang']; ?></td> 
                        <td><?= $r['tipe_sumber']; ?></td>                         
                        <td><?= $r['keterangan_tipe_sumber']; ?></td> 
                        <td><?= $r['tgl_terima_barang']; ?></td>
                        <td><?= $r['update_terakhir']; ?></td> 
                        <td>
<?php 
    if(1==0){
 ?>  
  <a href="#" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Pengajuan Ini?')"><span class="fas fa-trash"></span></a>&nbsp;
 <?php 
  }
 ?> 
  <a href="index.php?p=habispakai-rinci&id=<?= $r['id_habispakai']; ?>"><span class="fas fa-info-circle"></span></a>&nbsp;
 
</td> 
                        
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <?= $thead; ?>
                  </tfoot>
                </table><br>
               <i>Note : Silahkan Selesaikan Pengajuan Terakhir , Untuk dapat mengajukan pengajuan baru</i>
                 
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
    