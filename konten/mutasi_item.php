<?php 
  
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mutasi Inventaris</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>              
              <li class="breadcrumb-item active">Mutasi Inventaris</li>
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
                <h3 class="card-title">Mutasi Inventaris</h3>
                <div class="flash-data" data-flashdata="<?= Flasher::message() ?>"></div>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">               
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th> 
                    <th>Kondisi</th>
                    <th>Unit</th>                   
                    <th>Update Terakhir</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      if($_SESSION['level']==1) {
                        $sql="select barang_detail.*,barang.*,nama_panjang from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja";
                      } else {
                        $id_unit= $_SESSION['idunit'];
                        $sql="select barang_detail.*,barang.*,nama_panjang from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja and barang_detail.id_unitkerja=$id_unit";
                      }
                      // -- Akses Yayasan / Unit Kerja 
                      
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td>
                          <?= $r['id_barang_detail']; ?>
                            
                          </td>                        
                        <td><?= $r['deskripsi']; ?></td>                         
                        <td><?= $r['lokasi']; ?></td> 
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
                        <td><?= $r['nama_panjang']; ?></td>
                        <td><?= $r['perubahan_terakhir']; ?></td> 
                        <td>
                        <a href="index.php?p=mutasiitem-ubahdata&id=<?= $r['id_barang_detail']; ?>"><span class="fas fa-edit"></span></a>
                        <?php
                          if($r['kondisi']=='Baik'){
                            echo "<a href='index.php?p=mutasiitem-ubahdata-broke&id=$r[id_barang_detail]'><span class='fas fa-wrench'></span></a>";
                          } else {  
                            echo "<a href='index.php?p=mutasiitem-ubahdata-repair&id=$r[id_barang_detail]'><span class='fas fa-ambulance'></span></a>";
                          }   
                        ?>
                        <!-- <a href="#"><span class="fas fa-money-check-alt"></span></a> -->
                        <a href="index.php?p=mutasiitem-log&id=<?= $r['id_barang_detail']; ?>"><span class="fas fa-info-circle"></span></a>
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
                    <th>Lokasi</th> 
                    <th>Kondisi</th> 
                    <th>Unit</th>                   
                    <th>Update Terakhir</th>
                    <th>Aksi</th> 
                    
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
          
