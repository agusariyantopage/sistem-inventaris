<?php
    $id = $_GET['id'];
    $_SESSION['idunit']=$id;
    $sql_get_unit="select * from unit_kerja where id_unit=$id";
    $query_get_unit=mysqli_query($koneksi,$sql_get_unit);
    $get_unit=mysqli_fetch_array($query_get_unit);
    $nama_unit=$get_unit['nama_panjang'];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cetak Label</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=barcode">Barcode</a></li>
                    <li class="breadcrumb-item active"><?= $nama_unit; ?></li>
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
                        <h3 class="card-title">Data Lokasi/Ruang Unit Kerja</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>Lokasi/Ruang
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_GET['id'];
                                $sql = "select * from barang_detail where id_unitkerja=$id group by lokasi";
                                // echo $sql;
                                $perintah = mysqli_query($koneksi, $sql);
                                while ($r = mysqli_fetch_array($perintah)) {
                                ?>
                                    <tr>

                                        <td><a href="index.php?p=barcode-by-lokasi&id=<?= $id; ?>&lok=<?= md5($r['lokasi']); ?>"><?= $r['lokasi']; ?></a></td>
                                        <td align="center">
                                            <a target="blank" href="pdf/examples/print-barcode1d-cus.php?lok=<?= md5($r['lokasi']); ?>"><button class="btn btn-info"><i class="fas fa-print"></i> Cetak Barcode</button></a>
                                            &nbsp;
                                            <a target="blank" href="pdf/examples/inventaris_by_ruang_rinci.php?lok=<?= md5($r['lokasi']); ?>"><button class="btn btn-info"><i class="fas fa-print"></i> Cetak Rincian</button></a>
                                            &nbsp;
                                            <a target="blank" href="pdf/examples/inventaris_by_ruang.php?lok=<?= md5($r['lokasi']); ?>"><button class="btn btn-info"><i class="fas fa-print"></i> Cetak Rekap</button></a>
                                            &nbsp;

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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