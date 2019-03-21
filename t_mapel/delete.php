<?php
if (!(isset($_POST['kode_mapel']))) {
  header("location:read.php");
}
include '../connect.php';

$kode_mapel = $_GET['kode_mapel'];
$query = "DELETE FROM t_mapel WHERE kode_mapel = '$kode_mapel'";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);


if ($num > 0)
{
header ("location: ../t_mapel/read.php");
}
else {
  echo "Gagal Hapus Data <br>";
}
echo "<a href = 'read.php'> Lihat Data </a>";
 ?>
