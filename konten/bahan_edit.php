<?php
$id=$_GET['id'];
$sql1="select * from barang_habispakai where id_barang_habispakai=$id";
$perintah1=mysqli_query($koneksi,$sql1);
$r1=mysqli_fetch_array($perintah1);
?>

<!-- Tampilan Ubah Tabel Pelanggan -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0">Ubah Barang Habis Pakai</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
		      <li class="breadcrumb-item"><a href="index.php?p=bahan">Barang Habis Pakai</a></li>
		      <li class="breadcrumb-item active">Ubah Barang Habis Pakai</li>
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
                <h3 class="card-title">Formulir Ubah Barang Habis Pakai</h3>
				
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
						<form method="post" action="aksi_bahan_edit.php">	
							<input name="id" id="id" type="hidden" value="<?= $r1['id_barang_habispakai']; ?>">									
							<div class="form-group">
								<label for="deskripsi">Deskripsi Barang Habis Pakai</label>
								<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Berisi Keterangan Deskripsi Bahan Contoh : Kertas HVS A4" required=""><?= $r1['deskripsi']; ?></textarea>	
							</div>							
							<div class="form-group">
								<label for="satuan">Satuan</label>
								<input type="text" value="<?= $r1['satuan']; ?>" name="satuan" id="satuan" placeholder="Masukkan Satuan . . ." class="form-control" required="">
							</div>
							<div class="form-group">
								<label for="spesifikasi">Spesifikasi</label>
								<textarea class="form-control" name="spesifikasi" id="spesifikasi" rows="3" placeholder="Berisi Keterangan Spesifikasi . . ."><?= $r1['spesifikasi']; ?></textarea>	
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