<?php
session_start();
if (!(isset($_SESSION['user'])))
{
    header("location:../login/form_login.php");
}
include '../connect.php';
$urut = $_GET['urut'];
$query = "SELECT * FROM t_guru ORDER BY $urut";
$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);


 ?>
 <!DOCTYPE html>
 <head>
 <title></title>
 <link rel="stylesheet" type="text/css" href="css/style1.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

  <!-- HEADER -->
  <div id="header">
      <span id="open" style="font-size:35px;cursor:pointer;padding-left: 200px;margin-top:-5px;" onclick="openNav()">&#9776; </span>
          <form class="example" action="search.php" method="get">
                <button type="submit"><i class="fa fa-search cari"></i></button>
                  <input id="cari" style="width:200px;" type="search" name="cari" placeholder="Masukkan pencarian...">

          <select class="pilihan" name="kategori">
            <option disabled selected>Pilih Kategori</option>
            <option value="kode_guru" >Kode Guru</option>
            <option value="nama_guru">Nama Guru</option>
            <option value="jumlah_jam">Jumlah Jam Pelajaran</option>
            <option value="alamat">Alamat</option>
            <option value="telp">Telepon</option>
            <option value="email">Email</option>
            <option value="jurusan">Jurusan</option>
            <option value="kelas">Kelas</option>
          </select>
  </form>
  <form class="example1" action="short.php" method="get">
      <button style="float:right; height:47px;margin-top:-27px;margin-right:10px;background-color: #2196F3;color:white;" type="submit"><b>Short</b></button>
      <select class="pilihan" style="height:45px;float:right;margin-top:-26px;margin-right:10px;" name="urut">
      <option disabled selected>Pilih Kategori</option>
      <option value="kode_guru">Kode Guru</option>
      <option value="nama_guru">Nama Guru</option>
      <option value="jumlah_jam">Jumlah Jam Pelajaran</option>
      <option value="alamat">Alamat</option>
      <option value="telp">Telepon</option>
      <option value="email">Email</option>
      <option value="jurusan">Jurusan</option>
      <option value="kelas">Kelas</option>
    </select>
    <p id="judul" style="float:right;padding-right:140px;font-size:35px;margin-top:-27px;margin-bottom:0;transition:0.5s;">
      Data Guru </p>
  </form>
</div>
<div class="dropdown">
<input type="image" src="gambar/journalist.png" width="60px" height="60px" class="ikon dropbtn" alt="Logout" name="dropdown" onclick="myFunction()" value="">
<div id="myDropdown" class="dropdown-content">
  <a href="../login/logout.php" class="fa fa-sign-out"> Sign Out</a>
</div>
</div>

<!-- SIDENAV -->
   <div id="mySidenav" class="sidenav">
     <img src="gambar/pakdhe1.jpg"  class="avatar" alt="Avatarmu">
     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <div class="sidenav2">
     <p> <i class="fa fa-briefcase"></i> Designer</p>
     <p> <i class="fa fa-home"></i> Malang, IDN</p>
      <p> <i class="fa fa-envelope"></i> andika@gmail.com</p>
       <p> <i class="fa fa-phone"></i> 080301 </p>
     </div>
     <hr>
     <div class="namadata">
     <p><i class="fa fa-asterisk"></i> <b>Data</b></p>
     <a href="../t_guru/read.php" class="active" style="margin-top:10px;font-size:25px;">Data Guru</a>
       <a href="../t_mapel/read.php" style="margin-top:10px;font-size:25px;">Matapelajaran</a>
     </div>
   </div>

<!-- TABLE -->
  <div id="main">
    <div class="headtab"></div>
      <div class="box-login-title">
        <div class="fa fa-plus-square" style="padding-left:20px;padding-top:10px;font-size:20px;color:black;"></div>
          <h3 id="myBtn" style="padding-left:45px;margin-top:-26px;cursor:pointer;font-size:23px;">Tambah Data</h3>
          </div>


     <table class="customers">
       <tr>
         <th style="width:5%;text-align:center;">No.</th>
         <th id="customers1">Kode guru</th>
         <th id="customers2">Nama Guru</th>
         <th id="customers3">Jumlah jam Pelajaran</th>
         <th id="customers4">Alamat</th>
         <th id="customers5">Telepon</th>
         <th id="customers6">Email</th>
         <th id="customers8">Jurusan</th>
         <th id="customers9">Kelas</th>
         <th colspan="2" id="customers7">Aksi</th>
       </tr>
       <?php
       if($num>0){
         $no = 1;
         while($data = mysqli_fetch_assoc($result)){
           echo "<tr>";
           echo "<td class='no'>". $no . "</td>";
           echo "<td style='padding-left:10px;'>". $data['kode_guru']. "</td>";
           echo "<td style='padding-left:10px;'>". $data['nama_guru']. "</td>";
           echo "<td style='padding-left:10px;'>". $data['jumlah_jam']. "</td>";
           echo "<td style='padding-left:10px;'>". $data['alamat']. "</td>";
           echo "<td style='padding-left:10px;'>". $data['telp']. "</td>";
           echo "<td style='padding-left:10px;'>". $data['email']. "</td>";
           echo "<td style='padding-left:10px;'>". $data['jurusan']. "</td>";
           echo "<td style='padding-left:10px;'>". $data['kelas']. "</td>";
           echo "<td style='text-align:center;'> <a href='form-update.php?kode_guru=" . $data['kode_guru']."'> <p class='fa fa-edit' style='font-size:20px;color:purple;padding:0;'></p> </a> </td>";
           echo "<td style='text-align:center;'> <a href='delete.php?kode_guru=" . $data['kode_guru']."' onclick='return confirm(\"Apakah Anda Yakin ingin menghapus data?\")'>
           <p class='fa fa-times' style='font-size:20px;padding:0;color:purple;'></p></a></td> ";
           echo "</tr>";
           $no++;
         }
         }
         else {echo "<td colspan='3'>Tidak ada data</td>";}
        ?>
      </table>
    </div>
    <div class="kembali">
      <a href="read.php"><button type="button" name="button">Kembali</button></a>
    </div>
    <div id="myModal" class="modal">
      <div class="modal-content" style="background-color: #ecf0f1;">
        <div class="modal-header">
      <span style="margin-right:20px;margin-top:-10px;" class="close">&times;</span>
    <form action="create.php" method="post">
  <h1 style="color:black;text-align:center;padding-left:30px;">Create Data</h1>
      <input class="inputmodal" type="text" name="nama_guru" placeholder="Nama Guru" required>
      <input class="inputmodal" type="text" name="telp" placeholder="Nomor Telepon" required>
      <input class="inputmodal" type="number" name="jumlah_jam" placeholder="Jumlah Jam Pelajaran" required>
      <input class="inputmodal1" name="alamat" placeholder="Alamat" required></input>
      <input class="inputmodal" type="email" name="email" placeholder="Email" required>
      <input class="inputmodal" name="jurusan" placeholder="Jurusan" required></input>
      <input class="inputmodal" type="kelas" name="kelas" placeholder="Kelas" required>
      <input class="submitmodal"  type="submit" name="btnSimpan" value="Simpan"  required>
    </form>
  </div>
  </div>
  </div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "280px";
    document.getElementById("main").style.marginLeft = "315px";
    document.getElementById("header").style.marginLeft = "0";
    document.getElementById("judul").style.marginRight = "0";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "50px";
    document.getElementById("header").style.marginLeft = "-160px";
    document.getElementById("judul").style.marginRight = "190px";
}


// SCRIPT MODAL
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// SCRIPT IMAGE dropdown
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 </body>
 </html>
