<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Statistik Data Inventaris</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Statistik</a></li>              
              <li class="breadcrumb-item active">Unit Kerja</li>
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
                <h3 class="card-title">Statistik Per Unit Kerja</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Unit Kerja</th>                    
                    <th>Jml Baik</th>                                      
                    <th>Jml Rusak</th>
                    <th>Jml Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        
                        $sql="select unit_kerja.id_unit,unit_kerja.nama_panjang,COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak,barang_detail.tanggal_input from unit_kerja left join barang_detail on unit_kerja.id_unit=barang_detail.id_unitkerja GROUP by unit_kerja.nama_panjang";
                     
                      // -- Akses Yayasan / Unit Kerja 
                      
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {  
                      $qty_baik=$r['qty_baik'];
                      $qty_rusak=$r['qty_rusak'];
                      $total_item=$r['qty_baik']+$r['qty_rusak'];
                      if($total_item>0){
                        $Psqty_baik=round($qty_baik/$total_item*100,2);
                        $Psqty_rusak=round($qty_rusak/$total_item*100,2);
                      } else {
                        $Psqty_baik=0;
                        $Psqty_rusak=0;
                      }  
                        
                    ?>              
                      <tr>
                        <td><?= $r['id_unit']; ?></td>                        
                        <td><a href="#"><?= $r['nama_panjang']; ?></a></td>
                        <td><?= $r['qty_baik']; ?> (<?= $Psqty_baik; ?>%)</td>                        
                        <td><?= $r['qty_rusak']; ?> (<?= $Psqty_rusak; ?>%)</td> 
                        <td><?= $r['qty_baik']+$r['qty_rusak']; ?></td>  
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID </th>
                    <th>Kategori</th>                    
                    <th>Jml Baik</th>                                      
                    <th>Jml Rusak</th>
                    <th>Jml Total</th> 
                  </tr>
                  </tfoot>
                </table>
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
    