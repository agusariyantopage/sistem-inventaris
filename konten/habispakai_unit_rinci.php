<?php 
  $id=$_GET['id']; 
  $sql1="select habispakai.*,nama_panjang from habispakai,unit_kerja where habispakai.id_unit=unit_kerja.id_unit and habispakai.id_habispakai=$id";
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rincian Data</h1>
            <div class="flash-data" data-flashdata="<?= Flasher::message() ?>"></div>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Barang Habis Pakai</a></li>                          
            <li class="breadcrumb-item"><a href="index.php?p=habispakai">Pelaporan</a></li> 
            <li class="breadcrumb-item active">Rincian Data</li>
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
                <h3 class="card-title">Rincian Data</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body"> 
                <div class="row">
                  <div class="col-md-3">
                    <label>Unit Kerja</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['nama_panjang']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Waktu Input</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['dibuat_pada']; ?>
                  </div>                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Diajukan Oleh</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['pengaju']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Disetujui Oleh</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['penanggung']; ?>
                  </div>                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Sumber Pembiayaan</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tipe_sumber']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Keterangan Sumber</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['keterangan_tipe_sumber']; ?>
                  </div>                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Tanggal Perkiraan Terima Barang</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_terima_barang']; ?>
                  </div> 
                  <div class="col-md-3">
                    <label>Periode Pemakaian</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['periode_pakai']; ?>
                  </div>                                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Tanggal Awal Pemakaian</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_awal_pakai']; ?>
                  </div> 
                  <div class="col-md-3">
                    <label>Tanggal Akhir Pemakaian</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_akhir_pakai']; ?>
                  </div>                                  
                </div>  
                <br>
                <b>DETAIL PENGAJUAN</b>
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Deskripsi</th>
                    <th>Satuan</th>
                    <th>Harga</th> 
                    <th>Jumlah Pengajuan</th> 
                    <th>Jumlah Realisasi</th>                   
                    <th>Subtotal</th>                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      
                      $sql2="select habispakai_detail.*,deskripsi,satuan from barang_habispakai,habispakai_detail where barang_habispakai.id_barang_habispakai=habispakai_detail.id_barang_habispakai and id_habispakai=$id order by deskripsi";
                      $sub=0;
                      // echo $sql2;
                      $perintah2=mysqli_query($koneksi,$sql2);
                      while ($r2=mysqli_fetch_array($perintah2)) {     
                    ?>              
                      <tr>                                           
                        <td><?= $r2['deskripsi']; ?></td>                         
                        <td><?= $r2['satuan']; ?></td>
                        <td align="right"><?= number_format($r2['harga']); ?></td>                         
                        <td align="right"><?= number_format($r2['jumlah']); ?></td>
                        <td align="right"><?= number_format($r2['jumlah_realisasi']); ?></td>
                        <td align="right"><?= number_format($r2['jumlah']*$r2['harga']); ?></td>
                      </tr>
                  <?php
                    $sub=$sub+($r2['jumlah']*$r2['harga']);
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                    <td colspan=5 align="center"><b>GRANDTOTAL</b></td>
                    <td align="right"><b><?= number_format($sub); ?></b></td>
                  </tfoot>                 
                </table><br>

                <b>HISTORI REALISASI</b>
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Supplier</th>                   
                    <th>Tanggal Realisasi</th> 
                    <th>Deskripsi</th>
                    <th>Satuan</th>
                    <th>Harga</th> 
                    <th>Jumlah Realisasi</th>                                       
                    <th>Subtotal</th>                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      
                      $sql3="select habispakai_realisasi.*,deskripsi,satuan from barang_habispakai,habispakai_realisasi where barang_habispakai.id_barang_habispakai=habispakai_realisasi.id_barang_habispakai and id_habispakai=$id order by deskripsi";
                      $sub=0;
                      // echo $sql3;
                      $perintah3=mysqli_query($koneksi,$sql3);
                      while ($r3=mysqli_fetch_array($perintah3)) {     
                    ?>              
                      <tr>                                           
                        <td><?= $r3['supplier']; ?></td>
                        <td><?= $r3['tgl_realisasi']; ?></td>
                        <td><?= $r3['deskripsi']; ?></td>                         
                        <td><?= $r3['satuan']; ?></td>
                        <td align="right"><?= number_format($r3['harga']); ?></td>                         
                        <td align="right"><?= number_format($r3['jumlah']); ?></td>                        
                        <td align="right"><?= number_format($r3['jumlah']*$r3['harga']); ?></td>
                      </tr>
                  <?php
                    $sub=$sub+($r3['jumlah']*$r3['harga']);
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                    <td colspan=6 align="center"><b>GRANDTOTAL</b></td>
                    <td align="right"><b><?= number_format($sub); ?></b></td>
                  </tfoot>                 
                </table><br>
<?php
if($r1['status']=='Disetujui'){
?>
                <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Proses Realisasi</button>                
<?php
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b> <?= $r2['deskripsi']; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form action="aksi_habispakai_realisasi.php" id="proses" method="post">
        <div class="form-group">
          <label for="tgl_realisasi">Tanggal Realisasi</label>          
          <input type="date" name="tgl_realisasi" id="tgl_realisasi" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="supplier">Nama Supplier</label>
          <input type="text" name="supplier" id="supplier" placeholder="Masukkan Toko/Distributor/Pemberi Bantuan/DST . . ." class="form-control" required>
        </div>  
        <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Deskripsi</th>
                    <th>Satuan</th>
                    <th>Harga</th> 
                    <th>Jumlah</th>   
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      
                      $sql="select habispakai_detail.*,deskripsi,satuan from barang_habispakai,habispakai_detail where barang_habispakai.id_barang_habispakai=habispakai_detail.id_barang_habispakai and id_habispakai=$id order by deskripsi";
                      $sub=0;
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      $num=mysqli_num_rows($perintah);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>      
                      <tr>
                        <td><?= $r['deskripsi']; ?></td>                         
                        <td><?= $r['satuan']; ?></td>
                        <td align="right"><?= number_format($r['harga']); ?></td>                         
                        <td align="right">
                          <input type="hidden" name="id_barang[]" value="<?= $r['id_barang_habispakai']; ?>">
                          <input type="hidden" name="harga[]" value="<?= $r['harga']; ?>">
                          <input name="jumlah[]" class="form-control" type="number" value="0" min="0" max="<?= number_format($r['jumlah']-$r['jumlah_realisasi']); ?>">
                        </td>                        
                      </tr>
                  <?php
                    $sub=$sub+($r['jumlah']*$r['harga']);
                    }
                  ?>                     
                  </tbody>                                
                </table> 
                
                <input type="hidden" name="jdata" value="<?= $num; ?>">     
                <input type="hidden" name="idhabispakai" value="<?= $id; ?>">     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Proses</button>
      </div>
        </form>
    </div>
  </div>
</div>              
          
