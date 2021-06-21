<?php 
  if(empty($_GET['b'])){
    $b=1;
  } else {
    $b=$_GET['b'];
  }
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penggunaan Barang Habis Pakai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Barang Habis Pakai</a></li>                          
              <li class="breadcrumb-item"><a href="index.php?p=habispakai">Pelaporan</a></li> 
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
                <h3 class="card-title">Daftar Barang Habis Pakai</h3>                
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <form method="get" action='index.php'>
                  <input type="hidden" name="p" value="habispakai-step2">
                  <div class="row">
                  <label for="penanggung">Jumlah Jenis Item (Maksimal 20 Jenis Item )</label>
                    <input style="" class="form-control" type="number" step="1" min="1" max="20" name="b" value=<?= $b; ?>>
                    <button type="submit" class="btn mt-2 btn-primary">GO</button> 
                  </div>  
                </form>

                <br>
                <table class="table table-bordered table-striped">
                <form method="post" action="aksi_habispakai_step2.php">
                  <thead>
                  <?php
                  $thead="<tr>
                      <th>Deskripsi </th>
                      <th>Satuan</th>
                      <th>Harga Satuan</th> 
                      <th>Jumlah</th>                      
                    </tr>";
                  ?>
                  <?= $thead; ?>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                     for($x=0;$x<$b;$x++) {     
                    ?>              
                      <tr>
                          <input type="hidden" name ="max[]" value=<?= $b; ?> >
                          <td><input class="form-control" required="" type="text" name="deskripsi[]"></td>                   
                          <td><input class="form-control" required="" type="text" name="satuan[]"></td>                   
                          <td><input class="form-control" required="" type="number" name="harga[]"></td>                   
                          <td><input class="form-control" required="" type="number" name="jumlah[]"></td>                   
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                  <?= $thead; ?>
                  </tfoot>
                </table>
                <br>
                <button type="submit" class="btn mb-2 btn-primary" onclick="return confirm('Pastikan Data Yang Anda Masukkan Sudah Benar,Apakah Anda Yakin Akan Melanjutkan?')">Simpan</button>
                </form>
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
    