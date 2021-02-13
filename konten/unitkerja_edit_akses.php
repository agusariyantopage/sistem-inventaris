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
                <h3 class="card-title">Formulir Pengaturan Akses Unit</h3>
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
						<form method="post" action="aksi_unitkerja_edit_akses.php">
							<input type="hidden" name="idunit" value="<?= $kolom['id_unit']; ?>">
							<div class="form-group">
								<label for="namapanjang">Unit Kerja</label>
								<input readonly="" type="text" value="<?= $kolom['nama_panjang']; ?>" name="namapanjang" required="" id="namapanjang" placeholder="Masukkan Nama Panjang . . ." class="form-control">
							</div>
							<div class="form-group">
								<label for="username">Buka Akses Input Data Awal</label>
								<select class="form-control" name="finalda" id="finalda" required="">
									<?php 
									if($kolom['final_data_awal']==1){
										echo "
										<option value='1' selected>Tidak</option>
										<option value='0'>Ya</option>
										";
									} else {
										echo "
										<option value='0' selected>Ya</option>
										
										";
									}	
									 ?>
									
								</select>	
							</div>
							<div class="form-group">
								<label for="password">Buka Akses Upload SPTJM Data Awal</label>
								<select class="form-control" name="uploadda" id="uploadda" required="">
									<?php 
									if($kolom['file_sk_data_awal']!=''){
										echo "
										<option value='1' selected>Tidak</option>
										<option value='0'>Ya</option>
										";
									} else {
										echo "
										<option value='0' selected>Ya</option>
										
										";
									}	
									 ?>
								</select>
							</div>										
							<button type="submit" onclick="return confirm('Apakah Anda Yakin Akan Melanjutkan Perintah Ini?')" class="btn btn-primary">Simpan</button>

						</form>
					</div>		
			</div>
			</div>			
		</div>


	</div>
  	<!-- /.container-fluid -->
</section>
<!-- Main content -->