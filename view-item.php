<?php
  include "koneksi.php";
  if(empty($_GET['id'])){
    $id=0;
  } else {
    $id=$_GET['id'];
  }  
  $sql="select barang_detail.*,barang.*,subkategori,kategori,nama_panjang from barang_detail,barang,kategori,subkategori,unit_kerja where barang_detail.id_barang=barang.id_barang and barang.id_subkategori=subkategori.id_subkategori and subkategori.id_kategori=kategori.id_kategori and barang_detail.id_unitkerja=unit_kerja.id_unit and id_barang_detail=$id";
  //echo $sql;
  $query=mysqli_query($koneksi,$sql);
  $kolom=mysqli_fetch_array($query);
  $ketemu=mysqli_num_rows($query);
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Informasi Detail Barang</title>
  </head>
  <body>
  <section>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Daftar Katalog Inventaris</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!--<li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>-->
      
    </ul>
    <form method="get" class="form-inline my-2 my-lg-0">
      <input name="id" class="form-control mr-sm-2" type="search" placeholder="Pindai Barcode" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  </section>
<?php
  if($ketemu>=1){ // Tampilan Jika Data Ditemukan
?>  
  <div class="card">
    <div class="card-header">
      Rincian Informasi Item
    </div>
    <div class="card-body">
      <img src="img/logo.png" class="img-fluid" alt="...">
      <h5 class="card-title"></h5>
      <div class="card-text">
        <strong>Deskripsi Inventaris</strong>
        <p class="text-muted"><?= $kolom['deskripsi']; ?></p>
        <strong>Kategori</strong>
        <p class="text-muted"><?= $kolom['kategori']; ?></p>
        <strong>Subkategori</strong>
        <p class="text-muted"><?= $kolom['subkategori']; ?></p>
        <strong>Unit Kerja</strong>
        <p class="text-muted"><?= $kolom['nama_panjang']; ?></p>
        <strong>Lokasi</strong>
        <p class="text-muted"><?= $kolom['lokasi']; ?></p>
        <strong>Kondisi</strong>
        <p class="text-muted"><?= $kolom['kondisi']; ?></p>
        <strong>Catatan</strong>
        <p class="text-muted"><?= $kolom['catatan']; ?></p>      
      </div>    
      <a href="#" class="btn btn-primary">Kembali Ke Sistem</a>
    </div>
    <div class="card-footer text-muted">
      Terakhir Di Ubah : <?= $kolom['tanggal_input']; ?> <?= $kolom['jam_input']; ?>
    </div>
  </div>
<?php
  } else { // Tampilan Jika Id Tidak Ditemukan
?>

  <div class="card text-center">
    <div class="card-header">
      Rincian Informasi Item
    </div>
    <div class="card-body">

      <h5 class="card-title"></h5>
      <div class="card-text">
        Maaf Data Yang Anda Cari Tidak Ditemukan Dalam Database / Silahkan Masukkan Id Barang Pada Kolom Pencarian atau silahkan pindai ulang qrcode dari item yang dicari    
      </div>    
      
    </div>
    
  </div>
<?php
  }
?>  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>