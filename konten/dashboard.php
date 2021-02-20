<script>
// Set the date we're counting down to
var countDownDate = new Date("Apr 11, 2021 23:59:59").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = "<b>Batas Akhir Finalisasi Data Awal : "+days + " Hari " + hours + " Jam "
  + minutes + " Menit " + seconds + " Detik </b>";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Batas Finalisasi Data Awal Sudah Berakhir";
  }
}, 1000);
</script>
<?php

  $sql1="select count(*) as total_unit_kerja from unit_kerja";
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
  $total_unit_kerja=$r1['total_unit_kerja'];

  $sql1="select count(*) as total_kategori from kategori";
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
  $total_kategori=$r1['total_kategori'];

  $sql1="select count(*) as total_katalog_barang from barang";
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
  $total_katalog_barang=$r1['total_katalog_barang'];

  //Pengguna Belum
  // Akses Yayasan / Unit Kerja
  if($_SESSION['level']==1) {
    $sql1="select COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak,COUNT(IF(kondisi = 'Dipinjam', 1, NULL)) as qty_pinjam,COUNT(kondisi) as qty_total from barang_detail";
  } else {
    $id_unit= $_SESSION['idunit'];
    $sql1="select COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak,COUNT(IF(kondisi = 'Dipinjam', 1, NULL)) as qty_pinjam,COUNT(kondisi) as qty_total from barang_detail where barang_detail.id_unitkerja=$id_unit";
  }
  // -- Akses Yayasan / Unit Kerja
  
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
  if($r1['qty_total'] > 0){
    $qty_baik=$r1['qty_baik'];
    $qty_rusak=$r1['qty_rusak'];
    $qty_pinjam=$r1['qty_pinjam'];
    $total_item=$r1['qty_total'];
    $Psqty_baik=round($qty_baik/$total_item*100,2);
    $Psqty_rusak=round($qty_rusak/$total_item*100,2);
    $Psqty_pinjam=round($qty_pinjam/$total_item*100,2);
  }  
  else {
    $qty_baik=0;
    $qty_rusak=0;
    $qty_pinjam=0;
    $total_item=0;
    $Psqty_baik=0;
    $Psqty_rusak=0;
    $Psqty_pinjam=0;
  }  
  


?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
          <div id="demo" class='alert alert-info role=alert text-center'><b>Batas Akhir Finalisasi Data Awal :</b></div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unit Kerja</span>
                <span class="info-box-number">
                  <?= $total_unit_kerja ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-sitemap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kategori Barang</span>
                <span class="info-box-number"><?= $total_kategori ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-database"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Katalog Barang</span>
                <span class="info-box-number"><?= $total_katalog_barang ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number">5</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

         <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Barang Kondisi Baik</span>
                <span class="info-box-number">
                  <?= $qty_baik; ?> ( <?= $Psqty_baik; ?> %)
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Barang Kondisi Rusak</span>
                <span class="info-box-number"><?= $qty_rusak; ?> ( <?= $Psqty_rusak; ?> %)</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-truck"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Barang Dipinjam</span>
                <span class="info-box-number"><?= $qty_pinjam; ?> ( <?= $Psqty_pinjam; ?> %)</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Barang</span>
                <span class="info-box-number"><?= $total_item; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
          
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->