<?php
if (!(isset($_POST['kode_guru']))) {
  header("location:read.php");
}
include '..\connect.php';

$kode_guru = $_GET['kode_guru'];

$query = "DELETE FROM t_guru WHERE kode_guru = '$kode_guru'";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows ($connect);

if ($num >0)
{
  header('location: ../t_guru/read.php');
}
else {
  echo "Gagal hapus data <br>";
}
echo "<a href = 'read.php'> Lihat Data </a>";
 ?>
