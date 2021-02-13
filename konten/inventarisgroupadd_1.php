<?php
?>


<!-- Tampilan Ubah Tabel Pelanggan -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0">Tentukan Lokasi dan Catatan Inventaris</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
		      <li class="breadcrumb-item"><a href="#">Input Inventaris</a></li>
		      <li class="breadcrumb-item active">Input Per Lokasi</li>
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
                <h3 class="card-title"><b>Tentukan Lokasi Barang</b> | Tentukan Jumlah Per Item</h3>
              </div>  	
            		<div class="card-body">
						<!-- Isian Form -->
						<form method="get" action="index.php?p=inventarisgroup-step2">
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
									while ($r=mysqli_fetch_array($perintah)) 	{  
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
								<label for="lokasi">Lokasi Barang</label>
								<input  type="text"  pattern="[A-Za-z0-9_ ]+" title="Tidak diperbolehkan menggunakan spesial karakter" required="" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi . . ." class="form-control">
							</div>	
							<div class="form-group">
								<label for="catatan">Catatan</label>
								<input  type="text" name="catatan" id="catatan" placeholder="Masukkan catatan . . ." class="form-control">
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