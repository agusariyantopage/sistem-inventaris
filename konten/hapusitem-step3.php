<?php 
// Ambil ID Hapus Terakhir
  $id=$_SESSION['idunit'];
  $sq="select * from hapus where id_unit=$id and status='Sedang Diverifikasi' and final=0";
  $pr=mysqli_query($koneksi,$sq);
  $r=mysqli_fetch_array($pr); 
  if(mysqli_num_rows($pr)<=0){
    $id_hapus=0;
  } else {
    $id_hapus=$r['id_hapus'];  
  }
  

?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Konfirmasi Pengajuan Penghapusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
              <li class="breadcrumb-item"><a href="index.php?p=hapusitem">Hapus Inventaris</a></li>
              <li class="breadcrumb-item active">Hapus Inventaris Step 3</li>
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
                <h3 class="card-title">Konfirmasi Item Dihapus</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
<?php
  
  if (empty($_GET['msg'])){
    $msg='';
  } else {
    $msg=$_GET['msg'];
  }
  
  if($msg=='success'){
    echo "<div class='alert-sm pl-2 mb-2 alert-success role=alert'>Item Telah Berhasil Ditambahkan !!</div> ";
  } elseif($msg=='failed'){
    echo "<div class='alert-sm pl-2 mb-2 alert-danger role=alert'>Item Yang Dipilih Sudah Pernah Diajukan !!</div> ";
  }
?>
             
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Spesifikasi</th> 
                    <th>Kondisi</th>
                                       
                    <th>Lokasi Barang</th>
                    <th>Batal</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      if($_SESSION['level']==1) {
                        $sql="select hapus_detail.*,barang_detail.*,barang.* from hapus_detail,barang_detail,barang where barang_detail.id_barang_detail=hapus_detail.id_barang_detail and barang.id_barang=barang_detail.id_barang where id_hapus=$id_hapus";
                      } else {
                        $id_unit= $_SESSION['idunit'];
                        $sql="select hapus_detail.*,barang_detail.*,barang.* from hapus_detail,barang_detail,barang where barang_detail.id_barang_detail=hapus_detail.id_barang_detail and barang.id_barang=barang_detail.id_barang and barang_detail.id_unitkerja=$id_unit and id_hapus=$id_hapus";
                      }
                      // -- Akses Yayasan / Unit Kerja 
                      
                       //echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td>
                          <?= $r['id_barang_detail']; ?>
                            
                          </td>                        
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
                        <td align="center">
                            <a href="aksi_hapusitem_delete.php?id=<?= $r['id_hapus_detail']; ?>"><span class="fas fa-trash"></span></a>
                            &nbsp;                                                       
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
                    <th>Spesifikasi</th> 
                    <th>Kondisi</th> 
                                      
                    <th>Lokasi Barang</th>
                    <th>Batal</th> 
                    
                  </tr>
                  </tfoot>
                </table><br>
                <span style="float:left;" class="mr-1">
                <a href="index.php?p=hapusitem-step2">
                  <button class="btn btn-primary">Tambah Item Lain</button>
                </a>
                </span>
                <span style="float:left;">
                <form action='aksi_hapusitem_step3.php' method='post'>                          
                          <input type='hidden' name='id' value=<?= $id_hapus; ?>>
                          <button type='submit' id='submitForm' class='btn btn-success'>Selesai</button>
                </form>
                </span>
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
            title: 'Konfirmasi Selesai?',
            text: "Pastikan data sudah benar karena proses tidak akan bisa di batalkan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Selesaikan!'            
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
</script>            
    