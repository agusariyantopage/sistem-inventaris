<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Subkategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
              <li class="breadcrumb-item active">Subkategori</li>
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
                <h3 class="card-title">Data Subkategori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Kategori</th>
                    <th>Kode Subkategori</th>
                    <th>Subkategori</th>                    
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql="select subkategori.*,kategori from subkategori,kategori where subkategori.id_kategori=kategori.id_kategori";
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td><?= $r['id_subkategori']; ?></td>                        
                        <td><?= $r['kategori']; ?></td>                        
                        <td><?= $r['kode']; ?></td>
                        <td><?= $r['subkategori']; ?></td>               
                        <td align="center">
                          <!--
                            <a href="index.php?p=kategori&id=<?= $r['id_unit']; ?>"><span class="fas fa-edit"></span></a>
                            &nbsp;
                            <a href="aksi_kategori_hapus.php?id=<?= $r['id_unit']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><span class="fas fa-trash"></span></a>
                            &nbsp;   -->                         
                        </td>
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID </th>
                    <th>Kategori</th>
                    <th>Kode Subkategori</th>
                    <th>Subkategori</th>                    
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table><br>
                <!--<a href="index.php?p=addunitkerja">
                  <button type="button" class="btn btn-primary btn-block"><i class="fa fa-file"></i> Tambah</button>
                </a>-->
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
    