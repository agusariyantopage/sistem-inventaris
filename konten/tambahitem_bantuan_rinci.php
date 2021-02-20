<?php 
// Ambil ID Hapus Terakhir
  $id_tambah=$_GET['id'];
  
  $sql1="select tambah.*,nama_panjang from unit_kerja,tambah where unit_kerja.id_unit=tambah.id_unit and id_tambah=$id_tambah";
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
  

?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Informasi Lengkap Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inventaris</a></li>  
            <li class="breadcrumb-item"><a href="index.php?p=tambahitem">Tambah Inventaris</a></li>            
            <li class="breadcrumb-item"><a href="index.php?p=tambahitem-bantuan">Mekanisme Bantuan</a></li> 
            <li class="breadcrumb-item active">Rincian Pengajuan</li>
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
                <h3 class="card-title">Informasi Detail Pengajuan</h3>
              </div> 
              <!-- /.card-header -->

              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    <label>Unit Pengaju</label> 
                  </div>
                  <div class="col-3">                    
                    <?= $r1['nama_panjang']; ?>
                  </div>
                  <div class="col-3">
                    <label>Status Pengajuan</label>  
                  </div>
                  <div class="col-3">                    
                    <?= $r1['status']; ?>
                  </div>                  
                </div>
                <div class="row">
                  <div class="col-3">
                    <label>Tanggal Diajukan</label> 
                  </div>
                  <div class="col-3">                    
                    <?= $r1['tgl_aju']; ?>
                  </div>
                  <div class="col-3">
                    <label>Tanggal Disetujui</label>  
                  </div>
                  <div class="col-3">                    
                    <?= $r1['tgl_setuju']; ?>
                  </div>
                 </div>
                <div class="row">
                  <div class="col-3">
                    <label>Nama Pengaju</label> 
                  </div>
                  <div class="col-3">                    
                    <?= $r1['pengaju']; ?>
                  </div>
                  <div class="col-3">
                    <label>Nama Penanggung Jawab</label>  
                  </div>
                  <div class="col-3">                    
                    <?= $r1['penanggung']; ?>
                  </div>
                 </div>
                <div class="row">
                  <div class="col-3">
                    <label>Jenis Bantuan</label> 
                  </div>
                  <div class="col-3">                    
                    <?= $r1['jenis_tipe_sumber']; ?>
                  </div>
                  <div class="col-3">
                    <label>Keterangan Bantuan</label>  
                  </div>
                  <div class="col-3">                    
                    <?= $r1['keterangan_tipe_sumber']; ?>
                  </div>
                 </div>
                
                

                <table id="input-group" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Spesifikasi</th> 
                    <th>Nilai Perolehan</th>                                       
                    <th>Lokasi Barang</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      
                      $sql="select tambah_detail.*,barang.* from tambah_detail,barang where  barang.id_barang=tambah_detail.id_barang and id_tambah=$id_tambah";
                      
                      
                      //echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td>
                          <?= $r['id_tambah_detail']; ?>
                            
                          </td>                        
                        <td><?= $r['deskripsi']; ?></td>                         
                        <td><?= $r['spesifikasi']; ?></td> 
                        <td align="right"><?= number_format($r['nilai_perolehan']); ?></td>                         
                        <td><?= $r['lokasi']; ?></td> 
                        <td align="center">
                            <?= $r['status']; ?>                                                       
                        </td>
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  
                </table><br>
                
                <a href="index.php?p=tambahitem-bantuan">
                  <button class="btn btn-success">Kembali</button>
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
    