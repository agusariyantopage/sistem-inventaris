<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pilih Barang Dengan Tekan Tombol Centang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inventaris</a></li>  
            <li class="breadcrumb-item"><a href="index.php?p=tambahitem">Tambah Inventaris</a></li>            
            <li class="breadcrumb-item"><a href="index.php?p=tambahitem-mandiri">Mekanisme Mandiri</a></li> 
            <li class="breadcrumb-item active">Step 2</li>
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
                <h3 class="card-title">Pilih Barang Yang Akan Ditambahkan</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Subkategori</th>
                    <th>Keterangan</th> 
                    <th>Merk</th>
                    <th>Spesifikasi</th>                    
                    <th>Pilih</th>
                  </tr>
                  </thead>
                  <tbody>
                  <i>Note Bila Katalog Barang Belum Terdaftar Tekan Tombol <b>Tambah Katalog Barang</b> Di Bagian Bawah</i>
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
                            <a href="index.php?p=tambahitem-mandiri-step3&id=<?= $r['id_barang']; ?>"><span class="fas fa-check-circle"></span></a>
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
                    <th>Pilih</th>
                  </tr>
                  </tfoot>
                </table><br>
                <a href="index.php?p=addbarang&rd=tambahitem-mandiri-step2">
                  <button type="button" class="btn btn-primary btn-block"><i class="fa fa-file"></i> Tambah Katalog Barang</button>
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
    