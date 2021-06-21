<?php
  session_start();
  if(empty($_SESSION['namapengguna'])){
    header('location:login.php');
  }
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header('location:login.php');
  }
  $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

  include "koneksi.php";
  $tipeakses=$_SESSION['jenisakses'];
  $id_unit= $_SESSION['idunit'];
  if($id_unit==''){
	$id_unit=0;
}
$sql_cekfinalisasi="select * from unit_kerja where id_unit=$id_unit";
//echo $sql_cekfinalisasi;
$perintah_cekfinalisasi=mysqli_query($koneksi,$sql_cekfinalisasi);
if(mysqli_num_rows($perintah_cekfinalisasi)>=1){
	$r_cekfinalisasi=mysqli_fetch_array($perintah_cekfinalisasi);
	$finalda=$r_cekfinalisasi['final_data_awal'];
	$aksesPengajuan=$r_cekfinalisasi['akses_pengajuan'];
} else {
	$finalda=0;
	$aksesPengajuan=0;
}
require_once 'Flasher.php'; // Untuk Flasher
$app = new Flasher;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Inventaris Yayasan Triatma Surya Jaya Versi 2.0</title>
  <link rel="icon" href="img/logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">  
  <!-- Kombo Box Dinamis -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?p=bantuan" class="nav-link">Bantuan</a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">App Inven YTSJ 2.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php?p=changeprofil" class="d-block text-sm"><?= $_SESSION['namalengkap']; ?></a>
          <span class='badge badge-success'>Jenis Akses : <?= $_SESSION['jenisakses']; ?></span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard               
              </p>
            </a>
          </li>
<!-- Akses Yayasan -->          
<?php 
  if($_SESSION['jenisakses']=='Yayasan'){


?>                    
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Pokok
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?p=unitkerja" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=kategori" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Inventaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=subkategori" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subkategori Inventaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=barang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="index.php?p=bahan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Habis Pakai</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="index.php?p=pengguna" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Inventaris
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?p=inventarisrekap" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekapitulasi Inventaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=inventarisrinci" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rincian Inventaris</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="index.php?p=dataawal-app" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Data Awal</p>
                </a>
              </li>             

              <li class="nav-item">
                <a href="index.php?p=tambahitem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Tambah</p>
                  <?php   
// Cek Pengajuan
$sq_jd="select * from tambah where status ='Sedang Diverifikasi' and final=1";
$p_jd=mysqli_query($koneksi,$sq_jd);
$jumlah_delete=mysqli_num_rows($p_jd);
if($jumlah_delete>=1){
    echo "<span class='right badge badge-info'>$jumlah_delete</span> ";
                   
}
?>                  
                </a>
              </li>                
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Perubahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=hapusitem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Hapus</p>
<?php   
// Cek Pengajuan
$sq_jd="select * from hapus where status ='Sedang Diverifikasi' and final=1";
$p_jd=mysqli_query($koneksi,$sq_jd);
$jumlah_delete=mysqli_num_rows($p_jd);
if($jumlah_delete>=1){
    echo "<span class='right badge badge-info'>$jumlah_delete</span> ";
                   
}
?>
                
                </a>
              </li>               
            </ul>
          </li>
<?php
  } 
?>
<?php
  if($_SESSION['jenisakses']=='Unit'){
?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Inventaris
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?p=inventarisrekap" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekapitulasi Inventaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=inventarisrinci" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rincian Inventaris</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Awal Inventaris</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
              
              <ul class="nav nav-treeview pl-3">
                  <li class="nav-item">
                    <a href="index.php?p=inventaris" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Input Per Item</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?p=inventarisgroup-step1" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Input Per Lokasi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?p=inventarisperbaikan" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Perbaikan Data</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?p=finalisasi-dataawal" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Finalisasi Data</p>
                    </a>
                  </li>
              </ul>
              </li>
              <?php 
              	if($aksesPengajuan==1){
               ?>
              <li class="nav-item">
                <a href="index.php?p=tambahitem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Inventaris</p>
                  <span class="right badge badge-danger">New</span>
                </a>
              </li>

              <li class="nav-item">
                <a href="index.php?p=mutasiitem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mutasi Inventaris</p>
                  <span class="right badge badge-danger">New</span>
                </a>
              </li>

              <li class="nav-item">
                <a href="index.php?p=hapusitem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hapus Inventaris</p>
                  <span class="right badge badge-danger">New</span>
                </a>
              </li> 
              <?php 
              	}
               ?>              
            </ul>
          </li>
		<?php 
		    if($aksesPengajuan==1){
		?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p class="text-sm">
                Barang Habis Pakai
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?p=habispakai" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>              

              
                           
            </ul>
          </li>
          <?php 
				}
           ?>
<?php
  }
?>
<?php
  if($_SESSION['jenisakses']=='Yayasan'){
?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Statistik
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?p=statistikinven" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Statistik Inventaris</p>
                </a>
              </li>              

              <li class="nav-item">
                <a href="index.php?p=statistikunit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Statistik Unit Kerja</p>
                </a>
              </li> 
                           
            </ul>
            
          </li>
<?php
  }
?>          
          <li class="nav-item">
            <a href="index.php?p=barcode" class="nav-link">
              <i class="nav-icon fas fa-barcode"></i>
              <p>
                Cetak Barcode               
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="index.php?p=bantuan" class="nav-link">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Bantuan               
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout               
              </p>
            </a>
          </li>                      
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php 
    	include 'konten.php';  // Ambil Isi Dari Konten
    ?> 
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://triatma-mapindo.ac.id">Yayasan Triatma Surya Jaya</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0 BETA
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- Plugin Sweet Alert -->
<script src="dist/js/sweetalert2.all.min.js"></script>
<script src="dist/js/script-alert.js"></script>

<!-- <script src="dist/js/sweetalert2.all.min.js"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard2.js"></script>-->
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#input-group').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
    
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>



</body>
</html>

