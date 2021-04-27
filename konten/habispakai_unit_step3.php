<?php 
  
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Klik Tanda Centang Pada Item Yang Akan Dihapus</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
              <li class="breadcrumb-item"><a href="index.php?p=hapusitem">Hapus Inventaris</a></li>
              <li class="breadcrumb-item active">Hapus Inventaris Step 2</li>
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
                <h3 class="card-title">Penentuan Item Dihapus</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
             
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Spesifikasi</th> 
                    <th>Satuan</th>                    
                    <th>Pilih</th>
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
                        <td align="center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $r['id_barang_habispakai']; ?>">
              <i class="fas fa-check-circle"></i> Pilih
              </button>                                                      
                        </td>
                      </tr>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal<?= $r['id_barang_habispakai']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><b> <?= $r['deskripsi']; ?></b></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body"> 
                              <form action="index.php" id="proses<?= $r['id_barang_habispakai']; ?>" method="post">
                              <div class="form-group">
                                <label for="harga">Harga Per / <?= $r['satuan']; ?></label>
                                <input type="number" name="harga" id="harga" placeholder="Masukkan Harga Satuan . . ." class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="qty">Jumlah(<?= $r['satuan']; ?>)</label>
                                <input type="number" name="qty" id="qty" placeholder="Masukkan Jumlah . . ." class="form-control">
                              </div>        
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary">Proses</button>
                            </div>
                              </form>
                          </div>
                        </div>
                      </div>            
                  <?php
                    }
                  ?>                     
                  </tbody>                 
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

    