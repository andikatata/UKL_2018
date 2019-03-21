<?php
if (!(isset($_POST['btnSimpan']))) {
  header("location:form-create.php");
}
include '../connect.php';

$nama_guru = $_POST ['nama_guru'];
$mapel = $_POST['mapel'];
$jumlah_jam = $_POST['jumlah_jam'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];


$query = "INSERT INTO t_guru (nama_guru,mapel, jumlah_jam, alamat, telp, email,jurusan,kelas)
          VALUES ('$nama_guru','$mapel','$jumlah_jam','$alamat','$telp','$email','$jurusan','$kelas')";

$result = mysqli_query($connect,$query);

$num = mysqli_affected_rows($connect);

if ($num >0)
{
  echo "<script>alert('Tambah Data Berhasil !');location.href='read.php';</script>";
}
else {
  echo "<script>alert('Gagal Tambah Data !');location.href='read.php';</script>";
}
 ?>
