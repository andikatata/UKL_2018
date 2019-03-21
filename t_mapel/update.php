<?php

if (!(isset($_POST['btnSimpan']))){
    header("location: read.php");
}
else{
    include '../connect.php';

$kode_mapel = $_POST['kode_mapel'];
$kode_guru = $_POST['kode_guru'];
$alokasi_waktu = $_POST['alokasi_waktu'];
$semester = $_POST['semester'];
$query = "UPDATE t_mapel SET alokasi_waktu = $alokasi_waktu,
                             semester = $semester,
                             kode_guru = $kode_guru
        WHERE kode_mapel = '$kode_mapel'";

$result = mysqli_query($connect, $query);
$num = mysqli_affected_rows($connect);

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/notice.css" />
</head>
<body>
        <form>
        <div>
                <?php
                if($num > 0)
                echo "<script>alert('Update Data Berhasil !');location.href='read.php';</script>";
                else
                {
                  echo "<script>alert('Gagal Update Data !');location.href='read.php';</script>";  echo "<h1>Gagal update data</h1>";
                }
                }
                ?>
        </div>
        </form>

</body>
</html>
