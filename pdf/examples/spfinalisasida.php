<?php
session_start();
include '../../koneksi.php';
$id_unit= $_SESSION['idunit'];
$sql3="select * from unit_kerja where id_unit=$id_unit";
        $perintah3=mysqli_query($koneksi,$sql3);
        $r3=mysqli_fetch_array($perintah3);
        $ketum=$r3['nama_pimpinan'];
        $kasarpras=$r3['nama_kasarpras'];
        $nama_panjang=$r3['nama_panjang'];

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
$pdf->SetTitle('SPTJM Data Awal');
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

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<p style="text-align: center;"><strong>SURAT PERNYATAAAN</strong></p>
<p>Yang bertanda tangan di bawah ini :</p>
<table style="width: 100%; height: 54px;" border="0">
<tbody>
<tr style="height: 18px;">
<td style="width: 17.7388%; height: 18px;">  Nama</td>
<td style="width: 6.23774%; height: 18px;">:</td>
<td style="width: 76.0234%; height: 18px;">'.$kasarpras.'</td>
</tr>
<tr style="height: 18px;">
<td style="width: 17.7388%; height: 18px;">  Jabatan</td>
<td style="width: 6.23774%; height: 18px;">:</td>
<td style="width: 76.0234%; height: 18px;">Kepala Bidang Sarana dan Prasarana</td>
</tr>
<tr style="height: 18px;">
<td style="width: 17.7388%; height: 18px;">  Unit Kerja</td>
<td style="width: 6.23774%; height: 18px;">:</td>
<td style="width: 76.0234%; height: 18px;">'.$nama_panjang.'</td>
</tr>
</tbody>
</table>
<p>menyatakan dengan sesungguhnya bahwa:</p>
<ol>
<li align="justify">Bertanggung jawab penuh atas kebenaran dan kemutakhiran data yang diisikan dan dikirimkan melalui aplikasi inventaris Yayasan Triatma Surya Jaya sesuai dengan data yang dilampirkan melalui surat pernyataan ini.</li>
<li align="justify">Apabila di kemudian hari terdapat ketidaksesuaian antara data yang dikirimkan dengan keadaan yang sebenarnya, kami bertanggung jawab sepenuhnya dan bersedia menerima sanksi sesuai dengan ketentuan yang berlaku.</li>
</ol>
<p>Demikian pernyataan ini kami buat dengan sebenar-benarnya.</p>
<table style=" width: 100%; height: 72px;" border="0">
<tbody>
<tr style="height: 18px;">
<td style="width: 45%; height: 18px;">Mengetahui</td>
<td style="width: 10%; height: 18px;">&nbsp;</td>
<td style="width: 45%; height: 18px;">Badung , '.date('d-m-Y').'</td>
</tr>
<tr style="height: 18px;">
<td>Kepala Unit</td>
<td>&nbsp;</td>
<td>Kepala Bidang Sarana dan Prasarana</td>
</tr>
<tr style="height: 18px;">
<td>'.$nama_panjang.'</td>
<td>&nbsp;</td>
<td>'.$nama_panjang.'</td>
</tr>
<tr style="height: 18px;">
<td>
<p>&nbsp;</p>
<p>&nbsp;</p>
'.$ketum.'</td>
<td>&nbsp;</td>
<td>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>'.$kasarpras.'</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();
$html ='<b>Lampiran Rincian Data Inventaris</b>';
if($_SESSION['level']==1) {
    $sql1="select barang_detail.*,barang.*,nama_panjang,COUNT(IF(kondisi = 'Baik', 1, NULL)) as qty_baik,COUNT(IF(kondisi = 'Rusak', 1, NULL)) as qty_rusak from barang_detail,barang,unit_kerja where barang_detail.id_barang=barang.id_barang and unit_kerja.id_unit=barang_detail.id_unitkerja GROUP BY barang_detail.id_unitkerja,lokasi";
  } else {
    //$id_unit= $_SESSION['idunit'];
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
	    <th width="30%" colspan="3" style="text-align:center;">Jumlah Barang</th> 
	    <th width="25%" align="center" rowspan="2">Catatan</th>    
	</tr>
	<tr>
	    <th align="center">Baik</th>
	    <th align="center">Rusak</th>                   
	    <th align="center">Total</th>                    
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
		    <td align="right">'.$r['qty_rusak'].'</td>
		    <td align="right">'.$tot.'</td>
		    <td></td>
			</tr>';
			$no++;
	}
	$html.='</table>';
}


$pdf->writeHTML($html, true, true, true, true, '');
//$pdf->writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('spfinalisasida.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
