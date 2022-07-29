<?php
    $_SESSION['lok']=$_GET['lok'];
    if(empty($_GET['id'])){
      $id= $_SESSION['idunit'];
    } else {
      $id = $_GET['id'];
    }      
    $sql_get_unit="select * from unit_kerja where id_unit=$id";
    $query_get_unit=mysqli_query($koneksi,$sql_get_unit);
    $get_unit=mysqli_fetch_array($query_get_unit);
    $nama_unit=$get_unit['nama_panjang'];
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cetak Label</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?p=barcode">Barcode</a></li>
              <li class="breadcrumb-item"><a href="index.php?p=barcode-unit&id=<?= $id; ?>"><?= $nama_unit; ?></a></li>
              <li class="breadcrumb-item active">Rincian Per Ruangan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rincian Data Inventaris Per Lokasi/Ruang Unit Kerja</h3>
              </div>
               <!-- /.card-header -->
               <div class="card-body">                            
                <table id="inventaris-rinci"  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Spesifikasi</th> 
                    <th>Kondisi</th>
                    <th>Unit</th>                   
                    <th>Lokasi Barang</th>
                    <th>Cetak</th>
                  </tr>
                  </thead>
                </table><br>
                <a href="pdf/examples/print-barcode1d-selection.php" target="blank">
                  <button class="btn btn-primary mb-2"><i class="fas fa-print"></i> Cetak (
                    <?php 
                      if(isset($_SESSION['barcode_cart'])){
                        echo count($_SESSION['barcode_cart']);
                      } else {
                        echo "0";
                      }  
                    ?>
                    ) Item Terpilih</button>
                </a>
                <a href="aksi_tambahbcode_reset.php">
                  <button class="btn btn-danger mb-2"><i class="fas fa-trash"></i>Reset Item</button>
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
<!-- import jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script>
    $(function() {
    $('#inventaris-rinci').DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "ajax": "server-side/datarinci_lokasi.php" 
    } );
}) ;

</script>