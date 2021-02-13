<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="aksi_default_item.php"><button class="btn mb-2 btn-primary">Buat Default Item Per Sub Kategori</button></a>  <a href="index.php?p=imporkatalog"><button class="btn mb-2 btn-success">Impor Katalog Barang</button></a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Subkategori</th>
                    <th>Keterangan</th> 
                    <th>Merk</th>
                    <th>Spesifikasi</th>                    
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td><?= $r['id_barang']; ?></td>                        
                        <td><?= $r['deskripsi']; ?></td>                        
                        <td><?= $r['kategori']; ?></td>
                        <td><?= $r['subkategori']; ?></td>
                        <td><?= $r['keterangan']; ?></td>
                        <td><?= $r['merk']; ?></td>
                        <td><?= $r['spesifikasi']; ?></td>              
                        <td align="center">
                            <a href="index.php?p=editbarang&id=<?= $r['id_barang']; ?>"><span class="fas fa-edit"></span></a>
                            &nbsp;
                            <a href="aksi_barang_hapus.php?id=<?= $r['id_barang']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><span class="fas fa-trash"></span></a>
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
                    <th>Kategori</th>
                    <th>Subkategori</th>
                    <th>Keterangan</th> 
                    <th>Merk</th>
                    <th>Spesifikasi</th>                    
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table><br>
                <a href="index.php?p=addbarang&rd=barang">
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
    