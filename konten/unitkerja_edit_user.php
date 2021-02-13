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
                <h3 class="card-title">Formulir Ubah Login Unit Kerja</h3>
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
						<form method="post" action="aksi_unitkerja_edit_password.php">
							<input type="hidden" name="idunit" value="<?= $kolom['id_unit']; ?>">
							<div class="form-group">
								<label for="namapanjang">Unit Kerja</label>
								<input readonly="" type="text" value="<?= $kolom['nama_panjang']; ?>" name="namapanjang" required="" id="namapanjang" placeholder="Masukkan Nama Panjang . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" value="<?= $kolom['username']; ?>"
								name="username" required="" id="username" placeholder="Masukkan Username . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="text" value="<?= $kolom['password']; ?>" name="password" required="" id="password" placeholder="Masukkan Password . . ." class="form-control">
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