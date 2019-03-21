<?php
if (!(isset($_POST['btnSimpan']))) {
  header("location:read.php");
}
include '../connect.php';

$kode_mapel = $_POST ['kode_mapel'];
$alokasi_waktu = $_POST['alokasi_waktu'];
$semester = $_POST['semester'];
$kode_guru = $_POST['kode_guru'];

$query = "INSERT INTO t_mapel
          VALUES ('$kode_mapel', '$alokasi_waktu', '$semester',$kode_guru)";

$result = mysqli_query($connect, $query);
$num = mysqli_affected_rows($connect);

if ($num > 0)
{
    echo "<script>alert('Tambah Data Berhasil !');location.href='read.php';</script>";
}
else {
  echo "<script>alert('Gagal Tambah Data !');location.href='read.php';</script>";
}
 ?>
