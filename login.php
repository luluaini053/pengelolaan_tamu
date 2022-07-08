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
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body style="background:#428bca;">
	<div class="container">
		<br>
		<div class="row">
			<div class="col-md-3" style="border: 0px solid black;"></div>
			<div class="col-md-6" style="border: 0px solid black; background:white; position:relative; margin-top:90px; margin-bottom:90px;">
				<center>
					<div class="page-header">
						<h2>
							<b>Pekata</b>
							<small><br>Aplikasi Pengelolaan Kebutuhan Tamu</small>
						</h2>
					</div>
				</center><br>
				<div id="hasil"></div>
				<form action="" method="POST" class="form-horizontal" onsubmit="loginpel(); return false">
					<div class="form-group">
						<label class="col-sm-3 control-label"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Username</label>
						<div class="col-sm-9">
							<input type="text" name="user" class="form-control" id="username" placeholder="Username" required autofocus>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Password</label>
						<div class="col-sm-9">
							<input type="password" name="pass" class="form-control" id="password" placeholder="Password" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</button>
							Belum punya akun? Silahkan daftar <a href="daftar.php">di sini</a>
						</div>
					</div>
					<br>
					
				</form><br>
				<script type="text/javascript">
					function loginpel() {
						var username = document.getElementById("username").value;
						var password = document.getElementById("password").value;
						$.ajax({
							url: "login_proses.php",
							type: "POST",
							data: {
								username: username,
								password: password
							},
							success: function(result) {
								$("#hasil").html(result);
							}
						});
					}
				</script>
			</div>
			<div class="col-md-3" style="border: 0px solid black;"></div>
		</div>
		<br>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>