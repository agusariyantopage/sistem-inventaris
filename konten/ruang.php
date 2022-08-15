<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Ruang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Ruang</a></li>
          <li class="breadcrumb-item active">Data Ruang</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Ruang</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Pemilik</th>
                  <th>Kode Ruang</th>
                  <th>Nama Ruang</th>
                  <th>Lantai Ke</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "select ruang.*,nama_panjang from ruang,unit_kerja where ruang.id_unit_kerja=unit_kerja.id_unit";
                $perintah = mysqli_query($koneksi, $sql);
                while ($r = mysqli_fetch_array($perintah)) {
                ?>
                  <tr>
                    <td><?= $r['id_ruang']; ?></td>
                    <td><?= $r['nama_panjang']; ?></td>
                    <td><?= $r['kode_ruang']; ?></td>
                    <td><?= $r['nama_ruang']; ?></td>
                    <td><?= $r['lokasi_lantai']; ?></td>
                    <td align="center">
                      <button type="button" class="btn btn-link ubahruang" data-toggle="modal" data-target="#ubahModal" data-id="<?= $r['id_ruang']; ?>"><i class="fas fa-edit"></i></button>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>

            </table><br>
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file"></i> Tambah</button>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- Main content -->

<!-- Modal Tambah Ruang -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Ruang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/ruang.php" method="POST">
          <input type="hidden" name="aksi" value="tambah">
          <label for="id_unit_kerja">Pemilik Ruang</label>
          <select class="form-control" name="id_unit_kerja" id="idunitkerja" required="">
            <option value="">-- Pilih Pemilik Ruang --</option>
            <?php
            if ($_SESSION['level'] == 1) {

            ?>
              <?php
              $sql = "select * from unit_kerja order by nama_panjang";
              $perintah = mysqli_query($koneksi, $sql);
              while ($r = mysqli_fetch_array($perintah)) {
              ?>
                <option value="<?= $r['id_unit']; ?>"><?= $r['nama_panjang']; ?></option>
              <?php
              }
              ?>

            <?php
            } else {
              $id_unit = $_SESSION['idunit'];
              $nama_unit = $_SESSION['namalengkap'];
              echo "<option value='$id_unit'>$nama_unit</option>";
            }
            ?>
          </select>

          <label for="kode_ruang">Kode Ruang</label>
          <input type="text" name="kode_ruang" class="form-control" value="" required>

          <label for="nama_ruang">Nama Ruang</label>
          <input type="text" name="nama_ruang" class="form-control" required>

          <label for="deskripsi">Deskripsi</label>
          <textarea name="deskripsi" rows="3" class="form-control"></textarea>

          <label for="lokasi_lantai">Lantai Ke</label>
          <input type="text" name="lokasi_lantai" class="form-control" required>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ubah Ruang -->
<div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Ubah Ruang</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ubah-ruang">
        <div class="ubah-ruang"></div>
      </div>
      <div class="modal-footer">


      </div>
    </div>
  </div>
</div>