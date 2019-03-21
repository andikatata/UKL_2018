<?php
if (!(isset($_POST['btnSimpan']))) {
  header("location:read.php");
}
include '../connect.php';

$kode_guru = $_POST['kode_guru'];
$nama_guru = $_POST['nama_guru'];
$mapel = $_POST['mapel'];
$jumlah_jam = $_POST['jumlah_jam'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];

$query = "UPDATE t_guru SET nama_guru = '$nama_guru',
                            mapel = '$mapel',
                            jumlah_jam='$jumlah_jam',
                            alamat='$alamat',
                            telp = '$telp',
                            email ='$email',
                            jurusan = '$jurusan',
                            kelas = '$kelas'
                            WHERE kode_guru = $kode_guru";

$result = mysqli_query($connect, $query);
$num = mysqli_affected_rows($connect);

if ($num > 0 )
{
  echo "<script>alert('Update Data Berhasil !');location.href='read.php';</script>";
}
else {
  echo "<script>alert('Gagal Update Data !');location.href='read.php';</script>";
}
 ?>
