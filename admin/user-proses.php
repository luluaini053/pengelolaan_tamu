<?php
include "../koneksi.php";
if(isset($_REQUEST['aksi'])) $aksi = $_REQUEST['aksi'];
else $aksi="";

switch($aksi){
case 'Tambah':
$user	= $_POST['username'];
$nama	= $_POST['nama'];
$pass	= $_POST['password'];
$hak	= $_POST['hak_akses'];
$query	= "INSERT INTO user VALUES('$user','$nama',md5('$pass'),'$hak')";
$sql	= mysql_query($query);
	if($sql==true){
		echo "<script>alert('Data berhasil ditambahkan')</script>";
	}else{
		echo "<script>alert('Data gagal ditambahkan')</script>";
	}

break;
case "Ubah":
$user	= $_POST['username'];
$nama	= $_POST['nama'];
$pass	= $_POST['password'];
$hak	= $_POST['hak_akses'];
$query	= "UPDATE user SET username = '$user', nama = '$nama', password = md5('$pass'), hak_akses = '$hak' WHERE username = '$user'";
$sql	= mysql_query($query);
	if($sql==true){
		echo "<script>alert('Data berhasil diubah')</script>";
	}else{
		echo "<script>alert('Data gagal diubah')</script>";
	}

break;
case "Hapus":
$user = $_GET['username'];

$query = mysql_query("DELETE FROM user WHERE username = '$user'");

	if($query == true){
	echo"<script>alert('Data berhasil dihapus')</script>";
	} else{
	echo "<script>alert('Data gagal dihapus')</script>";
	}
break;
}
?>
<meta http-equiv='refresh' content='0;URL=user.php'>