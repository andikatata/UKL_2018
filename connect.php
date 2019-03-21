<?php
$host = "localhost";
$uname = "root";
$pass = "";
$db = "manajemen_sekolah";

$connect = mysqli_connect($host, $uname, $pass, $db);

if (!$connect)
{
  echo "Koneksi ke database berhasil : ". mysqli_connect_error();
}
 ?>
