<?php
	include "koneksi.php";

	// Database Versi 2
	
	// Menambahkan tabel tambah (untuk pengajuan inventaris)
	$sql01="CREATE TABLE tambah (
		id_tambah int(11) NOT NULL,
		id_unit int(10) NOT NULL,
		tipe_sumber varchar(150) NOT NULL,
		jenis_tipe_sumber varchar(150) NOT NULL,
		keterangan_tipe_sumber varchar(200) NOT NULL,
		alasan mediumtext NOT NULL,
		pengaju varchar(100) NOT NULL,
		penanggung varchar(100) NOT NULL,
		status varchar(100) NOT NULL DEFAULT 'Sedang Diverifikasi',
		tgl_aju date NOT NULL,
		tgl_setuju date NOT NULL,
		tgl_terima_barang date NOT NULL,
		dibuat_pada datetime NOT NULL DEFAULT current_timestamp(),
		alasan_ditolak text DEFAULT NULL,
		update_terakhir datetime NOT NULL DEFAULT current_timestamp(),
		final int(1) NOT NULL DEFAULT 0
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
	$sql02="ALTER TABLE tambah
	ADD PRIMARY KEY (id_tambah)";
	$sql03="ALTER TABLE tambah MODIFY id_tambah int(11) NOT NULL AUTO_INCREMENT;";
	mysqli_query($koneksi,$sql01);
	mysqli_query($koneksi,$sql02);
	mysqli_query($koneksi,$sql03);

	// Menambahkan tabel tambah_detail (untuk pengajuan inventaris)
	$sql04="CREATE TABLE tambah_detail (
		id_tambah_detail int(11) NOT NULL,
		id_tambah int(10) NOT NULL,
		id_barang int(11) NOT NULL,
		status varchar(20) NOT NULL DEFAULT 'Pending',
		qty int(11) NOT NULL,
		lokasi varchar(100) NOT NULL,
		nilai_perolehan double(17,2) NOT NULL,
		dibuat_pada datetime NOT NULL DEFAULT current_timestamp()
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
	$sql05="ALTER TABLE tambah_detail
	ADD PRIMARY KEY (id_tambah_detail)";
	$sql06="ALTER TABLE tambah_detail
	MODIFY id_tambah_detail int(11) NOT NULL AUTO_INCREMENT";
	mysqli_query($koneksi,$sql04);
	mysqli_query($koneksi,$sql05);
	mysqli_query($koneksi,$sql06);
	$sql07="ALTER TABLE barang_detail ADD id_tambah INT(11) NOT NULL DEFAULT '0' AFTER jam_input, ADD nilai_perolehan INT(15) NOT NULL DEFAULT '0' AFTER id_tambah, ADD perubahan_terakhir DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER nilai_perolehan";
	mysqli_query($koneksi,$sql07);
	$sql08="ALTER TABLE hapus ADD tindak_lanjut TEXT NOT NULL DEFAULT '-' AFTER alasan";
	mysqli_query($koneksi,$sql08);
	$sql09="ALTER TABLE hapus ADD alasan_ditolak TEXT NULL DEFAULT NULL AFTER tgl_setuju";
	mysqli_query($koneksi,$sql09);
	$sql10="CREATE TABLE barang_detail_log ( id_barang_detail_log INT(10) NOT NULL AUTO_INCREMENT ,  id_barang_detail INT(10) NOT NULL ,  id_barang INT(10) NOT NULL ,  perubahan TEXT NOT NULL DEFAULT '-- Tidak Ada Perubahan --' ,  catatan TEXT NOT NULL DEFAULT '-- Tidak Ada Catatan --' ,  tanggal DATE NOT NULL DEFAULT CURRENT_TIMESTAMP ,  waktu_input TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  id_unit INT(10) NOT NULL ,    PRIMARY KEY  (id_barang_detail_log)) ENGINE = InnoDB";
	mysqli_query($koneksi,$sql10);
	$sql11="CREATE TABLE habispakai (
		id_habispakai int(11) NOT NULL,
		id_unit int(10) NOT NULL,
		tipe_sumber varchar(150) NOT NULL,
		keterangan_tipe_sumber varchar(200) NOT NULL,
		pengaju varchar(100) NOT NULL,
		penanggung varchar(100) NOT NULL,
		status varchar(100) NOT NULL DEFAULT 'Sedang Diverifikasi',
		tgl_setuju_hapus date NOT NULL,
		tgl_terima_barang date NOT NULL,
		dibuat_pada datetime NOT NULL DEFAULT current_timestamp(),
		alasan_dihapus text DEFAULT NULL,
		update_terakhir datetime NOT NULL DEFAULT current_timestamp(),
		final int(1) NOT NULL DEFAULT 0
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
	";
	mysqli_query($koneksi,$sql11);
	$sql12="ALTER TABLE habispakai ADD PRIMARY KEY (id_habispakai)";
	mysqli_query($koneksi,$sql12);
	$sql13="ALTER TABLE habispakai MODIFY id_habispakai int(11) NOT NULL AUTO_INCREMENT";
	mysqli_query($koneksi,$sql13);
	
	// Set Tambah Tabel habispakai_detail
	$sql14="CREATE TABLE habispakai_detail (
		id_habispakai_detail int(10) NOT NULL,
		id_habispakai int(10) NOT NULL,
		deskripsi varchar(200) NOT NULL,
		satuan varchar(200) NOT NULL,
		harga int(17) NOT NULL,
		jumlah int(17) NOT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4	
	";
	$sql15="ALTER TABLE habispakai_detail ADD PRIMARY KEY (id_habispakai_detail)";
	$sql16="ALTER TABLE habispakai_detail MODIFY id_habispakai_detail int(10) NOT NULL AUTO_INCREMENT";
	mysqli_query($koneksi,$sql14);
	mysqli_query($koneksi,$sql15);
	mysqli_query($koneksi,$sql16);

	$sql17="CREATE TABLE barang_habispakai ( id_barang_habispakai INT(10) NOT NULL AUTO_INCREMENT , deskripsi VARCHAR(150) NOT NULL ,
	 spesifikasi VARCHAR(150) NOT NULL , satuan VARCHAR(100) NOT NULL , harga DOUBLE(17,2) NOT NULL DEFAULT '0' , update_terakhir DATETIME NOT NULL DEFAULT
	  CURRENT_TIMESTAMP , PRIMARY KEY (id_barang_habispakai)) ENGINE = InnoDB";
	mysqli_query($koneksi,$sql17);  
	
	// Update 11 Mei 2021
	$sql18="ALTER TABLE habispakai_detail	DROP deskripsi,DROP satuan";
	mysqli_query($koneksi,$sql18);
	$sql19="ALTER TABLE habispakai_detail ADD id_barang_habispakai INT(10) NOT NULL AFTER id_habispakai";
	mysqli_query($koneksi,$sql19);
	$sql20="ALTER TABLE tambah ADD diterima INT(1) NOT NULL DEFAULT '0' AFTER final";
	mysqli_query($koneksi,$sql20);
?>