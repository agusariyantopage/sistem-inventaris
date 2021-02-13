<?php 
$rd=$_GET['rd'];
 ?>

<!-- Tampilan Tambah Tabel Pelanggan -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0">Tambah Barang</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
		      <li class="breadcrumb-item"><a href="index.php?p=barang">Barang</a></li>
		      <li class="breadcrumb-item active">Tambah Barang</li>
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
                <h3 class="card-title">Formulir Tambah Barang</h3>
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
						<form method="post" action="aksi_barang_add.php">
							<input name="rd" id="rd" type="hidden" value="<?= $rd; ?>">			
							<div class="form-group">
								<label for="deskripsi">Deskripsi Barang</label>
								<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Berisi Keterangan Deskripsi Barang Contoh : Printer HP Deskjet A321 AZ" required=""></textarea>	
							</div>
							<div class="form-group">
								<label for="idsubkategori">Kelompok Barang</label>
								<select class="form-control select2" name="idsubkategori" id="idsubkategori" required="">

									<?php
									$sql="select subkategori.*,kategori from subkategori,kategori where subkategori.id_kategori=kategori.id_kategori order by subkategori";
									$perintah=mysqli_query($koneksi,$sql);
									while ($r=mysqli_fetch_array($perintah)) 	{  
									?>
										<option value="<?= $r['id_subkategori']; ?>"><?= $r['subkategori']; ?></option>
									<?php  
																				}
									?>																		
								</select>
							</div>
							<div class="form-group">
								<label for="merk">Merk</label>
								<input type="text" name="merk" id="merk" placeholder="Masukkan Merk . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="spesifikasi">Spesifikasi Barang</label>
								<textarea class="form-control" name="spesifikasi" id="spesifikasi" rows="3" placeholder="Berisi Keterangan Spesifikasi . . ."></textarea>	
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan Tambahan</label>
								<input type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan Tambahan . . ." class="form-control">
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