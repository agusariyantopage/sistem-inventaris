<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cetak Barcode</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">                    
                    <li class="breadcrumb-item active">Barcode</li>
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
                        <h3 class="card-title">Pilih Unit Kerja</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="noorder" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Unit Kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "select * from unit_kerja order by nama_panjang";
                                $perintah = mysqli_query($koneksi, $sql);
                                while ($r = mysqli_fetch_array($perintah)) {

                                ?>
                                    <tr>
                                        <td><?= $r['id_unit']; ?></td>
                                        <td><a href="index.php?p=barcode-unit&id=<?= $r['id_unit']; ?>"><?= $r['nama_panjang']; ?></a></td>
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