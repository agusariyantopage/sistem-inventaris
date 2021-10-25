<?php 
// Ambil ID Hapus Terakhir
  $id_habispakai=$_GET['id'];
  
  $sql1="select habispakai.*,nama_panjang from unit_kerja,habispakai where unit_kerja.id_unit=habispakai.id_unit and id_habispakai=$id_habispakai";
  $perintah1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($perintah1);
  $status=$r1['status'];

?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Informasi Lengkap Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Habis Pakai</a></li>  
            <li class="breadcrumb-item"><a href="index.php?p=habispakai">Approval Pengajuan</a></li>                       
            <li class="breadcrumb-item active">Rincian Pengajuan</li>
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
                <h3 class="card-title">Informasi Detail Pengajuan</h3>
              </div> 
              <!-- /.card-header -->

              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <label>Unit Kerja</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['nama_panjang']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Waktu Input</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['dibuat_pada']; ?>
                  </div>                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Diajukan Oleh</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['pengaju']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Disetujui Oleh</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['penanggung']; ?>
                  </div>                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Sumber Pembiayaan</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tipe_sumber']; ?>
                  </div>
                  <div class="col-md-3">
                    <label>Keterangan Sumber</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['keterangan_tipe_sumber']; ?>
                  </div>                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Tanggal Perkiraan Terima Barang</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_terima_barang']; ?>
                  </div> 
                  <div class="col-md-3">
                    <label>Periode Pemakaian</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['periode_pakai']; ?>
                  </div>                                  
                </div>  
                <div class="row">
                  <div class="col-md-3">
                    <label>Tanggal Awal Pemakaian</label>  
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_awal_pakai']; ?>
                  </div> 
                  <div class="col-md-3">
                    <label>Tanggal Akhir Pemakaian</label> 
                  </div>
                  <div class="col-md-3">                    
                    <?= $r1['tgl_akhir_pakai']; ?>
                  </div>                                  
                </div>
                
                <br>
                <b>RINCIAN PENGAJUAN</b>
                <table id="input-group" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Deskripsi</th>
                    <th>Jumlah Pengajuan</th> 
                    <th>Jumlah Realisasi</th> 
                    <th>Harga</th>                                       
                    <th>Subtotal</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      
                      $sql="select habispakai_detail.*,barang_habispakai.deskripsi from habispakai_detail,barang_habispakai where  barang_habispakai.id_barang_habispakai=habispakai_detail.id_barang_habispakai and id_habispakai=$id_habispakai";
                      
                      
                      //echo $sql;
                      $perintah=mysqli_query($koneksi,$sql);
                      while ($r=mysqli_fetch_array($perintah)) {     
                    ?>              
                      <tr>
                        <td>
                          <?= $r['id_habispakai_detail']; ?>
                            
                          </td>                        
                        <td><?= $r['deskripsi']; ?></td>                         
                        <td><?= $r['jumlah']; ?></td> 
                        <td><?= $r['jumlah_realisasi']; ?></td> 
                        <td align="right"><?= number_format($r['harga']); ?></td>                         
                        <td><?=  number_format($r['jumlah']*$r['harga']); ?></td> 
                        <td align="center">
                            <?= $r1['status']; ?>                                                       
                        </td>
                      </tr>
                  <?php
                    }
                  ?>                     
                  </tbody>
                  
                </table><br>
                <b>HISTORI REALISASI</b>
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Supplier</th>                   
                    <th>Tanggal Realisasi</th> 
                    <th>Deskripsi</th>
                    <th>Satuan</th>
                    <th>Harga</th> 
                    <th>Jumlah Realisasi</th>                                       
                    <th>Subtotal</th>                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //$sql="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori";
                      // Akses Yayasan / Unit Kerja
                      
                      $sql3="select habispakai_realisasi.*,deskripsi,satuan from barang_habispakai,habispakai_realisasi where barang_habispakai.id_barang_habispakai=habispakai_realisasi.id_barang_habispakai and id_habispakai=$id_habispakai order by deskripsi";
                      $sub=0;
                      // echo $sql3;
                      $perintah3=mysqli_query($koneksi,$sql3);
                      while ($r3=mysqli_fetch_array($perintah3)) {     
                    ?>              
                      <tr>                                           
                        <td><?= $r3['supplier']; ?></td>
                        <td><?= $r3['tgl_realisasi']; ?></td>
                        <td><?= $r3['deskripsi']; ?></td>                         
                        <td><?= $r3['satuan']; ?></td>
                        <td align="right"><?= number_format($r3['harga']); ?></td>                         
                        <td align="right"><?= number_format($r3['jumlah']); ?></td>                        
                        <td align="right"><?= number_format($r3['jumlah']*$r3['harga']); ?></td>
                      </tr>
                  <?php
                    $sub=$sub+($r3['jumlah']*$r3['harga']);
                    }
                  ?>                     
                  </tbody>
                  <tfoot>
                    <td colspan=6 align="center"><b>GRANDTOTAL</b></td>
                    <td align="right"><b><?= number_format($sub); ?></b></td>
                  </tfoot>                 
                </table><br>
                <?php 
                    if($status=='Ditolak'){
                      echo "<form action='#'>                          
                          <div class='form-group'>
                            <label for='alasan'>Alasan Penolakan</label>
                            <textarea readonly='' class='form-control' name='alasan' rows='3'>$r1[alasan_dihapus]</textarea>
                          </div>
                        </form>";

                    }
                    if(empty($_GET['act'])){
                      echo "<a href='index.php?p=habispakai'>
                        <button class='btn btn-success'>Kembali</button>
                      </a>";
                      } elseif($_GET['act']=='hapus'&&$status=='Sedang Diverifikasi'){
                        echo "
                        <form action='aksi_habispakai_tolak.php' method='post'>
                          <input type='hidden' name='id' value=$id_habispakai>
                          <div class='form-group'>
                            <label for='alasan'>Alasan Penolakan</label>
                            <textarea required='' class='form-control' name='alasan' rows='3'></textarea>
                          </div>
                          <button class='btn btn-danger' onclick=\"return confirm('Apakah Anda Yakin Akan Menolak Pengajuan Ini?')\">Tolak</button>
                        </form>";
                      } elseif($_GET['act']=='approve'&&($status!='Disetujui'&&$status!='Ditolak')){
                        echo "<form action='aksi_habispakai_approve.php' method='post'>
                          <input type='hidden' name='id' value=$id_habispakai>
                          <button type='submit' id='submitForm' class='btn btn-info'>Setujui</button>";
                      } else {
                        echo "<a href='index.php?p=habispakai'>
                              <button class='btn btn-success'>Kembali</button>
                              </a>";
                    }
               ?> 
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
<script>
   //$('#submitForm').on('click',function(e){ 
    document.querySelector("#submitForm").addEventListener('click', function(e){       
      e.preventDefault();
      var form = $(this).parents('form');
      Swal.fire({
            title: 'Konfirmasi Approval?',
            text: "Pastikan data sudah benar karena proses tidak akan bisa di batalkan , ketika anda menyetujui pengajuan ini, maka inventaris akan ditambahkan sesuai dengan daftar barang yang diajukan",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Setujui!'            
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
</script>            
            
    