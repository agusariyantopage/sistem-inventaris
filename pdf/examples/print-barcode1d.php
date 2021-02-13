<?php
	session_start();
	include '../../koneksi.php';
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
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
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Yayasan Triatma Surya Jaya');
$pdf->SetTitle('Cetak Barcode 1 D (EAN 19)');
$pdf->SetSubject('Cetak Barcode');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$title="Aplikasi Inventaris Yayasan Triatma Surya Jaya";
$subtitle="Cetak QR-Code Medium Correction Inventaris";
$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, $title, $subtitle);
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$pdf->SetFont('helvetica', '', 10);
$html='<table width:100% border="1">';
// define barcode style
$style = array(
	'position' => '',
	'align' => 'C',
	'stretch' => false,
	'fitwidth' => true,
	'cellfitalign' => '',
	'border' => true,
	'hpadding' => 'auto',
	'vpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => array(255,255,255),//false, 
	'text' => true,
	'font' => 'helvetica',
	'fontsize' => 8,
	'stretchtext' => 4
);

if($_SESSION['level']==1) {
	$sql="select barang_detail.*,barang.*,nama_panjang from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja order by lokasi";
} else {
	$id_unit= $_SESSION['idunit'];
	$sql="select barang_detail.*,barang.*,nama_panjang from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja and barang_detail.id_unitkerja=$id_unit order by lokasi";
}
$perintah=mysqli_query($koneksi,$sql);
$jr=0;
$kolom=3;

while ($r=mysqli_fetch_array($perintah)) { 	
	// EAN 13
	$params = $pdf->serializeTCPDFtagParameters(array($r['id_barang_detail'], 'EAN13', '', '', '', 18, 0.4, array($style), 'N'));
	if ($jr%$kolom==0&&$jr<$kolom){
		$html.='<tr>';	
	} elseif ($jr%$kolom==0&&$jr>=$kolom){
		$html.='</tr><tr>';	
	} 
	
	$html.='<td height="143" align="center">'.$r['id_barang_detail'].'<br><tcpdf method="write1DBarcode" params="'.$params.'" /><br>'.$r['lokasi'].':'.$r['deskripsi'].'</td>';
	$jr=$jr+1;
	
}
$html.='</tr>';
$html.='</table>';
$pdf->writeHTML($html, true, 0, true, 0);	
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('print-barcode1d.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
