<?php 
// Ambil ID Hapus Terakhir
  $id=$_SESSION['idunit'];
  $sq="select * from tambah where tipe_sumber='Mandiri' and  id_unit=$id and status='Sedang Diverifikasi' and final=0";
  $pr=mysqli_query($koneksi,$sq);
  $r=mysqli_fetch_array($pr); 
  if(mysqli_num_rows($pr)<=0){
    $id_tambah=0;
    include "konten/tambahitem_bantuan_step1.php";
  } else {
    $id_tambah=$r['id_tambah'];  
  
  

?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Konfirmasi Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inventaris</a></li>  
            <li class="breadcrumb-item"><a href="index.php?p=tambahitem">Tambah Inventaris</a></li>            
            <li class="breadcrumb-item"><a href="index.php?p=tambahitem-mandiri">Mekanisme Mandiri</a></li> 
            <li class="breadcrumb-item active">Step 4</li>
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
                <h3 class="card-title">Konfirmasi Item Diajukan</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <?php                   
                  echo "<br>";
                  Flasher::Message();
                 ?>
             
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Harga</th> 
                    <th>Jumlah</th>
                                       
                    <th>Lokasi Barang</th>
                    <th>Batal</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        
                        $sql="select tambah_detail.*,barang.* from tambah_detail,barang where barang.id_barang=tambah_detail.id_barang and id_tambah=$id_tambah";
                      
                      // -- Akses Yayasan / Unit Kerja 
                      
                       //echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td>
                          <?= $r['id_tambah_detail']; ?>
                            
                          </td>                        
                        <td><?= $r['deskripsi']; ?></td>                         
                        <td align="right"><?= number_format($r['nilai_perolehan']); ?></td> 
                        <td align="right"><?= $r['qty']; ?></td>                         
                        <td><?= $r['lokasi']; ?></td> 
                        <td align="center">
                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" href="aksi_tambahitem_mandiri_delete_item.php?id=<?= $r['id_tambah_detail']; ?>"><span class="fas fa-trash"></span></a>
                            &nbsp;                                                       
                        </td>
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Harga</th> 
                    <th>Jumlah</th>                                      
                    <th>Lokasi Barang</th>
                    <th>Batal</th> 
                    
                  </tr>
                  </tfoot>
                </table><br>
                <a href="index.php?p=tambahitem-mandiri-step2">
                  <button class="btn btn-primary">Tambah Item Lain</button>
                </a>
                <a href="aksi_tambahitem_mandiri_step4.php?id=<?= $id_tambah; ?>">
                  <button onclick="return confirm('Apakah Anda Yakin Akan Menyelesaikan Transaksi?')" class="btn btn-success">Selesai</button>
                </a>  
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
<?php
  }
?>
    