<?php
	session_start();
	include "../koneksi.php";
	include "../fpdf/fpdf.php";
	include "functions.php";
	
	$pdf = new FPDF("P", "mm", "A4");
	$pdf->AddPage();
	
	$pdf->Image('../img/logo1.jpg',10,8,50);
	$pdf->SetFont('Arial', 'B', 18);
	$pdf->Text(65, 25, "BARISTAND INDUSTRI SURABAYA");
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Text(182, 40, "FM-8.02.01");
	$pdf->Text(194, 44, "1/0");
	
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Text(40, 55, "PERMINTAAN TINDAKAN KOREKSI DAN PENCEGAHAN");
	
	$id = $_GET['nolaporan'];
	list($rl, $tgl, $da, $hal, $dari, $sk, $dk, $do, $atasan, $apk, $dtk, $dtp, $do2, $rtp, $hasil, $kasiss, $tglkasiss, $kasipjt, $tglkasipjt) = mysql_fetch_row(mysql_query("SELECT kt.ruang_lingkup, kp.tanggal, kt.dokumen_acuan, kt.hal, kt.dari, kt.sumber_ketidaksesuaian, kt.deskripsi_ketidaksesuaian, kt.dibuat_oleh, kt.atasan, kt.analisa_ketidaksesuaian, kt.deskripsi_koreksi, kt.deskripsi_pencegahan, kt.dibuat_oleh2, kt.rencana_penyelesaian, kt.hasil_verifikasi, kt.kasiSS, kt.tanggal_kasiSS, kt.kasiPJT, kt.tanggal_kasiPJT FROM keluhan_pelanggan kp INNER JOIN keluhan_tindaklanjut kt ON kp.id_keluhan = kt.id_keluhan WHERE kt.id_keluhan = '$id'"));
	
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(10, 65, "No Laporan");
	$pdf->Text(50, 65, " : ".$id);
	
	$pdf->Text(10, 70, "Ruang Lingkup");
	$pdf->Text(50, 70, " : ".$rl);
	
	$pdf->Text(110, 65, "Hari, Tanggal");
	$pdf->Text(150, 65, " : ".SearchDay($tgl).", ".ReportDate($tgl));
	
	$pdf->Text(110, 70, "Dokumen Acuan");
	$pdf->Text(150, 70, " : ".$da);
	
	$pdf->Text(110, 75, "Hal");
	$pdf->Text(120, 75, " ".$hal);
	
	$pdf->Text(130, 75, "dari");
	$pdf->Text(140, 75, " ".$hal);
	
	$pdf->SetXY(10, 76);
	$pdf->cell(0, 25, "", 1,0, 'R');
	$pdf->Text(10, 80, "Sumber Ketidaksesuaian");
	
	if($sk =='Audit Internal'){
		echo $pdf->Text(60, 80, " : [v] Audit Internal");
		$pdf->Text(60, 85, "   [ ] Audit Eksternal");
		$pdf->Text(60, 90, "   [ ] Tinjauan Manajemen");
		$pdf->Text(60, 95, "   [ ] Keluhan Pelanggan");
	}else if($sk =='Audit Eksternal'){
		echo $pdf->Text(60, 80, " : [] Audit Internal");
		$pdf->Text(60, 85, "   [v] Audit Eksternal");
		$pdf->Text(60, 90, "   [ ] Tinjauan Manajemen");
		$pdf->Text(60, 95, "   [ ] Keluhan Pelanggan");
	}else if($sk =='Tinjauan Manajemen'){
		echo $pdf->Text(60, 80, " : [ ] Audit Internal");
		$pdf->Text(60, 85, "   [ ] Audit Eksternal");
		$pdf->Text(60, 90, "   [v] Tinjauan Manajemen");
		$pdf->Text(60, 95, "   [ ] Keluhan Pelanggan");
	}else{
		echo $pdf->Text(60, 80, " : [ ] Audit Internal");
		$pdf->Text(60, 85, "   [ ] Audit Eksternal");
		$pdf->Text(60, 90, "   [ ] Tinjauan Manajemen");
		$pdf->Text(60, 95, "   [v] Keluhan Pelanggan");
	}
	
	$pdf->SetXY(10, 101);
	$pdf->cell(0, 25, "", 1,0, 'R');
	$pdf->Text(10, 105, "Deskripsi Ketidaksesuaian");
	$pdf->Text(70, 105, " : ".$dk);
	
	$pdf->SetXY(10, 126);
	$pdf->cell(78, 10, "", 1,0, 'R');
	$pdf->Text(10, 130, "Dibuat Oleh");
	$pdf->Text(40, 130, " : ".$do);
	
	$pdf->SetXY(88, 126);
	$pdf->cell(112, 10, "", 1,0, 'R');
	$pdf->Text(90, 130, "Atasan");
	$pdf->Text(110, 130, " : ".$atasan);
	
	$pdf->SetXY(10, 136);
	$pdf->cell(0, 25, "", 1,0, 'R');
	$pdf->Text(10, 140, "Analisa Penyebab Ketidaksesuaian");
	$pdf->Text(90, 140, " : ".$apk);
	
	$pdf->SetXY(10, 161);
	$pdf->cell(0, 25, "", 1,0, 'R');
	$pdf->Text(10, 165, "Deskripsi Tindakan Koreksi");
	$pdf->Text(80, 165, " : ".$dtk);
	
	$pdf->SetXY(10, 186);
	$pdf->cell(0, 25, "", 1,0, 'R');
	$pdf->Text(10, 190, "Deskripsi Tindakan Pencegahan");
	$pdf->Text(85, 190, " : ".$dtp);
	
	$pdf->SetXY(10, 211);
	$pdf->cell(78, 10, "", 1,0, 'R');
	$pdf->Text(10, 215, "Dibuat Oleh");
	$pdf->Text(40, 215, " : ".$do);
	
	$pdf->SetXY(88, 211);
	$pdf->cell(112, 10, "", 1,0, 'R');
	$pdf->Text(90, 215, "Rencana Tanggal Penyelesaian");
	$pdf->Text(155, 215, " : ".$rtp);
	
	$pdf->SetXY(10, 221);
	$pdf->cell(0, 25, "", 1,0, 'R');
	$pdf->Text(10, 225, "Hasil Verifikasi");
	$pdf->Text(50, 225, " : ".$hasil);
	
	$pdf->SetXY(10, 246);
	$pdf->cell(98, 10, "", 1,0, 'R');
	$pdf->Text(10, 250, "Kasi SS");
	$pdf->Text(50, 250, " : ".$kasiss);
	
	$pdf->SetXY(108, 246);
	$pdf->cell(92, 10, "", 1,0, 'R');
	$pdf->Text(110, 250, "Kasi PJT/Kasi Terkait");
	$pdf->Text(155, 250, " : ".$kasipjt);
	
	$pdf->SetXY(10, 256);
	$pdf->cell(98, 10, "", 1,0, 'R');
	$pdf->Text(10, 260, "Tanggal");
	$pdf->Text(50, 260, " : ".$tglkasiss);
	
	$pdf->SetXY(108, 256);
	$pdf->cell(92, 10, "", 1,0, 'R');
	$pdf->Text(110, 260, "Tanggal");
	$pdf->Text(155, 260, " : ".$tglkasipjt);
	
	$pdf->Output();
?>