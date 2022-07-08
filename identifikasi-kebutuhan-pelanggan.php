<?php session_start(); ?>
<?php if(isset($_SESSION['nama_pelanggan'])){ ?>
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
	<title>Pekata - Identifikasi Kebutuhan Pelanggan</title>
	
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
	
	<script type="text/javascript">
				function eraseText() {
				 document.getElementById("keperluan").value = "";
				 
				 document.getElementById("permintaan").value = "";
				 document.getElementById("permasalahan").value = "";
				 
				 document.getElementById("permintaan1").value = "";
				 document.getElementById("penyebab").value = "";
				}
	</script>
</head>
<body style="background:#428bca;">
	<div class="container">
	<div class="row">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">
			  </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
				<li><a href="buku-tamu.php">Buku Tamu</a></li>
				<li><a href="keluhan-pelanggan.php">Keluhan Pelanggan</a></li>
				<li><a href="identifikasi-kebutuhan-pelanggan.php">Identifikasi Kebutuhan Pelanggan</a></li>
				
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['nama_pelanggan']; ?> <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Akun Saya</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Histori Kunjungan</a></li>
					<li class="divider"></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="col-md-12" style="border: 0px solid black; background:white;">
		<div class="col-md-4"></div>
		<?php
			$permintaankebutuhan= $_POST['permintaankebutuhan'];
			$penyebabkebutuhan = $_POST['penyebabkebutuhan'];
			$submit = $_POST['submit'];
			$query = "SELECT max(id_kebutuhan) as id_kebutuhan FROM identifikasi_kebutuhan_pelanggan";
			$sql = mysql_query($query);
			$row = mysql_fetch_array($sql);
			$idkebutuhan	= $row['id_kebutuhan'];
			$no = (int) substr($idkebutuhan, 3, 2);
			$no++;
			$idkebutuhan='IDP'.sprintf("%02s", $no);
			
			$q = mysql_query("SELECT * FROM pelanggan where username = '$_SESSION[nama_pelanggan]'");
			$r = mysql_fetch_array($q);
			if(!empty($submit)){
				 $simpan = mysql_query("INSERT INTO identifikasi_kebutuhan_pelanggan VALUES('$idkebutuhan', '$r[id_pelanggan]', '$permintaankebutuhan', '$penyebabkebutuhan', now())");
				 if($simpan==true) {
					echo "<script>alert('Berhasil!');</script>";
				}
				else {
					echo "<script>alert('Gagal!');</script>";
				}
				
				echo "<meta http-equiv='refresh' content='0;URL='>";
			}
		?>
		<div class="col-md-4">
			<center>
				<div class="page-header">
					<h2>
						<b>Identifikasi Kebutuhan Pelanggan</b>
						<small><br>Tubes Basis Data</small>
					</h2>
				</div>
			</center><br>
			<form action="" method="POST">
				<!--has-success has-feedback-->
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $r['nama']; ?>" disabled="disabled">
					<!--
					<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					<span id="inputSuccess5Status" class="sr-only">(success)</span>
					-->
				</div>
				<div class="form-group">
					<label>Nama Instansi</label>
					<input type="text" name="instansi" id="instansi" class="form-control"  value="<?php echo $r['nama_instansi']; ?>" disabled="disabled">
				</div>
				<div class="form-group">
					<label>Permintaan yg Tidak Bisa Dipenuhi</label>
					<input type="text" name="permintaankebutuhan" id="permintaan1" class="form-control" placeholder="Permintaan yg Tidak Bisa Dipenuhi" required>
				</div>
				<div class="form-group">
					<label>Penyebab</label>
					<textarea  name="penyebabkebutuhan" id="penyebab" class="form-control" rows="4" placeholder="Penyebab" required></textarea>
				</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			</form><br>
		</div>
		<div class="col-md-4"></div>
		</div>
	</div>
	<br>
	</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script>
	  $(function () {
		$('#myTab a:first').tab('show')
	  })
	</script>
</body>
</html>
<?php 
}else{
header("location:login.php");
}
?>