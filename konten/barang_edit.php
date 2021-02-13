<?php
$id=$_GET['id'];
$sql1="select barang.*,kategori,subkategori from barang,kategori,subkategori where barang.id_subkategori=subkategori.id_subkategori and kategori.id_kategori=subkategori.id_kategori and id_barang=$id";
$perintah1=mysqli_query($koneksi,$sql1);
$r1=mysqli_fetch_array($perintah1);
?>


<!-- Tampilan Ubah Tabel Pelanggan -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0">Ubah Barang</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
		      <li class="breadcrumb-item"><a href="index.php?p=barang">Barang</a></li>
		      <li class="breadcrumb-item active">Ubah Barang</li>
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
                <h3 class="card-title">Formulir Ubah Barang</h3>
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
						<form method="post" action="aksi_barang_edit.php">
							<input name="id" id="id" type="hidden" value="<?= $r1['id_barang']; ?>">
							<div class="form-group">
								<label for="deskripsi">Deskripsi Barang</label>
								<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"required=""><?= $r1['deskripsi']; ?></textarea>	
							</div>
							<div class="form-group">
								<label for="idsubkategori">Kelompok Barang</label>
								<select class="form-control select2" name="idsubkategori" id="idsubkategori" required="">
									<option value="<?= $r1['id_subkategori']; ?>"><?= $r1['subkategori']; ?></option>	
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
								<input value="<?= $r1['merk']; ?>" type="text" name="merk" id="merk" placeholder="Masukkan Merk . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="spesifikasi">Spesifikasi Barang</label>
								<textarea class="form-control" name="spesifikasi" id="spesifikasi" rows="3" placeholder="Berisi Keterangan Spesifikasi . . ."><?= $r1['spesifikasi']; ?></textarea>	
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan Tambahan</label>
								<input value="<?= $r1['keterangan']; ?>" type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan Tambahan . . ." class="form-control">
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