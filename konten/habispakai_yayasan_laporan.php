<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan Belanja Bahan Habis Pakai</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Habis Pakai</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Belanja Habis Pakai</h3>
                        <div class="flash-data" data-flashdata="<?= Flasher::message() ?>"></div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Unit</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th>Pengajuan</th>
                                    <th>Realisasi</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select habispakai_detail.*,barang_habispakai.deskripsi,habispakai.*,nama_panjang from habispakai_detail,barang_habispakai,habispakai,unit_kerja where  barang_habispakai.id_barang_habispakai=habispakai_detail.id_barang_habispakai and habispakai_detail.id_habispakai=habispakai.id_habispakai and habispakai.id_unit=unit_kerja.id_unit and habispakai.status='Disetujui'";
                                $perintah = mysqli_query($koneksi, $sql);
                                while ($r = mysqli_fetch_array($perintah)) {
                                ?>
                                    <tr>
                                        <td><?= $r['id_habispakai_detail']; ?></td>
                                        <td><?= $r['nama_panjang']; ?></td>
                                        <td><?= $r['tgl_setuju']; ?></td>
                                        <td><?= $r['deskripsi']; ?></td>
                                        <td><?= $r['jumlah']; ?></td>
                                        <td><?= $r['jumlah_realisasi']; ?></td>
                                        <td align="right"><?= number_format($r['harga']); ?></td>
                                        <td><?= number_format($r['jumlah'] * $r['harga']); ?></td>
                                        
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