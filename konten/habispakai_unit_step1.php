<?php
// Ambil ID Hapus Terakhir
$id=$_SESSION['idunit'];
$sq="select * from habispakai where id_unit=$id and final=0";
$pr=mysqli_query($koneksi,$sq);
$r=mysqli_fetch_array($pr); 
if(mysqli_num_rows($pr)>=1){  
  include "konten/tambahitem_mandiri_step4.php";
} else { // Menampilkan Isi Jika Belum Ada Pengajuan Yang Eksis
   

?>


<!-- Tampilan Ubah Tabel Pelanggan -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pelaporan Penggunaan Bahan Habis Pakai</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Barang Habis Pakai</a></li>                          
            <li class="breadcrumb-item"><a href="index.php?p=habispakai">Pelaporan</a></li> 
            <li class="breadcrumb-item active">Step 1</li>
          </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
  
<section class="content">
    <div class="container-fluid"> 
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lengkapi Formulir Dibawah Ini</h3>
              </div>    
              
                <div class="card-body">
            <!-- Isian Form -->
            <form method="post" action="aksi_habispakai_step1.php">
              <input name="p" id="p" type="hidden" value="inventarisgroup-step2">
              <div class="form-group">
                <label for="idunitkerja">Unit Kerja</label>
                <select class="form-control" name="idunitkerja" id="idunitkerja" required="">
                <?php
                if($_SESSION['level']==1) {
                    
                ?>
                  <?php
                  $sql="select * from unit_kerja order by nama_panjang";
                  $perintah=mysqli_query($koneksi,$sql);
                  while ($r=mysqli_fetch_array($perintah))  {  
                  ?>
                    <option value="<?= $r['id_unit']; ?>"><?= $r['nama_panjang']; ?></option>
                  <?php  
                                        }
                  ?>                                    
                  
                <?php 
                } else {
                  $id_unit= $_SESSION['idunit'];
                  $nama_unit= $_SESSION['namalengkap'];
                  echo "<option value='$id_unit'>$nama_unit</option>";
    
                }
                 ?>
                 </select>  
              </div>
              <div class="form-group">
                <label for="periodepakai">Periode Pemakaian Barang</label> <!-- Dari Sampai Penerimaan Melampirkan Nomor Nota Tanggal dan Nama Supplier -->
                <select class="form-control" name="periodepakai" id="periodepakai" required="">
                  <option>Tidak Terduga</option>
                  <option>Mingguan</option>
                  <option>Bulanan</option>
                  <option>Semester</option>
                  <option>Tahunan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="tglawalpakai">Tanggal Awal Pemakaian</label>
                <input  type="date" name="tglawalpakai" id="tglawalpakai" placeholder="Masukkan tanggal awal pemakaian barang . . ." required class="form-control">
              </div>
              <div class="form-group">
                <label for="tglakhirpakai">Tanggal Akhir Pemakaian</label>
                <input  type="date" name="tglakhirpakai" id="tglakhirpakai" placeholder="Masukkan tanggal akhir pemakaian barang . . ." required class="form-control">
              </div>    
              <div class="form-group">
                <label for="sumber">Sumber Pendanaan</label>
                <input  type="text" name="sumber" id="sumber" placeholder="Masukkan sumber pengadaan seperti Mandiri/Bantuan/Sponsorship/DST . . ." required class="form-control">
              </div>              
              <div class="form-group">
                <label for="sumber">Keterangan</label>
                <textarea name="ketsumber" id="ketsumber" placeholder="Masukkan keterangan tambahan seperti nama supplier / nomor sk bantuan / dst  . . ." required rows="3" class="form-control"></textarea>
              </div>              
              <div class="form-group">
                <label for="tglterima">Tanggal Perkiraan Terima Barang</label>
                <input  type="date" name="tglterima" id="tglterima" placeholder="Masukkan tanggal terima barang . . ." required class="form-control">
              </div>  
              <div class="form-group">
                <label for="pengaju">Di Ajukan Oleh</label>
                <input  type="text" name="pengaju" id="pengaju" placeholder="Masukkan nama pengaju pembelian . . ." required class="form-control">
              </div>
              <div class="form-group">
                <label for="penanggung">Penanggung Jawab</label>
                <input  type="text" name="penanggung" id="penanggung" placeholder="Masukkan nama penanggung jawab pembelian . . ." required="" class="form-control">
              </div>            
              <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
          </div>    
      </div>
      </div>      
    </div>


  </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<?php
}
?>