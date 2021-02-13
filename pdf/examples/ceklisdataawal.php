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
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Verifikasi Data Awal');
$pdf->SetSubject('TCPDF Tutorial');
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
$html ='<b>Cek List Data Awal Inventaris</b>';
if($_SESSION['level']==1) {
    $sql1="select barang_detail.*,barang.*,nama_panjang,COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja GROUP BY barang_detail.id_unitkerja,lokasi";
  } else {
    $id_unit= $_SESSION['idunit'];
    $sql1="select barang_detail.*,barang.*,nama_panjang,COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja and barang_detail.id_unitkerja=$id_unit GROUP BY barang_detail.id_unitkerja,lokasi";
  }
  // -- Akses Yayasan / Unit Kerja  
  //echo $sql;
  $perintah1=mysqli_query($koneksi,$sql1);
  while ($r1=mysqli_fetch_array($perintah1)) { 
  	$lok=$r1['lokasi'];
  	$idu=$r1['id_unitkerja'];
	$html.='<br><br>Unit Kerja/Lokasi : '.$r1['nama_panjang'].'/'.$r1['lokasi'].'<br><br>';

	$html.='<table style=" border-collapse: collapse;" border="1">
	<tr>
	    <th width="5%"  align="center" rowspan="2">No</th>                
	    <th width="40%"  align="center" rowspan="2">Deskripsi</th>    
	    <th width="45%" colspan="6" style="text-align:center;">Jumlah Barang</th> 
	    <th width="10%" align="center" rowspan="2">Valid</th>    
	</tr>
	<tr>
	    <th align="center">Baik</th>
	    <th align="center">Rev</th>
	    <th align="center">Rusak</th>
	    <th align="center">Rev</th>                   
	    <th align="center">Total</th>
	    <th align="center">Rev</th>                    
	</tr>

	';
	if($_SESSION['level']==1) {
	    $sql="select barang_detail.*,barang.*,nama_panjang,COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja and lokasi='$lok' and barang_detail.id_unitkerja=$idu GROUP BY barang_detail.id_barang,barang_detail.id_unitkerja,lokasi order by deskripsi";
	  } else {
	    $id_unit= $_SESSION['idunit'];
	    $sql="select barang_detail.*,barang.*,nama_panjang,COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja and barang_detail.id_unitkerja=$id_unit and lokasi='$lok' GROUP BY barang_detail.id_barang,barang_detail.id_unitkerja,lokasi order by deskripsi";
	  }
	  // -- Akses Yayasan / Unit Kerja  
	  //echo $sql;
	  $perintah=mysqli_query($koneksi,$sql);
	  $no=1;	
	  while ($r=mysqli_fetch_array($perintah)) { 	  	 
		 $tot=$r['qty_baik']+$r['qty_rusak'];
		 $html.='<tr>
		  	<td>'.$no.'</td>
		    <td>'.$r['deskripsi'].'</td>
		    <td align="right">'.$r['qty_baik'].'</td>
		    <td></td>
		    <td align="right">'.$r['qty_rusak'].'</td>
		    <td></td>
		    <td align="right">'.$tot.'</td>
		    <td></td>
		    <td></td>
			</tr>';
			$no++;
	}
	$html.='</table><p>
	<i>1) Kolom Rev diisi dengan jumlah yang sesuai bila terjadi perbedaan data
<br>2) Kolom Valid disi dengan tanda &#8730; bila data sudah sesuai
	</p>';
}


$pdf->writeHTML($html, true, true, true, true, '');
//$pdf->writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('ceklisdatawal.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
