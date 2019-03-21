<?php

include '../connect.php';
$kode_guru = $_GET['kode_guru'];

$query = "SELECT * FROM t_guru WHERE kode_guru = $kode_guru";

$result = mysqli_query($connect,$query);

$row = mysqli_fetch_assoc($result);
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
<style>
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
  margin-top: 15px;
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
  height: 35px;
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
  height: 45px;
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
        <input class="inputmodal" type="text" name="nama_guru" id="nama_guru" value="<?php echo $row['nama_guru'];?>" placeholder="Nama Guru Pengajar">

        <input class="inputmodal1" type="text" name="mapel" value="<?php echo $row['mapel'];?>" placeholder="mapel"></input>

        <input class="inputmodal" type="number" name="jumlah_jam" id="jumlah_jam" value="<?php echo $row['jumlah_jam'];?>" placeholder="Jumlah Jam Pelajaran">

        <input class="inputmodal1" name="alamat" value="<?php echo $row['alamat'];?>" placeholder="Alamat"></input>

        <input class="inputmodal"  type="text" name="telp" id="no_telp" value="<?php echo $row['telp']; ?>" placeholder="Nomor Telepon">

        <input class="inputmodal"  type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Email">

        <input class="inputmodal"  type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" placeholder="Jurusan">

        <input class="inputmodal"  type="text" name="kelas" value="<?php echo $row['kelas']; ?>" placeholder="Kelas">

        <input class="inputmodal" type="hidden" name="kode_guru" value="<?php echo $row['kode_guru']; ?>">

        <input  class="submitmodal" type="submit" name="btnSimpan" value="Simpan">
</form>
</div>
   </body>
 </html>
