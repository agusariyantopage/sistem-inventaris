<?php
session_start();
include '../../koneksi.php';


//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('YDP');
$pdf->SetTitle('NERACA ASET');
$pdf->SetSubject('Cetak Rekap');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

$pdf->AddPage();
$html ='<p align="center"><b>NERACA ASET</b></p>';
$html.='<table>';
$sql="select * from kategori";
$perintah=mysqli_query($koneksi,$sql);
$total=0;
while ($r=mysqli_fetch_array($perintah)) { 
    $html.='
        <tr><td colspan=2><b>'.$r['kategori'].'</b></td></tr>
    ';
    $id_kategori=$r['id_kategori'];
    $sql2="select * from subkategori where id_kategori=$id_kategori";
    $perintah2=mysqli_query($koneksi,$sql2);

    while ($r2=mysqli_fetch_array($perintah2)) {
        $html.='
        <tr><td width="50%">'.$r2['subkategori'].'</td>
        ';
        $id_subkategori=$r2['id_subkategori'];
        if($_SESSION['level']==1) {
            $sql3="select sum(nilai_perolehan) as total from barang_detail,barang where barang_detail.id_barang=barang.id_barang and id_subkategori=$id_subkategori";
        } else {
            $id_unit= $_SESSION['idunit'];
            $sql3="select sum(nilai_perolehan) as total from barang_detail,barang where barang_detail.id_barang=barang.id_barang and id_subkategori=$id_subkategori and barang_detail.id_unitkerja=$id_unit";
        }

        //$sql3="select sum(nilai_perolehan) as total from barang_detail,barang where barang_detail.id_barang=barang.id_barang and id_subkategori=$id_subkategori";
        $perintah3=mysqli_query($koneksi,$sql3);
        $r3=mysqli_fetch_array($perintah3);
        $total_subkategori=$r3['total'];
        $html.='
        <td align="right">Rp. '.number_format($total_subkategori).'</td></tr>
        ';
        $total=$total+$total_subkategori;
    }

}
$html.='
<tr><td width="50%"><b>NILAI TOTAL ASET</b></td><td align="right"><b>Rp. '.number_format($total).'</b></td></tr>
';


$pdf->writeHTML($html, true, true, true, true, '');

//Close and output PDF document
$nama_file="rekap_aset_".date('Y_m_d_H_i_s').".pdf";
$pdf->Output($nama_file, 'I');

//============================================================+
// END OF FILE
//============================================================+
