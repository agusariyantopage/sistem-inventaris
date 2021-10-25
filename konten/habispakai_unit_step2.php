<?php 
  $id=$_SESSION['idunit'];
	$sq="select * from habispakai where final=0 and id_unit=$id";
	$pr=mysqli_query($koneksi,$sq);
	$r=mysqli_fetch_array($pr); 
	if(mysqli_num_rows($pr)<=0){
	  $id_tambah=0;
	} else {
	  $id_tambah=$r['id_habispakai'];  
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
                <div class="flash-data" data-flashdata="<?= Flasher::message() ?>"></div>               
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <a href="index.php?p=habispakai-step3"><button type="button" class="btn mt-2 mb-2 btn-primary">Tambah Item</button></a> 
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
                      <th>Subtotal</th>
                      <th>Hapus</th>                      
                    </tr>";
                  ?>
                  <?= $thead; ?>
                  </thead>
                  <tbody>
                    <?php
                      $sql="select habispakai_detail.*,deskripsi,satuan from barang_habispakai,habispakai_detail where barang_habispakai.id_barang_habispakai=habispakai_detail.id_barang_habispakai and id_habispakai=$id_tambah order by deskripsi";
                      $perintah=mysqli_query($koneksi,$sql);
                      $total=0;
                      while ($r=mysqli_fetch_array($perintah)) {  
                         $total=$total+($r['jumlah']*$r['harga']); 
                    ?>              
                      <tr>                          
                          <td><?= $r['deskripsi']; ?></td>                   
                          <td><?= $r['satuan']; ?></td>                   
                          <td align="right"><?= number_format($r['harga']); ?></td>                   
                          <td align="right"><?= number_format($r['jumlah']); ?></td>
                          <td align="right"><?= number_format($r['jumlah']*$r['harga']); ?></td>
                          <td>&nbsp;
                            <a href="aksi_habispakai_hapus.php?id=<?= $r['id_habispakai_detail']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><span class="fas fa-trash"></span></a></td>                   
                      </tr>
                  <?php
                    }
                  ?>                     
                  
                  <tr>
                    <td align="center" colspan=4><b>Grandtotal</b></td>
                    <td align="right" colspan=2><b>Rp. <?= number_format($total); ?></b></td>
                  </tr>
                  </tbody>
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
    