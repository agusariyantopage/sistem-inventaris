<?php 
  $id=$_GET['id']; 
  $sql1="select barang_detail.*,barang.*,kategori,subkategori from barang_detail,barang,kategori,subkategori where barang_detail.id_barang=barang.id_barang and barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori and id_barang_detail=$id";
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Log Perubahan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>  
              <li class="breadcrumb-item"><a href="index.php?p=mutasiitem">Mutasi Inventaris</a></li>
              <li class="breadcrumb-item active">Log Perubahan</li>
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
                <h3 class="card-title">Log Perubahan</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body"> 
                <div class="row">
                  <div class="col-md-3">
                    <label>Deskripsi</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['deskripsi']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Spesifikasi</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['spesifikasi']; ?>
                  </div>                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Lokasi Item</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['lokasi']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Catatan</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['catatan']; ?>
                  </div>                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Kondisi</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['kondisi']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Perubahan Terakhir</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['perubahan_terakhir']; ?>
                  </div>                  
                </div>  
                <br><br>
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Perubahan</th>
                    <th>Catatan</th> 
                    <th>Tanggal</th>                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      
                      $sql="select * from barang_detail_log where id_barang_detail=$id order by id_barang_detail_log desc";
                      
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>                                           
                        <td><?= $r['id_barang_detail_log']; ?></td>                         
                        <td><?= $r['perubahan']; ?></td>
                        <td><?= $r['catatan']; ?></td>                         
                        <td><?= $r['tanggal']; ?></td>
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID </th>
                    <th>Perubahan</th>
                    <th>Catatan</th> 
                    <th>Tanggal</th>                   
                  </tr>
                  </tfoot>
                </table><br>
                
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
          
