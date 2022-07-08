<?php session_start(); ?>
<?php if (isset($_SESSION['username'])) { ?>
	<?php
	include "../koneksi.php";
	error_reporting(0);
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Pekata - Tindak Lanjut Keluhan Pelanggan</title>
		<!-- Bootstrap core CSS-->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom fonts for this template-->
		<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Page level plugin CSS-->
		<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<!-- Custom styles for this template-->
		<link href="css/sb-admin.css" rel="stylesheet">
	</head>

	<body class="fixed-nav sticky-footer bg-dark" id="page-top">
		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
			<a class="navbar-brand" href="index.html">Pekata</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
						<a class="nav-link" href="index.php">
							<i class="fa fa-fw fa-dashboard"></i>
							<span class="nav-link-text">Dashboard</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Master">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMas" data-parent="#exampleAccordion">
							<i class="fa fa-fw fa-table"></i>
							<span class="nav-link-text">Data Master</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseMas">
							<li>
								<a href="user.php">Master User</a>
							</li>
							<li>
								<a href="pelanggan.php">Master Pelanggan</a>
							</li>
						</ul>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transaksi">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTran" data-parent="#exampleAccordion">
							<i class="fa fa-fw fa-wrench"></i>
							<span class="nav-link-text">Transaksi</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseTran">
							<li>
								<a href="buku-tamu.php">Buku Tamu</a>
							</li>
							<li>
								<a href="keluhan-pelanggan.php">Keluhan Pelanggan</a>
							</li>
							<li>
								<a href="identifikasi-kebutuhan-pelanggan.php">Identifikasi Kebutuhan Pelanggan</a>
							</li>
						</ul>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseLap" data-parent="#exampleAccordion">
							<i class="fa fa-fw fa-list-alt"></i>
							<span class="nav-link-text">Laporan</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseLap">
							<li>
								<a href="laporan-tamu.php">Laporan Tamu Per Periode</a>
							</li>
							<li>
								<a href="laporan-keluhan.php">Laporan Keluhan Pelanggan Per Periode</a>
							</li>
							<li>
								<a href="laporan-identifikasi.php">Laporan Identifikasi Kebutuhan Pelanggan Per Periode</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="navbar-nav sidenav-toggler">
					<li class="nav-item">
						<a class="nav-link text-center" id="sidenavToggler">
							<i class="fa fa-fw fa-angle-left"></i>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
							<i class="fa fa-fw fa-sign-out"></i>Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">
				<!-- Breadcrumbs-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.php">Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Tindak Lanjut Keluhan Pelanggan</li>
				</ol>
				<!-- Example DataTables Card-->
				<div class="card mb-3">
					<div class="card-body">
						<h5>Tindak Lanjut Keluhan Pelanggan</h5>
						<hr>
						<?php
						$nolaporan = $_GET['nolaporan'];
						$query = "SELECT * FROM keluhan_pelanggan as kp INNER JOIN keluhan_tindaklanjut as kt ON  kp.id_keluhan = kt.id_keluhan WHERE kp.id_keluhan='$nolaporan'";
						$sql = mysql_query($query);
						$row = mysql_fetch_array($sql);
						$row['tanggal'] = date('Y-m-d');

						$rl = $_POST['rl'];
						$dok = $_POST['dok'];
						$hal = $_POST['hal'];
						$dari = $_POST['dari'];
						$sk = $_POST['sk'];
						$dk = $_POST['dk'];
						$do = $_POST['do'];
						$atasan = $_POST['atasan'];
						$apk = $_POST['apk'];
						$dtk = $_POST['dtk'];
						$dtp = $_POST['dtp'];
						$do2 = $_POST['do2'];
						$rtp = $_POST['rtp'];
						$hasil = $_POST['hasil'];
						$kasiss = $_POST['kasiss'];
						$tgl = $_POST['tgl'];
						$kasipjt = $_POST['kasipjt'];
						$tgl2 = $_POST['tgl2'];
						$submit2 = $_POST['submit2'];

						if ($row['ruang_lingkup'] == null) {
							if (!empty($submit2)) {
								$query = mysql_query("INSERT INTO keluhan_tindaklanjut VALUES('$nolaporan', '$rl', '$dok', '$hal', '$dari', '$sk', '$dk', '$do', '$atasan', '$apk', '$dtk', '$dtp', '$do2', '$rtp', '$hasil', '$kasiss', '$tgl', '$kasipjt', '$tgl2')");

								if ($query == true) {
									echo "<script>alert('Berhasil!');</script>";
								} else {
									echo "<script>alert('Gagal!');</script>";
								}

								echo "<meta http-equiv='refresh' content='0;URL=keluhan-pelanggan.php'>";
							}
						} else {
							if (!empty($submit2)) {
								$query = mysql_query("UPDATE keluhan_tindaklanjut SET ruang_lingkup = '$rl', dokumen_acuan = '$dok', hal = '$hal', dari = '$dari', sumber_ketidaksesuaian = '$sk', deskripsi_ketidaksesuaian = '$dk', dibuat_oleh = '$do', atasan = '$atasan', analisa_ketidaksesuaian = '$apk', deskripsi_koreksi = '$dtk', deskripsi_pencegahan = '$dtp', dibuat_oleh2 = '$do2', rencana_penyelesaian = '$rtp', hasil_verifikasi = '$hasil', kasiSS = '$kasiss', tanggal_kasiSS = '$tgl', kasiPJT = '$kasipjt', tanggal_kasiPJT = '$tgl2' WHERE id_keluhan = '$nolaporan'");

								if ($query == true) {
									echo "<script>alert('Update Berhasil!');</script>";
								} else {
									echo "<script>alert('Gagal!');</script>";
								}

								echo "<meta http-equiv='refresh' content='0;URL=keluhan-pelanggan.php'>";
							}
						}
						?>
						<form class="form-inline">
							<div class="form-group">
								<label>No. Laporan</label>&nbsp;
								<input type="text" name="no" id="no" class="form-control" value="<?php echo $nolaporan ?>" readonly="readonly">&nbsp;
							</div>
							<div class="form-group">
								<label>Tanggal</label>&nbsp;
								<input type="text" name="tanggal" id="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" readonly="readonly">
							</div><br><br>
						</form>
						<form action="" method="POST">
							<div class="form-group">
								<label>Ruang Lingkup</label>
								<input type="text" name="rl" id="rl" placeholder="Ruang Lingkup" class="form-control" value="<?php if ($row['ruang_lingkup'] == null) {
																																	echo "";
																																} else {
																																	echo $row['ruang_lingkup'];
																																} ?>" required>
							</div>
							<div class="form-inline form-group">
								<label>Dokumen Acuan</label>&nbsp;
								<input type="text" name="dok" id="dok" placeholder="Dokumen Acuan" class="form-control" value="<?php if ($row['dokumen_acuan'] == null) {
																																	echo "";
																																} else {
																																	echo $row['dokumen_acuan'];
																																} ?>" required>&nbsp;
								<label>Hal</label>&nbsp;
								<input type="text" name="hal" id="hal" placeholder="Hal" class="form-control" value="<?php if ($row['hal'] == null) {
																															echo "";
																														} else {
																															echo $row['hal'];
																														} ?>" size="2" required>&nbsp;
								<label>Dari</label>&nbsp;
								<input type="text" name="dari" id="dari" placeholder="Dari" class="form-control" value="<?php if ($row['dari'] == null) {
																															echo "";
																														} else {
																															echo $row['dari'];
																														} ?>" size="2" required>
							</div>


							<div class="alert alert-danger" role="alert">
								<h4 style="text-align: center;">Ketidaksesuaian</h4>
							</div>
							<div class="form-group">
								<label>Sumber Ketidaksesuaian</label>
								<select class="form-control" name="sk" id="sk">
									<option <?php if ($row['sumber_ketidaksesuaian'] == 'Audit Internal') {
												echo "selected";
											} ?>>Audit Internal</option>
									<option <?php if ($row['sumber_ketidaksesuaian'] == 'Audit Eksternal') {
												echo "selected";
											} ?>>Audit Eksternal</option>
									<option <?php if ($row['sumber_ketidaksesuaian'] == 'Tinjauan Manajemen') {
												echo "selected";
											} ?>>Tinjauan Manajemen</option>
									<option <?php if ($row['sumber_ketidaksesuaian'] == 'Keluhan Pelanggan') {
												echo "selected";
											} ?>>Keluhan Pelanggan</option>
								</select>
							</div>
							<div class="form-group">
								<label>Deskripsi Ketidaksesuaian</label>
								<textarea name="dk" id="dk" class="form-control" rows="4" placeholder="Deskripsi Ketidaksesuaian" required><?php if ($row['deskripsi_ketidaksesuaian'] == null) {
																																				echo "";
																																			} else {
																																				echo $row['deskripsi_ketidaksesuaian'];
																																			} ?></textarea>
							</div>
							<div class="form-group">
								<label>Dibuat Oleh</label>
								<input type="text" name="do" id="do" placeholder="Dibuat Oleh" class="form-control" value="<?php if ($row['dibuat_oleh'] == null) {
																																echo "";
																															} else {
																																echo $row['dibuat_oleh'];
																															} ?>" required>
							</div>
							<div class="form-group">
								<label>Atasan</label>
								<input type="text" name="atasan" id="atasan" placeholder="Atasan" class="form-control" value="<?php if ($row['atasan'] == null) {
																																	echo "";
																																} else {
																																	echo $row['atasan'];
																																} ?>" required>
							</div>
							<div class="form-group">
								<label>Analisa Penyebab Ketidaksesuaian</label>
								<textarea name="apk" id="apk" class="form-control" rows="4" placeholder="Analisa Penyebab Ketidaksesuaian" required><?php if ($row['analisa_ketidaksesuaian'] == null) {
																																						echo "";
																																					} else {
																																						echo $row['analisa_ketidaksesuaian'];
																																					} ?></textarea>
							</div>


							<div class="alert alert-info" role="alert">
								<h4 style="text-align: center;">Koreksi</h4>
							</div>
							<div class="form-group">
								<label>Deskripsi Tindakan Koreksi</label>
								<textarea name="dtk" id="dtk" class="form-control" rows="4" placeholder="Deskripsi Tindakan Koreksi" required><?php if ($row['deskripsi_koreksi'] == null) {
																																					echo "";
																																				} else {
																																					echo $row['deskripsi_koreksi'];
																																				} ?></textarea>
							</div>
							<div class="form-group">
								<label>Deskripsi Tindakan Pencegahan</label>
								<textarea name="dtp" id="dtp" class="form-control" rows="4" placeholder="Deskripsi Tindakan Pencegahan" required><?php if ($row['deskripsi_pencegahan'] == null) {
																																						echo "";
																																					} else {
																																						echo $row['deskripsi_pencegahan'];
																																					} ?></textarea>
							</div>
							<div class="form-group">
								<label>Dibuat Oleh</label>
								<input type="text" name="do2" id="do2" placeholder="Dibuat Oleh" class="form-control" value="<?php if ($row['dibuat_oleh2'] == null) {
																																	echo "";
																																} else {
																																	echo $row['dibuat_oleh2'];
																																} ?>" required>
							</div>
							<div class="form-group">
								<label>Rencana Tanggal Penyelesaian</label>
								<input type="date" name="rtp" id="tanggal" placeholder="Rencana Tanggal Penyelesaian" class="form-control" value="<?php if ($row['rencana_penyelesaian'] == '0000-00-00') {
																																						echo date('Y-m-d');
																																					} else {
																																						echo $row['rencana_penyelesaian'];
																																					} ?>" required>
							</div>


							<div class="alert alert-success" role="alert">
								<h4 style="text-align: center;">Hasil</h4>
							</div>
							<div class="form-group">
								<label>Hasil Verifikasi</label>
								<textarea name="hasil" id="hasil" class="form-control" rows="4" placeholder="Hasil Verifikasi" required><?php if ($row['hasil_verifikasi'] == null) {
																																			echo "";
																																		} else {
																																			echo $row['hasil_verifikasi'];
																																		} ?></textarea>
							</div>
							<div class="form-group">
								<label>Kasi SS</label>
								<input type="text" name="kasiss" id="kasiss" placeholder="Kasi SS" class="form-control" value="<?php if ($row['kasiSS'] == null) {
																																	echo "";
																																} else {
																																	echo $row['kasiSS'];
																																} ?>" required>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input type="date" name="tgl" id="date" placeholder="Tanggal" class="form-control" value="<?php if ($row['tanggal_kasiSS'] == '0000-00-00') {
																																echo date('Y-m-d');
																															} else {
																																echo $row['tanggal_kasiSS'];
																															} ?>" required>
							</div>
							<div class="form-group">
								<label>Kasi PJT</label>
								<input type="text" name="kasipjt" id="kasipjt" placeholder="Kasi PJT" class="form-control" value="<?php if ($row['kasiPJT'] == null) {
																																		echo "";
																																	} else {
																																		echo $row['kasiPJT'];
																																	} ?>" required>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input type="date" name="tgl2" id="date" placeholder="Tanggal" class="form-control" value="<?php if ($row['tanggal_kasiPJT'] == '0000-00-00') {
																																echo date('Y-m-d');
																															} else {
																																echo $row['tanggal_kasiPJT'];
																															} ?>" required>
							</div>
							<?php if ($_SESSION['username'] == 'fatimah') {
								if ($row['ruang_lingkup'] == null) {
									echo "<input type='submit' name='submit2' value='Simpan' class='btn btn-primary'>";
								} else {
									echo "<input type='submit' name='submit2' value='Ubah' class='btn btn-primary'>";
								}
							}
							?>
							<a type="button" href="cetak-tindakan.php?nolaporan=<?php echo $row['id_keluhan']; ?>" name="cetak" class="btn btn-success">Cetak Tindakan</a><br><br>
						</form>
					</div>
				</div>
			</div>
			<!-- /.container-fluid-->
			<!-- /.content-wrapper-->
			<footer class="sticky-footer">
				<div class="container">
					<div class="text-center">
            			<small>Copyright © Your Website 2021 | Repost by <a href="" title="StokCoding.com" target="_blank">Bayu Tutor</a></small>
         			</div>
				</div>
			</footer>
			<!-- Scroll to Top Button-->
			<a class="scroll-to-top rounded" href="#page-top">
				<i class="fa fa-angle-up"></i>
			</a>
			<!-- Logout Modal-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<a class="btn btn-primary" href="logout.php">Logout</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Bootstrap core JavaScript-->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<!-- Core plugin JavaScript-->
			<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
			<!-- Page level plugin JavaScript-->
			<script src="vendor/datatables/jquery.dataTables.js"></script>
			<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
			<!-- Custom scripts for all pages-->
			<script src="js/sb-admin.min.js"></script>
			<!-- Custom scripts for this page-->
			<script src="js/sb-admin-datatables.min.js"></script>
			<script>
				// var dateControl = document.querySelector('input[type="date"]');
				// dateControl.value = '2017-06-01';
			</script>
		</div>
	</body>

	</html>
<?php
} else {
	header("location:login.php");
}
?>