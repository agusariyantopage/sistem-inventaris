<?php 
  $id_unit= $_SESSION['idunit'];
  if($id_unit==''){
    $id_unit=0;
  }
  $sql_cekfinalisasi="select * from unit_kerja where id_unit=$id_unit";
  //echo $sql_cekfinalisasi;
  $perintah_cekfinalisasi=mysqli_query($koneksi,$sql_cekfinalisasi);
  if(mysqli_num_rows($perintah_cekfinalisasi)>=1){
    $r_cekfinalisasi=mysqli_fetch_array($perintah_cekfinalisasi);
    $finalda=$r_cekfinalisasi['final_data_awal'];
    $file_sptjm=$r_cekfinalisasi['file_sk_data_awal'];

  } 
    //echo $finalda;
  if($finalda==1){
    include "inventaris_finalisasida_sptjm.php";
  } else {

      // Akses Yayasan / Unit Kerja
      if($_SESSION['level']==1) {
        $sql1="select COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak,COUNT(IF(kondisi = 'Dipinjam', 1, NULL)) as qty_pinjam,COUNT(kondisi) as qty_total from barang_detail";
      } else {
        $id_unit= $_SESSION['idunit'];
        $sql1="select COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak,COUNT(IF(kondisi = 'Dipinjam', 1, NULL)) as qty_pinjam,COUNT(kondisi) as qty_total from barang_detail where barang_detail.id_unitkerja=$id_unit";
        $sql2="select * from barang_detail where id_unitkerja=$id_unit order by id_barang_detail desc limit 1";
        $perintah2=mysqli_query($koneksi,$sql2);
        $r2=mysqli_fetch_array($perintah2);
        $lastupdate=$r2['tanggal_input']." ".$r2['jam_input'];
        $sql3="select * from unit_kerja where id_unit=$id_unit";
        $perintah3=mysqli_query($koneksi,$sql3);
        $r3=mysqli_fetch_array($perintah3);
        $ketum=$r3['nama_pimpinan'];
        $kasarpras=$r3['nama_kasarpras'];
      }
      // -- Akses Yayasan / Unit Kerja
      
      $perintah1=mysqli_query($koneksi,$sql1);
      $r1=mysqli_fetch_array($perintah1);
      if($r1['qty_total'] > 0){
        $qty_baik=$r1['qty_baik'];
        $qty_rusak=$r1['qty_rusak'];
        $qty_pinjam=$r1['qty_pinjam'];
        $total_item=$r1['qty_total'];
        $Psqty_baik=round($qty_baik/$total_item*100,2);
        $Psqty_rusak=round($qty_rusak/$total_item*100,2);
        $Psqty_pinjam=round($qty_pinjam/$total_item*100,2);
      }  
      else {
        $qty_baik=0;
        $qty_rusak=0;
        $qty_pinjam=0;
        $total_item=0;
        $Psqty_baik=0;
        $Psqty_rusak=0;
        $Psqty_pinjam=0;
      } 
    ?>
    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Finalisasi Data Awal</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
                  <li class="breadcrumb-item"><a href="#">Input Inventaris</a></li>              
                  <li class="breadcrumb-item active">Finalisasi Data Awal</li>
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
                    <h3 class="card-title">Pernyataan Kebenaran Data</h3>
                  </div>
                   
                  <!-- /.card-header -->
                  <div class="card-body">
                    <p align="justify">Pastikan data awal yang anda input sudah benar sebelum memproses finalisasi data. Dengan menekan tombol <b>Finalisasi</b> pada formulir ini, fitur input inventaris akan ditutup secara permanen . Selanjutnya untuk menambah , mengubah ataupun menghapus inventaris akan dilakukan melalui fitur pengajuan yang prosesnya harus melalui persetujuan/approval dari Yayasan.Silahkan tekan tombol <b>Cetak Ceklis Inventaris</b> untuk mencetak daftar inventaris secara keseluruhan untuk kemudian dapat dilakukan proses verifikasi.</p>
                    <hr>
                    <p>Preview Data <br>
                    <hr>  
                      Jumlah Item Baik : <b><?= $qty_baik; ?> (<?= $Psqty_baik; ?>%)</b><br>
                      Jumlah Item Rusak : <b><?= $qty_rusak; ?> (<?= $Psqty_rusak; ?>%)</b><br>
                      Jumlah Item Terdata: <b><?= $total_item; ?></b><br>
                      Ketua Unit : <b><?= $ketum; ?></b><br>
                      Ketua Bidang Sarana dan Prasarana : <b><?= $kasarpras; ?></b><br>
                      Perubahan Terakhir : <b><?= $lastupdate; ?></b><br>
                    </p>
                    <hr>
                    <a href="aksi_finalisasida.php?token=<?= md5($id_unit); ?>">
                      <button onclick="return confirm('Apakah Anda Yakin Akan Melakukan Proses Finalisasi Data Awal?')" class="btn btn-primary">Finalisasi</button>
                    </a>
                    <a target="blank" href="pdf/examples/ceklisdataawal.php">
                      <button class="btn btn-warning">Cetak Ceklis Inventaris</button>
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
<?php 
}
 ?>        