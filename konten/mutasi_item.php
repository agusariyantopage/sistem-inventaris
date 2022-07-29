<?php 
  
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mutasi Inventaris</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>              
              <li class="breadcrumb-item active">Mutasi Inventaris</li>
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
                <h3 class="card-title">Mutasi Inventaris</h3>
                <div class="flash-data" data-flashdata="<?= Flasher::message() ?>"></div>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">               
                <table id="inventaris-rinci-mutasi" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th> 
                    <th>Kondisi</th>
                    <th>Unit</th>                   
                    <th>Update Terakhir</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>                                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th> 
                    <th>Kondisi</th> 
                    <th>Unit</th>                   
                    <th>Update Terakhir</th>
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
<!-- import jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script>
    $(function() {
    $('#inventaris-rinci-mutasi').DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "ajax": "server-side/datarinci_mutasi.php" 
    } );
}) ;

</script>   
          
