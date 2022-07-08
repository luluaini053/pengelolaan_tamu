<?php
session_start();
unset($_SESSION['nama_pelanggan']);
header('location:index.php');
?>
