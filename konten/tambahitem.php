<?php 
  // Ambil ID Hapus Terakhir
  $id=$_SESSION['idunit'];
  $sq="select * from hapus where id_unit=$id and status='Sedang Diverifikasi' and final=0";
  $pr=mysqli_query($koneksi,$sq);
  $r=mysqli_fetch_array($pr); 
  $id_hapus=mysqli_num_rows($pr);  
  //echo $id_hapus;
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pilih Mekanisme Penambahan Item</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>              
              <li class="breadcrumb-item active">Tambah Inventaris</li>
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
                <h3 class="card-title">Pilih Mekanisme Penambahan Inventaris</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                      <!-- <img src="..." class="card-img-top" alt="..."> -->
                      <div class="card-body">
                        <h5 class="card-title">Pengajuan Mandiri</h5>
                        <p class="card-text">Penambahan inventaris dengan mekanisme pembelian mandiri </p>
                        <a href="index.php?p=tambahitem-mandiri" class="btn btn-primary"><i class="fas fa-forward"></i> Lanjutkan</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                      <!-- <img src="..." class="card-img-top" alt="..."> -->
                      <div class="card-body">
                        <h5 class="card-title">Bantuan</h5>
                        <p class="card-text">Penambahan inventaris yang bersumber dari bantuan/hibah</p>
                        <a href="index.php?p=tambahitem-bantuan" class="btn btn-primary"><i class="fas fa-forward"></i> Lanjutkan</a>
                      </div>
                    </div>
                  </div>
                </div>
                 
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
    