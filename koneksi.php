<?php
//Koneksi ke database
//Host local
$host 	= "localhost";
$user	= "root";
$pass	= "";
$db		= "pengelolaan_bukutamu";

mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($db) or die ("Tidak terdapat database dengan nama <b><i>\"$db\"</i></b>");
?>