<?php 
  $id=$_GET['id'];
  $sql0="select count(id_input) as jumlah_item from barang_detail where id_input=$id";   
  $perintah0=mysqli_query($koneksi,$sql0);
  $r0=mysqli_fetch_array($perintah0);
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sukses Tambah Inventaris</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
              <li class="breadcrumb-item"><a href="index.php?p=inventaris">Input Inventaris</a></li>
              <li class="breadcrumb-item active">Sukses Tambah Inventaris</li>
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
                <h3 class="card-title"><b>Proses Tambah Inventori Selesai</b></h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <div class='alert-sm pl-2 mb-2 alert-success role=alert'><?= $r0['jumlah_item']; ?> Item Telah Berhasil Ditambahkan !!</div>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Spesifikasi</th> 
                    <th>Kondisi</th>                   
                    <th>Lokasi Barang</th>
                    <th>Catatan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      $sql="select barang_detail.*,barang.* from barang_detail,barang where barang_detail.id_barang=barang.id_barang and id_input=$id";
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td><?= $r['id_barang_detail']; ?></td>                        
                        <td><?= $r['deskripsi']; ?></td>                         
                        <td><?= $r['spesifikasi']; ?></td> 
                        <td>
                          <?php
                            if ($r['kondisi']=='Baik') {
                              echo "<span class='badge badge-success'>";
                            } else {
                              echo "<span class='badge badge-danger'>";
                            }
                           echo $r['kondisi']; 
                           echo "</span>";
                           ?>                          
                        </td> 
                        <td><?= $r['lokasi']; ?></td> 
                        <td><?= $r['catatan']; ?></td> 
                        
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Spesifikasi</th> 
                    <th>Kondisi</th>                   
                    <th>Lokasi Barang</th>
                    <th>Catatan</th> 
                    
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
    