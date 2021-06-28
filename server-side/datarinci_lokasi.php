<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
session_start();
require '../koneksi.php';

if($_SESSION['jenisakses']=='Yayasan') {
	$view_name='view_data_rinci_00';
    $sql="create VIEW ".$view_name." as select barang_detail.*,deskripsi,spesifikasi,nama_panjang from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja";
  } else {
    $id_unit= $_SESSION['idunit'];
	$view_name='view_data_rinci_'.$id_unit;
	$lok=$_SESSION['lok'];
    //$sql="select barang_detail.*,barang.*,nama_panjang from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja and barang_detail.id_unitkerja=$id_unit";
    $sql="create VIEW ".$view_name." as select barang_detail.*,deskripsi,spesifikasi,nama_panjang from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja and barang_detail.id_unitkerja=$id_unit and md5(lokasi)='$lok'";
    
  }
  $sql1='drop view '.$view_name;
  //echo $sql;
  mysqli_query($koneksi,$sql1);
  mysqli_query($koneksi,$sql);

// DB table to use
$table = $view_name;

// Table's primary key
$primaryKey = 'id_barang_detail';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'id_barang_detail', 'dt' => 0 ),
	array( 'db' => 'deskripsi',  'dt' => 1 ),
	array( 'db' => 'spesifikasi',   'dt' => 2 ),
    array(
		'db'        => 'kondisi',
		'dt'        => 3,
		'formatter' => function( $d, $row ) {
			if($d == 'Baik'){
                return "<span class='badge badge-success'>Baik</span>";
            }else{
                return "<span class='badge badge-danger'>Rusak</span>";
            }
        
		}
	),
	//array( 'db' => 'kondisi',     'dt' => 3 ),
	array( 'db' => 'nama_panjang',     'dt' => 4 ),
	array( 'db' => 'lokasi',     'dt' => 5 ),
	array(
		'db'        => 'kondisi',
		'dt'        => 6,
		'formatter' => function( $d, $row ) {
			return '<a href="aksi_tambahbcode.php?id='.$row[0].'"> <i class="fas fa-check-circle"></i></a>';       
        
		}
	)
	//array( 'db' => 'catatan',     'dt' => 6 )	
);

// SQL server connection information
$sql_details = array(
	'user' => DB_USER,
	'pass' => DB_PASS,
	'db'   => DB_NAME,
	'host' => DB_HOST
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


