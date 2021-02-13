<?php
  //$lokasi=$_POST['lokasi'];
  //$catatan=$_POST['catatan'];
  if (empty($_GET['lokasi'])){
    include "konten/inventarisgroupadd_1.php";
  } else {
  $idunitkerja=$_GET['idunitkerja'];
  $lokasi=$_GET['lokasi'];
  $catatan=$_GET['catatan'];

  //echo $lokasi;
  //echo $catatan;
?>
  <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Input Inventaris Pada Lokasi : <b><?= $lokasi; ?></b></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
                <li class="breadcrumb-item"><a href="#">Input Inventaris</a></li>
                <li class="breadcrumb-item active">Input Per Lokasi</li
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
                  <h3 class="card-title">Tentukan Lokasi Barang |<b> Tentukan Jumlah Per Item</b></h3>
                </div> 
                <!-- /.card-header -->
                <div class="card-body">
                  <form method="post" action="aksi_inventaris_add_group.php">
                  <div style="overflow-x:auto;">
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID </th>
                      <th>Deskripsi</th>
                      <th style="width: 100px; min-width: 100px;" >Baik</th>
                      <th style="width: 100px; min-width: 100px;">Rusak</th>
                      <th>Kategori</th>
                      <th>Subkategori</th>                    
                      <th>Spesifikasi</th>                    
                      
                    </tr>
                    </thead>
                    
                    <tbody>
                      <?php
                        $sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori order by deskripsi";
                        $no=0;
                        $perintah=mysqli_query($koneksi,$sql);
                        while ($r=mysqli_fetch_array($perintah)) {     
                      ?>  
                                    
                        <tr>  
                          <input type="hidden" name="id[]" value="<?= $r['id_barang']; ?>">
                          <td><?= $r['id_barang']; ?></td>                        
                          <td><?= $r['deskripsi']; ?></td>
                          <td align="center">
                              <input class="form-control" type="number" name="qty_baik[]" value="0">                            
                          </td>
                          <td align="center">
                              <input class="form-control" type="number" name="qty_rusak[]" value="0">
                          </td>                        
                          <td><?= $r['kategori']; ?></td>
                          <td><?= $r['subkategori']; ?></td>                        
                          <td><?= $r['spesifikasi']; ?></td>              
                          
                        </tr>
                    <?php
                      $no++;
                      }
                    ?>                     
                    </tbody>
                    <input type="hidden" name="idunitkerja" value="<?= $idunitkerja; ?>">
                    <input type="hidden" name="lokasi" value="<?= $lokasi; ?>">
                    <input type="hidden" name="catatan" value="<?= $catatan; ?>">
                    <input type="hidden" name="max" value="<?= $no; ?>">
                    <button type="submit" class="btn mb-2 btn-primary" onclick="return confirm('Pastikan Data Yang Anda Masukkan Sudah Benar,Apakah Anda Yakin Akan Melanjutkan?')">Simpan</button>
                    </form>
                    
                  </table>
                  </div>
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
<?php 
  } // Tutup Else Line 6
 ?>