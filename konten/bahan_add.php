<!-- Tampilan Tambah Tabel Pelanggan -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0">Tambah Barang Habis Pakai</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
		      <li class="breadcrumb-item"><a href="index.php?p=barang">Barang Habis Pakai</a></li>
		      <li class="breadcrumb-item active">Tambah Barang Habis Pakai</li>
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
                <h3 class="card-title">Formulir Tambah Barang Habis Pakai</h3>
				
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
						<form method="post" action="aksi_bahan_add.php">									
							<div class="form-group">
								<label for="deskripsi">Deskripsi Barang Habis Pakai</label>
								<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Berisi Keterangan Deskripsi Bahan Contoh : Kertas HVS A4" required=""></textarea>	
							</div>							
							<div class="form-group">
								<label for="satuan">Satuan</label>
								<input type="text" name="satuan" id="satuan" placeholder="Masukkan Satuan . . ." class="form-control" required="">
							</div>
							<div class="form-group">
								<label for="spesifikasi">Spesifikasi</label>
								<textarea class="form-control" name="spesifikasi" id="spesifikasi" rows="3" placeholder="Berisi Keterangan Spesifikasi . . ."></textarea>	
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