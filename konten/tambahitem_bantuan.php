<?php 
  // Ambil ID Hapus Terakhir
  $id=$_SESSION['idunit'];
  $sq="select * from tambah where  tipe_sumber='Bantuan' and id_unit=$id and status='Sedang Diverifikasi' and final=0";
  $pr=mysqli_query($koneksi,$sq);
  $r=mysqli_fetch_array($pr); 
  $id_hapus=mysqli_num_rows($pr);  
  //echo $id_hapus;
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penambahan Barang Dengan Mekanisme Bantuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>  
              <li class="breadcrumb-item"><a href="index.php?p=tambahitem">Tambah Inventaris</a></li>            
              <li class="breadcrumb-item active">Mekanisme Bantuan</li>
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
                  if($id_hapus==0) {
                ?>
                <a href="index.php?p=tambahitem-bantuan-step1">
                  <button class="btn btn-primary">Buat Pengajuan Baru</button>
                </a> 
                <?php
                  } else {
                ?>
                <a href="index.php?p=tambahitem-bantuan-step4">
                  <button class="btn btn-danger">Lanjutkan Pengajuan Terakhir</button>
                </a>
                <?php 
                  }
                  
                 ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Unit Kerja</th>
                    <th>Status</th> 
                    <th>Tgl Pengajuan</th>
                    <th>Ket. Bantuan</th>                   
                    <th>Perubahan Terakhir</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                     
                        $id_unit= $_SESSION['idunit'];
                        $sql="select tambah.*,nama_panjang from tambah,unit_kerja where tipe_sumber='Bantuan' and tambah.id_unit=unit_kerja.id_unit and final=1 and tambah.id_unit=$id_unit";
                     
                      
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td>
                          <?= $r['id_tambah']; ?>                            
                          </td>                        
                        <td><?= $r['nama_panjang']; ?></td> 
                        <td>
                          <?php
                            if ($r['status']=='Sedang Diverifikasi') {
                              echo "<span class='badge badge-warning'>";
                            } elseif($r['status']=='Ditolak') {
                              echo "<span class='badge badge-danger'>";
                            } else {
                              echo "<span class='badge badge-success'>";
                            }
                           echo $r['status']; 
                           echo "</span>";
                           ?>                          
                        </td> 
                        <td><?= $r['tgl_aju']; ?></td> 
                        <td><?= $r['jenis_tipe_sumber']; ?></td>
                        <td><?= $r['update_terakhir']; ?></td> 
                        <td>
<?php 
    if($r['status']=='Sedang Diverifikasi'){
 ?>  
  <a href="aksi_tambahitem_bantuan_delete_pengajuan.php?id=<?= $r['id_tambah']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Pengajuan Ini?')"><span class="fas fa-trash"></span></a>&nbsp;
 <?php 
  }
 ?> 
  <a href="index.php?p=tambahitem-bantuan-rinci&id=<?= $r['id_tambah']; ?>"><span class="fas fa-info-circle"></span></a>&nbsp;
 
</td> 
                        
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID </th>
                    <th>Unit Kerja</th>
                    <th>Status</th> 
                    <th>Tgl Pengajuan</th>
                    <th>Tgl Disetujui</th>                   
                    <th>Perubahan Terakhir</th>
                    <th>Aksi</th> 
                    
                  </tr>
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
    