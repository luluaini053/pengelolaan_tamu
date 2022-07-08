<?php
include "koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Pengelolaan Kebutuhan Tamu Tubes Basis Data</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='img/logo2.png' rel='shortcut icon'>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
			return true;
		}
	</script>
</head>

<body style="background:#428bca;">
	<div class="container">
		<br>
		<div class="row">
			<div class="col-md-3"></div>
			<?php
			$nama = $_POST['nama'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$alamat = $_POST['alamat'];
			$instansi = $_POST['instansi'];
			$notlp = $_POST['no'];
			$email = $_POST['email'];
			$submit = $_POST['submit'];

			$query = "SELECT max(id_pelanggan) as maxKode FROM pelanggan";
			$sql = mysql_query($query);
			$row = mysql_fetch_array($sql);
			$id	= $row['maxKode'];
			$no	= (int) substr($id, 2, 2);
			$no++;
			$idpelanggan = 'PE' . sprintf("%02s", $no);

			if (!empty($submit)) {
				$simpan = mysql_query("INSERT INTO pelanggan VALUES('$idpelanggan', '$nama', '$username', MD5('$password'), '$alamat', '$instansi', '$notlp', '$email')");
				if ($simpan == true) {
					echo "<script>alert('Berhasil!');</script>";
				} else {
					echo "<script>alert('Gagal!');</script>";
				}

				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}
			?>
			<div class="col-md-6" style="border: 0px solid black; background:white;">
				<center>
					<div class="page-header">
						<h2>
							<b>Daftar Pelanggan Baru</b>
							<small><br>Tubes Basis Data</small>
						</h2>
					</div>
				</center><br>
				<form action="" method="POST">
					<!--has-success has-feedback-->
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" id="nama" class="form-control" autofocus required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" rows="2" required></textarea>
					</div>
					<div class="form-group">
						<label>Nama Instansi</label>
						<input type="text" name="instansi" id="instansi" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="text" name="no" id="notlp" class="form-control" onkeypress="return hanyaAngka(event)" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email" class="form-control" id="email" required>
					</div>
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">
					<a href="index.php">Kembali</a>
					<br>
					<center>
						<p>Repost by <a href="https://stokcoding.com/" title="StokCoding.com" target="_blank">StokCoding.com</a></p>
					</center>
				</form><br>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>