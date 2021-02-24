<?php 
  
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Rincian Inventaris</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>              
              <li class="breadcrumb-item active">Daftar Rincian Inventaris</li>
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
                <h3 class="card-title">Daftar Rincian Inventaris</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <a href="pdf/examples/print-barcode1d.php" target="blank">
                  <button class="btn btn-primary mb-2">Cetak Barcode</button>
                </a>
                <a href="pdf/examples/print-barcode2d.php" target="blank">
                  <button class="btn btn-success mb-2">Cetak QR-Code</button>
                </a>
                <table id="inventaris-rinci"  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Spesifikasi</th> 
                    <th>Kondisi</th>
                    <th>Unit</th>                   
                    <th>Lokasi Barang</th>
                    <th>Catatan</th>
                  </tr>
                  </thead>
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
        "ajax": "server-side/datarinci.php" 
    } );
}) ;

</script>