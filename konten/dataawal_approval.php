<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Approval Data Awal Inventaris</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>              
              <li class="breadcrumb-item active">Approval Data Awal</li>
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
                <h3 class="card-title">Daftar Unit Kerja</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">                
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Unit Kerja</th>                    
                    <th>Finalisasi Data Awal</th>                                      
                    <th>File SPTJM</th>
                    <th>Tanggal Upload SPTJM</th>
                    <th>Akses Pengajuan</th>  
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      
                        $sql="select * from unit_kerja";
                     
                      // -- Akses Yayasan / Unit Kerja 
                      
                      // echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td>
                          <?= $r['id_unit']; ?>                            
                          </td>                        
                        <td><?= $r['nama_panjang']; ?></td> 
                        <td>
                          <?php
                            if ($r['final_data_awal']=='1') {
                              echo "<span class='badge badge-success'>Sudah</span>";
                            } else {
                              echo "<span class='badge badge-danger'>Belum</span>";
                            }                           
                           ?>                          
                        </td> 
                        <td><?= "<a target='blank' href='sptjm/".$r['file_sk_data_awal']."'>".$r['file_sk_data_awal']."</a>"; ?></td>
                        <td><?= $r['waktu_upload_sk_data_awal']; ?></td>  
                        <td>
                          <?php
                            if ($r['akses_pengajuan']=='1') {
                              echo "<span class='badge badge-success'>Buka</span>";
                            } else {
                              echo "<span class='badge badge-danger'>Tutup</span>";
                            }                           
                           ?> 
                        </td>
                       
                        <td>  
  <?php 
if($r['final_data_awal']=='1'&&$r['file_sk_data_awal']!=''&&$r['akses_pengajuan']!='1'){
?>
<a href="aksi_dataawal_approve.php?token=<?= md5($r['id_unit']); ?>"><span onclick="return confirm('Apakah Anda Yakin Akan Menyetujui Data Awal Ini?')" class="fas fa-check-circle"></span></a>
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
                    <th>Tgl Disetujui</th>                   
                    <th>Perubahan Terakhir</th>
                    <th>Aksi</th> 
                    
                  </tr>
                  </tfoot>
                </table><br>
               <i>Note : Silahkan Selesaikan Pengajuan Terakhir , Untuk dapat mengajukan pengajuan baru</i>
                 
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
    