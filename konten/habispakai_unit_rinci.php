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
                    <label>Tanggal Terima Barang</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_terima_barang']; ?>
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
                <br><br>
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Deskripsi</th>
                    <th>Satuan</th>
                    <th>Harga</th> 
                    <th>Jumlah</th>                   
                    <th>Subtotal</th>                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      
                      $sql="select * from habispakai_detail where id_habispakai=$id order by deskripsi";
                      $sub=0;
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>                                           
                        <td><?= $r['deskripsi']; ?></td>                         
                        <td><?= $r['satuan']; ?></td>
                        <td align="right"><?= number_format($r['harga']); ?></td>                         
                        <td align="right"><?= number_format($r['jumlah']); ?></td>
                        <td align="right"><?= number_format($r['jumlah']*$r['harga']); ?></td>
                      </tr>
                  <?php
                    $sub=$sub+($r['jumlah']*$r['harga']);
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                    <td colspan=4 align="center"><b>GRANDTOTAL</b></td>
                    <td align="right"><b><?= number_format($sub); ?></b></td>
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
          
