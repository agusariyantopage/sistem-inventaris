<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penambahan Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>                          
              <li class="breadcrumb-item active">Approval Tambah</li>
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
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Unit Kerja</th>
                    <th>Status</th> 
                    <th>Tgl Pengajuan</th>
                    <th>Tipe Pengadaan</th>                   
                    <th>Perubahan Terakhir</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select tambah.*,nama_panjang from tambah,unit_kerja where tambah.id_unit=unit_kerja.id_unit and final=1";                     
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
                        <td><?= $r['tipe_sumber']; ?></td>
                        <td><?= $r['update_terakhir']; ?></td> 
                        <td>
                        <a href="index.php?p=tambahitem-rinci&id=<?= $r['id_tambah']; ?>"><span class="fas fa-info-circle"></span></a>&nbsp;
  <?php 
    if($r['status']=='Sedang Diverifikasi'){
 ?>
  <a href="index.php?p=tambahitem-rinci&id=<?= $r['id_tambah']; ?>&act=hapus"><span class="fas fa-trash"></span></a>&nbsp;
  <?php 
    }
    if($r['status']=='Sedang Diverifikasi'){
 ?>
  <a href="index.php?p=tambahitem-rinci&id=<?= $r['id_tambah']; ?>&act=approve"><span class="fas fa-check-circle"></span></a>&nbsp;
 
 <?php 
  }
  ?>
 
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
                    <th>Tipe Pengadaan</th>                   
                    <th>Perubahan Terakhir</th>
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
 