<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Penjadwalan Ruang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Ruang</a></li>
          <li class="breadcrumb-item active">Penjadwalan Ruang</li>
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
            <h3 class="card-title">Penjadwalan Ruang</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file"></i> Tambah Jadwal Penggunaan Ruang</button>
            <table id="input-group" class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th class="text-center align-middle" rowspan="2">Ruang</th>
                  <th class="text-center" colspan="24">Jam</th>
                </tr>
                <tr>
                  <?php
                  $start = 1;
                  $jk = 24;
                  for ($x = $start; $x <= $jk; $x++) {
                    $number = $x;
                    if ($x < 10) {
                      $number = "0" . $x;
                    }

                    echo "<th class='text-center col-md-1 col-auto'>" . $number . "</th>";
                  }
                  ?>

                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "select ruang.*,nama_panjang from ruang,unit_kerja where ruang.id_unit_kerja=unit_kerja.id_unit order by kode_ruang";
                $perintah = mysqli_query($koneksi, $sql);
                while ($r = mysqli_fetch_array($perintah)) {
                  $id_ruang = $r['id_ruang'];
                ?>
                  <tr>
                    <td><?= $r['kode_ruang']; ?></td>
                    <?php
                    for ($x = $start; $x <= $jk; $x++) {
                      $number = $x;
                      if ($x < 10) {
                        $number = "0" . $x;
                      }
                      $time = $number . ':00:00';
                      $sql_plot = "SELECT * FROM ruang_plot WHERE id_ruang=$id_ruang AND ('$time' BETWEEN jam_mulai AND jam_selesai)";
                      $query_plot = mysqli_query($koneksi, $sql_plot);
                      $ketemu = mysqli_num_rows($query_plot);

                      if ($ketemu >= 1) {
                        //$r_plot=mysqli_fetch_array($query_plot);
                        echo "<td class='text-center text-small' bgcolor='red'><a href='#' class='text-dark'><i class='fas fa-search'></i></a></td>";
                      } else {
                        echo "<td class='text-center' bgcolor='green'></td>";
                      }
                    }
                    ?>

                  </tr>
                <?php
                }
                ?>
              </tbody>

            </table><br>


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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Penggunaan Ruang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/ruang_plot.php" method="POST">
          <input type="hidden" name="aksi" value="tambah">
          <label for="id_ruang">Ruangan</label>
          <select class="form-control" name="id_ruang" required="">
            <option value="">-- Pilih Ruang --</option>
            <?php

            $sql = "select ruang.*,nama_panjang from ruang,unit_kerja where ruang.id_unit_kerja=unit_kerja.id_unit";
            $perintah = mysqli_query($koneksi, $sql);
            while ($r = mysqli_fetch_array($perintah)) {
            ?>
              <option value="<?= $r['id_ruang']; ?>"><?= $r['nama_ruang']; ?> [<?= $r['nama_panjang']; ?>]</option>
            <?php
            }
            ?>



          </select>

          <label for="tanggal">Tanggal</label>
          <input type="date" name="tanggal" class="form-control" value="" required>

          <label for="jam_mulai">Jam Mulai</label>
          <input type="time" name="jam_mulai" class="form-control" required>

          <label for="jam_selesai">Jam Selesai</label>
          <input type="time" name="jam_selesai" class="form-control" required>

          <label for="pengguna">Pengguna Ruang</label>
          <input type="text" name="pengguna" class="form-control" required>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>