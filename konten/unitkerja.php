<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Unit Kerja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
              <li class="breadcrumb-item active">Unit Kerja</li>
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
                <h3 class="card-title">Data Unit Kerja</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Kode</th>
                    <th>Nama Singkat</th>
                    <th>Nama Panjang</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql="select * from unit_kerja";
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td><?= $r['id_unit']; ?></td>
                        <td><?= $r['kode']; ?></td>
                        <td><?= $r['nama_singkat']; ?></td>
                        <td><?= $r['nama_panjang']; ?></td>               
                        <td align="center">
                            <a href="index.php?p=editunitkerja&id=<?= $r['id_unit']; ?>"><span class="fas fa-edit"></span></a>
                            &nbsp;
                            <a href="index.php?p=editunitkerja-user&id=<?= $r['id_unit']; ?>"><span class="fas fa-user"></span></a>
                            &nbsp;
<?php 
if($r['akses_pengajuan']!='1'){
?>                            
                            <a href="index.php?p=editunitkerja-akses&id=<?= $r['id_unit']; ?>"><span class="fas fa-cog"></span></a>
                            &nbsp;
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
                    <th>Kode</th>
                    <th>Nama Singkat</th>
                    <th>Nama Panjang</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table><br>
                <a href="index.php?p=addunitkerja">
                  <button type="button" class="btn btn-primary btn-block"><i class="fa fa-file"></i> Tambah</button>
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
    