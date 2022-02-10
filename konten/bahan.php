<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bahan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
              <li class="breadcrumb-item active">Bahan</li>
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
                <h3 class="card-title">Data Bahan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="flash-data" data-flashdata="<?= Flasher::message() ?>"></div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <?php
                      $thead="<th>ID </th>
                      <th>Deskripsi</th>
                      <th>Spesifikasi</th>
                      <th>Satuan</th>
                      <th>Perubahan Terakhir</th>
                      <th>Aksi</th>"; 
                      echo $thead;
                    ?>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql="select * from barang_habispakai";
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td><?= $r['id_barang_habispakai']; ?></td>                        
                        <td><?= $r['deskripsi']; ?></td>                        
                        <td><?= $r['spesifikasi']; ?></td>
                        <td><?= $r['satuan']; ?></td>
                        <td><?= $r['update_terakhir']; ?></td>                                      
                        <td align="center">
                            <a href="index.php?p=editbahan&id=<?= $r['id_barang_habispakai']; ?>"><span class="fas fa-edit"></span></a>
                            &nbsp;
                            <a href="aksi_bahan_hapus.php?id=<?= $r['id_barang_habispakai']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini? (hanya bisa dihapus jika data tidak memiliki data turunan)')"><span class="fas fa-trash"></span></a>
                            &nbsp;                                                           
                        </td>
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <tr>
                    <?= $thead; ?>
                  </tr>
                  </tfoot>
                </table><br>
                <a href="index.php?p=addbahan">
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
    