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
	$pdf->Text(182, 40, "FM-8.09.01");
	$pdf->Text(194, 44, "1/0");
	
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Text(70, 55, "LAPORAN KELUHAN PELANGGAN");
	
	$id = $_GET['nolaporan'];
	list($nama, $telepon, $email, $permintaan, $permasalahan, $tanggal) = mysql_fetch_row(mysql_query("SELECT p.nama, p.telepon, p.email, k.permintaan, k.permasalahan, k.tanggal FROM keluhan_pelanggan k INNER JOIN pelanggan p ON k.id_pelanggan = p.id_pelanggan WHERE id_keluhan = '$id'"));
	
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(10, 65, "No Laporan");
	$pdf->Text(50, 65, " : ".$id);
	
	$pdf->Text(10, 70, "Nama Pelanggan");
	$pdf->Text(50, 70, " : ".$nama);
	
	$pdf->Text(10, 75, "Kontak");
	$pdf->Text(50, 75, " : ".$telepon." / ".$email);
	
	$pdf->Text(10, 80, "Hari, Tanggal");
	$pdf->Text(50, 80, " : ".SearchDay($tanggal).", ".ReportDate($tanggal));
	
	$pdf->SetXY(10, 85);
	$pdf->cell(0, 5, "", 1,0, 'R');
	
	$pdf->Text(15, 89, "Isi Keluhan");
	$pdf->Text(50, 89, " : ".$permintaan);
	
	$pdf->SetXY(10, 90);
	$pdf->cell(0, 110, "", 1,0, 'R');
	
	
	$pdf->SetXY(10, 200);
	$pdf->cell(0, 35, "", 1,0, 'R');
	$pdf->Text(150, 210, "Dilaporkan Oleh:", 1,0,'R');
	$pdf->Text(151, 230, ".........................", 0,0,'R');

	
	$pdf->Output();
?>