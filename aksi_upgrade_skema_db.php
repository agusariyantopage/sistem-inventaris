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
		update_terakhir datetime NOT NULL DEFAULT current_timestamp(),
		final int(1) NOT NULL DEFAULT 0
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
	$sql02="ALTER TABLE tambah
	ADD PRIMARY KEY (id_tambah)";
	$sql03="ALTER TABLE tambah
	MODIFY id_tambah int(11) NOT NULL AUTO_INCREMENT;";
	mysqli_query($koneksi,$sql01);
	mysqli_query($koneksi,$sql02);
	mysqli_query($koneksi,$sql03);

	// Menambahkan tabel tambah_detail (untuk pengajuan inventaris)
	$sql04="CREATE TABLE tambah_detail (
		id_tambah_detail int(11) NOT NULL,
		id_tambah int(10) NOT NULL,
		id_barang int(11) NOT NULL,
		status varchar(20) NOT NULL DEFAULT 'Pending',
		kondisi varchar(100) NOT NULL,
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

	
?>