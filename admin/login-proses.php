<?php
session_start();
include "../koneksi.php";
$user	= $_POST['username'];
$pass	= $_POST['password'];
$query	= "SELECT username, hak_akses FROM user WHERE username = '$user' AND password = MD5('$pass')";
$proses	= mysql_query($query) or die (mysql_error());
$jumlah	= mysql_num_rows($proses);
list($username,$hak_akses) = mysql_fetch_row($proses);
if($hak_akses = 'admin'){
	if($jumlah == 0){
	echo "<script>alert('Username atau password salah!');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
	}else{
	$_SESSION['username'] = $username;
	echo "<div class='alert alert-success' role='alert'>Login berhasil! Halaman dialihkan...</div>";
	echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
	}
}else if ($hak_akses == 'kasi'){
	if($jumlah == 0){
	echo "<script>alert('Username atau password salah!');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=kasi.php'>";
	}else{
	$_SESSION['username'] = $username;
	echo "<div class='alert alert-success' role='alert'>Login berhasil! Halaman dialihkan...</div>";
	echo "<meta http-equiv='refresh' content='2;URL=kasi.php'>";
	}
}
?>