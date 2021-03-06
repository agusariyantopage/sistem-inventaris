<?php 
// Ambil ID Hapus Terakhir
  $id_hapus=$_GET['id'];
  
  $sql1="select hapus.*,nama_panjang from hapus,unit_kerja where hapus.id_unit=unit_kerja.id_unit and id_hapus=$id_hapus";
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
  $status=$r1['status'];
  if(empty($_GET['act'])||$status=='Disetujui'){
    $aksi='Detail Informasi Pengajuan';
  } elseif($_GET['act']=='hapus'){
    $aksi='Penolakan Pengajuan';
  } elseif($_GET['act']=='approve'){
    $aksi='Approval Pengajuan';
  }

?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Informasi Lengkap Pengajuan Penghapusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
              <li class="breadcrumb-item"><a href="index.php?p=hapusitem">Hapus Inventaris</a></li>
              <li class="breadcrumb-item active"><?= $aksi ?></li>
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
                <h3 class="card-title"><?= $aksi ?></h3>
              </div> 
              <!-- /.card-header -->

              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <label>Unit Pengaju</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['nama_panjang']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Status Pengajuan</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['status']; ?>
                  </div>                  
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Tanggal Diajukan</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_aju']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Tanggal Disetujui</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_setuju']; ?>
                  </div>
                 </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Nama Pengaju</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['pengaju']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Nama Penanggung Jawab</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['penanggung']; ?>
                  </div>
                 </div>
                 <div class="row">
                  <div class="col-md-3">
                    <label>Alasan Pengajuan Penghapusan</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['alasan']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Tindak Lanjut Penghapusan</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tindak_lanjut']; ?>
                  </div>
                 </div>
                

                <table id="input-group" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Deskripsi</th>
                    <th>Spesifikasi</th> 
                    <th>Kondisi</th>                                       
                    <th>Lokasi Barang</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      
                      $sql="select hapus_detail.*,barang.* from hapus_detail,barang where  barang.id_barang=hapus_detail.id_barang and id_hapus=$id_hapus";
                      
                      
                      //echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td><?= $r['id_barang_detail']; ?></td>                        
                        <td><?= $r['deskripsi']; ?></td>                         
                        <td><?= $r['spesifikasi']; ?></td> 
                        <td><?= $r['kondisi']; ?></td> 
                        
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
<?php 
             
              // New
              if($status=='Ditolak'){
                echo "<form action='#'>                          
                    <div class='form-group'>
                      <label for='alasan'>Alasan Penolakan</label>
                      <textarea readonly='' class='form-control' name='alasan' rows='3'>$r1[alasan_ditolak]</textarea>
                    </div>
                  </form>";

              }
              if(empty($_GET['act'])){
                echo "<a href='index.php?p=hapusitem'>
                  <button class='btn btn-success'>Kembali</button>
                </a>";
                } elseif($_GET['act']=='hapus'&&$status=='Sedang Diverifikasi'){
                  echo "
                  <form action='aksi_hapusitem_tolak.php' method='post'>
                    <input type='hidden' name='id' value=$id_hapus>
                    <div class='form-group'>
                      <label for='alasan'>Alasan Penolakan</label>
                      <textarea required='' class='form-control' name='alasan' rows='3'></textarea>
                    </div>
                    <button class='btn btn-danger' type='submit' onclick=\"return confirm('Apakah Anda Yakin Akan Menolak Pengajuan Ini?')\">Tolak</button>
                  </form>";
                } elseif($_GET['act']=='approve'&&($status!='Disetujui'&&$status!='Ditolak')){
                  echo "<form action='aksi_hapusitem_approve.php' method='post'>
                    <input type='hidden' name='id' value=$id_hapus>
                    <button type='submit' id='submitForm' class='btn btn-info'>Setujui</button>
                    </form>";
                } else {
                  echo "<a href='index.php?p=hapusitem'>
                        <button class='btn btn-success'>Kembali</button>
                        </a>";
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
<script>
   //$('#submitForm').on('click',function(e){ 
    document.querySelector("#submitForm").addEventListener('click', function(e){       
      e.preventDefault();
      var form = $(this).parents('form');
      Swal.fire({
            title: 'Konfirmasi Approval?',
            text: "Pastikan data sudah benar karena proses tidak akan bisa di batalkan , ketika anda menyetujui pengajuan ini, maka inventaris akan dihapus secara permanen sesuai dengan daftar barang yang diajukan",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Setujui!'            
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
</script>            
    