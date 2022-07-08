<?php
include "../koneksi.php";

$id = $_GET['id'];
$query = mysql_query("DELETE FROM identifikasi_kebutuhan_pelanggan WHERE id_kebutuhan = '$id'");
if($query == true){
echo"<script>alert('Data berhasil dihapus')</script>";
} else{
echo "<script>alert('Data gagal dihapus')</script>";
}
?>
<meta http-equiv='refresh' content='0;URL=identifikasi-kebutuhan-pelanggan.php'>