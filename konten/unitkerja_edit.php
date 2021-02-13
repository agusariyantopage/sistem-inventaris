<?php
  $id=$_GET['id'];
  $perintah="select * from unit_kerja where id_unit='$id'";
  $sql=mysqli_query($koneksi,$perintah);
  $kolom=mysqli_fetch_array($sql);
?>
<!-- Tampilan Tambah Tabel Pelanggan -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0">Ubah Unit Kerja</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
		      <li class="breadcrumb-item"><a href="index.php?p=unitkerja">Unit Kerja</a></li>
		      <li class="breadcrumb-item active">Ubah Unit Kerja</li>
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
                <h3 class="card-title">Formulir Ubah Unit Kerja</h3>
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
						<form method="post" action="aksi_unitkerja_edit.php">
							<input type="hidden" name="idunit" value="<?= $kolom['id_unit']; ?>">
							<div class="form-group">
								<label for="kode">Kode</label>
								<input type="text" value="<?= $kolom['kode']; ?>" name="kode" required="" id="kode" placeholder="Masukkan Kode . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="namasingkat">Nama Singkat</label>
								<input type="text" value="<?= $kolom['nama_singkat']; ?>" name="namasingkat" required="" id="namasingkat" placeholder="Masukkan Nama Singkat . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="namapanjang">Nama Panjang</label>
								<input type="text" value="<?= $kolom['nama_panjang']; ?>" name="namapanjang" required="" id="namapanjang" placeholder="Masukkan Nama Panjang . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="namaketum">Nama Ketua Unit</label>
								<input type="text" value="<?= $kolom['nama_pimpinan']; ?>"
								name="namaketum" required="" id="namaketum" placeholder="Masukkan Nama Ketua Unit . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="namakasarpras">Nama Kepala Sarpras</label>
								<input type="text" value="<?= $kolom['nama_kasarpras']; ?>" name="namakasarpras" required="" id="namakasarpras" placeholder="Masukkan Nama Kepala Sarpras . . ." class="form-control">
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