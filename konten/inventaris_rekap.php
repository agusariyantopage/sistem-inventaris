<?php 
  
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Rekapitulasi Inventaris</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>              
              <li class="breadcrumb-item active">Daftar Rekapitulasi Inventaris</li>
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
                <h3 class="card-title">Daftar Rekapitulasi Inventaris</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th rowspan="2">ID Barang</th>                    
                    <th rowspan="2">Deskripsi</th>
                    <th rowspan="2">Unit Kerja</th>
                    <th colspan="3" style="text-align:center;">Jumlah Barang</th> 
                    
                  </tr>
                  <tr>
                    <th>Baik</th>
                    <th>Rusak</th>                   
                    <th>Total</th>                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      // Akses Yayasan / Unit Kerja
                      if($_SESSION['level']==1) {
                        $sql="select barang_detail.*,barang.*,nama_panjang,COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja GROUP BY barang_detail.id_barang,barang_detail.id_unitkerja";
                      } else {
                        $id_unit= $_SESSION['idunit'];
                        $sql="select barang_detail.*,barang.*,nama_panjang,COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja and barang_detail.id_unitkerja=$id_unit GROUP BY barang_detail.id_barang,barang_detail.id_unitkerja";
                      }
                      // -- Akses Yayasan / Unit Kerja  
                      //echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td><?= $r['id_barang']; ?></td>                                                
                        <td><?= $r['deskripsi']; ?></td>
                        <td><?= $r['nama_panjang']; ?></td>                         
                        <td><?= $r['qty_baik']; ?></td> 
                        <td><?= $r['qty_rusak']; ?></td> 
                        <td><?= $r['qty_baik']+$r['qty_rusak']; ?></td>
                        
                        
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>                  
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
    