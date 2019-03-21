<?php

if (!(isset($_GET['kode_mapel']))){
    header("location: read.php");
}
else{
    include '../connect.php';

$kode_mapel = $_GET['kode_mapel'];

$query = "SELECT kode_mapel, alokasi_waktu, semester, t_mapel.kode_guru, nama_guru
        FROM t_mapel LEFT JOIN t_guru USING(kode_guru)
        WHERE kode_mapel = '$kode_mapel'";
$result = mysqli_query($connect, $query);

$data_guru = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
<head>
<style media="screen">
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html {
  background: #95a5a6;
  background-image: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_embroidery.png);
  font-family: 'Helvetica Neue', Arial, Sans-Serif;
}
html .login-wrap {
  position: relative;
  margin: 0 auto;
  background: #ecf0f1;
  width: 450px;
  border-radius: 5px;
  box-shadow: 3px 3px 10px #333;
  padding: 15px;
  margin-top: 60px;
}
html .login-wrap h2 {
  text-align: center;
  font-weight: 200;
  font-size: 40px;
  margin-top: 20px;
  margin-bottom: 15px;
  color: #34495e;
}
html .login-wrap .form {
  padding-top: 20px;
}
html .login-wrap .form a {
  text-align: center;
  font-size: 10px;
  color: #3498db;
}
html .login-wrap .form a p {
  padding-bottom: 10px;
}
html .login-wrap:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  background: -webkit-linear-gradient(left, #27ae60 0%, #27ae60 20%, #8e44ad 20%, #8e44ad 40%, #3498db 40%, #3498db 60%, #e74c3c 60%, #e74c3c 80%, #f1c40f 80%, #f1c40f 100%);
  background: -moz-linear-gradient(left, #27ae60 0%, #27ae60 20%, #8e44ad 20%, #8e44ad 40%, #3498db 40%, #3498db 60%, #e74c3c 60%, #e74c3c 80%, #f1c40f 80%, #f1c40f 100%);
  height: 5px;
  border-radius: 5px 5px 0 0;
}


.inputmodal{
  width: 80%;
  margin-left: 10%;
  margin-top: 15px;
  margin-right: 100px;
  height: 50px;
  border-radius: 5px;
  outline: 0;
  border: 1px solid #bbb;
  padding: 0 0 0 25px;
  font-size: 18px;
    border: 1px solid #3498db;
    margin-left: none;
}
.inputmodal1 {
  width: 80%;
  margin-left: 10%;
  margin-top: 15px;
  margin-right: 100px;
  height: 60px;
  border-radius: 5px;
  outline: 0;
  border: 1px solid #bbb;
  padding: 0 0 0 25px;
  font-size: 18px;
    border: 1px solid #3498db;
    margin-left: none;
}
.submitmodal{
  width: 80%;
  margin-left: 10%;
  margin-top: 20px;
  margin-bottom: 25px;
  height: 50px;
  border-radius: 5px;
  outline: 0;
  font-size: 20px;
  background-color: #e74c3c;
  color: white;
  cursor: pointer;
}
</style>
</head>
<body>
  <div class="login-wrap">
  <form action="update.php" method="post">
    <h2>UPDATE DATA</h2>
            <input class="inputmodal" type="text" name="kode_mapel" id="kode_mapel" readonly value="<?php echo $data_guru['kode_mapel']; ?>">

            <input class="inputmodal" type="number" name="alokasi_waktu" id="alokasi_waktu" value="<?php echo $data_guru['alokasi_waktu']; ?>">

            <input class="inputmodal" type="number" name="semester" id="semester" value="<?php echo $data_guru['semester']; ?>">

            <select class="inputmodal" name="kode_guru" id="nama_guru">
            <option value="NULL">Tidak ada pengajar</option>
            <?php
                $query2 = "SELECT kode_guru, nama_guru FROM t_guru";
                $result2 = mysqli_query ($connect, $query2);
                while ($data = mysqli_fetch_assoc($result2)) { ?>
                <option value="<?php echo $data['kode_guru']; ?>" <?php if($data_guru['kode_guru'] == $data['kode_guru']) {echo "selected"; } ?> >
                    <?php echo $data['nama_guru']; ?>

                </option>
                <?php } ?>
            </select>
            <input class="submitmodal" type="Submit" value="Simpan" name="btnSimpan">
        </div>
    </form>
  </div>
</body>
</html>
