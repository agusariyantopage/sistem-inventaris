<?php
  $id=$_SESSION['idunit'];
  $perintah="select * from unit_kerja where id_unit='$id'";
  $sql=mysqli_query($koneksi,$perintah);
  $kolom=mysqli_fetch_array($sql);
?>
<!-- Tampilan Tambah Tabel Pelanggan -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0">Ubah Profil Unit Kerja</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="#">Home</a></li>		      
		      <li class="breadcrumb-item active">Ubah Profil Unit Kerja</li>
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
                <h3 class="card-title">Formulir Ubah Profil dan Akun Unit Kerja</h3>
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
<?php 
	if(!empty($_GET['sts1'])){
		$sts1=$_GET['sts1'];
		$sts2=$_GET['sts2'];

		echo "<span class='badge badge-success'><i class='nav-icon fas fa-check'></i> Perubahan Profil Berhasil</span>  ";

		if($sts2=='failed'){
			echo "<span class='badge badge-danger'><i class='nav-icon fas fa-times'></i> Perubahan Password Gagal</span>  ";	
		} elseif($sts2=='ok'){
			echo "<span class='badge badge-success'><i class='nav-icon fas fa-check'></i> Perubahan Password Berhasil</span>  ";
		}

	}
 ?>						
						
						<form method="post" action="aksi_changeprofil.php">
							<input type="hidden" name="idunit" value="<?= $kolom['id_unit']; ?>">
							<div class="form-group">
								<label for="kode">Kode</label>
								<input readonly="" type="text" value="<?= $kolom['kode']; ?>" name="kode" required="" id="kode" placeholder="Masukkan Kode . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="namasingkat">Nama Singkat</label>
								<input readonly="" type="text" value="<?= $kolom['nama_singkat']; ?>" name="namasingkat" required="" id="namasingkat" placeholder="Masukkan Nama Singkat . . ." class="form-control">
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
							<hr>
							<b>Perubahan Akun Login</b><br><i>Catatan : Perubahan Akan Berhasil Hanya Jika Password Lama Yang Anda Masukkan Benar</i>
							<hr>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" readonly="" value="<?= $kolom['username']; ?>"
								name="username" required="" id="username" placeholder="Masukkan Username . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Password Lama</label>
								<input type="password" name="password" id="password" placeholder="Masukkan Password . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="newpassword">Password Baru</label>
								<input type="password" name="newpassword" id="newpassword" placeholder="Masukkan Password . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="renewpassword">Ulangi Password Baru</label>
								<input type="password" name="renewpassword" id="renewpassword" placeholder="Masukkan Password . . ." class="form-control">
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